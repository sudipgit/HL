
<?php include('header.php');?>
<div id="content">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
$(function() {
$( "#accordion" ).accordion();
});


</script>
<ul class="breadcrumb">
	<li><a href="index.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-dark" class="glyphicons home"><i></i> HL</a></li>
	<li class="divider"></li>

	<li>Edit product</li>
</ul>
<div class="separator bottom"></div>

<?php
//include_once('functions.php');
$current_user = wp_get_current_user();
$pid=$_GET['pid']?$_GET['pid']:null;

?>

<!-- // Breadcrumb END -->
<?php


   if($_POST['is_submit'])
   {
      if($_POST['product_id']>0)
	  {
	      if(saveAdminEditProduct($_POST,$_FILES))
		  {?>
		  
		  	  <div class="succes-msg" id="msw_suc"><div class="inner"><p>All information saved successfully. Thank you!</p>
	  <a href="javascript:void();" id="close_m">Close</a></div>
	  </div>
		<?php  }
	  
	  }  

	  
	  
	  
	

   }
$product=null;
 $product=getAdminProductDetailInfo($pid);

 
/*
if($product)
if($product->post_author!=$current_user->ID)
  $product=null;
   */
?>
<!-- <div class="succes-msg" id="msw_suc"><div class="inner"><p>Thank you for adding your product to  Hair Library, its status is currently pending. We will let you know shortly when your product has been approved.</p>
	  <a href="javascript:void();" id="close_m">Close</a></div>
	  </div>-->
<div class="hide" id="error-msg"><span id="error-close">X</span><p id="em"></p><div class="clear"></div></div>
<!--<script src="http://hairlibrary.com/wp-content/themes/456shop/brand-admin/js/script.js"></script>-->
<script>
$( "#error-close" ).click(function() {
$("#error-msg").addClass('hide');
});

 $( "#close_m" ).click(function() { 
$("#msw_suc").fadeOut(1000);
});
</script>


<!--<form name="add_product" action="" method="post" enctype="multipart/form-data" onsubmit="return formValidation();">-->
<form name="add_product" action="" method="post" enctype="multipart/form-data">
<!-- Heading -->
<div class="heading-buttons">

	<div class="buttons pull-right">
		
		<input style="padding:6px 20px" type="submit" class="btn btn-primary btn-icon glyphicons ok_2" value="Save"/>
	</div>
	<?php if($product){ ?>
	<a style="float:right;margin-top: 4px;padding: 6px 22px;" class="btn btn-primary btn-icon" href="<?php echo get_permalink($product->ID);?>">Preview</a>
	<?php } ?>
	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>
<!-- // Heading END -->
<div class="innerLR entry-product">

