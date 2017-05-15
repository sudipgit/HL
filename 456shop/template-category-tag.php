<?php
/*
Template Name: Category Tag Page
*/

?>

 

<?php get_header(); ?>
	<div id="main" class="wrap category-tagged-photos" style="background:#f8f9fa">
			<div class="container">
	           <?php	
			 
			   global $post;
			   $page_id=$post->ID;
			   switch($page_id)
			   {
			     case 4843:
				   $cat=1;
				   $title="Locks";
				   break;
				 case 4845:
				   $cat=2;
				   $title="Naturally Curly";
				   break;
				   case 4847:
				   $cat=3;
				   $title="Braids";
				   break;
				   case 4849:
				   $cat=4;
				   $title="Relaxed Straight";
				   break;
				   case 4851:
				   $cat=5;
				   $title="Hair Extensions";
				   break;
				   case 4853:
				   $cat=6;
				   $title="Hair Color";
				   break;
				   case 4855:
				   $cat=7;
				   $title="Naturally Straight";
				   break;
				   case 4857:
				   $cat=8;
				   $title="Wig";
				   break;
				   case 4859:
				   $cat=9;
				   $title="Permed Curly";
				   break;
			   
			   
			   
			   }
        
		
				  
				?>  
				<div class="photo-stories">
				<div class="top-title">
				<h3 class="hair-story-title"><span style="background-color:#f8f9fa"> <?php echo $title;?> Hair Stories</span></h4>
				</div>
				<div class="row-fluid desktop-display">
					
		<?php  $results=fourColumnCatTaggedPhotos($cat,40);
		
				if(count($results)>0)
				{
				$id=0;
				 foreach($results as $result)
				  {
				  $id++;
				?>
				<div class="span4" id="block-<?php echo $id;?>">
				
				  <?php if(count($result)>0){
				  foreach($result as $photo)
				  {
				  echo getPhotoHtml($photo);
				
				
			} } ?>
				</div>
					
					
					
					
				<?php }
				
				}?>	
				<!--<div class="clear"></div> 
				<div class="loading-more">
                          <img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/loading_pink.gif" style="margin:90px 48%">
                    </div>
				<a style="float:right;padding:20px" href="javascript:void()" onclick="getMoreFeeds();">View More</a>-->
         </div>
				
				<div class="mobile-display row-fluid">
					
		<?php  $results=getCategoryTaggedPhotos($cat,40);?>
		
		
				<div class="span4" id="block-mb">
				
				  <?php if(count($results)>0){
				  foreach($results as $photo)
				  {  echo getPhotoHtml($photo);
				  
				  } } ?>
				</div>
					
					
		     <!-- <div class="clear"></div> 
			
				<div class="loading-more2">
                          <img src="http://hairlibrary.com/wp-content/themes/456shop/assets/img/loading_pink.gif" style="margin:90px 48%">
                    </div>
				<a style="float:right;padding:20px" href="javascript:void()" onclick="getMoreMobileFeeds();">View More</a>-->
                </div>
         </div>
	    </div>
	</div>	
      <script>
		$( "#story-menu-item" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>