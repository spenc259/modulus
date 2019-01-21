<div class="<?php echo ( $row['fluid'] == 1 ) ? 'container-fluid ' . $row['class'] : 'container ' . $row['class']; ?>">
    <div class="row justify-content-center align-items-center">
        <?php foreach ( $row['pick_a_module'] as $module ) : ?>
            <?php include( locate_template( 'templates/modules/' . $module['acf_fc_layout'] . '.php' ) ); ?>
        <?php endforeach; ?>
    </div>
</div>