/**
 * LinkedIn JavaScript SDK
 * @param {*object} pledges // can be anything you need to pass to the SDK
 * @usage new Linkedin();
 */

(function() {
	this.Linkedin = function(pledges) {
		var pledges = pledges;

		IN.Event.on(IN, 'auth', this.shareContent(pledges));
	};

	function Success(data) {
		console.log(data);
	}

	function onError(error) {
		console.log(error);
	}

	Linkedin.prototype.shareContent = function(pledges) {
		var string = '';

		for (var pledge in pledges) {
			string += pledges[pledge] + ' ';
		}

		var payload = {
			comment: 'I made a pledge to ' + string + 'on NEENP.org.uk! http://neenp.org.uk!',
			visibility: {
				code: 'anyone'
			}
		};

		IN.API
			.Raw('/people/~/shares?format=json')
			.method('POST')
			.body(JSON.stringify(payload))
			.result(Success)
			.error(onError);
	};
})();
