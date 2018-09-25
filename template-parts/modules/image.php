<?php //echo '<pre>'; print_r($module); echo '</pre>'; ?>

<?php if ($module['has_caption']) : ?>
    <div class="image-caption">
       <?php if ($module['has_link']) : ?>
            <a href="<?php echo $module['link']; ?>"><img src="<?php echo $module['image']; ?>" /></a>
        <?php else : ?>
            <img src="<?php echo $module['image']; ?>" />
        <?php endif; ?>
        <div class="caption">
            <?php echo $module['caption']; ?>
        </div>
    </div>
<?php else : ?>
    <?php if ($module['has_link']) : ?>
        <a href="<?php echo $module['link']; ?>"><img src="<?php echo $module['image']; ?>" /></a>
    <?php else : ?>
        <img src="<?php echo $module['image']; ?>" />
    <?php endif; ?>
<?php endif; ?>