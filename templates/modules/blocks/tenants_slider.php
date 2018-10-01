<div class="row">
    <div class="<?php echo $content['class'] . ' ' . $content['acf_fc_layout']; ?>">
        <div class="row">
            <div class="col-2"><img src="<?php echo $content['icon']['url']; ?>" alt="" /></div>
            <div class="col-10 pl-0"><h5 class="mt-2"><?php echo $content['heading']; ?></h5></div>
        </div>
        <?php foreach ($content['tenants'] as $tenant) : ?>
            <div class="tenent"><a href=""><img src="<?php get_field('image', $tenant->ID) ?>" alt=""></a></div>
        <?php endforeach; ?>
    </div>
</div>
