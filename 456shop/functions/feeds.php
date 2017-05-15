<?php

 function saveFeed($objectid,$objecttype,$actorid,$feedtype,$feedtypeid=null)
 {
    if($actorid > 0 && $objectid > 0)
	{
   
       global $wpdb;
       $table=$wpdb->prefix."feeds";
 

     $data=array();
		 $data['object_id']=$objectid;
		 $data['object_type']=$objecttype;
		 $data['feed_type']=$feedtype;
		  $data['feed_type_id']=$feedtypeid;
		  $data['actor_id']=$actorid;
		  $data['created']=time();
	  
	    $wpdb->insert( $table, $data); 
	}
		return true;
 
 }
 
 
 function getAllFeeds($limit=0,$orderby='created desc')
 {
 
    global $wpdb;
    $table=$wpdb->prefix."feeds";
	$query="select * from $table where feed_type!='follow' and `status`!=2 and actor_id > 0 order by $orderby";
	if($limit>0)
	$query.=" limit $limit";

   $results=$wpdb->get_results($query);

   
		  if(count($results)>0)
		 {
			$list=array();
			$i=0;
			foreach($results as $result)
			{
			   $index=$i%4;
			     $result->actor=get_userdata($result->actor_id);
				  $result->photo=getFeedImage($result->object_id,$result->object_type);
		           $result->feedowner=getFeedOwner($result->object_id,$result->object_type);
			   
			   $list[$index][]=$result;
			  
			$i++;
			}
		 
		 
		 
		 }
		 
		 
		return $list;
 }
 
 
 
 function getFollowersFeeds($followers=null,$limit=0,$column=true)
 {
    if(!$followers)
	return false;
	
    global $wpdb;
    $table=$wpdb->prefix."feeds";
	 $f=implode(',',$followers);
	  $query="select * from $table where feed_type!='follow'  and status!=2  and  actor_id IN ($f) order by created desc";
	
	
	if($limit>0)
	$query.=" limit $limit";

   $results=$wpdb->get_results($query);

   
		  if(count($results)>0)
		 {
			$list=array();
			$i=0;
			foreach($results as $result)
			{
			   $index=$i%4;
			     $result->actor=get_userdata($result->actor_id);
				  $result->photo=getFeedImage($result->object_id,$result->object_type);
		           $result->feedowner=getFeedOwner($result->object_id,$result->object_type);
			   
			   if($column)
			    $list[$index][]=$result;
				else $list[]=$result;
			  
			$i++;
			}
		 
		 
		 
		 }
		 
		 
		return $list;
 }
 
 
 
 
 function getFeedOwner($objectid,$objecttype)
 {
    global $wpdb;
   
    if($objecttype=='photo')
	{
	  $table=$wpdb->prefix."user_photos";
	  $query="select * from $table where id=$objectid";
	  $result=$wpdb->get_row($query);
	  return get_userdata($result->user_id);
	}
	else if($objecttype=='product')
	{
	 $table=$wpdb->prefix."posts";
	 $query="select * from $table where ID=$objectid";
	 $result=$wpdb->get_row($query);
	  return get_userdata($result->author_id);
	}
 
    

 
 }
 
 
 function getFeedImage($objectid,$objecttype)
 {
    global $wpdb;
   
    if($objecttype=='photo')
	{
	  $table=$wpdb->prefix."user_photos";
	  $query="select * from $table where id=$objectid";
	}
	else if($objecttype=='product')
	{
	 $table=$wpdb->prefix."posts";
	 $query="select * from $table where ID=$objectid";
	}
 
    $result=$wpdb->get_row($query);
	return $result;
 
 }
 
  
  
  function getFeedDescription($objecttype,$feedtype)
 {
 
 $des=$feedtype.' '.$objecttype;
 return $des;
 
 
 }
 
