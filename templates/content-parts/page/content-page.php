    <?php
        while (have_posts()) { the_post();
            // get the sections for the page
            do_action('page');
        }
    ?>
</div>
