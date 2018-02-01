<?php
/*
Plugin Name: WP Increase cURL Timeout
Plugin URI: https://github.com/jessepearson/wp-increase-curl-timeout
Description: Increases the timeout for cURL requests in WordPress to 5 seconds, if needed.
Author: Jesse Pearson
Author URI: https://github.com/jessepearson/wp-increase-curl-timeout
Version: 1.0.0
*/

/**
 * @param  obj  $handle The cURL handle that is being used for the request.
 */
function jp_custom_curl_timeout( $handle ){
	curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 5 );
	curl_setopt( $handle, CURLOPT_TIMEOUT, 5 );
}
add_action( 'http_api_curl', 'jp_custom_curl_timeout', 9999, 1 );

/**
 * @param  int  $timeout Initial timeout should be 5 seconds, but something is changing it to 1.
 * @return int
 */
function jp_custom_http_request_timeout( $timeout ) {
	return 5; // 5 seconds
}
add_filter( 'http_request_timeout', 'jp_custom_http_request_timeout', 9999 );

/**
 * @param  arr  $args The args being used by WP when doing the cURL post.
 * @return arr
 */
function jp_custom_http_request_args( $args ){
	$args['timeout'] = 5;
	return $args;
}
add_filter( 'http_request_args', 'jp_custom_http_request_args', 9999, 1 );
