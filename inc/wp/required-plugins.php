<?php

require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

if ( !is_plugin_active( 'gutenberg/gutenberg.php' ) ){
	add_action( 'admin_notices', 'admin_notice_error_acf' );
}
function admin_notice_error_acf() {
	$class = 'notice notice-error';
	$message = __( 'Gutenberg is missing!', 'inti-pro');
	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message ); 
}