<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!class_exists('Api_Manager_Key')) 
{
	class Api_Manager_Key {

		public function __construct($plugin_instance) {
			$this->plugin_instance = $plugin_instance;
		}
		
		public function getPlugin_instance()
		{
			return $this->plugin_instance;
		}

		// API Key URL
		public function create_software_api_url( $args ) {
			$api_url = add_query_arg( 'wc-api', 'am-software-api', $this->getPlugin_instance()->upgrade_url );
			return $api_url . '&' . http_build_query( $args );
		}

		public function activate( $args ) {
			$defaults = array(
				'request' 			=> 'activation',
				'product_id' 		=> $this->getPlugin_instance()->ame_product_id,
				'instance' 			=> $this->getPlugin_instance()->ame_instance_id,
				'platform' 			=> $this->getPlugin_instance()->ame_domain,
				'software_version' 	=> $this->getPlugin_instance()->ame_software_version
				);
			$args = wp_parse_args( $defaults, $args );
			//var_dump($args);
			$target_url = $this->create_software_api_url( $args );
			$request = wp_remote_get( $target_url );
			if( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			// Request failed
				return false;
			}
			$response = wp_remote_retrieve_body( $request );
			//var_dump($response); die;
			return $response;
		}

		public function deactivate( $args ) {
			$defaults = array(
				'request' 		=> 'deactivation',
				'product_id' 	=> $this->getPlugin_instance()->ame_product_id,
				'instance' 		=> $this->getPlugin_instance()->ame_instance_id,
				'platform' 		=> $this->getPlugin_instance()->ame_domain
				);

			$args = wp_parse_args( $defaults, $args );
			$target_url = $this->create_software_api_url( $args );
			$request = wp_remote_get( $target_url );

			if( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			// Request failed
				return false;
			}
			$response = wp_remote_retrieve_body( $request );
			return $response;
		}

		/**
		 * Checks if the software is activated or deactivated
		 * @param  array $args
		 * @return array
		 */
		public function status( $args ) {
			$defaults = array(
					'request' 		=> 'status',
					'product_id' 	=> $this->getPlugin_instance()->ame_product_id,
					'instance' 		=> $this->getPlugin_instance()->ame_instance_id,
					'platform' 		=> $this->getPlugin_instance()->ame_domain
				);
			$args = wp_parse_args( $defaults, $args );
			$target_url = $this->create_software_api_url( $args );
			$request = wp_remote_get( $target_url );
			if( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			// Request failed
				return false;
			}
			$response = wp_remote_retrieve_body( $request );
			return $response;
		}

	}
}