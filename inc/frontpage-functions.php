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
	$logo = get_option('options_branding_logo_svg');
	$image = site_url() . "/wp-content/uploads/2018/04/19544-Main-Brand-Landing-Page-AW_22.png";
	$home = site_url();

	get_template_part( 'templates/content-parts/home/content', 'branding' );
}
add_action('header_left', 'logo');


function hero()
{
	get_template_part( 'templates/content-parts/home/content', 'hero' );
}
// add_action('after_header', 'hero');