<?php include('header.php');?>

<?php

$aged=$_GET['aged'];

  switch($aged)
  {
     case 0:
	     $agedtitle='1-5';
		 break;
		  case 6:
	     $agedtitle='6-10';
		 break;
		  case 11:
	     $agedtitle='11-15';
		 break;
		  case 16:
	     $agedtitle='16-20';
		 break;
		  case 21:
	     $agedtitle='21-25';
		 break;
		  case 26:
	     $agedtitle='26-30';
		 break;
		 
		 case 31:
	     $agedtitle='30+';
		 break;
  
  
  
  
  
  }





?>
	


<!-- Heading -->
<div class="heading-buttons">
	<h3>Aged Inventory: <?php echo $agedtitle;?></h3>

	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>
<!-- // Heading END -->

<div class="innerLR">
     



	<div class="widget">
	<?php
          
			 $products=getAdminAgedProducts($aged);
			 
			
			?>
			
			
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
