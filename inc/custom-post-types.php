<?php

$cpts = array(
	'formats' => array(
		'singular' => 'format',
		'display' => 'format',
		'icon'		=> 'dashicons-format-gallery'
	),
	'soups' => array(
		'singular' => 'soup',
		'display' => 'soup',
		'icon' => get_stylesheet_directory_uri() . '/assets/img/icons/Icons1-01.png',
		'description' => 'this is my soupss description'
	),
	'stews' => array(
		'singular' => 'stew',
		'display' => 'stew',
		'icon' => 'dashicons-building',
		'description' => 'this is my stews description'
	),
	'toppers' => array(
		'singular' => 'topper',
		'display' => 'topper',
		'icon' => 'dashicons-building',
		'description' => 'this is my toppers description'
	),
	'chef-base-sauces' => array(
		'singular' => 'chef-base-sauce',
		'display' => 'chef base sauce',
		'icon' => 'dashicons-building',
		'description' => 'this is my chef base sauces description'
	),
	'dressings-chutneys' => array(
		'singular' => 'dressings-chutney',
		'display' => 'dressings-chutney',
		'icon' => 'dashicons-building',
		'description' => 'this is my dressings-chutneys description'
	),
	'wholesalers' => array(
		'singular' => 'wholesaler',
		'display' => 'wholesaler',
		'icon' => 'dashicons-building',
		'description' => 'this is my wholesalers description'
	),
);

/**
 * Custom Post Type Generator
 * @param array - Array of post types to be created
 * @since 0.3.0
 * @return void
 */

add_action( 
	'init', 
	function() use ( $cpts ) { 
		inti_cpt_generator( $cpts ); 
	});

function inti_cpt_generator( $cpts )
{
	foreach ( $cpts as $cpt ) {
		$labels = array(
			'name'               => _x( $cpt['display'] . 's', 'post type general name' ),
			'singular_name'      => _x( $cpt['display'], 'post type singular name' ),
			'add_new'            => _x( 'Add New', $cpt['display'] ),
			'add_new_item'       => __( 'Add New ' . $cpt['display'] ),
			'edit_item'          => __( 'Edit ' . $cpt['display'] ),
			'new_item'           => __( 'New ' . $cpt['display'] ),
			'all_items'          => __( 'All ' . $cpt['display'] . 's' ),
			'view_item'          => __( 'View ' . $cpt['display'] ),
			'search_items'       => __( 'Search ' . $cpt['display'] . 's' ),
			'not_found'          => __( 'No ' . $cpt['display'] . 's found' ),
			'not_found_in_trash' => __( 'No ' . $cpt['display'] . 's found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => $cpt['display'] . 's',
		);

		$args = array(
			'public'      => true,
			'labels'      => $labels,
			'has_archive' => true,
			'supports'    => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes' ),
			'menu_icon'   => $cpt['icon'],
			'description' => $cpt['description']
		);

		register_post_type( $cpt['singular'], $args );
	}
	
}