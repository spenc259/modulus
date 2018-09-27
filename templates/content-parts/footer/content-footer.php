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
					<div class="col-5 pl-0">
						<img src="<?php echo site_url('/wp-content/themes/intimation-pro/assets/img/footer-logo.png'); ?>" alt="Footer Logo" srcset="" class="footer-logo">
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
						<h6 class="uppercase secondary mt-5 mb-3">Get in touch with Maxim</h6>
						<h6 class="uppercase mb-4">Leasing Team</h6>
					<?php 
						$team_args = array(
							'post_type' => 'team_member'
						);

						$team_members = get_posts($team_args);

						foreach ($team_members as $team_member) : ?>
							<div class="row">
								<div class="col-2">
									<img src='<?php echo site_url('wp-content/uploads/2018/09/team-icon.png'); ?>' alt="team-icon" />
								</div>
								<div class="col-10 pl-0">
									<strong><?php echo $team_member->post_title; ?></strong><br>
									<?php echo get_field('contact_number', $team_member->ID); ?>
								</div>
							</div><?php 
						endforeach; 
					?>
					</div>
					<div class="col-3 pr-0">
						<img src="<?php echo site_url('wp-content/uploads/2018/09/testimonial-icon.png'); ?>" class="clients-icon"/>
						<h6 class="uppercase mt-3 mb-4">What our clients say</h6>
						<?php 
							$testimonials_args = array(
								'post_type' => 'testimonial'
							);

							$testimonials = get_posts($testimonials_args);

							foreach ($testimonials as $testimonial) : ?>
								<div class="row">
									<div class="col">
										<p><?php echo '"' . $testimonial->post_content . '"'; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<p class="secondary"><?php echo str_replace(" - ", "<br>", $testimonial->post_title); ?></p>
									</div>
								</div>
							<?php endforeach; ?>
					</div>
				</div>
			</div>
		</footer>

		<link href="<?php echo get_template_directory_uri() . '/assets/css/main.css'; ?>" rel="stylesheet">

		<?php wp_footer(); ?>	
		<?php echo ($ga = get_option('options_google_analytics_script')) ? $ga : ''; ?>
	</body>
</html>
