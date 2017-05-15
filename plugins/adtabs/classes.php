<?php
if(!class_exists('WP_List_Table')) :
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
endif;
class adTabsClass extends WP_List_Table{



	function __construct()
      {
           add_action( 'admin_menu',array(&$this,'add_adtabs_menu'));
          include_once('functions.php'); 

      }


  	  function add_adtabs_menu()
  	  {
  	  	     add_menu_page('Analytics', 'Analytics', 'add_users','analytics',array(&$this,'show_analytics'),plugins_url( 'adtabs/img/icon1.png' ),'105');
             add_menu_page('Server', 'Server', 'add_users','server',array(&$this,'show_server'),plugins_url( 'adtabs/img/icon1.png' ),'101');
			 add_menu_page('Sales', 'Sales', 'add_users','sales',array(&$this,'show_sales'),plugins_url( 'adtabs/img/icon1.png' ),'110');
		     add_menu_page('Consumer', 'Consumer', 'add_users','consumer',array(&$this,'show_consumer'),plugins_url( 'adtabs/img/icon1.png' ),'104');
			 add_menu_page('Shipping', 'Shipping', 'add_users','shipping',array(&$this,'show_shipping'),plugins_url( 'adtabs/img/icon1.png' ),'106');
		     add_menu_page('Facebook', 'Facebook', 'add_users','facebook',array(&$this,'show_facebook'),plugins_url( 'adtabs/img/icon1.png' ),'107');
		     add_menu_page('Twitter', 'Twitter', 'add_users','twitter',array(&$this,'show_twitter'),plugins_url( 'adtabs/img/icon1.png' ),'109');
			
			 add_menu_page('Shop Products', 'Shop Products', 'edit_posts','shop_products',array(&$this,'show_shop_products'),plugins_url( 'adtabs/img/icon1.png' ),'103');
		     add_submenu_page('shop_products', 'Product Inventory', 'Product Inventory', 'edit_posts','product_inventory',array(&$this,'show_product_inventory'));
			 add_submenu_page('shop_products', 'Edit', 'Edit', 'edit_posts','product_edit',array(&$this,'show_product_editform'));
		     add_submenu_page('shop_products', 'Overview', 'Overview', 'edit_posts','product_view',array(&$this,'show_product_overview'));
			 add_submenu_page('shop_products', 'Aged Inventory', 'Aged Inventory', 'edit_posts','aged_inventory',array(&$this,'show_aged_inventory'));
			  add_submenu_page('shop_products', 'Category Inventory', 'Category Inventory', 'edit_posts','category_inventory',array(&$this,'show_category_inventory'));
			  add_submenu_page('shop_products', 'Upload Products', 'Upload Products', 'edit_posts','upload_products',array(&$this,'show_upload_products'));
			 add_submenu_page('shop_products', 'Pending Products', 'Pending Products', 'edit_posts','pending_products',array(&$this,'show_pending_products'));
			//add_menu_page('Upload Post', 'Upload Post', 'add_users',AUTO_PATH,'show_menu');
			// add_submenu_page( 'consumer' ,'Consumer2', 'Consumer2', 'add_users','consumer2',array(&$this,'show_consumer2'));
			 add_submenu_page( 'consumer' ,'Consumer Mapping', 'Consumer Mapping', 'add_users','consumer_mapping',array(&$this,'show_consumer_maps'));
			 add_submenu_page( 'consumer' ,'Consumer List', 'Consumer List', 'add_users','consumer_list',array(&$this,'show_consumer_list'));
			 add_submenu_page( 'consumer' ,'Statistics', 'Statistics', 'add_users','consumer_statistics',array(&$this,'show_consumer_statistics'));
			 
			 //add_submenu_page( 'sales' ,'Sales1', 'Sales1', 'add_users','sales1',array(&$this,'show_sales1'));
			 add_submenu_page( 'sales' ,'Sales2', 'Sales2', 'add_users','sales2',array(&$this,'show_sales2'));
			 add_submenu_page( 'sales' ,'Orders', 'Orders', 'read','Orders',array(&$this,'show_orders'));
  	  }
	  



