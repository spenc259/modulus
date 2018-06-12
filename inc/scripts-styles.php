<?php 

/**
 * Main Scripts
 * @since 0.3.0
 */
function ip_main_scripts() {
	global $wp_scripts;
	wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js#asyncload', array('my-jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'ip_main_scripts');



/**
 * Custom jQuery Version 
 * @since 0.3.0
 */
function ip_custom_jquery()
{
	wp_deregister_script('jquery'); // removes the wordpress default
	wp_enqueue_script('my-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js#asyncload', array(), null, true);
}
add_action('wp_enqueue_scripts', 'ip_custom_jquery');


/**
 * Bootstrap 4.0 JS
 * @since 0.3.0
 */
function ip_bootstrap_js()
{
	wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js#asyncload', array(), '4.0.0', true);
}
add_action('wp_enqueue_scripts', 'ip_bootstrap_js');



/**
 * Owl Carousel 
 * @since 0.3.0
 */
function ip_owl_carousel()
{
	wp_enqueue_script('owl', get_template_directory_uri() . '/assets/js/vendor/owl.carousel.min.js#asyncload', array(), null, true);
}
// add_action('wp_enqueue_scripts', 'ip_owl_carousel');



/**
 * Modal
 * A pure JS plugin implementation
 * @since 0.3.0
 */
function ip_modal()
{
	wp_enqueue_script('modal', get_template_directory_uri() . '/assets/js/intimation/modal.js#asyncload', array(), null, true);

	$log_data = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		// 'nonce' => wp_create_nonce( 'get_events' )
	);
	wp_localize_script( 'modal', 'my_log', $log_data );
}
// add_action('wp_enqueue_scripts', 'ip_modal');



/**
 * Footer Scripts 
 * @since 0.3.0
 */
function ip_footer_scripts()
{
	wp_enqueue_style( 'google-fonts', google_fonts_url(), array(), null );
}
add_action('wp_footer', 'ip_footer_scripts');



/**
 * Events 
 * @since 0.3.0
 */
function ip_events_scripts()
{
	wp_enqueue_script('moment', get_template_directory_uri() . '/assets/js/vendor/moment.min.js#asyncload', array('my-jquery'), false, false);
	wp_enqueue_script('full-cal', get_template_directory_uri() . '/assets/js/vendor/fullcalendar.js#asyncload', array('my-jquery'), false, false);
	wp_enqueue_script('events-script', get_template_directory_uri() . '/assets/js/events.js#asyncload', array('my-jquery'), false, true);

	$data = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		// 'nonce' => wp_create_nonce( 'get_events' )
	);
	wp_localize_script( 'events-script', 'ajax_get_events', $data );

}
// add_action('wp_enqueue_scripts', 'ip_events_scripts');



/**
 * Make Scripts Defer
 * defer loading of all scripts
 * @since 0.3.0
 */
function ip_make_script_defer( $tag, $handle, $src )
{
	$handles = array(
		'jquery',
		'bootstrap-script',
		'owl',
		'main-script',
		'google-fonts',
		'sportspress-sponsors',
		'sportspress-countdown',
		'dataTables',
		'sportspress',
		'countdown',
		'jquery-countdown',
		'jquery-datatables',
		'wp-embed',
		'google-fonts-css'
		
	);

	if ( !in_array($handle, $handles) ) {
        return $tag;
	}

    return str_replace( '<script', '<script defer', $tag );
}
add_filter( 'script_loader_tag', 'ip_make_script_defer', 10, 3 );



/**
 * Admin Scriptds
 * @since 0.3.0
 */
function ip_admin_enqueue_scripts() {
	wp_enqueue_script('admin-script', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), false, true);
}
add_action( 'admin_enqueue_scripts', 'ip_admin_enqueue_scripts' );