function getMoreFeeds($page=1)
 {
    $current_user = wp_get_current_user();
  $matches=getMatchingProducts($current_user->ID);
   $output=array();
   $results=getAllAjaxFeeds($page);
 
   
   
   $output[val1]=getFeedsContent($results[0],$matches);
   $output[val2]=getFeedsContent($results[1],$matches);
   $output[val3]=getFeedsContent($results[2],$matches);
   $output[val4]=getFeedsContent($results[3],$matches);
   
   
 return $output;
 }
 
 
 
  function getAllAjaxFeeds($page=1)
 {
    $min=($page-1)*40;
   $max=$page*40;
    global $wpdb;
    $table=$wpdb->prefix."feeds";
	$query="select * from $table where feed_type!='follow' and status!=2 order by created desc";
	$query.=" limit $max";

   $results=$wpdb->get_results($query);

   $count=0;
      if(count($results)>$min)
      {
	      
           $list=array();
			$i=0;
			foreach($results as $result)
			{
			   if($count>=$min)
			   {
			   $index=$i%4;
			     $result->actor=get_userdata($result->actor_id);
				  $result->photo=getFeedImage($result->object_id,$result->object_type);
		           $result->feedowner=getFeedOwner($result->object_id,$result->object_type);
			   
			 
			    $list[$index][]=$result;
				
			  
			   $i++;
			   }
			    $count++;
			}
   
  
      }
   
   return $list;
   }
   
   
   function getFeedsContent($results,$matches=null)
   {

      if(count($results)==0)
	    return false;
		  $output="";
		 foreach($results as $feed)
				  {
				  if($feed->object_type=='product' && $matches && count($matches)>0 && in_array($feed->object_id,$matches))
		            $output.=getFeedHtml($feed,true);
				  else
                    $output.=getFeedHtml($feed);				  
              }
   
   return $output;
   
   }
   
   
   function getAllMobileFeeds($limit=0,$orderby='created desc')
 {
 
    global $wpdb;
    $table=$wpdb->prefix."feeds";
	$query="select * from $table where feed_type!='follow' and status!=2 order by $orderby";
	if($limit>0)
	$query.=" limit $limit";

   $results=$wpdb->get_results($query);

   
		  if(count($results)>0)
		 {
			$list=array();
			foreach($results as $result)
			{
			   
			     $result->actor=get_userdata($result->actor_id);
				  $result->photo=getFeedImage($result->object_id,$result->object_type);
		           $result->feedowner=getFeedOwner($result->object_id,$result->object_type);
			   
			   $list[]=$result;
			  
			
		 
		 
		 
		 }
		 }
		 
		return $list;
 }
  
   
   
  function getMoreMobileFeeds($page=1)
 {
    $min=($page-1)*40;
   $max=$page*40;
    global $wpdb;
    $table=$wpdb->prefix."feeds";
	$query="select * from $table where feed_type!='follow' and status!=2  order by created desc";
	$query.=" limit $max";

   $results=$wpdb->get_results($query);

   $count=0;
      if(count($results)>$min)
      {
           $list=array();
			$i=0;
			foreach($results as $result)
			{
			   if($count>$min)
			   {
			
			     $result->actor=get_userdata($result->actor_id);
				  $result->photo=getFeedImage($result->object_id,$result->object_type);
		           $result->feedowner=getFeedOwner($result->object_id,$result->object_type);
			   
			 
			    $list[]=$result;
				
			  
			   $i++;
			   }
			    $count++;
			}
   
  
      }
   
 $output=getFeedsContent($list);
 return $output;
   }
   
   
