(function() {
	var btn = $('.acf-field .acf-input .selected input[name="acf[field_5c5abec6e9931]"]');
	btn.on('click', function(e) {
		var data = {
			action: 'get_soups',
			id: get_soups.postID
		};

		var request = $.post(get_soups.ajaxurl, data, function(response) {});

		request.done(function(response, textStatus, jqXHR) {
			console.log(response);
			console.log(textStatus);
			console.log(jqXHR);
		});

		request.fail(function(jqXHR, textStatus, errorThrown) {
			console.error('The following error occurred: ' + textStatus, errorThrown);
			console.error('The jqXHR Object: ' + jqXHR);
		});
	});
})($);
