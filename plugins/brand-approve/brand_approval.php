<?php

/*
 * Plugin Name: Brand Approval
 * Plugin URI:http://www.sudipat.com
 * Author:Sudip
 * Author URI:http://www.sudipat.com
 * Text Domain: wpap
 * Version:1.0
 * 
 */


add_action( 'admin_print_styles', 'load_custom_admin_css' );
function load_custom_admin_css()
{
wp_enqueue_style('my_style', plugins_url('/css/admin.css',__FILE__));
}

 define('AUTO_PATH', basename( dirname(__FILE__) ));
    

  

  require_once (dirname(__FILE__).'/classes.php');
        $obj=new BAClass();




