<?php
//require_once ABSPATH.'wp-content/uploads/barcode/';
//require(ABSPATH. '/wp-content/themes/456shop/brand-admin/templates/functions.php' );

function saveAdminEditProduct($post,$filedata)
{
//saveEditProduct($post,$filedata);


if($post['product_id']>0)
{

$pid=$post['product_id'];

// For barcode and upc code only

update_post_meta($pid, 'upc', $post['upccode']);
 uploadBarcodeImage($post,$filedata);


$postdata = array(
  'ID'    => $pid,
  'post_content'   => $post['description'],
   'post_author'   => $post['post_author'],
  'post_excerpt'   => $post['short_description'], 
  'post_title'     => $post['title'],
  'post_name'  => $post['slug'],
  'post_status'    => 'publish'
);  

 wp_update_post($postdata);

 update_post_meta($pid, 'instructions', $post['instructions']);
 update_post_meta($pid, 'ingredients', $post['ingredients']);
 update_post_meta($pid, 'brand_description', $post['brand_description']);
  update_post_meta($pid, 'product_consistency', $post['product_consistency']); 
 update_post_meta($pid, '_weight', $post['number_of_ounces']);
 update_post_meta($pid, '_regular_price', $post['price']);
 update_post_meta($pid, '_sale_price', $post['price']);
 update_post_meta($pid, '_price', $post['price']);
 //update_post_meta($pid, 'upc', $post['upccode']);
 update_post_meta($pid, 'affiliate_link', $post['affiliate_link']);
 update_post_meta($pid, 'product_video_embed', $post['video_embed']);
   update_post_meta($pid, '_stock',$post['no_products']); 
   update_post_meta($pid, 'quantity_products', $post['no_products']); 
 update_post_meta($pid, 'type_of_product', $post['type_of_product']); 
 $t_value=implode(',',$post['type_of_hair']);
  update_post_meta($pid, 'type_of_hair', $t_value); 
 update_post_meta($pid, 'is_organic', $post['is_organic']); 
 update_post_meta($pid, 'product_tags', $post['product_tags']);
 
 wp_set_post_tags( $pid, $post['product_tags']);
 
 //uploadBarcodeImage($post,$filedata);
 
 //updateAge($pid,$post['ageRange']);
 
 adUpdateAttributes($pid,$post);
 adUpdateProductTaxonomy($pid,$post);
 
 

 
 
return true;
}

}





function adUpdateAttributes($productid,$post)
{
   global $wpdb;
    $qatable=$wpdb->prefix."question_answers";
    $ages=implode(',',$post['ageRange']);
	$des=implode(',',$post['hairDes']);
	$stys=implode(',',$post['intStyl']);
	$conds=implode(',',$post['hairCond']);
	$pros=implode(',',$post['hairProc']);
	$texs=implode(',',$post['hairTex']);
	$lenth=implode(',',$post['hairLenth']);
	$demogrph=implode(',',$post['demogrph']);
	
  
  $wpdb->query(" UPDATE $qatable SET answer ='".$ages."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=12");
  $wpdb->query(" UPDATE $qatable SET answer ='".$des."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=6");
  $wpdb->query(" UPDATE $qatable SET answer ='".$stys."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=9");
  $wpdb->query(" UPDATE $qatable SET answer ='".$conds."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=7");
  $wpdb->query(" UPDATE $qatable SET answer ='".$pros."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=8");
  $wpdb->query(" UPDATE $qatable SET answer ='".$texs."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=4");
  $wpdb->query(" UPDATE $qatable SET answer ='".$lenth."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=5");
  $wpdb->query(" UPDATE $qatable SET answer ='".$demogrph."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=2");
  $wpdb->query(" UPDATE $qatable SET answer ='".$post['gender']."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=1");
  $wpdb->query(" UPDATE $qatable SET answer ='".$post['city']."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=10");
  $wpdb->query(" UPDATE $qatable SET answer ='".$post['state']."' WHERE object_id = $productid  AND object_type = 'product' AND question_id=11");
 
	
}

function adUpdateProductTaxonomy($pid,$post)
{

  global $wpdb;
  $rtable=$wpdb->prefix."term_relationships";
  $query="select * from $rtable where object_id=$pid";

 $results=$wpdb->get_results($query);
 
  $taxids=array();
  $oldtaxids=array();
  
  $cats=adGetProductPostCats($post);
  $taxids[]=42;
  foreach($cats as $cat)
  {
   $taxids[]=adGetTaxId($cat);
  }
  
   foreach($results as $result)
   {
     if(!in_array($result->term_taxonomy_id,$taxids))
	 {
	    $query="DELETE FROM $rtable WHERE `object_id` = $pid AND `term_taxonomy_id`=$result->term_taxonomy_id";
		//var_dump($query);
	 $wpdb->query($query);
	 }
   
     $oldtaxids[]=$result->term_taxonomy_id;
   
   }
   
   //var_dump($oldtaxids);
   // var_dump($taxids);
     foreach($taxids as $taxid)
   {
     if(count($oldtaxids)<1)
	 {
	 $rdata=array(
         'object_id'=>$pid,
         'term_taxonomy_id'=>$taxid

        );      
	 $wpdb->insert($rtable,$rdata); 
	 }
	 else
	 {
       if(!in_array($taxid,$oldtaxids))
	    {
	      $rdata=array(
         'object_id'=>$pid,
         'term_taxonomy_id'=>$taxid

        );                    
       $wpdb->insert($rtable,$rdata); 
	 
	   }
	    
	 }
    
    
   
   }

}

function adGetTaxId($term)
{
  global $wpdb;
  $ttable=$wpdb->prefix."term_taxonomy";

$object = $wpdb->get_row("SELECT * FROM $ttable WHERE term_id = $term");
$count=$object->count;
$count++;
$taxid=$object->term_taxonomy_id;
$wpdb->update( $ttable, array( 'count' => $count), array( 'term_taxonomy_id' =>$taxid ), array( '%d'), array( '%d' ) );

return $taxid;
}

