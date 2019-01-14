<div class="<?php echo $content['class']; ?> events_slider">
    <div class="row">
        <div class="col-2"><img src="<?php echo $content['icon']['url']; ?>" alt="" /></div>
        <div class="col-10 pl-0"><h3><?php echo $content['heading']; ?></h3></div>
    </div>
    
    <div class="events">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
            <?php foreach ($content['events'] as $event) : ?>
                <li class="glide__slide">
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
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <div data-glide-el="controls">
            <button data-glide-dir="<" class="prev"><</button>
            <button data-glide-dir=">" class="next">></button>
        </div>
    </div>
</div>