<?php get_header(); ?> 

<div class="container">
	<div class="row">
		<div class="col-md-8 content-area" id="main-column">	
			<?php  while (have_posts())  : ?>
				<?php
				the_post();
				get_template_part('template-parts/singles/single', get_post_type());
				if (comments_open() || '0' != get_comments_number()) {
					comments_template();
				}
				?>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?> 
