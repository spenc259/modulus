<?php

/**
 * Archive
 * @since 0.3.0
 */

echo "archives123";

$post_type = get_post_type();

get_header(); ?>

<div class="container <?php echo get_post_type(); ?>">
    <div class="row">

    <?php if (have_posts()) : ?>
		<div class="intro cta_banner col-12">
            <?php
                if ( $post_type == 'post') {
                    echo "<h2>" . str_replace("Category: ", '', get_the_archive_title()) . "</h2>123";
                    the_archive_description('<p>', '</p>');
                } else {
                    echo "<h2>" . str_replace("Archives: ", '', get_the_archive_title()) . "</h2>123";
                    echo "<p>" . get_field($post_type . '_description', 'option') . "</p>";
                }
            ?>
		</div>
	<?php endif; ?>

        <?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    get_template_part('templates/archives/content', get_post_type());
                }
            } else {
                get_template_part( 'no-results', 'archive' );
            }
        ?>
    </div>
</div>



<?php get_footer();