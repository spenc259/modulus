<?php

function format_email($content_field = '', $user = array(), $data = array()) {
	
	$r = array();

	// generic tokens

	$tokens = array(
		'first_name' => $user[0]->first_name,
		'last_name' => $user[0]->last_name,
		'username' => $user[0]->user_login,
		'company_name' => get_field('operator_name', 'user_' . $user[0]->ID)
	);

	// context tokens

	(isset($data['sub']) ? $tokens['sub'] = $data['sub'] : '');

	// gen email

	$subject = get_field($content_field . '_subject', 'option');
	$content = get_field($content_field, 'option');

	foreach ($tokens as $k => $v) {
		$subject = str_replace('{' . $k . '}', $v, $subject);
		$content = str_replace('{' . $k . '}', $v, $content);
	}

	$r['subject'] = $subject;
	$r['content'] = $content;

	return $r;
	
} ?>