<?php if(!$pid) {?><p class="required">Please fill all fields then click Save button </p><?php } ?>
	<!-- Widget -->
	<div class="widget widget-tabs">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<ul>
				<li class="active"><a href="#productDescriptionTab" data-toggle="tab" class="glyphicons font"><i></i>Basic Info</a></li>
				<li><a href="#productCatTab" data-toggle="tab" class="glyphicons podium"><i></i>Select Category</a></li>
				<li><a href="#productPhotosTab" data-toggle="tab" class="glyphicons picture"><i></i>Photos</a></li>
				<li><a href="#productAttributesTab" data-toggle="tab" class="glyphicons adjust_alt"><i></i>Custom Attributes</a></li>
				<li><a href="#productPriceTab" data-toggle="tab" class="glyphicons table"><i></i>Qty & Price</a></li>
				<!--<li><a href="#productSeoTab" data-toggle="tab" class="glyphicons podium"><i></i>SEO</a></li>-->
			</ul>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
			<div class="tab-content">
			
				<!-- Description -->
				<div class="tab-pane active" id="productDescriptionTab">
				
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Product title </strong>
							<p class="muted">Full Product Name</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Title</label>
							<input type="text" id="inputTitle" class="span6" name="title" value="<?php if($product) echo $product->post_title;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
						<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Product Slug </strong>
							<p class="muted">Product slug</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Slug</label>
							<input type="text" id="inputSlug" class="span6" name="slug" value="<?php if($product) echo $product->post_name;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					
					<hr class="separator bottom" />
						<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Product UPC </strong>
							<p class="muted">Universal Product Code</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">UPC Code</label>
							<input type="text" id="inputTitle" class="span6" name="upccode" value="<?php if($product) echo $product->upc;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
                     <div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Barcode Picture</strong>
							<p class="muted">Universal Product Code</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
						<label for="inputTitle">Barcode Picture</label>
						<div class="span3">
						<img src="<?php bloginfo('url');?>/wp-content/uploads/barcode/<?php echo $product->barcode_image;?>" width="100"/>
						</div>
						<div class="span8">
							<input type="file" name="barcode-picture" id="file-upload" value=""/>
						</div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" />
						<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Affiliate Link</strong>
							<p class="muted">Affiliate link of this product</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="inputTitle">Affiliate Link</label>
							<input type="text" id="inputTitle" class="span6" name="affiliate_link" value="<?php if($product) echo $product->affiliate_link;?>" />
							<div class="separator"></div>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" />
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Product Description</strong>
							<p class="muted">Tell the world why your product is great. Don't hold back.</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="textDescription">Description</label>
							<textarea name="description" id="textDescription" class="wysihtml5" style="width: 96%;" rows="5"><?php if($product) echo $product->post_content;?></textarea>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					<hr class="separator bottom" />
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Short Description</strong>
							<p class="muted">Short description about product</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="textDescription">Short Description</label>
							<textarea name="short_description" id="textDescription" class="wysihtml5" style="width: 96%;" rows="3"><?php if($product) echo $product->post_excerpt;?></textarea>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong>Brand Description</strong>
							<p class="muted">What's Your Brand About?</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="textDescription">Brand Description</label>
							<textarea name="brand_description" id="textDescription" class="wysihtml5" style="width: 96%;" rows="3"><?php if($product) echo $product->brand_description;?></textarea>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" />
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Product Instructions</strong>
							<p class="muted">Some Instructions here.</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="textDescription"> Product Instructions</label>
							<textarea id="textDescription" name="instructions" class="wysihtml5" style="width: 96%;" rows="3"><?php if($product) echo $product->instructions;?></textarea>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					<hr class="separator bottom" />
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Active Ingredients</strong>
							<p class="muted">What's inside?</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="textDescription"> Active Ingredients</label>
							<textarea id="textDescription" name="ingredients" class="wysihtml5" style="width: 96%;" rows="3"><?php if($product) echo $product->ingredients;?></textarea>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<hr class="separator bottom" />
					
					
					
					
					
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Number Of Ounces</strong>
							<p class="muted">How big??</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
						
                         <!-- <label for="number_of_ounces">Number Of Ounces</label>-->

                          <label>
                                 <input type="text" class="span6" name="number_of_ounces" value="<?php if($product) echo $product->weight;?>"> Oz
                               
                           </label>
                           
						
						
						<!-- // Column END -->
						</div>
						</div><!-- // Row END -->
						<hr class="separator bottom" />
					<div class="row-fluid">
						<!-- Column -->
						<div class="span3">
							<strong> Product Consistency</strong>
							<p class="muted">What does it feel like?</p>
						</div>
						<!-- // Column END -->
						<!-- Column -->
						<div class="span9">
						<!--<label for="product_consistency">Product Consistency</label>-->

                         <label>
                               <input type="radio" name="product_consistency" value="pw" <?php if($product->product_consistency=="pw") echo 'checked="checked"';?>>
                                      Powder
                            </label>
                           <label>
                         <input type="radio" name="product_consistency" value="gel" <?php if($product->product_consistency=="gel") echo 'checked="checked"';?>>
                          Gel
                     </label>
                     <label>
                      <input type="radio" name="product_consistency" value="lq" <?php if($product->product_consistency=="lq") echo 'checked="checked"';?>>
                       Liquid
                    </label>
                       <label>
                         <input type="radio" name="product_consistency"  value="ar" <?php if($product->product_consistency=="ar") echo 'checked="checked"';?>>
                           Aresol
                         </label>
						   <label>
                         <input type="radio" name="product_consistency" value="foam" <?php if($product->product_consistency=="foam") echo 'checked="checked"';?>>
                          Foam
                     </label>
                     <label>
                      <input type="radio" name="product_consistency" value="oil" <?php if($product->product_consistency=="oil") echo 'checked="checked"';?>>
                       Oil
                    </label>
                       <label>
                         <input type="radio" name="product_consistency" value="wax" <?php if($product->product_consistency=="wax") echo 'checked="checked"';?>>
                           Wax
                         </label>
						   <label>
                         <input type="radio" name="product_consistency" value="styling_obj" <?php if($product->product_consistency=="styling_obj") echo 'checked="checked"';?>>
                           Styling Object
                         </label>
						</div>
						
					</div>
					<!-- // Row END -->
					
				</div>
				<!-- // Description END -->
				
				<!-- Catrgoty-->
				<div class="tab-pane" id="productCatTab">
				<div class="row-fluid">
		           <div class="span3">
			           <strong> Is this product organic?</strong>
		            </div>
		            <div class="span9">
			          <label><input type="radio" value="yes" name="is_organic" <?php if($product->is_organic=='yes' || $product->is_organic=='Yes') echo 'checked="checked"';?>/> Yes </label>
			          <label><input type="radio" value="no" name="is_organic"  <?php if($product->is_organic=='no' || $product->is_organic=='No') echo 'checked="checked"';?>/>  No</label>
			         
		              </div>
	                 </div>	
				  <!-- Row -->
				  <hr class="separator bottom" />
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Product Category:</strong>
							<p class="muted">Where do you fit in?</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label><input id="type_of_product1" type="radio" name="type_of_product"  value="s_c" <?php if($product->type_of_product=="s_c") echo 'checked="checked"';?>>Conditioner</label>
                             <label><input id="type_of_product2" type="radio" name="type_of_product"  value="s_s" <?php if($product->type_of_product=="s_s") echo 'checked="checked"';?>>Shampoo</label>
                             <label><input id="type_of_product3" type="radio" name="type_of_product"  value="s_hs" <?php if($product->type_of_product=="s_hs") echo 'checked="checked"';?>>Hair Spray</label>
                             <label><input id="type_of_product4" type="radio" name="type_of_product"  value="s_g" <?php if($product->type_of_product=="s_g") echo 'checked="checked"';?>>Gel</label>
                            <label><input id="type_of_product5" type="radio" name="type_of_product"  value="s_mt" <?php if($product->type_of_product=="s_mt") echo 'checked="checked"';?>>Moisturizer</label>
                             <label><input id="type_of_product6" type="radio" name="type_of_product"  value="s_hc" <?php if($product->type_of_product=="s_hc") echo 'checked="checked"';?>>Hair Color</label>
                              <label><input id="type_of_product7" type="radio" name="type_of_product"  value="s_o" <?php if($product->type_of_product=="s_o") echo 'checked="checked"';?>>Oil</label>
                            <label><input id="type_of_product8" type="radio" name="type_of_product"  value="s_hr" <?php if($product->type_of_product=="s_hr") echo 'checked="checked"';?>>Hair Remover</label>
							 <label><input id="type_of_product9" type="radio" name="type_of_product"  value="s_tools" <?php if($product->type_of_product=="s_tools") echo 'checked="checked"';?>>Tools</label>
						 <label><input id="type_of_product9" type="radio" name="type_of_product"  value="s_hair_ext" <?php if($product->type_of_product=="s_hair_ext") echo 'checked="checked"';?>>Hair Extensions</label>
						 <label><input id="type_of_product9" type="radio" name="type_of_product"  value="s_wigs" <?php if($product->type_of_product=="s_wigs") echo 'checked="checked"';?>>Wigs</label>
						  <label><input id="type_of_product9" type="radio" name="type_of_product"  value="s_irons" <?php if($product->type_of_product=="s_irons") echo 'checked="checked"';?>>Irons and Curlers</label>
						 <label><input id="type_of_product9" type="radio" name="type_of_product"  value="s_hair_acc" <?php if($product->type_of_product=="s_hair_acc") echo 'checked="checked"';?>>Hair accessories
                        </label>
						 <label><input id="type_of_product9" type="radio" name="type_of_product"  value="s_relaxer" <?php if($product->type_of_product=="s_relaxer") echo 'checked="checked"';?>>Relaxer/Straightening Treatment</label>
						  <label><input id="type_of_product9" type="radio" name="type_of_product" value="s_texture" <?php if($product->type_of_product=="s_texture") echo 'checked="checked"';?>>Texturizer </label>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					<hr class="separator bottom" />
					 <!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Hair Type Category: </strong>
							<p class="muted">Who is your product for? Don't be shy.</p>
							<label><input type="checkbox" id="selectall9"  name="all9" value="sf"> Select All</label>
						</div>
						<!-- // Column END -->
						<?php 
		       if($product)
		           {
		              $answers=array();
                       $answers=explode(',',$product->type_of_hair);
	  
	                  }
		           ?>
			
						<!-- Column -->
						<div class="span9">
						     <label><input id="type_of_hair1"  class="selectedId9" type="checkbox" name="type_of_hair[]" value="c_ns" <?php if($product && in_array('c_ns',$answers)) echo 'checked="checked"';?>>
							Naturally Straight
                             </label>
							 <label><input id="type_of_hair1"  class="selectedId9" type="checkbox" name="type_of_hair[]" value="c_rs" <?php if($product && in_array('c_rs',$answers)) echo 'checked="checked"';?>>
							 Relaxed Straight</label>
                             <label><input id="type_of_hair2"   class="selectedId9" type="checkbox" name="type_of_hair[]" value="c_c" <?php if($product && in_array('c_c',$answers)) echo 'checked="checked"';?>>
							 Curly</label>
                             <label><input id="type_of_hair3"   class="selectedId9" type="checkbox" name="type_of_hair[]" value="c_d" <?php if($product && in_array('c_d',$answers)) echo 'checked="checked"';?>>
							 Dreds</label>
							  <label><input id="type_of_hair3"  class="selectedId9" type="checkbox" name="type_of_hair[]" value="c_b" <?php if($product && in_array('c_b',$answers)) echo 'checked="checked"';?>>
							 Braids</label>
                           
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
				</div>
				<!-- // Category END -->
				
				<!-- Photos -->
				<div class="tab-pane" id="productPhotosTab">
				 <!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Featured Product Image</strong>
							<p class="muted">Put Your BEST Foot Forward.<br/>Image size must be 600x600</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						
						<div class="span9">
						<?php if($product){?>
						     <div class="span3">
							 <?php if (has_post_thumbnail($product->ID)) {
								
								echo get_the_post_thumbnail($product->ID, array(100,100) );
								}else{
								?>
								
								<img width="100" height="100" alt="Placeholder" src="<?php bloginfo('template_url'); ?>/assets/img/placeholder.png">
								<?php }?>
							 </div>
							  <div class="span6">
							 	<input type="file" name="upload_attachment[]"/>
							
							 </div>
						<?php } else {?>
							<input type="file" name="upload_attachment[]"/>
                            <?php }?>
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					<hr class="separator bottom" />
					 <!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Additional Product Images</strong>
							<p class="muted">Image size must be 600x600</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<input type="file"  name="image1"/><br/><br/>
							<input type="file"  name="image2"/><br/><br/>
							<input type="file"   name="image3"/><br/><br/>
							<input type="file"  name="image4"/>
                            
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					<hr class="separator bottom" />
						<div class="row-fluid">
						
						<!-- Column -->
						<div class="span3">
							<strong> Video Embed Code</strong>
							<p class="muted">Add video to make the product more specific. Video size (380 x 230) </p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<textarea style="width:80%;height:80px;" name="video_embed"><?php if($product) echo $product->video;?></textarea>
                            
						</div>
						<!-- // Column END -->
						</div>
					
					
					
				</div>
				<!-- // Photos END -->
				
				<!-- Attributes -->
				<div class="tab-pane" id="productAttributesTab">
				
	<div class="row-fluid">
		<div class="span3">
			<strong> Intended Gender</strong>
		</div>
		<div class="span9">
			<label><input type="radio" value="male" name="gender"  <?php if($product->ans[1]=="male") echo 'checked="checked"';?> /> Male </label>
			<label><input type="radio" value="female" name="gender"  <?php if($product->ans[1]=="female") echo 'checked="checked"';?> />  Female</label>
			<label><input type="radio" value="both" name="gender" <?php if($product->ans[1]=="both") echo 'checked="checked"';?> />  Both</label>
		</div>
	</div>	

	
	<div class="row-fluid column2-field">
	<div class="span6">
		<div class="span4">
			<strong>Intended Demographic</strong>
			<label><input type="checkbox" id="selectall8"   name="all8" value="sf"> Select All</label>
		</div>
		<?php 
		if($product)
		{
		$answers=array();
       $answers=explode(',',$product->ans[2]);
	  
	   }
		?>
		
		
		<div class="span7">
			<label><input type="checkbox" class="selectedId8" name="demogrph[]" value="Afb" <?php if($product && in_array('Afb',$answers)) echo 'checked="checked"';?>> African/ Black</label>
			<label><input type="checkbox" class="selectedId8" name="demogrph[]" value="Cau" <?php if($product && in_array('Cau',$answers)) echo 'checked="checked"';?>> Caucasian</label>
			<label><input type="checkbox" class="selectedId8" name="demogrph[]" value="Euro" <?php if($product && in_array('Euro',$answers)) echo 'checked="checked"';?>> European</label>
			<label><input type="checkbox" class="selectedId8" name="demogrph[]" value="Spnsh" <?php if($product && in_array('Spnsh',$answers)) echo 'checked="checked"';?>> Spanish/Latin</label>
			<label><input type="checkbox"  class="selectedId8" name="demogrph[]" value="Asn" <?php if($product && in_array('Asn',$answers)) echo 'checked="checked"';?>> Asian</label>
			<label><input type="checkbox"  class="selectedId8" name="demogrph[]" value="Indn" <?php if($product && in_array('Indn',$answers)) echo 'checked="checked"';?>> Indian</label>
		</div>
		</div>
		<div class="span6">
		<div class="span4">
			<strong> Targeted Age Range</strong>
			<label><input type="checkbox"  id="selectall7" name="all7" value="sf"> Select All</label>
		</div>
		<?php 
		if($product)
		{
		$answers=array();
       $answers=explode(',',$product->ans[12]);
	  
	   }
		?>
		<div class="span7">
			<label><input type="checkbox"  class="selectedId7" name="ageRange[]" value="18" <?php if($product && in_array('18',$answers)) echo 'checked="checked"';?>> Under 18</label>
			<label><input type="checkbox"  class="selectedId7" name="ageRange[]" value="19_25" <?php if($product && in_array('19_25',$answers)) echo 'checked="checked"';?>> 19 - 25</label>
			<label><input type="checkbox"  class="selectedId7" name="ageRange[]" value="26_45" <?php if($product && in_array('26_45',$answers)) echo 'checked="checked"';?>> 26 - 45</label>
			<label><input type="checkbox"  class="selectedId7" name="ageRange[]" value="46" <?php if($product && in_array('46',$answers)) echo 'checked="checked"';?>> 46 and Older</label>
		</div>
		</div>
	</div>	

	
	<div class="row-fluid">
	  <div class="span6">
		<div class="span4">
			<strong> Geotargeted City</strong>
		</div>
		<div class="span7">
			<label><input type="text" name="city"  value="<?php if($product) echo $product->ans[10];?> "> </label>
		</div>
		</div>
		  <div class="span6">
		<div class="span4">
			<strong> Geotargeted State</strong>
		</div>
		<div class="span7">
			<label><input type="text" name="state" value="<?php if($product) echo $product->ans[11];?>"> </label>
		</div>
		</div>
	</div>	
	<hr class="separator bottom" />	
	