function adGetProductPostCats($post){

$cats=array();
$types=$post['type_of_hair'];
foreach($types as $type)
{

// Natural Straight
  if($type=='c_ns')
  {
    $cats[]=180;
	if($post['is_organic']=='yes')
    $cats[]=190;
	$cats[]=adGetSubCat1($post['type_of_product']);
  
  }
  //Relaxed straight
  if($type=='c_rs')
  {
    $cats[]=188;
	if($post['is_organic']=='yes')
    $cats[]=206;
	$cats[]=adGetSubCat2($post['type_of_product']);
  
  }
  
  // curly
  if($type=='c_c')
  {
    $cats[]=189;
	if($post['is_organic']=='yes')
    $cats[]=222;
	$cats[]=adGetSubCat3($post['type_of_product']);
  
  }
  
  //Dreds
  if($type=='c_d')
  {
    $cats[]=179;
	if($post['is_organic']=='yes')
    $cats[]=194;
	$cats[]=adGetSubCat4($post['type_of_product']);
  
  }
  
  
   //Braids
  if($type=='c_b')
  {
    $cats[]=250;
	if($post['is_organic']=='yes')
    $cats[]=258;
	$cats[]=adGetSubCat5($post['type_of_product']);
  
  }

  



}

return $cats;

}


// Natural Straight
function adGetSubCat1($type)
{
   
   switch($type)
   {
       case 's_c':
	         $sub_cat=177;
			  break;
			  
	   case 's_s':
	         $sub_cat=176;
			  break;
	    case 's_hs':
	         $sub_cat=225;
		
			  break;
        
         case 's_g':
	         $sub_cat=226;
			  break;

         case 's_mt':
	         $sub_cat=227;
			  break;
        case 's_hc':
	         $sub_cat=228;
			  break;

      case 's_o':
	         $sub_cat=229;
			  break;
    
    
     case 's_hr':
	         $sub_cat=230;
			  break;	
			  
	 case 's_tools':
	       $sub_cat=263;
			break;	
			
	case 's_hair_ext':		
			$sub_cat=300;
			break;	
    	
     case 's_wigs':
	       $sub_cat=299;
			break;
			
	 case 's_irons':
	       $sub_cat=298;
			break;
	
	case 's_hair_acc':
	       $sub_cat=297;
			break;
	
     case 's_relaxer':
	       $sub_cat=296;
			break;
	 case 's_texture':
	       $sub_cat=295;
			break;	
     case 's_art_tools':
	       $sub_cat=2223;
			break;				
	 case 's_hair_loss':
	       $sub_cat=2224;
			break;	
   }
   
    return $sub_cat;
}



// Reluxed Straight

function adGetSubCat2($type)
{
   
   switch($type)
   {
       case 's_c':
	         $sub_cat=205;
			  break;
			  
	   case 's_s':
	         $sub_cat=207;
			  break;
	    case 's_hs':
	         $sub_cat=231;
			  break;
        
         case 's_g':
	         $sub_cat=232;
			  break;

         case 's_mt':
	         $sub_cat=233;
			  break;
        case 's_hc':
	         $sub_cat=234;
			  break;

      case 's_o':
	         $sub_cat=235;
			  break;
    
    
     case 's_hr':
	         $sub_cat=236;
			  break;	
    	
    case 's_tools':
	       $sub_cat=274;
			break;	
			
	case 's_hair_ext':		
			$sub_cat=306;
			break;	
    	
     case 's_wigs':
	       $sub_cat=305;
			break;
			
	 case 's_irons':
	       $sub_cat=304;
			break;
	
	case 's_hair_acc':
	       $sub_cat=303;
			break;
	
     case 's_relaxer':
	       $sub_cat=302;
			break;
	 case 's_texture':
	       $sub_cat=301;
			break;		
			
    case 's_art_tools':
	       $sub_cat=2227;
			break;				
	 case 's_hair_loss':
	       $sub_cat=2228;
			break;	
   }
     return $sub_cat;
}

//Curly
function adGetSubCat3($type)
{
   
   switch($type)
   {
       case 's_c':
	         $sub_cat=221;
			  break;
			  
	   case 's_s':
	         $sub_cat=223;
			  break;
	    case 's_hs':
	         $sub_cat=237;
			  break;
        
         case 's_g':
	         $sub_cat=238;
			  break;

         case 's_mt':
	         $sub_cat=239;
			  break;
        case 's_hc':
	         $sub_cat=240;
			  break;

      case 's_o':
	         $sub_cat=241;
			  break;
    
    
     case 's_hr':
	         $sub_cat=242;
			  break;	
    	
    case 's_tools':
	       $sub_cat=272;
			break;	
   
   
     case 's_hair_ext':		
			$sub_cat=312;
			break;	
    	
     case 's_wigs':
	       $sub_cat=311;
			break;
			
	 case 's_irons':
	       $sub_cat=310;
			break;
	
	case 's_hair_acc':
	       $sub_cat=309;
			break;
	
     case 's_relaxer':
	       $sub_cat=308;
			break;
	 case 's_texture':
	       $sub_cat=307;
			break;		
	
    case 's_art_tools':
	       $sub_cat=2225;
			break;				
	 case 's_hair_loss':
	       $sub_cat=2226;
			break;	
   
   }
   return $sub_cat;
}

  //Dreads
function adGetSubCat4($type)
{
   
   switch($type)
   {
       case 's_c':
	         $sub_cat=192;
			  break;
			  
	   case 's_s':
	         $sub_cat=191;
			  break;
	    case 's_hs':
	         $sub_cat=243;
			  break;
        
         case 's_g':
	         $sub_cat=244;
			  break;

         case 's_mt':
	         $sub_cat=245;
			  break;
        case 's_hc':
	         $sub_cat=246;
			  break;

      case 's_o':
	         $sub_cat=247;
			  break;
    
    
     case 's_hr':
	         $sub_cat=248;
			  break;	
    	
 case 's_tools':
	       $sub_cat=268;
			break;	
			
			
   case 's_hair_ext':		
			$sub_cat=294;
			break;	
    	
     case 's_wigs':
	       $sub_cat=293;
			break;
			
	 case 's_irons':
	       $sub_cat=292;
			break;
	
	case 's_hair_acc':
	       $sub_cat=291;
			break;
	
     case 's_relaxer':
	       $sub_cat=290;
			break;
	 case 's_texture':
	       $sub_cat=289;
			break;		
				
	 case 's_art_tools':
	       $sub_cat=2221;
			break;				
	 case 's_hair_loss':
	       $sub_cat=2222;
			break;			
			
   
   }
     return $sub_cat;
}


   //Braids
