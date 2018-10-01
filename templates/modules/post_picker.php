<?php 

$posts_args = array(
    'post_type' => 'post',
    'numberposts' => 2,
    'tax_query' => array(
        array(
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => array($module['posts'][0]),
        )
    )
    );

$posts = get_posts($posts_args);

$term = get_term_by('term_id', $module['posts'][0], 'category');
// echo '<pre>'; print_r($term); echo '</pre>';
?>

<div class="<?php echo $module['class']; ?>">
    <div class="<?php echo $term->name; ?>">
        <div class="row">
            <div class="col-auto"><img src="<?php echo $module['icon']['url']; ?>" alt="" /></div>
            <div class="col-auto pl-0"><h3><?php echo $module['module_heading']; ?></h3></div>
        </div>
        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col-6">
                    <div class="row">
                        <div class="col">
                            <?php echo get_the_post_thumbnail($post->ID); ?>
                        </div>
                        <div class="col">
                            <h5><?php echo substr(strip_shortcodes(strip_tags($post->post_title)), 0, 24) . '...'; ?></h5>
                            <p><?php echo substr( strip_shortcodes( strip_tags( $post->post_content ) ), 0, 25 ) . '...'; ?></p>
                            <a class="uppercase secondary" href="<?php echo site_url($post->post_name); ?>">Read More...</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>