<?php
/**
 * Template Name: Flexible Content
 * 
 */

get_header();

?>
<?php 

while (have_posts()) { the_post();

	$sections = get_post_meta( $post->ID, 'flexible_content' );

	foreach($sections as $section) {

		$fs = $section;

		if (locate_template('template-assists/section-' . $section['acf_fc_layout'] . '.php') != '') {

			include(locate_template('template-assists/section-' . $section['acf_fc_layout'] . '.php'));

			extract($data);

		}

		include(locate_template('templates/section-' . $section['acf_fc_layout'] . '.php'));

		unset($data);

	} 

}

?> 

<?php get_footer(); ?> 