<div id="accordion">
<h3><strong> Hair Length</strong></h3>
	<div class="row-fluid">

<!-- Column -->
			<div class="span3">
				<strong> Hair Length</strong>
				
				<label><input type="checkbox" id="selectall1"   name="all1" value="sf"> Select All</label>
			</div>
			<!-- // Column END -->
			
	<?php 
		if($product)
		{
		$answers=array();
       $answers=explode(',',$product->ans[5]);
	   

	   }
		?>
			
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			   <div class="s-icon"><img alt="Very Short" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Short.png"/></div>
			  <p><input type="checkbox" class="selectedId1"   value="v_short" name="hairLenth[]" <?php if($product && in_array('v_short',$answers)) echo 'checked="checked"';?>/><span> Very Short</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Short" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Short.png"/></div>
			  <p><input type="checkbox" class="selectedId1" value="short" name="hairLenth[]" <?php if($product && in_array('short',$answers)) echo 'checked="checked"';?>/> <span>Short</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Medium" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Medium.png"/></div>
			  <p><input type="checkbox" class="selectedId1"  value="medium" name="hairLenth[]" <?php if($product && in_array('medium',$answers)) echo 'checked="checked"';?>/> <span>Medium</span> </p>			 
			  </div>
			  <div class="span3">
			   <div class="s-icon"><img alt="Long" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Long.png"/></div>
			  <p><input type="checkbox" class="selectedId1"   value="long" name="hairLenth[]" <?php if($product && in_array('long',$answers)) echo 'checked="checked"';?>/><span> Long</span> </p>			 
			  </div>
			  <div class="span3">
			   <div class="s-icon"><img alt="Very Long" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Long.png"/></div>
			  <p><input type="checkbox" class="selectedId1"   value="v_long" name="hairLenth[]" <?php if($product && in_array('v_long',$answers)) echo 'checked="checked"';?>/><span> Very Long</span> </p>			 
			  </div>
	
