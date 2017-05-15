<div class="innerLR">
  	<?php
	include_once('functions.php');
	$current_user = wp_get_current_user();
	 $c_user=get_user_meta( $current_user->ID); 
	 /**
	Source: ../../functions/brandadmin.php.php
	returns Brand info of given brand id**/
	 $brand=get_brand_info($current_user->ID);
	 
	 //returns the thumbnail path of brands.
	 //Source: ../../functions/brandadmin.php.php
	  $thumbpath=getBrandThumbPath($brand->id);
	  
	   //Source: ../../functions/brandadmin.php.php
	  $orders=getAllOrders($current_user->ID);

	?>
 
<h3 class="brand-dashboard-title"><span class="glyphicons coins"><i></i></span>Dashboard</h3>

<div class="row-fluid stat-icons dash-page" style="padding:0 10px;">
	           
		<div class="span2">
						
						<!-- Stats Widget -->
						<a href="<?php bloginfo('url');?>/product-library/" class="widget-stats small">
							<span class="note icon-library"></span>
							<span class="count label label-primary"><?php echo countActiveProducts($current_user->ID);?></span>
						</a>
						<label> Library</label>
						<!-- // Stats Widget END -->
						
					</div>
							<div class="span2">
						
						<!-- Stats Widget -->
						<a href="<?php bloginfo('url');?>/product-overview/" class="widget-stats small">
							<span style="margin-top:20px" class="icon-overview note"><i></i></span>
							<span class="count label label-primary"><?php echo countActiveProducts($current_user->ID);?></span>
						</a>
						<label> Overview</label>
						<!-- // Stats Widget END -->
						
					</div>
		<div class="span2">
					
						<!-- Stats Widget -->
						<a href="" class="widget-stats small margin-bottom-none">
							<span style="margin-top:20px" class="alarm icon-review "></span>
							<span class="count label label-primary"><?php echo getBrandLikes($current_user->ID);?></span>
						</a>
						<label> Reviews</label>
						<!-- // Stats Widget END -->
						
					</div>
			
					
					 

					<div class="span2">
						
						<!-- Stats Widget -->
						<a href="" class="widget-stats small dark">
							<span class="glyphicons user_add"><i></i></span>
							<span class="count label label-primary"> <?php echo getTotalFollowers($current_user->ID,'brand');?></span>
						</a>
						<label>Followers</label>
						<!-- // Stats Widget END -->
						
					</div>
										<div class="span2">
						
						<!-- Stats Widget -->
						<a href="" class="widget-stats small primary">
							<span class="icon-mobile user_add"></span>
							<span class="count label label-primary"> <?php echo getBrandComments($current_user->ID);?></span>
						</a>
						<label>Comments</label>
						<!-- // Stats Widget END -->
						
					</div>
	         <!--<div class="span2">
						
						<!-- Stats Widget 
						<a href="" class="widget-stats small">
							<span class="glyphicons car"><i></i></span>
							<span class="count label label-primary">N/A</span>
						</a>
						<label>Shipping</label>
						<!-- // Stats Widget END 
						
					</div>-->
	       
					<div class="clear"></div>

	  </div>
	 <?php
	  $today=date('Y-m-d').' 00:00';
	  $month=date('Y-m').'-01 00:00';
	  $year=date('Y').'-01-01 00:00';
	  $week = strtotime('Last Monday', time());
	 ?>
	  
	  <div class="separator bottom "></div>
   <div class="row-fluid stat-icons dash-page border-top" style="margin:0;padding-bottom:20px">
       <div class="span3">
						
						<!-- Stats Widget -->
						<a href="<?php bloginfo('url');?>/dashboard/orders/" class="widget-stats small">
							<span class="glyphicons shopping_cart"><i></i></span>
							<span class="count label label-primary"><?php echo count($orders);?></span>
						</a>
						<label>Orders</label>
						<!-- // Stats Widget END -->
						
					</div>
       <div class="span3">
			<a href="<?php bloginfo('url');?>/product-library/" class="widget-stats small">
				<span class="number">$<?php echo number_format(getTotalSalesValue($current_user->ID,strtotime($today)), 2, '.', '');?></span>
			    <span class="count label label-primary"><?php echo getTotalSalesValue($current_user->ID,strtotime($today),true);?></span>
			</a>
			<label>Today's Sales</label>					
	   </div>
	   <div class="span3">
			<a href="<?php bloginfo('url');?>/product-library/" class="widget-stats small">
				<span class="number">$<?php echo number_format(getTotalSalesValue($current_user->ID,strtotime($week)), 2, '.', '');?></span>
			    <span class="count label label-primary"><?php echo getTotalSalesValue($current_user->ID,strtotime($week),true);?></span>
			</a>
			<label>This Week</label>					
	   </div>
	   <div class="span3">
			<a href="<?php bloginfo('url');?>/product-library/" class="widget-stats small">
				<span class="number">$<?php echo number_format(getTotalSalesValue($current_user->ID,strtotime($month)), 2, '.', '');?></span>
			    <span class="count label label-primary"><?php echo getTotalSalesValue($current_user->ID,strtotime($month),true);?></span>
			</a>
			<label>This Month</label>					
	   </div>
	   <div class="span3">
			<a href="<?php bloginfo('url');?>/product-library/" class="widget-stats small">
				<span class="number">$<?php echo number_format(getTotalSalesValue($current_user->ID,strtotime($year)), 2, '.', '');?></span>
			    <span class="count label label-primary"><?php echo getTotalSalesValue($current_user->ID,strtotime($month),true);?></span>
			</a>
			<label>Sales YTD 2014</label>					
	   </div>
   
   </div>
   
