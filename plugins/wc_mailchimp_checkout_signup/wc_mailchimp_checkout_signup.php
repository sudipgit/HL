<?php
/*
Plugin Name: Woocommerce MailChimp Checkout Opt-In
Plugin URI: http://woocommercedropshipplugins.com
Description: Allows customers to opt-in to mailing list at checkout
Version: 1
Author: woocommercedropshipplugins.com
Author URI: http://woocommercedropshipplugins.com
License:  1 site commercial license
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once( plugin_dir_path( __FILE__ ) . '/lib/am/api-manager-updater.php' );

class wc_mailchimp_checkout_signup extends api_manager_updater
{
	public $version = 1;
	
	public function __construct()
	{
		$this->version = 1;
		$this->plugin_name = 'MailChimp Checkout Opt-In';
	
		register_activation_hook(__FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'uninstall' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'action_links' ) );
		add_action('woocommerce_order_status_processing',array($this,'order_processing'));
		add_filter('woocommerce_after_order_notes' , array($this,'woocommerce_after_order_notes'));
		add_action('woocommerce_checkout_update_order_meta', array($this,'custom_checkout_field_update_order_meta'));		
		add_action('admin_menu', array($this,'add_admin_menu'), 100 );
		
		parent::__construct();
	}
	
	function activate()
	{
		$options = get_option( 'wc_mailchimp_checkout_signup' );
		if ( ! is_array( $options ) ) {
			$options = array(
				'api_key' => '',
				'list_id' => '',
				'label' => 'Yes! Please Send Me Monthly Discounts and Coupons',
				'default' => 'checked',
				'version' => $this->version
			);
			update_option( 'wc_mailchimp_checkout_signup', $options );
		}
		parent::activation();
	}
	
	public function action_links( $links ) 
	{
		return array_merge( array('<a href="' . admin_url( 'admin.php?page=wc_mailchimp_checkout_signup' ) . '">Settings</a>'), $links );
	}
	
	/* Admin Area */
	function add_admin_menu()
	{
		add_submenu_page('woocommerce','MailChimp Checkout Opt-In', 'MailChimp Checkout Opt-In', 'manage_woocommerce', 'wc_mailchimp_checkout_signup', array($this,'admin_area') );
	}
	
	function admin_area()
	{
		// are we saving a form submit?
		if(isset($_POST['submit']))
		{
			$this->admin_save_options($_POST);
		}		
		$this->admin_edit();
	}
	
	// admin edit screen
	function admin_edit()
	{
		$options = get_option( 'wc_mailchimp_checkout_signup' );
		echo '<h2>MailChimp Checkout Opt-In</h2>';
		if (strlen($options['api_key'])<= 0)
		{
			echo '<p>Please enter your Mailchimp API key</p>
					<form action="admin.php?page=wc_mailchimp_checkout_signup" method="post" >
					<table>					
						<tr>
							<td><label for="api_key">Mailchimp API key:</label></td>
							<td><input type="text" name="api_key" size="40" value="'.$options['api_key'].'" /> <a href="http://kb.mailchimp.com/article/where-can-i-find-my-api-key/" target="_blank">Where do I find my API Key?</a> </td>
						</tr>
					</table>
					<p class="submit">
					<input class="button-primary" type="submit" name="submit" value="Save changes" />
					</p>
				</form>';
		}
		else
		{
			require_once(plugin_dir_path( __FILE__ ) . '/lib/mc/MailChimp.class.php'); 
			$MC = new Drewm\MailChimp($options['api_key']);
			$lists = $MC->call('lists/list');
			//var_dump($lists);
			echo '<form action="admin.php?page=wc_mailchimp_checkout_signup" method="post" >
					<table>					
						<tr>
							<td><label for="api_key">Mailchimp API key:</label></td>
							<td><input type="text" name="api_key" size="40" value="'.$options['api_key'].'" /> <a href="http://kb.mailchimp.com/article/where-can-i-find-my-api-key/" target="_blank">Where do I find my API Key?</a> </td>
						</tr>
						<tr>
							<td><label for="list_id" size="15" >Mailchimp List Id:</label></td>
							<td>								
								<select name="list_id" >';
									foreach ($lists['data'] as $key =>$list)
									{
										if ($list['id'] == $options['list_id']) 
											$selected = 'selected';
										else
											$selected = '';
										echo '<option value="'.$list['id'].'" '.$selected.'>'.$list['name'].'</option>';
									}
			echo				'</select>
							</td>
						</tr>
						<tr>
							<td><label for="label">Checkbox Label:</label></td>
							<td><input type="text" size="100" name="label" value="'.$options['label'].'" /> </td>
						</tr>
						<tr>
							<td><label for="default">Checkbox Default:</label></td>
							<td><select name="default" >
									<option value="1" '.($options['default'] == 1 ? 'selected' : '').'>Checked</option>
									<option value="0" '.($options['default'] == 0 ? 'selected' : '').'>Un-Checked</option>
								</select>
							</td>
						</tr>
					</table>
					<p class="submit">
					<input class="button-primary" type="submit" name="submit" value="Save changes" />
					</p>
				</form>';
		}
	}
	
	// save the post data
	function admin_save_options($data)
	{
		$options = get_option( 'wc_mailchimp_checkout_signup' );
		foreach ($data as $key => $opt)
		{
			if ($key != 'submit') $options[$key] = $data[$key];
		}
		update_option( 'wc_mailchimp_checkout_signup', $options );
	}
	
	// Adds the mailing list opt-in checkbox to the checkout screen
	function woocommerce_after_order_notes($checkout)
	{
		$options = get_option( 'wc_mailchimp_checkout_signup' );
		woocommerce_form_field( 'email_opt_in', array(
		        'type'          => 'checkbox',
	        	'class'         => array('form-row-wide'),
		        'label'         => __($options['label'])
		        ),$options['default']);
	}

	// saves the opt-in field
	function custom_checkout_field_update_order_meta($order_id)
	{
		if ($_POST['email_opt_in']) update_post_meta( $order_id, 'email_opt_in', esc_attr($_POST['email_opt_in']));
	}

	// perform tasks that happen once an order is set to processing
	function order_processing($order_id)
	{
		$order = new WC_Order( $order_id ); // load the order from woocommerce
		$this->mailing_list($order); // sign them up to the mailing list		
	}

	// signs a customer up for the mailing list if they have opted in
	function mailing_list($order)
	{
		$order = new WC_Order( $order_id ); // load the order from woocommerce			
		// Did they opt-in to the mailing list?
		if(isset($order->order_custom_fields['email_opt_in']))
		{
			$options = get_option( 'wc_mailchimp_checkout_signup' );
			if ((strlen($options['list_id']) > 0) && (strlen($options['list_id']) > 0))
			{
				require_once(plugin_dir_path( __FILE__ ) . '/lib/mc/MailChimp.class.php');  
				$MC = new Drewm\MailChimp($options['api_key']); // create a new mailchimp API wrapper with our API key
				//$results = $MC->call('lists/list');
				$args =  array(
								'id'                => $options['list_id'],
								'email'             => array('email'=>$order->billing_email),
								'merge_vars'        => array('FNAME'=>$order->billing_first_name, 'LNAME'=>$order->billing_last_name),
								'double_optin'      => false,
								'update_existing'   => true,
								'replace_interests' => false,
								'send_welcome'      => true );
				$results = $MC->call('lists/subscribe', $args);

				/* ob_start();
				print_r($results);
				print_r($args);
				$temp = ob_get_clean();
				$this->sendAlert($temp); */
			}
		}
	}
	
	// for sending failure notifications
	function sendAlert($text)
	{
		wp_mail( get_bloginfo('admin_email'), 'Alert from '.get_bloginfo('name'), $text );
	}
}
// finally create instance and add to globals
$GLOBALS['wc_mailchimp_checkout_signup'] = new wc_mailchimp_checkout_signup();
