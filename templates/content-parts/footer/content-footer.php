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
					<div class="col-4 mr-auto">
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
							<?php echo "Copyright &copy; " . date_i18n('Y') . ' ' . 'Maxim Business Park'; ?>
						</div>
					</div>
					<div class="col-4">
						<h5 class="uppercase secondary">Get in touch with Maxim</h5>
						<h5 class="uppercase">Leasing Team</h5>
						<?php 
							$team_args = array(
								'post_type' => 'team_member'
							);

							$team_members = get_posts($team_args);

							foreach ($team_members as $team_member) {
								echo "<div class='row'>" . 
										"<div class='col-auto'><img src='" . site_url('wp-content/uploads/2018/09/team-icon.png') . "' /></div>" . 
										"<div class='col-auto'>" .
											"<div class='row'>" . 
												"<div class='col-auto'>". $team_member->post_title . '</div>' . 
												"<div class='col-auto'>". get_field('text', $team_member->ID) . '</div>' . 
											"</div>" . 
										"</div>" . 
									"</div>";
							}
						?>
					</div>
					<div class="col-4">
						<img src="<?php echo site_url('wp-content/uploads/2018/09/testimonial-icon.png'); ?>" />
						<h5 class="uppercase">What our clients say</h5>
						<?php 
							$testimonials_args = array(
								'post_type' => 'testimonial'
							);

							$testimonials = get_posts($testimonials_args);

							foreach ($testimonials as $testimonial) {
								echo "<div class='row'>" . 
										"<div class='col-auto'><img src='" . site_url('wp-content/uploads/2018/09/team-icon.png') . "' /></div>" . 
										"<div class='col-auto'>" .
											"<div class='row'>" . 
												"<div class='col-auto'>". $testimonial->post_title . '</div>' . 
												"<div class='col-auto'>". get_field('text', $testimonial->ID) . '</div>' . 
											"</div>" . 
										"</div>" . 
									"</div>";
							}
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
