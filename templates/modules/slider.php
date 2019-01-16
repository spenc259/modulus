
<section class='col-12 slider'>
    <?php foreach ( $module['slider'] as $key => $slide ) : ?>
        <?php $image_id = get_the_post_thumbnail_url($slide->ID); ?>
        <div class="slide">
            <div class="slide-item" style="background-image: url('<?php echo $image_id; ?>');">
                <div class="slide-inner"></div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
