// (function($) {
// 	var data = {
// 		action: 'ajax_get_events'
// 	};

// 	$('#calendar').fullCalendar({
// 		events: function(start, end, timezone, callback) {
// 			var request = $.post(ajax_get_events.ajaxurl, data, function(response) {
// 				console.log(response);
// 			});

// 			// Callback handler that will be called on success
// 			request.done(function(response, textStatus, jqXHR) {
// 				var events = [];
// 				response.data.forEach((element) => {
// 					events.push({
// 						title: element.title,
// 						start: element.start,
// 						end: element.end,
// 						color: element.event_color
// 					});
// 				});
// 				callback(events);
// 			});

// 			// Callback handler that will be called on failure
// 			request.fail(function(jqXHR, textStatus, errorThrown) {
// 				// Log the error to the console
// 				console.error('The following error occurred: ' + textStatus, errorThrown);
// 				// $('.loader-wrap').hide();
// 			});
// 		}
// 	});
// })(jQuery);
