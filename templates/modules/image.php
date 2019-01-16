<?php //echo '<pre>'; print_r($module); echo '</pre>'; ?>

<?php if ($module['has_caption']) : ?>
    <div class="image-caption <?php echo $module['class']; ?>">
       <?php if ($module['has_link']) : ?>
            <a href="<?php echo $module['link']; ?>"><img src="<?php echo $module['image']; ?>" class="<?php echo $module['class']; ?>" /></a>
        <?php else : ?>
            <img src="<?php echo $module['image']; ?>" class="<?php echo $module['class']; ?>" />
        <?php endif; ?>
        <div class="caption">
            <?php echo $module['caption']; ?>
        </div>
    </div>
<?php else : ?>
    <?php if ($module['has_link']) : ?>
        <a href="<?php echo $module['link']; ?>"><img src="<?php echo $module['image']; ?>" class="<?php echo $module['class']; ?>" /></a>
    <?php else : ?>
        <?php if ($module['class'] === 'parallax') : ?>
            <div style="background-image: url('<?php echo $module['image']; ?>');" class="<?php echo $module['class']; ?>"></div>
        <?php else : ?>
            <img src="<?php echo $module['image']; ?>" class="<?php echo $module['class']; ?>" />
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>