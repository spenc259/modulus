<?php
session_start();

$response = array();


////////////////////////////////////////////////////////
//
// FIELDS CHECK
//
////////////////////////////////////////////////////////

//if (!isset($_POST['name']) || $_POST['name'] == '' || !isset($_POST['email']) || $_POST['email'] == '' || !isset($_POST['message']) || $_POST['message'] == '') {

//if (
//!isset($_POST['website']) || $_POST['website'] == '' || 
//!isset($_POST['reported_date']) || $_POST['reported_date'] == '' || 
//!isset($_POST['reported_by']) || $_POST['reported_by'] == '' || 
//!isset($_POST['issue_type']) || $_POST['issue_type'] == '' || 
//!isset($_POST['description']) || $_POST['description'] == '' || 
//!isset($_POST['resolved_by']) || $_POST['resolved_by'] == '' || 
//!isset($_POST['cause_analysis']) || $_POST['cause_analysis'] == '' || 
//!isset($_POST['corrective_action']) || $_POST['corrective_action'] == '' || 
//!isset($_POST['preventative_action']) || $_POST['preventative_action'] == '' || 
//!isset($_POST['date_resolved']) || $_POST['date_resolved'] == '' || 
//!isset($_POST['date_approved']) || $_POST['date_approved'] == '' || 
//!isset($_POST['approved_by']) || $_POST['approved_by'] == ''
//)
//{
//
//    $response['status'] = 'error';
//    $response['response'] = '<i class=“fa fa-times” style=“color: red;“></i> Missing required field.';
//    $response = json_encode($response);
//    echo($response);
//    exit();
//
//}


















$errors = array();

if (!isset($_POST['website']) || $_POST['website'] == '' )
	{$errors['website'] = "You've missed the website name";}
if (!isset($_POST['requested_downtime_date']) || $_POST['requested_downtime_date'] == '')
	{$errors['requested_downtime_date'] = "You've missed the requested downtime date.";}
if (!isset($_POST['requested_by']) || $_POST['requested_by'] == '')
	{$errors['requested_by'] = "You've missed who it was requested by.";}
if (!isset($_POST['start_time']) || $_POST['start_time'] == '')
	{$errors['start_time'] = "You've missed the start time.";}
if (!isset($_POST['end_time']) || $_POST['end_time'] == '')
	{$errors['end_time'] = "You've missed the end time.";}
if (!isset($_POST['developer']) || $_POST['developer'] == '')
	{$errors['developer'] = "You've missed the developer info.";}
if (!isset($_POST['email']) || $_POST['email'] == '')
	{$errors['email'] = "You've missed the email.";}
if (!isset($_POST['summary']) || $_POST['summary'] == '')
	{$errors['summary'] = "You've missed the summary.";}
if (!isset($_POST['reason']) || $_POST['reason'] == '')
	{$errors['reason'] = "You've missed the reason.";}
if (!isset($_POST['risk_elements']) || $_POST['risk_elements'] == '')
	{$errors['risk_elements'] = "You've missed the risk elements.";}
if (!isset($_POST['expected_testing_results']) || $_POST['expected_testing_results'] == '')
	{$errors['expected_testing_results'] = "You've missed the expected testing results.";}

if (!isset($_POST['severity_low']) || $_POST['severity_low'] == '' ||  !isset($_POST['severity_high']) || $_POST['severity_high'] == '' ||  !isset($_POST['approved_by']) ||  $_POST['approved_by'] == '')
	{$errors['severity'] = "You've missed the severity tick boxes.";}
	
if (!isset($_POST['training_yes']) || $_POST['training_yes'] == '' || !isset($_POST['training_no']) || $_POST['training_no'] == '')
	{$errors['training'] = "You've missed the training tickboxes.";}
	
if (!isset($_POST['backout_plan']) || $_POST['backout_plan'] == '')
	{$errors['backout_plan'] = "You've missed your backout plan.";}
if (!isset($_POST['not_implemented']) || $_POST['not_implemented'] == '')
	{$errors['not_implemented'] = "You've missed what happens if not implemented.";}
if (!isset($_POST['request_date']) || $_POST['request_date'] == '')
	{$errors['request_date'] = "You've missed the request date.";}

if ($errors) {
	$response['status'] = 'error';
	$response['errors'] = $errors;
	echo json_encode($response);
	exit();
} else {

	// mPdf build ####################################################
	
	$url = 'DR' . '-' . $_POST[website] . '-' . date('dmY') . '.pdf';
	
	ini_set('memory_limit','160M');
	
	require_once('mpdf/mpdf.php');
	
	$stylesheet = file_get_contents('style.css');
	$header = file_get_contents('header_DR.html');
	$output = file_get_contents('template_DR.html');
	$footer = file_get_contents('footer_DR.html');
	foreach ($_POST as $key => $value) {
		$header = str_replace('{{'.$key.'}}', $value, $header);
	}
	foreach ($_POST as $key => $value) {
		$output = str_replace('{{'.$key.'}}', $value, $output);
		$_SESSION[$key] = $value;
	}
	foreach ($_POST as $key => $value) {
		$footer = str_replace('{{'.$key.'}}', $value, $footer);
	}

	$mpdf = new mPDF('','','','','15','15','40','30','10','10','');

	$mpdf->SetDisplayMode('fullpage');
	$mpdf->SetTitle('Downtime Request' . $_POST[website] . date('d/m/Y'));
	$mpdf->SetHTMLHeader($header);
	$mpdf->SetHTMLFooter($footer);
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->SetProtection(array('copy','print'), '', 'zorbagr33k', 40);
	$mpdf->WriteHTML($output,2);
	$mpdf->Output($url,'F');

	// /mPDF build ###################################################

	// fill ajax with url of pdf #####################################
	$response['status'] = 'ok';
	$response['url'] = $url;
	$response = json_encode($response);

	echo($response);
	// /fill #########################################################

	exit();


//if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
//
//    $response['status'] = 'error';
//    $response['response'] = '<i class=“fa fa-times” style=“color: red;“></i> Invalid Email.';
//    $response = json_encode($response);
//    echo($response);
//    exit();
//
//}

}
