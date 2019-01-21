<?php 

if ( $module['taxonomy'] !== '') {

    $tax_query = array(
        'taxonomy' => $module['taxonomy'],
        'field' => 'name',
        'terms' => $module['tax_name'],
    );
    
} else {
    $tax_query = '';
}

$cpt_args = array(
    'posts_per_page' => -1,
    'post_type' => array(
        $module['name_of_cpt']
    ),
    'orderby' => 'title',
    'order' => 'ASC',
    'tax_query' => array(
        $tax_query
    ),
);

$cpt = new WP_Query($cpt_args);

if ($module['tax_name'] !== '') {
    echo '<h2 class="w-100 text-center pt-5">' . $module['tax_name'] . ' ' . substr($module['taxonomy'], 0, -1)  . '</h2>';
    echo '<p class="w-100 text-center pt-3">Select a product for more information. </p>';
}

echo "<div class='row justify-content-center image-grid'>";
foreach ($cpt->posts as $post) {
    echo '<div class="col-4 image-grid-item">';
    echo '<a href="' . site_url('/' . $module['taxonomy'] . '/' . $post->post_name) . '">';
    echo '<h2>' . $post->post_title . '</h2>';
    echo '<img src="' . get_field('image', $post->ID)['url'] . '" alt="" class="full" />';
    echo '</a>';
    echo '</div>';
}
echo "</div>";
