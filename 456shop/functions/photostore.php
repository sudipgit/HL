<?php

 function saveStoryPhoto($post=null,$filedata=null)
 {
  if($post['id']>0)
   {
   updatePhotoInfo($post);
   return $post['id'];
   }
 global $wpdb;
 
    if($filedata)
   {
   
   	 $path=ABSPATH.'wp-content/uploads/photostore/';
     $mixer=uploadProImage($filedata,$post['user_id'],$path);
    
     $imagepath=$mixer.'_'.$filedata['filedata']['name'];
     $thumbpath ="thumb_". $mixer.'_'. $filedata['filedata']['name'];
        
   
   }
 


 if(!$mixer)
   return false;
   
   $bdata=array();
   
     $com_name=strtolower($post['title']);
	 if($com_name=="" || $com_name==" ")
        $com_name=implode(' ', array_slice(explode(' ', $post['description']), 0, 4));

		
       $names=getFormatedDes($com_name);
		  
       $names=str_replace('-',"",$names);
	   $names=str_replace('=',"",$names);
	   $names=str_replace('!',"",$names);
	   $names=str_replace('?',"",$names);
	   $names=str_replace('/',"",$names);
       $names=str_replace('.',"",$names);
	   $names=str_replace("'","",$names);
	   $names=str_replace("&","",$names);
       $slug=str_replace(' ','-',$names);
      
	  
	  if(!isuniqueSlug($slug))
	  {
	     for($i=0;$i<20;$i++)
		 {
	     $slug=$slug.'2';
		  if(isuniqueSlug($slug))
		   break;
		 }
	   
	   
	   }
   
  $bdata['photo']=$imagepath;
  $bdata['thumb']=$thumbpath;
  $bdata['user_id']=$post['user_id'];
   $bdata['slug']=$slug;
  $bdata['description']=$post['description'];
   //$bdata['date']=strtotime($post['date']);
   $bdata['title']=$post['title'];
   $bdata['video']=$post['addvedio'];
   $bdata['tag_text']=$post['texttags'];
   $bdata['biz_id']=getSalonIdBySlug($post['biz']);
  $bdata['created']=time();
 
 $bdata['category_tags']=implode('-',$post['category_tags']);

   $btable=$wpdb->prefix."user_photos";
  
  $wpdb->insert( $btable, $bdata); 

  $photoid= $wpdb->insert_id;
  
  
  if(!$photoid)
   return false;
   
   saveFeed($photoid,'photo',$post['user_id'],'upload',$photoid);
   insertPhotoTags($photoid,$post);
 
 return $photoid;
 }
 
 function isuniqueSlug($slug)
 {
  global $wpdb;
 $ptable=$wpdb->prefix."user_photos";

 $query="select * from $ptable where slug='".$slug."'";
 $results=$wpdb->get_results($query);
 if(count($results)>0)
  return false;
  else
  return true;
 
 }
  
 function updatePhotoInfo($post)
 {
 //return true;
   global $wpdb;
 $btable=$wpdb->prefix."user_photos";
  $bdata=array();
  $bdata['description']=$post['description'];

   $bdata['title']=$post['title'];
   $bdata['video']=$post['addvedio'];
   $bdata['tag_text']=$post['texttags'];
 
 $bdata['category_tags']=implode('-',$post['category_tags']);
 
$wpdb->update( $btable, $bdata, array( 'id' =>$post['id'] ));

 }

function  insertPhotoTags($photoid,$post)
{
 
 global $wpdb;
 $ttable=$wpdb->prefix."user_photo_tag";
 
 if($post['tag_pro_id'])
 {
  $tagdata=array();
		 $tagdata['photo_id']=$photoid;
		 $tagdata['product_id']=$post['tag_pro_id'];
	  
	    $wpdb->insert( $ttable, $tagdata); 
 }
 /*
   if(count($post['tags'])>0)
   {
      foreach($post['tags'] as $pid)
	  {
	     $tagdata=array();
		 $tagdata['photo_id']=$photoid;
		 $tagdata['product_id']=$pid;
	  
	    $wpdb->insert( $ttable, $tagdata); 
	  
	  
	  
	  }
   
   
   
   
   }
   
   */
       
	   
	   return true;



}



/**
returns all photo of specific user if user id exist, else return all photo of user_photos
**/
function getAllPhotos($user_id=null,$limit=0,$is_single=false)
{
 global $wpdb;
 $ptable=$wpdb->prefix."user_photos";
 if($user_id)
 $query="select * from $ptable where user_id=$user_id AND status!=2 order by created desc";
 else
 $query="select * from $ptable where status!=2 order by created desc";
 
 if($limit>0)
  $query=$query." limit $limit";
 $results=$wpdb->get_results($query);
if($is_single)
  return $results;

 if(count($results)>0)
 {
    $list=array();
	$i=0;
	foreach($results as $result)
	{
	   $index=$i%4;
	   
	   $list[$index][]=$result;
	  
	$i++;
	}
 
 
 
 }
 
 
return $list;


}


