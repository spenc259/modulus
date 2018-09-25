(function() {
	// Helpers
	var qs = document.querySelector.bind(document);
	var qsa = document.querySelectorAll.bind(document);

	// Cache DOM elements
	var icons2 = qsa('#radar-icons2 path');
	var gradient = qsa('#radar-gradient');
	var hand = qs('#radar-hand');

	TweenMax.set(icons2, {
		transformOrigin: 'center',
		opacity: 0,
		scale: 0.5
	});

	new TimelineMax({
		repeat: -1,
		repeatDelay: 1
	});

	TweenMax.to(hand, 10, {
		transformOrigin: 'center bottom',
		rotation: 360,
		ease: Power0.easeOut,
		repeat: -1
	});

	TweenMax.to(gradient, 4, {
		transformOrigin: 'center',
		rotation: 360,
		ease: Power0.easeOut,
		repeat: -1
	});

	icons2 = [].map
		.call(icons2, function(i) {
			return i;
		})
		.reverse();
	[].forEach.call(icons2, function(icon2, index) {
		new TimelineMax({
			repeat: -1,
			delay: index * 0.5,
			repeatDelay: 2
		})
			.to(icon2, 0.5, {
				opacity: 1
			})
			.to(
				icon2,
				1.5,
				{
					scale: 1.25
				},
				'-=.5'
			)
			.to(
				icon2,
				1,
				{
					opacity: 0
				},
				'-=.5'
			);
	});
})();
