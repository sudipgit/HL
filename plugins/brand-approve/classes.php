<?php
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class BAClass extends WP_List_Table{


	function __construct()
      {
           add_action( 'admin_menu',array(&$this,'add_menu'));


      }


  	  function add_menu()
  	  {
  	  	     add_menu_page('Brand Users', 'Brand Users', 'add_users',brand_users,array(&$this,'show_menu'));
             add_submenu_page( 'brand_users' ,'Approvals', 'Approvals', 'add_users','approvals',array(&$this,'show_approvals'));
			 add_submenu_page( 'brand_users' ,'view', 'view', 'add_users','view',array(&$this,'show_view'));
			 add_submenu_page( 'brand_users' ,'Exports', 'exports', 'add_users','exports',array(&$this,'show_exports'));
			  add_menu_page( 'Salon Users' ,'Salon Users', 'add_users',salon_users,array(&$this,'getSalonUsers'));
  	  }

 function getSalonUsers()
		{
		
		
		 
          echo '<div class="wrap"><h2>All Salons users</h2>';
         $this->prepare_items();
          $this->display();
         

          
          echo '</div>'; 
		
		
		
		}
		 function get_columns()
		{
        $columns = array(
           'cb' => '<input type="checkbox" />',
            'user_id' => 'ID',
			'user_name' => 'User Name',
            'name' => 'Company',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
         );
     
         return $columns;

		}
		function prepare_items()
     {
     	  
     	
     
     	$example_data=$this->get_salons_list();
     	
          $columns = $this->get_columns();
           $hidden = array();
           $sortable = $this->get_sortable_columns();
         $this->_column_headers = array($columns, $hidden, $sortable);
         $this->items = $example_data;;
         
          $per_page = 100;
      
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
	function column_default( $item, $column_name ) {
    switch( $column_name ) {
    case 'user_id':
    case 'name':
	 case 'user_name':
    case 'address':
    case 'city':
    case 'state':
    case 'zip':

    return $item[ $column_name ];
    default:
    return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
    }
	    function get_sortable_columns() {
    $sortable_columns = array(
    'user_id' => array('user_id',false),
	'user_name' => array('user_name',false),
    'name' => array('name',false),
    'address' => array('address',false),
    'city' => array('city',false),
    'state' => array('state',false),
    'zip' => array('zip',false),
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
	  function get_salons_list()
  {
     
  	 global $wpdb;
		$table=$wpdb->prefix."salons";
			$table2=$wpdb->prefix."users";
			$query = "SELECT a.*,b.user_login FROM $table as a left join $table2 as b on a.user_id=b.ID";

			$results=$wpdb->get_results($query);
  	 
  	  $list=array();
  	  $datalist=array();
  	  if($results)
  	  {
  	 foreach($results as $result)
  	 {
  	 	
  	 	$list['user_id']=$result->user_id;
		$list['user_name']=$result->user_login;
  	 	$list['name']=$result->name;
  	 	$list['address']=$result->address;
  	 	$list['city']=$result->city;
  	 	$list['state']=$result->state;
  	 	$list['zip']=$result->zip;
  	 	
  	 	$datalist[]=$list;
  	 }
  	  
  	  }
  	  return $datalist;
  	
  }
	
	
	
	
	
	
	
  	  function show_menu()
  	  {?>
	  
	    <div class="list">
	  <h3>All Brands</h3>
	  <table width="100%" cellpadding="0" cellspacing="0">
	   <thead>
	   <tr>
	   <th>ID</th>
	   <th>Company Name</th>
	   <th>First Name</th>
	   <th>Last Name</th>
	    <th>Email</th>
		<th>Slug</th>
		<th>Overview</th>
		<th></th>
		</tr>
	   </thead>
	  
	  <tbody>
	  <?php
	  $approvals=$this->getApprovals(2);
	  if($approvals )
	  {
	    $i=1;
	   foreach($approvals as $approval)
       {?>
	   <tr class="<?php if($i%2==0) echo 'even'; else echo 'odd';?>">
	    <td><?php echo $approval->user_id;?></td>
	    <td><?php echo $approval->company_name;?></td>
	    <td><?php echo $approval->first_name;?></td>
	    <td><?php echo $approval->last_name;?></td>
	    <td><?php echo $approval->contact_email;?></td>
	    <td><?php echo $approval->company_slug;?></td>
		<td><?php echo $this->getAdminFormatedDes(substr($approval->overview,0,100));?></td>
		<td><a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=view&bid=<?php echo $approval->id;?>">Details</a></td>
	   </tr>
	   
	  <?php 
	  $i++;
	  }
	   
	   }
	  ?>
	</tbody>
	</table>
	  </div>
	  
	  
	 <?php

	 }
	  
	  
	  
	  
	  function show_approvals()
	  {
	  ?>
	  <div class="list">
	  <h3>Approval  List</h3>
	  <table width="100%" cellpadding="0" cellspacing="0">
	   <thead>
	   <tr>
	   <th>SL</th>
	   <th>Company Name</th>
	   <th>First Name</th>
	   <th>Last Name</th>
	    <th>Email</th>
		<th>Slug</th>
		<th>Overview</th>
		<th></th>
		</tr>
	   </thead>
	  
	  <tbody>
	  <?php
	  $approvals=$this->getApprovals();
	  if($approvals )
	  {
	    $i=1;
	   foreach($approvals as $approval)
       {?>
	   <tr class="<?php if($i%2==0) echo 'even'; else echo 'odd';?>">
	    <td><?php echo $i;?></td>
	    <td><?php echo $approval->company_name;?></td>
	    <td><?php echo $approval->first_name;?></td>
	    <td><?php echo $approval->last_name;?></td>
	    <td><?php echo $approval->contact_email;?></td>
	    <td><?php echo $approval->company_slug;?></td>

		<td><?php echo $this->getAdminFormatedDes(substr($approval->overview,0,100));?></td>
		<td><a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=view&bid=<?php echo $approval->id;?>">Details</a></td>
	   </tr>
	   
	  <?php 
	  $i++;
	  }
	   
	   }
	  ?>
	</tbody>
	</table>
	  </div>
	  
	  <?php
	  }
	  
	  
	  function show_view()
	  {
	  
	    $postid=$_POST['id'];
        if($postid)
		{
		
		$this->saveUser($_POST);
		}
		
	     $bid=$_GET['bid'];
		 $result=$this->getDetails($bid);
		
		 ?>
	  <div class="brand-details">
	    <h3>Company Request Information</h3>
	  
           <p class="large"><label>Company Name:</label><span><?php echo $result->company_name;?></span></p>
		   <p><label>First Name:</label><span><?php echo $result->first_name;?></span></p>
		   <p><label>Last Name:</label><?php echo $result->last_name;?><span></span></p>
		   <p><label>Email:</label><?php echo $result->contact_email;?><span></span></p>
		   <p><label>Phone:</label><span><?php echo $result->contact_phone;?></span></p>
		   <p><label>Website:</label><?php echo $result->company_website;?><span></span></p>
		    <p><label>No of Brands:</label><span><?php echo $result->no_brands;?></span></p>
		   <p><label>No of Product:</label><span><?php echo $result->no_products;?></span></p>
		   <p><label>Address:</label><span><?php echo $result->city.', '. $result->sstate.', '. $result->country;?></span></p>
		   <p><label>Overview:</label><span><?php echo $this->getAdminFormatedDes($result->overview);?></span></p>
		   <p><label>Request Date:</label><span><?php echo date('d M, Y',$result->created); ?><span></p>
 	     <div class="submit-button">
		 <script>
		  function validForm()
         {
		    var v1=document.forms["approve"]["username"].value;
	        var v2=document.forms["approve"]["password"].value;
		    if(v1=="" || v2=="")
	        {
		      alert('Please type username and password for this company');
	           return false;

		  
		  
	         }
			 
			 return ture;
	  }
		 
		 </script>
		 <?php if($result->status==1) { ?>
		 <form action="" method="post" name="approve" onsubmit="return validForm();">
		
		  <ul>
		  <li><label>User Name:</label>
		  <input type="text" name="username"/>
		  </li>
		   <li><label>Password:</label>
		  <input type="password" name="password"/>
		  </li>
		  <li><input type="checkbox" name="is_entry" value="1"/> Is Dataentry User </li>
		  <ul>
		  <input type="hidden" name="id" value="<?php echo $result->id;?>"/>
		   <input type="hidden" name="first_name" value="<?php echo $result->first_name;?>"/>
		    <input type="hidden" name="last_name" value="<?php echo $result->last_name;?>"/>
			<input type="hidden" name="email" value="<?php echo $result->contact_email;?>"/>
		  <input type="submit"  value="Approve Now"/>
		 
		 </form>
		 <?php } else if($result->status==2) {?>
		 <p>UserName:<span><?php echo $result->username;?></span></p>
		  <p>Password:<span><?php echo $result->password;?></span></p>
		 <?php } ?>
		 </div>
	  </div>
	  
	 <?php }
	  
	  
	function getApprovals($app=1)
    { 

           global $wpdb;

  	      $table=$wpdb->prefix."brand_info";

          $query="select * from ".$table.' where `status`='.$app;

  	      $results=$wpdb->get_results($query);



  	    return $results;



   }
  function getAdminFormatedDes($des)
{

     $des=stripslashes($des);
	 $des=stripslashes($des);
	 $des=stripslashes($des);
	 $des=stripslashes($des);
	 
	 return $des;
		             
} 
   
   function getDetails($id)
   {
   
     global $wpdb;

  	      $table=$wpdb->prefix."brand_info";

          $query="select * from ".$table.' where `id`='.$id;

  	      $result=$wpdb->get_row($query);



  	    return $result;
   
   
   
   }


  	  	 
		 function saveUser($post)
		 {
		//var_dump($post);
		  $userdata=array(
                          'user_login'=>$post['username'],
                          'first_name'=>$post['first_name'],
                          'last_name'=>$post['last_name'],
                          'user_email'=>$post['email'],
                          'user_pass'=>$post['password']
						
                         
                          );

                   $user_id=wp_insert_user( $userdata );
        //  do_action( 'set_user_role', $user_id, 'customer','contributor');
		
            if($user_id && is_int($user_id))
			{
			
			  add_user_meta( $user_id, 'is_brand', 'yes'); 
			  
			  $this->saveApproved($post['id'],$user_id,$post['username'],$post['password']);
			  $this->brandApprovalNotification($post['email'],$post['username'],$post['password']);
			
			}
			
			return true;
		 
		 }

		 
		 function saveApproved($id,$userid,$username,$pass)
		 {
		     global $wpdb;
			 $table=$wpdb->prefix."brand_info";
              $where=array('id'=>$id);
                $data=array('user_id'=>$userid,'status'=>2,'username'=>$username,'password'=>$pass);
              $wpdb->update( $table, $data, $where); 

            return true;
		 
		 
		 }
		 
		 function brandApprovalNotification($email,$username,$password)
		 {
		 
		 
		   $message= '<div width:500px;background:#f3f4f5><p><b>Hair Library Approved Your Brand</a></b></p><br>
					<p>Username: '.$username.'<br>Password: '.$password.'</p><br/>
					<p>Login <a href="http://hairlibrary.com/login/">HERE </a> to see dashboard</p><br>
					<p>Once you login you can change your password any time by going to my account page in your dashboard</p>

					</div>';
		 
		   $to =$email.',sudipcseku@gmail.com';
			
			$subject = "HL Approved Brand";
			$from ='info@hairlibrary.com';
			$headers = "From:" . $from. "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html\r\n";
			wp_mail($to,$subject,$message,$headers);
		 }

		 
		 
		 






  function show_exports()
	  {
	  

        if($_POST['choose_type'])
		{
		
		$this->all_exports($_POST);
		}
		
		 ?>
	  <div class="brand-details">
	    <h3>Select export type</h3>
	  
         

		 <script>
		  function validForm()
         {
		    var v1=document.forms["export_type"]["choose_type"].value;
	     
		    if(v1=="select")
	        {
		      alert('Please Choose a Type');
	           return false;

		  
		  
	         }
			 
			 return ture;
	  }
		 
		 </script>
		  <div class="submit-button">
		
		 <form action="" method="post" name="export_type" onsubmit="return validForm();">
		
		   <select name="choose_type">
		   <option value="select">Select Type</option>
		   <option value="users">Users</option>
		   <option value="brands">Brands</option>
		   <option value="products">Products</option>
		   <option value="salons">Salons</option>
		   </select>
		   <input type="submit" value="Submit"/>
		 </form>
		
		 </div>
	  </div>
	  
	 <?php }
	 
	 
	 function all_exports($posts)
	 {
		 
		 switch($posts['choose_type'])
		 {
			 case 'users': $this->export_users();
			               break;
			 case 'brands': $this->export_brands();
			               break;
			
             case 'products': $this->export_products();
			               break;

             case 'salons': $this->export_salons();
			               break;						   
         						   
			               
			 
			 
		 }
		 
	 }
	 
	 
	 function export_users()
	 {
		// var_dump("egtrty");exit;
		  $csv_fields=array();		
	
	$csv_fields[0][0]="ID";
    $csv_fields[0][1]="Username";
	$csv_fields[0][2]="First Name";
	$csv_fields[0][3]="Last Name";
	$csv_fields[0][4]="Display Name";
	$csv_fields[0][5]="User Nicename";
	$csv_fields[0][6]="Email";
	$csv_fields[0][7]="Bio";
	$csv_fields[0][8]="Age";
	$csv_fields[0][9]="User Type";
	$csv_fields[0][10]="Zip Code";
	$csv_fields[0][11]="Hair Style";
	$csv_fields[0][12]="Hair Length";
	$csv_fields[0][13]="Hair Texture";
	$csv_fields[0][14]="Cemical Treatments";
	$csv_fields[0][15]="Hair Conditions";
	$csv_fields[0][16]="Hair Description";
	$csv_fields[0][17]="Wear";
	$csv_fields[0][18]="Demographic";
	
	$style=array('188'=>'Straight','189'=>'Curly','250'=>'Braids','179'=>'Locks');
	$length=array('v_short'=>'Very Short','short'=>'Short','medium'=>'Medium','long'=>'Long','v_long'=>'Very Long');
	$conditions=array('o_scalp'=>'Oily Scalp','p_bald'=>'Pattern Baldness','alopecia'=>'Alopecia','g_hair'=>'Grey Hair','sp_ends'=>'Split Breakage','dry_scalp'=>'Dry Itchy','normal'=>'No, I don\'t have any hair conditions');
	$demograph=array('Afb'=>'African/ Black','Cau'=>'Caucasian','Euro'=>'European','Spnsh'=>'Spanish/Latin','Asn'=>'Asian','Indn'=>'Indian');
	
	
	
	
	 global $wpdb;
	 $table=$wpdb->prefix."users";
	 $query="select * from $table where ID>7000 AND ID<8001";
	 
	 $blogusers=$wpdb->get_results($query);
	 $customers=array();
	
	$i=0;
	 foreach($blogusers as $user)
	 {
		 if(get_user_meta($user->ID,'is_salon', true)==1 && get_user_meta($user->ID,'sk_user_activation_code', true)=='active' && get_user_meta($user->ID,'is_brand', true)!='yes') 
			{
				$customers[]=$user;
			}
		
	 }
	
	$k=1;
	foreach($customers as $customer)
	  {
		 $uans=getUserAnswers($customer->ID);
		 $csv_fields[$k][0]=$customer->ID;
		$csv_fields[$k][1]=$customer->user_login;
		$csv_fields[$k][2]=get_user_meta($customer->ID,'first_name', true);
		$csv_fields[$k][3]=get_user_meta($customer->ID,'last_name', true);
		$csv_fields[$k][4]=$customer->display_name;
		$csv_fields[$k][5]=$customer->user_nicename;
		$csv_fields[$k][6]=$customer->user_email;
		$csv_fields[$k][7]=get_user_meta($customer->ID,'customer_bio_info', true);
		$csv_fields[$k][8]=get_user_meta($customer->ID,'age', true);
		$csv_fields[$k][9]=get_user_meta($customer->ID,'who_are_you', true);
		$csv_fields[$k][10]=get_user_meta($customer->ID,'customer_zip_code', true);
		
		// hair style
		$csv_fields[$k][11]=$style[$uans[9]];
		
		// hair length
		$csv_fields[$k][12]=$length[$uans[5]];
		
		// hair texture
		$csv_fields[$k][13]=$uans[4];
		
		// hair process 
		$csv_fields[$k][14]=$uans[8];
		
		// hair condition
		$conds=explode(',',$uans[7]);
		$new_conds=array();
		foreach($conds as $cond)
		{
			$new_conds[]=$conditions[$cond];
			
		}
		
		$csv_fields[$k][15]=implode(',',$new_conds);
		
		// hair description
		$csv_fields[$k][16]=$uans[6];
		
		$csv_fields[$k][17]=get_user_meta($customer->ID,'my_hair_wear', true);
		
		// Save demograph
		$csv_fields[$k][18]=$demograph[$uans[2]];
		
		  $k++;
	  }
	$csv_folder = dirname(__FILE__).'/csv';
	//var_dump($csv_folder);
$filename = 'user_9';
$CSVFileName = $csv_folder.'/'.$filename.'.csv';
$FileHandle = fopen($CSVFileName, 'w') or die("can't open file");
fclose($FileHandle);
$fp = fopen($CSVFileName, 'w');
foreach ($csv_fields as $fields) {
$fields = str_replace("\n","\r\n",$fields);
//$fields = str_replace("\r\n","\n",$fields);
fputcsv($fp, $fields);
}
fclose($fp);
	
	
	
	
	
	}
	 
	 
	 
 function export_brands()
	 {
		// var_dump("egtrty");exit;
		  $csv_fields=array();		
	
	$csv_fields[0][0]="ID";
	$csv_fields[0][1]="First Name";
	$csv_fields[0][2]="Last Name";
	$csv_fields[0][3]="Company Name";
	$csv_fields[0][4]="Company Slug";
	$csv_fields[0][5]="Email";
	$csv_fields[0][6]="Overview";
	$csv_fields[0][7]="Phone";
	$csv_fields[0][8]="Website";
	$csv_fields[0][9]="Number of Brands";
	$csv_fields[0][10]="Number of Products";
	$csv_fields[0][11]="City";
	$csv_fields[0][12]="State";
	$csv_fields[0][13]="Country";
	$csv_fields[0][14]="Facebook";
	$csv_fields[0][15]="Twitter";
	$csv_fields[0][16]="Instagram";
	$csv_fields[0][17]="Thumblr";
	$csv_fields[0][18]="Youtube";
	$csv_fields[0][19]="Googleplus";
	$csv_fields[0][20]="Company Age";
	$csv_fields[0][21]="Allow Dropshipping";
	$csv_fields[0][22]="Tags";
	$csv_fields[0][23]="Show Video";
	$csv_fields[0][24]="Embed Video";
	
	
	
	 global $wpdb;
	 $table=$wpdb->prefix."brand_info";
	 $query="select * from $table where status=2";
	 
	 $brands=$wpdb->get_results($query);
	 
	$k=1;
	foreach($brands as $brand)
	  {
		 
		 $csv_fields[$k][0]=$brand->user_id;
		 $csv_fields[$k][1]=$brand->first_name;
		 $csv_fields[$k][2]=$brand->last_name;
		 $csv_fields[$k][3]=$brand->company_name;
		 $csv_fields[$k][4]=$brand->company_slug;
		 $csv_fields[$k][5]=$brand->contact_email;
		 $csv_fields[$k][6]= filter_var($brand->overview,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		 $csv_fields[$k][7]=$brand->contact_phone;
		 $csv_fields[$k][8]=$brand->company_website;
		 $csv_fields[$k][9]=$brand->no_brands;
		 $csv_fields[$k][10]=$brand->no_products;
		 $csv_fields[$k][11]=$brand->city;
		 $csv_fields[$k][12]=$brand->sstate;
		 $csv_fields[$k][13]=$brand->country;
		 $csv_fields[$k][14]=$brand->Facebook;
		 $csv_fields[$k][15]=$brand->Twitter;
		 $csv_fields[$k][16]=$brand->Instagram;
		 $csv_fields[$k][17]=$brand->Thumblr;
		 $csv_fields[$k][18]=$brand->Youtube;
		 $csv_fields[$k][19]=$brand->Googleplus;
		 $csv_fields[$k][20]=$brand->company_age;
		 
		 $dp='No';
		 if($brand->allow_dropshipping==1) 
			$dp='Yes';
		
		 $csv_fields[$k][21]=$dp;
		 $csv_fields[$k][22]=$brand->tags;
		 
		 $sv='No';
		 if($brand->show_video==1) 
			$sv='Yes';
		 $csv_fields[$k][23]=$sv;
		 $csv_fields[$k][24]=$brand->embed_video;
	
		
		  $k++;
	  }
	$csv_folder = dirname(__FILE__).'/csv';
	//var_dump($csv_folder);
$filename = 'brands4';
$CSVFileName = $csv_folder.'/'.$filename.'.csv';
$FileHandle = fopen($CSVFileName, 'w') or die("can't open file");
fclose($FileHandle);
$fp = fopen($CSVFileName, 'w');
foreach ($csv_fields as $fields) {
$fields = str_replace("\n","\r\n",$fields);
//$fields = str_replace("\r\n","\n",$fields);
fputcsv($fp, $fields);
}
fclose($fp);
	
	
	
	
	
	}	 
	 
	 
	  
 function export_products()
	 {
		// var_dump("egtrty");exit;
		  $csv_fields=array();		
	
	$csv_fields[0][0]="ID";
	$csv_fields[0][1]="Product Name";
	$csv_fields[0][2]="Description";
	$csv_fields[0][3]="Short Description";
	$csv_fields[0][4]="Instructions";
	$csv_fields[0][5]="Ingredients";
	$csv_fields[0][6]="Brand Description";
	$csv_fields[0][7]="Product Consistency";
	$csv_fields[0][8]="Intended Gender";
	$csv_fields[0][9]="Type of Hair";
	$csv_fields[0][10]="Is Organic";
	$csv_fields[0][11]="Quantity";
	$csv_fields[0][12]="UPC";
	$csv_fields[0][13]="Product Tags";
	$csv_fields[0][14]="Hair Style";
	$csv_fields[0][15]="Hair Length";
	$csv_fields[0][16]="Hair Texture";
	$csv_fields[0][17]="Cemical Treatments";
	$csv_fields[0][18]="Hair Conditions";
	$csv_fields[0][19]="Hair Description";
	$csv_fields[0][20]="Demographic";
	$csv_fields[0][21]="Targeted Age Range";
    $csv_fields[0][22]="Price";
    $csv_fields[0][23]="Image Url";
	
	
	
	$products=getAllProducts();
	
	
    $ans=getAllProdcutAnswers();
	
	
	$style=array('weave'=>'Weave','r_s_hair'=>'Relaxed Straight Hair ','braids'=>'Braids','wigs'=>'Wigs','dreds'=>'Dreds','p_t_hair'=>'Permed/Texturized Hair','n_c_hair'=>'Naturally Curly Hair','nt_st_hair'=>' Naturally Straight Hair');
	$process=array('c_hair'=>'Colored Hair','r_straight'=>' Relaxed Straight','p_curly'=>'Permed Curly ','none'=>'None');
	$length=array('v_short'=>'Very Short','short'=>'Short','medium'=>'Medium','long'=>'Long','v_long'=>'Very Long');
	$conditions=array('o_scalp'=>'Oily Scalp','p_bald'=>'Pattern Baldness','alopecia'=>'Alopecia','g_hair'=>'Grey Hair','sp_ends'=>'Split Breakage','dry_scalp'=>'Dry Itchy','normal'=>'No, I don\'t have any hair conditions');
	$demograph=array('Afb'=>'African/ Black','Cau'=>'Caucasian','Euro'=>'European','Spnsh'=>'Spanish/Latin','Asn'=>'Asian','Indn'=>'Indian');
	$consistency=array('pw'=>'Powder','gel'=>'Gel','lq'=>'Liquid','ar'=>'Aresol','foam'=>'Foam','oil'=>'Oil','wax'=>'Wax','styling_obj'=>'Styling Object');
	$types=array('c_ns'=>'Naturally Straight','c_rs'=>'Relaxed Straight','c_c'=>'Curly','c_d'=>'Dreds','c_b'=>'Braids');
	
	$k=1;
	foreach($products as $product)
	  {
		 if($k>500)
		 {
		 $img=wp_get_attachment_url(get_post_thumbnail_id($product->ID));
		
		 $csv_fields[$k][0]=$product->ID;
		 $csv_fields[$k][1]=$product->post_title;
		 $csv_fields[$k][2]=filter_var($product->post_content,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		 $csv_fields[$k][3]=$product->post_excerpt;
		 $csv_fields[$k][4]=get_post_meta($product->ID,'instructions',true); 
		 $csv_fields[$k][5]=get_post_meta($product->ID,'ingredients',true); 
		 $csv_fields[$k][6]=get_post_meta($product->ID,'brand_description',true); 
		
		 $csv_fields[$k][7]=$consistency[get_post_meta($product->ID,'product_consistency',true)]; 
		  $csv_fields[$k][8]=$ans[$product->ID][1];
		  
		  $stys=explode(',',get_post_meta($product->ID,'type_of_hair',true));
		$new_stys=array();
		foreach($stys as $sty)
		{
			$new_stys[]=$types[$sty];
			
		}
		  
		  
		 $csv_fields[$k][9]=implode(',',$new_stys);
		 $csv_fields[$k][10]=get_post_meta($product->ID,'is_organic',true); 
		 $csv_fields[$k][11]=get_post_meta($product->ID,'quantity_products',true); 
		 $csv_fields[$k][12]=get_post_meta($product->ID,'upc',true); 
		 $csv_fields[$k][13]=get_post_meta($product->ID,'product_tags',true); 
		 
		 // hair style
		 $stys=explode(',',$ans[$product->ID][9]);
		$new_stys=array();
		foreach($stys as $sty)
		{
			$new_stys[]=$style[$sty];
			
		}
		$csv_fields[$k][14]=implode(',',$new_stys);
		
		// hair length
		 $stys=explode(',',$ans[$product->ID][5]);
		$new_stys=array();
		foreach($stys as $sty)
		{
			$new_stys[]=$length[$sty];
			
		}
		$csv_fields[$k][15]=implode(',',$new_stys);
		
		// hair texture
		$csv_fields[$k][16]=$ans[$product->ID][4];
		
		// hair process 
		 $stys=explode(',',$ans[$product->ID][8]);
		$new_stys=array();
		foreach($stys as $sty)
		{
			$new_stys[]=$process[$sty];
			
		}
		$csv_fields[$k][17]=implode(',',$new_stys);
		
		// hair condition
		$conds=explode(',',$ans[$product->ID][7]);
		$new_conds=array();
		foreach($conds as $cond)
		{
			$new_conds[]=$conditions[$cond];
			
		}
		
		$csv_fields[$k][18]=implode(',',$new_conds);
		
		// hair description
		$csv_fields[$k][19]=$ans[$product->ID][6];
		
		
		
		// Save demograph
		$stys=explode(',',$ans[$product->ID][2]);
		$new_stys=array();
		foreach($stys as $sty)
		{
			$new_stys[]=$demograph[$sty];
			
		}
		$csv_fields[$k][20]=implode(',',$new_stys);
		$csv_fields[$k][21]=$ans[$product->ID][12];
		 
		 $csv_fields[$k][22]=get_post_meta($product->ID,'_price',true); 
	     $csv_fields[$k][23]=$img;
		 
		 }
		
		  $k++;
		 
	  }
	$csv_folder = dirname(__FILE__).'/csv';
	//var_dump($csv_folder);exit;
$filename = 'products2';
$CSVFileName = $csv_folder.'/'.$filename.'.csv';
$FileHandle = fopen($CSVFileName, 'w') or die("can't open file");
fclose($FileHandle);
$fp = fopen($CSVFileName, 'w');
foreach ($csv_fields as $fields) {
$fields = str_replace("\n","\r\n",$fields);
//$fields = str_replace("\r\n","\n",$fields);
fputcsv($fp, $fields);
}
fclose($fp);
	
	
	
	
	
	}
	 
	 
	 
	 
	 
	 
	  
}