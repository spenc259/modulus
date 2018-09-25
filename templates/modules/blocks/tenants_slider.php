<div class="row">
    <div class="<?php echo $content['class'] . ' ' . $content['acf_fc_layout']; ?>">
        <div class="row">
            <div class="col"><img src="<?php echo $content['icon']['url']; ?>" alt="" /></div>
            <div class="col"><h3><?php echo $content['heading']; ?></h3></div>
        </div>
        <?php foreach ($content['tenants'] as $tenant) : ?>
            <div class="tenent"><a href=""><img src="<?php get_field('image', $tenant->ID) ?>" alt=""></a></div>
        <?php endforeach; ?>
    </div>
</div>
