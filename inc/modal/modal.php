<?php 

function search_project() {

    if ( $_POST['value'] !== '') {
        $pagename = $_POST['value'];
        $args = array(
            'post_type' => 'project',
            's' => $pagename
        );
    } else {
        $args = array(
        'post_type' => 'project',
        );
    }

    $query = new WP_Query( $args );

    wp_send_json_success( $query );
    die();
}