function adGetSubCat5($type)
{
   
   switch($type)
   {
       case 's_c':
	         $sub_cat=253;
			  break;
			  
	   case 's_s':
	         $sub_cat=254;
			  break;
	    case 's_hs':
	         $sub_cat=257;
			  break;
        
         case 's_g':
	         $sub_cat=256;
			  break;

         case 's_mt':
	         $sub_cat=260;
			  break;
        case 's_hc':
	         $sub_cat=261;
			  break;

      case 's_o':
	         $sub_cat=259;
			  break;
    
    
     case 's_hr':
	         $sub_cat=262;
			  break;	
     case 's_tools':
	       $sub_cat=266;
			break;		

	case 's_hair_ext':		
			$sub_cat=283;
			break;	
    	
     case 's_wigs':
	       $sub_cat=284;
			break;
			
	 case 's_irons':
	       $sub_cat=285;
			break;
	
	case 's_hair_acc':
	       $sub_cat=286;
			break;
	
     case 's_relaxer':
	       $sub_cat=287;
			break;
	 case 's_texture':
	       $sub_cat=288;
			break;		
	
    case 's_art_tools':
	       $sub_cat=2220;
			break;				
	 case 's_hair_loss':
	       $sub_cat=414;
			break;	
   }
     return $sub_cat;
}






function  uploadBarcodeImage($post,$filedata=null)
{
    global $wpdb;
   $mixer=null;

   if($filedata)
   {
   
   	 $path=ABSPATH.'wp-content/uploads/barcode/';
     $mixer=rmAdminUploadImage($filedata,$path,'barcode-picture');
    
       $imagepath=$mixer.'_'.$filedata['barcode-picture']['name'];
        $thumbpath ="thumb_". $mixer.'_'. $filedata['barcode-picture']['name'];
        
   
   }


 if($mixer)
 {
 
  update_post_meta($post['product_id'], 'product_barcode_thumb', $thumbpath);
  update_post_meta($post['product_id'], 'product_barcode_image', $imagepath);
 }



 return true;
 	
  


}






function getAdminTaxId($term)
{
  global $wpdb;
  $ttable=$wpdb->prefix."term_taxonomy";

$object = $wpdb->get_row("SELECT * FROM $ttable WHERE term_id = $term");
$count=$object->count;
$count++;
$taxid=$object->term_taxonomy_id;
$wpdb->update( $ttable, array( 'count' => $count), array( 'term_taxonomy_id' =>$taxid ), array( '%d'), array( '%d' ) );

return $taxid;
}


function insertAdminAttachment($file_handler,$post_id,$setthumb='false') {
 
// check to make sure its a successful upload
if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
 
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');
 
$attach_id = media_handle_upload( $file_handler, $post_id );
 
if ($setthumb)
 update_post_meta($post_id,'_thumbnail_id',$attach_id);
return $attach_id;
} 


function getAdminUserAnswers($userid)
{
   global $wpdb;
  $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where object_id=$userid and object_type='user'";
  
  $results=$wpdb->get_results($query);
  
  $ans=array();
  if($results)
  {
    foreach($results as $result)
    $ans[$result->question_id]=preg_replace('/\s+/','',$result->answer);
  }

  return $ans;



}


function getAdminProdcutAnswers($pid)
{
   global $wpdb;
  $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where object_id=$pid and object_type='product'";
  
  $results=$wpdb->get_results($query);
  
  $ans=array();
  if($results)
  {
    foreach($results as $result)
    $ans[$result->question_id]= preg_replace('/\s+/','',$result->answer);
  }

  return $ans;



}

function get_admin_ans_count($qid,$ans)
{
   global $wpdb;
  $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where question_id=$qid and object_type='product'";
  $results=$wpdb->get_results($query);

  $count=0;
  foreach($results as $result)
  {

  $anss=explode(',',preg_replace('/\s+/','',$result->answer));
     if(in_array($ans,$anss))
	  $count++;
  
  }
  return $count;
  


}

function getAdminTerm($termid)
{
   global $wpdb;
  $ttable=$wpdb->prefix."terms";
  $query="select * from $ttable where term_id=$termid";
 $term=$wpdb->get_row($query);
 return $term;
}


function getAdminMatchingProducts($userid)
{
  $answers=getAdminUserAnswers($userid); 
 // var_dump($userid);
//var_dump($answers);
  global $wpdb;
  $trtable=$wpdb->prefix."term_relationships";
  $tttable=$wpdb->prefix."term_taxonomy";
  $ptable=$wpdb->prefix."posts";
 
  $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id =$answers[3] and a.post_status='publish'";
  
  
  $results=$wpdb->get_results($query);
	
$productids=array();

if($results)
  foreach($results as $result)
  {
   
   $pans=getAdminProdcutAnswers($result->id);
    if($pans)
	 {
	   $is_p=true;
	   foreach($answers as $key=>$ans)
	    {
		
		  if(!is_match_ans($key,$ans,$pans[$kay]))
		  {
		    $is_p=false;
			break;
		  
		  }
		
		
		
		
		
		}
		
			 if(is_p)
	  $productids[]=$result->id;
	 
	 }
	 
	 
	 


  }
 
return $productids;

}


function is_admin_match_ans($q_id,$u_ans,$p_ans)
{
  if($qid==10 || $qid==11 || $qid==12 || $qid==2 || $qid==9)
  {
   return true;
  }
  
  if($qid==1)
     {
	   if($p_ans[1]=='both')
	    return true;
	 
	 }
  
  $valid=false;
  
  $anslist=explode(',',$p_ans);
  if($anslist)
  {
    foreach($anslist as $ans)
	{
	   if($ans==$u_ans)
	   {
	    $valid=true;
		
		break;
      }
	
	}
	
	return $valid;
  }
  
  
  

}

function  updateAdminUserHairStyle($post)
{
   updateStyle($post['user_id'],3,$post['cat']);
   updateStyle($post['user_id'],4,$post['hairTex']);
   updateStyle($post['user_id'],5,$post['hairLenth']);
   updateStyle($post['user_id'],6,$post['hairDes']);
   updateStyle($post['user_id'],7,$post['hairCond']);
   updateStyle($post['user_id'],8,$post['hairProc']);
 
    

}

