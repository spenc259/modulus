<?php

get_header();

?> 
<?php get_sidebar('left'); ?> 
<div class="col-md-9 content-area" id="main-column">
	<?php if (have_posts()) { ?> 
		<h1 class="page-title"><?php printf(__('Search Results for: %s', 'inti-pro'), '<span>' . get_search_query() . '</span>'); ?></h1>
		<?php 

		while (have_posts()) {
			the_post();


			get_template_part('content');
		}
		
		?> 
		<?php } else { ?> 
			<?php get_template_part('no-results', 'search'); ?>
			<?php } ?> 
		</main>
	</div>
	<?php get_sidebar('right'); ?> 
	<?php get_footer(); ?> 