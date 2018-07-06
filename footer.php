<div class="sub_footer container">
	<img src="<?php echo site_url() . '/core/radar_sub_footer.png'; ?>" alt="Ping Radar Logo" />
</div>
<footer id="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-auto mr-auto">
				<a href="">Terms and Conditions</a><a href="">Disclaimer</a><a href="">Privacy Statement</a><a href="">GDPR Compliance Statement</a>
			</div>
			<div class="col-auto"></div>
		</div>
	</div>
</footer>

<link href="<?php echo get_template_directory_uri() . '/assets/css/main.css'; ?>" rel="stylesheet">

<?php wp_footer(); ?> 

<?php if ($ga = get_option('options_google_analytics_script')) : ?>
	<?php echo $ga; ?>
<?php endif; ?>
</body>
</html>