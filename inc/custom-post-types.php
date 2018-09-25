<?php

$cpts = array(
	'slides' => array(
		'singular' => 'slide',
		'display' => 'Slide',
		'icon'		=> 'dashicons-format-gallery'
	),
	'spaces' => array(
		'singular' => 'space',
		'display' => 'Space',
		'icon' => 'dashicons-building',
		'description' => 'this is my spaces description'
	),
	'tenants' => array(
		'singular' => 'tenant',
		'display' => 'Tenant',
		'icon' => 'dashicons-building',
		'description' => 'this is my tenants description'
	),
	'events' => array(
		'singular' => 'event',
		'display' => 'Event',
		'icon' => 'dashicons-building',
		'description' => 'this is my events description'
	),
	'team_members' => array(
		'singular' => 'team_member',
		'display' => 'Team Member',
		'icon' => 'dashicons-building',
		'description' => 'this is my Team Members description'
	),
	'testimonials' => array(
		'singular' => 'testimonial',
		'display' => 'Testimonial',
		'icon' => 'dashicons-building',
		'description' => 'this is my testimonials description'
	),
	'locations' => array(
		'singular' => 'location',
		'display' => 'Location',
		'icon' => 'dashicons-building',
		'description' => 'this is my locations description'
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