function getFeedHtml($feed=null,$ismatch=false)
   {
   $current_user = wp_get_current_user();
      if(!$feed)
	    return false;
		
		$output.='<div class="feed photo on-photo">';
			if($ismatch)
			$output.='<span class="onsale"></span>';
		 if($feed->object_type=='photo'){ 
				
				 $puser_info=get_userdata( $feed->photo->user_id );
				 $tag_products=getTaggedProductIds($feed->photo->id);
				 $product=get_post($tag_products[0]->product_id);
				  $brand= get_brand_info($product->post_author);
				  
					 if($feed->feed_type=='upload')
  					  $text="";
					  else if($feed->feed_type=='comment') 
					   $text='<p class="activity-text"><a href="http://hairlibrary.com/profile/?n='.$feed->actor->user_login.'">'.getFormatedDes($feed->actor->first_name).'</a> commented on this';					       
					 else
					 $text='<p class="activity-text"><a href="http://hairlibrary.com/profile/?n='.$feed->actor->user_login.'">'.getFormatedDes($feed->actor->first_name).'</a> likes this';	
					
				
				
				 $output.='<div class="img"><img class="photo-badge" width="32" alt="youtube" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/youtube.png">
				   <a href="http://hairlibrary.com/hairstory/?n='.$feed->photo->slug.'&user='.$puser_info->user_login.'&brand='.$brand->company_slug.'&p='.$product->post_name.'"><img alt="photostore" src="http://hairlibrary.com/wp-content/uploads/photostore/'.date('Y',$feed->photo->created).'/'.$feed->photo->photo.'"/></a>' ;
	   
	   
	   				  $output.=' <div class="owner-thumb">
				    <div class="member-thumb">
				   <div class="thumb mini-circle '.getUserHairStyle($feed->actor->ID).'">';
			   
					 $thumbpath=getThumbPath($feed->actor->ID);
				
					$output.='<a href="http://hairlibrary.com/profile/?n='.$feed->actor->user_login.'"><img alt="profile" src="'.$thumbpath.'" width="50"/></a>
						 </div>	</div>
			       </div>';
	   
	         if($feed->photo->video){
			$v = explode('?v=',$feed->photo->video);
				$output.='<a class="hs-video-popup" href="javascript:void();" title="'.$v[1].'"><img alt="featured image" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/ArrrowPinkSmall.png" height="36" width="36" /></a>';
			}	
	   
	   
				  $output.='</div>'.$text.'
				  <h4 class="feed-photo-title"> <a href="http://hairlibrary.com/hairstory/?n='.$feed->photo->slug.'&user='.$puser_info->user_login.'&brand='.$brand->company_slug.'&p='.$product->post_name.'">'.getFormatedDes($feed->photo->title).'</a> </h4>
				   <p class="product-brand-name"> <a href="http://hairlibrary.com/profile/?n='.$puser_info->user_login.'">'.getFormatedDes($puser_info->first_name).'</a></p>
				  <div class="feed-heart-button">';
				  $output.=getListHeartButtonHtml($feed->photo->id,$current_user->ID,'photo',$feed->id,'http://hairlibrary.com/photo/?id='.$feed->photo->id);
				$output.='</div><a href="'.getPhotoLink($feed->photo->id).'" class="read_more pull-right">Read More</a><div class="clear"></div>';
				  
				  } else if($feed->object_type=='product') {
                       $brand=null;   
						   $ppost=get_post($feed->object_id);
						   $brand= get_brand_info($ppost->post_author);
						   $companyname=getFormatedDes(strtolower($brand->company_name));
						    if($feed->feed_type=='upload')
  					          $text="";
						   else if($feed->feed_type=='comment') 
					         $ptext='<p class="activity-text"><a href="http://hairlibrary.com/profile/?n='.$feed->actor->user_login.'">'.getFormatedDes($feed->actor->first_name).'</a> commented on this';
					        else
					         $ptext='<p class="activity-text"><a href="http://hairlibrary.com/profile/?n='.$feed->actor->user_login.'">'.getFormatedDes($feed->actor->first_name).'</a> likes this';
				   
				   $output.='<div class="img product-thumb">
							  <a href="'.post_permalink($feed->object_id).'">';
                             if (has_post_thumbnail($feed->object_id)) {
								
								 $output.=get_the_post_thumbnail($feed->object_id, array(260,260) );
								}else{
							
								
						 $output.='<img width="400" height="400" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/placeholder.png">';
								
								}
								
								$output.='</a>';
					
					if($feed->feed_type=='upload'){
					     
                       
					 $output.=' <div class="owner-thumb" style="padding-top:5px">
				     <div class="thumb" style="background:none">
			   
						 <a href="http://hairlibrary.com/profile/?n=hairlibrary"><img alt="logo" src="http://hairlibrary.com/wp-content/uploads/userphoto/hl_logo.png" width="50"/></a>
                       </div>						
			       </div>';
				 } else {
				    $output.='<div class="owner-thumb">
				       <div class="member-thumb">
				   <div class="thumb mini-circle '.getUserHairStyle($feed->actor->ID).'">';
			   
					 $thumbpath=getThumbPath($feed->actor->ID);
					$output.=' <a href="http://hairlibrary.com/profile/?n='.$feed->actor->user_login.'"><img alt="profile" src="'. $thumbpath.'" width="50"/></a>
                       </div>	
					   </div>					
			       </div>';
				   }
				   	
					$output.='</div>'.$ptext.'
					<h4 class="feed-photo-title"> <a href="'.post_permalink($feed->object_id).'">'.get_the_title($feed->object_id).'</a> </h4>      
                    <p class="product-brand-name"> <a href="http://hairlibrary.com/brand?n='.getBrandSlug($brand->user_id).'">'. $companyname.'</a></p><div class="feed-heart-button">';
					  
					  $output.=getListHeartButtonHtml($feed->photo->ID,$current_user->ID,"product",$feed->id,post_permalink($feed->object_id));
					  $output.='</div><a href="'.get_permalink($feed->object_id).'" class="read_more pull-right">Read More</a><div class="clear"></div>';
					  $time=time()-strtotime($ppost->post_date);
                       if($time<604800)  { 
					    $output.='<span class="new-in">New!</span>';
					 }  				   
				   } 
				 $output.='</div>';
		
   
   
   return $output;
   
   }
   
   
   
   
