// Test via a getter in the options object to see if the passive property is accessed
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

(function($) {
	window.addEventListener(
		'DOMContentLoaded',
		function() {
			$(document).ready(function() {
				$('.burger').on('click', function(event) {
					$(this).toggleClass('active');
					$('#responsive-menu').toggleClass('active');
				});

				$('li.menu-item-has-children').on('click', function() {
					$(this).children('.sub-menu').toggleClass('open');
				});

				// find elements
				var bucket_title = $('a.read_more');
				var bucket_info = $('.hide');

				// handle click and add class
				bucket_title.on('click', function() {
					console.log('hit');
					var open = $(this).parent().next(bucket_info).toggleClass('active').removeClass('unactive');
					if (!open.hasClass('active')) {
						open.toggleClass('unactive');
						$(this).text('READ MORE >');
					} else {
						$(this).text('READ LESS <');
					}
				});

				$('.carousel-module').owlCarousel({
					loop: true,
					nav: true,
					items: 1,
					dots: true,
					lazyLoad: true,
					margin: 10,
					video: true,
					itemElement: 'div class="image"',
					navText: [ '&larr;', '&rarr;' ]
					// responsive: {
					// 	0: {
					// 		items: 1
					// 	},
					// 	600: {
					// 		items: 3
					// 	},
					// 	960: {
					// 		items: 5
					// 	},
					// 	1200: {
					// 		items: 6
					// 	}
					// }
				});
			});
		},
		supportsPassive ? { passive: true } : false
	);
})(jQuery);

/**
 * Waypoints
 */
function waypoint(el) {
	var element = document.getElementById(el),
		windowHeight = window.innerHeight,
		elementDistance = element.getBoundingClientRect().top;
	elementBottom = element.getBoundingClientRect().bottom;

	if (elementDistance !== 0) {
		distanceToScroll = elementDistance - windowHeight;
	} else {
		distanceToScroll = elementBottom;
	}

	// console.log(windowHeight);
	// console.log(elementDistance);
	console.log(distanceToScroll);
	checkWayPoint(distanceToScroll);

	var logo = document.getElementById('logo');

	if (checkWayPoint(distanceToScroll)) {
		//console.log('waypoint shrink menu');
		element.className = 'shrink';
		// logo.setAttribute('class', 'shrink');
		logo.className = 'col-6 col-sm-2 logo attached-left shrink';
	} else {
		//console.log('enlarge menu');
		element.className = 'enlarge';
		// logo.setAttribute('class', 'enlarge');
		logo.className = 'col-6 col-sm-2 logo attached-left enlarge';
	}
}

/**
 * checkWayPoint
 * returns true if waypoint has been reached
 * @returns boolean
 * @param {*integer} distanceToScroll 
 * 
 * may be better to return the state of the waypoint ie top, bottom etc
 */
function checkWayPoint(distanceToScroll) {
	var waypoint, count;
	if (count >= 300) {
		waypoint = true;
	}
	// console.log(window.scrollY);
	if (window.scrollY < distanceToScroll) {
		// console.log('waypoint NOT reached');
		count++;
		waypoint = false;
		return false;
	} else if (window.scrollY === 0) {
		// console.log('TOP Reached');
	} else if (window.scrollY > distanceToScroll) {
		// console.log('waypoint reached');
		waypoint = true;
		return true;
	}
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

function update() {
	ticking = false;
	var currentScrollY = lastKnownScrollY;
	var waypoints = [ 'site-header' ];
	for (var index = 0; index < waypoints.length; index++) {
		var element = waypoints[index];

		waypoint(element);
	}
}

console.log('main');
// window.addEventListener('scroll', onScroll, false);
// window.addEventListener('scroll', onScroll, supportsPassive ? { passive: true } : false);

// Use our detect's results. passive applied if supported, capture will be false either way.
