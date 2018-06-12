<?php
register_nav_menus(array(
	'primary' => __('Primary Menu', 'intimation-pro')
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

	<button type="button" class="burger hidden-lg" data-toggle="collapse" data-target="#responsive-menu">
		<span></span>
	</button>
	
	<?php

}
add_action('header_right', 'primary_nav');