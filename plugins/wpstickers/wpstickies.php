<?php

/**
 * @package wpStickies
 * @version 1.5
 */
/*

Plugin Name: wpStickies
Plugin URI: http://codecanyon.net/user/kreatura/
Description: Premium Image Tagging Plugin for WordPress
Version: 1.5
Author: Kreatura Media
Author URI: http://kreaturamedia.com/
*/



/********************************************************/
/*                        Actions                       */
/********************************************************/

	// Activation hook for creating the initial DB table
	register_activation_hook(__FILE__,'wpstickes_activation_scripts');

	// Register custom settings menu
	add_action('admin_menu', 'wpstickies_settings_menu');

	// Link content resources
	add_action('wp_enqueue_scripts', 'wpstickies_enqueue_content_res');

	// Link admin resources
	add_action('admin_enqueue_scripts', 'wpstickies_enqueue_admin_res');

	// Init wpStickies
	add_action('wp_head', 'wpstickies_js');

	// Preview
	add_action('generate_rewrite_rules', 'wps_add_rewrite_rules');
	add_filter('query_vars', 'wps_add_query_vars');
	add_action('template_redirect', 'wps_template_redirect_file');

	// Add admin ajax actions
	add_action('wp_ajax_wpstickies_accept', 'wpstickies_accept');
	add_action('wp_ajax_wpstickies_reject', 'wpstickies_reject');
	add_action('wp_ajax_wpstickies_restore', 'wpstickies_restore');

	// Front-end actions
	add_action('wp_ajax_wpstickies_insert', 'wpstickies_insert');
	add_action('wp_ajax_nopriv_wpstickies_insert', 'wpstickies_insert');

	add_action('wp_ajax_wpstickies_update', 'wpstickies_update');
	add_action('wp_ajax_nopriv_wpstickies_update', 'wpstickies_update');

	add_action('wp_ajax_wpstickies_get', 'wpstickies_get');
	add_action('wp_ajax_nopriv_wpstickies_get', 'wpstickies_get');

	add_action('wp_ajax_wpstickies_remove', 'wpstickies_remove');
	add_action('wp_ajax_nopriv_wpstickies_remove', 'wpstickies_remove');

	add_action('wp_ajax_wpstickies_image_settings', 'wpstickies_image_settings');
	add_action('wp_ajax_nopriv_wpstickies_image_settings', 'wpstickies_image_settings');

/********************************************************/
/*                 Activation Scripts                   */
/********************************************************/
	global $wpstickies_db_version;
	$wpstickies_db_version = '1.0';

	function wpstickes_activation_scripts() {

		// Update the rules in rewrite engine
		wps_flush_rewrite_rules();

		// Create a new role for users who has capability to
		// manage and create stickes
		add_role( 'wpstickiesadmins', 'wpStickies Admins', array('read') );

		// Get WPDB Object and WP Stickies DB version
		global $wpdb;
		global $wpstickies_db_version;

		// Table name
		$table_name = $wpdb->prefix . "wpstickies";

		// Building the query
		$sql = "CREATE TABLE  $table_name (
					`id` INT( 12 ) NOT NULL AUTO_INCREMENT PRIMARY  KEY ,
					`image` VARCHAR( 200 ) NOT NULL ,
					`data` TEXT NOT NULL ,
					`user_id` INT( 12 ) NOT NULL ,
					`user_name` VARCHAR( 50 ) NOT NULL ,
					`date_c` INT( 10 ) NOT NULL ,
					`date_m` INT( 10 ) NOT NULL ,
					`flag_hidden` TINYINT( 1 ) NOT NULL DEFAULT  '1',
					`flag_deleted` TINYINT( 1 ) NOT NULL DEFAULT  '0'
				) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;";

		// Table name
		$table_name = $wpdb->prefix . "wpstickies_images";

		// Building the query for images settings
		$sql2 = "CREATE TABLE  $table_name (
					`id` INT( 12 ) NOT NULL AUTO_INCREMENT PRIMARY  KEY ,
					`image` VARCHAR( 200 ) NOT NULL ,
					`data` TEXT NOT NULL ,
					`date_c` INT( 10 ) NOT NULL ,
					`date_m` INT( 10 ) NOT NULL,
					UNIQUE (
						`image`
					)
				) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;";

		// Executing the query
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		dbDelta($sql2);


		// Save DB version
		add_option('wpstickies-db-version', $wpstickies_db_version);
	}

