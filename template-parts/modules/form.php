<?php 

// $form_data = array(
// 	'ajaxurl' => admin_url( 'admin-ajax.php' )
// );
// wp_localize_script( 'modal', 'form', $form_data );

?>

<div id="myform">
	<div class="name">
		<input type="text" name="name" placeholder="Name*" id="name">
	</div>
	<div class="website">
		<input type="text" name="website" placeholder="Website*" id="website">
	</div>
	<div class="email">
		<input type="email" name="email" placeholder="Email*" id="email">
	</div>
	<div class="submit">
		<button type="submit" id="submit">Contact Us</button>
	</div>
</div>





<script type="text/javascript">
	// handle form validation
	(function(){
		window.addEventListener('DOMContentLoaded', function(){

			var submit = document.getElementById('submit');
			var errorwrap = document.createElement('div');
			errorwrap.className = 'error-wrap';

			submit.addEventListener('click', function(){
				validform();
			});

			function validform(){
				var valid = true;
				var errors = {};
				var data = {};

				var inputs = document.getElementById("myform").getElementsByTagName("input");
				

				for (var i = 0; i < inputs.length; i++) {
					
					
					
					if ( !inputs[i].value && inputs[i].name !== 'website') {
						errors[inputs[i].name] = 'Please Enter a ' + inputs[i].name;
						valid = false;
					}

					if ( inputs[i].value && inputs[i].name === 'website') {
						console.log('we have a spam bot return');
						valid = false;
					}

					if ( inputs[i].value && inputs[i].name === 'email' ) {
						console.log('email test');
						var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						if ( ! re.test(inputs[i].value ) ) {
							valid = false;
							errors[inputs[i].name] = 'Please Enter a valid ' + inputs[i].name;
						} else {
							data[inputs[i].value];
						}
					}

					data[inputs[i].name] = inputs[i].value;

				}



				if (valid) {
					// console.log(data);
					console.log('valid');
					sendForm(data);
				} else {
					// console.log(errors);
					console.log('we have errors');
					showErrors(errors);
				}
			}

			function showErrors(errors){

				
				errorwrap.innerHTML = '';

				for ( var prop in errors ) {
					errorwrap.innerHTML += '<p>' + errors[prop] + '</p>';
				}

				var form = document.getElementById("myform");
				form.prepend(errorwrap);

			}

			function sendForm(data) {
				
				data.action = "my_form";
				console.log(data);

				var params = "action=my_form";

				var urlEncodedData = "";
				var urlEncodedDataPairs = [];
				var name;

				// Turn the data object into an array of URL-encoded key/value pairs.
				for(name in data) {
					urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
				}

				// Combine the pairs into a single string and replace all %-encoded spaces to 
				// the '+' character; matches the behaviour of browser form submissions.
				urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

				errorwrap.innerHTML = '';
				var xhttp = new XMLHttpRequest();
				xhttp.open("POST", '<?php echo admin_url("admin-ajax.php"); ?>', true);

				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						console.log(this.responseText);
					}
				};
				
				// xhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
				xhttp.setRequestHeader("Data-type", "json");
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				// xhttp.setRequestHeader("Content-length", data.length);
				// xhttp.setRequestHeader("Connection", "close");
				xhttp.send(urlEncodedData);
			}

		});
	})();
</script>

