//* Lazy Load implementation *//

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

/*

create an array of elements that need to be lazy loaded
if element is in the waypoint switch the data-image with the source and remove the element from the array to be loaded

*/

/**
 * Lazy Load
 */
function lazyLoad(element) {
	var elements = element.querySelectorAll('.lazy');

	// perform attribute switch
	for (var i = 0; i < elements.length; i++) {
		if (elements[i].getAttribute('data-image') !== '') {
			elements[i].src = elements[i].getAttribute('data-image');
			if (elements[i].nodeName == 'DIV') {
				elements[i].style.backgroundImage = "url('" + elements[i].getAttribute('data-image') + "')";
			}
		}
	}

	return (elements = []);
}

/**
 * Waypoints
 */
function waypoint(el) {
	var element = document.getElementById(el),
		windowHeight = window.innerHeight,
		elementDistance = element.getBoundingClientRect().top,
		distanceToScroll = elementDistance - windowHeight;

	checkWayPoint(distanceToScroll);

	if (checkWayPoint(distanceToScroll)) {
		lazyLoad(element);
	}
}

function checkWayPoint(distanceToScroll) {
	var waypoint, count;
	if (count > 10) {
		waypoint = true;
	}
	if (window.scrollY < distanceToScroll) {
		// console.log('waypoint NOT reached');
		count++;
		waypoint = false;
		return false;
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
	var waypoints = [ 'hero', 'icons', 'results', 'fixture_detail', 'league_news', 'news', 'cta', 'sponsors', 'page' ];
	for (var index = 0; index < waypoints.length; index++) {
		var element = waypoints[index];

		waypoint(element);
	}
}

// window.addEventListener('scroll', onScroll, false);
window.addEventListener('scroll', onScroll, supportsPassive ? { passive: true } : false);

// Use our detect's results. passive applied if supported, capture will be false either way.
