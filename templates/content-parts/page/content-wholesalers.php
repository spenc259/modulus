<div class="container wholesalers">
    <div class="row">
    <?php
        // echo '<pre>' . print_r($wq) . '</pre>';
        while ($wq->have_posts()) { $wq->the_post(); 
        ?>
            <div class="col-6 single">
                <div class="row">
                    <div class="col-6">
                        <img class="logo" src="<?php echo get_field('image'); ?>" alt="<?php echo get_field('name'); ?> logo">
                    </div>
                    <div class="col-6">
                        <?php 
                            echo "<h3>" . get_field('name') . '</h3>';
                        ?>
                        <address>
                            <?php 
                                echo str_replace(',', ',<br>', get_field('address') );
                            ?>
                        </address>
                        <?php if (get_field('phone_number')) : ?>
                        <div class="row align-items-center">
                            <div class="col-2 pr-0">
                                <img class="icon" src="<?php echo site_url('/wp-content/uploads/2018/11/Phone-icon.png'); ?>" alt="phone icon" />
                            </div>
                            <div class="col-10 pl-0">
                                <?php 
                                    echo get_field('phone_number');
                                ?>   
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (get_field('email')) : ?>
                        <div class="row align-items-center">
                            <div class="col-2 pr-0">
                                <img class="icon" src="<?php echo site_url('/wp-content/uploads/2018/11/Email-icon.png'); ?>" alt="email icon" />
                            </div>
                            <div class="col-10 pl-0">
                                <?php 
                                    echo get_field('email');
                                ?>   
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php }
    ?>
    </div>
</div>