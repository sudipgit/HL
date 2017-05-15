<!DOCTYPE html><!--[if lt IE 7]> 
<html class="ie lt-ie9 lt-ie8 lt-ie7"> 
<![endif]--><!--[if IE 7]>    
<html class="ie lt-ie9 lt-ie8"> 
<![endif]--><!--[if IE 8]>   
 <html class="ie lt-ie9"> <![endif]-->
 <!--[if gt IE 8]> <html class="ie gt-ie8"> <![endif]--><!--[if !IE]><!-->
 <html><!-- <![endif]--><head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>HairLibrary, Natural Hair, </title>    		
	<meta name="keywords" content="keyword1, keywords2">
    	    		
					<meta name="description" content="website description"> 
    	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta name="author" content="lidplussdesign" />
 <link href="<?php bloginfo('template_url');?>/brand-admin/css/admin.css" rel="stylesheet" />	
 <link href="<?php bloginfo('template_url');?>/brand-admin/css/salon-admin.css" rel="stylesheet" />	


	<!-- Bootstrap -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/bootstrap/css/responsive.css" rel="stylesheet" />
	
	<!-- Glyphicons Font Icons -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/css/glyphicons.css" rel="stylesheet" />
	
	<!-- Uniform Pretty Checkboxes -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />
	
	<!-- PrettyPhoto -->
    <link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/gallery/prettyphoto/css/prettyPhoto.css" rel="stylesheet" />

	
	<!-- Select2 Plugin -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/forms/select2/select2.css" rel="stylesheet" />
	
	<!-- DateTimePicker Plugin -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/forms/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" />
	
	<!-- JQueryUI -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
	
	<!-- MiniColors ColorPicker Plugin -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" rel="stylesheet" />
	
	<!-- Notyfy Notifications Plugin -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css" rel="stylesheet" />
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/notifications/notyfy/themes/default.css" rel="stylesheet" />
	
	<!-- Gritter Notifications Plugin -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css" rel="stylesheet" />
	

	<!-- Main Theme Stylesheet :: CSS -->
	<link href="<?php bloginfo('template_url');?>/brand-admin/common/theme/css/style-dark.css?1369414383" rel="stylesheet" />
	

	<!-- LESS.js Library -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/system/less.min.js"></script>	

		
	<!-- JQuery -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/system/jquery.min.js"></script>
	
	<!-- JQueryUI -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- Modernizr -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/bootstrap/js/bootstrap.min.js"></script>
	
	<script src="<?php bloginfo('template_url');?>/brand-admin/js/script.js"></script>
	<!-- Global -->
	<script>
	var basePath = '../common/';
	</script>


 
   <!-- <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />-->
<?php //wp_head();?>
</head><body class="">		
 <!-- Main Container Fluid -->	<div class="container-fluid fluid menu-left">										
 <!-- Sidebar menu & content wrapper -->	
   	<?php
	$current_user = wp_get_current_user();
	 $c_user=get_user_meta( $current_user->ID); 
	$brand=get_brand_info($current_user->ID);
	 $thumbpath=getBrandThumbPath($current_user->ID,'avatar');
	?> 
 
 <div id="wrapper">	

	<div class="brand-logout">
  <div style="margin-right:210px">
	<a class="logout" href="<?php echo wp_logout_url(); ?>">Logout</a>
	<a class="glyphicons home" href="<?php bloginfo('url');?>/brand/?id=<?php echo $brand->id;?>"><i></i><span>Home</span></a>
	</div>
	<div class="clear"></div>
	</div>

 
 <!-- Sidebar Menu -->		
 <div id="menu" class="hidden-phone hidden-print">					
 <!-- Scrollable menu wrapper with Maximum height -->		
 <div class="slim-scroll" data-scroll-height="800px">	
 <div style="text-align:center;margin:10px">
<a style="border:none" class="logo" href="<?php bloginfo('url');?>/"><img alt="hl logo" src="<?php bloginfo('template_url');?>/assets/img/HL_Logo_w.png" width="49"/></a> 
</div>
 <!-- Sidebar Profile -->			
 <span class="profile">		

	<span>					
		<strong>Welcome</strong>				
		<a href="<?php bloginfo('url');?>/dashboard/" class="glyphicons right_arrow"><?php echo $current_user->display_name;?> </a>				
	</span>	
 <a class="img" href="<?php bloginfo('url');?>/salon/dashboard/">
 <img src="<?php echo $thumbpath;?>" alt="Profile" /></a>
		</span>					
 <ul>																						
	<!-- Menu Regular Items -->			
	<li class="glyphicons coins  <?php if($post->ID==7753) echo 'active';?>"><a href="<?php bloginfo('url');?>/salon/dashboard/"><i></i><span>Salon Info</span></a></li>								
	<li class="add-product-icon user_add <?php if($post->ID==7762) echo 'active';?>"><a href="<?php bloginfo('url');?>/salon/password-setting/"><span>Salon Setting</span></a></li>				
	<li class="add-product-icon user_add <?php if($post->ID==7755) echo 'active';?>"><a href="<?php bloginfo('url');?>/salon/amenities/"><span>Amenities</span></a></li>				
	<li class="librery-icon shopping_cart <?php if($post->ID==7747) echo 'active';?>"><a href="<?php bloginfo('url');?>/salon/photos/"><span>Photos</span></a></li>
     <li class="overview-icon tags <?php if($post->ID==7749) echo 'active';?>"><a href="<?php bloginfo('url');?>/salon/attributes/"><span>Attributes</span></a></li>	
			
							
	<li class="glyphicons credit_card <?php if($post->ID==7764) echo 'active';?>"><a href="<?php bloginfo('url');?>/salon/services/"><i></i><span>Services</span></a></li>							
	<li class="glyphicons credit_card <?php if($post->ID==7745) echo 'active';?>"><a href="<?php bloginfo('url');?>/salon/social/"><i></i><span>Social</span></a></li>							
	<li class="glyphicons credit_card <?php if($post->ID==7766) echo 'active';?>"><a href="<?php bloginfo('url');?>/salon/team/"><i></i><span>Team</span></a></li>							
	<li class="glyphicons credit_card <?php if($post->ID==7768) echo 'active';?>"><a href="<?php bloginfo('url');?>/salon/affiliate-sales/"><i></i><span>Affiliate Sales</span></a></li>	

	<!-- // Menu Regular Items END -->											
	</ul>			
	<div class="clearfix"></div>	   
 
	</div>								
	</div>		<!-- // Sidebar Menu END -->	
	<div id="content">
