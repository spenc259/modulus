<?php

if (!function_exists('inti_pro_widgets_init')) {
	function inti_pro_widgets_init() 
	{

		register_sidebar(array(
			'name'          => __('Sidebar left', 'acf-strap'),
			'id'            => 'sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
			));

		register_sidebar(array(
			'name'          => __('Sidebar right', 'acf-strap'),
			'id'            => 'sidebar-right',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
			));
	}
}
add_action('widgets_init', 'inti_pro_widgets_init');