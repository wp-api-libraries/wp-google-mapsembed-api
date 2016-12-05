<?php
/**
 * WP Google Maps Embed API (https://developers.google.com/maps/documentation/embed)
 *
 * @package WP-Google-MapsEmbed-API
 */

/*
* Plugin Name: WP Google MapsEmbed API
* Plugin URI: https://github.com/wp-api-libraries/wp-google-mapsembed-api
* Description: Perform API requests to Google Maps Embed API in WordPress.
* Author: WP API Libraries
* Author URI: https://wp-api-libraries.com
* Version: 1.0.0
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-google-mapsembed-api
* GitHub Branch: master
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'GoogleMapsEmbedAPI' ) ) {

	/**
	 * GoogleMapsEmbedAPI class.
	 */
	class GoogleMapsEmbedAPI {

		 /**
		 * API Key.
		 *
		 * @var mixed
		 * @access private
		 * @static
		 */
		static private $api_key;

		/**
		 * Base URI.
		 *
		 * @var string
		 * @access protected
		 */
		protected $base_uri = 'https://www.google.com/maps/embed/v1/';

		/**
		 * Construct.
		 *
		 * @access public
		 * @param mixed $api_key API Key.
		 * @param mixed $output Output.
		 * @return void
		 */
		public function __construct( $api_key ) {

			static::$api_key = $api_key;
			static::$output = $output;

		}

		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {

			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );

			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'text-domain' ), $code ) );
			}

			$body = wp_remote_retrieve_body( $response );

			return json_decode( $body );

		}

		/**
		 * get_map function.
		 *
		 * @access public
		 * @param mixed $center
		 * @param mixed $zoom
		 * @param mixed $maptype
		 * @param mixed $language
		 * @param mixed $region
		 * @return void
		 */
		function get_map( $center, $zoom, $maptype, $language, $region ) {

		}

	}
}
