<?php
/*
Plugin Name: Woocommerce Completed Order Email Tracking Numbers
Plugin URI: http://woocommercedropshipplugins.com
Description: Add tracking numbers to order completed emails
Version: 1
Author: woocommercedropshipplugins.com
Author URI: http://woocommercedropshipplugins.com
License: commercial license
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once( plugin_dir_path( __FILE__ ) . '/lib/am/api-manager-updater.php' );

class wc_order_email_tracking_numbers extends api_manager_updater
{
	public function __construct()
	{		
		$this->version = 1;
		$this->plugin_name = 'Email Tracking Numbers';
		
		register_activation_hook(__FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'uninstall' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'action_links' ) );
		add_action('woocommerce_email_after_order_table', array($this,'woocommerce_email_after_order_table'));
		add_action('admin_menu', array($this,'add_admin_menu'),100 );
		
		parent::__construct();
	}
	
	function activate()
	{
		update_option( $this->plugin_slug.'_version', $this->version );
	
		/* add tracking_UPS, tracking_FEDEX, and tracking_USPS to a dummy order 
		 * So that they will be available for user to choose from the metadata dropdown
		*/

		$data = array(
			'post_title' => 'Tracking Number Email Integration Example Order',
			'post_content' => '',
			'post_status' => 'trash',
			'post_author' => 1,
			'post_type' => 'shop_order'
		);
		$order_id = wp_insert_post( $data );
		add_post_meta( $order_id, 'tracking_USPS', 'MY_USPS_TRACKING_NUMBER' );
		add_post_meta( $order_id, 'tracking_UPS', 'MY_UPS_TRACKING_NUMBER' );
		add_post_meta( $order_id, 'tracking_FEDEX', 'MY_FedEx_TRACKING_NUMBER' );
		wp_trash_post( $order_id );
		parent::activation();
	}
	
	public function action_links( $links ) 
	{
		return array_merge( array('<a href="' . admin_url( $this->admin_url ) . '">Instructions</a>'), $links );
	}
	
	function add_admin_menu()
	{
		add_submenu_page('woocommerce', 'Email Tracking Numbers', 'Email Tracking Numbers', 'manage_woocommerce', $this->plugin_slug, array($this,'admin_area') );
	}
	
	function admin_area()
	{
		$this->admin_display_instructions();
	}
	
	function admin_display_instructions()
	{
		echo '<h2>Tracking Number Email Integration Instructions</h2>
			<p>Once you supplier has dropshipped your order you will have tracking numbers that you need to give to your customer. Follow the simple steps below to add the tracking number into your Wooccommerce Order Completed email.</p>
			<h3>Steb-By-step guide</h3>
			<p>Important: you must do these steps <u>before</u> changing an order\'s status to Completed</p>
			<ol>
				<li>Open the order and find the "Add New Custom Field:" area</li>
				<li>Choose "tracking_UPS", "tracking_USPS", or "tracking_FEDEX" from the <b>Name</b> dropdown. <br />
				(The first time you do this the option may not exist, in which case you simply click "Enter New" and type it in)</li>
				<li>Enter the tracking number in the <b>Value</b> field</li>
				<li>Press <b>Add Custom Field</b> to save</li>
				<li>Now you may switch the order status to Completed. The tracking numbers will be added to the email and linked to the the shipper\'s tracking website for your customer\'s convenience</li>
			</ol>';
	}

	// Adds tracking number to emails
	function woocommerce_email_after_order_table($order)
	{
		$UPS = get_post_meta( $order->id,'tracking_UPS');
		$FEDEX = get_post_meta( $order->id,'tracking_FEDEX');
		$USPS = get_post_meta( $order->id,'tracking_USPS');
		
		if(count($UPS) > 0)
		{
				echo '<h2>UPS Tracking Information</h2><ol>';
				foreach($UPS as $i => $tracknum)
				{
					echo '<li><a href="http://wwwapps.ups.com/WebTracking/processRequest?tracknum='.$tracknum.'">'.$tracknum.'</a></li>';
				}
				echo '</ol>';
		}
		if(count($FEDEX) > 0)
		{
				echo '<h2>FEDEX Tracking Information</h2><ol>';
				foreach($FEDEX as $i => $tracknum)
				{
					echo '<li><a href="http://www.fedex.com/Tracking?action=track&tracknumbers='.$tracknum.'">'.$tracknum.'</a></li>';
				}
				echo '</ol>';
		}
		if(count($USPS) > 0)
		{
				echo '<h2>USPS Tracking Information</h2><ol>';
				foreach($USPS as $i => $tracknum)
				{
					echo '<li><a href="https://tools.usps.com/go/TrackConfirmAction!input.action?tLabels='.$tracknum.'">'.$tracknum.'</a></li>';
				}
				echo '</ol>';
		}
	}
}
// finally create instance and add to globals
$GLOBALS['wc_order_email_tracking_numbers'] = new wc_order_email_tracking_numbers();
