<?php 
	session_start(); 
	// session_destroy();
?>
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

	<header id="site-header" class="px-1 py-2">
		<div class="container">
			<div class="row align-items-center mb-4">
				<div class="col-auto ml-auto mr-auto ml-sm-0" id="logo">
					<?php
						do_action('header_left');
					?>
				</div>

				<div class="col-auto m-auto m-sm-0">
					<?php 
						echo '<a href="'. site_url("/purchase") .'"><button>Buy Now</button></a>';
					?>
				</div>
			</div>
			<?php do_action('after_header'); ?>
		</div>
	</header>

	