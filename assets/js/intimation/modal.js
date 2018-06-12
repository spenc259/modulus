(function() {
	// define the constructor - allows new Modal();
	this.Modal = function() {
		// global element references
		this.closeButton = null; // reference to the close button
		this.modal = {}; // reference the current modal
		this.overlay; // reference the overlay
		this.transitionEnd = transitionSelect();
		this.content = '';
		this.search_btn = null;

		// define default options object
		var defaults = {
			className: 'scale',
			closeButton: true,
			maxWidth: 600,
			minWidth: 300,
			overlay: true
		};

		// check if arguments are passed on instantisation,
		// arguments object is available inside every function,
		// and type check for an object
		if (arguments[0] && typeof arguments[0] === 'object') {
			console.log('arguments');
			this.options = extendDefaults(defaults, arguments[0]);
		}

		// console.log(arguments);
		// console.log(this.options);
	};

	// Public Methods
	// we have to attach the following methods to the Modals prototype to expose it
	// each new instance will share a method attached to the prototype object

	Modal.prototype.close = function() {
		var _ = this;

		this.modal.className = this.modal.className.replace(' inti-open', '');
		this.overlay.className = this.overlay.className.replace(' inti-open', '');

		this.modal.addEventListener(this.transitionEnd, function() {
			_.modal.parentNode.removeChild(_.modal);
		});

		this.overlay.addEventListener(this.transitionEnd, function() {
			_.overlay.parentNode.removeChild(_.overlay);
		});
	};

	Modal.prototype.open = function() {
		build.call(this);
		initaliseEvents.call(this);

		// var search = this.search();

		/**
		 * forces the browser to recalc and reorganise the above elements
		 * added with build.call. 
		 * also will give CSS animation a starting point
		 */
		window.getComputedStyle(this.modal).height;

		this.modal.className =
			this.modal.className +
			(this.modal.offsetHeight > window.innerHeight ? ' inti-open inti-anchored' : ' inti-open');
		this.overlay.className = this.overlay.className + ' inti-open';
	};

	Modal.prototype.search = function() {
		console.log('search');

		var result_wrap = document.getElementById('results');
		result_wrap.innerHTML = '';

		var input = document.getElementById('search-form').getElementsByTagName('input');
		console.log(input);

		for (var i = 0; i < input.length; i++) {
			var val = input[i].value;
		}

		var data = {
			action: 'search_project',
			value: val
		};

		var urlEncodedData = '';
		var urlEncodedDataPairs = [];
		var name;

		// Turn the data object into an array of URL-encoded key/value pairs.
		for (name in data) {
			urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
		}

		// Combine the pairs into a single string and replace all %-encoded spaces to
		// the '+' character; matches the behaviour of browser form submissions.
		urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

		var xhttp = new XMLHttpRequest();
		xhttp.responseType = 'json';

		xhttp.onreadystatechange = function() {
			if (this.readyState == 1) {
				console.log('loading');
				result_wrap.classList = 'loading';
			}
			if (this.readyState == 4 && this.status == 200) {
				console.log('done');
				result_wrap.classList = ' ';
				results(this.response.data.posts);
			}
		};

		xhttp.open('POST', my_log.ajaxurl, true);

		xhttp.setRequestHeader('Data-type', 'json');
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send(urlEncodedData);
	};

	function results(search_results) {
		console.log(search_results);

		var hostname = window.location.hostname;
		var protocol = window.location.protocol;
		var siteurl = protocol + '//' + hostname;
		console.log(siteurl);

		for (var i = 0; i < search_results.length; i++) {
			var p = document.createElement('p');
			var title = search_results[i].post_title;
			var link =
				'<a href="' +
				siteurl +
				'/3together/project/' +
				search_results[i].post_name +
				'">' +
				search_results[i].post_title +
				'</a>';
			p.innerHTML = link;
			document.getElementById('results').appendChild(p);
		}
	}

	// Private methods

	function build() {
		var content, contentHolder, docfrag;

		docfrag = document.createDocumentFragment();

		this.modal = document.createElement('div');
		this.modal.className = 'inti-modal ' + this.options.className;
		this.modal.style.minWidth = this.options.minWidth + 'px';
		this.modal.style.maxWidth = this.options.maxWidth + 'px';

		if (this.options.closeButton === true) {
			this.closeButton = document.createElement('button');
			this.closeButton.className = 'inti-close close-button';
			this.closeButton.innerHTML = 'x';
			this.modal.appendChild(this.closeButton);
		}

		if (this.options.overlay === true) {
			this.overlay = document.createElement('div');
			this.overlay.className = 'inti-overlay ' + this.options.className;
			docfrag.appendChild(this.overlay);
		}

		content = this.content;

		contentHolder = document.createElement('div');
		contentHolder.className = 'inti-content';
		// contentHolder.innerHTML = content;

		/* search form */
		var form = document.createElement('div');
		form.setAttribute('id', 'search-form');
		form.className = 'search';

		var heading = document.createElement('h2');
		heading.innerHTML = 'Search';
		form.appendChild(heading);

		var input = document.createElement('input');
		input.setAttribute('type', 'search');
		input.setAttribute('id', 'search');
		form.appendChild(input);

		this.search_btn = document.createElement('button');
		this.search_btn.setAttribute('id', 'search_btn');
		this.search_btn.innerText = 'Go';

		form.appendChild(this.search_btn);

		var results = document.createElement('div');
		results.setAttribute('id', 'results');
		results.className = 'results';
		form.appendChild(results);

		contentHolder.appendChild(form);

		this.modal.appendChild(contentHolder);

		docfrag.appendChild(this.modal);

		document.body.appendChild(docfrag);
	}

	/*
	<div id="search">
		<h3>Search</h3>
		<input type="search" name="search" id="search_projects">
		<button class="search">Go</button>
		<div class="results"></div>
	</div>
	*/

	/**
     * override source properties with user provided properties
     * @param {*object} source 
     * @param {*object} properties 
     */
	function extendDefaults(source, properties) {
		var property;
		for (property in properties) {
			if (properties.hasOwnProperty(property)) {
				source[property] = properties[property];
			}
		}
		return source;
	}

	function initaliseEvents() {
		// using bind ensures we have the correct context when the callback is fired
		if (this.closeButton) {
			this.closeButton.addEventListener('click', this.close.bind(this));
		}

		if (this.overlay) {
			this.overlay.addEventListener('click', this.close.bind(this));
		}

		if (this.search_btn) {
			this.search_btn.addEventListener('click', this.search.bind(this));
		}
	}

	function transitionSelect() {
		var el = document.createElement('div');
		if (el.style.webkitTransition) return 'webkitTransitionEnd';
		if (el.style.OTransition) return 'OTransitionEnd';
		return 'transitionend';
	}
})();
