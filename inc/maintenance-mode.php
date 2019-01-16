<?php 

// maintenance mode

if (get_field('enable_maintenance_mode', 'option')) {
	if ($GLOBALS['pagenow'] != 'wp-login.php') {
		if (!current_user_can('administrator')) {
			wp_redirect(site_url('maintenance/'));
			exit();
		}
	}
}