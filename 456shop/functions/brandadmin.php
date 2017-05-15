<?php
function getAllOrders($brandid,$status=null)
{

 global $wpdb;
 $botable=$wpdb->prefix."brand_orders";
 if($status)
 $query="select * from $botable where brand_id=$brandid and shipping_status='".$status."' group by order_id order by order_time desc";
 else
 $query="select * from $botable where brand_id=$brandid group by order_id order by order_time desc";
 
$results=$wpdb->get_results($query);
$orders=array();
if($results) 
 foreach($results as $result)
 {
  
   $order = new WC_Order($result->order_id);
   if($order->status!='cancelled')
   {
    $order->shipping_status=$result->shipping_status;
	 $order->border=$result; 
    $orders[]=$order;
	
	}
 }
return $orders;
}
function orderProdcuts($orderid,$brandid=null)
{

 global $wpdb;
 $botable=$wpdb->prefix."brand_orders";
 $query="select * from $botable where brand_id=$brandid and order_id=$orderid";
$results=$wpdb->get_results($query);
return $results;
}
// Update brands shipping status
function updateOrder($orderid,$brandid,$status)
{

    global $wpdb;
    $botable=$wpdb->prefix."brand_orders";
    $query="update $botable set `shipping_status`='".$status."' where brand_id=$brandid and order_id=$orderid";
	 
   $wpdb->query($query);
   return true;
}

function getInvoiceOrders($brandid,$status=null)
{

 global $wpdb;
 $botable=$wpdb->prefix."brand_orders";
 if($status)
 $query="select * from $botable where brand_id=$brandid and shipping_status='".$status."' order by order_time desc";
 else
 $query="select * from $botable where brand_id=$brandid order by order_time desc";
 
$results=$wpdb->get_results($query);
$orders=array();
if($results) 
 foreach($results as $result)
 {
  
   $order = new WC_Order($result->order_id);
   if($order->status!='cancelled')
   {
    $order->shipping_status=$result->shipping_status;
	 $order->border=$result; 
    $orders[]=$order;
	
	}
 }
return $orders;
}

function getOrderByMonth($brandid,$year=null,$month=null)
{
$orders=getInvoiceOrders($brandid,'Shipped');
$list=array();
 if(count($orders)>0)
 {
  foreach($orders as $order)
  {

    $y=date('Y',$order->border->order_time);
	$m=date('m',$order->border->order_time);
    if($year==$y && $month==$m)
     $list[]=$order;
  }
 
 
 }

return $list;
}

/* end function.php*/

 function updateBrandInfo($post,$user,$filedata=null)
 {
	 
 global $wpdb;

  
  
 
   
   $mixer=null;

   if($filedata)
   {
   
   	 $path=ABSPATH.'wp-content/uploads/brandphoto/';
     $mixer=uploadProImage($filedata,$post['user_id'],$path);
    
     $imagepath=$mixer.'_'.$filedata['filedata']['name'];
     $thumbpath ="thumb_". $mixer.'_'. $filedata['filedata']['name'];
        
   
   }
   $pp=1;
 $bdata=array();  
if($post['pass1']!="" && $post['pass2']!="" && $pass1==$pass2)
{
    if(savePassword($post,$user))
	{
	$bdata['password']=$post['pass1'];
	$pp=2;
	}

}
   
   

 if($mixer)
 {
  $bdata['avatar']=$imagepath;
  $bdata['thumb']=$thumbpath;
  $bdata['photo_update_year']=date('Y');
 }
 
 $brand=get_brand_info($post['user_id']);


if($brand->allow_dropshipping!=$post['allow_dropshipping'][0])
   {
   $bdata['allow_dstime']=time();
     customerServiceNotification($post);
   }
 
 
   $bdata['company_name']=$post['company_name'];
   $bdata['contact_phone']=$post['phone'];
   $bdata['contact_email']=$post['email'];
   $bdata['company_website']=$post['website'];
   $bdata['company_age']=$post['company_age'];
   $bdata['no_products']=$post['no_products'];
   $bdata['city']=$post['city'];
   $bdata['sstate']=$post['sstate'];
		 
   $bdata['overview']=$post['overview'];
   $bdata['facebook']=$post['facebook'];	   
   $bdata['twitter']=$post['twitter'];
    $bdata['instagram']=$post['instagram'];
   $bdata['thumblr']=$post['thumblr'];
   $bdata['youtube']=$post['youtube'];
   $bdata['googleplus']=$post['googleplus'];
  $bdata['tags']=$post['tags'];
  $bdata['embed_video']=$post['embed_video'];
  $bdata['show_video']=$post['show_video'];
  $bdata['allow_dropshipping']=$post['allow_dropshipping'][0];

   $btable=$wpdb->prefix."brand_info";
  $where=array('id'=>$post['id']);
 
  $wpdb->update( $btable, $bdata, $where); 
  
  updateBrandShippingInfo($post); 

 return $pp;
 	
 
 
 
 }
 
 /**returns Brand info of given brand id**/
