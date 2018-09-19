<?php 

// $form_data = array(
// 	'ajaxurl' => admin_url( 'admin-ajax.php' )
// );
// wp_localize_script( 'modal', 'form', $form_data );

?>

<div class="container">

<div class="row">

<h3>Our Cover Levels</h3>

<table>
	<thead>
		<tr>
			<th>Product</th>
			<th>Number of Callouts</th>
			<th>Roadside Assist</th>
			<th>Nationwide Recovery</th>
			<th>Home Assist</th>
			<th>Alternative Travel</th>
			<th>Overnight Accomodataion</th>
			<th>European Breakdown</th>
			<th>£</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="bronze">Bronze</td>
			<td>1</td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td></td>
			<td></td>
			<td></td>
			<td>from £23.50*</td>
		</tr>
		<tr>
			<td class="silver">Silver</td>
			<td>6</td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>from £22.99*</td>
		</tr>
		<tr>
			<td class="gold">Gold</td>
			<td>6</td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td></td>
			<td>from £27.99*</td>
		</tr>
		<tr>
			<td class="platinum">Platinum</td>
			<td>6</td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td class="check"><i class="fas fa-check"></i></td>
			<td>from £59.99*</td>
		</tr>
	</tbody>
</table>
</div>
<div class="row">
<button type="button" class="small col-auto m-auto">Get a quick quote</button>
</div>
<div class="row steps">
	<div class="col step-number">
		<span class="stp1 number active">1</span>
		<p class="text">Customer <br>Details</p>
	</div>
	<div class="col spacer"></div>
	<div class="col step-number">
		<span class="stp2 number">2</span>
		<p class="text">Vehicle <br>Details</p>
	</div>
	<div class="col spacer"></div>
	<div class="col step-number">
		<span class="stp3 number">3</span>
		<p class="text">Cover <br>Confirmation</p>
	</div>
	<div class="col spacer"></div>
	<div class="col step-number">
		<span class="stp4 number">4</span>
		<p class="text">Payment</p>
	</div>
	<div class="col spacer"></div>
	<div class="col step-number">
		<span class="stp5 number"><i class="fas fa-check"></i></span>
		<p class="text">Complete Your <br>Purchase</p>
	</div>
</div>

