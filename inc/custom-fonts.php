<?php

function google_fonts_url() {
	$fonts_url = '';

	$font_families = array();

	$font_families = ['Open+Sans:300,400,700'];

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}