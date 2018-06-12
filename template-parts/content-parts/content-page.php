<?php $current_page = get_post( get_the_ID() ); ?>

<div class="container">
    <div class="row"> 
        <?php
            while (have_posts()) { the_post();

                // get the sections for the page

                do_action('page');

            }
        ?>
    </div>
</div>