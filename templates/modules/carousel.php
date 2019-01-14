<section class='carousel <?php echo $module['class']; ?> pl-0'> 
    <div class="carousel-bg">
        <?php if ( !empty($module['add_title']) || $module['add_title'] === 1 ) : ?>
            <?php echo '<' . $module['title']['title_button'] . ' class="title">' . $module['title']['title_text'] . '</' . $module['title']['title_button'] . '>'; ?>
        <?php endif; ?>
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                <?php foreach ( $module['images'] as $key => $image ) : ?>
                    <li class="glide__slide">
                        <div class="image">
                            <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['description']; ?>">
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
</section>
