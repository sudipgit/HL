<?php
/*
   Template Name: Member List

*/
 

?>
<?php get_header(); ?>
<?php 
/*
Source: functions/users.php
returns all users along with their other informations
*/
$members=getAllCustomers();
shuffle($members);
?>

		<div id="main" class="wrap-page hair-story single-photo">
			<div class="container">
	       
		   
		<div class="hl-member-list">
	<div class="member-row row-fluid">
	<?php 

	foreach($members as $user){ 
	/**
	Source: functions/ usrs.php
	Returns user's thumb path of given current user
	 **/
	$thumb = getThumbPath($user->ID);
	$blogger=get_user_meta($user->ID, 'who_are_you', true);
	if(!$blogger || $blogger=="")
	 $blogger='N/A';
	
	?>
		<div class="user span3">
			<div class="member-thumb">
				<div class="thumb mini-circle <?php echo $user->styleclass;?>">
				<div class="thumb-inner">
				<a href="<?php bloginfo('url');?>/profile/?n=<?php echo $user->user_login;?>"><img alt="thumb" src="<?php echo $thumb;?>"></a>
				</div>
				</div>
			</div>		
			<div class="member-info">
			<h3 class="title "><a href="<?php bloginfo('url');?>/profile/?n=<?php echo $user->user_login;?>"><?php echo getFormatedDes($user->first_name);?></a></h3>
			<p class="location <?php echo str_replace(' ',"-",$blogger);?>"><?php echo $blogger; ?></p>
			<p class="follower"><?php echo $user->follwers;?> Inspired, <?php echo $user->follwings;?> Following</p>
			</div>
		</div>		
		<?php  } ?>

</div>
	</div>
	
	
	
		</div>
        </div>

	


        
<?php get_footer(); ?>
	