<?php
/**
*
Update Products Information
*
**/
function saveEditProduct($post,$filedata)
{
 //updateProductTaxonomy($post['product_id'],$post);
 //exit;


if($post['product_id']>0)
{

$pid=$post['product_id'];
$postdata = array(
  'ID'    => $pid,
  'post_content'   => $post['description'],
  'post_excerpt'   => $post['short_description'], 
  'post_title'     => $post['title'] 
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
 update_post_meta($pid, 'upc', $post['upccode']);
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
 //updateAge($pid,$post['ageRange']);
 
 updateAttributes($pid,$post);
 updateProductTaxonomy($pid,$post);
  

 
  if ( $filedata ) {
$files = $filedata['upload_attachment'];

foreach ($files['name'] as $key => $value) {
if ($files['name'][$key]) {
$file = array(
'name' => $files['name'][$key],
'type' => $files['type'][$key],
'tmp_name' => $files['tmp_name'][$key],
'error' => $files['error'][$key],
'size' => $files['size'][$key]
);
 
$_FILES = array("upload_attachment" => $file);
 
foreach ($_FILES as $file => $array) {
/**
*
Update Products Information
*
**/
 insertAttachment($file,$pid,$setthumb='false');
}
}
}
}
 
 
return true;
}

}


/**
*
Update Attributes of Product
*
**/
function updateAttributes($productid,$post)
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
/**
*
Update Product Taxonomy
*
**/
function updateProductTaxonomy($pid,$post)
{

  global $wpdb;
  $rtable=$wpdb->prefix."term_relationships";
  $query="select * from $rtable where object_id=$pid";

 $results=$wpdb->get_results($query);
 
  $taxids=array();
  $oldtaxids=array();
  
  $cats=getProductPostCats($post);
  $taxids[]=42;
  foreach($cats as $cat)
  {
   $taxids[]=getTaxId($cat);
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


/**
*
Return one dimensional array of products categories based of hair type
*
**/
function getProductPostCats($post){

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
	$cats[]=getSubCat1($post['type_of_product']);
  
  }
  //Relaxed straight
  if($type=='c_rs')
  {
    $cats[]=188;
	if($post['is_organic']=='yes')
    $cats[]=206;
	$cats[]=getSubCat2($post['type_of_product']);
  
  }
  
  // curly
  if($type=='c_c')
  {
    $cats[]=189;
	if($post['is_organic']=='yes')
    $cats[]=222;
	$cats[]=getSubCat3($post['type_of_product']);
  
  }
  
  //Dreds
  if($type=='c_d')
  {
    $cats[]=179;
	if($post['is_organic']=='yes')
    $cats[]=194;
	$cats[]=getSubCat4($post['type_of_product']);
  
  }
  
  
   //Braids
  if($type=='c_b')
  {
    $cats[]=250;
	if($post['is_organic']=='yes')
    $cats[]=258;
	$cats[]=getSubCat5($post['type_of_product']);
  
  }

  



}

return $cats;

}

/**
*
Save Products
*
**/
function saveProductPost($post,$filedata)
{
//getProductPostCats() Return one dimensional array of products categories based of hair type
$cats=getProductPostCats($post);



 $postdata = array(
  'post_author'    => $post['user_id'],
  'post_content'   => $post['description'],
  'post_excerpt'   => $post['short_description'], 
  'post_status'    => 'publish',
  'post_title'     => $post['title'],
  'post_type'      => 'product'
   
);  



$post_id=wp_insert_post($postdata);
if ( $filedata ) {
$files = $filedata['upload_attachment'];
foreach ($files['name'] as $key => $value) {
if ($files['name'][$key]) {
$file = array(
'name' => $files['name'][$key],
'type' => $files['type'][$key],
'tmp_name' => $files['tmp_name'][$key],
'error' => $files['error'][$key],
'size' => $files['size'][$key]
);
 
$_FILES = array("upload_attachment" => $file);
 
foreach ($_FILES as $file => $array) {

$newupload = insertAttachment($file,$post_id);
}
}
}
}



/*
 foreach ($filedata as $file => $array) {
 
 $newupload = insertAttachment($file,$post_id);
}
*/

  global $wpdb;
  $rtable=$wpdb->prefix."term_relationships";
 
   $rdata=array(
       'object_id'=>$post_id,
       'term_taxonomy_id'=>42,

     );                    
    $wpdb->insert($rtable,$rdata); 
  
  foreach($cats as $cat)
  {
   $taxid=getTaxId($cat);
  
      $rdata=array(
       'object_id'=>$post_id,
       'term_taxonomy_id'=>$taxid,

     );                    
    $wpdb->insert($rtable,$rdata); 
  
  }

// do_action('wp_insert_post', 'wp_insert_post'); 
//wp_set_post_terms($post_id,$cats,'category'); 


 add_post_meta($post_id, 'instructions', $post['instructions']); 
 add_post_meta($post_id, 'ingredients', $post['ingredients']); 
  add_post_meta($post_id, 'brand_description', $post['brand_description']); 
 add_post_meta($post_id, '_weight', $post['number_of_ounces']); 
 add_post_meta($post_id, 'product_consistency', $post['product_consistency']); 
 add_post_meta($post_id, 'type_of_product', $post['type_of_product']); 
 $t_value=implode(',',$post['type_of_hair']);
 add_post_meta($post_id, 'type_of_hair', $t_value); 
 add_post_meta($post_id, 'is_organic', $post['is_organic']); 
 add_post_meta($post_id, '_regular_price', $post['price']); 
  add_post_meta($post_id, '_sale_price', $post['price']); 
  add_post_meta($post_id, '_price', $post['price']); 
 add_post_meta($post_id, 'quantity_products', $post['no_products']); 
 add_post_meta($post_id, 'upc', $post['upccode']); 
 add_post_meta($post_id, '_stock',$post['no_products']); 
 add_post_meta($post_id, '_visibility', 'visible'); 
 add_post_meta($post_id, '_stock_status','instock'); 
 add_post_meta($post_id, 'total_sales', 0);
 add_post_meta($post_id, '_downloadable', 'no'); 
 add_post_meta($post_id, '_virtual', 'no'); 

 add_post_meta($post_id, '_featured', 'no'); 
 add_post_meta($post_id, '_backorders', 'no'); 
 add_post_meta($post_id, '_manage_stock', no); 

  add_post_meta($post_id, 'affiliate_link', $post['affiliate_link']);   
  add_post_meta($post_id, 'product_video_embed', $post['video_embed']);
  add_post_meta($post_id, 'product_tags', $post['product_tags']);
   
  wp_set_post_tags( $post_id, $post['product_tags']);

   saveFeed($post_id,'product',$post['user_id'],'upload');
 
 
  $qatable=$wpdb->prefix."question_answers";
    
     // save gender 
	 $qdata=array(
	  'question_id'=>1,
       'object_id'=>$post_id,
       'object_type'=>'product',
	   'answer'=>$post['gender']

     );                    
    $wpdb->insert($qatable,$qdata); 
	

	
	 // save city
	 $qdata=array(
	  'question_id'=>10,
       'object_id'=>$post_id,
       'object_type'=>'product',
	   'answer'=>$post['city']

     );                    
    $wpdb->insert($qatable,$qdata); 
	
	
	 // save state
	 $qdata=array(
	  'question_id'=>11,
       'object_id'=>$post_id,
       'object_type'=>'product',
	   'answer'=>$post['state']

     );                    
    $wpdb->insert($qatable,$qdata); 
	
	// save age
	//foreach($post['ageRange'] as $value)
	//{
	 $value=implode(',',$post['ageRange']);
	   $qdata=array(
	     'question_id'=>12,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 
//	}
	
	
	/// save Demographics
	//foreach($post['demogrph'] as $value)
	//{
	  $value=implode(',',$post['demogrph']);
	   $qdata=array(
	     'question_id'=>2,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 
	//}
	// hair length 
	//foreach($post['hairLenth'] as $value)
	//{
	 $value=implode(',',$post['hairLenth']);
	   $qdata=array(
	     'question_id'=>5,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 
	//}
	
	// hair texture
	//foreach($post['hairTex'] as $value)
	//{
	 $value=implode(',',$post['hairTex']);
	   $qdata=array(
	     'question_id'=>4,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 
	//}
	
	
	// hair process 
	//foreach($post['hairProc'] as $value)
	//{
	 $value=implode(',',$post['hairProc']);
	   $qdata=array(
	     'question_id'=>8,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 
	//}
	
	
	// hair condition
	//foreach($post['hairCond'] as $value)
	//{
	$value=implode(',',$post['hairCond']);
	   $qdata=array(
	     'question_id'=>7,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 
	//}
	
	
	// hair style
//	foreach($post['intStyl'] as $value)
//	{
	$value=implode(',',$post['intStyl']);
	   $qdata=array(
	     'question_id'=>9,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 
	//}
	
	
	// hair description
	//foreach($post['hairDes'] as $value)
	//{
	$value=implode(',',$post['hairDes']);
	   $qdata=array(
	     'question_id'=>6,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 
	//}
	
	
		$value=implode(',',$post['type_of_hair']);
	   $qdata=array(
	     'question_id'=>3,
         'object_id'=>$post_id,
         'object_type'=>'product',
	     'answer'=>$value

       );                    
    $wpdb->insert($qatable,$qdata); 
	
	 return true;

}



/**
*
*
Save Featured video of single product
*
**/
function saveFeaturedVideo($post)
{
if($post['id']<1 || $post['video_embed']=="")
return false;

 update_post_meta($post['id'], 'product_video_embed', $post['video_embed']);
return true;
}




// Get sub categories of Natural Straight Category
function getSubCat1($type)
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



// Get sub categories of Reluxed Straight Category
function getSubCat2($type)
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

// Get sub categories of Curly
function getSubCat3($type)
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

// Get sub categories of Dreads
function getSubCat4($type)
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


// Get sub categories of Braids
function getSubCat5($type)
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



/**
Return TaxId of specific category
**/
function getTaxId($term)
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

/**
*
Returns the Attachment Post ID and save the id in post meta
*
**/
function insertAttachment($file_handler,$post_id,$setthumb='false') {
 
// check to make sure its a successful upload
if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
 
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

//This function handles the file upload POST request itself, and creates the attachment post in the database. 
$attach_id = media_handle_upload( $file_handler, $post_id );
 
if ($setthumb)
 update_post_meta($post_id,'_thumbnail_id',$attach_id);
return $attach_id;
} 

/**
*
Returns one dimensional Array of Products based on categories
*
**/
function get_type_products($catids=null,$limit=null,$sort=null,$price=null)
{
  global $wpdb;
  $trtable=$wpdb->prefix."term_relationships";
  $tttable=$wpdb->prefix."term_taxonomy";
  $ptable=$wpdb->prefix."posts";
  if($catids)
  {
  $cats=implode(',',$catids);
  $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id IN ($cats) and a.post_type='product' and a.post_status='publish' group by a.ID  order by a.post_date DESC";
  }else
  {
   $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE a.post_type='product' and a.post_status='publish' group by a.ID  order by a.post_date DESC";
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
 
 

 if($sort and count($results)>0)
   $results=getHeartSortedProducts($results,$sort);
  //$results=getPriceSortedProducts($results,$sort);
   
 
 return $results;
}

/**
*
Returns one dimensional Array of specific number of Products based on categories
*
**/
function getTypeProducts($catids=null,$limit=null)
{
$products=get_type_products($catids,null,'desc');
$list=array();
$i=1;
if($limit and $products)
 foreach($products as $product)
 {
 
    $list[]=$product;
	if($i==$limit)
	 break;
	 $i++;
 }
 
 return $list; 
 

}






/**
*
Returns one dimensional Array of sorted Products based on prices
*
**/
function getPriceSortedProducts($ids,$sort='asc')
{
    if(count($ids)<1)
	 return true;
	 
  $prices=array();

   foreach($ids as $cid)
   {
   
     $prices[]=array('id'=>$cid->id,'price'=>get_post_meta($cid->id,'_price',true),'cid'=>$cid);
   
   }
  
 
 $pids=sortProducts ($prices, 'price', $order=$sort);

 $list=array();
 
 foreach($pids as $pid)
 {
  $list[]=$pid['cid'];
 }
 
 
 return $list;
 
}
/*

$products=array(element should be a object with product id)
$product->id;
*/


/**
*
This function accepts an array of product ids as parameter and
Returns one dimensional Array of sorted Products based on Total amount of like
*
**/
function getHeartSortedProducts($products,$sort='asc')
{
if(count($products)<1)
	 return true;
	 
  $prices=array();

   foreach($products as $product)
   {
   
     $prices[]=array('id'=>$product->id,'price'=>getTotalLike($product->id,'product'),'cid'=>$product);
   
   }
  
 
 $pids=sortProducts ($prices, 'price', $order=$sort);

 $list=array();
 
 foreach($pids as $pid)
 {
  $list[]=$pid['cid'];
 }
 
 return $list;

}
 
/**
*
Returns Images of sub category
*
**/
 function getSubCetegoryImages($args)
 {
 $images=array();
 if($args){
 foreach($args as $arg)
 {
   $thumbnail_id = get_woocommerce_term_meta( $arg, 'thumbnail_id', true ); 
   $images[$arg] = wp_get_attachment_url( $thumbnail_id );
   

}
}
return $images;
 
 }
 
/**
*
Returns Title of products category
*
**/
function getProductCategoryTitle($type)
{
				
	switch($type)
	 {
				  
		  case 'match':
			  $t_title="My Matches";
		   break;
		  case 'con':
			   $t_title="Conditioner";
				break;
		   case 'sam':
				  $t_title="Shampoo";
				   break;
			case 'oil':
				  $t_title="Oil";
				   break;
			case 'oil':
				 $t_title="Gel";
				  break;
			 case 'mos':
				  $t_title="Moisturiser";
				   break;
			 case 'spr':
				  $t_title="Hair Spray";
				   break;
			  case 'col':
				  $t_title="Hair Color";
				   break;
				   
			case 'rep':
				  $t_title="Hair Care/Repair";
				   break;
				   
		  default:
				 $t_title="All";
			
	}
	
	return $t_title;
			
}			

/**
*
Returns Title of products category based on subcategory
*
**/
function getProductSubCategoryTitle($id)
{
				
	switch($id)
	 {
				  
		  case 253:
		  case 213:
		  case 192:
		  case 217:
		  case 196:
		  case 177:
		  case 221:
		  case 205:
		  case 209:
		  case 200:
			   $t_title="Conditioner";
				break;
		   case 254:
		   case 215:
		   case 191:
		   case 219:
		   case 195:
		   case 176:
		   case 223:
		   case 207:
		   case 211:
				  $t_title="Shampoo";
				   break;
			case 259:
			case 247:
			case 229:
			case 241:
			case 235:
			case 276:
				  $t_title="Oil";
				   break;
			case 256:
			case 244:
			case 226:
			case 238:
			case 232:
			case 277:
				 $t_title="Gel";
				  break;
			 case 260:
			 case 245:
			 case 227:
			 case 239:
			 case 233:
			 case 278:
				  $t_title="Moisturizer";
				   break;
			 case 257:
			 case 243:
			 case 225:
			 case 237:
			 case 231:
			 case 279:
				  $t_title="Hair Spray";
				   break;
			  case 261:
			  case 246:
			  case 228:
			  case 240:
			  case 234:
			  case 280:
				  $t_title="Hair Color";
				   break;
				   
			case 265:
			case 267:
			case 269:
			case 264:
			case 271:
			case 273:
				  $t_title="Hair Care/Repair";
				   break;
				   
		  default:
				 $t_title="All";
			
	}
	
	return $t_title;
			
}


/**
*
Returns all products
*
**/
function getAllProducts()
{
 global $wpdb;
 $ptable=$wpdb->prefix."posts";

  $query="SELECT * FROM $ptable WHERE post_status='publish' and post_type='product' order by post_date";
  
  $results=$wpdb->get_results($query);
 
  
  return $results;


}
function getPopupProduct($id)
{

  $details=get_post($id);
  $current_user = wp_get_current_user();
  
  $brand=null;	 
  $brand=get_brand_info($details->post_author);
 
 $overview=getFormatedDes($brand->overview);
 $brandname=getFormatedDes($brand->company_name);


  $permalink=get_permalink($id);
if (has_post_thumbnail($id)) {
		
		$img=get_the_post_thumbnail($id, array(400,400) );
		}else{
		
		
		$img='<img width="400" height="400" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/placeholder.png">';
		}
  
     $thumbpath=getBrandThumbPath($brand->user_id);

  $cssid=$id.'5643296';

?>

<div class="row-fluid" style="margin-bottom:30px">
       <div class="span6 product-image"><?php echo $img;?>
	   <div class="product-comments">
      <?php echo getComments($id);?>
	</div>
	  </div>
      
	   <div class="span6 product-content">
	   
		<h3 class="product_title entry-title" itemprop="name"><?php echo get_the_title($id);?></h3>
		<p class="product-brand-name">By <a href="http://hairlibrary.com/brand?n=<?php echo getBrandSlug($brand->user_id);?>"><?php echo $brandname;?></a></p>
		<?php 
		 if($brand->allow_dropshipping=="Yes" || $brand->id==6610){?>
				<form enctype="multipart/form-data" method="post" class="cart" action="http://hairlibrary.com/product/<?php echo $details->post_name;?>/?add-to-cart=<?php echo $id;?>">

	 	
	 	<div class="quantity buttons_added"><input style="float:left;width:50px;margin-right:10px" type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
	 	<button class="single_add_to_cart_button button1 btn btn-normal btn-primary" type="submit">Add to bag</button>

	 	
	</form><?php
				 } else {
				 ?>
				 <div class="buy-now">
			<a target="_blank" href="<?php echo get_post_meta($id,'affiliate_link',true);?>" class="buy-button">Check It Out</a>
				
			</div><?php }?>
		<?Php echo getPopupHeartButton($id,$current_user->ID,'product',$cssid);?>
		<div class="woocommerce-tabs"><div id="accordion">

        <?php  $video=get_post_meta($id,'product_video_embed',true);
		  $vclass="";
		  if($video!="")
		  {
		  ?>
		   <h3 id="tabe" onclick="getTab('tabe');">Video</h3>
			 <div id="tabe1" class="video panel tabcon"><?php echo $video;?></div>
	     
			 
		<?php
       $vclass="hide";
		}  ?>
		<h3 class="tab-items" id="taba" onclick="getTab('taba');"> Description</h3>
		<p id="taba1" class="tabcon <?php echo $vclass;?>"><?php echo $details->post_content;?></p>

		<h3 class="tab-items" id="tabb" onclick="getTab('tabb');">Product Instructions</h3>
		<p id="tabb1" class="hide tabcon"><?php echo get_post_meta($id,'instructions',true);?></p>
		<h3 class="tab-items" id="tabc" onclick="getTab('tabc');">	Ingredients</h3>
		<p id="tabc1" class="hide tabcon"><?php echo get_post_meta($id,'ingredients',true);?></p>
		
		<h3 class="tab-items" id="tabd" onclick="getTab('tabd');">Brand Information</h3>
		<div id="tabd1" class="hide tabcon">
		<ul>
		<li>
		<div class="brand-logo">
		<img alt="profile" width="130" src="<?php echo $thumbpath;?>">
		</div>
		<div class="brand-des">
		<h4><?php echo $brandname;?> </h4>
		<p> <?php echo $overview;?> </p>
		<p>
		Website:
		<a href="<?php echo $brand->company_website;?>"><?php echo $brand->company_website;?></a>
		</p>
		<p class="align-right">
		<a href="http://hairlibrary.com/brand/?n=<?php echo getBrandSlug($brand->user_id);?>">More From <?php echo $brandname;?></a>
		</p>
		</div>
		<div class="clear"></div>
		</li>
		</ul>
		</div>
	</div>
		</div>
		<div id="single-social-bar">
		<p class="share-text">Share</p>
		<ul id="social-media-links">
		<li class="facebook">
		<a href="http://www.facebook.com/sharer.php?u=<?php echo $permalink;?>" target="_blank"> </a>
		</li>
		<li class="twitter">
		<a href="http://twitter.com/share?url=<?php echo $permalink;?>" target="_blank"> </a>
		</li>
		<li class="pinterest">
		<a href="http://www.pinterest.com/hairlibrary/" target="_blank"> </a>
		</li>
		<li class="googleplus">
		<a href="https://plus.google.com/share?url=<?php echo $permalink;?>" target="_blank"> </a>
		</li>
		</ul>
		</div>
		</div>
		<div class="clear"></div>
		</div></div>
		
		


<?php
}


function getPopupProduct2($id)
{

  $details=get_post($id);
  $current_user = wp_get_current_user();
  
  $brand=null;	 
  $brand=get_brand_info($details->post_author);
 
 $overview=getFormatedDes($brand->overview);
 $brandname=getFormatedDes($brand->company_name);


  $permalink=get_permalink($id);
if (has_post_thumbnail($id)) {
		
		$img=get_the_post_thumbnail($id, array(400,400) );
		}else{
		
		
		$img='<img width="400" height="400" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/placeholder.png">';
		}
  
     $thumbpath=getBrandThumbPath($brand->user_id);

  $cssid=$id.'5643296';

$output='<div class="row-fluid" style="margin-bottom:30px">
       <div class="span6 product-image">'.$img.'
	   <div class="product-comments">
      '.getPopupComments($id).'
	</div>
	  </div>
      
	   <div class="span6 product-content">
	   
		<h3 class="product_title entry-title" itemprop="name">'.get_the_title($id).'</h3>
		<p class="product-brand-name">By <a href="http://hairlibrary.com/brand?n='.getBrandSlug($brand->user_id).'">'.$brandname.'</a></p>
		
		<div class="buy-now">
		<a class="buy-button" href="'.get_post_meta($id,'affiliate_link',true).'" target="_blank">Check It Out</a>
		</div>
		'.getPopupHeartButton($id,$current_user->ID,'product',$cssid).'
		<div class="woocommerce-tabs"><div id="accordion">';

          $video=get_post_meta($id,'product_video_embed',true);
		  $vclass="";
		  if($video!="")
		  {
		 $output.='<h3 id="tabe" onclick="getTab(\'tabe\');">Video</h3>
			 <div id="tabe1" class="video panel tabcon">'.$video.'</div>';
	     $vclass="hide";
			 
		} 
		$output.='<h3 class="tab-items" id="taba" onclick="getTab(\'taba\');"> Description</h3>
		<p id="taba1" class="tabcon '.$vclass.'">'.$details->post_content.'</p>';

		$output.='<h3 class="tab-items" id="tabb" onclick="getTab(\'tabb\');">Product Instructions</h3>
		<p id="tabb1" class="hide tabcon">'.get_post_meta($id,'instructions',true).'</p>
		<h3 class="tab-items" id="tabc" onclick="getTab(\'tabc\');">	Ingredients</h3>
		<p id="tabc1" class="hide tabcon">'.get_post_meta($id,'ingredients',true). '</p>
		
		<h3 class="tab-items" id="tabd" onclick="getTab(\'tabd\');">Brand Information</h3>
		<div id="tabd1" class="hide tabcon">
		<ul>
		<li>
		<div class="brand-logo">
		<img width="130" src="'.$thumbpath.'">
		</div>
		<div class="brand-des">
		<h4>'.$brandname.' </h4>
		<p> '.$overview.' </p>
		<p>';
		$output.='Website:
		<a href="'.$brand->company_website.'">'.$brand->company_website.'</a>
		</p>
		<p class="align-right">
		<a href="http://hairlibrary.com/brand/?n='.getBrandSlug($brand->user_id).'">More From '.$brandname.'</a>
		</p>
		</div>
		<div class="clear"></div>
		</li>
		</ul>
		</div>
	</div>
		</div>
		<div id="single-social-bar">
		<p class="share-text">Share</p>
		<ul id="social-media-links">
		<li class="facebook">
		<a href="http://www.facebook.com/sharer.php?u='.$permalink.'" target="_blank"> </a>
		</li>
		<li class="twitter">
		<a href="http://twitter.com/share?url='.$permalink.'" target="_blank"> </a>
		</li>
		<li class="pinterest">
		<a href="http://www.pinterest.com/hairlibrary/" target="_blank"> </a>
		</li>
		<li class="googleplus">
		<a href="https://plus.google.com/share?url='.$permalink.'" target="_blank"> </a>
		</li>
		</ul>
		</div>
		</div>
		<div class="clear"></div>
		</div></div>
		
		';

return $output;

}

/**
*
Generate HTML layout of products content of given ids
*
**/
function getProductContent($id,$userid=null)
{
    if(!$userid)
	{
	$user=wp_get_current_user();
	$userid=$user->ID;
	}
           $brand=null;
		  $ppost=get_post($id);
		  $brand= get_brand_info($ppost->post_author);

 $brandname=getFormatedDes(strtolower($brand->company_name));
  $brandname=getFormatedDes($brandname);
?>
	  <div class="imagewrapper effect-thumb effect-thumb-2">
		<?php if (has_post_thumbnail($id)) {
		
		?><a href="<?php echo post_permalink($id); ?>"><?php echo get_the_post_thumbnail($id, array(300,300) );?></a><?php
		}else{
		?>
		
		<a href="<?php echo post_permalink($id); ?>"><img width="480" height="480" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/placeholder.png"></a>
		<?php }?>
		<div class="effect-wrap clearfix">
			<a class="icon info ttip" href="javascript:getProductPopup(<?php echo $id;?>);" data-placement="bottom" rel="tooltip" data-original-title="Quick View"></a>
			<?php 
		 if($brand->allow_dropshipping=="Yes" || $brand->id==6610){?>
				<a target="_blank" class="icon  shopping-cart ttip product_type_simple" data-placement="top" rel="tooltip" href="<?php echo post_permalink($id); ?>" data-product_id="1801" data-original-title="Check It Out"></a>
				
				<?php
				 }else{?>
			<a target="_blank" class="icon  shopping-cart ttip product_type_simple" data-placement="top" rel="tooltip" href="<?php echo get_post_meta($id,'affiliate_link',true);?>" data-product_id="1801" data-original-title="Check It Out"></a>
			<?php } ?>
			<a target="_blank" class="icon icon2 ttip" data-placement="bottom" rel="tooltip" data-original-title="Add Hair Story" href="<?php bloginfo('url');?>/upload-photo/?pt=<?php echo $ppost->post_name;?>"><img alt="hair-story" style="margin:16px 0 0 7px; width:35px;" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/hair-story.png" /></a>
		</div>
   </div>
<div class="clearfix"></div>
<h3><a href="<?php echo post_permalink($id); ?>"><?php echo get_the_title($id); ?> </a></h3>
 <p class="product-brand-name"> <a href="<?php bloginfo('url');?>/brand?n=<?php echo getBrandSlug($brand->user_id);?>"><?php echo $brandname;?></a></p>
  <?php getListHeartButton($id,$userid,'product',$id,post_permalink($id));?>
  
  <?php                  
}
/**
*
Generate left menu for type product
*
**/
function getProductTypeLeftMenus($page_id,$type)
{


		if($page_id==2297){ ?>
		<ul>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=211">Thinning Hair</a></li>
			<li <?php if($type=='219') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=219">Grey Hair</a></li>
			<li <?php if($type=='2297') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo">Dry Scalp</a></li>
			<li <?php if($type=='2299') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Oily Scalop</a></li>
			<li <?php if($type=='2301') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Alopecia</a></li>
			<li <?php if($type=='2303') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Hair Care/Repair</a></li>
			<li <?php if($type=='215') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=215">Color Treated Hair</a></li>
			<li <?php if($type=='207') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=207">Relaxed  Hair</a></li>
			<li <?php if($type=='223') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=223">Permed Curly Hair</a></li>
			<li <?php if($page_id=='2309') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Dry Shampoo</a></li>
		
		</ul>
		<?php } else if($page_id==2293) { //Conditioner ?>
		 <ul>
			<li <?php if($type=='209') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=209">Thinning Hair</a></li>
			<li <?php if($type=='217') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=217">Grey Hair</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=">Dry Scalp</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>> <a href="<?php bloginfo('url');?>/conditioner/?type=">Oily Scalop</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=">Alopecia</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=">Hair Care/Repair</a></li>
			<li <?php if($type=='213') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=213">Color Treated Hair</a></li>
			<li <?php if($type=='205') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=205">Relaxed  Hair</a></li>
			<li <?php if($type=='221') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=221">Permed Curly Hair</a></li>
			
		 </ul>
		 <?php } else if($page_id==2303) { // Moisturizer ?>
		 <ul>
		 <li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Oils</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Thinning Hair</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Grey Hair</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Dry Scalp</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Oily Scalop</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Alopecia</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Hair Care/Repair</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Color Treated Hair</a></li>
			<li <?php if($type=='233') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=233">Relaxed  Hair</a></li>
			<li <?php if($type=='239') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=239">Permed Curly Hair</a></li>
			
		 </ul>
		<?php } else if($page_id==2878) { //Styling ?>
		 <ul>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Hair Spray</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Gel</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Mousse</a></li>
			<li <?php if($type=='212') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=212">Thinning Hair</a></li>
			<li <?php if($type=='220') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=220">Grey Hair</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Dry Scalp</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Oily Scalop</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Alopecia</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=">Hair Care/Repair</a></li>
			<li <?php if($type=='216') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=216">Color Treated Hair</a></li>
			<li <?php if($type=='208') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=208">Relaxed  Hair</a></li>
			<li <?php if($type=='224') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/type=224">Permed Curly Hair</a></li>
			
		 </ul>
		 <?php } else if($page_id==3031) { //Organic ?>
		  <div class="left-box">
		   <span class="left-bar-title">Shampoo</span>
		  <ul>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=211">Thinning Hair</a></li>
			<li <?php if($type=='219') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=219">Grey Hair</a></li>
			<li <?php if($type=='2297') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo">Dry Scalp</a></li>
			<li <?php if($type=='2299') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Oily Scalop</a></li>
			<li <?php if($type=='2301') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Alopecia</a></li>
			<li <?php if($type=='2303') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Hair Care/Repair</a></li>
			<li <?php if($type=='215') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=215">Color Treated Hair</a></li>
			<li <?php if($type=='207') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=207">Relaxed  Hair</a></li>
			<li <?php if($type=='223') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=223">Permed Curly Hair</a></li>
			<li <?php if($page_id=='2309') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/shampoo/?type=">Dry Shampoo</a></li>
		
		 </ul>
		 </div>
			<div class="left-box">
		  <span class="left-bar-title">Conditioner</span> 
		   <ul>
			<li <?php if($type=='209') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=209">Thinning Hair</a></li>
			<li <?php if($type=='217') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=217">Grey Hair</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=">Dry Scalp</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>> <a href="<?php bloginfo('url');?>/conditioner/?type=">Oily Scalop</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=">Alopecia</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=">Hair Care/Repair</a></li>
			<li <?php if($type=='213') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=213">Color Treated Hair</a></li>
			<li <?php if($type=='205') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=205">Relaxed  Hair</a></li>
			<li <?php if($type=='221') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/conditioner/?type=221">Permed Curly Hair</a></li>
			
		 </ul>
		  </div>
		  <div class="left-box">
		   <span class="left-bar-title">Moisturizer</span>
		  <ul>
		 <li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Oils</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Thinning Hair</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Grey Hair</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Dry Scalp</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Oily Scalop</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Alopecia</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Hair Care/Repair</a></li>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=">Color Treated Hair</a></li>
			<li <?php if($type=='233') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=233">Relaxed  Hair</a></li>
			<li <?php if($type=='239') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/moisturizer/?type=239">Permed Curly Hair</a></li>
			
		 </ul>
		  </div>
		  <div class="left-box">
		  <span class="left-bar-title">Styling</span>
		   <ul>
			<li <?php if($type=='211') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/?type=211">Thinning Hair</a></li>
			<li <?php if($type=='219') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/?type=219">Grey Hair</a></li>
			<li <?php if($type=='2297') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product">Dry Scalp</a></li>
			<li <?php if($type=='2299') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/?type=">Oily Scalop</a></li>
			<li <?php if($type=='2301') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/?type=">Alopecia</a></li>
			<li <?php if($type=='2303') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/?type=">Hair Care/Repair</a></li>
			<li <?php if($type=='215') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/?type=215">Color Treated Hair</a></li>
			<li <?php if($type=='207') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/?type=207">Relaxed  Hair</a></li>
			<li <?php if($type=='223') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/?type=223">Permed Curly Hair</a></li>
			<li <?php if($page_id=='2309') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/styling-product/?type=">Dry Shampoo</a></li>
		
		 </ul>
		  </div>
		
		<?php } ?>

		
		<span class="left-bar-title">All Brands</span>
					<ul class="left-brand-names">
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(164);?>">Aesop</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(114);?>">Affirm</a></li>
                        <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(99);?>">African Pride</a></li>
                        <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(125);?>">Agadir</a></li>
						<li><a href="#">Aphogee</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6329);?>">AlbertoVo5</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(167);?>">Alder New York</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(215);?>">Alikay Naturals</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6318);?>">American Crew</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(389);?>">Art Of Shaving</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(173);?>">Aunt Jackies</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6341);?>">Aussie</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(222);?>">Aveda</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(113);?>">Avlon</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(78);?>">Beautiful Textures</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(109);?>">Bigen</a></li>
						<li><a href="#">Bobbi Boss</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(112);?>">Bohyme</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(223);?>">Bumble and Bumble</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6506);?>">Burtsbees</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6476);?>">California Baby</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(117);?>">Cantu</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(34);?>">Carol's Daughter</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6464);?>">Chi</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6339);?>">Clairol</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6500);?>">Clear</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(105);?>">Creme Of Nature</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(224);?>">Conair</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(101);?>">Dark & Lovely</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(220);?>">Davines</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(81);?>">DEVA CURL</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(108);?>">Doo Grow</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6502);?>">Dove</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(160);?>">Dr Bronner</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(185);?>">Dr Miracles</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6316);?>">EcoStyler</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(115);?>">Elasta Qp</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(107);?>">Fantasia</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6323);?>">Fekkai</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6335);?>">Garnier Fructise</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6317);?>">Gillette</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6311);?>">Got2Be</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6467);?>">HairEnvy</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(106);?>">Hairfinity</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(191);?>">Hair Library</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(221);?>">Hair Rules</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6336);?>">Herbal Essence</a></li>
						 
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6447);?>">Infusium 23</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(166);?>">Intelligent Nutrients</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6507);?>">Its A 10</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(98);?>">Jane Carter Solution</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6479);?>">John Frieda</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6478);?>">Just for Men</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6445);?>">Karen’s Body Beautiful </a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(111);?>">Kinky Curly</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6319);?>">Knotty Boy</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6333);?>">Laila Ali</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(118);?>">Lisa Raye</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6444);?>">Living Proof</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6334);?>">Loreal Paris</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6441);?>">Luster</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(183);?>">Macadamia</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(163);?>">Malin+Goetz</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(102);?>">Mane n Tail</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6313);?>">Manic Panic</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6327);?>">Matrix</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(80);?>">Miss Jessie's</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(100);?>">Mixed Chicks</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6314);?>">Mizani</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(212);?>">Moroccanoil</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6338);?>">Motions</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6320);?>">Murrays</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6337);?>">Neutrogena</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6325);?>">Nexxus</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6450);?>">Nioxin</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6332);?>">Organix</a></li>
						<li><a href="#">ORS Beauty</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(218);?>">Ouidad</a></li>
						
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(104);?>">Palmers</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6465);?>">Pantene</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6322);?>">Paul Mitchell</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6443);?>">Phyto</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(77);?>">Profective</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(216);?>">Pureology</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6326);?>">Redken</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6315);?>">Revlon</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6474);?>">Rogaine</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(219);?>">Sexy Hair</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(103);?>">SheaMoisture</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6312);?>">Splat</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6330);?>">suave</a></li>
						 <li><a href="#">Sulfur 8</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6449);?>">Sunny Isle</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(110);?>">4 Naturals</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(79);?>">Taliah Waajid</a></li>
						
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(214);?>">The Dry Bar</a></li>
						<li><a href="#">ThermaSilk</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6331);?>">Tigi</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6455);?>">Toppik</a></li>
				        <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(165);?>">Travis Dowdy</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6340);?>">Treseeme</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6328);?>">Vidal Sassoon</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6468);?>">Viviscal</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6446);?>">Wahl Clippers</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6321);?>">Wen</a></li>
					</ul>
					