<div class="clear"></div>
	
	</div>
	<div class="clear"></div>
	</div>
	
<h3><strong> Hair Texture</strong></h3>		
		<div class="row-fluid">

<!-- Column -->
			<div class="span3">
				<strong> Hair Texture</strong>
			
				<label><input type="checkbox" id="selectall2"   name="all2" value="sf"> Select All</label>
			</div>
			<!-- // Column END -->
			<?php 
		if($product)
		{
		$answers=array();
       $answers=explode(',',$product->ans[4]);
	  
	   }
		?>
			<!-- Column -->
			<div class="span10 h-texture">

			  <div class="span3">
			   <div class="s-icon"><img alt="1a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/1a.jpg"/></div>
              <p><input type="checkbox" class="selectedId2"   value="1a" name="hairTex[]" <?php if($product && in_array('1a',$answers)) echo 'checked="checked"';?>/> <span>1a</span> <span style="left:50px" class="tool-tip">Hair Type 1a is naturally straight hair and the straightest out of all Hair Types. Since there is no discernible wave, the hair lays flat.</span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="2a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2a.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="2a" name="hairTex[]" <?php if($product && in_array('2a',$answers)) echo 'checked="checked"';?>/><span> 2a </span><span style="left:-100px" class="tool-tip">Type 2a is gently, slightly "s" waved hair that stays closer to the head. It does not bounce, even when it is layered. 2a hair is  fine, thin and very easy to manage. It is also generally easily to straighten or curl. </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="2b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2b.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="2b" name="hairTex[]" <?php if($product && in_array('2b',$answers)) echo 'checked="checked"';?>/> <span>2b</span><span style="left:-180px" class="tool-tip">The wave or curl forms throughout the hair in the shape of the letter "s". Type 2b hair stays close to the head and does not bounce up, even when it is layered. </span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="2c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2c.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="2c" name="hairTex[]" <?php if($product && in_array('2c',$answers)) echo 'checked="checked"';?>/> <span>2c </span><span style="left:-300px" class="tool-tip">Type 2c is thicker, coarser wavy hair that is composed of a few more actual curls, as opposed to just waves. Type 2c hair tends to be more resistant to styling and will frizz easily. </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="3a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3a.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="3a" name="hairTex[]" <?php if($product && in_array('3a',$answers)) echo 'checked="checked"';?>/> <span>3a </span><span style="left:-410px" class="tool-tip"> Type 3a curls show a definite large loopy "S" pattern. Curls are well-defined and springy. Curls are naturally big, loose and often very shiny.</span></p>			 
			  </div> 
			  <div class="span3 last">
			   <div class="s-icon"><img alt="3b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3b.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="3b" name="hairTex[]" <?php if($product && in_array('3b',$answers)) echo 'checked="checked"';?>/><span> 3b</span><span style="left:-520px" class="tool-tip">People with Type 3b hair have well-defined, springy, copious curls that range from bouncy ringlets to tight corkscrews. 3b curls' circumference are Sharpie size. </span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="3c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3c.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="3c" name="hairTex[]" <?php if($product && in_array('3c',$answers)) echo 'checked="checked"';?>/><span> 3c </span><span style="left:50px" class="tool-tip">3c hair has voluminous, tight curls in corkscrews, approximately the circumference of a pencil or straw. The curls can be either kinky, or very tightly curled, with lots and lots of strands densely packed together.</span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="4a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4a.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="4a" name="hairTex[]" <?php if($product && in_array('4a',$answers)) echo 'checked="checked"';?>/><span> 4a </span><span style="left:-100px" class="tool-tip">4a is tightly coiled hair that has an "S" pattern. It has more moisture than 4b; it has a definite curl pattern. The circumference of the spirals is close to that of a crochet needle. The hair can be wiry or fine-textured. </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="4b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4b.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="4b" name="hairTex[]" <?php if($product && in_array('4b',$answers)) echo 'checked="checked"';?>/> <span>4b </span><span style="left:-180px" class="tool-tip">Type 4b has a "Z" pattern, less of a defined curl pattern. Instead of curling or coiling, the hair bends in sharp angles like the letter "Z". Type 4 hair has a cotton-like feel.</span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="4c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4c.png"/></div>
              <p><input type="checkbox" class="selectedId2"    value="4c" name="hairTex[]" <?php if($product && in_array('4c',$answers)) echo 'checked="checked"';?>/><span> 4c </span><span style="left:-300px" class="tool-tip"> Type 4c hair is composed of curl patterns that will almost never clump without doing a specific hair style. It can range from fine/thin/super soft to wiry/coarse with lots of densely packed strands. 4c hair has been described as a more "challenging" version of 4b hair.</span></p>			 
			  </div> 
			