  	  function show_analytics()
  	  {?>
       	<div class="profile-tabs">
		 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
          <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<ul class="tabs"> 
			<li class="tab-item active" id="tab1">GENERAL</li> 
			<li class="tab-item" id="tab2">SOCIAL MEDIA</li> 
			<li class="tab-item" id="tab3">GEOGRAPHY</li>
			<li class="tab-item" id="tab4">MOBILE</li>
			<li class="tab-item" id="tab5">ENTRACE/EXIT</li>
			<li class="tab-item" id="tab6">TECHNICAL</li>
			<li class="tab-item" id="tab7">SEO</li>
		</ul> 
	<div class="panel entry-content" id="tab11">
		<img src="<?php echo plugins_url( 'adtabs/img/general.png');?>"/>		
	</div> 
	<div class="panel entry-content hide" id="tab21">
		<img src="<?php echo plugins_url( 'adtabs/img/socialmedia.png');?>" /> 
	</div> 
	<div class="panel entry-content hide" id="tab31">
		<img src="<?php echo plugins_url( 'adtabs/img/geography.png');?>" /> 
	</div> 
	<div class="panel entry-content hide" id="tab41">
		<img src="<?php echo plugins_url( 'adtabs/img/mobile.png');?>" /> 
	</div> 
	<div class="panel entry-content hide" id="tab51">
		<img src="<?php echo plugins_url( 'adtabs/img/entrance.png');?>" /> 
	</div> 
	<div class="panel entry-content hide" id="tab61">
		<img src="<?php echo plugins_url( 'adtabs/img/technical.png');?>" /> 
	</div>
	<div class="panel entry-content hide" id="tab71">
		<img src="<?php echo plugins_url( 'adtabs/img/seo.png');?>" /> 
	</div> 
	<div class="clear"></div>
	
	<script type="text/javascript"> 
	var oid="tab1"; 
	$(".tab-item").click(function()
	{ 
		c_tid=this.id;
		if(oid!=c_tid) 
		{ 
			oa_cid="#"+oid+'1';
			ca_cid="#"+c_tid+'1';
			ca_tid="#"+c_tid; 
			oa_tid="#"+oid; 
			$(ca_tid).addClass('active');
			$(oa_tid).removeClass('active'); 
			$(oa_cid).hide();
			$(ca_cid).fadeIn(1000);
			oid=c_tid; 
		} 
	});
	</script>
	</div>
		
	<?php	
		
		}
		
		
		function show_server()
		{?>
        
		<img src="<?php echo plugins_url( 'adtabs/img/server.png' );?>"/>
		
		<?php 
		}
		
		function show_sales()
		{
			include('templates/sales_overview.php');
		}
		
		function show_sales1()
		{
			include('templates/sales_overview.php');
		}
		
		function show_sales2()
		{
			include('templates/sales_graph.php');
		}
		
		function show_sales3()
		{
			include('templates/sales_demography.php');
		}
		
		
	    function show_orders()
		{
			include('templates/service_orders.php');
		}
		
		function show_consumer()
  	    {
         include('templates/consumer1.php');

		 }
		 
		 function show_consumer_statistics()
		 {
		 include('templates/consumer_stats.php');
		 
		 }
		
	
		
		function show_consumer2()
  	  {
	  
	        include('templates/consumer2.php');
		}
		
		function show_consumer_maps()
		{
		  include('templates/consumer_maps.php');
		}
		
		
		function show_shipping()
  	  {
        echo "eWFTWRTGY DFHET SDEGETH";
		}
		function show_facebook()
  	  {
        echo "Facebook Information Here";
		}
	  function show_twitter()
  	  {
        echo "Twitter Information Here";
		}
		
		function show_shop_products()
		{
		include('templates/product1.php');
	
		}
		
		function show_aged_inventory()
		{
		include('templates/aged_inventory.php');
	
		}
		function show_category_inventory()
		{
		include('templates/category_inventory.php');
	
		}
		function show_upload_products()
		{
		include('templates/upload_products.php');

		}
		function show_pending_products()
		{
		
		include('templates/pending_products.php');
		}

