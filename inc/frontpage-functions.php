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

	// echo '<pre>'; print_r($logo); echo '</pre>';
	// $image = responsive_image( $logo, 'thumbnail', false, 'lazy col-sm-3 col-md-4' );
	// $text = get_option('options_branding_logo_text');
	$home = site_url(); 
echo <<< HTML
		<a href="$home">
			$logo
		</a>
HTML;
}
add_action('header_left', 'logo');



function search() 
{
	get_sidebar();
}
add_action('header_right', 'search');