<div class="clear"></div>
	
	</div>
	<div class="clear"></div>
	</div>	
	
		
			
<h3><strong> Hair Processes</strong></h3>			
		<div class="row-fluid">

<!-- Column -->
			<div class="span3">
				<strong> Hair processes</strong>
			
				<label><input type="checkbox" id="selectall4"   name="all4" value="sf"> Select All</label>
			</div>
			<!-- // Column END -->
	<?php 
		if($product)
		{
		$answers=array();
       $answers=explode(',',$product->ans[8]);
	  
	   }
		?>
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			   <div class="s-icon"><img alt="Colored Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/colored_hair.jpg"/></div>
              <p><input type="checkbox" class="selectedId4"   value="c_hair" name="hairProc[]" <?php if($product && in_array('c_hair',$answers)) echo 'checked="checked"';?>/> <span>Colored Hair</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Relaxed Straight" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/relaxed_straight.jpg"/></div>
              <p><input type="checkbox" class="selectedId4"   value="r_straight" name="hairProc[]" <?php if($product && in_array('r_straight',$answers)) echo 'checked="checked"';?>/><span> Relaxed Straight</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Permed Curly" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/Permed_Curly.jpg"/></div>
              <p><input type="checkbox" class="selectedId4"   value="p_curly" name="hairProc[]" <?php if($product && in_array('p_curly',$answers)) echo 'checked="checked"';?>/> <span>Permed Curly </span></p>	 
			  </div> 
			  <div class="span3 no-photo">
			  
              <p><input type="checkbox" class="selectedId4"   value="none" name="hairProc[]" <?php if($product && (in_array('none',$answers)|| in_array('None',$answers))) echo 'checked="checked"';?>/><span> None</span> </p>	 
			  </div> 
			
