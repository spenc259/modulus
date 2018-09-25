<div class="sub_footer container">
	<div class="row">
	<img src="<?php echo site_url() . '/core/radar_sub_footer.png'; ?>" alt="Ping Radar Logo" />
	</div>
</div>
<footer id="site-footer">
		<?php 
			$args = array(
				'menu'            => 'footer', 
				'container'       => 'div', 
				'container_class' => 'container',
				'menu_class'      => 'row flex-wrap', 
				'menu_id'         => 'footer-menu',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
			);
			wp_nav_menu($args); 
		?>
</footer>

<link href="<?php echo get_template_directory_uri() . '/assets/css/main.css'; ?>" rel="stylesheet">

<?php wp_footer(); ?> 

<?php if ($ga = the_field('analytics_script', 'option')) : ?>
	<?php echo $ga; ?>
<?php endif; ?>
</body>
</html>