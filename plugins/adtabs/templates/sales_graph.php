
	<?php include('header.php');
	
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
	$day=$_POST['search_sale'];
	}
	
	
	
	?>
<script>
function submitSearchForm()
{
document.getElementById('search_form').submit();
}

</script>
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


<div class="innerLR">

	<!-- Heading -->
	<div class="heading-buttons">
		
		
		<div class="form-inline heading small">
			<span class="pull-right">
				<label class="strong">Search by:</label>
					<form name="search-form" id="search_form" action="" method="post">
				<select class="selectpicker" data-style="btn-default btn-small" name="search_sale" onchange="submitSearchForm();">
					<option value="0" <?php if($day=="0") echo 'selected="selected"';?>>All Sales</option>
					<option value="1" <?php if($day=="1") echo 'selected="selected"';?>>Todays Sales</option>
					<option value="7" <?php if($day=="7") echo 'selected="selected"';?>>Weekly Sales</option>
					<option value="30" <?php if($day=="30") echo 'selected="selected"';?>>Monthly Sales</option>
					<option value="365" <?php if($day=="365") echo 'selected="selected"';?>>Yearly Sales</option>

				</select>
				</form>
			</span>
		</div>

		<div class="clearfix"></div>
	</div>
	<!--<div class="separator bottom"></div>
	<!-- // Heading END -->

<!-- Row -->
<div class="row-fluid">
	
	<div class="separator bottom"></div>
	<!-- Widget -->
	<div class="widget">
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Sales By State</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Ordered bars Chart -->
			<!--<div id="chart_ordered_bars" style="height: 250px;"></div>-->
		<div id="usa-overview" style="height: 400px"></div>
		</div>
	</div>
	<!-- // Widget END -->
<div class="separator bottom"></div>

	<!-- Widget -->
	<div class="widget">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Sales Comparison</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Simple Chart -->
			<div id="chart_simple" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	<div class="separator bottom"></div>
	
	
	<!-- Widget -->
	<div class="widget">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Top Brands</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Pie Chart -->
			<div id="chart_pie" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	

	
</div>	
	
	
<!-- Row -->
<div class="row-fluid">
	




<div class="separator bottom"></div>

	
	<!-- Widget -->
	<div class="widget">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Sales Demographic by %</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Pie Chart -->
			<div id="chart_length_pie" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	

	
