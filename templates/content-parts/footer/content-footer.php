<?php 
/**
 * Footer content template
 * @since 0.4.3
 * @todo Add footer menu function
 */
$contact_info = get_field('contact_info', 'option'); 
?>
	</main>
		<footer id="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<img src="<?php echo site_url('/wp-content/themes/intimation-pro/assets/img/Redemption-Footer-Logo.png'); ?>" alt="Footer Logo" srcset="" class="full">
					</div>
					<div class="col-md-4">
						<address>
							<?php echo $contact_info['address']; ?>
						</address>
					</div>
					<div class="col-md-3">
						<div class="social text-right">
							<h5>Follow Us</h5>
							<a href="<?php echo get_field('facebook_url', 'option'); ?>"><i class="fab fa-facebook-f"></i></a>
							<a href="<?php echo get_field('twitter_url', 'option'); ?>"><i class="fab fa-twitter"></i></a>
							<a href="<?php echo get_field('instagram_url', 'option'); ?>"><i class="fab fa-instagram"></i></a>
							<a href="<?php echo get_field('linkedin_url', 'option'); ?>"><i class="fab fa-linkedin"></i></a>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-5">
						<div class="copy">
							<?php echo "Copyright &copy;" . date_i18n('Y') . " " . get_field('copyright_info', 'option'); ?>
						</div>
					</div>
					<div class="col-md-5">
						T: <?php echo $contact_info['telephone']; ?><span> </span> E:  <?php echo $contact_info['email']; ?>
					</div>
					<div class="col-md-2 text-right">
						Website design by <img src="<?php echo site_url('/wp-content/uploads/2018/11/Intimation-pin.png'); ?>" alt="intimation logo" />
					</div>
				</div>

			</div>
		</footer>
	
	<!--</div> --><!-- end main content -->

		<link href="<?php echo get_template_directory_uri() . '/assets/css/main.css'; ?>" rel="stylesheet">

		<?php wp_footer(); ?>	
		<?php echo ($ga = get_option('options_google_analytics_script')) ? $ga : ''; ?>
	</body>
</html>
