<?php 

$args = array(
    'post_type' => $module['name_of_cpt']
);

$cpt = get_posts( $args );

// echo '<pre>'; print_r($cpt); echo '</pre>';

?>

<div class="<?php echo $module['class']; ?> cpt" >
    <!-- <img src="" alt="<?php echo $module['cpt_image']['alt']; ?>"> -->

    <div class="description" style="background-image: url('<?php echo $module['cpt_image']['url']; ?>');">
        <div class="wrap">
            <h3><?php echo $module['name_of_cpt']; ?></h3>
            <p><?php echo $module['cpt_description']; ?></p>
        </div>
    </div>
</div>