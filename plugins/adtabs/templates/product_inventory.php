
	<?php include('header.php');?>

	<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/common/theme/scripts/plugins/system/less.min.js"></script>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
$(function() {
$( "#accordion" ).accordion();
});


</script>
<div id="content">
<ul class="breadcrumb">
	<li><a href="index.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-dark" class="glyphicons home"><i></i> HL</a></li>
	<li class="divider"></li>
	<li>Charts</li>
</ul>
<!-- // Breadcrumb END -->

<div class="innerLR">

<!-- Row -->
<div class="row-fluid">
	
	<!-- Widget -->
	<div class="widget">
		
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Inventory By Product Category</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Ordered bars Chart -->
			<div id="chart_ordered_bars" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->



<div class="separator bottom"></div>

	
	<!-- Widget -->
	<div class="widget">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Product Inventory by %</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Pie Chart -->
			<div id="chart_pie" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	

	
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
		<script>
     

		

		arrhsty =[
		     { label: "Conditioner",  data: <?php echo getAdminProdcutCountByCategory(array(253,213,192,217,196,177,221,205,209,200));?>},
		    { label: "Shampoo",  data: <?php echo getAdminProdcutCountByCategory(array(254,215,191,219,195,176,223,207,211));?> },
		    { label: "Hair Spray",  data: <?php echo getAdminProdcutCountByCategory(array(257,243,225,237,231,279));?>  },
		    { label: "Gel",  data: <?php echo getAdminProdcutCountByCategory(array(256,244,226,238,232,277));?>  },
		    { label: "Moisturizer",  data: <?php echo getAdminProdcutCountByCategory(array(260,245,227,239,233,278));?>  },
		    { label: "Oil",  data: <?php echo getAdminProdcutCountByCategory(array(259,247,229,241,235,276));?>  },
			{ label: "Color",  data: <?php echo getAdminProdcutCountByCategory(array(261,246,228,240,234,280));?>  },
			{ label: "Hair Repair/Remover",  data: <?php echo getAdminProdcutCountByCategory(array(265,267,269,264,271,273));?>  }
			
		];

	
		function updatePie()
		{
		 
		charts.chart_pie.setData(arrhsty);
		}
		
		
		
		var d1 = [];
		    for (var i = 0; i <= 10; i += 1)
		        d1.push([i, parseInt(Math.random() * 30)]);
		 
		    var d2 = [];
		    for (var i = 0; i <= 10; i += 1)
		        d2.push([i, parseInt(Math.random() * 30)]);
		 
		    var d3 = [];
		    for (var i = 0; i <= 10; i += 1)
		        d3.push([i, parseInt(Math.random() * 30)]);
		 
		    var ds = new Array();
		 
		    ds.push({
		     	label: "Data One",
		        data:d1,
		        bars: {order: 1}
		    });
		    ds.push({
		    	label: "Data Two",
		        data:d2,
		        bars: {order: 2}
		    });
		    ds.push({
		    	label: "Data Three",
		        data:d3,
		        bars: {order: 3}
		    });
			

	   function updateOrderedBars()
		{
		 
		charts.chart_ordered_bars.setData(ds);
		}
	
	
	function updateCharts()
		{
		updatePie();
		updateOrderedBars();
		}
		
		
	window.onload = updateCharts;

	
	</script>
