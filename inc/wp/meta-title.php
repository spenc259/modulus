<?php
function filter_title() {
	if ( $meta_title = get_option('options_meta_title') ) {
		return $meta_title;
	} else {
		return '';
	}
}
add_filter( 'pre_get_document_title', 'filter_title', 10, 2 );