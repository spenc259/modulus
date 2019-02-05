(function() {
	this.Waypoint = function() {
		this.point = {}; // reference the current waypoint

		var defaults = {}; // define default options

		// assign arguments
		if (arguments[0] && typeof arguments[0] === 'object') {
			this.options = extendDefaults(defaults, arguments[0]);
		}
	};

	Waypoint.prototype.checkWayPoint = function(distanceToScroll) {
		if (window.scrollY < distanceToScroll) {
			return false;
		} else if (window.scrollY >= distanceToScroll) {
			waypoint = true;
			return true;
		}
	};

	/**
     * Override defaults with user supplied options
     * @param {object} source 
     * @param {object} properties 
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

	/**
     * Debounce Scrolling
     */
	var lastKnownScrollY = 0,
		ticking = false;

	function onScroll() {
		lastKnownScrollY = window.scrollY;
		requestTick();
	}

	function requestTick() {
		if (!ticking) {
			requestAnimationFrame(update);
		}
		ticking = true;
	}

	// Test via a getter in the options object to see if the passive property is accessed
	// performance tweek
	var supportsPassive = false;
	try {
		var opts = Object.defineProperty({}, 'passive', {
			get: function() {
				supportsPassive = true;
			}
		});
		window.addEventListener('testPassive', null, opts);
		window.removeEventListener('testPassive', null, opts);
	} catch (e) {}

	window.addEventListener('scroll', onScroll, supportsPassive ? { passive: true } : false);
})();
