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
            <div class="col-auto"><h3><?php echo $module['module_heading']; ?></h3></div>
        </div>
        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col-6">
                    <div class="row">
                        <div class="col">
                            <img src="" alt="1st Post" />
                        </div>
                        <div class="col">
                            <h5>heading</h5>
                            <p>post content</p>
                            <a class="uppercase" href="">Read More...</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>