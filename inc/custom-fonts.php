<?php

function google_fonts_url() {
	$fonts_url = '';

	$font_families = array();

	$font_families = ['Open+Sans:300,400,700'];

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	// return $fonts_url;
	return 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700';

	//https://fonts.googleapis.com/css?family=Open+Sans:300,400,700
	//https://fonts.googleapis.com/css?family=Open+Sans:300,400,700
}