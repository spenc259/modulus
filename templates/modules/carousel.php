

<section class='carousel <?php echo $module['class']; ?>'>
    <?php if ( !empty($module['add_title']) || $module['add_title'] === 1 ) : ?>
        <?php echo '<' . $module['title']['title_button'] . '>' . $module['title']['title_text'] . '</' . $module['title']['title_button'] . '>'; ?>
    <?php endif; ?>
    <div class="carousel-module owl-carousel owl-theme owl-height">

        <?php foreach ( $module['images'] as $key => $image ) : ?>
        
            <div class="image">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['description']; ?>">
            </div>
            
        <?php endforeach; ?>

    </div>
</section>