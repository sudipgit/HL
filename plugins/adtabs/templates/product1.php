<?php include('header.php');?>

<?php
$all_products=getAdminProducts();

?>
	


<!-- Heading -->
<div class="heading-buttons">
	<h3>Products</h3>

	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>
<!-- // Heading END -->

<div class="innerLR">
     <div class="row-fluid">
	 <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Inventory by Category</h4>
		</div>
	<div class="widget-body">
	<!-- Stats Widgets -->
	<div class="row-fluid">
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=category_inventory&catid=180" class="widget-stats margin-bottom-none">
				<span class="glyphicons shopping_cart"><i></i></span>
				<span class="txt">Naturally Curly</span>
				<div class="clearfix"></div>
				<span class="count label label-important"><?php echo getAdminTypeProductsCount(180);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=category_inventory&catid=188" class="widget-stats margin-bottom-none">
				<span class="glyphicons shield"><i></i></span>
				<span class="txt">Relaxed Straight</span>
				<div class="clearfix"></div>
				<span class="count label"><?php echo getAdminTypeProductsCount(188);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
	    <div class="span2">
		
				<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=category_inventory&catid=189" class="widget-stats margin-bottom-none">
				<span class="glyphicons shield"><i></i></span>
				<span class="txt">Permed Curly</span>
				<div class="clearfix"></div>
				<span class="count label"><?php echo getAdminTypeProductsCount(189);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=category_inventory&catid=179" class="widget-stats margin-bottom-none">
				<span class="glyphicons user_add"><i></i></span>
				<span class="txt">Locks</span>
				<div class="clearfix"></div>
				<span class="count label label-warning"><?php echo getAdminTypeProductsCount(179);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=category_inventory&catid=250" class="widget-stats margin-bottom-none">
				<span class="glyphicons camera"><i></i></span>
				<span class="txt">Braids
                     </span>
				<div class="clearfix"></div>
				<span class="count label label-primary"><?php echo getAdminTypeProductsCount(250);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=category_inventory&catid=181" class="widget-stats margin-bottom-none">
				<span class="glyphicons notes"><i></i></span>
				<span class="txt">Hair Extensions</span>
				<div class="clearfix"></div>
				<span class="count label label-important"><?php echo getAdminTypeProductsCount(181);?> </span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>

	</div>
	</div>
</div>	

	 </div>
	 
	<div class="separator bottom"></div>
	 <div class="row-fluid aged-inventory">
	 <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Aged Inventory</h4>
		</div>
	<div class="widget-body">
	<!-- Stats Widgets -->
	<div class="row-fluid">
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=aged_inventory&aged=31" class="widget-stats margin-bottom-none">
				<span class="glyphicons shopping_cart"><i></i></span>
				<span class="txt">30+</span>
				<div class="clearfix"></div>
				<span class="count label label-important"><?php echo get_admin_aged_count(31,10000000,$all_products);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=aged_inventory&aged=26" class="widget-stats margin-bottom-none">
				<span class="glyphicons shield"><i></i></span>
				<span class="txt">26-30</span>
				<div class="clearfix"></div>
				<span class="count label"><?php echo get_admin_aged_count(26,30,$all_products);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=aged_inventory&aged=21" class="widget-stats margin-bottom-none">
				<span class="glyphicons user_add"><i></i></span>
				<span class="txt">21-25</span>
				<div class="clearfix"></div>
				<span class="count label label-warning"><?php echo get_admin_aged_count(21,25,$all_products);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=aged_inventory&aged=16" class="widget-stats margin-bottom-none">
				<span class="glyphicons camera"><i></i></span>
				<span class="txt">16-20</span>
				<div class="clearfix"></div>
				<span class="count label label-primary"><?php echo get_admin_aged_count(16,20,$all_products);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
			<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=aged_inventory&aged=11" class="widget-stats margin-bottom-none">
				<span class="glyphicons camera"><i></i></span>
				<span class="txt">11-15</span>
				<div class="clearfix"></div>
				<span class="count label label-primary"><?php echo get_admin_aged_count(11,15,$all_products);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
			<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=aged_inventory&aged=6" class="widget-stats margin-bottom-none">
				<span class="glyphicons camera"><i></i></span>
				<span class="txt">6-10</span>
				<div class="clearfix"></div>
				<span class="count label label-primary"><?php echo get_admin_aged_count(6,10,$all_products);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
			<div class="span2">
		
			<!-- Stats Widget -->
			<a href="<?php bloginfo('url');?>/wp-admin/admin.php?page=aged_inventory&aged=0" class="widget-stats margin-bottom-none">
				<span class="glyphicons camera"><i></i></span>
				<span class="txt">1-5</span>
				<div class="clearfix"></div>
				<span class="count label label-primary"><?php echo get_admin_aged_count(0,5,$all_products);?></span>
			</a>
			<!-- // Stats Widget END -->
			
		</div>
		
	</div>
	</div>
