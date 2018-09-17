<?php

/**
 * Remove any unwanted style sheets
 * and scripts
 *
 * @return void
 */
function remove_styles()
{
    // Add stylesheet handles here
    $removals = array(
        // 'sportspress-style-css',
    );

    // add script handles here
    $scripts = array(
		// 'bootstrap-script',
		// 'jquery-countdown',
		// 'jquery-datatables',
    );


    if (!is_admin()) {
        foreach ($removals as $remove) {
            wp_dequeue_style( $remove ); 
            wp_deregister_style( $remove );
        }

        foreach ( $scripts as $script ) {
            wp_deregister_script( $script );
        }
    }
}

add_action( 'wp_enqueue_scripts', 'remove_styles' );


// remove dashicons
function wpdocs_dequeue_dashicon() {

	if ( current_user_can( 'update_core' ) ) {
	    return;
    }
    wp_dequeue_style( 'dashicons' );
    wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );