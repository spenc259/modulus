<div class="<?php echo $content['class']; ?> events_slider">
    <div class="row">
        <div class="col"><img src="<?php echo $content['icon']['url']; ?>" alt="" /></div>
        <div class="col"><h3><?php echo $content['heading']; ?></h3></div>
    </div>
    <?php foreach ($content['events'] as $event) : ?>
        <div class="event">
            <a href="">
                <img src="<?php echo get_field('event_image', $event->ID)['url']; ?>" alt="">
                <div class="info">
                    <?php echo get_field('event_start_date', $event->ID); ?>
                    <?php echo $event->post_title; ?>
                    <?php echo get_field('event_description', $event->ID); ?>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>