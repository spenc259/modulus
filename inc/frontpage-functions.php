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
			<div class="col-auto pr-0 pl-0 d-none d-sm-block"><?php echo $logo; ?></div>
			<div class="col-auto pl-1 mb-0"><img src="<?php echo $image; ?>" /></div>
		</div>
	</a>
	<?php
}
add_action('header_left', 'logo');



function search() 
{
	get_sidebar();
}
// add_action('header_right', 'search');

function button()
{
	echo '<a href="'. site_url() .'"><button>Buy Now</button></a>';
}
// add_action('header_right', 'search');


function hero()
{
	if ( !is_home() ) {
		return;
	}
		
	?>
		<div class="row hero">
			<div class="col-md-6 pt-4 pb-4 pt-xl-5 pb-xl-2 px-sm-5">
				<h3>Breakdown <br>Cover</h3>
				<p>Ping Breakdown offer a range of Breakdown cover policies at an affordable premium, offering great value for money and including some features you would only expect on other, more expensive products.</p>
				<p>You’ll be safe in the knowledge that you’ll be covered by a 24 hour network of professional and highly experienced national breakdown operators.</p>
				<p>See below for our range of cover levels...></p>
			</div>
			<div class="col-md-6 pr-0 pl-0">
				<div class="img-logo">
					<img src="<?php echo site_url() . '/core/hero.jpg'; ?>" alt="Man looking under the bonnet of a car" />
				</div>
			</div>
		</div>
	<?php
}
add_action('after_header', 'hero');