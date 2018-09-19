<?php 
/**
 * Template Name: Page Archive
 */

get_header();
$title = get_the_title();
?>

<div class="container <?php echo $title; ?>">
    <div class="row">

        <?php
        $current_ID = get_the_ID();
        

        $args = array(
            'post_parent' => $current_ID,
            'post_type' => array('page')
        );

        $query = new WP_Query( $args );
        $count = 0;

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();

                $title = get_the_title();
                $content = get_the_content();
                $image = get_the_post_thumbnail( $post->ID, array(400, 400) ); ?>

                <div class="sub-page">
                    <?php $class = ( $count % 2 == 0 ) ? 'right' : 'left'; ?> 
                    <div class="col-sm-6">
                        <?php echo $image; ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="heading">
                            <h2><?php echo $title; ?></h2>
                        </div>
                        <p><?php echo short($content); ?></p>
                    </div>
                </div>

            <?php
            $count++;
            endwhile;
        endif;
        wp_reset_query();

        ?>
    </div>
</div>

<?php 

get_footer();