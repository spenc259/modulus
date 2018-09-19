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
						<?php do_action('footer-menu'); ?>
						<address>
							<?php echo get_field('address', 'option'); ?>
						</address>
						<div class="tel">
							<?php echo get_field('telephone', 'option'); ?>
						</div>
						<div class="email">
							<?php echo get_field('email', 'option'); ?>
						</div>
						<div class="copy">
							<?php echo "&copy;" . date_i18n('Y'); ?>
						</div>
					</div>
					<div class="col-auto">

					</div>
					<div class="col-auto"></div>
				</div>
			</div>
		</footer>

		<link href="<?php echo get_template_directory_uri() . '/assets/css/main.css'; ?>" rel="stylesheet">

		<?php wp_footer(); ?>	
		<?php echo ($ga = get_option('options_google_analytics_script')) ? $ga : ''; ?>
	</body>
</html>
