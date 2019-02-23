<section class="<?php echo $row['row_class']; ?>" id="<?php echo $row['row_id']; ?>">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <h3 class="white">Pricing</h3>
            </div>
            <div class="row justify-content-between">
                <?php 
                    $prices = get_prices();

                    foreach ($prices as $price) :
                        $featured = ($price->post_title === "Mini Valet") ? "featured" : "normal";
                        echo "<article class='price'><header>" . $price->post_title . '</header><main class="' . $featured . '">£' . get_field('price', $price->ID) . '</main><footer></footer></article>';
                    endforeach;
                ?>
            </div>
            <div class="row justify-content-center">
                <p>Prices are dependant on size and condition of vehicle on arrival</p>
            </div>
        </div>
    </div>
</section>