function updateAdminStyle($user_id,$q_id,$value)
{
 global $wpdb;
  $table=$wpdb->prefix."question_answers";
  $where=array('question_id'=>$q_id,'object_id'=>$user_id,'object_type'=>'user');
  $data=array('answer'=>$value);
  $wpdb->update( $table, $data, $where); 

}




function  updateAdminUserProfile($post,$filedata=null)
{
    global $wpdb;
   $mixer=null;

   if($filedata)
   {
   
   	 $path=ABSPATH.'wp-content/uploads/userphoto/'.$post['user_id'].'/';
     $mixer=rmAdminUploadImage($filedata,$path);
    
       $imagepath=$mixer.'_'.$filedata['file']['name'];
        $thumbpath ="thumb_". $mixer.'_'. $filedata['file']['name'];
        
   
   }


 if($mixer)
 {
  update_user_meta( $post['user_id'], 'user_avatar', $imagepath);
   update_user_meta( $post['user_id'], 'user_thumb', $thumbpath);
 }
 
  update_user_meta( $post['user_id'], 'first_name', $post['first_name']);
  update_user_meta( $post['user_id'], 'last_name', $post['last_name']);
  update_user_meta( $post['user_id'], 'user_bioinfo', $post['about']);
    
  $name=$post['first_name'].' '.$post['last_name'];
  
  $table=$wpdb->prefix."users";
  $where=array('ID'=>$post['user_id']);
  $data=array('display_name'=>$name);
  $wpdb->update( $table, $data, $where); 


 return true;
 	
  


}





 function rmAdminUploadImage($filedata,$path,$file='file')
 {
 
 
      $image =$filedata[$file]["name"];

	     $uploadedfile = $filedata[$file]['tmp_name'];
     
 
 	    if ($image) 
 	    {
 	
 		     $filename = stripslashes($filedata[$file]['name']);
 	
  		     $extension = rmAdminGetExtension($filename);
 		     $extension = strtolower($extension);
		
		
             if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		     {
		
 		        	return false;
 		     }
 		    else
 		     {

                 if($extension=="jpg" || $extension=="jpeg" )
                  {
                      $uploadedfile = $filedata[$file]['tmp_name'];
                      $src = imagecreatefromjpeg($uploadedfile);

                  }

                  else if($extension=="png")
                  {
                     $uploadedfile = $filedata[$file]['tmp_name'];
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

      

         if(!is_dir($path))
         {
          mkdir($path, 0755);
          
         } 

        
          $mixer=time();
       
          $imagepath=$path.$mixer.'_'.$filedata[$file]['name'];
          $thumbpath = $path."thumb_". $mixer.'_'. $filedata[$file]['name'];
        
         


           imagejpeg($tmp,$thumbpath,100);
           imagejpeg($src,$imagepath,100);
        

            imagedestroy($src);
            imagedestroy($tmp);
           
 
 
 
 
 		     }

 	  
 	    
 	    }
 	    
 	      return $mixer;
 }

 function rmAdminGetExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 
 function resetAdminPassword($post,$user)
 {

    if(wp_check_password( $post['old_pass'], $user->data->user_pass, $user->ID))
	{
	
	  wp_set_password($post['new_pass'], $user->ID );
	  /* wp_cache_delete($user_ID,'users');
       wp_cache_delete($user->user_login,'userlogins');
       wp_logout();
	   wp_signon(array('user_login'=>$user->user_login,'user_password'=>$post['new_pass']),false);*/
	return true;
	
	}
	
	
	return false;
 
 
 }
 
 function getAdminProducts($userid=null, $orderby="post_title ASC",$status='publish')
 {
 global $wpdb;
 $ptable=$wpdb->prefix."posts";
 if($userid>0)
  $query="SELECT * FROM $ptable WHERE post_author=$userid and post_status='".$status."' and post_type='product' order by $orderby";
  else
  $query="SELECT * FROM $ptable WHERE post_status='".$status."' and post_type='product' order by $orderby";
  
  $results=$wpdb->get_results($query);
  return $results;
 
 }
 
  function getAdminAgedProducts($start)
 {
  if($start<30)
   {
      if($start==0)
       $end=5;
	 else
       $end=$start+4;
  }
  else
   $end=1000000;
   $products=getAdminProducts();
   $results=array();
   foreach($products as $product)
   {
      $date=time()-strtotime($product->post_date);
	  $day=floor($date/86400);
	  
	  
      if($day>=$start && $day<=$end)
	  {
	    $results[]=$product;
	  
	  }
	
	
	}  
   return $results;
 
 }
 

   function getAdminProduct($pid)
 {
 global $wpdb;
 $ptable=$wpdb->prefix."posts";
 
  $query="SELECT * FROM $ptable WHERE ID=$pid";
  
 $result=$wpdb->get_row($query);
   return $result;
 
 }
 
  function getAdminProductTitle($pid)
 {
 global $wpdb;
 $ptable=$wpdb->prefix."posts";
 
  $query="SELECT * FROM $ptable WHERE ID=$pid";
  
 $result=$wpdb->get_row($query);
   return $result->post_title;
 
 }
 
 function getAdminMyCustomers($brandid=null,$pid=null)
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


function getAdminMyCustomersAnswer($brandid=null,$pid=null)
{
 global $wpdb;
$customers=getAdminMyCustomers($brandid=null,$pid=null);
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


function get_admin_user_ans_count($qid,$ans,$anslist=null) 
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


function get_admin_aged_count($start,$end,$products=null) 
{
 if(!$products)
   return 0;
  $count=0;
   foreach($products as $product)
   {
      $date=time()-strtotime($product->post_date);
	  $day=floor($date/86400);
	  
	  
      if($day>=$start && $day<=$end)
	  {
	    $count++;
	  
	  }
	
	
	}   
	
	return $count;
   


}





 function countAdminActiveProducts($brandid)
 {
   return count(getAdminMyProducts($brandid));
 
 }
 
function countAdminSaleProducts($brandid)
{

 global $wpdb;
 $ptable=$wpdb->prefix."posts";
 
  $query="SELECT * FROM $ptable WHERE post_type='shop_order' and post_author=$brandid";
  
 $results=$wpdb->get_results($query);
return count($results);
}
 
 function lastAdminOrderProducts($brandid)
{

 global $wpdb;
 $ptable=$wpdb->prefix."posts";
 $otable=$wpdb->prefix."woocommerce_order_itemmeta";
 
  //$query="SELECT * FROM $ptable WHERE post_type='shop_order' and post_author=$brandid order by post_date limit 1";
  $query="SELECT A.*, B.order_item_id as orderitem FROM $ptable as A left join $otable as B on A.ID=B.meta_value WHERE A.post_type='product' and A.post_author=$brandid order by B.order_item_id DESC limit 1";
  
 $result=$wpdb->get_row($query);

 if($result)
 {
     $query="SELECT * FROM $otable WHERE order_item_id=$result->orderitem and meta_key='_qty'";
	 $result2=$wpdb->get_row($query);
 }
 
$result->itemnumbers=$result2->meta_value;
 
  return $result;
}
 
 function getAdminProductDetailInfo($pid=null)
 {
     if(!$pid)
	  return false;
      global $wpdb;
      $ptable=$wpdb->prefix."posts";
 
      $query="SELECT * FROM $ptable WHERE ID=$pid";
  
      $result=$wpdb->get_row($query);
   $result->instructions=get_post_meta($pid,'instructions',true);
   $result->ingredients=get_post_meta($pid,'ingredients',true);
   $result->brand_description=get_post_meta($pid,'brand_description',true);
   $result->weight=get_post_meta($pid,'_weight',true);
   $result->product_consistency=get_post_meta($pid,'product_consistency',true);
   $result->type_of_product=get_post_meta($pid,'type_of_product',true);
   $result->is_organic=trim(get_post_meta($pid,'is_organic',true));
   $result->price=get_post_meta($pid,'_price',true);
   $result->quantity_products=get_post_meta($pid,'quantity_products',true);
   $result->upc=get_post_meta($pid,'upc',true);
   $result->stock=get_post_meta($pid,'_stock',true);
   $result->type_of_hair=get_post_meta($pid,'type_of_hair',true);
   $result->barcode_image=get_post_meta($pid,'product_barcode_thumb',true);
    $result->affiliate_link=get_post_meta($pid,'affiliate_link',true);
   $result->product_tags=get_post_meta($pid,'product_tags',true);
    $result->video=get_post_meta($pid,'product_video_embed',true);
  // $val=get_post_meta($pid,'type_of_hair',true);
  // var_dump($val);
 //  exit;
 
 $result->ans=getAdminProdcutAnswers($pid);

 return $result;
 
 
 }
 
 
function getAdminTypeProducts($catids=null,$limit=null)
{
  global $wpdb;
  $trtable=$wpdb->prefix."term_relationships";
  $tttable=$wpdb->prefix."term_taxonomy";
  $ptable=$wpdb->prefix."posts";
  if($catids)
  {
  $cats=implode(',',$catids);
  $query="SELECT a.* FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id IN ($cats) and a.post_type='product' and a.post_status='publish' group by a.ID  order by a.post_date DESC";
  }else
  {
   $query="SELECT a.* as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE a.post_type='product' and a.post_status='publish' group by a.ID  order by a.post_date DESC";
  }
 if($limit)
  $query=$query." limit $limit";
$results=array();
 $results=$wpdb->get_results($query);

 return $results;
}

function getAdminTypeProductsCount($catid)
{
$result=array();
 $args=getProductCategoryIds($catid);
 $result=getAdminTypeProducts($args);

 //exit;
 return count($result);
}
 

 
 function getAdminProdcutCountByCategory($catids)
 {
 
   $result=getAdminTypeProducts($catids);
 return count($result);
 }
 
 
 
 function getProductCategoryIds($catid)
 {
 
		   switch($catid)
				{

				case 250:
				//Braids
			
					$args=array(253,254,259,256,260,257,261,265);
					
					break;
					
				case 179:
				//Dreads
			
					$args=array(192,191,247,244,245,243,246,267);  
					break;
						
				case 181:
				//Hair Extension
					
			
					$args=array(196,195,276,277,278,279,280,269); 
					break;
						
				case 180:
				//Natural Hair
					
					
					$args=array(177,176,229,226,227,225,228,264);  
					
					break;
						
				case 189:
				//Permed Curly Hair
					
					
					$args=array(221,223,241,238,239,237,240,271);   
					break;
						
				case 188:
				//Relaxed Hair
					
					
					$args=array(205,207,235,232,233,231,234,273);   
					break;
																
				default:
					  
					$args=array(177,176,229,226,227,225,228,264);  						
						
						
				}	
				
				return $args;
				
 }
 
 
 
 
function getAdminConsumerCount($qid,$ans)
{
   global $wpdb;
  $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where question_id=$qid and object_type='user' and answer='".$ans."'";
  
  $results=$wpdb->get_results($query);
 
  return count($results);



}


// get all orders 
 function getAdminAllOrders($status="completed",$day=0)
 {

   // if(!$user_id)
      //  return false;
    
    $orders=array();//order ids
     
    $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',
        'tax_query'=>array(
                array(
                    'taxonomy'  =>'shop_order_status',
                    'field'     => 'slug',
                    'terms'     =>$status
                    )
        )  
    );
    $today = getdate();
	if($day==1)
	{
	
	 $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',
        'tax_query'=>array(
                array(
                    'taxonomy'  =>'shop_order_status',
                    'field'     => 'slug',
                    'terms'     =>$status
                    )
        ),
		'date_query' => array(
		array(
			'year'  => $today["year"],
			'month' => $today["mon"],
			'day'   => $today["mday"],
		),
	)
		
    );
	
	}
	else if($day==7)
	{
	
	 $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',
        'tax_query'=>array(
                array(
                    'taxonomy'  =>'shop_order_status',
                    'field'     => 'slug',
                    'terms'     =>$status
                    )
        ),
		'date_query' => array(
		array(
			'year' => date('Y'),
			'week' => date('W'),
		   )
	   )
		
    );
	
	}
	else if($day==30)
	{
	
	 $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',
        'tax_query'=>array(
                array(
                    'taxonomy'  =>'shop_order_status',
                    'field'     => 'slug',
                    'terms'     =>$status
                    )
        ),
		'date_query' => array(
		array(
			'year'  => $today["year"],
			'month' => $today["mon"]
		),
	)
		
    );
	
	}
	else if($day==365)
	{
	
	 $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',
        'tax_query'=>array(
                array(
                    'taxonomy'  =>'shop_order_status',
                    'field'     => 'slug',
                    'terms'     =>$status
                    )
        ),
		'date_query' => array(
		array(
			'year'  => $today["year"]
			
		),
	)
		
    );
	
	}
	
    $posts=get_posts($args);
	
	
    //get the post ids as order ids
    $orders=wp_list_pluck( $posts, 'ID' );
    
    return $orders;

 }
 
 
  function getCustomerServiceOrders($day=0)
 {


    $orders=array();//order ids
     
    $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish'
    
    );
     $today = getdate();
	if($day==1)
	{
	
	 $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',
		'date_query' => array(
		array(
			'year'  => $today["year"],
			'month' => $today["mon"],
			'day'   => $today["mday"],
		),
	)
		
    );
	
	}
	else if($day==7)
	{
	
	 $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',
  
		'date_query' => array(
		array(
			'year' => date('Y'),
			'week' => date('W'),
		   )
	   )
		
    );
	
	}
	else if($day==30)
	{
	
	 $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',
 
		'date_query' => array(
		array(
			'year'  => $today["year"],
			'month' => $today["mon"]
		),
	)
		
    );
	
	}
	else if($day==365)
	{
	
	 $args = array(
        'numberposts'     => -1,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',

		'date_query' => array(
		array(
			'year'  => $today["year"]
			
		),
	)
		
    );
	
	}
	
    $posts=get_posts($args);
    $orders=wp_list_pluck( $posts, 'ID' );
    
    return $orders;

 }
 
 function getAdminAllProductsSales($status='completed',$day=0){
 
 $orders=getAdminAllOrders($status,$day);
 if(empty($orders))
   return false;
 
 $order_list='('.join(',', $orders).')';//let us make a list for query
 
 //so we have all the orders made by this user which was successfull
 
 //we need to find the products in these order and make sure they are downloadable
 
 // find all products in these order
 
 global $wpdb;
 $query_select_order_items="SELECT order_item_id as id FROM {$wpdb->prefix}woocommerce_order_items WHERE order_id IN {$order_list}";
 
 $query_select_product_ids="SELECT meta_value as product_id FROM {$wpdb->prefix}woocommerce_order_itemmeta WHERE meta_key=%s AND order_item_id IN ($query_select_order_items)";
 
 $products=$wpdb->get_col($wpdb->prepare($query_select_product_ids,'_product_id'));
 
 return $products;
}

