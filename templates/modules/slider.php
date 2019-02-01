
<section class='col-12 slider pt-small pt-md-large pb-md-large'>
    <?php foreach ( $module['slider'] as $key => $slide ) : ?>
        <?php $link = get_the_permalink($slide->ID); ?>
        <?php $image_id = get_the_post_thumbnail_url($slide->ID); ?>
        
            <div class="slide">
                <a href="<?php echo $link; ?>">
                    <div class="slide-item" style="background-image: url('<?php echo $image_id; ?>');">
                        <div class="slide-inner"></div>
                    </div>
                </a>
            </div>
        
    <?php endforeach; ?>
</section>