<?PHP

}


/**
*
Returns two dimensional array of question answer for products.
Array Index: [product id][question id].
*
**/
function getAllProdcutAnswers(){
 global $wpdb;
 $qatable=$wpdb->prefix."question_answers";
 $query="select * from $qatable where object_type='product'";
 $results=$wpdb->get_results($query);
 $ans=array();
  if($results)
  {
    foreach($results as $result)
    $ans[$result->object_id][$result->question_id]=$result->answer;
  }

  return $ans;
}


/**
*
Returns one dimensional array of all question answer for given product id.
Array Index: [question id].
*
**/
function getProdcutAnswers($pid)
{
   global $wpdb;
  $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where object_id=$pid and object_type='product'";
  
  $results=$wpdb->get_results($query);
  
  $ans=array();
  if($results)
  {
    foreach($results as $result)
    $ans[$result->question_id]=preg_replace('/\s+/','',$result->answer);
  }

  return $ans;



}
/**
*
Returns number of answer for specific question
*
**/
function get_ans_count($qid,$ans)
{
   global $wpdb;
  $qatable=$wpdb->prefix."question_answers";
  $query="select * from $qatable where question_id=$qid and object_type='user' and answer='".$ans."'";
 // var_dump($query);
  $results=$wpdb->get_results($query);
return count($results);
}

