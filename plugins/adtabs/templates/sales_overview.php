<?php include('header.php');?>
<script>
function submitSearchForm()
{
document.getElementById('search_form').submit();
}

</script>


<?php
$all_products=getAdminProducts();

?>
	



<div class="innerLR">


	<!-- Heading -->
	<div class="heading-buttons">
		
		
		<div class="form-inline heading small">
			<h3>Sales Overview</h3>
			<span class="pull-right">
				<label class="strong">Search by:</label>
				<form name="search-form" id="search_form" action="" method="post"/>
				<select class="selectpicker" data-style="btn-default btn-small" name="search_sale" onchange="submitSearchForm();">
					<option value="1" <?php if($orderby=="1") echo 'selected="selected"';?>>Todays Sales</option>
					<option value="7" <?php if($orderby=="7") echo 'selected="selected"';?>>Weekly Sales</option>
					<option value="30" <?php if($orderby=="30") echo 'selected="selected"';?>>Monthly Sales</option>
					<option value="365" <?php if($orderby=="365") echo 'selected="selected"';?>>Yearly Sales</option>
					<option value="0" <?php if($orderby=="0") echo 'selected="selected"';?>>All Sales</option>
				</select>
				</form>

			</span>
		</div>

		<div class="clearfix"></div>
	</div>
	<div class="separator bottom"></div>
	<!-- // Heading END -->




     <div class="row-fluid">
	 <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Sales Overview</h4>
		</div>
	<div class="widget-body">
			<!-- Row -->
			<div class="row-fluid">
				<div class="span2">
				
					<!-- Stats Widget -->
					<a href="" class="widget-stats widget-stats-2 widget-stats-easy-pie">
						
						<span class="txt"><span class="count"><?php echo getTotalSales(1);?></span> Today's Sales</span>
						<div class="clearfix"></div>
					</a>
					<!-- // Stats Widget END -->
					
				</div>
				<div class="span2">
				
					<!-- Stats Widget -->
					<a href="" class="widget-stats widget-stats-2 widget-stats-easy-pie txt-single">
						
						<span class="txt"> <span class="count"><?php echo getTotalSales(7);?></span>  Sales This week</span>
						<div class="clearfix"></div>
					</a>
					<!-- // Stats Widget END -->
					
				</div>
				<div class="span2">
				
					<!-- Stats Widget -->
					<a href="" class="widget-stats widget-stats-2 widget-stats-easy-pie txt-single">
						
						<span class="txt"><span class="count"><?php echo getTotalSales(30);?></span>  Sales this month</span>
						<div class="clearfix"></div>
					</a>
					<!-- // Stats Widget END -->
					
				</div>
				
					<div class="span2">
				
					<!-- Stats Widget -->
					<a href="" class="widget-stats widget-stats-2 widget-stats-easy-pie txt-single">
						
						<span class="txt"><span class="count"><?php echo getTotalSales(365);?></span>  Sales this year</span>
						<div class="clearfix"></div>
					</a>
					<!-- // Stats Widget END -->
					
				</div>
			
			

				<div class="span2">
				
					<!-- Stats Widget -->
					<a href="" class="widget-stats widget-stats-2">
						<span class="sparkline"></span>
						<span class="txt"><span class="count"><?php echo getTotalSales();?></span> Total Sales</span>
						<div class="clearfix"></div>
					</a>
					<!-- // Stats Widget END -->
					
				</div>
			
			</div>
			<!-- // Row END -->
	</div>
</div>	

	 </div>
 
	<div class="separator bottom"></div>

	
     <div class="row-fluid admin-cat">
	 <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Sales By Category</h4>
		</div>
	<div class="widget-body">
	<!-- Stats Widgets -->
	<div class="row-fluid">
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="#" class="widget-stats margin-bottom-none">
	            <img alt="Naturally Curly Hair" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/Naturally_Curly.jpg"/>
				<span class="txt">Naturally Curly</span>
				<div class="clearfix"></div>
				<span class="count label label-important"><?php echo getAdminTypeProductsSales(9,'c_ns');?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="#" class="widget-stats margin-bottom-none">
				 <img alt="Relaxed Straight Hair" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/relaxed_straight_Hairstyle.jpg"/>
				<span class="txt">Relaxed Straight</span>
				<div class="clearfix"></div>
				<span class="count label"><?php echo getAdminTypeProductsSales(9,'c_rs');?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
			<div class="span2">
		
			<!-- Stats Widget -->
			<a href="#" class="widget-stats margin-bottom-none">
				   <img alt="Dreds" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/Dreadlocks.png"/>
				<span class="txt">Permed Curly </span>
				<div class="clearfix"></div>
				<span class="count label label-warning"><?php echo getAdminTypeProductsSales(9,'c_pc');?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		
				<div class="span2">
		
			<!-- Stats Widget -->
			<a href="#" class="widget-stats margin-bottom-none">
				   <img alt="Dreds" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/Dreadlocks.png"/>
				<span class="txt">Hair Extensions </span>
				<div class="clearfix"></div>
				<span class="count label label-warning"><?php echo getAdminTypeProductsSales(9,'ee');?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="#" class="widget-stats margin-bottom-none">
				   <img alt="Dreds" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/Dreadlocks.png"/>
				<span class="txt">Locks</span>
				<div class="clearfix"></div>
				<span class="count label label-warning"><?php echo getAdminTypeProductsSales(9,'c_d');?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=category_inventory&catid=250" class="widget-stats margin-bottom-none">
				<img alt="Braids" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/braids.jpg"/>
				<span class="txt">Braids
                     </span>
				<div class="clearfix"></div>
				<span class="count label label-primary"><?php echo getAdminTypeProductsSales(9,'c_b');?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>

	</div>
	<div class="row-fluid">
	<div id="chart_pie" style="height: 250px;"></div>
	</div>
	</div>