function getProductsAns($products)
{
   $pids=implode(',',$products);
   global $wpdb;
  $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where object_id IN ($pid) and object_type='product'";
  
  $results=$wpdb->get_results($query);


  return $results;



}


 function getAdminTypeProductsSales($qid,$ans,$day=0)
{

$products=getAdminAllProductsSales('completed',$day);

$anslist=array();
if($products)
 $anslist=getProductsAns($products);
 
 if(count($anslist)<1)
   return 10;
  $count=0;
   foreach($anslist as $answer)
   {
   
      $ans_array=explode(',',$answer);
      if($answer->question_id==$qid)
	  {
	     if(in_array($ans,$ans_array))
		 {
	         $count++;
	     }
	  }
	
	
	}   
	
	return $count;
   
}



function getCategoryIds($pid=null)
{
  
    global $wpdb;
    $taxtable=$wpdb->prefix."term_taxonomy";
    $trtable=$wpdb->prefix."term_relationships";
	
  $query="select b.term_id as catid from $trtable as a left join $taxtable as b on a.term_taxonomy_id=b.term_taxonomy_id where a.object_id=$pid";
  
  $results=$wpdb->get_results($query);

  $catids=array();
  if($results)
   foreach($results as $result)
     $catids[]=$result->catid;
  
  
  return $catids;


}



 function getAdminProductsCatSales($cats=array(),$day=0)
{

$products=getAdminAllProductsSales('completed',$day);
$count=0;
if($products)
 {
    foreach($products as $pid)
	{
	  $catids=getCategoryIds($pid);
	   if($catids)
	     foreach($catids as $catid)
		 {
		    if(in_array($catid,$cats))
		    $count++;
		 }
	
	
	}
 
 } 
	if($count==0)
	 return 10;
	return $count;
   
}