function getAllOtherPhotos($user_id,$photo_id,$limit=0)
{
 global $wpdb;
 $ptable=$wpdb->prefix."user_photos";

 $query="select * from $ptable where user_id=$user_id and id!=$photo_id and status!=2";

 
 if($limit>0);
  $query=$query." limit $limit";
 
 $results=$wpdb->get_results($query);

  return $results;



}

function getOtherUserPhotos($user_id=null,$limit=0)
{
 global $wpdb;
 $ptable=$wpdb->prefix."user_photos";

 $query="select * from $ptable where user_id!=$user_id AND status!=2";
  if($limit>0);
  $query=$query." limit $limit";
  
 $results=$wpdb->get_results($query);
  return $results;
}
/*returns one-d array of related photos*/
function getRelatedPhotos($user_id,$cats=null,$limit=0)
{
$photos=getOtherUserPhotos($user_id);
$list=array();
$i=0;
if($photos)
 foreach($photos as $photo)
 {
     $tags=explode('-',$photo->category_tags);
	 if(count($tags)>0)
	 {
	   foreach($tags as $tag)
        if(in_array($tag,$cats))	
        {
          $list[]=$photo;
		  $i++;
		  break;

		 }		
	 
	 
	 }
	 
	 if($i>=$limit && $limit>0) 
	  break;
 }

return $list;
}



 //returns photo details given photo id
function getPhotoDetails($id)
{
     global $wpdb;
 $ptable=$wpdb->prefix."user_photos";
 $query="select * from $ptable where id=$id";

 
 $result=$wpdb->get_row($query);
$result->tags=getPhotoTags($id);
 
 return $result;

}
/**returns photo details by slug**/
function getPhotoDetailsBySlug($slug)
{
     global $wpdb;
 $ptable=$wpdb->prefix."user_photos";
 $query="select * from $ptable where slug='".$slug."'";

 
 $result=$wpdb->get_row($query);
$result->tags=getPhotoTags($result->id);
 
 return $result;

}

function getPhotoTags($photoid)
{

    global $wpdb;
    $ttable=$wpdb->prefix."user_photo_tag";
    $query="select * from $ttable where photo_id=$photoid";
    $results=$wpdb->get_results($query);
	
	return $results;
}


function getRecommendedProducts($cat_tags,$limit=5)
{
 $product_cats= getTaggedCatIds($cat_tags);

$pids=get_type_products($product_cats,null,$sort,$price);

shuffle($pids);

$product_ids=array();
for($i=0;$i<$limit;$i++)
{
$product_ids[]=$pids[$i]->id;

}
return $product_ids;
/*
  global $wpdb;
  $trtable=$wpdb->prefix."term_relationships";
  $tttable=$wpdb->prefix."term_taxonomy";
  $ptable=$wpdb->prefix."posts";
  
$catlist=array(1=>179,2=>180,3=>250,4=>188,5=>181,6=>178,7=>21,8=>187,9=>189);
if(count($cat_tags)>0)
{
   $catids=array();
   foreach($cat_tags as $tag)
   {
      $catids[]=$catlist[$tag];
    }  
 $cats=implode(',',$catids);
 $query="SELECT a.ID as id FROM $ptable a LEFT JOIN $trtable b ON a.ID=b.object_id left join $tttable c ON  b.term_taxonomy_id = c.term_taxonomy_id WHERE c.term_id IN ($cats) and a.post_type='product' and a.post_status='publish' group by a.ID  order by a.post_date DESC";
 

 $results=$wpdb->get_results($query);
$ids=array();
$i=0;
 if($results)
 foreach($results as $result)
 {
   if($i<$limit)
   {
   $ids[]=$result->id;
   
   }
 
 $i++;
 }
 
 return $ids;




	

}*/




}




function getProductPhotos($productid,$limit=0)
{
 global $wpdb;
 $ptable=$wpdb->prefix."user_photos";
 $pttable=$wpdb->prefix."user_photo_tag";

 $query="select B.* from $pttable A left join $ptable B on A.photo_id=B.id where A.product_id=$productid and B.status!=2";
 if($limit>0);
  $query=$query." limit $limit";
 
 $results=$wpdb->get_results($query);

  return $results;




}

function isMyPhoto($id,$userid)
{

  $photo=getPhotoDetails($id);
 if($photo->user_id==$userid)
  return ture;
  
  
  return false;

}