<div class="clear"></div>
	
	</div>
	<div class="clear"></div>
	</div>		
				
	
<h3><strong> Hair Conditions</strong></h3>			
		<div class="row-fluid">

<!-- Column -->
			<div class="span3">
				<strong> Hair Conditions</strong>
			
				<label><input type="checkbox" id="selectall5"    name="all5" value="sf"> Select All</label>
			</div>
			<!-- // Column END -->
	<?php 
		if($product)
		{
		$answers=array();
       $answers=explode(',',$product->ans[7]);
	  
	   }
		?>
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			   <div class="s-icon"><img alt="Oily Scalp" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Oily_Scalp.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"   value="o_scalp" name="hairCond[]" <?php if($product && in_array('o_scalp',$answers)) echo 'checked="checked"';?>/> <span>Oily Scalp</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Pattern Baldness" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/pattern_baldness.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"     value="p_bald" name="hairCond[]" <?php if($product && in_array('p_bald',$answers)) echo 'checked="checked"';?>/> <span>Pattern Baldness </span></p>	 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Alopecia" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/alopecia.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"   value="alopecia" name="hairCond[]" <?php if($product && in_array('alopecia',$answers)) echo 'checked="checked"';?>/> <span>Alopecia </span></p>
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Grey Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Grey_Hair.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"   value="g_hair" name="hairCond[]" <?php if($product && in_array('g_hair',$answers)) echo 'checked="checked"';?>/> <span>Grey Hair </span></p>
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Split_Ends.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"   value="sp_ends" name="hairCond[]" <?php if($product && in_array('sp_ends',$answers)) echo 'checked="checked"';?>/> <span>Split Ends/Breakage</span> </p>
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/how-to-get-rid-of-dry-itchy-scalp.jpg" width="120"/></div>
              <p><input type="checkbox" class="selectedId5"   value="sp_ends" name="hairCond[]" <?php if($product && in_array('sp_ends',$answers)) echo 'checked="checked"';?>/> <span>Dry Itchy Scalp</span> </p>
			  </div> 
			  <div class="span3 last no-photo">
			
              <p><input type="checkbox" class="selectedId5"   value="normal" name="hairCond[]" <?php if($product && in_array('normal',$answers)) echo 'checked="checked"';?>/> <span>Normal </span></p>
			  </div> 
			
