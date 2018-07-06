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
	$image = "http://wordpress.test/ping/wp-content/uploads/2018/04/19544-Main-Brand-Landing-Page-AW_22.png";
	

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
	?>
		<div class="row hero">
			<div class="col-6 pt-4 pb-2">
				<h2 class="green">Breakdown <br>Cover</h2>
				<p>Ping Breakdown covers a range of Breakdown Cover policies offer you great value for money, with some features only available on other, more expensive products.</p>
				<p>You’ll be safe in the knowledge that you’ll be covered by a 24 hour network of professional and highly experienced national breakdown operators.</p>
				<p>See below for our range of cover levels...></p>
			</div>
			<div class="col-6 pr-0">
				<div class="img-logo">
					<img src="/ping/core/hero.jpg" alt="Man looking under the bonnet of a car" />
				</div>
			</div>
		</div>
	<?php
}
add_action('after_header', 'hero');