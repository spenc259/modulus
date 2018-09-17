<?php

if (!function_exists('inti_pro_setup')) {

	function inti_pro_setup() {
		load_theme_textdomain('inti-pro', get_template_directory() . '/languages');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));
		// add_theme_support( 'sportspress' );
		
		
		/**
		 * Gutenberg additions
		 * @since 1.0.0
		 */
		
		// support full page images
		add_theme_support( 'align-wide' );

		// theme specific colours and font sizes
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'strong magenta', 'inti-pro' ),
				'slug' => 'strong-magenta',
				'color' => '#a156b4',
			),
		));

		// only allow the above defined colours
		add_theme_support( 'disable-custom-colors' );

		// custom theme font sizes
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => __( 'small', 'inti-pro' ),
				'shortName' => __( 'S', 'inti-pro' ),
				'size' => 12,
				'slug' => 'small'
			),
		));

		// Custom editor stylesheet defined below
		add_theme_support( 'editor-styles' );
		// add_theme_support( 'dark-editor-style' ); // Dark background editor

		// Use default block styles
		add_theme_support( 'wp-block-styles' );


	}

	add_action('after_setup_theme', 'inti_pro_setup');

}

/**
 * Enqueue block editor style
 */
function inti_pro_block_editor_styles() {
    wp_enqueue_style( 'inti_pro-block-editor-styles', get_theme_file_uri( '/deploy/style-editor.css' ), false, '1.0', 'all' );
}

add_action( 'enqueue_block_editor_assets', 'inti_pro_block_editor_styles' );


/**
 * Image Sizes
 */

add_image_size('250x250', 250, 250, true);
add_image_size('400', 400, 400, true);