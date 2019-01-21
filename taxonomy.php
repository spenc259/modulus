<?php

get_header();

$id = get_queried_object()->term_id;
$name = get_queried_object()->name;
$desc = get_queried_object()->description;
$tax = get_queried_object()->taxonomy;

$tax_args = array(
    'posts_per_page' => -1,
    'post_type' => array(
        substr($tax, 0, -1)
    ),
    'orderby' => 'title',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => $tax,
            'field' => 'term_id',
            'terms' => $id,
        )
    ),
);

$posts = new WP_Query($tax_args);

// echo '<pre>'; print_r($posts); echo '</pre>';

?>


<section class="soups content">
	<div class="container">
        <div class="row align-items-center">
            <div class="col-5">
                <img src="<?php echo site_url('/wp-content/uploads/2018/11/Redemption-Logo_Soup-2-01.png'); ?>" alt="Love Soup Logo" class="full"/>
            </div>
            <div class="col-7">
                <?php echo '<h2 class="caps large">' . $name . ' ' . $tax .'</h2>'; ?>
                <?php echo '<p class="tax-text">Select a product for more information</p>'; ?>
            </div>
        </div>
        <div class="row justify-content-center image-grid">
            <?php

            if ($posts->have_posts()) :
                while ($posts->have_posts()) : $posts->the_post();
                echo '<div class="col-4 image-grid-item">';
                
                echo '<a href="' . site_url('/'. substr($tax, 0, -1) .'/' . $post->post_name ) . '">';
                echo '<h2>' . $post->post_title . '</h2>';
                echo '<img src="' . get_field('image', $post->ID)['url'] . '" alt="" class="full" />';
                echo '</a>';
                echo '</div>';
            endwhile;
            endif;
            ?>
        </div>
    </div>
<?php


wp_reset_postdata();
get_footer();