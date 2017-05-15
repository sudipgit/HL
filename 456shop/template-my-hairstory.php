<?php
/*
Template Name: My Hairstory
*/


global $post;
$user_login=$_GET['n'];
if($user_login)
{
$ruser=get_user_by('login', $user_login);
$userid=$ruser->ID;
}
else
$userid=$_GET['id'];

$c_user=wp_get_current_user();
if($userid<1)
{
$userid=$c_user->ID;
}

 $user=get_userdata($userid);
 
 if( $userid < 1) {
 ?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php	
 }
 
 if(is_brand($userid))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php
 }

?>

 

<?php get_header(); ?>
	
 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap post-template">
			<div class="container">
				
				<div class="row-fluid" style="padding-top:0">	
					<div class="span12 post-page customer-profile">		
		       <div class="profile-title">
			   <?php  $thumbpath=getThumbPath($userid); ?>
			   	<a class="big-circle desktop-display <?php echo getUserHairStyle($userid);?>" href="<?php bloginfo('url');?>/profile/?id=<?php echo $userid;?>">
				<div class="inner-round">
				<img class="user-thumb" alt="profile picture" src="<?php echo $thumbpath;?>" width="100">
				</div>
				</a>
				<h3 class="hair-story-title"> <span><?php  if($user->ID==$c_user->ID) echo 'My'; else echo getFormatedDes($user->first_name)."'s" ;?> Hair Story</span></h3>
			
				</div>
			<div class="panel entry-content photo-store">
				
				  <div class="innerLR">
		
				<!-- Photo Store-->
			 <div class="row-fluid">
				
				<?php  
				/**
				 Source: functions/photostore.php
				returns all photo of current user
				**/
				$results=getAllPhotos($userid);
			
				if(count($results)>0)
				{
				// var_dump($results);
				 foreach($results as $result)
				  {
				?>
				<div class="span3">
				
				  <?php if(count($result)>0){
				  foreach($result as $photo)
				  {
				   
           
				  ?>
					<?php
					/**Source: functions/photostore.php
					Returns photo html layout of given photo id**/
					echo getPhotoHtml($photo);?>
				
				<?php } } ?>
				</div>
					
					
					
					
				<?php }
				
				}?>	
                </div><!-- end Photo Store-->
		 </div>


</div>


					
					</div>
		
                     
                    </div>
				</div>
			</div>

     
<?php get_footer(); ?>