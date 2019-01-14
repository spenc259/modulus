<?php 

$contact_info = get_field('contact_info', 'option');


?>

<div class="spaces-grid col-12">
    <div class="grid-item col-4">
        <h3>More Than a place to work</h3>
        <p>To arrange a viewing today call a <br> member of the team on </br><?php echo $contact_info['telephone']; ?> or email<br> us at <?php echo $contact_info['email']; ?></p>
        <button class="primary download">Download Site Plan</button>
    </div>

    <?php 
        $space_args = array(
            'post_type' => 'space'
        );

        $space_query = new WP_Query($space_args);
        // echo '<pre>'; print_r($space_query); echo '</pre>';

        foreach ( $space_query->posts as $post ) : ?>
            <div class="grid-item col-4">
                <div class="description" style="background-image: url('');">
                    <div class="wrap">
                        <h3><?php echo $post->post_title; ?></h3>
                        <p><?php echo $post->post_content; ?></p>
                    </div>
                </div>
            </div> <?php
        endforeach; 
    ?>
</div>