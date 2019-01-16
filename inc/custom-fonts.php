<?php

function google_fonts_url() {
	$fonts_url = '';

	$font_families = array();

	$font_families = ['Covered+By+Your+Grace', 'Merriweather:300,400,700', 'Noto+Sans+TC'];

	$query_args = array(
		'family' => implode( '|', $font_families )
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return $fonts_url;
}