function getTotalSales($day=0)
{
  $products=getAdminAllProductsSales('completed',$day);
  if($products)
   return count($products);
  else
   return 0;
   
 

}


 function getAdminLnt($zip){
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
$result_string = file_get_contents($url);
$result = json_decode($result_string, true);
$result1[]=$result['results'][0];
$result2[]=$result1[0]['geometry'];
$result3[]=$result2[0]['location'];
return $result3[0];
}

 
function sortAdminProducts ($array, $index, $order='asc', $natsort=FALSE, $case_sensitive=FALSE) {
if(is_array($array) && count($array)>0) {
foreach(array_keys($array) as $key) $temp[$key]=$array[$key][$index];
if(!$natsort) ($order==’asc’)? asort($temp) : arsort($temp);
else {
($case_sensitive)? natsort($temp) : natcasesort($temp);
if($order!=’asc’) $temp=array_reverse($temp,TRUE);
}
foreach(array_keys($temp) as $key) (is_numeric($key))? $sorted[]=$array[$key] : $sorted[$key]=$array[$key];
return $sorted;
}
return $array;
}
function getAdminOrderStatus($orderid,$productid)
{

 global $wpdb;
 $botable=$wpdb->prefix."brand_orders";
 $query="select * from $botable where order_id=$orderid and product_id=$productid";
$result=$wpdb->get_row($query);

return $result->shipping_status;
}


function getAdAllBrands()
{

           global $wpdb;

  	      $table=$wpdb->prefix."brand_info";

          $query="select * from ".$table." where `status`=2 and user_id>1 order by company_name ASC";

  	      $results=$wpdb->get_results($query);



  	    return $results;

}