/********************************************************/
/*               Enqueue Content Scripts                */
/********************************************************/

	function wpstickies_enqueue_content_res() {

		wp_enqueue_script('wpstickies_js', plugins_url('/js/wpstickies.kreaturamedia.jquery.js', __FILE__), array('jquery'), '1.5' );
		wp_localize_script( 'wpstickies_js', 'WPStickies', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );

		wp_enqueue_script('jquery_easing', plugins_url('/js/jquery-easing-1.3.js', __FILE__), array('jquery'), '1.3.0' );
		wp_enqueue_style('wpstickies_css', plugins_url('/css/wpstickies.css', __FILE__), array(), '1.5' );
	}


/********************************************************/
/*                Enqueue Admin Scripts                 */
/********************************************************/

	function wpstickies_enqueue_admin_res() {

		if(strstr($_SERVER['REQUEST_URI'], 'wpstickies_admin_page')) {

			wp_enqueue_script('common');
			wp_enqueue_script('wp-lists');
			wp_enqueue_script('postbox');

			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');

			wp_enqueue_script('wpstickies_admin_js', plugins_url('/js/wpstickies_admin.js', __FILE__), array('jquery'), '1.2' );
			wp_enqueue_style('wpstickies_admin_css', plugins_url('/css/wpstickies_admin.css', __FILE__), array(), '1.2' );
			wp_enqueue_script('tags_input_js', plugins_url('/js/jquery.tagsinput.min.js', __FILE__), array('jquery'), '1.3.3' );
			wp_enqueue_style('tags_input_css', plugins_url('/css/jquery.tagsinput.css', __FILE__), array(), '1.3.3' );

			add_meta_box('wpstickies-metaboxes-general_opt', 'General', 'wpstickies_metabox_general', $GLOBALS['options_page'], 'normal', 'core');
			add_meta_box('wpstickies-metaboxes-permissions', 'Permissions', 'wpstickies_metabox_permissions', $GLOBALS['options_page'], 'normal', 'core');
			add_meta_box('wpstickies-metaboxes-appearance', 'Appearance', 'wpstickies_metabox_appearance', $GLOBALS['options_page'], 'normal', 'core');
			add_meta_box('wpstickies-metaboxes-language', 'Language settings', 'wpstickies_metabox_language_settings', $GLOBALS['options_page'], 'normal', 'core');
			add_meta_box('wpstickies-metaboxes-pending', 'Pending stickies', 'wpstickies_metabox_peding', $GLOBALS['options_page'], 'normal', 'core');
			add_meta_box('wpstickies-metaboxes-latest', 'Latest stickies', 'wpstickies_metabox_latest', $GLOBALS['options_page'], 'normal', 'core');
			add_meta_box('wpstickies-metaboxes-restore', 'Restore removed stickies', 'wpstickies_metabox_restore', $GLOBALS['options_page'], 'normal', 'core');
		}
	}

/********************************************************/
/*                 Loads settings menu                  */
/********************************************************/
function wpstickies_settings_menu() {

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	// Get custom capabilities
	$options['capability'] = empty($options['capability']) ? 'manage_options' : $options['capability'];

	// Create new top-level menu
	$GLOBALS['options_page'] = add_menu_page('wpStickies', 'wpStickies', $options['capability'], 'wpstickies_admin_page', 'wpstickies_settings_page');

	// Call register settings function
	add_action( 'admin_init', 'wpstickies_register_settings' );
}


/********************************************************/
/*                  Register settings                   */
/********************************************************/
function wpstickies_register_settings() {

	// Save settings
	if(isset($_POST['posted']) && strstr($_SERVER['REQUEST_URI'], 'stickies')) {

		// Retrieve options
		$options = get_option('wpstickies-options');
		$options = empty($options) ? array() : $options;
		$options = is_array($options) ? $options : unserialize($options);

		// Get users data
		global $current_user;
		get_currentuserinfo();

		// Get user role
		$role = wpstickies_get_user_role($current_user->ID);

		// Test user role and permission to change settings
		if($role != 'administrator' && !isset($options['allow_settings_change'])) {
			die('You don\'t have permission to change plugin settings!');
		}

		// Add option if it is not extists yet
		if(get_option('wpstickies-options') === false) {
			add_option('wpstickies-options', serialize($_POST['wpstickies-options']));

		// Update option
		} else {
			update_option('wpstickies-options', serialize($_POST['wpstickies-options']));
		}

		die('SUCCESS');
	}
}

