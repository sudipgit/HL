
<?php
/*
Template Name: Master Feeds
*/


 get_header();
$current_user = wp_get_current_user();
//Source: functions/products.php
//Returns one dimensional array of matching products.
  $matches=getMatchingProducts($current_user->ID);
 ?>
 <script>
 var page=2;
 var page2=2;
 function getMoreFeeds()
 {
 cssclass=".loading-more";

 $(cssclass).show();
 	
    $.ajax({
            type:"post",
            url:"http://hairlibrary.com/ajaxfeeds.php",
        data:"page="+page,
		dataType: "JSON",
        success:function(data){
	    $('#block-1').append(data.val1);
		 $('#block-2').append(data.val2);
		  $('#block-3').append(data.val3);
		   $('#block-4').append(data.val4);
		 $(cssclass).hide();
        }
    });
 
 
 page++;
 
 }
 
  function getMoreMobileFeeds()
 {
 cssclass=".loading-more2";

 $(cssclass).show();
 	
    $.ajax({
            type:"post",
            url:"http://hairlibrary.com/ajaxfeeds.php",
        data:"page=2&is_mobile=1",
		
        success:function(data){
		
	    $('#block-mb').append(data);
		
		 $(cssclass).hide();
        }
    });
 
 
 page2++;
 
 }
 </script>


	<div id="main" class="wrap post-template master-feeds">
	<div class="container">
	<div class="row-fluid desktop-feeds">
					
		<?php  
		
		//Source: functions/feeds.php
		$results=getAllFeeds(40);
		
				if(count($results)>0)
				{
				$id=0;
				 foreach($results as $result)
				  {
				  $id++;
				?>
				<div class="span3" id="block-<?php echo $id;?>">
				
				  <?php if(count($result)>0){
				  foreach($result as $feed)
				  {
				  if($feed->object_type=='product')
				  {
				    if($matches && count($matches)>0 && in_array($feed->object_id,$matches))
				    //Source: functions/feeds.php
					echo getFeedHtml($feed,true);
					 else
					 //Source: functions/feeds.php
					 echo getFeedHtml($feed);
				 }else
				 //Source: functions/feeds.php
				  echo getFeedHtml($feed);
				
				
			} } ?>
				</div>
					
					
					
					
				<?php }
				
				}?>	
				<div class="clear"></div> 
				<div class="loading-more">
                          <img alt="loading" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/loading_pink.gif" style="margin:90px 48%">
                    </div>
				<a style="float:right;padding:20px" href="javascript:void()" onclick="getMoreFeeds();">View More</a>
         </div>
				
				<div class="mobile-feeds row-fluid">
					
		<?php  
		//Source: functions/feeds.php
		$results=getAllMobileFeeds(40);?>
		
		
				<div class="span3" id="block-mb">
				
				  <?php if(count($results)>0){
				  foreach($results as $feed)
				  { 
				  
				
				    if($feed->object_type=='product' && $matches && count($matches)>0 && in_array($feed->object_id,$matches))
				    //Source: functions/feeds.php
					echo getFeedHtml($feed,true);
				   else
				   //Source: functions/feeds.php
				    echo getFeedHtml($feed);
				  
				  } } ?>
				</div>
					
					
		      <div class="clear"></div> 
			
				<div class="loading-more2">
                          <img alt="loading" src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/loading_pink.gif" style="margin:90px 48%">
                    </div>
				<a style="float:right;padding:20px" href="javascript:void()" onclick="getMoreMobileFeeds();">View More</a>
                </div>
	
	</div>
	</div>
	<script>
	$( "#feed-menu-item" ).addClass( "active_menu_item" );
	</script>			
<?php get_footer(); ?>