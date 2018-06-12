<?php

/**
 * Archive
 * @since 0.3.0
 */

get_header(); ?>

<div class="container <?php echo get_post_type(); ?>">
    <div class="row">
    
        <?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();

                    get_template_part('template-parts/pages/content', get_post_type());

                }
            } else {
                get_template_part( 'no-results', 'archive' );
            }
        ?>
    
    </div>
</div>



<?php get_footer();