function get_brand_info($userid)
{

global $wpdb;
  $btable=$wpdb->prefix."brand_info";
   $query="select * from $btable where user_id=$userid";
   $result=$wpdb->get_row($query);
   return $result;


}

function getAllBrands($orderby="company_name ASC")
{

global $wpdb;
  $btable=$wpdb->prefix."brand_info";
   $query="select * from $btable where status=2 order by $orderby";
   $results=$wpdb->get_results($query);
   foreach($results as $result)
   {
     $first_alpha=strtolower(substr($result->company_name,0,1));
     $brands[$first_alpha][]=$result;
   }

   return $brands;


}
//returns brand info of drop shipping brand
function getBrandShippingInfo($brandid)
{
   global $wpdb;
  $btable=$wpdb->prefix."brand_shipping_info";
 $query1="select * from $btable where brand_id=$brandid";
 $result=$wpdb->get_row($query1);
return $result;
}


function get_brand_products($brand_id,$catids=null,$limit=null,$sort=null,$price=null)
{
  global $wpdb;
  $trtable=$wpdb->prefix."term_relationships";
  $tttable=$wpdb->prefix."term_taxonomy";
  $ptable=$wpdb->prefix."posts";
  if($catids)
  {
  $cats=implode(',',$catids);
  $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id IN ($cats) and a.post_type='product' and a.post_author=$brand_id and a.post_status='publish' group by a.ID  order by a.post_date DESC";
  }else
  {
   $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE a.post_type='product' and a.post_author=$brand_id and a.post_status='publish' group by a.ID  order by a.post_date DESC";
  }
 if($limit)
  $query=$query." limit $limit";

 $results=$wpdb->get_results($query);




 if($price)
 {
   $prices=explode(';',$price);
   
   $list=array();
   if(count($results)>0)
   {
      foreach($results as $result)
      {
       // $pp=get_post_meta($result->id,'_price',true);
	   $pp=getTotalLike($result->id,'product');
        if($pp>=$prices[0] and $pp<=$prices[1])
		  $list[]=$result;
   
      }
   
    }
	$results=$list;
	
 }
 
 

 if($sort)
      $results=getHeartSortedProducts($results,$sort);
   //$results=getPriceSortedProducts($results,$sort);
 
 return $results;

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
 
 
 function customerServiceNotification($post=null)
 {
   if(!$post)
    return false;
 
     if($post['allow_dropshipping'][0]=="Yes")
	  $notify="Enabled";
	  else
	  $notify="Disabled";

	   $message=$post['company_name'].' '.$notify.' Drop Shipping <br> Date: '.date('m-d-Y');
	  
	  
	  
		$to ='sudipcseku@gmail.com,morgangantt@gmail.com';
		$subject ='Brand '.$notify.' Drop Shipping';
		$from='info@hairlibrary.com';
		$to2 =$post['email'];
		$headers = "From:" . $from. "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html\r\n";
		wp_mail($to,$subject,$message,$headers);
		wp_mail($to2,$subject,$message,$headers);


	
 
 }
 
 
 function updateBrandShippingInfo($post)
 {
   $current_user= wp_get_current_user();
  global $wpdb;
  $btable=$wpdb->prefix."brand_shipping_info";
  $data=array();
  
  $data['brand_id']=$current_user->ID;
  $data['warehouse_name']=$post['dswarehouse_name'];
  $data['email1']=$post['dsemail1'];
  $data['email2']=$post['dsemail2'];
  $data['email3']=$post['dsemail3'];
  $data['email4']=$post['dsemail4'];
  $data['street_address']=$post['dsstreet_address'];
 // $data['address']=$post['dsaddress'];
  $data['city']=$post['dscity'];
  $data['bstate']=$post['dsbstate'];
  $data['zip']=$post['dszip'];
  $data['country']=$post['dscountry']; 
  $data['paypal_email']=$post['paypal_email'];
  $data['return_policies']=$post['return_policies'];
 
 
 $query1="select * from $btable where brand_id=$current_user->ID";
 $results=$wpdb->get_results($query1);
 
 if(count($results)>0)
  {
   $where=array('id'=>$results[0]->id);
  $wpdb->update( $btable, $data, $where); 
  
  
  }else
  {
  
   $wpdb->insert($btable, $data); 
  
  }
  
 
 
 }


 function uploadProImage($filedata,$userid,$path)
 {
 
 
      $image =$filedata["filedata"]["name"];

	     $uploadedfile = $filedata['filedata']['tmp_name'];
     
 
 	    if ($image) 
 	    {
 	
 		     $filename = stripslashes($filedata['filedata']['name']);
 	
  		     $extension = getImgExtension($filename);
 		     $extension = strtolower($extension);
		
		
             if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		     {
		
 		        	return false;
 		     }
 		    else
 		     {

                 if($extension=="jpg" || $extension=="jpeg" )
                  {
                      $uploadedfile = $filedata['filedata']['tmp_name'];
                      $src = imagecreatefromjpeg($uploadedfile);

                  }

                  else if($extension=="png")
                  {
                     $uploadedfile = $filedata['filedata']['tmp_name'];
                     $src = imagecreatefrompng($uploadedfile);

                 }
               else 
                 {
                       $src = imagecreatefromgif($uploadedfile);
                }

             echo $scr;

              list($width,$height)=getimagesize($uploadedfile);


            $newwidth=150;
            $newheight=($height/$width)*$newwidth;
            $tmp=imagecreatetruecolor($newwidth,$newheight);


          

           imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

          //$path1=$path.$userid.'/';
		  $year=date('Y');
		  $path1=$path.$year.'/';

         if(!is_dir($path1))
         {
          mkdir($path1, 0755);
          
         } 

        
          $mixer=time();
       
          $imagepath=$path1.$mixer.'_'.$filedata['filedata']['name'];
          $thumbpath = $path1."thumb_". $mixer.'_'. $filedata['filedata']['name'];
        
         


           imagejpeg($tmp,$thumbpath,100);
           imagejpeg($src,$imagepath,100);
        

            imagedestroy($src);
            imagedestroy($tmp);
           
 
 
 
 
 		     }

 	  
 	    
 	    }
 	    
 	      return $mixer;
 }

 function getImgExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 

 
 
/*returns one-d array of specific user's answer.*/
function getUserAnswers($userid)
{
   global $wpdb;
  $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where object_id=$userid and object_type='user'";
  
  $results=$wpdb->get_results($query);
  
  $ans=array();
  if($results)
  {
    foreach($results as $result)
    $ans[$result->question_id]=$result->answer;
  }

  return $ans;



}



function  saveBrandInfo($post)
{

 global $wpdb;
  $btable=$wpdb->prefix."brand_info";
  $com_name=strtolower($post['company_name']);
  $com_name=getFormatedDes($com_name);
  $names=explode(' ', $com_name);
  $company_slug=implode('_',$names);
  $company_slug=processSlug($company_slug);
 

 $data=array(
	     'first_name'=>$post['first_name'],
         'last_name'=>$post['last_name'],
         'company_name'=>$post['company_name'],
		 'company_slug'=>$company_slug,
	     'contact_phone'=>$post['phone'],
		 'contact_email'=>$post['email'],
		  'company_website'=>$post['company_web'],
		   'no_brands'=>$post['no_brands'],
		   'no_products'=>$post['no_products'],
		   'city'=>$post['city'],
		   'sstate'=>$post['sstate'],
		   'country'=>$post['country'],
		   'overview'=>$post['overview'],
		   'created'=>time(),
		   'status'=>1,
		   'photo_update_year'=>date('Y')
		  

       );                    
    $wpdb->insert($btable,$data); 
	sendBrandRegisterNotification($data);

}

function sendBrandRegisterNotification($data){
	$to = 'info@hairlibrary.com';
	$subject = "New Brand Registration";
	$message = "<h2>New Brand Registered in Hair Library</h2>
				<p>Company Name: " .$data['company_name'] ."</p>
				<p>Email: " .$data['contact_email'] ."</p>
				<p>Phone: " .$data['contact_phone'] ."</p>
				<p>City: " .$data['city'] ."</p>
				<p>State: " .$data['sstate'] ."</p>
				<p>Country: " .$data['country'] ."</p>
				<p>Registered at " .date('d, M, Y') . "</p>";
	$from = 'info@hairlibrary.com';
	$headers = "From:" . $from. "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html\r\n";
	mail($to,$subject,$message,$headers);

}








 function rmUploadImage($filedata,$userid,$path)
 {
 
 
      $image =$filedata["file"]["name"];

	     $uploadedfile = $filedata['file']['tmp_name'];
     
 
 	    if ($image) 
 	    {
 	
 		     $filename = stripslashes($filedata['file']['name']);
 	
  		     $extension = rmGetExtension($filename);
 		     $extension = strtolower($extension);
		
		
             if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		     {
		
 		        	return false;
 		     }
 		    else
 		     {

                 if($extension=="jpg" || $extension=="jpeg" )
                  {
                      $uploadedfile = $filedata['file']['tmp_name'];
                      $src = imagecreatefromjpeg($uploadedfile);

                  }

                  else if($extension=="png")
                  {
                     $uploadedfile = $filedata['file']['tmp_name'];
                     $src = imagecreatefrompng($uploadedfile);

                 }
               else 
                 {
                       $src = imagecreatefromgif($uploadedfile);
                }

             echo $scr;

              list($width,$height)=getimagesize($uploadedfile);


            $newwidth=150;
            $newheight=($height/$width)*$newwidth;
            $tmp=imagecreatetruecolor($newwidth,$newheight);


          

           imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

		 
		   
		   $path1=$path;
         if(!is_dir($path1))
         {
          mkdir($path1, 0755);
          
         }  
		         
          $mixer=time();
       
          $imagepath=$path1.$mixer.'_'.$filedata['file']['name'];
          $thumbpath = $path1."thumb_". $mixer.'_'. $filedata['file']['name'];
        
         


           imagejpeg($tmp,$thumbpath,100);
           imagejpeg($src,$imagepath,100);
        

            imagedestroy($src);
            imagedestroy($tmp);
           
 
 
 
 
 		     }

 	  
 	    
 	    }
 	    
 	      return $mixer;
 }

 function rmGetExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 
 
 function getMyCustomers($brandid=null,$pid=null)
{
 global $wpdb;
 $ptable=$wpdb->prefix."posts";
 
  $query="SELECT * FROM $ptable WHERE post_type='shop_order' and post_author=$brandid";
  
 $results=$wpdb->get_results($query);
 
 $customers=array();
$total=0;
if($results)
 foreach($results as $result)
 {
$order = new WC_Order($result->ID);
$items = $order->get_items();


foreach ( $items as $item ) {
  
   if($pid==$item['product_id'])
   {
      $total=$total+$item['item_meta']['_qty'][0];
      
       $cid=$order->order_custom_fields['_customer_user'][0];
       if(!in_array($cid,$customers))
         {
              $customers[]=$cid;
         }
		 
		 
   }

}
}


if(is_array($customers))
 {
   $customers=implode(',',$customers);
 $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where object_type='user' and object_id IN ($customers)";

  $answers=$wpdb->get_results($query);
return $answers;
}
return false;


}

function getLikedUserAnswers($pid)
{
 global $wpdb;
$users=getAllLikedUsers($pid,'product');

if($users && count($users)>0)
 {
   $customers=implode(',',$users);
   $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where object_type='user' and object_id IN ($customers)";

  $answers=$wpdb->get_results($query);
return $answers;
}

return false;

}


function getMyCustomerIds($brandid=null,$pid=null)
{
 global $wpdb;
 $ptable=$wpdb->prefix."posts";
 
  $query="SELECT * FROM $ptable WHERE post_type='shop_order' and post_author=$brandid";
  
 $results=$wpdb->get_results($query);
 
 $customers=array();
$total=0;
if($results)
 foreach($results as $result)
 {
$order = new WC_Order($result->ID);
$items = $order->get_items();


foreach ( $items as $item ) {
  
   if($pid==$item['product_id'])
   {
      $total=$total+$item['item_meta']['_qty'][0];
      
       $cid=$order->order_custom_fields['_customer_user'][0];
       if(!in_array($cid,$customers))
         {
              $customers[]=$cid;
         }
		 
		 
   }

}
}


return $customers;


}


function get_user_ans_count($qid,$ans,$anslist=null) 
{
 if(!$anslist)
   return 0;
  $count=0;
   foreach($anslist as $answer)
   {

      if($answer->question_id==$qid && $answer->answer==$ans)
	  {
	    $count++;
	  
	  }
	
	
	}   
	
	return $count;
   


}

 
 function getStates($index=null)
 {
 
    $ststes=array();
     $states["AL"]='Alabama';
	 $states["AK"]='Alaska';
	 $states["AZ"]='Arizona';
	 $states["AR"]='Arkansas';
	 $states["CA"]='California';
	 $states["CO"]='Colorado';
	 $states["CT"]='Connecticut';
	 $states["DE"]='Delaware';
	 $states["DC"]='District Of Columbia';
	 $states["FL"]='Florida';
	 $states["GA"]='Georgia';
	 $states["HI"]='Hawaii';
	 $states["IA"]='Idaho';
	 $states["IL"]='Illinois';
	 $states["IN"]='Indiana';
	 $states["IA"]='Iowa';
	 $states["KS"]='Kansas';
	 $states["KY"]='Kentucky';
	 $states["LA"]='Louisiana';
	 $states["ME"]='Maine';
	 $states["MD"]='Maryland';
	 $states["MA"]='Massachusetts';
	 $states["MI"]='Michigan';
	 $states["MN"]='Minnesota';
	 $states["MS"]='Mississippi';
	 $states["MO"]='Missouri';
	 $states["MT"]='Montana';
	 $states["NE"]='Nebraska';
	 $states["NV"]='Nevada';
	 $states["NH"]='New Hampshire';
	 $states["NJ"]='New Jersey';
	 $states["NM"]='New Mexico';
	 $states["NY"]='New York';
	 $states["NC"]='North Carolina';
	 $states["ND"]='North Dakota';
	 $states["OH"]='Ohio';
	 $states["OK"]='Oklahoma';
	 $states["OR"]='Oregon';
	 $states["PA"]='Pennsylvania';
	 $states["RI"]='Rhode Island';
	 $states["SC"]='South Carolina';
	 $states["SD"]='South Dakota';
	 $states["TN"]='Tennessee';
	 $states["TX"]='Texas';
	 $states["UT"]='Utah';
	 $states["VT"]='Vermont';
	 $states["VA"]='Virginia';
	 $states["WA"]='Washington';
	 $states["WV"]='West Virginia';
     $states["WI"]='Wisconsin';
     $states["WY"]='Wyoming';
		  


    if($index)  
	  return $states[$index];
	else
      return $states;	
	  
	  
 
 }
 
 

function getUserTradingPhotos($userid,$limit=null)
{
$answers=getUserAnswers($userid);
$index=getTypeIndex($answers[3]);
 global $wpdb;
 $ptable=$wpdb->prefix."user_photos";
 $query="select * from $ptable where status!=2 order by created desc";
 $results=$wpdb->get_results($query);
 
 $list=array();
 if($results)
 foreach($results as $result)
   { 
      if($result->category_tags)
	  {
	      $cats=explode('-',$result->category_tags);
		  if(count($cats)>0)
		  foreach($cats as $cat)
		      $list[$cat][]=$result;
		
		
	  
	  }
   
    
   
   }

  $photos=$list[$index];


  $new_list=array();
  $i=1;
   if($photos)
   foreach($photos as $photo)
   {
     $new_list[]=$photo;  

	 if($i==$limit)
	   break;
	 $i++;
    }	 
  
 return $new_list;

}



function getFollowerActivities($userid,$limit=null)
{
$followers=getFollowers($userid);

$list=array();
if(count($followers)>0)
{
  foreach($followers as $follower)
  {
    $list[]=$follower->user_id;
  
  }
  }
  else
   return false;



 $feeds= getFollowersFeeds($list,$limit,false);

 return $feeds;

}


function getTypeIndex($cat)
{
   switch($cat)
   {
     case 179:
	          $index=1;
	        	break;
   case 180:
	          $index=2;
	        	break;
   case 250:
	          $index=3;
	        	break;
   case 188:
	          $index=4;
	        	break;
   case 181:
	          $index=5;
	        	break;
   case 187:
	          $index=8;
	        	break;
   case 189:
	          $index=9;
	        	break;
  
   
   
   }
   
   return $index;



}



   function getVisitorIp() {

  require_once(dirname(__FILE__) ."/userip/ip.codehelper.io.php");
    require_once(dirname(__FILE__) ."/userip/php_fast_cache.php");

             $_ip = new ip_codehelper();

             $real_client_ip_address = $_ip->getRealIP();

			 return $real_client_ip_address;
    }
	
	
	
	function getVisitorLocations($ip=null)
	{
	

          require_once(dirname(__FILE__) ."/userip/ip.codehelper.io.php");
          require_once(dirname(__FILE__) ."/userip/php_fast_cache.php");

             $_ip = new ip_codehelper();

             $real_client_ip_address = $_ip->getRealIP();
			
			if($ip)
			 $visitor_location       = $_ip->getLocation($ip);
			 else
             $visitor_location       = $_ip->getLocation($real_client_ip_address);

return $visitor_location;


	
	}
	
	
	function getVisitorLocations2($ip=NULL, $asArray=FALSE) {
    if (empty($ip)) {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip = $_SERVER['HTTP_CLIENT_IP']; }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
        else { $ip = $_SERVER['REMOTE_ADDR']; }
    }
    elseif (!is_string($ip) || strlen($ip) < 1 || $ip == '127.0.0.1' || $ip == 'localhost') {
        $ip = '8.8.8.8';
    }

    $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
    $i = 0; $content; $curl_info;

    while (empty($content) && $i < 5) {
        $ch = curl_init();
        $curl_opt = array(
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_URL => $url,
            CURLOPT_TIMEOUT => 1,
            CURLOPT_REFERER => 'http://' . $_SERVER['HTTP_HOST'],
        );
        if (isset($_SERVER['HTTP_USER_AGENT'])) $curl_opt[CURLOPT_USERAGENT] = $_SERVER['HTTP_USER_AGENT'];
        curl_setopt_array($ch, $curl_opt);
        $content = curl_exec($ch);
        if (!is_null($curl_info)) $curl_info = curl_getinfo($ch);
        curl_close($ch);
    }

    $araResp = array();
    if (preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs)) $araResp['city'] = trim($regs[1]);
    if (preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs)) $araResp['state'] = trim($regs[1]);
    if (preg_match('{<li>Country : ([^<]*)}i', $content, $regs)) $araResp['country'] = trim($regs[1]);
    if (preg_match('{<li>Zip or postal code : ([^<]*)</li>}i', $content, $regs)) $araResp['zip'] = trim($regs[1]);
    if (preg_match('{<li>Latitude : ([^<]*)</li>}i', $content, $regs)) $araResp['latitude'] = trim($regs[1]);
    if (preg_match('{<li>Longitude : ([^<]*)</li>}i', $content, $regs)) $araResp['longitude'] = trim($regs[1]);
    if (preg_match('{<li>Timezone : ([^<]*)</li>}i', $content, $regs)) $araResp['timezone'] = trim($regs[1]);
    if (preg_match('{<li>Hostname : ([^<]*)</li>}i', $content, $regs)) $araResp['hostname'] = trim($regs[1]);

    $strResp = ($araResp['city'] != '' && $araResp['state'] != '') ? ($araResp['city'] . ', ' . $araResp['state']) : 'UNKNOWN';

    return $asArray ? $araResp : $strResp;
}



