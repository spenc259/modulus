<div class="col-xs-12">
    <?php foreach ($module['upload'] as $upload) : ?>
        <div class="col-sm-6">
            <h3><?php echo $upload['heading']; ?></h3>
        </div>
        <div class="col-sm-6">
            <p><a href="<?php echo $upload['file']['url']; ?>"><?php echo $upload['file']['title']; ?></a></p>
        </div>
    <?php endforeach; ?>
</div>