<!-- Row -->
<div class="row-fluid row-merge border-top">




<!-- 6/12 Column -->
	<div class="span6 calendar">
	
		<!-- Upcoming Events Widget -->
		<div class="widget widget-4 margin-bottom-none ">
		
			<!-- Widget Heading -->
			<div class="widget-head">
				<h4 class="heading">Upcoming Events</h4>
				<span class="pull-right"><a href="calendar.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-dark" class="btn btn-small btn-default">Full Calendar</a></span>
				<div class="clearfix"></div>
			</div>
			<!-- // Widget Heading END -->
			
			<div class="widget-body">
				
				<!-- Datepicker Inline -->
				<div class="datepicker-inline" id="datepicker-inline"></div>
				
				<!-- Buttons -->
				<div class="row-fluid">
					<div class="span6">
						<a href="calendar.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-dark" class="btn btn-block btn-small btn-inverse btn-icon glyphicons circle_plus"><i></i> Add event</a>
					</div>
					<div class="span6">
						<a href="calendar.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-dark" class="btn btn-block btn-small btn-primary btn-icon glyphicons right_arrow"><i></i> Next</a>
					</div>
				</div>
				<!-- // Buttons END -->
				
			</div>
		</div>
		<!-- // Upcoming Events Widget END -->
		
	</div>
	<!-- // 6/12 Column END -->




	
	<!-- Column -->
	<div class="span6">
	
		<!-- Spacing -->
		<div class="innerAll">
	
			<!-- Recent Activity -->
			<div class="widget widget-4 widget-tabs-icons-only widget-timeline margin-bottom-none">
			
				<!-- Widget Heading -->
				<div class="widget-head">
					<h4 class="heading">Recent Order Activity </h4>
					
					<!-- Filters Tabs -->
					<!--<ul class="pull-right">
						<li>Filter by</li>
						<li class="glyphicons user_add"><span data-toggle="tab" data-target="#filterUsersTab"><i></i></span></li>
						<li class="glyphicons shopping_cart active"><span data-toggle="tab" data-target="#filterOrdersTab"><i></i></span></li>
						<li class="glyphicons envelope"><span data-toggle="tab" data-target="#filterMessagesTab"><i></i></span></li>
						<li class="glyphicons link"><span data-toggle="tab" data-target="#filterLinksTab"><i></i></span></li>
						<li class="glyphicons camera"><span data-toggle="tab" data-target="#filterPhotosTab"><i></i></span></li>
					</ul>-->
					<div class="clearfix"></div>
					<!-- // Filters Tabs END -->
					
				</div>
				<!-- Widget Heading END -->
				
				<div class="widget-body">
					<div class="tab-content">
					
												
			
						
						<!-- Filter Orders Tab -->
						<div class="tab-pane active" id="filterOrdersTab">
							<ul class="list-timeline">
							<?php 
							$count=0;
							if(count($orders))
							 foreach($orders as $order){
						     $product=get_post($order->border->product_id);
						
							 $orderuser=get_userdata(get_post_meta($order->post->ID,'_customer_user',true));
							 if($count>=10)
							  break;
							  
							  $count++;
							?>
							
								<li>
									
									<span class="glyphicons activity-icon shopping_cart"><i></i></span>
									<span style="width:80px" class="date"><?php echo date('m-d-Y',$order->border->order_time);?></span>
									<a href="<?php bloginfo('url');?>/dashboard/order-details/?id=<?php echo $order->id;?>">order #<?php echo $order->id;?></a> by <?php echo $orderuser->display_name;?>
									<div class="clearfix"></div>
								</li>
								<?php } else {?>
								<li> No Activities</li>
								<?php }?>
																
							</ul>
							<a href="<?php bloginfo('url');?>/dashboard/orders/" class="btn btn-primary view-all">View all</a>
						</div>
						<!-- // Filter Orders Tab END -->
						
					
					
					</div>
				</div>
			</div>
			<!-- // Recent Activity END -->
		
		</div>
		<!-- // spacing END -->
		
	</div>
	<!-- // Column END -->
	
	
