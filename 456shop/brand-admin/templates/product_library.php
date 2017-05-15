<script>
function submitForm()
{

document.getElementById("sort_form").submit();
}
</script>
<?php
   if(isset($_GET['brand']))
	    $current_user = get_userdata($_GET['brand']);
    else
      $current_user = wp_get_current_user();
			include_once('functions.php'); 

?>



	


<div class="innerLR product-library">
<div class="buttons add-pro-button">
		
		<a href="<?php bloginfo('url'); ?>/add-product-2/" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add product</a>
	</div>

	<!-- Widget -->
	<div class="widget">
	<?php
         
        	
			$category=null;
			if(isset($_POST['category']))
			{
                if($_POST['category']=='none')
				$category=null;
				else
			    $category=$_POST['category'];
			
			}
			
		 switch($category)
						{

						case 'shampoos':
								$args=array(253,213,192,217,196,177,221,205,209,200);  
								break;
						case 'conditioners':
								$args=array(254,215,191,219,195,176,223,207,211); 
                      
								break;
						case 'oils':
								$args=array(259,247,229,241,235,276);  
							
								break;
						case 'gels':
								$args=array(256,244,226,238,232,277);
                              							
								break;
						case 'moisturizers':
								$args=array(260,245,227,239,233,278);
                                 							
								break;
						case 'hair-sprays':
								$args=array(257,243,225,237,231,279);  
								
								break;
						case 'hair-colors':
								$args=array(261,246,228,240,234,280);  
							
								break;
						case 'hair-care':
								$args=array(265,267,269,264,271,273);  
								
								break;
						case 'styling-products':
								$args=array(255,216,193,220,197,182,224,208,212,201,256,257,243,244,277,279,225,226,237,238,231,232);  
								
								break;
								
					    case 'styling-tools':
								$args=array(274,272,263,270,268,266,285,310,292,298,304,286,309,291,297,303);  // Irons and Curlers and hair accessories
								
								break;			
																		
						case 'organic-products':
								$args=array(190,194,206,222,258);  
							
								break;	
								
						case 'hair-removers':
						     $args=array(262,248,230,242,236);  
						     
						       break;	
						case 'treatments':
						     $args=array(287,290,296,308,302,288,307,289,295,301);  
						     
						      break;		   
							   
						case 'hair-extensions':
						
							
							$args=array(283,294,300,306,312); 
							break;

                      case 'wigs':
					
							
							$args=array(284,293,299,305,311);   
							break;
																
								
						}
			
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
			//Source:../../functions/products.php
			// Return total number of active products for current brand
			 $productlist=getMyProducts($current_user->ID,$orderby,$args);
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
		<div class="widget-head product-l">
			<h4 class="heading list"><i></i>Manage Your Hair Library</h4>
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
					<span class="pull-right">
					<label class="strong">Category:</label>
					<select  name="category" onchange="submitForm();">
					<option value="none">Select Category</option>
						<option value="shampoos" <?php if($category=="shampoos") echo 'selected="selected"';?>>Shampoos</option>
						<option value="conditioners" <?php if($category=="Conditioners") echo 'selected="selected"';?>>Conditioners</option>
						<option value="oils" <?php if($category=="oils") echo 'selected="selected"';?>>Oils</option>
						<option value="gels" <?php if($category=="gels") echo 'selected="selected"';?>>Gels</option>
						<option value="moisturizers" <?php if($category=="Moisturizers") echo 'selected="selected"';?>>Moisturizers</option>
						<option value="hair-sprays" <?php if($category=="hair-sprays") echo 'selected="selected"';?>>Hair Sprays</option>
						<option value="hair-colors" <?php if($category=="hair-colors") echo 'selected="selected"';?>>Hair Colors </option>
						<option value="hair-care" <?php if($category=="hair-care") echo 'selected="selected"';?>>Hair Care/Repair</option>
						<option value="styling-products" <?php if($category=="styling-sroducts") echo 'selected="selected"';?>>Styling Products</option>			
						<option value="styling-tools" <?php if($category=="styling-tools") echo 'selected="selected"';?>>Styling Tools</option>
					   <option value="organic-products" <?php if($category=="organic-products") echo 'selected="selected"';?>>Organic Products</option>
					     <option value="hair-removers" <?php if($category=="hair-removers") echo 'selected="selected"';?>>Hair Removers</option>
						  <option value="treatments" <?php if($category=="treatments") echo 'selected="selected"';?>>Treatments</option>
						   <option value="hair-extensions" <?php if($category=="hair-extensions") echo 'selected="selected"';?>>Hair Extensions</option>
						     <option value="wigs" <?php if($category=="wigs") echo 'selected="selected"';?>>Wigs</option>
						
					</select>
					</div>
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
			
			
			<div class="row-fluid library-list">
				
                <?php  
			
				 
                if($_GET['pp'])
				  $current=$_GET['pp'];
				  else
				   $current=1;
          			
			
				if($products) 
				{
				
				$total_page=floor(count($products)/20);	
				if(count($products)%20 !=0)
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
					
				$pages=($current-1)*20;
				$i=0;
				
                    foreach($products as $product)
					{
					 $i++;
					if($i >$pages && $i<= $pages+20)
					{
					
				
					
				?>
			    <div class="span3">
					
				<a class="edit" href="<?php bloginfo('url');?>/add-product-2/?pid=<?php echo $product->ID;?>">Edit</a>		
					
				<div class="imagewrapper effect-thumb effect-thumb-2">
				<a href="<?php bloginfo('url');?>/product-overview/?id=<?php echo $product->ID;?>">
                   <?php echo get_the_post_thumbnail($product->ID, array(260,260))?>
</a>
                    <div class="clearfix"></div>
                  <h3><a href="<?php bloginfo('url');?>/product-overview/?id=<?php echo $product->ID;?>"><?php echo $product->post_title; ?></a></h3>

                <div class="heart-button section">
                       <a class="like-button after-like" href="javascript:void();"></a>
                     <span ><?php echo getTotalLike($product->ID,'product');?></span>
                    <div class="clear"></div>
                  </div>
						
						
				</div>
				<a class="view-product" href="<?php bloginfo('url');?>/product-overview/?id=<?php echo $product->ID;?>"><img width="32" alt="TrendingIcon" src="<?php bloginfo('template_url');?>/assets/img/icons/TrendingIcon.png"/></a>
				<span style="position:absolute;left:10px;bottom:10px"><?php echo get_post_meta($product->ID, '_stock',true);?></span>
			</div>
				
					<?php } } }?>
					
										
		</div>
			
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
		
		