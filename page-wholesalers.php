<?php 

get_header();

$wq_args = array(
    'post_type' => 'wholesaler'
);

$wq = new WP_Query($wq_args);

$wq->posts = array_reverse($wq->posts);

include( locate_template( 'templates/content-parts/page/content-wholesalers.php' ) );

get_footer();