function getBrandLikes($brand_id)
{
$products=get_brand_products($brand_id);

$likes=0;
if(count($products)>0)
 foreach($products as $product)
 {
    $likes=$likes + getTotalLike($product->id,'product');
 
 
 }

return $likes;
}


function getBrandComments($brand_id)
{

$products=get_brand_products($brand_id);
$comments=0;
if(count($products)>0)
 foreach($products as $product)
 {
    $pcomments= getMyComments($product->id);
 $comments=$comments + count($pcomments);
   
 }

return $comments;
}
//returns the thumbnail path of brands.
function getBrandThumbPath($brand_userid,$thumb='thumb')
{

$brand=get_brand_info($brand_userid);
//$year=date('Y',$brand->created);
$year=$brand->photo_update_year;
if($brand->thumb=="")
          $thumbpath='http://hairlibrary.com/wp-content/uploads/brandphoto/thumb.png';
	  else
          $thumbpath='http://hairlibrary.com/wp-content/uploads/brandphoto/'.$year.'/'.$brand->$thumb;
		  
return 	$thumbpath;	  
}




function getFeaturedBrand()
{
$brandids=array();
$day=date('d');
$option=get_option('rand_feature_brands');

if($option && $option!="")
{
  $options=explode('_',$option);

   if($options[0]==$day)
   {
      $brandids[]=$options[1];
      $brandids[]=$options[2];
   
   }else
   {
   
   $brands=getRandomBrands();
$brandids[]=$brands[0]->id;
$brandids[]=$brands[1]->id;
$option=$day.'_'.$brandids[0].'_'.$brandids[1];
update_option('rand_feature_brands',$option);
   
   }



}else
{
$brands=getRandomBrands();
$brandids[]=$brands[0]->id;
$brandids[]=$brands[1]->id;
$option=$day.'_'.$brandids[0].'_'.$brandids[1];

update_option('rand_feature_brands',$option);
}


return $brandids;

}

