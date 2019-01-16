<?php get_header(); ?>

<?php if (get_queried_object()->post_type != 'post') : ?> 

	<?php get_template_part('templates/content-parts/singles/single', 'cpt'); ?>

<?php else : ?>
	<div class="container single">
		<div class="row">
			<div class="col-md-8 content-area" id="main-column">	
				<?php  while (have_posts())  : ?>
					<?php
						the_post();

						if (comments_open() || '0' != get_comments_number()) {
							comments_template();
						}
					?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php endif; ?> 

<?php get_footer(); ?> 
