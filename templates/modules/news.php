<div class="heading">
    <h3>Latest News</h3>
    <a href="<?php echo site_url() . '/news'; ?>">view all</a>
    <div class="small-prev"><</div>
    <div class="small-next">></div>
</div>

<div class="news" id="news">
    <?php 
        $args = array(
            'post_type' => 'post',
        );
        $news = new WP_Query( $args );

        if ( $news->have_posts() ) :
            while ( $news->have_posts() ) : 
                $news->the_post(); ?>
                <div class="news-post">
                    <?php
                        if ( '' !== get_the_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo responsive_image( get_post_thumbnail_id( get_the_ID() ), 'medium', true ); ?>
                                    <?php //the_post_thumbnail( 'small' ); ?>
                                </a>
                            </div><!-- .post-thumbnail --><?php 
                        endif;
                    ?>
                    <div class="news-content">
                        <?php
                            the_title('<h6 class="title">', '</h6>', true);
                            echo '<p>' . get_excerpt( 200 ) . '</p>';
                        ?>
                    </div>
                </div><?php
            endwhile;
        endif;

        //Reset Post Data
        wp_reset_postdata();
    ?>
</div>