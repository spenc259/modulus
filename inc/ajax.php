<?php

add_action( 'wp_ajax_nopriv_ajax_demo', 'ajax_demo' );
add_action( 'wp_ajax_ajax_demo', 'ajax_demo' );

function ajax_demo() {
	$response = array('content' => 'response content.');
	wp_send_json_success($response);
}

add_action( 'wp_ajax_nopriv_ajax_get_events', 'ajax_get_events' );
add_action( 'wp_ajax_ajax_get_events', 'ajax_get_events' );

add_action( 'wp_ajax_nopriv_ajax_get_projects', 'ajax_get_projects' );
add_action( 'wp_ajax_ajax_get_projects', 'ajax_get_projects' );

add_action( 'wp_ajax_nopriv_search_project', 'search_project' );
add_action( 'wp_ajax_search_project', 'search_project' );