function getTerm($termid)
{
   global $wpdb;
  $ttable=$wpdb->prefix."terms";
  $query="select * from $ttable where term_id=$termid";
 $term=$wpdb->get_row($query);
 return $term;
}

/**
*
Returns one dimensional array of matching products.
*
**/
function getMatchingProducts($userid=null, $limit=null,$matching=10,$catid=null)
{
  if(!$userid)
  {
   $current_user = wp_get_current_user();
   $userid=$current_user->ID;
   }
   if(!$userid)
    return false;
   
  $answers=getUserAnswers($userid); 
 // var_dump($userid);
//var_dump($answers);
  global $wpdb;
  $trtable=$wpdb->prefix."term_relationships";
  $tttable=$wpdb->prefix."term_taxonomy";
  $ptable=$wpdb->prefix."posts";
  if($catid)
  {
  
  $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id =$catid and a.post_status='publish'";
  }else
  {
  $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id =$answers[3] and a.post_status='publish'";
  }

  $results=$wpdb->get_results($query);
$productids=array();
$allproducts=array();
$matchcount=array();
if($results)
  foreach($results as $result)
  {
   $anscount=0;
   $pans=getProdcutAnswers($result->id);
  
    if($pans)
	 {
	  
	
	   foreach($answers as $key=>$ans)
	    {
		
		  if(is_match_ans($key,$ans,$pans[$key]))
		  {
		   
		    $anscount++;
		  
		  }
		    
		 
		
	
		
		
		
		}
	

	    $productids[$anscount][]=$result->id;
		if($anscount>0)
	   $allproducts[]=array('id'=>$result->id,'anscount'=>$anscount);
	 
	 
	 }
	 
	 
	 


  }
  
  $sortedproducts=sortProducts ($allproducts, 'anscount','desc');
  
  if($sortedproducts && count($sortedproducts)>0)
   foreach($sortedproducts as $product)
   {
     $sortedproductids[]=$product['id'];
	  if($product['anscount']>=10)
		$ten_matches[]=$product['id'];
	
	  if($product['anscount']>=9)
		$nine_matches[]=$product['id'];
	
	 if($product['anscount']>=8)
		$eight_matches[]=$product['id'];
	
	 if($product['anscount']>=7)
		$seven_matches[]=$product['id'];
	 if($product['anscount']>=6)
		$six_matches[]=$product['id'];
   }
 
  if(count($ten_matches)>10)
	 $productmatchs =$ten_matches;
  else if(count($nine_matches)>10)
	 $productmatchs =$nine_matches;
 else if(count($eight_matches)>10)
	 $productmatchs =$eight_matches;
 else if(count($seven_matches)>10)
	 $productmatchs =$seven_matches;
 if(count($six_matches)>10)
	 $productmatchs =$six_matches;


  
  if($limit && count($productmatchs)>0)
   {
     $list=array();
      $count=0;
      foreach($productmatchs as $p)
	  {
	  
	  $list[]=$p;
	  $count++;
	  
	  if($count==$limit)
	   break;
	  
	  }
    
     return $list;
   
   }
  
  
 
return $productmatchs;

}
/**
*
Returns one dimensional array of recommended matching products.
*
**/
function getRecommendedMatchingProducts($userid,$limit=null)
{
  $products=array();
   $count=0;
   for($i=9;$i>6;$i--)
   {
    //Returns one dimensional array of matching products.
    $matchproducts=getMatchingProducts($userid,null,$i);
 
    if($matchproducts  && count($matchproducts)>0)
     foreach($matchproducts as $match)
     {
        $products[]=$match;
	    $count++;
	
	   if($limit && $count>=$limit)
	     return $products;
   }
  
  }
  
 return $products;
}


