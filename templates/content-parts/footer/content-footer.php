<?php 
/**
 * Footer content template
 * @since 0.4.3
 * @todo Add footer menu function
 */
		get_template_part( 'templates/content-parts/footer/sub', 'footer' ); ?>

		<footer id="site-footer">
			<div class="container">
				<div class="row">
					<?php echo '&copy; ' . date('Y') . ' GM Valeting'; ?>
				</div>
			</div>
		</footer>

		<?php wp_footer(); ?>	
		<?php echo ($ga = get_option('options_google_analytics_script')) ? $ga : ''; ?>
	</body>
</html>