		function show_product_editform()
		{
		include('templates/edit.php');
	
		}
		
		function show_product_overview()
		{
		include('templates/view.php');
		}
		
		
		function show_product_inventory()
		{
		include('templates/product_inventory.php');
		}
		
		
		
		
		function show_consumer_list()
		{
		
		
		 
          echo '<div class="wrap"><h2>My List Table Test</h2>';
         $this->prepare_items();
          $this->display();
         
          ?>
            <form method="post">
           <input type="hidden" name="page" value="album-list" />
            <?php $this->search_box('search', 'search_id'); ?>
          </form>
          
          <?php 
          
          echo '</div>'; 
		
		
		
		}
	  
	  
	  
	  //app
    function get_columns()
    {
        $columns = array(
           'cb' => '<input type="checkbox" />',
            'username' => 'User Name',
            'name' => 'Name',
           'email' => 'Email',
           'gender'=>'Gender',
		   'age'=>'Age'
         );
     
         return $columns;

    }
    
    // app
    function prepare_items()
     {
     	  
     	
     
     	$example_data=$this->get_user_list();
     	
          $columns = $this->get_columns();
           $hidden = array();
           $sortable = $this->get_sortable_columns();
         $this->_column_headers = array($columns, $hidden, $sortable);
         $this->items = $example_data;;
         
          $per_page = 30;
      
          $current_page = $this->get_pagenum();
           $total_items = count($example_data);
        // only ncessary because we have sample data
           $this->found_data = array_slice($example_data,(($current_page-1)*$per_page),$per_page);
          $this->set_pagination_args( array(
          'total_items' => $total_items, //WE have to calculate the total number of items
        'per_page' => $per_page //WE have to determine how many items to show on a page
        ) );
          $this->items = $this->found_data;
         
         
         
    }
	//app
    function column_default( $item, $column_name ) {
    switch( $column_name ) {
    case 'ID':
    case 'username':
    case 'name':
    case 'email':
    case 'gender':
	case 'age':
    return $item[ $column_name ];
    default:
    return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
    }
    
    //app
    function get_sortable_columns() {
    $sortable_columns = array(
    'username' => array('username',false),
    'name' => array('name',false),
    'email' => array('email',false)
    );
    return $sortable_columns;
    }
    
    function column_booktitle($item) {
    $actions = array(
    'edit' => sprintf('<a href="?page=%s&action=%s&book=%s">Edit</a>',$_REQUEST['page'],'edit',$item['ID']),
    'delete' => sprintf('<a href="?page=%s&action=%s&book=%s">Delete</a>',$_REQUEST['page'],'delete',$item['ID']),
    );
    return sprintf('%1$s %2$s', $item['booktitle'], $this->row_actions($actions) );
    }
	
    function get_bulk_actions() {
    $actions = array(
    'delete' => 'Delete'
    );
    return $actions;
    }
    
    function column_cb($item) {
    return sprintf(
    '<input type="checkbox" name="book[]" value="%s" />', $item['ID']
    );
    }
    

    

    
  //app
  function get_user_list()
  {
      $args = array(
	'role'         => 'subscriber'
      );
  	
  	  $results=get_users($args );
  	 
  	  $list=array();
  	  $datalist=array();
  	  if($results)
  	  {
  	 foreach($results as $result)
  	 {
  	 	 if(is_brand($result->data->ID))
		 {
  	 	$list['ID']=$result->data->ID;
  	 	$list['username']=$result->data->user_login;
		$list['name']=$result->data->display_name;
  	 	$list['email']=$result->data->user_email;
  	 	$list['gender']='N/A';
  	 	$list['age']='N/A';
  	 	
  	 	$datalist[]=$list;
		}
  	 }
  	  
  	  }
  	  return $datalist;
  	
  }
   function is_brand($userid=null)
 {
    if(!$userid)
	  return false;
 
    global $wpdb;
    $btable=$wpdb->prefix."brand_info";
    $query="select * from $btable where user_id=$userid";
    $results=$wpdb->get_results($query);
    if($results)
	  return true;
	else
      return false;	
 
 
 }
  

		 
		 
		 




}