<div id="myform" class="row">

	<div id="step1" class="step col-12 active">
		<div class="row">
			<div class="col-6 title">
				<input type="text" class="w-100 mb-2" name="title" placeholder="title*" id="title">
			</div>
			<div class="col-6 forename">
				<input type="text" class="w-100 mb-2" name="forename" placeholder="forename*" id="forename">
			</div>
			<div class="col-6 surname">
				<input type="text" class="w-100 mb-2" name="surname" placeholder="surname*" id="surname">
			</div>
			<div class="col-6 postcode">
				<input type="text" class="w-100 mb-2" name="postcode" placeholder="postcode*" id="postcode">
			</div>
			<div class="col-6 address">
				<textarea type="textarea" class="w-100 mb-2" name="address1" placeholder="address*" id="address1"></textarea>
			</div>
			<div class="col-6 telephone">
				<input type="text" class="w-100 mb-2" name="telephone" placeholder="telephone*" id="telephone">
			</div>
			<div class="col-6 email">
				<input type="text" class="w-100 mb-2" name="email" placeholder="email*" id="email">
			</div>
			<div class="w-100"></div>
			<div class="col-auto mr-auto">
				<!-- <button type="submit" class="btn1 small col-auto prev">start</button> -->
			</div>
			<div class="col-auto">
				<button type="submit" class="btn1 advance small col-auto active">Advance to step 2</button>
			</div>
		</div>
	</div>

	<!-- Step 2 -->
	<div id="step2" class="step col-12">
		<div class="col-6 vehicle_registration">
			<input type="text" class="w-100 mb-2" name="vehicle_registration" placeholder="vehicle_registration*" id="vehicle_registration">
			<button type="submit" class="btn2 soap small col-auto">Get Car details</button>
		</div>
		<div class="w-100 mb-2"></div>
		<div class="col-6 chassis_number">
			<input type="text" class="w-100 mb-2" name="chassis_number" placeholder="chassis_number*" id="chassis_number">
		</div>
		<div class="col-6 vehicle_make">
			<input type="text" class="w-100 mb-2" name="vehicle_make" placeholder="vehicle_make*" id="vehicle_make">
		</div>
		<div class="col-6 type">
			<input type="text" class="w-100 mb-2" name="type" placeholder="type*" id="type">
		</div>
		<div class="col-6 engine_size">
			<input type="text" class="w-100 mb-2" name="engine_size" placeholder="engine_size*" id="engine_size">
		</div>
		<div class="col-6 fuel_type">
			<input type="text" class="w-100 mb-2" name="fuel_type" placeholder="fuel_type*" id="fuel_type">
		</div>
		<div class="col-6 transmission">
			<input type="text" class="w-100 mb-2" name="transmission" placeholder="transmission*" id="transmission">
		</div>
		<div class="col-6 date_of_registration">
			<input type="text" class="w-100 mb-2" name="date_of_registration" placeholder="date_of_registration*" id="date_of_registration">
		</div>
		<div class="col-6 mileage">
			<input type="text" class="w-100 mb-2" name="mileage" placeholder="mileage*" id="mileage">
		</div>
		<div class="w-100"></div>
		<div class="col-auto mr-auto">
			<button type="submit" class="btn2 prev small col-auto">go back to step 1</button>
		</div>
		<div class="col-auto">
			<button type="submit" class="btn2 advance small col-auto  active">Advance to step 3</button>
		</div>
	</div>

	<!-- Step 3 -->
	<div id="step3" class="step col-12">
		<div class="col-6 policy_start_date">
			<input type="date" class="w-100 mb-2" name="policy_start_date" placeholder="policy_start_date*" id="policy_start_date">
		</div>
		<div class="col-6 cover_level">
			<select name="cover_level" class="w-100 mb-2" id="cover_level">
				<option value="bronze">bronze</option>
				<option value="silver">silver</option>
				<option value="gold">gold</option>
				<option value="platinum">platinum</option>
			</select>
		</div>
		<div class="col-6 duration">
			<p class="w-100 mb-2">
				Duration: 12 Months
			</p>
		</div>
		<div class="col-6 policy_cost_to_customer">
			<p class="w-100 mb-2">
				Policy Cost: 
			</p>
		</div>
		<div class="w-100"></div>
		<div class="col-auto mr-auto">
			<button type="submit" class="btn3 prev small col-auto">go back to step 2</button>
		</div>
		<div class="col-auto">
			<button type="submit" class="btn3 advance small col-auto advance">Advance to step 4</button>
		</div>
		<!-- <button type="submit" class="btn3 small col-auto ml-auto advance">Advance to step 4</button> -->
	</div>

	<!-- Step 4 - Payment -->
	<div id="step4" class="step col-12">
		<div class="col">
			insert payment provider here
		</div>
		<div class="w-100"></div>
		<div class="col-auto mr-auto">
			<button type="submit" class="btn4 prev small col-auto">go back to step 3</button>
		</div>
		<div class="col-auto">
			<button type="submit" class="btn4 advance small col-auto advance">Advance to step 5</button>
		</div>
	</div>

	<!-- Step 5 - complete your purchase -->
	<div id="step5" class="step col-12">
		<div class="col">
			Thank you for your purchase!
		</div>
	</div>

	

</div><!-- end .form -->

</div>

