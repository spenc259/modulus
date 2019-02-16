<section class="<?php echo $row['row_class']; ?>">
<div class="container">
    <div class="row">
        <?php foreach ( $row['pick_a_module'] as $module ) : ?>
            <div class="col-sm-6">
                <?php include( locate_template( 'templates/modules/' . $module['acf_fc_layout'] . '.php' ) ); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>