/**
*
Check if the answer is matched with products
*
**/
function is_match_ans($qid,$u_ans,$p_ans)
{
  if($qid==10 || $qid==11 || $qid==9 || $qid==3)
  {
   return true;
  }

  if($qid==1)
     {
	   if($p_ans=='both')
	    return true;
	 
	 }
  
  $valid=false;

  $anslist=explode(',',$p_ans);
  if($anslist && count($anslist)>0)
  {
  if($qid==12)
	{
	  if($u_ans<=18)
	   $u_ans=18;
	   else if($u_ans<=25)
	   $u_ans='19_25';
	   else if($u_ans<=45)
	   $u_ans='26_45';
	   else
	   $u_ans=46;
	}
	
	if($qid==7 || $qid==6)
	{
	  $uans=explode(',',$u_ans);
	  foreach($uans as $ua)
	   if(in_array($ua,$anslist))
	    $valid=true;
	}
	else
	{
	
	if(in_array($u_ans,$anslist))
	{
	  $valid=true;
	}}
	
	
  }

  return $valid;
  

}
/**
*
Return processed slug if duplicate slug found 
*
**/
function processSlug($slug)
{
 global $wpdb;   
 $table=$wpdb->prefix."brand_info";
   $table=$wpdb->prefix."salons";
	 $query="SELECT * from $table where company_slug='".$slug."'";
	$results= $wpdb->get_results($query);
	if(count($results)>0)
	 $slug=$slug.'-'.count($results);

  return $slug;
}


 /**
 *
 Return all active products for specific brand
 *
 **/
 function getMyProducts($userid, $orderby="post_date DESC",$args=null)
 {
 global $wpdb;
 $ptable=$wpdb->prefix."posts";
   if($args)
   {

   $trtable=$wpdb->prefix."term_relationships";
  $tttable=$wpdb->prefix."term_taxonomy";

  $cats=implode(',',$args);
  $query="SELECT * FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id IN ($cats) and a.post_type='product' and a.post_status='publish' and post_author=$userid  group by a.ID  order by $orderby";
  }else
  {
 
   $query="SELECT * FROM $ptable WHERE post_author=$userid and post_status='publish' and post_type='product' order by $orderby";
  }
  $results=$wpdb->get_results($query);
  return $results;
 
 }
 

 
  /**
 *
 Return Product title of given product id
 *
 **/
  function getProductTitle($pid)
 {
 global $wpdb;
 $ptable=$wpdb->prefix."posts";
 
  $query="SELECT * FROM $ptable WHERE ID=$pid";
  
 $result=$wpdb->get_row($query);
   return $result->post_title;
 
 }

 /**
 *
 Return total number of active products for specific brand
 *
 **/
 function countActiveProducts($brandid)
 {
   return count(getMyProducts($brandid));
 
 }
  /**
 *
 Return total number of sale products for specific brand
 *
 **/