<div class="clear"></div>
	
	</div>
	<div class="clear"></div>
	</div>		
				
				
	
<h3><strong> Intended Hair Style</strong></h3>	
		<div class="row-fluid">

<!-- Column -->
			<div class="span3">
				<strong> Intended Hair Style</strong>
			
				<label><input type="checkbox" id="selectall6"   name="all6" value="sf"> Select All</label>
			</div>
			<!-- // Column END -->
			<?php 
		     if($product)
		      {
		        $answers=array();
                $answers=explode(',',$product->ans[9]);
	  
	            }
	     	?>
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			   <div class="s-icon"><img alt="Weave" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/weave.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="weave" name="intStyl[]" <?php if($product && in_array('weave',$answers)) echo 'checked="checked"';?>/> <span>Weave </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Relaxed Straight Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/relaxed_straight_Hairstyle.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="r_s_hair" name="intStyl[]" <?php if($product && in_array('r_s_hair',$answers)) echo 'checked="checked"';?>/> <span>Relaxed Straight Hair </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Braids" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/braids.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="braids" name="intStyl[]" <?php if($product && in_array('braids',$answers)) echo 'checked="checked"';?>/><span> Braids</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Wigs" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/wigs.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="wigs" name="intStyl[]" <?php if($product && in_array('wigs',$answers)) echo 'checked="checked"';?>/> <span>Wigs</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Dreds" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Dreadlocks.png"/></div>
              <p><input type="checkbox" class="selectedId6"   value="dreds" name="intStyl[]" <?php if($product && in_array('dreds',$answers)) echo 'checked="checked"';?>/> <span>Dreds</span> </p>			 
			  </div> 
			  <div class="span3 last">
			   <div class="s-icon"><img alt="Permed/Texturized Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/texturized_permed_curly.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="p_t_hair" name="intStyl[]" <?php if($product && in_array('p_t_hair',$answers)) echo 'checked="checked"';?>/> <span>Permed/Texturized Hair</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Naturally Curly Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Naturally_Curly.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="n_c_hair" name="intStyl[]" <?php if($product && in_array('n_c_hair',$answers)) echo 'checked="checked"';?>/> <span>Naturally Curly Hair</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Naturally Straight Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Naturally_Straight.JPG"/></div>
              <p><input type="checkbox" class="selectedId6"   value="nt_st_hair" name="intStyl[]" <?php if($product && in_array('nt_st_hair',$answers)) echo 'checked="checked"';?>/><span> Naturally Straight Hair</span> </p>			 
			  </div> 
			
