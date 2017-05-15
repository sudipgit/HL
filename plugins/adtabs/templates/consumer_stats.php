	<?php include('header.php');?>
	
	<div class="content">	
<div class="innerLR">
<h1>Consumer Demographic By Location </h1>
<!-- Men women section--->
<div class="row-fluid">
	<div class="widget span6">
		<div class="widget-head">
			<h4 class="heading">Gender</h4>
		</div>
		<?php
		/**
		Source: ../../functions/brandadmin.php
		***/
		$male=userGenderCount('male');
		$female=userGenderCount('female');
        $total=$male+$female;
		
		$p_male=0;
		$p_female=0;
		if($male>0)
		  $p_male=floor(($male/$total)*100);	
        if($female>0)		  
		$p_female=floor(($female/$total)*100);	
		
		
		?>
		
		<div class="gender">
		  <div class="val male" style="width:<?php if($total==0) echo '50'; else echo $p_male;?>%"><span>Male(<?php echo $p_male;?>%)</span></div>
		  <div class="val female" style="width:<?php if($total!=0) echo $p_female; else echo 50;?>%"><span>Female(<?php echo $p_female;?>%)</span></div>
		  <div class="clear"></div>
		</div>
		
		<div class="widget-body">
		
			
		
		</div>
	</div>
	
		<div class="widget span6">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Demographics</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Donut Chart -->
			<div id="chart_donut" style="height: 250px;"></div>
			
		</div>
	</div>
	
</div>
<!-- End Men women section--->
<div class="row-fluid">
	<div class="widget span12">
		<div class="widget-head">
			<h4 class="heading">Chemical Used</h4>
		</div>
		<?php
		/**
		Source: ../../functions/brandadmin.php
		***/
		/*$male=get_user_ans_count(1,'male',$answers);
		$female=get_user_ans_count(1,'female',$answers);
        $total=$male+$female;
		
		$p_male=0;
		$p_female=0;
		if($male>0)
		  $p_male=floor(($male/$total)*100);	
        if($female>0)		  
		$p_female=floor(($female/$total)*100);	
		*/
		
		?>
		
		<div class="gender">
		  <div class="val male" style="width:<?php if($total==0) echo '50'; else echo $p_male;?>%"><span>Hair Color(<?php echo $p_male;?>%)</span></div>
		  <div class="val female" style="width:<?php if($total!=0) echo $p_female; else echo 50;?>%"><span>Chemical Straight(<?php echo $p_female;?>%)</span></div>
		  <div class="clear"></div>
		</div>
		
		<div class="widget-body">
		
			
		
		</div>
	</div>
	
	
	
</div>
</div>
</div>

	
	
	<script>
	var primaryColor = '#e25f39',
		dangerColor = '#bd362f',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	</script>
	
	<script>
	var themerPrimaryColor = primaryColor;
	</script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/demo/themer.js"></script>
	
	
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/demo/twitter.js"></script>
	

	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.js"></script>
	
	
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/charts/sparkline/jquery.sparkline.min.js"></script>
	

	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/other/jquery.ba-resize.js"></script>
		<!-- jVectorMaps Plugin -->
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/maps/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
	
<!-- Vector Maps data -->
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/maps/jvectormap/data/gdp-data.js"></script>
	
	<!-- Vector Maps maps -->
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/maps/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/maps/jvectormap/maps/jquery-jvectormap-us-aea-en.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/maps/jvectormap/maps/jquery-jvectormap-de-merc-en.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/maps/jvectormap/maps/jquery-jvectormap-fr-merc-en.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/maps/jvectormap/maps/jquery-jvectormap-es-merc-en.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/maps/jvectormap/maps/jquery-jvectormap-us-lcc-en.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/maps/jvectormap/maps/mall-map.js"></script>
	
	<!-- Vector Maps Demo Script -->
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/demo/maps_vector.js?1369414386"></script>
		
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		
	
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.pie.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.tooltip.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.selection.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.resize.js"></script>
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/charts/flot/jquery.flot.orderBars.js"></script>
	
	
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/demo/charts.helper.js?1369414384"></script>
	
	
	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/demo/charts.js?1369414384"></script>
	
	
	
	<!--[if gt IE 8]><!--><script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/demo/resizable.js?1369414384"></script><!--<![endif]-->
		
</script>

<script>

var arr = [
		   { label: "African American/Black",  data: <?php echo getAdminConsumerCount(2,'Afb');?> },
		    { label: "Caucasian",  data: <?php echo getAdminConsumerCount(2,'Cau');?> },
		    { label: "European",  data: <?php echo getAdminConsumerCount(2,'Euro');?> },
		    { label: "Spanish/Latin",  data: <?php echo getAdminConsumerCount(2,'Spnsh');?> },
		    { label: "Asian",  data: <?php echo getAdminConsumerCount(2,'Asn');?> },
		    { label: "Other",  data: <?php echo getAdminConsumerCount(2,'Indn');?> }
		  
		];

		function updateDonut()
		{
			charts.chart_donut.setData(arr);
		}
function updateCharts()
	{
	
		updateDonut();
		

		
	}
	
	
					

	window.onload = updateCharts;

</script>