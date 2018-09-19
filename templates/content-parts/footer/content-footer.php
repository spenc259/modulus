<?php 
/**
 * Footer content template
 * @since 0.4.3
 * @todo Add footer menu function
 */
		get_template_part( 'templates/content-parts/footer/content', 'sub-footer' ); ?>

		<footer id="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-auto mr-auto">
						<img src="" alt="Footer Logo" srcset="">
						<?php 
							do_action('footer-menu');
							$contact_info = get_field('contact_info', 'option');
						?>
						<address>
							<?php echo $contact_info['address']; ?>
						</address>
						<div class="tel">
							<?php echo $contact_info['telephone']; ?>
						</div>
						<div class="email">
							<?php echo $contact_info['email']; ?>
						</div>
						<div class="copy">
							<?php echo "&copy;" . date_i18n('Y'); ?>
						</div>
					</div>
					<div class="col-auto">
						<h3 class="uppercase">Get in touch with Maxim</h3>
						<h4 class="uppercase">Leasing Team</h4>
						<?php 
							echo 'Team list here';
						?>
					</div>
					<div class="col-auto">
						people icon
						<h4 class="uppercase">What our clients say</h4>
						<?php 
							echo 'Testimonials here';
						?>
					</div>
				</div>
			</div>
		</footer>

		<link href="<?php echo get_template_directory_uri() . '/assets/css/main.css'; ?>" rel="stylesheet">

		<?php wp_footer(); ?>	
		<?php echo ($ga = get_option('options_google_analytics_script')) ? $ga : ''; ?>
	</body>
</html>
