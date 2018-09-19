<div class="<?php echo ( $row['fluid'] == 1 ) ? 'container-fluid' : 'container'; ?>">
    <div class="row justify-content-center <?php echo $row['class']; ?>">
        <?php foreach ( $row['pick_a_module'] as $module ) : ?>
            <?php include( locate_template( 'templates/modules/' . $module['acf_fc_layout'] . '.php' ) ); ?>
        <?php endforeach; ?>
    </div>
</div>