<div class="<?php echo $content['class']; ?> events_slider">
    <div class="row">
        <div class="col-2"><img src="<?php echo $content['icon']['url']; ?>" alt="" /></div>
        <div class="col-10 pl-0"><h3><?php echo $content['heading']; ?></h3></div>
    </div>
    <div class="events">
        <?php foreach ($content['events'] as $event) : ?>
            <div class="event">
                <a href="">
                    <img src="<?php echo get_field('event_image', $event->ID)['url']; ?>" alt="">
                    <div class="info">
                        <?php echo get_field('event_start_date', $event->ID); ?><br>
                        <strong><?php echo $event->post_title; ?></strong> - 
                        <?php echo get_field('event_description', $event->ID); ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>