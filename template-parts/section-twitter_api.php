<?php 

require_once(__DIR__ . '/../inc/class.twitterapiexchange.php');

$username = get_option('options_twitter_username');

// GET TYPE REQUEST

// $settings = array(
// 	'oauth_access_token' => get_option('options_access_token'),
// 	'oauth_access_token_secret' => get_option('options_access_token_secret'),
// 	'consumer_key' => get_option('options_consumer_key'),
// 	'consumer_secret' => get_option('options_consumer_secret')
// 	);

// $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
// $getfield = '?screen_name='.$username.'&count=5';
// $requestMethod = 'GET';

// $twitter = new TwitterAPIExchange($settings);
// $response = json_decode($twitter->setGetfield($getfield)
// 	->buildOauth($url, $requestMethod)
// 	->performRequest());


// POST TYPE REQUEST

// $settings = array(
// 	'oauth_access_token' => get_option('options_access_token'),
// 	'oauth_access_token_secret' => get_option('options_access_token_secret'),
// 	'consumer_key' => get_option('options_consumer_key'),
// 	'consumer_secret' => get_option('options_consumer_secret')
// 	);

// $url = 'https://api.twitter.com/1.1/blocks/create.json';
// $requestMethod = 'POST';

// $postfields = array(
//     'screen_name' => 'usernameToBlock', 
//     'skip_status' => '1'
// );

// $twitter = new TwitterAPIExchange($settings);
// echo $twitter->buildOauth($url, $requestMethod)
//     ->setPostfields($postfields)
//     ->performRequest();


// end point reference - https://dev.twitter.com/rest/reference

?>