</div>	

	 </div>
		
	<div class="separator bottom"></div> 
	<!-- Row -->
	

	<div class="widget">
	<?php
          $brandids=getAdAllDropBrands();
			//var_dump($brandids);
			$orderby="post_date DESC";
			if(isset($_POST['sort']))
			{

			    $orderby=$_POST['sort'];
			
			}
			
			$from=strtotime('01/01/13');
			$to=time();
			$min=0;
			$max=1000000;
			$brand='none';
			if(isset($_POST['is_search']))
			{

			   $from=strtotime($_POST['from']);
		   	    $to=strtotime($_POST['to']);
			    $min=$_POST['min'];
			    $max=$_POST['max'];
				$brand=$_POST['brand'];
			
			}
			
			
			 $productlist=getAdminProducts($current_user->ID,$orderby);
			 $total_p=0;
			 $count_p=0;
			$products=array(); 
		   if($productlist)
			 foreach($productlist as $product)
			 {
			 
			if(isset($_POST['is_search']))
			{
		     $price=get_post_meta($product->ID,'_price',true);
			 
			 if(strtotime($product->post_date)>$from && strtotime($product->post_date)<$to && $price>=$min && $price<=$max)
			   {
			   
			   //if(get_post_meta($product->ID, 'affiliate_link',true)=="")
			     //if ( !has_post_thumbnail($product->ID) )
			     if(isset($_POST['brand']))
                  {				 
			       if($_POST['brand']=='dropship')
				    {
					    if(in_array($product->post_author,$brandids))
					    $products[]=$product;
					}					
					else if($_POST['brand']!='none')
					{
					  if($product->post_author==$_POST['brand'])
					    $products[]=$product;
					}
					else
					$products[]=$product;
				  }else
				  {
				  $products[]=$product;
				  }
				  
				 // $products[]=$product;
			   }
			
	
			    }
				else
				$products[]=$product;
			 
			 
			
			 
			 
			 }
			?>
			
			<?php //echo $total_p/$count_p ;?>
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading glyphicons list"><i></i> Manage products</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		<form name="sort-form" id="sort_form" action="" method="post"/>
			<!-- Total products & Sort by options -->
			<div class="form-inline separator bottom small">
				Total products: <?php echo count($products);?>
				<span class="pull-right">
				<?php $abrands=getAdAllBrands();?>
					<label class="strong">Sort by:</label>
					<select class="selectpicker" data-style="btn-default btn-small" name="brand" onchange="submitForm();">
					   <option value="none">None</option>
						<option value="dropship" <?php if($brand=="dropship") echo 'selected="selected"';?>>Drop Shipping Products</option>
						<?php foreach($abrands as $ab){?>
						<option value="<?php echo $ab->user_id;?>" <?php if($brand==$ab->user_id) echo 'selected="selected"';?>><?php echo stripslashes(stripslashes($ab->company_name));?></option>
						<?php }?>
					</select>
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
				  <input type="hidden" name="brand" value="<?php echo $brand;?>"/>
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
						<th class="center">Barcode Image</th>
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
				
				$total_page=floor(count($products)/30);	
				if(count($products)%30 !=0)
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
					
				$pages=($current-1)*30;
				$i=0;
				$price=0;
                    foreach($products as $product)
					{
					
					$price=$price + get_post_meta( $product->ID,'_price', true );
					 $i++;
					if($i >$pages && $i<= $pages+30)
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
							Size: <span class="label"><?php echo get_post_meta( $product->ID,'_weight', true );?> ounces </span><span> Date: <?php echo date('m-d-Y H:i:s',strtotime($product->post_date)); ?> <?php //echo $product->post_date;?></span>
						
						</div>
					</div>
						</td>
						
						<td class="center"><span class="glyphicons btn-action single picture" style="margin-right: 0;"><i></i></span>1 photos</td>
						<td><img src="<?php bloginfo('url');?>/wp-content/uploads/barcode/<?php echo get_post_meta( $product->ID,'product_barcode_thumb', true );?>" width="100"/></td>
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
					
					<?php } } }
					
					//var_dump($price/count($products));
					?>
					
										
									
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
function submitForm()
{

document.getElementById("sort_form").submit();
}


</script>