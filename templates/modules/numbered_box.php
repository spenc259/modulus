<div class="module numbered_box h-100">
	<div class="wrapper  pl-3 pr-3 pt-4 pb-4 mt-3 mb-3 border border-primary ">

		<h2><?php echo $module['title']; ?></h2>

		<?php echo $module['content']; ?>

		<?php if ( isset($module['button']['url']) ): ?>
			<a href="<?php echo $module['button']['url']; ?>" class="btn btn-warning"><?php echo $module['button']['title']; ?></a>
		<?php endif; ?>

		<div class="number text-warning"><?php echo $module['number']; ?></div>

	</div>
</div>
