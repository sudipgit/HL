<?php
/*
Plugin Name: Woocommerce Email Footer Marketing
Plugin URI: http://woocommercedropshipplugins.com
Description: Adds featured products and/or most recent blog posts to woocommerce email footers
Version: 1
Author: woocommercedropshipplugins.com
Author URI: http://woocommercedropshipplugins.com
License:  1 site commercial license
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once( plugin_dir_path( __FILE__ ) . '/lib/am/api-manager-updater.php' );

class wc_email_footer_marketing extends api_manager_updater
{
	public $version = 1;

	public function __construct()
	{
		$this->version = 1;
		$this->plugin_name = 'Email Footer Marketing';
		
		register_activation_hook(__FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'uninstall' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'action_links' ) );
		add_action('woocommerce_email_footer', array($this,'woocommerce_email_footer_marketing'));
		add_action('admin_menu', array($this,'add_admin_menu'),100 );
		
		parent::__construct();
	}

	function activate()
	{
		$options = get_option( 'wc_email_footer_marketing' );
		if ( ! is_array( $options ) ) {
			$options = array(
				'limit' => '6',
				'num_blog_posts' => '1',
				'blog_rss_feed' => get_bloginfo('rss2_url'),
				'blog_rss_feed_label' => 'Our Latest Blog Post:',
				'version' => $this->version
			);
			update_option( 'wc_email_footer_marketing', $options );
		}
		parent::activation();
	}
	
	public function action_links( $links ) 
	{
		return array_merge( array('<a href="' . admin_url( 'admin.php?page=wc_email_footer_marketing' ) . '">Settings</a>'), $links );
	}

	function add_admin_menu()
	{
		add_submenu_page('woocommerce', 'Email Footer Marketing', 'Email Footer Marketing', 'manage_woocommerce', 'wc_email_footer_marketing', array($this,'admin_area') );
	}

	/* Admin Area */
	function admin_area()
	{
		// are we saving a form submit?
		if(isset($_POST['submit']))
		{
			$this->admin_save_options($_POST);
		}
		$this->admin_edit();
	}
	
	function admin_edit()
	{
		$options = get_option( 'wc_email_footer_marketing' );
		echo '<h2>Woocommerce Email Footer Marketing</h2>
			<form action="admin.php?page=wc_email_footer_marketing" method="post" >
				<table>	
					<tr>
						<td>Show <input type="text" size="2" name="limit" value="'.$options['limit'].'" /> featured products in email footer
					</tr>
					<tr>
						<td>Show link(s) to last <input type="text" size="2" name="num_blog_posts" value="'.$options['num_blog_posts'].'" /> blog posts in email footer.</td>
					</tr>
					<tr>
						<td>RSS feed for blog: <input type="text" size="100" name="blog_rss_feed" value="'.$options['blog_rss_feed'].'" /></td>
					</tr>
					<tr>
						<td>Blog feed link label <input type="text" size="50" name="blog_rss_feed_label" value="'.$options['blog_rss_feed_label'].'" /></td>
					</tr>
				</table>
				<p class="submit">
				<input class="button-primary" type="submit" name="submit" value="Save changes" />
				</p>
			</form>';
	}
	
	
	function admin_save_options($data)
	{
		$options = get_option( 'wc_email_footer_marketing' );
		foreach ($data as $key => $opt)
		{
			if ($key != 'submit') $options[$key] = $data[$key];
		}
		update_option( 'wc_email_footer_marketing', $options );
	}

	function woocommerce_email_footer_marketing() 
	{
		$info = get_option( 'wc_email_footer_marketing' );
		echo "<br /><div style='display:block;width:100%;border: solid 2px #eee; padding: 5px; text-align: center; margin: 0 auto;'>";
		echo $this->woocommerce_email_footer_featured_products($info);
		echo $this->woocommerce_email_blog_links($info);	
		echo "</div>";
	}

	function woocommerce_email_footer_featured_products($info) 
	{
		// get featured products 
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $info['limit'],
			'orderby' => 'date',
			'order' => 'desc',
			'meta_query' => array(
				array(
					'key' => '_visibility',
					'value' => array('catalog', 'visible'),
					'compare' => 'IN'
				),
				array(
					'key' => '_featured',
					'value' => 'yes'
				)
			)
		);
		$qResults = new WP_Query( $args );
        //$this->sendAlert(var_dump($qResults->posts[0]->post_title)); 
		ob_start();
		echo "<table><tr>";
		foreach($qResults->posts as $post) 
		{
		  echo "<td><a href='".get_permalink($post->ID)."'>".get_the_post_thumbnail($post->ID,apply_filters('single_product_small_thumbnail_size','shop_thumbnail'))."</a></td>";
		}
		echo "</tr></table>";
		$temp = ob_get_clean();
		return $temp;
	}
	
	function woocommerce_email_blog_links($info) 
	{
		if (($info['num_blog_posts'] > 0) && (strlen($info['blog_rss_feed']) > 0 ))
		{
			$rss = fetch_feed( $info['blog_rss_feed'] );
			if ( ! is_wp_error( $rss ) )
			{
				$maxitems = $rss->get_item_quantity( $info['num_blog_posts'] ); 
				$rss_items = $rss->get_items( 0, $maxitems );
				if ( $maxitems > 0 )
				{
					foreach ( $rss_items as $item )
					{
						echo $info['blog_rss_feed_label'].' <a href="'.esc_url( $item->get_permalink()).'">'.esc_html( $item->get_title()).'</a>';
					}
				}
			}
		}
	}
}
// finally create instance and add to globals
$GLOBALS['wc_email_footer_marketing'] = new wc_email_footer_marketing();
