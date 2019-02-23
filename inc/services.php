<?php

function get_services()
{
    $args = array(
        'post_type' => 'service',
        'order' => 'ASC',
        'posts_per_page' => -1
    );

    $services = new WP_Query($args);

    return $services->posts;
}