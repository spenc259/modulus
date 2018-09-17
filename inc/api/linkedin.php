<?php 

/**
 * LinkedIn App REST OAuth 2.0 Details
 */
$clientID = "77plx86g50bple";

function share_on_linkedin()
{
	// $url = 'https://api.linkedin.com/v1/people/~/shares?format=json';
	echo 
	'<script type="text/javascript" src="//platform.linkedin.com/in.js">
		api_key:   77plx86g50bple
		authorize: true
	</script>';
}
add_action('wp_head', 'share_on_linkedin');