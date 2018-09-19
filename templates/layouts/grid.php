<div class="<?php echo ( $row['fluid'] == 1 ) ? 'container-fluid' : 'container'; ?>">
    <div class="row justify-content-center <?php echo $row['class']; ?>">
        <div class="grid">
            <?php foreach ( $row['pick_a_module'] as $module ) : ?>
                <div class="grid-item">
                    <?php include( locate_template( 'templates/modules/' . $module['acf_fc_layout'] . '.php' ) ); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>