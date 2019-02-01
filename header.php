<!DOCTYPE html>
<html lang=en>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<?php if ( $meta_desc = get_option('options_meta_description') ) : ?>
		<meta name="description" content="<?php echo $meta_desc; ?>">
	<?php endif; ?>

	<?php wp_head(); ?>

	<?php scss_compile_check(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action('before_header'); ?>

	<?php do_action('mobile_menu'); ?>
	
	<?php 
	
	if ( is_home() ) {
		get_template_part('templates/content-parts/header/content', 'home-header');
	} else {
		get_template_part('templates/content-parts/header/content', 'header');
	}
	
	?>
	
	<?php do_action('after_header'); ?>

	<?php get_template_part( 'templates/content-parts/nav/content', 'nav' ); ?>