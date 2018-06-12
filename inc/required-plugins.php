<?php

require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ){
	add_action( 'admin_notices', 'admin_notice_error_acf' );
}
function admin_notice_error_acf() {
	$class = 'notice notice-error';
	$message = __( 'Advanced Custom Fields Pro is missing!', 'acf-strap');
	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message ); 
}