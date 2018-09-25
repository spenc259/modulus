<?php
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title'    => 'Home Page Settings',
		'menu_title'    => 'Home Settings',
		'menu_slug'     => 'home-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false,
		'icon_url'		=> 'dashicons-schedule'
	));

	acf_add_options_page(array(
		'page_title'    => 'Theme Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false,
		'icon_url'		=> 'dashicons-art'
	));

	acf_add_options_page(array(
		'page_title'    => 'Site General Settings',
		'menu_title'    => 'Site Settings',
		'menu_slug'     => 'site-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false,
		'icon_url'		=> 'dashicons-admin-site'
	));
}