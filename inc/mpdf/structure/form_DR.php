<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<!--	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="./js/jquery-3.2.1.min.js"></script>
	<title>Pdf Creator</title>
	<style>
	@font-face {
		font-family: 'Trade Gothic LT Std';
		src: url('fonts/TradeGothicLTStd-Obl.eot'); /* IE9 Compat Modes */
		src: url('fonts/TradeGothicLTStd-Obl.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
		url('fonts/TradeGothicLTStd-Obl.woff') format('woff'), /* Modern Browsers */
		url('fonts/TradeGothicLTStd-Obl.ttf')  format('truetype'), /* Safari, Android, iOS */
		url('fonts/TradeGothicLTStd-Obl.svg#cb35112c9d85c27fd673d5a23d3f883c') format('svg'); /* Legacy iOS */ 
		font-style:   italic;
		font-weight:  400;
	}
	@font-face {
		font-family: 'Trade Gothic LT Std';
		src: url('fonts/TradeGothicLTStd.eot'); /* IE9 Compat Modes */
		src: url('fonts/TradeGothicLTStd.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
		url('fonts/TradeGothicLTStd.woff') format('woff'), /* Modern Browsers */
		url('fonts/TradeGothicLTStd.ttf')  format('truetype'), /* Safari, Android, iOS */
		url('fonts/TradeGothicLTStd.svg#baa2b4336bfeb9872a50f10bdb06e378') format('svg'); /* Legacy iOS */
		font-style:   normal;
		font-weight:  400;
	}
	@font-face {
		font-family: 'Trade Gothic LT Std';
		src: url('fonts/TradeGothicLTStd-BoldObl.eot'); /* IE9 Compat Modes */
		src: url('fonts/TradeGothicLTStd-BoldObl.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
		url('fonts/TradeGothicLTStd-BoldObl.woff') format('woff'), /* Modern Browsers */
		url('fonts/TradeGothicLTStd-BoldObl.ttf')  format('truetype'), /* Safari, Android, iOS */
		url('fonts/TradeGothicLTStd-BoldObl.svg#ffb728c9297cbd4fa11e57d6fd29d66a') format('svg'); /* Legacy iOS */
		font-style:   italic;
		font-weight:  700;
	}
	@font-face {
		font-family: 'Trade Gothic LT Std';
		src: url('fonts/TradeGothicLTStd-Bold.eot'); /* IE9 Compat Modes */
		src: url('fonts/TradeGothicLTStd-Bold.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
		url('fonts/TradeGothicLTStd-Bold.woff') format('woff'), /* Modern Browsers */
		url('fonts/TradeGothicLTStd-Bold.ttf')  format('truetype'), /* Safari, Android, iOS */
		url('fonts/TradeGothicLTStd-Bold.svg#c1d3633691e9c5760d75ea5ff51c9393') format('svg'); /* Legacy iOS */
		font-style:   normal;
		font-weight:  700;
	}
	html {
		height: 100%;
	}
	body {
		 font-family: 'Trade Gothic LT Std'; 
		/*font-family: "Comic Sans MS", "Comic Sans", cursive;*/
		font-size: 16px;
		font-weight: 400;
		height: 100%;
		margin: 0;
		background: #ffffff; /* Old browsers */
		background: -moz-linear-gradient(-45deg, #ffffff 0%, #e5e5e5 67%, #ffffff 100% fixed); /* FF3.6-15 */
		background: -webkit-linear-gradient(-45deg, #ffffff 0%,#e5e5e5 67%,#ffffff 100% fixed); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(135deg, #ffffff 0%,#e5e5e5 67%,#ffffff 100%) fixed; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
	}
	input[type="text"] {
		/* font-family: 'Trade Gothic LT Std'; */
		font-family: "Comic Sans MS", "Comic Sans", cursive;
		font-size: 14px;
		text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
		border: 0;
		background-color: #eee;
		padding: 5px;
		width: 320px;
		background: -webkit-linear-gradient(top, #eee 0%, #ccc 100%);
		background: linear-gradient(to bottom, #eee 0%, #ccc 100%);
		border-radius: 4px;
		box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.4);

	}
	input[type="reset"], input[type="submit"] {
		/* font-family: 'Trade Gothic LT Std'; */
		font-family: "Comic Sans MS", "Comic Sans", cursive;
		font-size: 14px;
		text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
		padding: 10px 20px 5px;
		background: -webkit-linear-gradient(top, #eee 0%, #ccc 100%);
		background: linear-gradient(to bottom, #eee 0%, #ccc 100%);
		border-radius: 4px;
		/*box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.4);*/

	}
	.checks {
		display: inline-block;
		vertical-align: 10px;
	}
	
	textarea:focus, inut:focus {outline: 0 none;}
	*:focus {outline: 0 none;}
	
	textarea, select {
		/* font-family: 'Trade Gothic LT Std'; */
		font-family: "Comic Sans MS", "Comic Sans", cursive;
		font-size: 14px;
		text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
		border: 0;
		width: 320px;
		background-color: #eee;
		padding: 5px;
		background: -webkit-linear-gradient(top, #eee 0%, #ccc 100%);
		background: linear-gradient(to bottom, #eee 0%, #ccc 100%);
		border-radius: 4px;
		box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.4);
	}
	:placeholder-shown {
		color: rgba(0,0,0,1);
	}
	strong {
		padding: 5px;
		display: block;
	}
	.checkboxes {
		width: 20px;
		position: relative;
		margin-top: 3px;
	}
	.checkboxes label {
		width: 20px;
		height: 20px;
		cursor: pointer;
		position: absolute;
		top: 0;
		left: 0;
		background: -webkit-linear-gradient(top, #eee 0%, #ccc 100%);
		background: linear-gradient(to bottom, #eee 0%, #ccc 100%);
		border-radius: 4px;
		box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.4);
	}
	.checkboxes label:after {
		content: '';
		width: 9px;
		height: 5px;
		position: absolute;
		top: 4px;
		left: 4px;
		/* border: 3px solid #000000;  */
		/* box-shadow: 2px 2px 4px rgba(0,0,0,0.5);  */
		/* border-top: none; */
		/* border-right: none; */
		border-bottom: 3px solid #000000;
		border-left:3px solid #000000;
		background: transparent; 
		background: rgba(0,0,0,0.0); 
		opacity: 0;
		-webkit-transform: rotate(-45deg);
		transform: rotate(-45deg);
	}
	.checkboxes label:hover::after {
		opacity: 0.3;
	}
	.checkboxes input[type=checkbox] {
		visibility: hidden;
	}
	.checkboxes input[type=checkbox]:checked + label:after {
		opacity: 1;
	}
	select {
		-webkit-appearance: none; 
		-moz-appearance: none;
		appearance: none;
		width: 330px;
		background-color: #eee; /* fallback */
		background: url(select-arrow.png) no-repeat right 10px center; /* fallback */
		background: url(select-arrow.png) no-repeat right 10px center, -moz-linear-gradient(top, #eee 0%, #ccc 100%); /* FF 3.6+*/
		background: url(select-arrow.png) no-repeat right 10px center, -webkit-gradient(linear, 0 0, 0 100%, from(#eee), to(#ccc)); /* Safari 4+, Chrome 2+ */
		background: url(select-arrow.png) no-repeat right 10px center, -webkit-linear-gradient(top, #eee 0%, #ccc 100%); /* Safari 5.1+, Chrome 10+*/
		background: url(select-arrow.png) no-repeat right 10px center, -o-linear-gradient(top, #eee 0%, #ccc 100%); /* Opera 11.10*/
		background: url(select-arrow.png) no-repeat right 10px center, linear-gradient(to bottom, #eee 0%, #ccc 100%); /* Standard, IE10*/
		/*text-shadow: 2px 2px 4px rgba(0,0,0,0.4);*/
	}
	select::-ms-expand { /* for IE 11 */display: none;}
		
	td {position: relative;}
	.right {text-align: right;}
	
</style>
</head>

<body>
	<table width="100%"><tr><td>
		<form action="form_DR_handler.php" method="post" id="pdfform">
			<table width="600" height="" border="0" cellspacing="5" cellpadding="0" id="form"  align="center">
				<tr>
					<td valign="top" width="200" height="" class="right"><strong>Website</strong></td>
					<td valign="top" width="320" height=""><input type="text" name="website" size="30" maxlength="50"  value="<?php echo $_SESSION['website']; ?>" placeholder="Domain Name."/></td>
				</tr>

		<!-- double box row -->
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Date of requested downtime:</strong></td>	
					<td valign="top" width="320" height=""><input type="text" name="requested_downtime_date" size="30" maxlength="50" value="<?php echo $_SESSION['requested_downtime_date']; ?>" placeholder="Date"/></td>
				</tr>
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Requested By:</strong></td>
					<td valign="top" width="320" height=""><input type="text" name="requested_by" size="30" maxlength="50" value="<?php echo $_SESSION['requested_by']; ?>" placeholder="Name"/></td>
				</tr>
		<!-- \ double box row -->

		<!-- double box row -->
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Start Time:</strong></td>	
					<td valign="top" width="320" height=""><input type="text" name="start_time" size="30" maxlength="50" value="<?php echo $_SESSION['start_time']; ?>" placeholder="Time"/></td>
				</tr>
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>End Time:</strong></td>
					<td valign="top" width="320" height=""><input type="text" name="end_time" size="30" maxlength="50" value="<?php echo $_SESSION['end_time']; ?>" placeholder="Time"/></td>
				</tr>
		<!-- \ double box row -->

		<!-- double box row -->
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Developer:</strong></td>	
					<td valign="top" width="320" height=""><input type="text" name="developer" size="30" maxlength="50" value="<?php echo $_SESSION['developer']; ?>" placeholder="Name"/></td>
				</tr>
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Email:</strong></td>
					<td valign="top" width="320" height=""><input type="text" name="email" size="30" maxlength="50" value="<?php echo $_SESSION['email']; ?>" placeholder="Doh!"/></td>
				</tr>
		<!-- \ double box row -->



		<!-- tickbox row -->
				<!--<tr>
					<td valign="top" width="180" height="" class="right"><strong>Method of Report:</strong></td>
					<td valign="top" width="320" height="">			
						<input type="hidden" name="report_method_tel" value="" />
						<span class="checks"><strong>Tel:</strong></span>
						<div class="checkboxes checks">
							<input type="checkbox" value="&#x2713;" id="report_method_tel"  name="report_method_tel" <?php echo ( !empty($_SESSION['report_method_tel']) ) ? 'checked' : ''; ?> />
							<label for="report_method_tel"></label>
						</div>&nbsp;&nbsp;
						<input type="hidden" name="report_method_email" value="" />
						<span class="checks"><strong>Email:</strong></span>
						<div class="checkboxes checks">
							<input type="checkbox" value="&#x2713;" id="report_method_email" name="report_method_email" <?php echo ( !empty($_SESSION['report_method_email']) ) ? 'checked' : ''; ?> />
							<label for="report_method_email"></label>
						</div>&nbsp;&nbsp;
						<input type="hidden" name="report_method_other" value="" />
						<span class="checks"><strong>Other:</strong></span>
						<div class="checkboxes checks">
							<input type="checkbox" value="&#x2713;" id="report_method_other" name="report_method_other" <?php echo ( !empty($_SESSION['report_method_other']) ) ? 'checked' : ''; ?> />
							<label for="report_method_other"></label>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Issue Type:</strong></td>
					<td valign="top" width="320" height=""><input type="text" name="issue_type" size="30" maxlength="50" value="<?php echo $_SESSION['issue_type']; ?>"/></td>
				</tr>-->
		<!-- / tickbox row -->


		<!-- double head grey box -->
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Summary:</strong></td>
					<td valign="top" width="320" height=""><textarea name="summary" rows="4" cols="22" maxlength="1000" placeholder="What is wrong, why fix needed, who's affected, how to fix, when it needs to be done by." /><?php echo $_SESSION['summary']; ?></textarea></td>
				</tr>
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Reason:</strong></td>
					<td valign="top" width="320" height="">
					
					<?php if (!$_SESSION['reason']) : ?>
						<!--<style>select:invalid, select option[value=""] {color: rgba(0,0,0,0.5)}</style>-->
						<style>select:invalid, select *[value=""] {color: rgba(0,0,0,0.5)}</style>
						<select name="reason" required>
						<option value="" disabled selected>Select your option</option>
					<?php else : ?>
						<select name="reason">						
						<option value="<?php echo $_SESSION['reason']; ?>"><?php echo $_SESSION['reason']; ?></option>
					<?php endif; ?>
						<option value="Investigation">Investigation</option>
						<option value="Scheduled Software Update">Scheduled Software Update</option>
						<option value="Security Fix">Security Fix</option>
						<option value="Incident Fix">Incident Fix</option>
						<option value="Feature Request">Feature Request</option>
						<option value="Server Maintenance">Server Maintenance</option>
					</select>
					</td>
				</tr>
		<!-- /double head grey box -->


		<!-- single head grey box -->
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Risk Elements:</strong></td>
					<td valign="top" width="320" height=""><textarea name="risk_elements" rows="4" cols="22" maxlength="1000" placeholder="Examples of car-crash scenarios if unforseen events arise from the fixes being proposed." /><?php echo $_SESSION['risk_elements']; ?></textarea></td>
				</tr>
		<!-- /single head grey box -->	


		<!-- single head grey box -->				
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Expected Testing Results:</strong></td>
					<td valign="top" width="320" height=""><textarea name="expected_testing_results" rows="4" cols="22" maxlength="1000" placeholder="Sample test results on affected systems and reasons." /><?php echo $_SESSION['expected_testing_results']; ?></textarea></td>
				</tr>
		<!-- /single head grey box -->


		<!-- tickbox row -->
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Severity Level:</strong></td>
					<td valign="top" width="320" height="">			
						<input type="hidden" name="severity_low" value="" />
						<span class="checks"><strong>Low</strong></span>
						<div class="checkboxes checks">
							<input type="checkbox" value="&#x2713;" id="severity_low"  name="severity_low" <?php echo ( !empty($_SESSION['severity_low']) ) ? 'checked' : ''; ?> />
							<label for="severity_low"></label>
						</div>&nbsp;&nbsp;
						<input type="hidden" name="severity_medium" value="" />
						<span class="checks"><strong>Medium</strong></span>
						<div class="checkboxes checks">
							<input type="checkbox" value="&#x2713;" id="severity_medium" name="severity_medium" <?php echo ( !empty($_SESSION['severity_medium']) ) ? 'checked' : ''; ?> />
							<label for="severity_medium"></label>
						</div>&nbsp;&nbsp;
						<input type="hidden" name="severity_high" value="" />
						<span class="checks"><strong>High</strong></span>
						<div class="checkboxes checks">
							<input type="checkbox" value="&#x2713;" id="severity_high" name="severity_high" <?php echo ( !empty($_SESSION['severity_high']) ) ? 'checked' : ''; ?> />
							<label for="severity_high"></label>
						</div>
					</td>
				</tr>
		<!-- / tickbox row -->
		<!-- tickbox row -->
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Training Required:</strong></td>
					<td valign="top" width="320" height="">			
						<input type="hidden" name="training_yes" value="" />
						<span class="checks"><strong>Yes</strong></span>
						<div class="checkboxes checks">
							<input type="checkbox" value="&#x2713;" id="training_yes"  name="training_yes" <?php echo ( !empty($_SESSION['training_yes']) ) ? 'checked' : ''; ?> />
							<label for="training_yes"></label>
						</div>&nbsp;&nbsp;
						<input type="hidden" name="training_no" value="" />
						<span class="checks"><strong>No</strong></span>
						<div class="checkboxes checks">
							<input type="checkbox" value="&#x2713;" id="training_no" name="training_no" <?php echo ( !empty($_SESSION['training_no']) ) ? 'checked' : ''; ?> />
							<label for="training_no"></label>
						</div>&nbsp;&nbsp;
					</td>
				</tr>
		<!-- / tickbox row -->
		

		<!-- single head grey box -->				
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Backout/Recovery Plan:</strong></td>
					<td valign="top" width="320" height=""><textarea name="backout_plan" rows="4" cols="22" maxlength="1000" placeholder="What shall be implemented if fix doesn't work - e.g. restore backup" /><?php echo $_SESSION['backout_plan']; ?></textarea></td>
				</tr>
		<!-- /single head grey box -->


		<!-- single head grey box -->				
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Impact if change not implemented:</strong></td>
					<td valign="top" width="320" height=""><textarea name="not_implemented" rows="4" cols="22" maxlength="1000" placeholder="Security issues? Client suffering?" /><?php echo $_SESSION['not_implemented']; ?></textarea></td>
				</tr>
		<!-- /single head grey box -->




		<!-- four col approval -->
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Request Date:</strong></td>
					<td valign="top" width="320" height=""><input type="text" name="request_date" size="30" maxlength="50" value="<?php echo $_SESSION['request_date']; ?>" placeholder="Date request sent."/></td>
				</tr>
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Date Approved By Client:</strong></td>
					<td valign="top" width="320" height=""><input type="text" name="date_approved" size="30" maxlength="50" value="<?php echo $_SESSION['date_approved']; ?>" placeholder="To be filled by client"/></td>
				</tr>
				<tr>
					<td valign="top" width="180" height="" class="right"><strong>Approved By:</strong></td>
					<td valign="top" width="320" height=""><input type="text" name="approved_by" size="30" maxlength="50" value="<?php echo $_SESSION['approved_by']; ?>" placeholder="To be filled by client"/></td>
				</tr>
		<!-- \ four col approval -->


				<tr>
					<td></td>
					<td height="60">
						<div style="text-align:center;"><input type="submit" name="submit" value="submit" autofocus>
							<input id="reset" type="reset" name="Reset" value="Reset"></div>
							<div id="response" style="margin-top: 20px;"></div>
						</td>
					</tr>
				</table>
			</form>
		</td></tr></table>
		<!-- <?php echo '<pre style="font-size:10px;">'; var_dump($_SESSION); echo '</pre>'; ?> -->
		


		<script type="text/javascript">
			 $('#reset').on('click', function() {
			 	$.ajax({
			 		url: './kill_session.php',
			 		type: 'post',
			 		dataType: 'json',
			 		data: {
			 		},
			 		success: function(response) {
						$('#response').html("");
						$('#pdfform input, #pdfform textarea').attr('style',"");
			 			console.log(response);
			 		}
			 	})
			 })
		</script> 



		<script type="text/javascript">
			(function($) {
				$(document).ready(function() {
					$('form').addClass('bob2');

					$('#pdfform').submit(function(e) {
						e.preventDefault();
						$.ajax({
							url: './form_DR_check.php',
							type: 'post',
							dataType: 'json',
							data: $(this).serialize(),
							success: function (response) {
								$('#response').html("");
								console.log(response);
								if (response.status == 'ok') {
									$('#pdfform input, #pdfform textarea').val('');
									location = response.url;
								} else {
									$.each(response.errors, function(k,v) {
										$('#response').append('<i class=“fa fa-times” style=“color: red;“></i>'+ v + '<br>');
										$('#pdfform input[name='+k+']').css({'background':'none','background':'rgb(255,0,0,0.5)'});
										$('#pdfform textarea[name='+k+']').css({'background':'none','background':'rgb(255,0,0,0.5)'});
										$('#pdfform select[name='+k+']').css({'background':'none','background':'rgb(255,0,0,0.5)'});
										$('body').css({'height':'auto'});
									})
								}
							}
						})
					});
				});
			})(jQuery)
		</script>

	</body>
	</html>