</div>	




	<div class="separator bottom"></div>
	<div class="row-fluid aged-inventory">
	 <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Sales By Hair Texture</h4>
		</div>
	<div class="widget-body">
	<!-- Stats Widgets -->
	<div class="row-fluid admin-cat">
		<div class="span2">
					
						<!-- Stats Widget -->
						<a href="" title="1a" class="widget-stats small margin-bottom-none">
							<img alt="1a" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/1a.jpg"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'1a');?></span>
						</a>
						<p><span> 1a</span></p>
						<!-- // Stats Widget END -->
						
					</div>
		<div class="span2">
					
						<!-- Stats Widget -->
						<a href="" title="2a" class="widget-stats small">
							<img alt="2a" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/2a.png"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'2a');?></span>
						</a>
						<p><span> 2a</span></p>
						<!-- // Stats Widget END -->
						
		</div>
		<div class="span2">
					
						<!-- Stats Widget -->
						<a href="" title="2b" class="widget-stats small">
							<img alt="2b" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/2b.png"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'2b');?></span>
						</a>
						<p><span>2b </span></p>
						<!-- // Stats Widget END -->
						
			</div>
			<div class="span2 ">
					
						<!-- Stats Widget -->
						<a href="" title="2c" class="widget-stats small">
							<img alt="2c" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/2c.png"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'2c');?></span>
						</a>
						<p><span>2c </span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2">
					
						<!-- Stats Widget -->
						<a href="" title="3a" class="widget-stats small margin-bottom-none">
							<img alt="3a" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/3a.png"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'3a');?></span>
						</a>
						<p><span>3a </span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 ">
						
						<!-- Stats Widget -->
						<a href="" title="3b" class="widget-stats small">
							<img alt="3b" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/3b.png"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'3b');?></span>
						</a>
						<p><span> 3b</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2">
						
						<!-- Stats Widget -->
						<a href="" title="3c" class="widget-stats small">
							<img alt="3c" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/3c.png"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'3c');?></span>
						</a>
						<p><span>3c </span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2">
						
						<!-- Stats Widget -->
						<a href="" title="4a" class="widget-stats small">
							<img alt="4a" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/4a.png"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'4a');?></span>
						</a>
						<p><span> 4a</span></p>
						
					</div>
					<div class="span2 ">
						
						<!-- Stats Widget -->
						<a href="" title="4b" class="widget-stats small">
							<img alt="4b" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/4b.png"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'4b');?></span>
						</a>
						<p><span> 4b</span></p>
					</div>
					<div class="span2">
						
						<!-- Stats Widget -->
						<a href="" title="4c" class="widget-stats small">
							<img alt="4c" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/4c.png"/>
							<span class="count label label-primary"><?php echo getAdminTypeProductsSales(4,'4c');?></span>
						</a>
						<p><span>4c </span></p>
						
					</div>
		
		 
		
	</div>
	<div class="row-fluid">
	  <div class="span12" style="padding-top:20px;">
	  <div id="chart_tex_pie" style="height: 250px;"></div>
	  </div>
	  </div>
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
		<script>
     

	   //var arr = <?php echo json_encode($myPHPArray); ?>;
	/*	var arr = [ 	
		                { label: "Turkey",  data: 39 },
						{ label: "France",  data: 27 },
						{ label: "China",  data: 15 }
					];*/
					
		
		var arrLatLng = [
				[
				33.9783241,
				-84.4783064
				],
				[
				30.51220349999999,
				-97.67312530000001
				],
				[
				39.4014955,
				-76.6019125
				],
				[
				33.37857109999999,
				-86.80439
				],
				[
				43.1938516,
				-71.5723953
				],
				[
				43.0026291,
				-78.8223134
				],
				[
				33.836081,
				-81.1637245
				],
				[
				41.7435073,
				-88.0118473
				]
			];
			
			/*var arrLatLng = [
				<?php
				
			
				$arrl="";
				if($customers)
				{
				    foreach($customers as $customer)
					{
					   $zip=get_user_meta($customer, 'customer_zip_code',true); 
				    	$val = getAdminLnt($zip);
					$arrl.='['.$val["lat"].','.$val["lng"].'],';
					}
				}
				
                  //$val = getAdminLnt('90001');
				echo $arrl;
				?>
				
			];*/

	function initUSAOverview()
	{
		$('#usa-overview').vectorMap({
			map: 'us_aea_en',
			
			hoverOpacity: 0.7,
			hoverColor: false,
			markerStyle: {
				initial: {
					fill: primaryColor,
					stroke: '#383f47',
					"fill-opacity": 0.6,
					r: 5
				}
			},
			backgroundColor: '#383f47',
			markers: arrLatLng
		});
	}
		
		
		
		
		

		arrhsty =[
		     { label: "Conditioner",  data: <?php echo getAdminProductsCatSales(array(253,213,192,217,196,177,221,205,209,200),$day);?> },
		    { label: "Shampoo",  data: <?php echo getAdminProductsCatSales(array(254,215,191,219,195,176,223,207,211),$day); ?>  },
		    { label: "Hair Spray",  data: <?php echo getAdminProductsCatSales(array(257,243,225,237,231,279),$day); ?>},
		    { label: "Gel",  data: <?php echo getAdminProductsCatSales(array(256,244,226,238,232,277),$day); ?>  },
		    { label: "Moisturizer",  data: <?php echo getAdminProductsCatSales(array(260,245,227,239,233,278),$day); ?>  },
		    { label: "Oil",  data: <?php echo getAdminProductsCatSales(array(259,247,229,241,235,276),$day); ?>  },
			{ label: "Color",  data: <?php echo getAdminProductsCatSales(array(261,246,228,240,234,280),$day); ?>  },
			{ label: "Hair Care/Repair",  data: <?php echo getAdminProductsCatSales(array(265,267,269,264,271,273),$day);  ?>  }
			
		];

	
		function updatePie()
		{
		 
		charts.chart_pie.setData(arrhsty);
		}
		
	
	
	
	//for demograpic
	
		var arrl=[
		     { label: "African/ Black", data: <?php echo getAdminTypeProductsSales(2,'Afb',$day);?> },
		    { label: "Caucasian",  data: <?php echo getAdminTypeProductsSales(2,'Cau',$day);?> },
		    { label: "European",  data: <?php echo getAdminTypeProductsSales(2,'Euro',$day);?> },
		    { label: "Spanish/Latin",  data: <?php echo getAdminTypeProductsSales(2,'Spnsh',$day);?> },
		    { label: "Asian",  data: <?php echo getAdminTypeProductsSales(2,'Asn',$day);?> },
		    { label: "Indian",  data: <?php echo getAdminTypeProductsSales(2,'Indn',$day);?> }
		];

	
		function updateLengthPie()
		{
		 
		charts.chart_length_pie.setData(arrl);
		}
		
		arrtex=[
		    { label: "1a",  data: <?php echo getAdminTypeProductsSales(4,'1a',$day);?> },
		    { label: "2a",  data: <?php echo getAdminTypeProductsSales(4,'2a',$day);?>  },
		    { label: "2b",  data: <?php echo getAdminTypeProductsSales(4,'2b',$day);?>  },
		    { label: "2c",  data: <?php echo getAdminTypeProductsSales(4,'2c',$day);?>  },
		    { label: "3a",  data: <?php echo getAdminTypeProductsSales(4,'3a',$day);?>  },
		    { label: "3b",  data: <?php echo getAdminTypeProductsSales(4,'3b',$day);?>  },
			 { label: "3c",  data: <?php echo getAdminTypeProductsSales(4,'3c',$day);?>  },
		    { label: "4a",  data: <?php echo getAdminTypeProductsSales(4,'4a',$day);?>  },
		    { label: "4b",  data: <?php echo getAdminTypeProductsSales(4,'4b',$day);?>  },
		    { label: "4c",  data: <?php echo getAdminTypeProductsSales(4,'4c',$day);?>  }
		];
		
		function updateTexPie()
		{
		 
		charts.chart_tex_pie.setData(arrtex);
		}
	
	
	
	function updateCharts()
		{
		initUSAOverview();
		
		updatePie();
		updateLengthPie();
		updateTexPie();
		}
		
		
	window.onload = updateCharts;

	
	</script>
