<?php
/*
Template Name: My Hair Library
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
			   	<a class="big-circle desktop-display <?php echo getUserHairStyle($userid);?>" href="<?php bloginfo('url');?>/profile/?id=<?php echo $userid;?>"><div class="inner-round"><img class="user-thumb" alt="profile picture" src="<?php echo $thumbpath;?>" width="100"></div></a>
				<h3 class="my-library-title"> <span><?php  if($user->ID==$c_user->ID) echo 'My'; else echo getFormatedDes($user->first_name)."'s" ;?> Hair Library</span></h3>
			
				</div>
                		<?php 
					
					   
					   $user=wp_get_current_user();
					   $matches=getMatchingProducts($user->ID);
					 
					    $mylibrary=getAllLikedProducts($user->ID);
						?>
				<div class="woocommerce">
						<?php if($mylibrary) {?>
                           <ul class="products">
						   
						   <?php 
						   $i=1;
						   foreach($mylibrary as $match) {
                            $class="";
							if($i%4==0)
							  $class="last";
							else if($i%4==1)
							   $class="first";
                             
						   ?>
							
                           <li class=" span4 product <?php echo $class;?>">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
							 <?php if($matches && count($matches)>0 && in_array($match,$matches)) { ?>
							  <span class="onsale"></span>
                          <?php }?>
                         <?php getProductContent($match,$current_user->ID);?>
                            </div>
						   </li>
						   <?php $i++;} ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p> No Products Have Been Added To The Library</p>
						   <?php } ?>
						</div>
			

					
					</div>
		
                     
                    </div>
				</div>
			</div>

     
<?php get_footer(); ?>