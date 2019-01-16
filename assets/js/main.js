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

				/**
				 * Slick Slider
				 */
				if (!$('.slider').hasClass('.slick-initialized')) {
					$('.slider').slick({
						infinite: true,
						slidesToShow: 3,
						slidesToScroll: 1,
						speed: 1000,
						centerMode: true,
						centerPadding: '0',
						prevArrow:
							'<button class="slick-prev slick-arrow" aria-label="Prev" type="button" style="display: inline-block;"><i class="fa fa-chevron-left red" aria-hidden="true"></i></button>',
						nextArrow:
							'<button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: inline-block;"><i class="fa fa-chevron-right red" aria-hidden="true"></i></button>'
						// responsive: [
						// 	{
						// 		breakpoint: 991,
						// 		settings: {
						// 			arrows: false,
						// 			centerMode: false,
						// 			slidesToShow: 1
						// 		}
						// 	}
						// ]
					});
				}
			});
		},
		supportsPassive ? { passive: true } : false
	);
})(jQuery);

/**
 * Waypoints
 */
function waypoint(el) {
	var element = document.getElementById(el);

	if (element) {
		var elementBottom = element.getBoundingClientRect().bottom,
			header = document.getElementById('home-header'),
			distanceToScroll = elementBottom;
	}

	checkWayPoint(distanceToScroll);

	if (checkWayPoint(distanceToScroll)) {
		if (header) {
			element.className = 'shrink';
			header.className = 'shrink';
			element.setAttribute(
				'src',
				'https://wordpress.test/redemption/wp-content/themes/intimation-pro/assets/img/Redemption-master-logo.png'
			);
		}
	} else {
		if (header) {
			element.className = 'large';
			header.className = 'large';
			element.setAttribute(
				'src',
				'https://wordpress.test/redemption/wp-content/themes/intimation-pro/assets/img/Redemption-master-logo-white.png'
			);
		}
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
	let waypoint = false;

	if (window.scrollY < distanceToScroll) {
		return false;
	} else if (window.scrollY >= distanceToScroll) {
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

	var waypoints = [ 'home-logo' ];
	for (var index = 0; index < waypoints.length; index++) {
		var element = waypoints[index];
		waypoint(element);
	}
}

window.addEventListener('scroll', onScroll, supportsPassive ? { passive: true } : false);
