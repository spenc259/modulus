<?php 

/**
 * Form Handler
 * @since 0.3
 */


add_action( 'wp_ajax_nopriv_my_form', 'my_form' );
add_action( 'wp_ajax_my_form', 'my_form' );

function my_form() {

	$errors = array();

	// server side error checking
	if ( isset($_POST['name']) && strlen($_POST['name']) > 2 && strlen($_POST['name'] < 30) ) {
		$name = sanitize_text_field($_POST['name']);
	} else {
		$errors[$name] = 'Please enter a valid name';
	}

	if ( isset($_POST['website']) && strlen($_POST['website']) > 2 && strlen($_POST['website'] < 30) ) {
		$website = sanitize_text_field($_POST['website']);
	} else {
		$errors[$website] = 'We do not submit forms for bots! ;)';
	}

	if ( isset($_POST['email']) && strlen($_POST['email']) > 2 && strlen($_POST['email'] < 50) ) {
		$email = sanitize_text_field($_POST['email']);
	} else {
		$errors[$email] = 'Please enter a valid email';
	}

	if ( empty($errors) ) {
		// we are good to send the mail
		$send = true;
	}

	if ( ! empty($website) ) {
		// We have a bot, just return the script
		$send = false;
		return;
	}


	if ( $send ) {
		/// send the mail
	}

	// name
	// if (isset($_POST['data']['organisation_name']) && strlen($_POST['data']['organisation_name']) > 2 && strlen($_POST['data']['organisation_name']) < 50) {
	// 	$organisation_name = sanitize_text_field($_POST['data']['organisation_name']);
	// } else {
	// 	$errors['errors']['organisation_name'] = 'Please enter your Organisation Name'; 
	// }

	wp_send_json_success();

	die();

}