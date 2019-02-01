<?php
register_nav_menus(array(
	'primary' => __('Primary Menu', 'intimation-pro'),
	'footer'	=> __('Footer Menu', 'intimation-pro')
));


/**
 * Primary Nav
 * @since 0.3.0
 * @return text
 */
function primary_nav()
{
	wp_nav_menu( 
		array(
			'theme_location' => 'primary', 
			'container' => false, 
			'menu_class' => 'primary-menu',
			'items_wrap'     => '<ul class="row %2$s">%3$s</ul>'
		)
	);
}
add_action('navigation', 'primary_nav');


/**
 * Mobile Menu
 */
// function mobile_menu() 
// {
// 	wp_nav_menu(
// 		array(
// 			'theme_location' => 'primary',
// 			'container' => false,
// 			'menu_class' => 'mobile-menu',
// 			'items_wrap' => '<ul class="row %2$s">%3$s</ul>'
// 		)
// 	);
// }
// add_action('mobile_menu', 'mobile_menu');