function countSaleProducts($brandid)
{

 global $wpdb;
 $ptable=$wpdb->prefix."posts";
 
  $query="SELECT * FROM $ptable WHERE post_type='shop_order' and post_author=$brandid";
  
 $results=$wpdb->get_results($query);
return count($results);
}
 
  /**
 *
 Return total number of active products for specific brand
 *
 **/
 function lastOrderProducts($brandid)
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
  /**
 *
 Return All information of a given product id
 *
 **/
 function getProductDetailInfo($pid=null)
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
   $result->is_organic=get_post_meta($pid,'is_organic',true);
   $result->price=get_post_meta($pid,'_price',true);
   $result->quantity_products=get_post_meta($pid,'quantity_products',true);
   $result->upc=get_post_meta($pid,'upc',true);
   $result->stock=get_post_meta($pid,'_stock',true);
   $result->type_of_hair=get_post_meta($pid,'type_of_hair',true);
   $result->affiliate_link=get_post_meta($pid,'affiliate_link',true);
   $result->product_tags=get_post_meta($pid,'product_tags',true);
   $result->video=get_post_meta($pid,'product_video_embed',true);
   
  // $val=get_post_meta($pid,'type_of_hair',true);
  // var_dump($val);
 //  exit;
 
 $result->ans=getProdcutAnswers($pid);
 
 return $result;
 
 
 }
 
 
 
 /**
 *
 Return User's all completed order
 *
 **/
 function getAllUserOrders($user_id=null, $status="completed")
 {

    if(!$user_id)
        return false;
    
    $orders=array();//order ids
     
    $args = array(
        'numberposts'     => -1,
        'meta_key'        => '_customer_user',
        'meta_value'      => $user_id,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish'
        /*'tax_query'=>array(
                array(
                    'taxonomy'  =>'shop_order_status',
                    'field'     => 'slug',
                    'terms'     =>$status
                    )
        )  */
    );
    
    $posts=get_posts($args);
    //get the post ids as order ids
    $orders=wp_list_pluck( $posts, 'ID' );
    
    return $orders;

 }
 /**
 *
 Return all products those are already ordered.
 *
 **/
 function getAllOrderedProducts($user_id=false,$status='completed'){

 $orders=getAllUserOrders($user_id,$status);
  //var_dump($orders);
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


 /**
 *
 
 *
 **/
function getHairTypeProducts($userid,$limit=null)
{
$answers=getUserAnswers($userid);
 if(count($answers)<=0)
   return false;
$caterories=getChildCategories($answers[3]);
 $args=array();
 foreach($caterories as $category)
 {
   $args[]=$category->term_id;
 }
 
 $ids=get_type_products($args,null,'desc');
 
 $list=array();
 $i=0;
 if(count($ids)>0)
 foreach($ids as $id)
 {
   if($i==4)
    break;
   $list[]=$id;
   $i++;
 }
 
 
 
 
return $list;
}

function getMenProducts($limit=null)
{

 global $wpdb;
 $qtable=$wpdb->prefix."question_answers";
 $ptable=$wpdb->prefix."posts";
 
 $query="SELECT B.id as id from $qtable as A left join $ptable as B on A.object_id=B.ID  where A.question_id=1 and A.object_type='product' and answer='male' and B.post_status='publish' group by A.object_id";
 $results=$wpdb->get_results($query);
 

 if($results)
 {
    $products=getHeartSortedProducts($results,'desc');
 

   $list=array();
   $i=1;
if($limit and $products)
 foreach($products as $product)
 {
 
    $list[]=$product;
	if($i==$limit)
	 break;
	 $i++;
 }
 
 return $list; 
 }
 
 
 return $results;
 

}



function getHairTextureProducts($userid,$limit=null)
{
$texture=getUserTexture($userid);

 global $wpdb;
 $qtable=$wpdb->prefix."question_answers";
 $ptable=$wpdb->prefix."posts";
 
 $query="SELECT A.* from $qtable as A left join $ptable as B on A.object_id=B.ID  where A.question_id=4 and A.object_type='product'  and B.post_status='publish' group by A.object_id";
 $results=$wpdb->get_results($query);

 $list=array();
 if($results && count($results)>0)
 {
   
  foreach($results as $result)
    {
	   $ids=new stdClass();
	  $texs=explode(',',$result->answer);
	 
       if( in_array($texture,$texs))
	   {

	    $ids->id=$result->object_id;
	    $list[]=$ids;
	  }
	}
	if($list && count($list)>0)
    $products=getHeartSortedProducts($list,'desc');

  if($limit && $products)
    {
      $pids=array();
	  $i=1;
     foreach($products as $p)
	 {
        $pids[]=$p;
		if($i==$limit)
		 break;
		 
		 $i++;
	 }
    }
	
	return $pids;
 }
 
 
 return $results;
 



 
 

}


/*
  catids: category ids like all shampoos, conditioners, etc
  
*/
function getKidsProducts($catids=null,$sort='desc',$limit=null)
{
 global $wpdb;
 $qtable=$wpdb->prefix."question_answers";
 $ptable=$wpdb->prefix."posts";
 
 if($catids)
 {
   $trtable=$wpdb->prefix."term_relationships";
   $tttable=$wpdb->prefix."term_taxonomy";
 
 $cats=implode(',',$catids);
 // $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id IN ($cats) and a.post_type='product' and a.post_status='publish' group by a.ID  order by a.post_date DESC";
 
 
 
 $query="SELECT A.* from $qtable A left join $ptable  B on A.object_id=B.ID LEFT JOIN $trtable C ON B.ID=C.object_id left join $tttable D ON  C.term_taxonomy_id = D.term_taxonomy_id WHERE D.term_id IN ($cats) and A.question_id=12 and A.object_type='product'  and B.post_status='publish' group by A.object_id";
 }
 else{
 $query="SELECT A.* from $qtable as A left join $ptable as B on A.object_id=B.ID  where A.question_id=12 and A.object_type='product'  and B.post_status='publish' group by A.object_id";
 }
 $results=$wpdb->get_results($query);

 $list=array();
 if($results && count($results)>0)
 {
   
  foreach($results as $result)
    {
	   $ids=new stdClass();
	  $texs=explode(',',$result->answer);
	 
       if( in_array(18,$texs))
	   {

	    $ids->id=$result->object_id;
	    $list[]=$ids;
	  }
	}
	if($list && count($list)>0)
    $products=getHeartSortedProducts($list,$sort);

  if($limit && $products)
    {
      $pids=array();
	  $i=1;
     foreach($products as $p)
	 {
        $pids[]=$p;
		if($i==$limit)
		 break;
		 
		 $i++;
	 }
	 return $pids;
	 
    }
	
	return $products;
 }
 
 
 return $results;
 



 
 

}



function getChildCategories($id=null)
{
global $wpdb;

$query="SELECT b.* from $wpdb->term_taxonomy as a left join $wpdb->terms as b on a.term_id=b.term_id WHERE a.parent=$id";
$categories=$wpdb->get_results($query);
return $categories;

}

function sortProducts ($array, $index, $order='asc', $natsort=FALSE, $case_sensitive=FALSE) {
if(is_array($array) && count($array)>0) {
foreach(array_keys($array) as $key) $temp[$key]=$array[$key][$index];
if(!$natsort) ($order=='asc')? asort($temp) : arsort($temp);
else {
($case_sensitive)? natsort($temp) : natcasesort($temp);
if($order!='asc') $temp=array_reverse($temp,TRUE);
}
foreach(array_keys($temp) as $key) (is_numeric($key))? $sorted[]=$array[$key] : $sorted[$key]=$array[$key];
return $sorted;
}
return $array;
}			

/**
*
Returns one dimensional Array of sorted Products based on Total amount of like
*
**/
function getTrendingProducts($limit=null)
{

global $wpdb;
$ptable=$wpdb->prefix."posts";
 
$query="SELECT ID as id from $ptable where post_type='product' and post_status='publish'";

$results=$wpdb->get_results($query);
if(count($results)<1)
return 0;

/**
*
Returns one dimensional Array of sorted Products based on Total amount of like
*
**/
$products=getHeartSortedProducts($results,'desc');

if($limit>0)
{
$i=1;
  $list=array();
foreach($products as $product)
{
$list[]=$product;


if($i>=$limit)
 break;
 $i++;
}
}else
$list=$products;


return $list;
}



function getMenuproducts($args,$userid=null,$type="shampoo")
{

$products=get_type_products($args,20);
		$i=0;	
        $count=0;
		
	     foreach($products as $product)
			{
					

			if($i%4==0)
			{
			$cc=0;
			$count++;
			?>
				   <ul class="products <?php echo 'list-'.$count;?>" id="<?php echo $type.'-list-'.$count;?>">
			<?php } ?>   
             <li class=" span3 product <?php if($i%4==0) echo 'first';?>">
			 <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
            
              <?php getProductContent($product->id,$userid);?>
					         
            </div>
		   </li>
		  <?php  if($cc==3)
			{?>
		    </ul>
			<?php } ?>
			 <?php $i++; $cc++; }  ?>
	 
<?php
}

//return one-d array of products on which specific user commented.
function getMyCommentedProducts($userid,$limit=null)
{
 global $wpdb;
 $ptable=$wpdb->prefix."product_comments";
 $query="select * from $ptable where object_type='product' and user_id=$userid and status!=2 group by object_id order by created desc";
 if($limit)
 $query.=" limit $limit";
 
 $results=$wpdb->get_results($query);
 $list=array();
 if(count($results)>0)
  foreach($results as $result)
   $list[]=$result->object_id;
return $list;
}

 /**
 *
 Return formatted string
 *
 **/
function getFormatedDes($des)
{

     $des=stripslashes($des);
	 $des=stripslashes($des);
	 $des=stripslashes($des);
	 $des=stripslashes($des);
	 
	 return $des;
		             
}


 /**
 *
 Return more active products those are uploaded today for specific brand
 *
 **/
   function getMoreActiveProducts($limit=null)
   {
        global $wpdb;
       $table=$wpdb->prefix."brand_info";
      $now=time();
      $now=$now-2592000;	  

	   
      $query="SELECT count( * ) AS count, object_id FROM wp_feeds where `object_type`='product' and `created` > $now GROUP BY object_id ORDER BY count desc";
	  if($limit)
	  $query.=" limit $limit";
	 
	  $results=$wpdb->get_results($query);
  	    return $results;
   
   }
   
   
      function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}