</div>
<!-- // Row END -->

		
	
	
	<!-- SlimScroll Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script>
	
	<!-- Common Demo Script -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/demo/common.js?1369414383"></script>
	
	<!-- Holder Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/other/holder/holder.js"></script>
	
	<!-- Uniform Forms Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>
	
	<!-- PrettyPhoto -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/gallery/prettyphoto/js/jquery.prettyPhoto.js"></script>
	
	
	<!-- Google Code Prettify -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>
	
	<!-- Gritter Notifications Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script>
	
	<!-- Notyfy Notifications Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script>
	
	<!-- MiniColors Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>
	
	<!-- DateTimePicker Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/forms/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Cookie Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/system/jquery.cookie.js"></script>
	
	<!-- Colors -->
	<script>
	var primaryColor = '#e25f39',
		dangerColor = '#bd362f',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	</script>
	
	<!-- Themer -->
	<script>
	var themerPrimaryColor = primaryColor;
	</script>
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/demo/themer.js"></script>
	
	<!-- Twitter Feed -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/demo/twitter.js"></script>
	
	<!-- Easy-pie Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.js"></script>
	
	<!-- Sparkline Charts Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/charts/sparkline/jquery.sparkline.min.js"></script>
	
	<!-- Ba-Resize Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/other/jquery.ba-resize.js"></script>
	
	<!-- Dashboard Demo Script -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/demo/index.js?1369414383"></script>
	
	
	<!-- Google JSAPI -->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		
	<!--  Flot Charts Plugin -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.js"></script>
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.pie.js"></script>
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.tooltip.js"></script>
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.selection.js"></script>
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.resize.js"></script>
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.orderBars.js"></script>
	
	<!-- Charts Helper Demo Script -->
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/theme/scripts/demo/charts.helper.js?1369414383"></script>
	
	
	<!-- Bootstrap Image Gallery -->
	<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
	<script src="<?php bloginfo('template_url');?>/brand-admin/common/bootstrap/extend/bootstrap-image-gallery/js/bootstrap-image-gallery.min.js" type="text/javascript"></script>

	<script>
	//Load the Visualization API and the table/core chart package.
	google.load('visualization', '1.0', {'packages':['table', 'corechart']});
	
	// Set a callback to run when the Google Visualization API is loaded.
	google.setOnLoadCallback(charts.traffic_sources_dataTables.init);
	</script>
		
		
</div>