function getAdAllDropBrands()
{

           global $wpdb;

  	      $table=$wpdb->prefix."brand_info";

          $query="select * from ".$table." where `status`=2 and `allow_dropshipping`='Yes'";

  	      $results=$wpdb->get_results($query);
$ids=array();
  if(count($results)>0)
   foreach($results as $result)
    $ids[]=$result->user_id;
  	    return $ids;

}



function saveUploadProducts($files){
  	if ($files[csv][size] > 0) {
		$file = $files[csv][tmp_name];
		$handle = fopen($file,"r");        
		$i = 0;			 
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){   
			if($i>0){
				
				$title=$data[0];
				$slug=$data[1];
				$description=$data[2];
				$short_description=$data[3];
				$author=$data[4];		
				$instructions=$data[5];		
				$ingredients=$data[6];		
			//	$brand_description=$data[7];		
				$number_of_ounces=$data[7];		
				$product_consistency=$data[8];		
					
				$type_of_hair=$data[9];	
                $type_of_product=$data[10];					
				$is_organic=$data[11];		
				$price=$data[12];		
				$no_products=$data[13];		
				$upccode=$data[14];		
				$affiliate_link=$data[15];		
				$video_embed=$data[16];		
				$product_tags=$data[17];			
				$gender=$data[18];			
				$city=$data[19];			
				$state=$data[20];			
				$ageRange=$data[21];			
				$demogrph=$data[22];			
				$hairLenth=$data[23];			
				$hairTex=$data[24];			
				$hairProc=$data[25];			
				$hairCond=$data[26];			
				$intStyl=$data[27];			
				$hairDes=$data[28];	
				$attach_id=$data[29];				
				
				if($demogrph=='All')
				$demogrph="Afb,Cau,Euro,Spnsh,Asn,Indn";
				
				$postdata = array(
					'post_author'    => $author,
					'post_content'   => $description,
					'post_excerpt'   => $short_description, 
					'post_status'    => 'draft',
					'post_title'     => $title,
					'post_type'      => 'product'
					
				   
				); 

				$post_id=wp_insert_post($postdata);
               
				$args['type_of_hair']=explode(',',$type_of_hair);
				$args['is_organic']=$is_organic;
				$args['type_of_product']=$type_of_product;
				
				
				$cats=adGetProductPostCats($args);
				  global $wpdb;
				  $rtable=$wpdb->prefix."term_relationships";
				 
				   $rdata=array(
					   'object_id'=>$post_id,
					   'term_taxonomy_id'=>42,

					 );                    
					$wpdb->insert($rtable,$rdata); 
				  
				  foreach($cats as $cat)
				  {
				   $taxid=adGetTaxId($cat);
				  
					  $rdata=array(
					   'object_id'=>$post_id,
					   'term_taxonomy_id'=>$taxid,

					 );                    
					$wpdb->insert($rtable,$rdata); 
				  
				  }
				
				
				
				

 add_post_meta($post_id, 'instructions', $instructions); 
 add_post_meta($post_id, 'ingredients', $ingredients); 
  add_post_meta($post_id, 'brand_description', $brand_description); 
 add_post_meta($post_id, '_weight', $number_of_ounces); 
 add_post_meta($post_id, 'product_consistency', $product_consistency); 
 add_post_meta($post_id, 'type_of_product', $type_of_product); 
 add_post_meta($post_id, 'type_of_hair', $type_of_hair); 
 add_post_meta($post_id, 'is_organic', $is_organic); 
 add_post_meta($post_id, '_regular_price', $price); 
  add_post_meta($post_id, '_sale_price', $price); 
  add_post_meta($post_id, '_price', $price); 
 add_post_meta($post_id, 'quantity_products', $no_products); 
 add_post_meta($post_id, 'upc', $upccode); 
 add_post_meta($post_id, '_stock',$no_products); 
 add_post_meta($post_id, '_visibility', 'visible'); 
 add_post_meta($post_id, '_stock_status','instock'); 
 add_post_meta($post_id, 'total_sales', 0);
 add_post_meta($post_id, '_downloadable', 'no'); 
 add_post_meta($post_id, '_virtual', 'no'); 

 add_post_meta($post_id, '_featured', 'no'); 
 add_post_meta($post_id, '_backorders', 'no'); 
 add_post_meta($post_id, '_manage_stock', no); 

  add_post_meta($post_id, 'affiliate_link', $affiliate_link);   
  add_post_meta($post_id, 'product_video_embed', $video_embed);
  add_post_meta($post_id, 'product_tags', $product_tags);
   add_post_meta($post_id,'_thumbnail_id',$attach_id);  


 
  wp_set_post_tags( $post_id, $product_tags);

  // saveFeed($post_id,'product',$author,'upload');
 

  $qatable=$wpdb->prefix."question_answers";
    
     // save gender 
	 $qdata=array(
	  'question_id'=>1,
       'object_id'=>$post_id,
       'object_type'=>'product',
	   'answer'=>$gender

     );                    
    $wpdb->insert($qatable,$qdata); 
	

	
	 // save city
	 $qdata=array(
	  'question_id'=>10,
       'object_id'=>$post_id,
       'object_type'=>'product',
	   'answer'=>$city

     );                    
    $wpdb->insert($qatable,$qdata); 
	
	
	 // save state
	 $qdata=array(
	  'question_id'=>11,
       'object_id'=>$post_id,
       'object_type'=>'product',
	   'answer'=>$state

     );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>12,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$ageRange

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>2,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$demogrph

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>5,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairLenth

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>4,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairTex

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>8,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairProc

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>7,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairCond

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>9,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$intStyl

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>6,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairDes

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>3,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$type_of_hair

       );                    
    $wpdb->insert($qatable,$qdata); 
					
			}
			$i++;
		}
		
		fclose($handle);     
				
		return true;
  	}
  	else
  	    return false;
}






