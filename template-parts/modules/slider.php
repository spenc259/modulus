
<section class='slider'>
    <div class="owl-carousel owl-theme">
    
        <?php foreach ( $module['slider'] as $key => $slide ) : ?>

            <div class="slide">
                <?php $image_id = get_post_meta( $slide->ID, 'image', true ); ?>
                <?php $caption = get_post_meta( $slide->ID, 'caption', true ); ?>
                <?php echo get_the_attachment_link( $image_id, true ); ?>
                <!--
                    <div class="title">
                        <?php // echo $slide->post_title; ?>
                    </div>
                -->
                <div class="caption">
                    <?php echo $caption; ?>
                </div>
            </div>
            
        <?php endforeach; ?>

    </div>
</section>