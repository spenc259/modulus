<div class="<?php echo ( $row['fluid'] == 1 ) ? 'container-fluid' : 'container'; echo $row['class'];?>">
    <div class="<?php echo $row['class']; ?>">
        <?php foreach ( $row['pick_a_module'] as $module ) : ?>
            <?php include( locate_template( 'template-parts/modules/' . $module['acf_fc_layout'] . '.php' ) ); ?>
        <?php endforeach; ?>
    </div>
</div>