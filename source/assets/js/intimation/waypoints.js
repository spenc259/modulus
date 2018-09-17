/**
 * Waypoints
 * @version 0.1
 */

/*
TODO: 
    - allow classes or distances to be set
    - move to oop for plugin style to allow new Waypoint( element ) syntax
    - add commenting, licence info and credits
*/
function waypoint(el) {
	// can be improved to allow classes or distances
	var element = document.getElementById(el),
		windowHeight = window.innerHeight,
		elementDistance = element.getBoundingClientRect().top,
		distanceToScroll = elementDistance - windowHeight;
	// console.log(windowHeight);
	// console.log(elementDistance);
	// console.log(distanceToScroll);
	checkWayPoint(distanceToScroll);

	if (checkWayPoint(distanceToScroll)) {
		//lazyLoad(element);
		// console.log('waypoint');
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

// console.log('main');
// window.addEventListener('scroll', onScroll, false);
window.addEventListener('scroll', onScroll, supportsPassive ? { passive: true } : false);

// Use our detect's results. passive applied if supported, capture will be false either way.