function getRandomBrands($limit=2)
{

global $wpdb;
  $btable=$wpdb->prefix."brand_info";
   $query="select * from $btable where status=2 ORDER BY RAND() limit $limit";
   $results=$wpdb->get_results($query);
   return $results;


}

   function getBrandDetails($id)
   {
   
     global $wpdb;

  	      $table=$wpdb->prefix."brand_info";

          $query="select * from ".$table.' where `id`='.$id;

  	      $result=$wpdb->get_row($query);



  	    return $result;
   
   
   
   }
   
   
function getBrandSlug($userid)
{
  global $wpdb;

  	      $table=$wpdb->prefix."brand_info";

          $query="select * from ".$table." where `user_id`=".$userid;

  	      $result=$wpdb->get_row($query);



  	    return $result->company_slug;
   
  
}

//returns brand id by brand slug
function getBrandIDBySlug($slug)
{
  global $wpdb;

  	      $table=$wpdb->prefix."brand_info";

          $query="select * from ".$table." where `company_slug`='".$slug."'";

  	      $result=$wpdb->get_row($query);



  	    return $result->user_id;
   
  
}




function getTotalSalesValue($brandid,$time,$iscount=false)
{
global $wpdb;
 $botable=$wpdb->prefix."brand_orders";
 $query="select * from $botable where brand_id=$brandid and order_time>$time";
$results=$wpdb->get_results($query);


$total=0;
$quantity=0;
if(count($results)>0)
  foreach($results as $result)
  {
    $quantity=$quantity+$result->qty;
    $total=$total+$result->line_total;
  }
  if($iscount)
  return $quantity;
  else
  return $total;
}


