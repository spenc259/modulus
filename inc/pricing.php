<?php

function get_prices()
{
    $args = array(
        'post_type' => 'price',
        'order' => 'ASC'
    );

    $prices = new WP_Query($args);

    return $prices->posts;
}