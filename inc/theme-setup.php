<?php

if (!function_exists('inti_pro_setup')) {

	function inti_pro_setup() {
		load_theme_textdomain('inti-pro', get_template_directory() . '/languages');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));
		add_theme_support( 'sportspress' );
	}

	add_action('after_setup_theme', 'inti_pro_setup');

}

////////////////////////////////////////////////////////
//
// IMAGE SIZES
//
////////////////////////////////////////////////////////

add_image_size('250x250', 250, 250, true);
add_image_size('400', 400, 400, true);