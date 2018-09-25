<?php

// Checkout 1 : Create Account

add_action( 'wp_ajax_nopriv_arp_check_username', 'arp_check_username' );
add_action( 'wp_ajax_arp_check_username', 'arp_check_username' );

function arp_check_username() {

	$errors = array();

	if ( !isset($_POST['data']['username']) || strlen($_POST['data']['username']) < 6) {
		$errors['username'] = 'Username is to short';
	}

	if (username_exists($_POST['data']['username'])) {
		$errors['username'] = 'Username is taken';
	}

	if ( !isset($_POST['data']['email']) || !is_email($_POST['data']['email']) || email_exists($_POST['data']['email'])) {
		$errors['email'] = 'Please provide a different email address';
	}
}