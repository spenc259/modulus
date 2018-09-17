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
	?>
	<a href="<?php echo $home; ?>">
		<div class="row logo align-items-center">
			<div class="col-auto pr-0"><?php echo $logo; ?></div>
			<div class="col-auto pl-1"><img src="<?php echo $image; ?>" /></div>
		</div>
	</a>
	<?php 
}
add_action('header_left', 'logo');


function hero()
{
	if ( !is_home() ) {
		return;
	}
		
	get_template_part( 'templates/content-parts/home/content', 'hero' );
}
add_action('after_header', 'hero');