<div class="clear"></div>
	
	</div>
	<div class="clear"></div>
	</div>		
		<h3>	<strong> Hair Description</strong></h3>		
		<div class="row-fluid">

<!-- Column -->
			<div class="span3">
				<strong> Hair Description</strong>
				
				<label><input type="checkbox" id="selectall3" name="all3" value="sf"> Select All</label>
			</div>
			<!-- // Column END -->
			<?php 
		     if($product)
		      {
		        $answers=array();
                $answers=explode(',',$product->ans[6]);
	  
	            }
	     	?>
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			  
              <p><input type="checkbox" class="selectedId3"   value="coarse" name="hairDes[]" <?php if($product && in_array('coarse',$answers)) echo 'checked="checked"';?>/> <span>Coarse</span> </p>			 
			  </div> 
			  <div class="span3">
			   
              <p><input type="checkbox" class="selectedId3"   value="soft" name="hairDes[]" <?php if($product && in_array('soft',$answers)) echo 'checked="checked"';?>/> <span>Soft</span> </p>			 
			  </div> 
			  <div class="span3">
			 
              <p><input type="checkbox" class="selectedId3"   value="fine" name="hairDes[]" <?php if($product && in_array('fine',$answers)) echo 'checked="checked"';?>/> <span>Fine </span></p>			 
			  </div> 
			  <div class="span3">
			 
              <p><input type="checkbox" class="selectedId3"   value="thin" name="hairDes[]" <?php if($product && in_array('thin',$answers)) echo 'checked="checked"';?>/> <span>Thin </span></p>			 
			  </div> 
			
<div class="clear"></div>
	
	</div>
	<div class="clear"></div>
	</div>			
			</div>	

				</div>
				<!-- // Attributes END -->
				
				<!-- Price -->
				<div class="tab-pane" id="productPriceTab">
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Quantity Of Product</strong>
							<p class="muted">How much are you adding to the library?</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="textDescription"> Number of products</label>
							<input type="text" name="no_products" value="<?php if($product) echo $product->quantity_products;?>"/>
							
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					<!-- Row -->
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Price Per Unit <span class="star">*</span></strong>
							<p class="muted">Add Suggested Retail Price, this information will not be public
.</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="textDescription">  Price per Product</label>
							<input type="text" name="price" value="<?php if($product) echo $product->price;?>"/> 
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
					<div class="row-fluid">
					
						<!-- Column -->
						<div class="span3">
							<strong> Tags</strong>
							<p class="muted">Keywords for this product, separated by comma.</p>
						</div>
						<!-- // Column END -->
						
						<!-- Column -->
						<div class="span9">
							<label for="texttag">  Tags</label>
							<input style="width:90%" type="text" name="product_tags" value="<?php if($product) echo $product->product_tags;?>"/> 
						</div>
						<!-- // Column END -->
						
					</div>
					<!-- // Row END -->
					
				</div>
				<!-- // Price END -->
				
				
				
			</div>
		</div>
	</div>
	<!-- // Widget END -->
	
	<?php
	$product_id=$product?$product->ID:0;
	
	?>
	
<input type="hidden" name="product_id" value="<?php echo $product_id;?>"/>
<input type="hidden" name="post_author"	value="<?php echo $product->post_author;?>"/>
</div>	
<input type="hidden" name="is_submit" value="1"/>
<div class="heading-buttons">
	<div class="buttons pull-right">
		
		<input style="padding:6px 20px" type="submit" class="btn btn-primary btn-icon glyphicons ok_2" value="Save"/>
	</div>
	<div class="clearfix"></div>
	</div>
</form>
</div>