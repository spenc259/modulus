(function($) {
	var data = {
		action: 'ajax_get_projects'
	};

	$('#calendar').fullCalendar({
		// defaultView: 'list',
		windowResize: function(view) {
			if ($(window).width() < 514) {
				$('#calendar').fullCalendar('changeView', 'list');
			} else {
				$('#calendar').fullCalendar('changeView', 'month');
			}
		},
		events: function(start, end, timezone, callback) {
			var request = $.post(ajax_get_projects.ajaxurl, data, function(response) {
				console.log(ajax_get_projects.ajaxurl);
			});

			// Callback handler that will be called on success
			request.done(function(response, textStatus, jqXHR) {
				var events = [];
				response.data.forEach((element) => {
					events.push({
						tasks: element.tasks.forEach((task) => {
							events.push({
								project_title: element.title,
								link: element.link,
								status: element.status,
								title: task.event.post_title,
								start: task.event.post_date,
								color: element.color
							});
						})
					});
				});
				callback(events);
			});

			// Callback handler that will be called on failure
			request.fail(function(jqXHR, textStatus, errorThrown) {
				// Log the error to the console
				console.error('The following error occurred: ' + textStatus, errorThrown);
				// $('.loader-wrap').hide();
			});
		},
		eventRender: function(event, element) {
			element.prepend(
				'<div class="project-title"><a href="' + event.link + '">' + event.project_title + '</a></div>'
			);
			element.append('<div class="status">' + event.status + '</div>');
		}
	});
})(jQuery);
