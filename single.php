<?php 

get_header();

get_template_part( 'template-parts/content-parts/posts/content', get_post_type() );

get_footer();