/*
   
   function getFeedHtml($feed=null)
   {
   $current_user = wp_get_current_user();
      if(!$feed)
	    return false;
		
		$output.='<div class="feed photo on-photo">';
			
			
		 if($feed->object_type=='photo'){ 
				
				
					 if($feed->feed_type=='upload')
  					  $text="Added this Hair Story";
					  else if($feed->feed_type=='comment') 
					   $text="Commented on this Hair Story";
					else
					 $text="Liked this Hair Story";
					
				
				
				 $output.='<div class="img"><img class="photo-badge" width="32" alt="youtube" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/icons/youtube.png">
				   <a href="http://hairlibrary.com/photo/?id='.$feed->photo->id.'"><img alt="photostore" src="http://hairlibrary.com/wp-content/uploads/photostore/'.date('Y',$feed->photo->created).'/'.$feed->photo->photo.'"/></a>
				   
				   <h4> <a href="http://hairlibrary.com/photo/?id='.$feed->photo->id.'">'.getFormatedDes($feed->photo->title).'</a> </h4>' ;
				
				  $output.=getListHeartButtonHtml($feed->photo->id,$current_user->ID,'photo',$feed->id,'http://hairlibrary.com/photo/?id='.$feed->photo->id);
				   
				  $output.='</div>
				   <div class="owner-thumb">
				    <div class="member-thumb">
				   <div class="thumb mini-circle '.getUserHairStyle($feed->actor->ID).'">';
			   
					 $thumbpath=getThumbPath($feed->actor->ID);
				
					$output.='<a href="http://hairlibrary.com/profile/?id=<?php echo $feed->actor->ID?>"><img alt="profile" src="'.$thumbpath.'" width="50"/></a>
						 </div>	</div>
						 <div class="user-act"><h4><a href="http://hairlibrary.com/profile/?id='.$feed->actor->ID.'">'.$feed->actor->first_name.'</a> </h4><p>'.$text.'</p></div>
					 <div class="clear"></div>
			       </div>';
				  
				  } else if($feed->object_type=='product') {
                       $brand=null;
						   $ppost=get_post($feed->object_id);
						   $brand= get_brand_info($ppost->post_author);
						   $companyname=getFormatedDes(strtolower($brand->company_name));
						  if($feed->feed_type=='comment') 
					         $ptext="Left a Comment";
					        else
					         $ptext="Likes This";
				   
				   $output.='<div class="img product-thumb">
							  <a href="'.post_permalink($feed->object_id).'">';
                             if (has_post_thumbnail($feed->object_id)) {
								
								 $output.=get_the_post_thumbnail($feed->object_id, array(260,260) );
								}else{
							
								
						 $output.='<img width="400" height="400" alt="Placeholder" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/placeholder.png">';
								
								}
								
								$output.='</a>
                        <h4> <a href="'.post_permalink($feed->object_id).'">'.get_the_title($feed->object_id).'</a> </h4>      
                    <p class="product-brand-name"> <a href="http://hairlibrary.com/brand?n='.getBrandSlug($brand->user_id).'">'. $companyname.'</a></p>';
					
					
				   	$output.=getListHeartButtonHtml($feed->photo->ID,$current_user->ID,"product",$feed->id,post_permalink($feed->object_id));
					$output.='</div>';
					  $time=time()-strtotime($ppost->post_date);
                       if($time<604800)  { 
					    $output.='<span class="new-in">New!</span>';
					 } 
				 if($feed->feed_type=='upload'){
					     
                       
					 $output.=' <div class="owner-thumb" style="padding-top:5px">
				     <div class="thumb" style="background:none">
			   
						 <a href="http://hairlibrary.com/profile/?id='.$feed->actor->ID.'"><img alt="logo" src="http://hairlibrary.com/wp-content/uploads/userphoto/hl_logo.png" width="50"/></a>
                       </div>						
						<div class="user-act"><p style="padding-top:15px"> added this product</p></div>
						<div class="clear"></div> 
			       </div>';
				 } else {
				    $output.='<div class="owner-thumb">
				       <div class="member-thumb">
				   <div class="thumb mini-circle '.getUserHairStyle($feed->actor->ID).'">';
			   
					 $thumbpath=getThumbPath($feed->actor->ID);
					$output.=' <a href="http://hairlibrary.com/profile/?id='.$feed->actor->ID.'"><img alt="profile" src="'. $thumbpath.'" width="50"/></a>
                       </div>	
					   </div>					
						<div class="user-act"><h4><a href="http://hairlibrary.com/profile/?id='. $feed->actor->ID.'">'.$feed->actor->first_name.'</a> </h4><p>'.$ptext.'</p></div>
						<div class="clear"></div> 
			       </div>';
				   } 
				   
				   } 
				 $output.='</div>';
		
   
   
   return $output;
   
   }
  */
   
 ?>