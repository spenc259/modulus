<section class="<?php echo $row['row_class']; ?> white-bg" id="<?php echo $row['row_id']; ?>">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <h3>What's included</h3>
            </div>
            <div class="row justify-content-between">
                <?php $services = get_services(); ?>
                <?php $prices = get_prices(); ?>
                <?php foreach ($prices as $price) : 
                    echo '<div class="col service"><h4>' . $price->post_title . '</h4>'; ?>
                    <ul>
                        <?php 
                            foreach ($services as $service) :
                                $price_group = get_field('price_group', $service->ID);

                                if ($price_group) {
                                    if ( in_array($price->post_title, $price_group) ) {
                                        echo "<li>" . $service->post_title . "</li>"; 
                                    }
                                }
                            endforeach;
                        ?>
                    </ul>
                    <?php echo "</div>"; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>