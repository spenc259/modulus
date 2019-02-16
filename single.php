<?php get_header(); ?> 

<div class="container">
	<div class="row">
		<div class="col-md-12 content-area" id="main-column">	
			<?php  while (have_posts())  : ?>
				<?php
				the_post();
				get_template_part('templates/content-parts/singles/single', get_post_type());
				?>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?> 
