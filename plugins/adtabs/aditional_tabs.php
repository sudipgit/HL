<?php

/*
 * Plugin Name: Aditional Tabs
 * Plugin URI:http://www.sudipat.com
 * Author:Sudip
 * Author URI:http://www.sudipat.com
 * Text Domain: wpap
 * Version:1.0
 * 
 */


add_action( 'admin_print_styles', 'load_adtabs_css' );
function load_adtabs_css()
{
wp_enqueue_style('my_style', plugins_url('/css/style.css',__FILE__));
}



 define('ADTABS_PATH', basename( dirname(__FILE__) ));
    

  

  require_once (dirname(__FILE__).'/classes.php');
        $obj=new adTabsClass();