function deletePhoto($id)
{

  if($id<1)
	  return false;
   $user=wp_get_current_user();  
  if(!isMyPhoto($id,$user->ID))	  
	 return false;
	  
 global $wpdb;
 $ptable=$wpdb->prefix."user_photos";
 $ltable=$wpdb->prefix."likes";
 $ftable=$wpdb->prefix."feeds";
 

 $wpdb->query("UPDATE $ptable SET `status` =2  WHERE `id` = $id");
 $wpdb->query("UPDATE $ltable SET `status` =2  WHERE `object_id` = $id AND `object_type`= 'photo'");
 $wpdb->query("UPDATE $ftable SET `status` =2  WHERE `object_id` = $id AND `object_type`= 'photo'");


 
 return true;

}


function getPhotoHtml($photo=null)
{
if(!$photo)
 return false;
$current_user = wp_get_current_user();
 $thumbpath=getThumbPath($photo->user_id);
 $puser_info=get_userdata( $photo->user_id );
 $tag_products=getTaggedProductIds($photo->id);
 $product=get_post($tag_products[0]->product_id);
  $brand= get_brand_info($product->post_author);
  //var_dump($product);
  //var_dump($brand->company_slug);
 $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($product->ID),array(60,60));
   $year=date('Y',$photo->created);
//var_dump($featured_image);



 $excerpt = getFormatedDes($photo->description);
 
	$output='<div class="photo on-photo feed center-thumb">
                  	  <div class="img">
					 
						<a href="http://hairlibrary.com/hairstory/?n='.$photo->slug.'&user='.$puser_info->user_login.'&brand='.$brand->company_slug.'&p='.$product->post_name.'"><img alt="'.getFormatedDes($photo->title).'" src="http://hairlibrary.com/wp-content/uploads/photostore/'.$year.'/'.$photo->photo.'"/></a>';
			if($featured_image){
			$output.='<div class="feed-product-thumb">
				<div class="inner-circle"><div class="inner-round"><a href="'.get_permalink($product->ID).'"><img alt="featured image" src="'.$featured_image[0].'" height="55" width="55" />	</a></div></div>
				</div>';
			}

			if($photo->video){
			$v = explode('?v=',$photo->video);
				$output.='<a class="hs-video-popup" href="javascript:void();" title="'.$v[1].'"><img alt="featured image" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/ArrrowPinkSmall.png" height="36" width="36" /></a>';
			}			
			$output.='</div> 
			 <h2 class="photo_title"> <a href="http://hairlibrary.com/hairstory/?n='.$photo->slug.'&user='.$puser_info->user_login.'&brand='.$brand->company_slug.'&p='.$product->post_name.'">'.getFormatedDes($photo->title).'</a> </h2>
			<h3 class="user_first_name"><a href="http://hairlibrary.com/profile/?n='.$puser_info->user_login.'">'.getFormatedDes($puser_info->first_name).'</a> </h3>				   
			<p class="photo_description">'.implode(' ', array_slice(explode(' ', $excerpt), 0, 20)).'...</p>
			 <div class="feed-heart-button">';
              	$output.=getListHeartButtonHtml($photo->id,$current_user->ID,'photo',$photo->id);				   
				   
				$output.='</div>
			<a href="'.getPhotoLink($photo->id).'" class="read_more pull-right">Read More</a>
			<div class="clear"></div>
			</div>';

return $output;
				    
}
/**returns tagged products by photo id**/
function getTaggedProductIds($photoid)
{
global $wpdb;
 $pttable=$wpdb->prefix."user_photo_tag";

 $query="select * from $pttable where photo_id=$photoid";
 $results=$wpdb->get_results($query);

  return $results;

}

