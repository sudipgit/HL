
<?php
/*
Template Name: Template Guided Tour
*/
?> 
<?php
if(is_brand($current_user->ID))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url');?>/dashboard/';
 </script>
 
 <?php
 }
 ?>
<?php get_header();?>

<div id="main" class="shop">
	<div class="container">
		<?php if( function_exists('cyclone_slider') ) cyclone_slider('user-guided-tour'); ?>
	</div>
</div>
<?php get_footer(); ?>  