<footer id="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 md-no-pad">
				<div class="icons col-xs-12 no-pad">
					<div class="col-xs-3 icon no-pad">
						<a href="https://<?php echo get_option('options_instagram_url'); ?>"><i class="fa fa-instagram"></i></a>
					</div>
					<div class="col-xs-3 icon no-pad">
						<a href="https://<?php echo get_option('options_facebook_url'); ?>"><i class="fa fa-facebook"></i></a>
					</div>
					<div class="col-xs-3 icon no-pad">
						<a href="https://<?php echo get_option('options_twitter_url'); ?>"><i class="fa fa-twitter"></i></a>
					</div>
					<div class="col-xs-3 icon no-pad">
						<a href="https://<?php echo get_option('options_linkedin_url'); ?>"><i class="fa  fa-linkedin"></i></a>
					</div>
				</div>
				<div class="contact">
					<div class="tel">
						T: <?php echo get_option( 'options_contact_info_telephone' ); ?>
					</div>
					<div class="address">
						<?php echo get_option( 'options_contact_info_address' ); ?>
					</div>
					<div class="copyright">
						&copy; <?php echo get_the_date( 'Y' ) . ' ' . get_option('options_copyright_info'); ?>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<button class="primary round">Click here to <br>Volunteer</button>
			</div>
			<div class="col-sm-3 md-no-pad">
				<div class="accreditations">
					<img src="<?php echo site_url(); ?>/wp-content/uploads/2018/02/3togetherPNG_0004s_0000_Partner-Logos.png" alt="accreditation badges" srcset="">
				</div>
				<div class="newsletter">
					<p>Subscribe to our newsletter</p>
					<form id="subForm" class="js-cm-form" action="http://email.increative.co.uk/t/r/s/uhydjri/" method="post" data-id="">
						<input id="fieldEmail" class="js-cm-email-input" name="cm-uhydjri-uhydjri" type="email" placeholder="Email" required /> 
						<button class="js-cm-submit-button primary" type="submit">Subscribe</button> 
					</form>
    
				</div>
			</div>
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