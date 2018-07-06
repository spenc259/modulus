<div class="row align-items-center icon_title_content">
    <?php //echo '<pre>'; print_r($module); echo '</pre>'; ?>
    <img src="<?php echo $module['image']['url']; ?>" alt="" class="d-inline-flex mr-2 pb-2">
    <h3 class="d-inline-flex ml-3"><?php echo $module['title']; ?></h3>
    <div class="content">
        <?php echo $module['content']; ?>
    </div>
    <div class="hide">
        <?php echo $module['hidden_content']; ?>
    </div>
</div>