function saveUploadProducts2($files){
  	if ($files[csv][size] > 0) {
		$file = $files[csv][tmp_name];
		$handle = fopen($file,"r");        
		$i = 0;			 
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){   
			if($i>0){
				echo $data[16].', '.$data[15].', '.$data[3].','.$i.'<br/>';
				
				/*
				$title=$data[0];
				$slug=$data[2];
				$attach_id=$data[3];
				$description=$data[4];
				$short_description=$data[5];
				$author=$data[6];		
				$instructions=$data[7];		
				$ingredients=$data[8];				
				$number_of_ounces=$data[9];		
				$product_consistency=$data[10];		
			    $type_of_product=$data[12];	
				$type_of_hair=$data[11];	
            				
				$is_organic=strtolower(preg_replace('/\s+/','',$data[13]));	
				$price=$data[14];		
				$no_products=$data[15];		
				$upccode=$data[16];		
				$affiliate_link=$data[17];		
				$video_embed=$data[18];		
				$product_tags=$data[19];			
				$gender=strtolower(preg_replace('/\s+/','',$data[20]));	
				$city=$data[21];			
				$state=$data[22];			
				$ageRange=preg_replace('/\s+/','',$data[23]);			
				$demogrph=preg_replace('/\s+/','',$data[24]);			
				$hairLenth=strtolower(preg_replace('/\s+/','',$data[25]));		
				$hairTex=strtolower(preg_replace('/\s+/','',$data[26]));		
				$hairProc=strtolower(preg_replace('/\s+/','',$data[27]));				
				$hairCond=strtolower(preg_replace('/\s+/','',$data[28]));			
				$intStyl=strtolower(preg_replace('/\s+/','',$data[29]))	;
				$hairDes=strtolower(preg_replace('/\s+/','',$data[30]));	
								
				
				
				if($demogrph=='All')
				$demogrph="Afb,Cau,Euro,Spnsh,Asn,Indn";
				
				$postdata = array(
					'post_author'    => $author,
					'post_content'   => $description,
					'post_excerpt'   => $short_description, 
					'post_status'    => 'publish',
					'post_title'     => $title,
					'post_type'      => 'product'
					
				   
				); 

				$post_id=wp_insert_post($postdata);
               
				$args['type_of_hair']=explode(',',$type_of_hair);
				$args['is_organic']=$is_organic;
				$args['type_of_product']=$type_of_product;
				
				
				$cats=adGetProductPostCats($args);
				  global $wpdb;
				  $rtable=$wpdb->prefix."term_relationships";
				 
				   $rdata=array(
					   'object_id'=>$post_id,
					   'term_taxonomy_id'=>42,

					 );                    
					$wpdb->insert($rtable,$rdata); 
				  
				  foreach($cats as $cat)
				  {
				   $taxid=adGetTaxId($cat);
				  
					  $rdata=array(
					   'object_id'=>$post_id,
					   'term_taxonomy_id'=>$taxid,

					 );                    
					$wpdb->insert($rtable,$rdata); 
				  
				  }
				
				
				
				

 add_post_meta($post_id, 'instructions', $instructions); 
 add_post_meta($post_id, 'ingredients', $ingredients); 
  add_post_meta($post_id, 'brand_description', $brand_description); 
 add_post_meta($post_id, '_weight', $number_of_ounces); 
 add_post_meta($post_id, 'product_consistency', $product_consistency); 
 add_post_meta($post_id, 'type_of_product', $type_of_product); 
 add_post_meta($post_id, 'type_of_hair', $type_of_hair); 
 add_post_meta($post_id, 'is_organic', $is_organic); 
 add_post_meta($post_id, '_regular_price', $price); 
  add_post_meta($post_id, '_sale_price', $price); 
  add_post_meta($post_id, '_price', $price); 
 add_post_meta($post_id, 'quantity_products', $no_products); 
 add_post_meta($post_id, 'upc', $upccode); 
 add_post_meta($post_id, '_sku', $upccode); 
 add_post_meta($post_id, '_stock',$no_products); 
 add_post_meta($post_id, '_visibility', 'visible'); 
 add_post_meta($post_id, '_stock_status','instock'); 
 add_post_meta($post_id, 'total_sales', 0);
 add_post_meta($post_id, '_downloadable', 'no'); 
 add_post_meta($post_id, '_virtual', 'no'); 

 add_post_meta($post_id, '_featured', 'no'); 
 add_post_meta($post_id, '_backorders', 'no'); 
 add_post_meta($post_id, '_manage_stock', no); 

  add_post_meta($post_id, 'affiliate_link', $affiliate_link);   
  add_post_meta($post_id, 'product_video_embed', $video_embed);
  add_post_meta($post_id, 'product_tags', $product_tags);
   add_post_meta($post_id,'_thumbnail_id',$attach_id);  


 
  wp_set_post_tags( $post_id, $product_tags);

  saveFeed($post_id,'product',$author,'upload');
 

  $qatable=$wpdb->prefix."question_answers";
    
     // save gender 
	 $qdata=array(
	  'question_id'=>1,
       'object_id'=>$post_id,
       'object_type'=>'product',
	   'answer'=>$gender

     );                    
    $wpdb->insert($qatable,$qdata); 
	

	
	 // save city
	 $qdata=array(
	  'question_id'=>10,
       'object_id'=>$post_id,
       'object_type'=>'product',
	   'answer'=>$city

     );                    
    $wpdb->insert($qatable,$qdata); 
	
	
	 // save state
	 $qdata=array(
	  'question_id'=>11,
       'object_id'=>$post_id,
       'object_type'=>'product',
	   'answer'=>$state

     );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>12,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$ageRange

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>2,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$demogrph

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>5,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairLenth

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>4,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairTex

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>8,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairProc

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>7,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairCond

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>9,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$intStyl

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>6,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$hairDes

       );                    
    $wpdb->insert($qatable,$qdata); 

	   $qdata=array(
	     'question_id'=>3,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$type_of_hair

       );                    
    $wpdb->insert($qatable,$qdata); */
					
			}
			$i++;
		}
		
		fclose($handle);     
				
		return true;
  	}
  	else
  	    return false;
}








 function getAttachmentId($image_url) {
	global $wpdb;
	$table=$wpdb->prefix."posts";
	$query="SELECT * FROM $table WHERE `guid`='".$image_url."'";
	$row = $wpdb->get_results($query); 

     return $row->ID;
}
function userGenderCount($ans)
{
global $wpdb;
  $uatable=$wpdb->prefix."usermeta";
  $qatable=$wpdb->prefix."question_answers";
  
  
  $query="select * from $qatable as a left join $uatable as b on a.object_id=b.user_id where a.object_type='user' and a.answer='".$ans."' and b.meta_key='sk_user_activation_code' and b.meta_value='active'";

  $results=$wpdb->get_results($query);
return count($results);
}

?>