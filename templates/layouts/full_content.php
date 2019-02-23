<section class="<?php echo $row['row_class']; ?>" id="<?php echo $row['row_id']; ?>">
    <div class="<?php echo ( $row['fluid'] == 1 ) ? 'container-fluid' : 'container'; ?>">
        <div class="row">
            <?php foreach ( $row['pick_a_module'] as $module ) : ?>
                <?php include( locate_template( 'templates/modules/' . $module['acf_fc_layout'] . '.php' ) ); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>