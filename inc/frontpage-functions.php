<?php

/**
 * Custom Front Page functions
 * @since 0.3.0
 * @author Paul Spence <paul.spence@intimation.uk>
 */


add_action('front-page', 'sections');

/**
 * Logo
 * @since 0.3.0
 * @return text
 */
function logo()
{
	$logo = wp_get_attachment_image( get_option('options_branding_logo_image') );
	$home = site_url();

	include( locate_template( 'templates/content-parts/home/content-branding.php', false, false ) ); 
}
add_action('header_left', 'logo');


/**
 * Social Media Icons
 */
function SoMeIcons()
{
	get_template_part( 'templates/content-parts/home/content', 'social' );
}
add_action('header_right', 'SoMeIcons');


function hero()
{
	get_template_part( 'templates/content-parts/home/content', 'hero' );
}
add_action('after_header', 'hero');