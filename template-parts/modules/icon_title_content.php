<div class="row align-items-center icon_title_content justify-content-start">
    <?php //echo '<pre>'; print_r($module); echo '</pre>'; ?>
    <img src="<?php echo $module['image']['url']; ?>" alt="" class="mr-2 mr-md-0 mr-lg-2 pb-2">
    <h3 class="ml-md-0 ml-lg-3"><?php echo $module['title']; ?></h3>
    <div class="content">
        <?php echo $module['content']; ?>
    </div>
    <div class="hide">
        <?php echo $module['hidden_content']; ?>
    </div>
</div>
