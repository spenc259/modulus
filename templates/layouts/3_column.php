<div class="container <?php echo $row['class']; ?>">
    <div class="row bucket mb-4">
        <?php foreach ( $row['pick_a_module'] as $module ) : ?>
            <div class="col-md-4 <?php echo $row['sub_class']; ?>">
                <?php include( locate_template( 'templates/modules/' . $module['acf_fc_layout'] . '.php' ) ); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
