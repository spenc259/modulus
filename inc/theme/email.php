<?php

/**
 * Email Defaults
 * @since 0.4.2
 *
 **/

function wpse27856_set_content_type(){
	return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

// Function to change email address
function wpb_sender_email( $original_email_address ) {
	$sitename = strtolower( $_SERVER['SERVER_NAME'] );
	if ( substr( $sitename, 0, 4 ) == 'www.' ) {
		$sitename = substr( $sitename, 4 );
	}

	return 'wordpress@' . $sitename;
}

function wpb_sender_name( $original_email_from ) {
	return 'No Reply ' . $sitename = strtolower( $_SERVER['SERVER_NAME'] );
}

add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );

add_filter( 'send_email_change_email', '__return_false' );