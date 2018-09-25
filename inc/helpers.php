<?php 

/**
 * get an image from the /img folder
 *
 * @param string $path
 * @return string image url
 */
function image($path) {

	return get_template_directory_uri() . '/assets/img/' . $path;

}

function gtdu($path) {
	$uri = get_template_directory_uri() . '/' . $path;
	return $uri;
}


/**
 * Breadcrumb Nav
 * Displays a breadcrumb nav menu
 * This needs to be improved to cover all cases
 */
function breadcrumb_nav()
{
	$current_page = get_post( get_the_ID() );
	
	$parent = get_post( $current_page->post_parent );
	$parent_title = $parent->post_title;
	$parent_link = get_permalink( $current_page->post_parent );

	echo ( !empty( $current_page->post_parent ) ) 
		? '<a href="' . site_url() . '">Home </a> / ' . '<a href=' . $parent_link . '>' . $parent_title . ' </a> / ' . $current_page->post_title 
		: '<a href="' . site_url() . '">Home </a> / ' . $current_page->post_title; 
}

add_action( 'breadcrumb_nav', 'breadcrumb_nav' );


/**
 * Custom excerpt
 * provide a custom length
 *
 * @param integer $limit
 * @return string
 */
function get_excerpt( $limit = 250 ){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $limit);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	// $excerpt = trim(preg_replace( '/s+/', ' ', $excerpt)); // this removes any 's'
	$excerpt = trim($excerpt); // this removes any 's'
	$excerpt = $excerpt.'... <br><a href="'. get_the_permalink().'">READ MORE >></a>';
return $excerpt;
}


/**
 * Get an excerpt
 *
 * @param mixed $content
 * @return string
 */
function short ($content) 
{
	return substr( strip_shortcodes(strip_tags($content) ), 0, 250 ) . '... <br><a class="read-more" href="'. get_the_permalink().'">Read More >></a>';
}


/**
 * Responsive Images
 * Will return an image tag
 *
 * @param integer $id
 * @param string $size
 * @param boolean $lazy
 * @param string $class
 * @return string
 */
function responsive_image( $id, $size = 'large', $lazy = false, $class = 'lazy wp-post-image' ) {
	$src = wp_get_attachment_image_src( $id, $size );
	$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );
	$sizes = wp_get_attachment_image_sizes( $id, $size );
	$srcset = wp_get_attachment_image_srcset( $id, $size );
	if ( $lazy ) {
		return '<img data-image="' . $src[0] .'" src="" class="' . $class . '" />';
	} else {
		return '<img src="' . $src[0] .'" srcset="' . $srcset . '" sizes="' . $sizes . '" alt="' . $alt . '" class="' . $class . '" />';
	}
}


/**
 * Swap Values in an array
 *
 * @param array $array
 * @param mixed $swap_a
 * @param mixed $swap_b
 * @return array
 */
function array_swap(&$array,$swap_a,$swap_b){
    list($array[$swap_a],$array[$swap_b]) = array($array[$swap_b],$array[$swap_a]);
}


/**
 * Remove the Admin bar for non admins
 */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!is_admin()) {
        show_admin_bar(false);
    }
}


/**
 * Twitter Integration
 */
function get_tweets()
{
	require_once(__DIR__ . '/api/class.twitterapiexchange.php');

	$username = get_option('options_twitter_username');

	// GET TYPE REQUEST
	$settings = array(
		'oauth_access_token' => get_option('options_oauth_oauth_access_token'),
		'oauth_access_token_secret' => get_option('options_oauth_oauth_access_token_secret'),
		'consumer_key' => get_option('options_oauth_consumer_key'),
		'consumer_secret' => get_option('options_oauth_consumer_secret')
	);

	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	$getfield = '?screen_name='.$username.'&count=2';
	$requestMethod = 'GET';

	$twitter = new TwitterAPIExchange($settings);
	$response = json_decode($twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest());

	

	return $response;

	// end point reference - https://dev.twitter.com/rest/reference
}