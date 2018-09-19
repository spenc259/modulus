<div class="<?php echo $module['class']; ?>">
<?php 
    foreach ($module['types'] as $key => $content) {
        include( locate_template( 'templates/modules/blocks/' . $content['acf_fc_layout'] . '.php' ) );
    }
?>
</div>