function getCategoryBreadLink($name)
{
   switch($name)
   {
     case 'Hair Spray':
	   $catname="styling-product";
	   break;
	   
	   case 'Hair Color':
	   $catname="hair-color";
	   break;
   
     default:
	       $catname= strtolower($name);
   
  
   
   
   
   }
     return 'http://hairlibrary.com/'.$catname;
}

function getBrandBreadLink($brandid)
{
 $brand=get_brand_info($brandid);
  echo '<a href="http://hairlibrary.com/brand/?n='.getBrandSlug($brandid).'">'.getFormatedDes($brand->company_name).'</a>';
}

function getConditionNames(){
$conditionarNames = array(); 
$conditionarNames['o_scalp'] = "Oily";
$conditionarNames['dry_scalp'] = "Dry Itchy";
$conditionarNames['p_bald'] = "Pattern Baldness";
$conditionarNames['alopecia'] = "Alopecia";
$conditionarNames['sp_ends'] = "Split Breakage";
return $conditionarNames;
}

function current_page_url() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}



 //returns all brand those are allow for drop shipping
function getAllDropShipBrands()
{

global $wpdb;
  $btable=$wpdb->prefix."brand_info";
   $query="select * from $btable where allow_dropshipping='Yes'";
   $results=$wpdb->get_results($query);
   foreach($results as $result)
   {
     $first_alpha=strtolower(substr($result->company_name,0,1));
     $brands[$first_alpha][]=$result;
   }

   return $brands;

}


function getAllProductsByBrand($post_author)
{
global $wpdb;
  $table=$wpdb->prefix."posts";
  $query="select * from $table where post_type='product' and post_status='publish' and post_author=$post_author";
   $results=$wpdb->get_results($query);
   return $results;


}