/********************************************************/
/*                  Settings page HTML                  */
/********************************************************/
function wpstickies_settings_page() {

	include(dirname(__FILE__).'/settings.php');

}

/********************************************************/
/*                    Head init code                    */
/********************************************************/

function wpstickies_js() {

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	include(dirname(__FILE__).'/init.php');
}

/********************************************************/
/*                    Head init code                    */
/********************************************************/

function wpstickies_get_user_role($uid) {

	// Get users data
	global $current_user;
	get_currentuserinfo();

	if(isset($current_user->roles) && is_array($current_user->roles)) {
		foreach($current_user->roles as $item) {
			$role = $item;
			break;
		}
	}

	if(!isset($role)) {
		return 'non-user';
	}

	return $role;
}

/********************************************************/
/*                        PREVIEW                       */
/********************************************************/

function wps_flush_rewrite_rules() {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}

function wps_add_rewrite_rules( $wp_rewrite ) {

	$new_rules = array(
	  	'wpstickies_preview/(.+)' => 'index.php?wps_image='.$wp_rewrite->preg_index(1).'');

	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

function wps_add_query_vars( $qvars ) {

	$qvars[] = 'wps_image';
	return $qvars;
}

function wps_template_redirect_file() {

	global $wp_query;

	// Product page
	if ( $wp_query->get('wps_image') ) {

		if (file_exists( plugin_dir_path( __FILE__ ) . '/preview.php')) {
			include( plugin_dir_path( __FILE__ ) . '/preview.php') ;
			exit;
		}
	}
}

function wpstickies_allow_creatation($uid) {

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	// Default values
	$options['create_roles'] = empty($options['create_roles']) ? 'administrator' : $options['create_roles'];
	$options['create_custom_roles'] = empty($options['create_custom_roles']) ? array() : explode(',', $options['create_custom_roles']);

	// Get user's role
	$role = wpstickies_get_user_role($uid);

	// Set default values
	$allowCreate = false;
	$hidden = 1;

	// Identify permissions
	if($options['create_roles'] == 'everyone') {

		if($role == 'administrator') {
			$allowCreate = true;
			$hidden = 0;
		} else {
			$allowCreate = true;
		}

	} elseif($options['create_roles'] == 'administrator') {

		if($role == 'administrator') {
			$allowCreate = true;
			$hidden = 0;
		}

	} elseif($options['create_roles'] == 'wpstickiesadmins') {

		if($role == 'administrator') {
			$allowCreate = true;
			$hidden = 0;

		} elseif($role == 'wpstickiesadmins') {
			$allowCreate = true;
		}

	} elseif($options['create_roles'] == 'subscribers') {

		if($role == 'administrator') {
			$allowCreate = true;
			$hidden = 0;

		} elseif($role == 'wpstickiesadmins') {
			$allowCreate = true;

		} elseif($role == 'subscriber') {
			$allowCreate = true;
		}

	} elseif($options['create_roles'] == 'custom') {

		if($role == 'administrator') {
			$allowCreate = true;
			$hidden = 0;
		} else {

			if(in_array($role, $options['create_custom_roles'], false)) {
				$allowCreate = true;
				$hidden = 1;
			}
		}
	}

	if(isset($options['create_auto_accept'])) {
		$hidden = 0;
	}

	return array($allowCreate, $hidden);
}


function wpstickies_allow_modification($uid, $sid) {

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	// Default values
	$options['modify_roles'] = empty($options['modify_roles']) ? 'administrator' : $options['modify_roles'];
	$options['modify_custom_roles'] = empty($options['modify_custom_roles']) ? array() : explode(',', $options['modify_custom_roles']);

	// Get user's role
	$role = wpstickies_get_user_role($uid);

	// Get WPDB
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "wpstickies";

	// Get sticky data
	$data = $wpdb->get_row("SELECT * FROM $table_name WHERE id = ".(int)$sid." ORDER BY date_c DESC LIMIT 1" , ARRAY_A);

	// Set default values
	$allowModify = false;
	$hidden = 1;

	// Identify permissions
	if($data['user_id'] == $uid && $data['flag_hidden'] == 1) {

		$allowModify = true;

		if($options['requirereconfirmation'] == 'auto_accept') {
			$hidden = 0;

		} elseif($options['requirereconfirmation'] == 'no' && $data['flag_hidden'] == 0) {
			$hidden = 0;
		}

	} else if($options['modify_roles'] == 'administrator') {

		if($role == 'administrator') {
			$allowModify = true;
			$hidden = 0;
		}
	} elseif($options['modify_roles'] == 'wpstickiesadmins') {

		if($role == 'administrator') {
			$allowModify = true;
			$hidden = 0;

		} elseif($role == 'wpstickiesadmins' && $data['user_id'] == $uid) {
			$allowModify = true;

			if($options['requirereconfirmation'] == 'auto_accept') {
				$hidden = 0;

			} elseif($options['requirereconfirmation'] == 'no' && $data['flag_hidden'] == 0) {
				$hidden = 0;
			}
		}

	} elseif($options['modify_roles'] == 'subscribers') {

		if($role == 'administrator') {
			$allowModify = true;
			$hidden = 0;

		} elseif($role == 'wpstickiesadmins' && $data['user_id'] == $uid) {
			$allowModify = true;

			if($options['requirereconfirmation'] == 'auto_accept') {
				$hidden = 0;

			} elseif($options['requirereconfirmation'] == 'no' && $data['flag_hidden'] == 0) {
				$hidden = 0;
			}

		} elseif($role == 'subscriber' && $data['user_id'] == $uid) {
			$allowModify = true;

			if($options['requirereconfirmation'] == 'auto_accept') {
				$hidden = 0;

			} elseif($options['requirereconfirmation'] == 'no' && $data['flag_hidden'] == 0) {
				$hidden = 0;
			}
		}

	} elseif($options['modify_roles'] == 'custom') {

		if($role == 'administrator') {
			$allowModify = true;
			$hidden = 0;
		} else {

			if(in_array($role, $options['modify_custom_roles'], false) && $data['user_id'] == $uid) {
				$allowModify = true;

				if($options['requirereconfirmation'] == 'auto_accept') {
					$hidden = 0;

				} elseif($options['requirereconfirmation'] == 'no' && $data['flag_hidden'] == 0) {
					$hidden = 0;
				}
			}
		}
	}

	return array($allowModify, $hidden);
}


/********************************************************/
/*         Action to accept pending stickies            */
/********************************************************/
function wpstickies_accept() {

	// Get users data
	global $current_user;
	get_currentuserinfo();

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	// Get custom capabilities
	$options['capability'] = empty($options['capability']) ? 'manage_options' : $options['capability'];

	if(!array_key_exists($options['capability'], $current_user->allcaps)) {
		die('ERROR');
	}

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "wpstickies";

	// Get entry ID
	$id = (int) $_POST['id'];

	$wpdb->query("UPDATE $table_name SET
					flag_hidden = '0',
					flag_deleted = '0',
					date_m = '".time()."'
				  WHERE id = '$id' LIMIT 1");

	die('SUCCESS');
}

/********************************************************/
/*         Action to restore removed stickies           */
/********************************************************/
function wpstickies_restore() {

	// Get users data
	global $current_user;
	get_currentuserinfo();

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	// Get custom capabilities
	$options['capability'] = empty($options['capability']) ? 'manage_options' : $options['capability'];

	if(!array_key_exists($options['capability'], $current_user->allcaps)) {
		die('ERROR');
	}

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "wpstickies";

	// Get entry ID
	$id = (int) $_POST['id'];

	$wpdb->query("UPDATE $table_name SET
					flag_deleted = '0',
					flag_hidden = '0',
					date_m = '".time()."'
				  WHERE id = '$id' LIMIT 1");

	die('SUCCESS');
}


/********************************************************/
/*         Action to reject pending stickies            */
/********************************************************/
function wpstickies_reject() {

	// Get users data
	global $current_user;
	get_currentuserinfo();

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	// Get custom capabilities
	$options['capability'] = empty($options['capability']) ? 'manage_options' : $options['capability'];

	if(!array_key_exists($options['capability'], $current_user->allcaps)) {
		die('ERROR');
	}

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "wpstickies";

	// Get entry ID
	$id = (int) $_POST['id'];

	$wpdb->query("UPDATE $table_name SET
					flag_hidden = '0',
					flag_deleted = '1',
					date_m = '".time()."'
				  WHERE id = '$id' LIMIT 1");

	die('SUCCESS');
}

/********************************************************/
/*               Action to remove stickies              */
/********************************************************/
function wpstickies_remove() {

	// Get users data
	global $current_user;
	get_currentuserinfo();

	// Gather user data
	$user_id = $current_user->ID;

	// Get sticky ID
	$id = (int) $_POST['id'];

	// Permission check
	$allowModify = wpstickies_allow_modification($user_id, $id);
	$allowModify = $allowModify[0];

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	// Get custom capabilities
	$options['capability'] = empty($options['capability']) ? 'manage_options' : $options['capability'];

	if(array_key_exists($options['capability'], $current_user->allcaps)) {
		$allowModify = true;
	}
	// Get WPDB Object
	global $wpdb;

	// Get image
	$image = $wpdb->escape($_POST['image']);

	// Check per image settings
	$table_name = $wpdb->prefix . "wpstickies_images";
	$settings = $wpdb->get_row("SELECT * FROM $table_name WHERE image = '$image' LIMIT 1", ARRAY_A);
	$data = json_decode($settings['data'], true);


	if($data['disabled'] == 'true') {
		$allowModify = 0;
	}

	if(!$allowModify) {

		// Retrieve options
		$options = get_option('wpstickies-options');
		$options = empty($options) ? array() : $options;
		$options = is_array($options) ? $options : unserialize($options);
		$options['lang_err_remove'] = empty($options['lang_err_remove']) ? 'wpStickies: The following error occurred during remove: You don\'t have permission to remove this sticky' : stripslashes($options['lang_err_remove']);

		die(json_encode(array('message' => $options['lang_err_remove'], 'errorCount' => 1)));
	}

	// Table name
	$table_name = $wpdb->prefix . "wpstickies";

	$wpdb->query("UPDATE $table_name SET
					flag_hidden = '0',
					flag_deleted = '1',
					date_m = '".time()."'
				  WHERE id = '$id' LIMIT 1");

	die(json_encode(array('message' => '', 'errorCount' => 0)));
}


/********************************************************/
/*              Action to add new stickies              */
/********************************************************/

function wpstickies_insert() {

	// Get users data
	global $current_user;
	get_currentuserinfo();

	// Gather user data
	$user_id = $current_user->ID;
	$user_name = $current_user->user_login;


	// Get permissions
	$data = wpstickies_allow_creatation($user_id);
	$allowCreate = $data[0];
	$hidden = $data[1];

	// Get WPDB Object
	global $wpdb;

	// Get image
	$image = $wpdb->escape($_POST['image']);

	// Check per image settings
	$table_name = $wpdb->prefix . "wpstickies_images";
	$settings = $wpdb->get_row("SELECT * FROM $table_name WHERE image = '$image' LIMIT 1", ARRAY_A);
	$data = json_decode($settings['data'], true);


	if($data['disabled'] == 'true') {
		$allowCreate = 0;
		$hidden = 1;
	}

	// Permission test
	if(!$allowCreate) {

		// Retrieve options
		$options = get_option('wpstickies-options');
		$options = empty($options) ? array() : $options;
		$options = is_array($options) ? $options : unserialize($options);
		$options['lang_err_create'] = empty($options['lang_err_create']) ? 'wpStickies: The following error occurred during save: You don\'t have permission to create new stickies!' : stripslashes($options['lang_err_create']);

		die(json_encode(array('message' => $options['lang_err_create'], 'errorCount' => 1)));
	}

	// Table name
	$table_name = $wpdb->prefix . "wpstickies";

	// Build and execute query
	$wpdb->query(
		$wpdb->prepare("INSERT INTO $table_name
							(
								image, data, user_id, user_name, date_c, date_m, flag_hidden,
								flag_deleted
							)
						VALUES
							(
								'%s', '%s', '%d', '%s', '%d', '%d', '%d', '%d'
							)",
							$_POST['image'],
        					addslashes(json_encode($_POST['data'])),
							$user_id,
							$user_name,
							time(),
							time(),
							$hidden,
							0
		)
	);

	// Get the ID
	$id = mysql_insert_id();

	// Modify permission
	$allowToModify = wpstickies_allow_modification($user_id, $id);

	// Response
	die(json_encode(array('message' => '', 'errorCount' => 0, 'id' => $id, 'allowToModify' => $allowToModify[0])));
}

/********************************************************/
/*               Action to modify stickies              */
/********************************************************/

function wpstickies_update() {

	// Get sticky ID
	$id = (int) $_POST['id'];

	// Get users data
	global $current_user;
	get_currentuserinfo();

	// Gather user data
	$user_id = $current_user->ID;
	$user_name = $current_user->user_login;

	// Get permissions
	$data = wpstickies_allow_modification($user_id, $id);
	$allowModify = $data[0];
	$hidden = $data[1];

	// Get WPDB Object
	global $wpdb;

	// Get image
	$image = $wpdb->escape($_POST['image']);

	// Check per image settings
	$table_name = $wpdb->prefix . "wpstickies_images";
	$settings = $wpdb->get_row("SELECT * FROM $table_name WHERE image = '$image' LIMIT 1", ARRAY_A);
	$data = json_decode($settings['data'], true);


	if($data['disabled'] == 'true') {
		$allowModify = 0;
		$hidden = 1;
	}

	// Permission test
	if(!$allowModify) {

		// Retrieve options
		$options = get_option('wpstickies-options');
		$options = empty($options) ? array() : $options;
		$options = is_array($options) ? $options : unserialize($options);
		$options['lang_err_modify'] = empty($options['lang_err_modify']) ? 'wpStickies: The following error occurred during save: You don\'t have permission to modify this sticky!' : stripslashes($options['lang_err_modify']);

		die(json_encode(array('message' => $options['lang_err_modify'], 'errorCount' => 1)));
	}

	// Table name
	$table_name = $wpdb->prefix . "wpstickies";

	// Build and execute query
	$wpdb->query(
		$wpdb->prepare("UPDATE $table_name SET
							data = '%s',
							date_m = '%d',
							flag_hidden = '%d'
						WHERE id = '%d'
						ORDER BY date_m DESC
						LIMIT 1",

						addslashes(json_encode($_POST['data'])),
						time(),
						$hidden,
						$id
		)
	);

	die(json_encode(array('message' => '', 'errorCount' => 0)));
}

/********************************************************/
/*                Action to get stickies                */
/********************************************************/

function wpstickies_get() {

	// Get users data
	global $current_user;
	get_currentuserinfo();

	// Gather user data
	$user_id = $current_user->ID;

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "wpstickies";

	// Get image URL
	$url = $wpdb->escape($_GET['image']);

	// Get latest stickies
	if($options['display_pending_stickies'] == 'visible') {
		$stickies = $wpdb->get_results("SELECT * FROM $table_name
										WHERE image = '$url' AND flag_deleted = '0'
										ORDER BY date_c DESC LIMIT 50", ARRAY_A);
	} else {
		$stickies = $wpdb->get_results("SELECT * FROM $table_name
						WHERE
							( image = '$url' AND flag_hidden = '0' AND flag_deleted = '0' ) OR
							( image = '$url' AND user_id = '$user_id' AND user_id != '0' AND flag_deleted = '0' )
						ORDER BY date_c DESC LIMIT 100", ARRAY_A);
	}

	// Set an empty array for results
	$ret = array('settings' => array(), 'stickies' => array());

	// Build an array
	foreach($stickies as $key => $val) {

		// Get the data
		$data = json_decode(stripslashes($val['data']), true);

		$ret['stickies'][$key] = $data;
		$ret['stickies'][$key]['sticky']['id'] = $val['id'];

		$allowToModify = wpstickies_allow_modification($user_id, $val['id']);
		$ret['stickies'][$key]['sticky']['allowToModify'] = $allowToModify[0];

		// Stipslashes
		$ret['stickies'][$key]['spot']['title'] = stripslashes($data['spot']['title']);
		$ret['stickies'][$key]['spot']['content'] = stripslashes($data['spot']['content']);
		$ret['stickies'][$key]['area']['caption'] = stripslashes($data['area']['caption']);
	}


	// Query down image settings
	$table_name = $wpdb->prefix . "wpstickies_images";
	$settings = $wpdb->get_row("SELECT * FROM $table_name WHERE image = '$url' LIMIT 1", ARRAY_A);

	if(empty($settings)) {
		$ret['settings']['disabled'] = 'false';
	} else {
		$ret['settings'] = json_decode($settings['data']);
	}

	die(json_encode($ret));
}


/********************************************************/
/*           Per image settings for admins              */
/********************************************************/
function wpstickies_image_settings() {

	// Only admins
	if(!current_user_can('manage_options')) {
		die(json_encode(array('message' => 'You don\'t have permission to edit this image settings', 'errorCount' => 1)));
	}

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "wpstickies_images";

	// Get entry ID
	$image = $wpdb->escape($_POST['image']);
	$data = addslashes(json_encode($wpdb->escape($_POST['data'])));

	$wpdb->query("INSERT INTO $table_name
					(image, data, date_c, date_m) VALUES
					('$image', '$data', '".time()."', '".time()."')
				  ON DUPLICATE KEY UPDATE
				  	data = '$data', date_m = '".time()."'");

	die(json_encode(array('message' => '', 'errorCount' => 0)));
}
?>