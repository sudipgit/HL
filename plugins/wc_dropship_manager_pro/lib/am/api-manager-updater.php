<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if (!class_exists('api_manager_updater')) 
{
	class api_manager_updater 
	{
		// Base URL to the remote upgrade API server
		public $upgrade_url = 'http://woocommercedropshipplugins.com/'; // URL to access the Update API Manager.
		public $renew_url = 'http://woocommercedropshipplugins.com/'; // URL to access the Update API Manager.
		public $version = '';
		public $wcds_updater_version_name = '_version';
		public $plugin_url;
		public $plugin_slug;
		public $plugin_name;
		public $text_domain = '';
		private $ame_software_product_id;
		public $ame_data_key;
		public $ame_api_key;
		public $ame_activation_email;
		public $ame_product_id_key;
		public $ame_instance_key;
		public $ame_deactivate_checkbox_key;
		public $ame_activated_key;
		public $ame_deactivate_checkbox;
		public $ame_activation_tab_key;
		public $ame_deactivation_tab_key;
		public $ame_settings_menu_title;
		public $ame_settings_title;
		public $ame_menu_tab_activation_title;
		public $ame_menu_tab_deactivation_title;
		public $ame_options;
		public $ame_plugin_name;
		public $ame_product_id;
		public $ame_renew_license_url;
		public $ame_instance_id;
		public $ame_domain;
		public $ame_software_version;
		public $ame_plugin_or_theme;
		public $ame_update_version;
		public $ame_update_check = '';
		public $ame_extra;
		public $admin_url = '';

		public function __construct() {
			$this->plugin_slug = get_class($this);
			$this->ame_software_product_id = $this->plugin_slug;
			$this->ame_update_check = $this->plugin_slug.'_update_check';
			$this->wcds_updater_version_name = $this->plugin_slug.'_version';
			$this->text_domain = $this->text_domain;
			if ( is_admin() ) {
				/**
				 * Set all data defaults here
				 */
				$this->ame_data_key 				= $this->plugin_slug.'_ame';
				$this->ame_api_key 					= 'api_key';
				$this->ame_activation_email 		= 'activation_email';
				$this->ame_product_id_key 			= $this->plugin_slug.'_product_id';
				$this->ame_instance_key 			= $this->plugin_slug.'_instance';
				$this->ame_deactivate_checkbox_key 	= $this->plugin_slug.'_deactivate_checkbox';
				$this->ame_activated_key 			= $this->plugin_slug.'_activated';

				/**
				 * Set all admin menu data
				 */
				$this->ame_deactivate_checkbox 			= $this->plugin_slug.'_deactivate_checkbox';
				$this->ame_activation_tab_key 			= $this->plugin_slug.'_activation';
				$this->ame_deactivation_tab_key 		= $this->plugin_slug.'_deactivation';
				$this->ame_settings_menu_title 			= $this->plugin_name.' Licensing';
				$this->ame_settings_title 				= $this->plugin_name.' Licensing';
				$this->ame_menu_tab_activation_title 	= __('License Activation', $this->plugin_slug);
				$this->ame_menu_tab_deactivation_title 	= __('License Deactivation', $this->plugin_slug);

				/**
				 * Set all software update data here
				 */
				$this->ame_options 				= get_option( $this->ame_data_key );
				$this->ame_plugin_name 			= untrailingslashit( plugin_basename($this->plugin_filename()) );  //untrailingslashit( plugin_basename( __FILE__ ) );  
				$this->ame_product_id 			= get_option( $this->ame_product_id_key ); // Software Title
				$this->ame_renew_license_url 	= $this->renew_url; // URL to renew a license
				$this->ame_instance_id 			= get_option( $this->ame_instance_key ); // Instance ID (unique to each blog activation)
				$this->ame_domain 				= site_url(); // blog domain name
				$this->ame_software_version 	= $this->version; // The software version
				$this->ame_plugin_or_theme 		= 'plugin'; // 'theme' or 'plugin'

				// Performs activations and deactivations of API License Keys
				require_once( plugin_dir_path( $this->plugin_filename() ) . 'lib/am/classes/class-wc-key-api.php' );
				$this->Api_Manager_Key = new Api_Manager_Key($this);
				// Checks for software updates
				require_once( plugin_dir_path( $this->plugin_filename() ) . 'lib/am/classes/class-wc-plugin-update.php' );
				// Admin menu with the license key and license email form
				require_once( plugin_dir_path( $this->plugin_filename() ) . 'lib/am/admin/class-wc-api-manager-menu.php' );
				new API_Manager_License_Menu($this);

				$options = get_option( $this->ame_data_key );

				/**
				 * Check for software updates
				 */
				if ( ! empty( $options ) && $options !== false ) 
				{
					new API_Manager_Update_API_Check(
														$this->upgrade_url,
														$this->ame_plugin_name,
														$this->ame_product_id,
														$this->ame_options[$this->ame_api_key],
														$this->ame_options[$this->ame_activation_email],
														$this->ame_renew_license_url,
														$this->ame_instance_id,
														$this->ame_domain,
														$this->ame_software_version,
														$this->ame_plugin_or_theme,
														$this->text_domain
													);
				}
			}
		}
		
		public function plugin_filename() {			
			if (!(isset($this)))
			{
				return ReflectionObject::getFileName($self);
			}
			else
			{
				if ( isset( $this->plugin_filename ) ) return $this->plugin_filename;
				$class_info = new ReflectionClass($this);
				return $this->plugin_filename = $class_info->getFileName();
			}
		}

		public function plugin_url() {
			if ( isset( $this->plugin_url ) ) return $this->plugin_url;
			return $this->plugin_url = plugins_url( '/', $this->plugin_filename() );
		}

		/**
		 * Generate the default data arrays
		 */
		public function activation() {
			global $wpdb;
			$global_options = array(
								$this->ame_api_key 			=> '',
								$this->ame_activation_email 	=> '',
							);
			update_option( $this->ame_data_key, $global_options );
			require_once( plugin_dir_path( $this->plugin_filename() ) . 'lib/am/classes/class-wc-api-manager-passwords.php' );
			
			$API_Manager_Password_Management = new API_Manager_Password_Management();
			// Generate a unique installation $instance id
			$instance = $API_Manager_Password_Management->generate_password( 12, false );
			$single_options = array(
				$this->ame_product_id_key 			=> $this->ame_software_product_id,
				$this->ame_instance_key 			=> $instance,
				$this->ame_deactivate_checkbox_key 	=> 'on',
				$this->ame_activated_key 			=> 'Deactivated',
				);			
			foreach ( $single_options as $key => $value ) {
				update_option( $key, $value );
			}
			$curr_ver = get_option( $this->wcds_updater_version_name );
			// checks if the current plugin version is lower than the version being installed
			if ( version_compare( $this->version, $curr_ver, '>' ) ) {
				// update the version
				update_option( $this->wcds_updater_version_name, $this->version );
			}
		}

		/**
		 * Deletes all data if plugin deactivated
		 * @return void
		 */
		public function uninstall() {
			global $wpdb, $blog_id;
			$this->license_key_deactivation();
			// Remove options
			if ( is_multisite() ) {
				switch_to_blog( $blog_id );
				foreach ( array(
							$this->ame_data_key,
							$this->ame_product_id_key,
							$this->ame_instance_key,
							$this->ame_deactivate_checkbox_key,
							$this->ame_activated_key,
						) as $option) {
							delete_option( $option );
						}
				restore_current_blog();
			} else {
				foreach ( array(
							$this->ame_data_key,
							$this->ame_product_id_key,
							$this->ame_instance_key,
							$this->ame_deactivate_checkbox_key,
							$this->ame_activated_key
						) as $option) {
							delete_option( $option );
						}
			}
		}

		/**
		 * Deactivates the license on the API server
		 * @return void
		 */
		public function license_key_deactivation() {
			$activation_status = get_option( $this->ame_activated_key );
			$api_email = $this->ame_options[$this->ame_activation_email];
			$api_key = $this->ame_options[$this->ame_api_key];
			$args = array(
				'email' => $api_email,
				'licence_key' => $api_key,
				);
			if ( $activation_status == 'Activated' && $api_key != '' && $api_email != '' ) {
				$this->Api_Manager_Key->deactivate( $args ); // reset license key activation
			}
		}

	} // End of class
}