</div>	

	 </div>
	
	
	

		
	<div class="separator bottom"></div> 
	<!-- Row -->
	

	<div class="widget">
	<?php
          
			
			$orderby="post_date DESC";
			if(isset($_POST['sort']))
			{

			    $orderby=$_POST['sort'];
			
			}
			
			$from=strtotime('01/01/13');
			$to=time();
			$min=0;
			$max=1000000;
			if(isset($_POST['is_search']))
			{

			   $from=strtotime($_POST['from']);
		   	    $to=strtotime($_POST['to']);
			    $min=$_POST['min'];
			    $max=$_POST['max'];
			
			}
			
			
			 $productlist=getAdminAllProductsSales();
			 
			$products=array(); 
		   if($productlist)
			 foreach($productlist as $product)
			 {
			 
			
		      $price=get_post_meta($product->ID,'_price',true);
			 
			  if(strtotime($product->post_date)>$from && strtotime($product->post_date)<$to && $price>$min && $price<$max)
			   {
			   $products[]=$product;
			   
			   }
			 
			 
			 
			 }
			?>
			
			
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading glyphicons list"><i></i> Manage Sales product</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		<form name="sort-form" id="sort_form" action="" method="post"/>
			<!-- Total products & Sort by options -->
			<div class="form-inline separator bottom small">
				Total products: <?php echo count($products);?>
				<span class="pull-right">
					<label class="strong">Sort by:</label>
					<select class="selectpicker" data-style="btn-default btn-small" name="sort" onchange="submitForm();">
						<option value="post_title ASC" <?php if($orderby=="post_title ASC") echo 'selected="selected"';?>>Title</option>
						<option value="post_date ASC" <?php if($orderby=="post_date ASC") echo 'selected="selected"';?>>Date Ascending</option>
						<option value="post_date DESC" <?php if($orderby=="post_date DESC") echo 'selected="selected"';?>>Date Descending</option>
					</select>
					<input type="hidden" name="user_id" value="<?php echo $current_user->ID?>"/>
					<input type="hidden" name="from" value="<?php echo date('Y/m/d',$from);?>"/>
					<input type="hidden" name="to" value="<?php echo date('Y/m/d',$to);?>"/>
					<input type="hidden" name="max" value="<?php echo $max;?>"/>
					<input type="hidden" name="min" value="<?php echo $min;?>"/>
					<input type="hidden" name="is_search" value="1"/>
				</span>
			</div>
			</form>
			<!-- // Total products & Sort by options END -->
			
			<!-- Filters -->
			<div class="filter-bar">
				<form action="" method="post">
					
					<!-- From -->
					<div>
						<label>From:</label>
						<div class="input-append">
							<input type="text" name="from" id="dateRangeFrom" class="input-mini" value="<?php echo date('Y/m/d',$from);?>" style="width: 90px;" />
							<span class="add-on glyphicons calendar"><i></i></span>
						</div>
					</div>
					<!-- // From END -->
					
					<!-- To -->
					<div>
						<label>To:</label>
						<div class="input-append">
							<input type="text" name="to" id="dateRangeTo" class="input-mini" value="<?php echo date('Y/m/d',$to);?>" style="width: 90px;" />
							<span class="add-on glyphicons calendar"><i></i></span>
						</div>
					</div>
					<!-- // To END -->
					
					<!-- Min -->
					<div>
						<label>Min:</label>
						<div class="input-append">
							<input type="text" name="min" class="input-mini" style="width: 80px;" value="<?php echo $min;?>" />
							<span class="add-on glyphicons euro"><i></i></span>
						</div>
					</div>
					<!-- // Min END -->
					
					<!-- Max -->
					<div>
						<label>Max:</label>
						<div class="input-append">
							<input type="text" name="max" class="input-mini" style="width: 80px;" value="<?php echo $max;?>" />
							<span class="add-on glyphicons euro"><i></i></span>
						</div>
					</div>
					<!-- // Max END -->
					
	              <div>
				  <input type="submit" value="submit" class="button"/>
				  <input type="hidden" name="sort" value="<?php echo $orderby;?>"/>
				  <input type="hidden" name="is_search" value="1"/>
				  </div>
					
					<div class="clearfix"></div>
				</form>
			</div>
			<!-- // Filters END -->
			
			
			
			<!-- Products table -->
			<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable">
				<thead>
					<tr>
						<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
						<th style="width: 1%;" class="center">No.</th>
						<th>Title</th>
						
						<th class="center">Preview</th>
						<th class="center">Stock</th>
						<th class="center">Price</th>
						<th class="center" style="width: 115px;">Actions</th>
					</tr>
				</thead>
				<tbody>
				
                <?php  
			
				 
                if($_GET['pp'])
				  $current=$_GET['pp'];
				  else
				   $current=1;
          			
			
				if($products) 
				{
				
				$total_page=floor(count($products)/10);	
				if(count($products)%10 !=0)
				 $total_page++;
					
			    if($current<$total_page)	
                {
                   $next=$current+1;	
                   if($current>1)
                    {
					  $prev=$current-1;
					}	
                    else
                      {
					   $prev=$current;
					  }					
				}else
                    {
					$next=$current;	
                   if($current>1)
                    {
					  $prev=$current-1;
					}	
                    else
                      {
					   $prev=$current;
					  }	

                   }				
					
				$pages=($current-1)*10;
				$i=0;
				
                    foreach($products as $product)
					{
					 $i++;
					if($i >$pages && $i<= $pages+10)
					{
					
				
					
				?>
				<tr class="selectable">
						<td class="center uniformjs"><input type="checkbox" /></td>
						<td class="center"><?php echo $i ?></td>
						<td class="important">
						<div class="media">
						<span class="media-object pull-left">
						
						<!--<img class="thumb" src="<?php bloginfo('template_url');?>/brand-admin/images/other/shampoo.jpeg" width="80" alt="">-->
						<?php echo get_the_post_thumbnail($product->ID, array(80,80))?>
						
						</span>
						<div class="media-body">
							<h5><?php echo $product->post_title; ?></h5>
							Size: <span class="label"><?php echo get_post_meta( $product->ID,'_weight', true );?> ounces </span><span> Date: <?php //echo date('d/m/Y',strtotime($product->post_date)); ?> <?php echo $product->post_date;?></span>
						
						</div>
					</div>
						</td>
						
						<td class="center"><span class="glyphicons btn-action single picture" style="margin-right: 0;"><i></i></span>1 photos</td>
						<td class="center form-inline small">
							<input type="text" style="width: 60px;" value="<?php   echo get_post_meta( $product->ID,'quantity_products', true );?>" />
						</td>
						<td class="center">&dollar;<?php echo get_post_meta( $product->ID,'_price', true );?></td>
						<td class="center">
						<a title="Overview" href="<?php bloginfo('url');?>/wp-admin/admin.php?page=product_view&pid=<?php echo $product->ID;?>" class="btn-action glyphicons no-js zoom_in"><i></i></a>
							<a title="Edit" href="<?php bloginfo('url');?>/wp-admin/admin.php?page=product_edit&pid=<?php echo $product->ID;?>" class="btn-action glyphicons pencil btn-success"><i></i></a>
							<a title="Delete" href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
						</td>
					</tr>
					
					<?php } } }?>
					
										
									
									</tbody>
			</table>
			<!-- // Products table END -->
			
			<!-- Options -->
			<div class="separator top form-inline small">
			
				<!-- With selected actions -->
				<div class="pull-left checkboxs_actions hide">
					<label class="strong">With selected:</label>
					<select class="selectpicker dropup" data-style="btn-default btn-small">
						<option>Action</option>
						<option>Action</option>
						<option>Action</option>
					</select>
				</div>
				<!-- // With selected actions END -->
				
				<!-- Pagination -->
				<div class="pagination pagination-small pull-right" style="margin: 0;">
					<ul>
						<li class="<?php if($current==1) echo 'disabled';?>"><a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=shop_products&pp=<?php echo $prev;?>">&laquo;</a></li>
						<?php for($i=1;$i<=$total_page;$i++){?>
						<li class="<?php if($i==$current) echo 'active';?>"><a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=shop_products&pp=<?php echo $i;?>"><?php echo $i;?></a></li>
						<?php } ?>
						
						<li class="<?php if($current==$total_page) echo 'disabled';?>"><a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=shop_products&pp=<?php echo $next;?>">&raquo;</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<!-- // Pagination END -->
				
			</div>
			<!-- // Options END -->
			
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
		     { label: "Naturally Curly",  data: <?php echo getAdminTypeProductsSales(9,'c_ns');?> },
		    { label: "Relaxed Straight",  data: <?php echo getAdminTypeProductsSales(9,'c_rs');?>  },
		    { label: "Permed Curly ",  data:<?php echo getAdminTypeProductsSales(9,'c_pc');?>},
		    { label: "Hair Extensions ",  data: <?php echo getAdminTypeProductsSales(9,'c_ee');?>  },
		    { label: "Locks",  data: <?php echo getAdminTypeProductsSales(9,'c_d');?>},
		    { label: "Braids ",  data: <?php echo getAdminTypeProductsSales(9,'c_b');?> }
			
			
		];

	
		function updatePie()
		{
		 
		charts.chart_pie.setData(arrhsty);
		}
		
	    function updateCharts()
		{

		updatePie();
	
		}
		
		
	window.onload = updateCharts;

		
</script>