function getQuickMatchingProducts($answers=null,$catid=null,$matching=6)
{
  if(!$answers)
  {
   return false;
   }

  global $wpdb;
  $trtable=$wpdb->prefix."term_relationships";
  $tttable=$wpdb->prefix."term_taxonomy";
  $ptable=$wpdb->prefix."posts";
  if($catid)
  {
  
  $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id =$catid and a.post_status='publish'";
  }else
  {
  $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id =$answers[3] and a.post_status='publish'";
  }

  $results=$wpdb->get_results($query);
$productids=array();
$allproducts=array();
$matchcount=array();
if($results)
  foreach($results as $result)
  {
   $anscount=0;
   $pans=getProdcutAnswers($result->id);
  
    if($pans)
	 {
	  
	
	   foreach($answers as $key=>$ans)
	    {
		
		  if(is_match_ans($key,$ans,$pans[$key]))
		  {
		   
		    $anscount++;
		  
		  }
		    
		 
		
	
		
		
		
		}
	

	    $productids[$anscount][]=$result->id;
		if($anscount>0)
	   $allproducts[]=array('id'=>$result->id,'anscount'=>$anscount);
	 
	 
	 }
	 
	 
	 


  }
  
  

$productmatchs=$productids[$matching];
  
  if($limit && count($productmatchs)>0)
   {
     $list=array();
      $count=0;
      foreach($productmatchs as $p)
	  {
	  
	  $list[]=$p;
	  $count++;
	  
	  if($count==$limit)
	   break;
	  
	  }
    
     return $list;
   
   }
  
  
 
return $productmatchs;

}


 

