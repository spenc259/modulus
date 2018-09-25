<?php $current_page = get_post( get_the_ID() ); ?>

<div class="container">
    <div class="row">
        <?php
            while (have_posts()) { the_post();
                if (!is_page('purchase')) {
                    the_title('<h2 class="col-12 pl-0">', '</h2>');
                    the_content();
                }
                
                do_action('page');
            }
        ?>
    </div>
</div>