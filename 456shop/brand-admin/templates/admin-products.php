<script>
function submitForm()
{

document.getElementById("sort_form").submit();
}
</script>
<?php
   $current_user = wp_get_current_user();
			include_once('functions.php'); 

?>


<h3 class="heading-mosaic"> Product Library</h3>
<!-- Heading -->
<div class="heading-buttons">

	<div class="buttons pull-right">
		
		<a href="<?php bloginfo('url'); ?>/add-product-2/" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add product</a>
	</div>
	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>
<!-- // Heading END -->

<div class="innerLR product-library">

	<!-- Row -->
	<div class="row-fluid">
	
		<!-- Column -->
		<div class="span4">
		
			<!-- Widget -->
			<div class="widget">
				<?php //lastOrderProduct($current_user->ID);?>
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Newest Product</h4>
					<a href="" class="details pull-right">view all</a>
				</div>
				<!-- // Widget heading END -->
				<?php  $lastorder=lastOrderProducts($current_user->ID); 
				
				?>
				<div class="widget-body list products">
					<ul>
						<li>
						     <?php if($lastorder){
                               $price=get_post_meta($lastorder->ID,'_price',true)*$lastorder->itemnumbers;
							   
							 ?>
							<span class="img"><?php echo get_the_post_thumbnail($lastorder->ID, array(40,40),array('class'=>'thumb'))?></span>
							<span class="title"><?php echo $lastorder->itemnumbers;?> items<br/><strong>&dollar;<?php echo $price;?></strong></span>
							
							<?php } else {?>
							<p> No Item </p>
							<?php } ?>
						</li>
					</ul>
				</div>
			</div>
			<!-- // Widget END -->
			
		</div>
		<!-- // Column END -->
		
		<!-- Column -->
		<div class="span4">
		
			<!-- Widget -->
			<div class="widget">
			
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Most Popular</h4>
					<a href="" class="details pull-right">view all</a>
				</div>
				<!-- // Widget heading END -->
				<div class="widget-body list products">
					<ul>
						<li>
							<span class="img"><img class="thumb" src="<?php bloginfo('template_url');?>/brand-admin/images/other/conditioner.jpeg" width="50" alt="conditioner"></span>
							<span class="title">Beautifully Textured Conditioner<br/><strong>&dollar;2,900</strong></span>
							<span class="count"></span>
						</li>
					</ul>
				</div>
			</div>
			<!-- // Widget END -->
			
		</div>
		<!-- // Column END -->
		
		<!-- Column -->
		<div class="span4">
		
			<!-- Widget -->
			<div class="widget">
			
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Promoted Product</h4>
					<a href="" class="details pull-right">view all</a>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body list products">
					<ul>
						<li>
							<span class="img"><img class="thumb" src="<?php bloginfo('template_url');?>/brand-admin/images/other/shampoo.jpeg" width="50" alt=""></span>
							<span class="title">Beautifully Textured Shampoo <br/><strong>&dollar;1,800</strong></span>
							<span class="count"></span>
						</li>
					</ul>
				</div>
			</div>
			<!-- // Widget END -->
			
		</div>
		<!-- // Column END -->
		
	</div>
	<!-- // Row END -->

	<!-- Widget -->
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
			
			
			 $productlist=getMyProducts($current_user->ID,$orderby);
			// var_dump($productlist);
			$products=array(); 
		   if($productlist)
			 foreach($productlist as $product)
			 {
			 
			
		     // $price=get_post_meta($product->ID,'_price',true);
			 
			//  if(strtotime($product->post_date)>$from && strtotime($product->post_date)<$to && $price>$min && $price<$max)
			//   {
			   $products[]=$product;
			   
			 //  }
			 
			 
			 
			 }
			?>
			
			
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading glyphicons list"><i></i> Manage Your Products</h4>
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
						<th class="center" style="width: 105px;">Actions</th>
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
							Size: <span class="label"><?php echo get_post_meta( $product->ID,'_weight', true );?> ounces </span><span>Date: <?php echo date('F j, Y',strtotime($product->post_date)); ?></span>
						
						</div>
					</div>
						</td>
						
						<td class="center"><span class="glyphicons btn-action single picture" style="margin-right: 0;"><i></i></span>1 photos</td>
						<td class="center form-inline small">
							<input type="text" style="width: 30px;" value="<?php   echo get_post_meta( $product->ID,'quantity_products', true );?>" />
						</td>
						<td class="center">&dollar;<?php echo get_post_meta( $product->ID,'_price', true );?></td>
						<td class="center">
							<a title="Product Overview" style="margin-right:3px;" target="_blank" href="<?php bloginfo('url');?>/product-overview/?id=<?php echo $product->ID;?>" class="btn-action glyphicons no-js zoom_in"><i></i></a>
								<a title="Edit Product" style="margin-right:3px;" href="<?php bloginfo('url');?>/add-product-2/?pid=<?php echo $product->ID;?>" class="btn-action glyphicons pencil btn-success"><i></i></a>
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
						<li class="<?php if($current==1) echo 'disabled';?>"><a href="<?php bloginfo('url');?>/product-library/?pp=<?php echo $prev;?>">&laquo;</a></li>
						<?php for($i=1;$i<=$total_page;$i++){?>
						<li class="<?php if($i==$current) echo 'active';?>"><a href="<?php bloginfo('url');?>/product-library/?pp=<?php echo $i;?>"><?php echo $i;?></a></li>
						<?php } ?>
						
						<li class="<?php if($current==$total_page) echo 'disabled';?>"><a href="<?php bloginfo('url');?>/product-library/?pp=<?php echo $next;?>">&raquo;</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<!-- // Pagination END -->
				
			</div>
			<!-- // Options END -->
			
		</div>
	</div>
	<!-- // Widget END -->
	
</div>	
		
		