<?php 

$args = array(
    'post_type' => $module['name_of_cpt']
);

$cpt = get_posts( $args );


echo $module['cpt_description'];