<script type="text/javascript">
	// handle form validation
	(function(){
		window.addEventListener('DOMContentLoaded', function(){
			

			function currentActiveButton( step ){
				var buttons = document.getElementsByTagName("button");
				var btn = document.getElementsByClassName('btn' + step + ' advance');
				console.log(btn);
				
				btn[0].addEventListener('click', function(){
					validform( step );
					btn[0].classList.remove('active');
				});

				var prev = document.getElementsByClassName('btn' + step + ' prev');
				console.log(prev);
				
				prev[0].addEventListener('click', function(){
					displayPrevStep( step );
					prev[0].classList.remove('active');
				});

				var soap = document.getElementsByClassName('soap');
				console.log(soap);

				soap[0].addEventListener('click', function(){
					soapRequest( validform( step ) );
				})
			}

			function validform( step ){
				var valid = true;
				var errors = {};
				var data = {};

				var inputs = document.getElementById("step" + step).getElementsByTagName("input");

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

				if (step == 2) {
					return data;
				} else {
					if (valid) {
						// console.log(data);
						console.log('valid');
						console.info('Form is valid, move on to next step');
						displayNextStep( step );

						// add a check if not null
						errorwrap.innerHTML = '';
						errorwrap.parentNode.removeChild(errorwrap);
						//sendForm(data);
					} else {
						// console.log(errors);
						console.log('we have errors');
						showErrors(errors);
					}
				}

				
				
			}

			function displayNextStep( stepNumber  ){
				// hide current step
				document.getElementById( 'step' + stepNumber ).classList = 'step d-none';
				var stp_btn = document.getElementsByClassName('stp' + stepNumber);
				
				stepNumber++;

				var step = document.getElementById( 'step' + stepNumber ).classList = 'step active d-flex';
				var stp_btn = document.getElementsByClassName('stp' + stepNumber);

				stp_btn[0].classList.add('active');
				currentActiveButton( stepNumber );
			}

			function displayPrevStep( stepNumber ) {
				// hide current step
				document.getElementById( 'step' + stepNumber ).classList = 'step d-none';
				var stp_btn = document.getElementsByClassName('stp' + stepNumber);

				var stp_btn = document.getElementsByClassName('stp' + stepNumber);
				stp_btn[0].classList.remove('active');
				
				stepNumber--;

				var step = document.getElementById( 'step' + stepNumber ).classList = 'step active d-flex';
				currentActiveButton( stepNumber );
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

			function soapRequest(data) {
				console.log("SOAP");
				data.action = 'soap_request';
				var params = 'action=soap_request';
				var urlEncodedData = '';
				var urlEncodedDataPairs = [];
				var name;
				for (name in data) {
					urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
				}

				urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

				var xhttp = new XMLHttpRequest();
				xhttp.open("POST", '<?php echo admin_url("admin-ajax.php"); ?>', true);
				
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						// console.log(this.responseText);
						var data = JSON.parse(this.responseText);

						for (var key in data) {
							if (data.hasOwnProperty(key)) {
								console.log(data[key]);
								for ( var k in data[key] ) {
									if (data[key].hasOwnProperty(k)) {
										console.log(k);
										console.log(data[key][k]);
									}
								}
								// var vrm = data[key].VRM_Curr;
								// console.log( vrm );
							}
						}
					}
				};

				xhttp.setRequestHeader("Data-type", "json");
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send(urlEncodedData);
			}
			
			var errorwrap = document.createElement('div');
			errorwrap.className = 'error-wrap';

			var step = 1;
			currentActiveButton( step );

		});
	})();
</script>

<!-- MAKE SOAP REQUEST 
		POST /CarwebVrrB2Bproxy/CarwebVrrWebService.asmx HTTP/1.1
Host: www2.carwebuk.com
Content-Type: text/xml; charset=utf-8
Content-Length: length
SOAPAction: "http://ws.carwebuk.com/strVRRGetVehicle"

<?//xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
	<soap:Body>
    <strVRRGetVehicle xmlns="http://ws.carwebuk.com">
		<strUserName>string</strUserName>
		<strPassword>string</strPassword>
		<strClientRef>string</strClientRef>
		<strClientDescription>string</strClientDescription>
		<strKey1>string</strKey1>
		<strKey2>string</strKey2>
		<strVRM>string</strVRM>
		<strVIN>string</strVIN>
		<strVersion>string</strVersion>
    </strVRRGetVehicle>
	</soap:Body>
</soap:Envelope>
-->