function  getTaggedCatIds($tags)
{
  $product_cats=array();
 if($tags && count($tags)>0)
  foreach($tags as $tag)
  {
    
	switch($tag)
	{
	 
	 // Locks
	  case 1:
        $product_cats[]=292;
		$product_cats[]=291;
		$product_cats[]=290;
		$product_cats[]=289;
		$product_cats[]=192;
		$product_cats[]=291;
		$product_cats[]=243;
		$product_cats[]=243;
		$product_cats[]=245;
		$product_cats[]=246;
		$product_cats[]=247;
		$product_cats[]=248;
		$product_cats[]=268;
		break;
		
	  
		// Curly
	case 2:
        $product_cats[]=307;
		$product_cats[]=308;
		$product_cats[]=309;
		$product_cats[]=310;
		$product_cats[]=221;
		$product_cats[]=223;
		$product_cats[]=237;
		$product_cats[]=238;
		$product_cats[]=239;
		$product_cats[]=240;
		$product_cats[]=241;
		$product_cats[]=242;
		$product_cats[]=272;
		break;
			// Barids
		case 3:
         $product_cats[]=285;
		$product_cats[]=286;
		$product_cats[]=287;
		$product_cats[]=288;
		$product_cats[]=253;
		$product_cats[]=254;
		$product_cats[]=256;
		$product_cats[]=257;
		$product_cats[]=259;
		$product_cats[]=260;
		$product_cats[]=261;
		$product_cats[]=262;
		$product_cats[]=266;
		break;
		
		// Relaxed Straight
	  case 4:
        $product_cats[]=301;
		$product_cats[]=302;
		$product_cats[]=303;
		$product_cats[]=304;
		$product_cats[]=205;
		$product_cats[]=207;
		$product_cats[]=231;
		$product_cats[]=232;
		$product_cats[]=233;
		$product_cats[]=234;
		$product_cats[]=235;
		$product_cats[]=236;
		$product_cats[]=274;
		break;
		// extension
	  case 5:

        $product_cats[]=283;
		$product_cats[]=312;
		$product_cats[]=294;
		$product_cats[]=300;
		$product_cats[]=306;
		
		break;
		// color
	  case 6:

        $product_cats[]=261;
		$product_cats[]=340;
		$product_cats[]=228;
		$product_cats[]=234;
		$product_cats[]=246;
		
		break;
		
		// Naturally Straight
	  case 7:
        $product_cats[]=295;
		$product_cats[]=296;
		$product_cats[]=297;
		$product_cats[]=298;
		$product_cats[]=176;
		$product_cats[]=177;
		$product_cats[]=225;
		$product_cats[]=226;
		$product_cats[]=227;
		$product_cats[]=228;
		$product_cats[]=229;
		$product_cats[]=230;
		$product_cats[]=263;
		break;

      // wigs
	  case 8:

        $product_cats[]=284;
		$product_cats[]=322;
		$product_cats[]=293;
		$product_cats[]=299;
		$product_cats[]=305;
		
		break;
		
		
	}
  
  
  
  
  
  
  
  
  }
 return $product_cats;

}

/**Returns current user's featured photo**/
function getFeaturedPhotos($userid=null,$limit=null)
{
  if(!$userid)
   return false;
  $r_photos=array();
  $reverve=array();
  $userans=getUserAnswers($userid);
  $list=array(179=>1,189=>2,250=>3,188=>4,180=>7);
  $cat_tag=$list[$userans[9]];
  $photos=getAllPhotos(null,null,true);
  if(count($photos)>0)
   foreach($photos as $photo)
   {
		 $tags=explode('-',$photo->category_tags);
		 if(count($tags)>0)
		 {
		    if(in_array($cat_tag,$tags))
		    {
		      $r_photos[]=$photo;
		    
			}else
			$reverve[]=$photo;
	     }
   
   }
 
 if(count($r_photos)>0)   
   shuffle($r_photos);
if(count($reverve)>0) 
{
		shuffle($reverve);

		foreach($reverve as $rev)
		{
		$r_photos[]=$rev;
		}
}

$rec_photos=array();
if(count($r_photos)>$limit)
{
for($i=0;$i<$limit;$i++)
{
$rec_photos[]=$r_photos[$i];

}
  return $rec_photos; 

}

else  
  return $r_photos; 
   
}
//returns total number of photos of a user
function countPhotos($user_id)
{
 global $wpdb;
 $ptable=$wpdb->prefix."user_photos";
 $query="select count(*) as count1 from $ptable where user_id=$user_id AND status!=2";
 $result=$wpdb->get_row($query);
	
	return $result->count1;
	
}


function getCategoryTaggedPhotos($tag_cat,$limit=null)
{
 global $wpdb;
 $ptable=$wpdb->prefix."user_photos";
 $query="select * from $ptable where status!=2 order by created DESC";
 $results=$wpdb->get_results($query);
 
 $photos=array();
 $count=0;
 if(count($results)>0)
 foreach($results as $result)
 {
   $tags=explode('-',$result->category_tags);
  if(in_array($tag_cat,$tags))
  {
   $photos[]=$result;
    $count++;

   }
   
   if($limit && $limit==$count)
    break;
   
 }
 return $photos;

}


function fourColumnCatTaggedPhotos($tag_cat,$limit=null)
{
$results=getCategoryTaggedPhotos($tag_cat,$limit);
$list=array();
 if(count($results)>0)
		 {
			
			$i=0;
			foreach($results as $result)
			{
			   $index=$i%4;
			   
			   $list[$index][]=$result;
			  
			$i++;
			}
		 
		 
		 
		 }
return $list;		 
}



function getPhotoLink($id)
{
$photo=getPhotoDetails($id);
 $puser_info=get_userdata( $photo->user_id );
 $tag_products=getTaggedProductIds($photo->id);
 $product=get_post($tag_products[0]->product_id);
  $brand= get_brand_info($product->post_author);
$link='http://hairlibrary.com/hairstory/?n='.$photo->slug.'&user='.$puser_info->user_login.'&brand='.$brand->company_slug.'&p='.$product->post_name;


return $link;


}

