<?php 

include('form-table.php');

$_SESSION['START'] = 'start';
?>

<div class="row steps mb-4 mt-4">
	<div class="col step-number">
		<span class="stp1 number active">1</span>
		<p class="text d-none d-sm-block">Customer <br>Details</p>
	</div>
	<div class="col spacer d-none d-lg-block spacer1 active"></div>
	<div class="col step-number">
		<span class="stp2 number">2</span>
		<p class="text d-none d-sm-block">Vehicle <br>Details</p>
	</div>
	<div class="col spacer d-none d-lg-block spacer2"></div>
	<div class="col step-number">
		<span class="stp3 number">3</span>
		<p class="text d-none d-sm-block">Cover <br>Confirmation</p>
	</div>
	<div class="col spacer d-none d-lg-block spacer3"></div>
	<div class="col step-number">
		<span class="stp4 number">4</span>
		<p class="text d-none d-sm-block">Payment</p>
	</div>
	<div class="col spacer d-none d-lg-block spacer4"></div>
	<div class="col step-number">
		<span class="stp5 number"><i class="fas fa-check"></i></span>
		<p class="text d-none d-sm-block">Complete Your <br>Purchase</p>
	</div>
</div>

<div id="myform" class="row">
	<div class="loader-wrap">
		<div id="loader" class="loader">
			<span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
		</div>
	</div>
	<div id="step1" class="step col-12 active">
		<div class="row">
			<div class="col-sm-6 title">
				<input type="text" class="w-100 mb-2" name="title" placeholder="title*" id="title">
			</div>
			<div class="col-sm-6 forename">
				<input type="text" class="w-100 mb-2" name="forename" placeholder="forename*" id="forename">
			</div>
			<div class="col-sm-6 surname">
				<input type="text" class="w-100 mb-2" name="surname" placeholder="surname*" id="surname">
			</div>
			<div class="col-sm-6 postcode">
				<input type="text" class="w-100 mb-2" name="postcode" placeholder="postcode*" id="postcode">
			</div>
			<div class="col-sm-6 address">
				<textarea type="textarea" class="w-100 mb-2" name="address1" placeholder="address*" id="address1"></textarea>
			</div>
			<div class="col-sm-6 telephone">
				<input type="text" class="w-100 mb-2" name="telephone" placeholder="telephone*" id="telephone">
			</div>
			<div class="col-sm-6 email">
				<input type="text" class="w-100 mb-2" name="email" placeholder="email*" id="email">
			</div>
			<div class="w-100"></div>
			<div class="col-12 my-2">
				<h3>Account Details</h3>
				<p>In order to view your documents at a later date you will need to create a username.</p>
			</div>
			<div class="col-sm-6 username">
				<input type="text" class="w-100 mb-2" name="username" placeholder="username*" id="username">
			</div>
			<div class="col-sm-6 password">
				<input type="password" class="w-100 mb-2" name="password" placeholder="password*" id="password">
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

		
		<div class="col-sm-6 vehicle_registration">
			<input type="text" class="w-100 mb-2" name="vehicle_registration" placeholder="vehicle_registration*" id="vehicle_registration">
			<button type="submit" class="btn2 soap small col-auto">Get Car details</button>
		</div>
		<div class="w-100 mb-2"></div>
		<!-- 
		<div class="col-sm-6 chassis_number">
			<input type="text" class="w-100 mb-2" name="chassis_number" placeholder="chassis_number*" id="chassis_number"> 
		</div>
		-->
		<div class="col-sm-6 vehicle_make">
			<input type="text" class="w-100 mb-2" name="vehicle_make" placeholder="vehicle_make*" id="vehicle_make">
		</div>
		<div class="col-sm-6 type">
			<input type="text" class="w-100 mb-2" name="type" placeholder="type*" id="type">
		</div>
		<div class="col-sm-6 engine_size">
			<input type="text" class="w-100 mb-2" name="engine_size" placeholder="engine_size*" id="engine_size">
		</div>
		<div class="col-sm-6 fuel_type">
			<input type="text" class="w-100 mb-2" name="fuel_type" placeholder="fuel_type*" id="fuel_type">
		</div>
		<div class="col-sm-6 transmission">
			<input type="text" class="w-100 mb-2" name="transmission" placeholder="transmission*" id="transmission">
		</div>
		<!--
		<div class="col-sm-6 date_of_registration">
			<input type="text" class="w-100 mb-2" name="date_of_registration" placeholder="date_of_registration*" id="date_of_registration">
		</div>
		-->
		<!-- <div class="col-sm-6 mileage">
			<input type="text" class="w-100 mb-2" name="mileage" placeholder="Approx mileage*" id="mileage">
		</div> -->
		<div class="w-100"></div>
		<div class="col-auto mr-auto mb-2 mb-sm-0">
			<button type="submit" class="btn2 prev small col-auto">go back to step 1</button>
		</div>
		<div class="col-auto">
			<button type="submit" class="btn2 advance small col-auto  active">Advance to step 3</button>
		</div>
	</div>

	<!-- Step 3 -->
	<div id="step3" class="step col-12">
		<div class="col-sm-6 policy_start_date">
			<input type="date" class="w-100 mb-2" name="policy_start_date" placeholder="policy_start_date*" id="policy_start_date">
		</div>
		<div class="col-sm-6 cover_level">
			<select name="cover_level" class="w-100 mb-2" id="cover_level">
				<option value="" selected>Select Cover Level</option>
				<option value="bronze">Bronze One Cover</option>
				<option value="silver">Silver</option>
				<option value="silverxs">Silver (XS)</option>
				<option value="gold">Gold</option>
				<option value="goldxs">Gold (XS)</option>
				<option value="platinum">Platinum</option>
				<option value="platinumxs">Platinum (XS)</option>
			</select>
		</div>
		<div class="col-sm-6 duration">
			<p class="w-100 mb-2">
				<input type="text" name="duration" class="w-100 mb-2" id="duration" disabled placeholder="" value="12 Months">
			</select>
			</p>
		</div>
		<div class="col-sm-6 policy_cost_to_customer">
			<p class="w-100 mb-2" >
				<input type="text" id="policy_cost_to_customer" disabled placeholder="Policy Cost" value="Policy Cost:">  
				<input type="hidden" class="w-100 mb-2" name="age_of_vehicle" id="age_of_vehicle" disabled placeholder="age_of_vehicle">
				<input type="hidden" class="w-100 mb-2" name="final_policy" id="final_policy" disabled placeholder="final_policy">
			</p>
		</div>
		<div class="w-100"></div>
		<div class="col-auto mr-auto mb-2 mb-sm-0">
			<button type="submit" class="btn3 prev small col-auto">go back to step 2</button>
		</div>
		<div class="col-auto">
			<button type="submit" class="btn3 advance small col-auto advance">Advance to step 4</button>
		</div>
		<!-- <button type="submit" class="btn3 small col-auto ml-auto advance">Advance to step 4</button> -->
	</div>

	<!-- Step 4 - Payment -->
	<div id="step4" class="step col-12">
		

		
		<div class="col-12 mb-2">
			<h3>Vehicle Summary</h3>
		</div>

		<div class="col-sm-6 vehicle_registration">
			<input type="text" class="w-100 mb-2" name="vehicle_registration2" disabled placeholder="vehicle_registration*" id="vehicle_registration2">
		</div>

		<div class="col-sm-6 vehicle_make">
			<input type="text" class="w-100 mb-2" name="vehicle_make2" disabled placeholder="vehicle_make*" id="vehicle_make2">
		</div>
		<div class="col-sm-6 type">
			<input type="text" class="w-100 mb-2" name="type2" disabled placeholder="type*" id="type2">
		</div>
		<div class="col-sm-6 engine_size">
			<input type="text" class="w-100 mb-2" name="engine_size2" disabled placeholder="engine_size*" id="engine_size2">
		</div>
		<div class="col-sm-6 fuel_type">
			<input type="text" class="w-100 mb-2" name="fuel_type2" disabled placeholder="fuel_type*" id="fuel_type2">
		</div>
		<div class="col-sm-6 transmission">
			<input type="text" class="w-100 mb-2" name="transmission2" disabled placeholder="transmission*" id="transmission2">
		</div>

		
		<div class="col-12 my-2">
			<h3>Your Details</h3>
		</div>

		<div class="col-sm-6 title">
			<input type="text" class="w-100 mb-2" name="title" disabled placeholder="title*" id="title2">
		</div>
		<div class="col-sm-6 forename">
			<input type="text" class="w-100 mb-2" name="forename" disabled placeholder="forename*" id="forename2">
		</div>
		<div class="col-sm-6 surname">
			<input type="text" class="w-100 mb-2" name="surname" disabled placeholder="surname*" id="surname2">
		</div>
		<div class="col-sm-6 postcode">
			<input type="text" class="w-100 mb-2" name="postcode" disabled placeholder="postcode*" id="postcode2">
		</div>
		<div class="col-sm-6 address">
			<textarea type="textarea" class="w-100 mb-2" name="address1" disabled placeholder="address*" id="address12"></textarea>
		</div>
		<div class="col-sm-6 telephone">
			<input type="text" class="w-100 mb-2" name="telephone" disabled placeholder="telephone*" id="telephone2">
		</div>
		<div class="col-sm-6 email">
			<input type="text" class="w-100 mb-2" name="email" disabled placeholder="email*" id="email2">
		</div>

		<div class="col-12">
			<h3>Policy Preferences</h3>
			<p>Please define your auto renew preference and also if you would like us to send your documents by post as well as email</p>
			<p><a href="https://pingbreakdown.co.uk/wp-content/themes/intimation-pro/inc/mpdf/pdfs/PING_Contract_of_Insurnce-Road_Rescue_16-7-18.pdf">Policy Wording</a>
			
		</div>

		<div class="col-sm-6 auto-renew">
			<div class="row">
				<label for="auto-renew" class="col-10">Cancel Auto renew of your policy after a year</label>
				<input type="checkbox" class="w-100 mb-2 col-2" name="auto-renew" placeholder="auto-renew*" id="auto_renew">
			</div>
			<div class="row">
				<label for="post-docs" class="col-10">Do you want your documents posted to you? ( +£2.50 )</label>
				<input type="checkbox" class="w-100 mb-2 col-2" name="post-docs" placeholder="post-docs*" id="post_docs">
			</div>
		</div>

		<div class="col-12 mb-2">
			<h3>Policy Summary</h3>
		</div>

		<!-- summary table -->
		<div class="col-12 summary">
			<table id="summary-table" class="mt-0">
				<thead>
					<tr>
						<th class="highlight"><span>Product</span></th>
						<th class="highlight"><span>Number of Callouts</th>
						<th class="highlight"><span>Roadside Assist</span></th>
						<th class="highlight"><span>Nationwide Recovery</span></th>
						<th class="highlight"><span>Home Assist</span></th>
						<th class="highlight"><span>Alternative Travel</span></th>
						<th class="highlight"><span>Overnight Accomodataion</span></th>
						<th class="highlight"><span>Driver illnes or injury</span></th>
						<th class="highlight"><span>Mis-Fuel</span></th>
						<th class="highlight"><span>European Breakdown</span></th>
						<th class="highlight"><span>Excess</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="bronze"><span></span></td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="col-sm-6 duration">
			<h5>Policy Duration</h5>
			<p class="w-100 mb-2">
				<input type="text" name="duration" class="w-100 mb-2" id="duration" disabled placeholder="" value="12 Months">
			</p>
		</div>

		<div class="col-sm-6 policy_start_date2">
			<h5>Policy Start Date</h5>
			<input type="date" class="w-100 mb-2" name="policy_start_date2" disabled placeholder="policy_start_date*" id="policy_start_date2">
		</div>

		<div class="col-sm-6 duration">
			<h5>Policy Cost</h5>
			<p class="w-100 mb-2">
				<input type="text" id="policy_cost_to_customer2" disabled placeholder="Policy Cost" value="Policy Cost:">
			</p>
		</div>
		
		<div class="col-12 my-2">
			<h3>Payment Details</h3>
			<p>
				Please double check all of the above info before making your payment. 
				If you would like to change any of the above information please use the buttons below.
			</p>
		</div>
		<div class="col-6">
			<p class="mb-0 mt-2">
				<img style="width: 150px;" src="<?php echo image('powered-by-stripe.png'); ?>" class='mb-5'>
			</p>
		</div>
		<div class="w-100"></div>

		<div class="col-sm-6 paymentinfo">
			<div type="text" class="w-100 mb-2" name="card-element" id="card-element"></div>
			<div id="card-errors" role="alert" class="mb-1"></div>
		</div>
		<div class="col-6">
			<span class="d-flex small mb-2 w-100">Enter your card details for the payment. </span>
			<!-- <span class="d-flex small mb-2 mt-2 w-100">TESTING CARD: 4242 4242 4242 4242 EXP: 01/19 CVC: 123 ZIP: 12345</span> -->
		</div>
		<div class="w-100"></div>
		
		
		<div class="col-6">
			<p class="mb-4 mt-2">
				<button class="btn btn-success" id="join-button">Make Payment</button>
			</p>
		</div>
		<div class="w-100"></div>
		
		<div class="col-auto mr-auto mb-2 mb-sm-0">
			<button type="submit" class="btn4 prev small col-auto">go back to step 3</button>
		</div>
		<div class="col-auto">
			<!-- <button type="submit" class="btn4 advance small col-auto advance">Advance to step 5</button> -->
		</div>
	</div>
	<!-- end Step 4 -->

	<!-- Step 5 - complete your purchase -->
	<div id="step5" class="step col-12">
		<div class="col">
			Thank you for purchasing your Ping Breakdown Insurance policy. Your policy summary and policy wording has been emailed to you using the email address supplied. If you have requested for hard copies to be forwarded to you in the post, please allow 5 working days for these to be received. 
		</div>
	</div>
	<!-- end Step 5 -->
	
