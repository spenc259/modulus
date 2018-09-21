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
	echo "<nav class='nav hidden-xs hidden-sm hidden-md primary'>";
        wp_nav_menu( 
			array(
				'theme_location' => 'primary', 
				'container' => false, 
				'menu_class' => 'primary-menu',
				'items_wrap'     => '<ul class="%2$s">%3$s<li class="search-menu-item"><i class="fa fa-search"></i></li></ul>'
			)
		);
	echo "</nav>";

	?>

	<button type="button" class="burger d-none" data-toggle="collapse" data-target="#responsive-menu">
		<span></span>
	</button>
	
	<?php

}
add_action('header_middle', 'primary_nav');

function footer_nav()
{
	echo "<nav class='nav hidden-xs hidden-sm hidden-md footer'>";
        wp_nav_menu( 
			array(
				'theme_location' => 'footer', 
				'container' => false, 
				'menu_class' => 'footer-menu',
				'items_wrap'     => '<ul class="%2$s">%3$s<li class="search-menu-item"><i class="fa fa-search"></i></li></ul>'
			)
		);
	echo "</nav>";

	?>

	<button type="button" class="burger d-none" data-toggle="collapse" data-target="#responsive-menu">
		<span></span>
	</button>
	
	<?php

}
add_action('footer-menu', 'footer_nav');