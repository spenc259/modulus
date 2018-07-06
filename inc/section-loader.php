<?php
/**
 * Section Loader
 * @since 0.3.0
 * @return void
 */
function sections() {

	if ( !is_home() ) {
		$rows = get_post_meta( $post->ID, 'build_a_row' );
		if ( get_field('build_a_row') ) { 
			$rows = get_field('build_a_row');
		} else {
			$rows = array();
		}
    } else {
		$rows = get_option( 'build_a_row' );
        if ( get_field('build_a_row', 'option') ) {
			$rows = get_field('build_a_row', 'option');
		} else {
			$rows = array();
		}
	}
	// echo '<pre>'; print_r($rows[0]); echo '</pre>';

	foreach ( $rows as $row ) {
		include( locate_template( 'template-parts/layouts/' . $row['acf_fc_layout'] . '.php' ) );
	}
}

add_action('page', 'sections');