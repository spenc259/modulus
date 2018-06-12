<?php

use When\When;

function get_events() {

	require_once(get_template_directory() . '/inc/events/class.when.php');
	require_once(get_template_directory() . '/inc/events/class.when.valid.php');

	$posts = get_posts(array(
		'posts_per_page' => -1,
		'post_type' => 'event'
	));

	

	// work out if repeats are needed

	foreach ($posts as $key => $value) {

		if ( get_field('event_repeat', $value->ID) == 'none' ) {

			// non repeating event
			$events_init[$key]['id'] = $value->ID;
			$events_init[$key]['title'] = $value->post_title;
			$events_init[$key]['repeats'] = 0;
			
			$events_init[$key]['start'] = get_field('event_start_date', $value->ID);
			$events_init[$key]['end'] = get_field('event_end_date', $value->ID);

			$events_init[$key]['event_description'] = get_field('event_description', $value->ID);
			$events_init[$key]['event_has_long_description'] = get_field('event_has_long_description', $value->ID);
			$events_init[$key]['event_long_description'] = get_field('event_long_description', $value->ID);
			$events_init[$key]['event_location'] = get_field('event_location', $value->ID);
			$events_init[$key]['event_type'] = get_field('event_type', $value->ID);
			$events_init[$key]['event_color'] = get_field('event_color', $value->ID);

		} else {

			// calculate needed repeats

			$r = new When();
			$r->startDate(new DateTime(get_field('event_start_date', $value->ID)))
			->freq(get_field('event_repeat', $value->ID))
			->count(get_field('event_repeat_count', $value->ID))
			->generateOccurrences();

			$events_init[$key]['id'] = $value->ID;
			$events_init[$key]['title'] = $value->post_title;
			$events_init[$key]['repeats'] = 1;
			$events_init[$key]['repeats_start'] = $r->occurrences;

			$rx = new When();
			$rx->startDate(new DateTime(get_field('event_end_date', $value->ID)))
			->freq(get_field('event_repeat', $value->ID))
			->count(get_field('event_repeat_count', $value->ID))
			->generateOccurrences();

			$events_init[$key]['repeats_end'] = $rx->occurrences;

		}
	}


	// prepare final array

	$events = array();

	foreach ($events_init as $evk => $ev) {

		if ($ev['repeats'] == 0) { 

			// non repeating event

			$events[] = $ev;

		} else {

			// create item for each repeat and push to final array

			foreach ($ev['repeats_start'] as $key => $value) {

				$temp['id'] = $ev['id'];
				$temp['title'] = $ev['title'];
				$temp['repeats'] = 1;
				
				$temp['start'] = $value->format('Y-m-d H:i:s');
				$temp['end'] = $events_init[$evk]['repeats_end'][$key]->format('Y-m-d H:i:s');

				$temp['event_description'] = get_field('event_description', $ev['id']);
				$temp['event_has_long_description'] = get_field('event_has_long_description', $ev['id']);
				$temp['event_long_description'] = get_field('event_long_description', $ev['id']);
				$temp['event_location'] = get_field('event_location', $ev['id']);
				$temp['event_type'] = get_field('event_type', $ev['id']);
				$temp['event_color'] = get_field('event_color', $ev['id']);

				array_push($events, $temp);

				unset($temp);

			}
		}
	}

	// remove out of date events
	// get the end date and check if current is greater than

	$today = new DateTime();

	foreach ($events as $key => $value) {

		$event_date = new DateTime($value['end']);
		if ($event_date < $today) {
			unset($events[$key]);
		}
	}

	// fix keys
	$events = array_values($events);
	// assign every event a unique id as repeats share id with parent

	foreach ($events as $key => $value) {
		$events[$key]['uid'] = bin2hex(openssl_random_pseudo_bytes(10));
	}

	return $events;

}


function ajax_get_events()
{
	$events = get_events();

	wp_send_json_success( $events );

	die();
}

function get_event_dates($post_id) {

	require_once(get_template_directory() . '/inc/events/class.when.php');
	require_once(get_template_directory() . '/inc/events/class.when.valid.php');

	// work out if repeats are needed

	$key = 0;

	if (get_field('event_repeat', $post_id) == 'none') {

		// non repeating event
		
		$events_init[$key]['id'] = $post_id;
		$events_init[$key]['start'] = get_field('event_start_date', $post_id);
		$events_init[$key]['end'] = get_field('event_end_date', $post_id);

	} else {

		// calculate needed repeats

		$r = new When();
		$r->startDate(new DateTime(get_field('event_start_date', $post_id)))
		->freq(get_field('event_repeat', $post_id))
		->count(get_field('event_repeat_count', $post_id))
		->generateOccurrences();

		$events_init[$key]['id'] = $post_id;
		$events_init[$key]['repeats_start'] = $r->occurrences;

		$rx = new When();
		$rx->startDate(new DateTime(get_field('event_end_date', $post_id)))
		->freq(get_field('event_repeat', $post_id))
		->count(get_field('event_repeat_count', $post_id))
		->generateOccurrences();

		$events_init[$key]['repeats_end'] = $rx->occurrences;

	}

	// prepare final array

	$events = array();

	foreach ($events_init as $evk => $ev) {

		// create item for each repeat and push to final array

		if (isset($ev['repeats_start'])) {

			foreach ($ev['repeats_start'] as $key => $value) {

				$temp['id'] = $ev['id'];
				$temp['start'] = $value->format('Y-m-d H:i:s');
				$temp['end'] = $events_init[$evk]['repeats_end'][$key]->format('Y-m-d H:i:s');

				array_push($events, $temp);

				unset($temp);
			}
		} else {
			$temp['id'] = $post_id;
			$temp['start'] = get_field('event_start_date', $post_id);;
			$temp['end'] = get_field('event_end_date', $post_id);;
			array_push($events, $temp);
		}
	}

	// remove out of date events

	$today = new DateTime();

	foreach ($events as $key => $value) {

		$event_date = new DateTime($value['start']);

		if ($event_date < $today) {
			unset($events[$key]);
		}
	}

	// fix keys

	$events = array_values($events);

	// assign every event a unique id as repeats share id with parent

	foreach ($events as $key => $value) {
		$events[$key]['uid'] = bin2hex(openssl_random_pseudo_bytes(10));
	}

	return $events;
}


function get_event_distance($lat1, $lon1, $lat2, $lon2) {
	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	return $miles;
}