function addProdcutToLibrary($post)
{
if(isMYLibrary($post['uid'],$post['id']))
{
 return "You already have this product to the library.";

}else
{
 global $wpdb;
   $table=$wpdb->prefix."my_library";

     $data=array();
		 $data['product_id']=$post['id'];
		 $data['user_id']=$post['uid'];
		  $data['created']=time();
		  	  $data['status']=1;
	  
	 $wpdb->insert( $table, $data);
return "This Product Has Been Added To Your Hair Library.";
}

}
   

 function isMYLibrary($userid,$productid)
 {
 
    global $wpdb;
   $table=$wpdb->prefix."my_library";
 
  $query="select * from $table where user_id=$userid and product_id=$productid and status!=2";
 $results=$wpdb->get_results($query);
  if(count($results)>0)
   return true;
   
   return false;
 
 }   
 
 function isFirstStory($productid)
 {

 global $wpdb;
   $table=$wpdb->prefix."user_photo_tag";
   $btable=$wpdb->prefix."user_photos";
  $query="select * from $table as a left join $btable as b on a.photo_id=b.id where a.product_id=$productid and b.status!=2";
  $results=$wpdb->get_results($query);
  if(count($results)>0)
   return false;
   
   return true;
 
 }
 
 function getRandomProduct()
 {
  global $wpdb;
  $table=$wpdb->prefix."posts";
  $query="select * from $table where post_type='product' and post_status='publish' order by rand() limit 1";
   $results=$wpdb->get_results($query);
   return $results[0];
 }
 
  
 function getRandomProducts($limit)
 {
  global $wpdb;
  $table=$wpdb->prefix."posts";
  $query="select * from $table where post_type='product' and post_status='publish' order by rand() limit $limit";
   $results=$wpdb->get_results($query);
   return $results;
 }
 
 
 
 
   function fillterMatches($matches,$haircondition =null, $hccat = null){
   if(count($matches)<1)
		return $matches;
   if(!$hccat && !$haircondition)
	return $matches;
$list1 = array();
$list = array();
$ans = getAllProdcutAnswers();
	if($haircondition){
	foreach($matches as $match)
	if($haircondition==$ans[$match]['7'])
		$list1[] = $match;

	}
	
	
	if($hccat)
	{
	if($haircondition){
		if(count($list1)>0)
		foreach($list1 as $lt){
		
		if($hccat==get_post_meta($lt, 'type_of_product', true))
			$list[] = $lt;
		}			
	}else{
	foreach($matches as $match){
	  if($hccat==get_post_meta($match, 'type_of_product', true))
	    {
		$list[] = $match;
	    }
	 }
	
	}
   }
   else
  return $list1;

   return $list;
   }
   
   
   function getAjaxMatches($idstring)
   {
     $ids=explode('-',$idstring);
	 $string="";
	 
	 foreach($ids as $id)
	 {?>
	  <li class=" span3 product">
      <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
      <span class="onsale "></span>
	    <?php  getProductContent($id);?>
	 </div>
	 </li>
	 <?php }
	 
  
   }
   
   
   function getCollectionPage($productid)
   {
   
     global $wpdb;
     $table=$wpdb->prefix."postmeta";
	 $query="select * from $table where meta_key='collection_product_items'";
     $results=$wpdb->get_results($query);
	 $collection=null;
	 
	 foreach($results as $result)
	 {
	   $ids=explode(',',$result->meta_value);
	   if(in_array($productid,$ids))
	   {
	    $collection=$result->post_id;
		break;
		}
	 
	 }
   
   return $collection;
   }

   
   
  
   
 ?>