</div>
<!-- end .form -->

<script src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
	// handle form validation
	(function(){
		window.addEventListener('DOMContentLoaded', function(){

			$('.loader').hide();

			// lets
			let level = document.getElementById("cover_level");
			let age = document.getElementById("age_of_vehicle");
			let costElement = document.getElementById("policy_cost_to_customer");
			let costElement2 = document.getElementById("policy_cost_to_customer2");
			let finalPolicy = document.getElementById("final_policy");
			let policyStartDate = document.getElementById("policy_start_date");
			let policyStartDate2 = document.getElementById("policy_start_date2");
			let username = document.getElementById("username");
			let soap = document.getElementsByClassName('soap');
			
			let table = document.getElementById("policy_table");
			let postDocs = document.getElementById("post_docs");



			table.classList.remove('d-flex');
			table.classList.add('d-none');

			/**
			 * Event listeners
			 */
			username.addEventListener( 'blur', function(){
				let data = {
					"username" : username.value
				}
				sendAjaxRequest(data, "checkUserName");
			}, true)



			level.addEventListener('change', function(){
				let cost = getPolicyCost(level.value, age.value)
			})

			soap[0].addEventListener('click', function(){
				errorwrap.innerHTML = '';
				soapRequest();
			})

			postDocs.addEventListener('change', (event) => {
				if (event.target.checked) {
					let cost = ( parseFloat( costElement2.value.substr( 14 ) ) + 2.5)
					costElement2.value = "Policy Cost: £" + cost;
				} else {
					costElement2.value = costElement.value;
				}
			})

			policyStartDate.addEventListener('change', () => {
				policyStartDate2.value = policyStartDate.value
			})

			/**
			 * Functions
			 */

			function getTable(level){
				let summary_table = document.getElementById('summary-table');
				let policy_elements = document.getElementsByClassName( level )

				summary_table.deleteRow(1);
				let row = summary_table.insertRow(1)

				for (let i = 0; i < policy_elements.length; i++ ) {
					let cell = row.insertCell(i)
					cell.innerHTML = policy_elements[i].innerHTML;
				}
			}

			function getPolicyCost(level, age) {
				$('.loader').show();
				let combined = level + age;
				let data = {
					"level" : level,
					"age"	: age
				}
				sendAjaxRequest(data, "getPolicyCost", displayPolicy);
				getTable(level)
			}

			function displayPolicy( response ) {
				
				errorwrap.innerHTML = '';
				
				if (errorwrap.parentNode !== null) {
					errorwrap.parentNode.removeChild(errorwrap);
				}

				let newresponse = JSON.parse(response)

				if (!newresponse.success) {
					// redirect to an error page
					showErrors('Sorry that plan is unavailable for your vehicle, please choose another plan')
					costElement.value = 'Sorry that plan is unavailable for your vehicle, please choose another plan';
					finalPolicy.value = false;
					$('.loader').hide();
					return;
				}

				costElement.value = "Policy Cost: £" + (newresponse.data.amount / 100 )
				costElement2.value = "Policy Cost: £" + (newresponse.data.amount / 100 )
				finalPolicy.value = newresponse.data.product
				$('.loader').hide();
			}

			function currentActiveButton( step ){
				let buttons = document.getElementsByTagName("button");
				let btn = document.getElementsByClassName('btn' + step + ' advance');
				let prev = document.getElementsByClassName('btn' + step + ' prev');

				if (btn.length !== 0) {
					btn[0].addEventListener('click', function(){
						validform( step );
						btn[0].classList.remove('active');
					});
				}

				if ( prev.length > 0) {
					prev[0].addEventListener('click', function(){
						displayPrevStep( step );
						prev[0].classList.remove('active');
					});
				}
			}

			function validform( step ){
				let valid = true;
				let errors = {};
				let data = {};
				let inputs = document.getElementById("step" + step).getElementsByTagName("input");

				for (let i = 0; i < inputs.length; i++) {
					if ( !inputs[i].value && inputs[i].name !== 'website') {
						errors[inputs[i].name] = 'Please Enter a ' + inputs[i].name;
						valid = false;
					}

					if ( inputs[i].value && inputs[i].name === 'website') {
						valid = false;
					}

					if ( inputs[i].value && inputs[i].name === 'email' ) {
						let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						if ( ! re.test(inputs[i].value ) ) {
							valid = false;
							errors[inputs[i].name] = 'Please Enter a valid ' + inputs[i].name;
						} else {
							// valid = true;
							data[inputs[i].value];
						}
					}

					if ( inputs[i].value && inputs[i].name === 'username' ) {
						// valid = false;

						let userdata = {
							"username" : inputs[i].value
						}
						sendAjaxRequest(userdata, "checkUserName", function (response) {
							let newresponse = JSON.parse(response)
							
							if (!newresponse.success) {
								valid = false;
								showErrors(newresponse.data);
								console.log('Success: False');
							}
						})
						
							// else {
							// 	console.log("username else")
							// 	for (var prop in errors) {
							// 		if (errors.hasOwnProperty(prop)) {
							// 			console.log("prop: ", prop);
										
							// 			// valid = false
							// 		} else {
							// 			console.log("prop False: ", prop);
							// 			errorwrap.remove()
							// 			displayNextStep( step );
							// 		}
							// 	}
							// }
						
					}


					data[inputs[i].name] = inputs[i].value;
				}

				console.log(step);
				

				if (step === 2 ) {
					table.classList.remove('d-none');
					table.classList.add('d-flex');
				}

				if (step === 2 ) {
					// get the values from the customer details and push the values to the final step
					document.getElementById('title2').value = document.getElementById('title').value
					document.getElementById('forename2').value = document.getElementById('forename').value
					document.getElementById('surname2').value = document.getElementById('surname').value
					document.getElementById('postcode2').value = document.getElementById('postcode').value
					document.getElementById('address12').value = document.getElementById('address1').value
					document.getElementById('telephone2').value = document.getElementById('telephone').value
					document.getElementById('email2').value = document.getElementById('email').value
				}

				console.log("valid: ", valid)
				console.log(errors);
				// console.log(errors.length);
				valid = true;

				if (valid) {
					sendAjaxRequest(data, "my_form");
					if ( step < 5 ) {
						displayNextStep( step );
					}
					errorwrap.innerHTML = '';
					if (errorwrap.parentNode !== null) {
						errorwrap.parentNode.removeChild(errorwrap);
					}
				} else {
					showErrors(errors);
				}
			}

			function displayNextStep( stepNumber  ){
				// hide any previous errors
				errorwrap.innerHTML = '';
				if (errorwrap.parentNode !== null) {
					errorwrap.parentNode.removeChild(errorwrap);
				}
				// hide current step
				document.getElementById( 'step' + stepNumber ).classList = 'step d-none';
				let stp_btn = document.getElementsByClassName('stp' + stepNumber);
				let spacer = document.getElementsByClassName('spacer' + stepNumber);
				if (spacer.length !== 0) {
					spacer[0].classList.add('complete');
				}
				stepNumber++;
				let step = document.getElementById( 'step' + stepNumber ).classList = 'step active d-flex';
				stp_btn = document.getElementsByClassName('stp' + stepNumber);
				spacer = document.getElementsByClassName('spacer' + stepNumber);
				stp_btn[0].classList.add('active');
				if (spacer.length !== 0) {
					spacer[0].classList.add('active');
				}
				if (stepNumber === 4) {
					document.getElementById( 'policy_table' ).classList.add('hidden')
				}
				currentActiveButton( stepNumber );
			}

			function displayPrevStep( stepNumber ) {
				// hide current step
				document.getElementById( 'step' + stepNumber ).classList = 'step d-none';
				
				let stp_btn = document.getElementsByClassName('stp' + stepNumber);
				let spacer = document.getElementsByClassName('spacer' + stepNumber);
				stp_btn[0].classList.remove('active');
				spacer[0].classList.remove('active');
				
				stepNumber--;
				
				let step = document.getElementById( 'step' + stepNumber ).classList = 'step active d-flex';
				spacer = document.getElementsByClassName('spacer' + stepNumber);
				spacer[0].classList.remove('complete');
				spacer[0].classList.add('active');
				
				currentActiveButton( stepNumber );
				
				if (stepNumber !== 4) {
					document.getElementById( 'policy_table' ).classList.remove('hidden')
				}
			}

			function showErrors(errors, step = 0){
				let att = document.createAttribute("disabled");
				att.value = 'disabled';
				let btn = document.querySelectorAll('button.btn' + step++ +'.advance');
				if (btn.length !== 0) {
					btn[0].setAttributeNode(att)
				}
				errorwrap.innerHTML = '';
				if (typeof errors === "string") {
					errorwrap.innerHTML = errors;
				} else {
					for ( let prop in errors ) {
						errorwrap.innerHTML += '<p>' + errors[prop] + '</p>';
					}
				}
				let form = document.getElementById("myform");
				form.prepend(errorwrap);
			}

			function sendAjaxRequest(data, action, callback = function(){}) {
				data.action = action;
				let urlEncodedData = "";
				let urlEncodedDataPairs = [];
				let name;
				let response = "";

				for(name in data) {
					urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
				}
				urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

				let xhttp = new XMLHttpRequest();
				xhttp.open("POST", '<?php echo admin_url("admin-ajax.php"); ?>', true);

				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						handleResponse.apply(this, [this.responseText, callback]);
					}
				};
				
				xhttp.setRequestHeader('Access-Control-Allow-Headers', 'x-requested-with')
				xhttp.setRequestHeader("Data-type", "json");
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send(urlEncodedData);
			}

			function handleResponse(response, callback) {
				callback.apply(this, [response]);
			}

			function soapRequest(step) {
				errorwrap.innerHTML = '';
				data = {};
				data.action = 'soap_request';
				let params = 'action=soap_request';
				let reg = document.getElementById('vehicle_registration');
				data[reg.name] = reg.value;
				let urlEncodedData = '';
				let urlEncodedDataPairs = [];
				let name;
				for (name in data) {
					urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
				}

				urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');
				$('.loader').show();

				let xhttp2 = new XMLHttpRequest();
				xhttp2.open("POST", '<?php echo admin_url("admin-ajax.php"); ?>', true);
				
				xhttp2.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						let data = JSON.parse(this.responseText);
						console.log(data);
						
							if (data.data.VRM_Curr) {
								document.getElementById( 'vehicle_registration' ).value = data.data.VRM_Curr;
								document.getElementById( 'vehicle_make' ).value = data.data.Combined_Make + ' ' + data.data.Combined_Model;
								document.getElementById( 'type' ).value = data.data.VehicleCategoryDescription;
								document.getElementById( 'engine_size' ).value = data.data.Combined_EngineCapacity;
								document.getElementById( 'fuel_type' ).value = data.data.Combined_FuelType;
								document.getElementById( 'transmission' ).value = data.data.Combined_Transmission;
								document.getElementById('age_of_vehicle').value = data.data.vehicle_age;

								document.getElementById( 'vehicle_registration2' ).value = data.data.VRM_Curr;
								document.getElementById( 'vehicle_make2' ).value = data.data.Combined_Make + ' ' + data.data.Combined_Model;
								document.getElementById( 'type2' ).value = data.data.VehicleCategoryDescription;
								document.getElementById( 'engine_size2' ).value = data.data.Combined_EngineCapacity;
								document.getElementById( 'fuel_type2' ).value = data.data.Combined_FuelType;
								document.getElementById( 'transmission2' ).value = data.data.Combined_Transmission;
								step++
								let btn = document.querySelectorAll('button.btn2.advance');
								if (btn.length !== 0) {
									btn[0].removeAttribute('disabled')
								}
							} else {
								showErrors('No Information Available for the specified vehicle, please check the registration', 2)
							}

							if (data.success == "false") {
								showErrors(data.data)
							}
						$('.loader').hide()
					}
				};
				xhttp2.setRequestHeader('Access-Control-Allow-Headers', 'x-requested-with')
				xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				xhttp2.send(urlEncodedData)
			}
			
			let errorwrap = document.createElement('div');
			errorwrap.className = 'error-wrap';

			let step = 1;
			currentActiveButton( step );
			$('.loader').hide();

			// stripe and join
			let stripe = Stripe('<?php echo get_stripe_public_key(); ?>');
			let elements = stripe.elements();
			let style = {
				base: {
					color: '#32325d',
					lineHeight: '22px',
					fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
					fontSmoothing: 'antialiased',
					fontSize: '18px',
					'::placeholder': {
						color: '#aab7c4'
					}
				},
				invalid: {
					color: '#fa755a',
					iconColor: '#fa755a'
				}
			};
			let card = elements.create('card', {style: style});
			card.mount('#card-element');
			card.addEventListener('change', function(event) {
				let displayError = document.getElementById('card-errors');
				if (event.error) {
					displayError.textContent = event.error.message;
				} else {
					displayError.textContent = '';
				}
			});

			let button = document.getElementById('join-button');
			button.addEventListener('click', function(event) {
				let active_plan = $('#choose-plan').find('.owl-item.active .plan-item').data('plan');
				$('.loader').show();

				stripe.createToken(card).then(function(result) {
					if (result.error) {
						let errorElement = document.getElementById('card-errors');
						errorElement.textContent = result.error.message;
						$('.loader').hide();
					} else {
						$.ajax({
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							type: 'post',
							dataType: 'json',
							data: {
								action: 'test_handle_new_signup',
								title: $('#title').val(),
								forename: $('#forename').val(),
								surname: $('#surname').val(),
								postcode: $('#postcode').val(),
								address1: $('#address1').val(),
								telephone: $('#telephone').val(),
								username: $('#username').val(),
								password: $('#password').val(),
								email: $('#email').val(),
								vehicle_registration: $('#vehicle_registration').val(),
								vehicle_make: $('#vehicle_make').val(),
								type: $('#type').val(),
								engine_size: $('#engine_size').val(),
								fuel_type: $('#fuel_type').val(),
								transmission: $('#transmission').val(),
								// mileage: $('#mileage').val(),
								policy_start_date: $('#policy_start_date').val(),
								cover_level: $('#cover_level').val(),
								plan: $('#final_policy').val(),
								duration: $('#duration').val(),
								policy_cost_to_customer: $('#policy_cost_to_customer').val(),
								auto_renew: $('#auto_renew').is(':checked'),
								post_docs: $('#post_docs').is(':checked'),
								token: result.token.id
							},
							success: function(r) {
								if (r.success === true) {
									$('.loader').hide();
									displayNextStep( 4 );

								} else {
									$('.loader').hide();
									showErrors(r.data);
								}
							}
						})
					}
				})
			})

			// end stripe
		});
	})();
</script>