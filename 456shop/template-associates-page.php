<?php
/*
Template Name: Associates Page 
*/

$brand_slug = @$_GET['brand_slug'];
global $post;

$user=wp_get_current_user();
$userid=$user->ID;

 if( $userid < 1) {
 ?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php	
 }
 
?>

<?php get_header(); ?>

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>$(function() {$( "#accordion" ).accordion();});</script>
	

<?php 
 include_once('brand-admin/templates/functions.php');
 //Source: functions/brandadmin.php
 //returns all brand those are allow for drop shipping
  $dropshipbrands = getAllDropShipBrands();
?>



 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap associates-page">
			<div class="container">					 
				<div class="ep_nav">				
					<div class="title_nav tab_menu">	
						<ul class="ep-tabs 	<?php if($userid==$current_user->ID) echo 'have5';?>">						
							<li><a class="bold" href="javascript:void()" id="affiliate-links-tab">Affiliate Links</a></li>
							<li><a href="javascript:void()" id="performance-tab">Performance</a></li>
							<li><a href="javascript:void()" id="partner-brands-tab">Partner Brands</a></li>
							<li><a href="javascript:void()" id="marketing-materials-tab">Marketing Materials</a></li>
							<li><a href="javascript:void()" id="settings-tab">Settings</a></li>
							<div class="clear"></div>
						</ul>
					</div>
				</div>
		
								
				<div id="panel-content" style="min-height:450px">															
					<div class="ep-tabs-content affiliate-links" id="affiliate-links-tab1"  style="display:block">						
						<div class="tab-title">
							<h3 class="title">Affiliate link</h3>
						</div>
						Your associates URL:<br />
						<code><?php echo do_shortcode('[affiliates_url]'); ?></code>
						<br />Use this code to embed your associates link:<br />
						<code>&lt;a href="<?php echo do_shortcode('[affiliates_url]'); ?>"&gt;Affiliate link&lt;/a&gt;</code>
						<br />Tip: You should change the text Affiliate link to something more attractive.
					</div>
					<div class="ep-tabs-content performance" id="performance-tab1">
						<div class="tab-title">
							<h3 class="title">Earning and Sales</h3>	
						</div>						
						<h4>Total Earnings</h4>
						<h5>Commissions pending payment <?php echo do_shortcode('[affiliates_referrals show="total" status="accepted"]'); ?></h5>
						
						<h5>Commissions paid <?php echo do_shortcode('[affiliates_referrals show="total" status="closed"]'); ?></h5>

						
						<h5>Number of sales referred</h5>
						<ul>
							<li><p>Accepted referrals pending payment: <?php echo do_shortcode('[affiliates_referrals status="accepted"]'); ?></p></li>
							<li><p>Referrals paid: <?php echo do_shortcode('[affiliates_referrals status="closed"]'); ?></p></li>
						</ul>
						<h5>Monthly Earnings <?php echo do_shortcode('[affiliates_earnings]'); ?></h5>
						
					</div>											
					<div class="row-fluid ep-tabs-content partner-brands" id="partner-brands-tab1">            									
						<div class="row-fluid">
							<div class="span3">
								<div class="ds-brand-list">
									<p class="left-bar left-bar-title">Partnered Brands</p>
									<ul>			
										<?php foreach($dropshipbrands as $brands){
											foreach($brands as $brand){ ?>
											<li><a id="brand-<?php echo $brand->company_slug;?>" class="<?php if($brand_slug == $brand->company_slug) echo 'bold';?>" href="<?php bloginfo('url');?>/associates/?brand_slug=<?php echo $brand->company_slug;?>"><?php echo $brand->company_name;?></a></li>
										<?php } }?>
									</ul>
								</div>
							</div>
							<div class="span9">
					<div class="woocomerce margin-left-none">	
					<?php 
					if($brand_slug){
						//Source:functions/brandadmin.php
						$brand_id = getBrandIDBySlug($brand_slug);
						//Source:functions/brandadmin.php
						$products = getAllProductsByBrand($brand_id);
					}else{
						$i=1;
						foreach($dropshipbrands as $brands){
							if($i==2) break;
							foreach($brands as $brand){
								//Source:functions/brandadmin.php
								$products = getAllProductsByBrand($brand->user_id);
							}
							$i++;
						}
					}
					if(count($products)>0){
					?>
					<ul class="products">	   
					<?php 
						$i = 1; 
						foreach($products as $product){?>		
                           <li class=" span4 product  <?php if($i%3==0) echo 'first';?>">
						   <div style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);" class="product-item shadow-s3">
								
								<?php  
								/**
								 *
								 Source:/functions/products.php
								 Generate HTML layout of product content of given current user
								 *
								 **/
								getProductContent($product->ID);?>
                            </div>
						   </li>
						    <?php $i++; }						   
						   ?>					   
							<div class="clear"></div>					   
					</ul><?php }else{ ?>											
						<p> No products available</p>
						<?php } ?>
					</div>
					</div>
							
						</div>
					</div>
					<div class="ep-tabs-content marketing-materials" id="marketing-materials-tab1">
						<div class="tab-title">
							<h3 class="title">Images for Social Media</h3>
						</div>
						<div class="marketing-material-item">
							<h3>Basic</h3>
							<ul class="row-fluid">
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" alt="" />
									</a>
								</li>
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Product.png" alt="" />
									</a>
								</li>
								<li class="span6">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Facebook-Cover-Basic.png" alt="" />
									</a>
								</li>
							</ul>
							
						</div>
						
						<div class="marketing-material-item">
							<h3>ColdLabel</h3>
							<ul class="row-fluid">
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/ColdLabel/Cold-Label-Hair-Story.png" alt="" />
									</a>
								</li>
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/ColdLabel/Cold-Label-Match.png" alt="" />
									</a>
								</li>
								<li class="span6">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/ColdLabel/Facebook-Cover-Cold-Label.png" alt="" />
									</a>
								</li>
							</ul>
						</div>
						<div class="marketing-material-item">
							<h3>Dry Divas</h3>
							<ul class="row-fluid">
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Dry-Divas/Dry-Divas-Hair-Story.png" alt="" />
									</a>
								</li>
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Dry-Divas/Dry-Divas-Match.png" alt="" />
									</a>
								</li>
								<li class="span6">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Dry-Divas/Facebook-Cover-Dry-Divas.png" alt="" />
									</a>
								</li>
							</ul>
						</div>
						<div class="marketing-material-item">
							<h3>EdgeStick</h3>
							<ul class="row-fluid">
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/EdgeStick/EdgeStick-Hair-Story.png" alt="" />
									</a>
								</li>
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/EdgeStick/EdgeStick-Product.png" alt="" />
									</a>
								</li>
								<li class="span6">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/EdgeStick/Facebook-Cover-EdgeStick.png" alt="" />
									</a>
								</li>
							</ul>
						</div>
						<div class="marketing-material-item">
							<h3>Kimble Beauty</h3>
							<ul class="row-fluid">
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Kimble-Beauty/Kimble-Beauty-Hair-Story.png" alt="" />
									</a>
								</li>
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Kimble-Beauty/Kimble-Beauty-Match.png" alt="" />
									</a>
								</li>
								<li class="span6">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Kimble-Beauty/Facebook-Cover-Kimble-Beauty.png" alt="" />
									</a>
								</li>
							</ul>
						</div>
						<div class="marketing-material-item">
							<h3>Lisa Raye Hair</h3>
							<ul class="row-fluid">
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Lisa-Raye-Hair/Lisa-Raye-Hair-Story.png" alt="" />
									</a>
								</li>
								<li class="span3">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Lisa-Raye-Hair/Lisa-Raye-Match.png" alt="" />
									</a>
								</li>
								<li class="span6">
									<a href="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Basic/Basic-Hair-Story.png" download>
										<div class="hldownload_mask">
											<img class="dl-icon" src="<?php bloginfo('template_url');?>/assets/img/downloading-updates-xxl.png" alt="download"/>			  
										</div>
										<img class="mm-img" src="<?php bloginfo('url');?>/wp-content/uploads/marketing_materials/Lisa-Raye-Hair/Facebook-Cover-Lisa-Raye-Hair.png" alt="" />
									</a>
								</li>
							</ul>
						</div>
						
					</div>
					<div class="ep-tabs-content settings" id="settings-tab1">                  					
						<div class="tab-title">
							<h3 class="title">Account Settings</h3>
						</div>
						<div class="account-settings-form">
							<form action="" method="post">
								<label>Email</label>
								<input type="email" name="associate-email" value="" class="input-email" />
								<label>Paypal Email (payment method)</label>
								<input type="email" name="paypal-email" value="" class="input-email" />
								<label>Phone Number</label>
								<input type="text" name="associate-phone" value="" class="input-email" />
								<label>City & State</label>
								<input type="text" name="associate-city" value="" class="associate-city" />
								<input type="text" name="associate-state" value="" class="associate-state" />
								<label>Old Password</label>
								<input type="password" name="associate-opassword" value="" class="input-password" />	
								<label>New Password</label>
								<input type="password" name="associate-npassword" value="" class="input-password" />
								<label>Repeat Password</label>
								<input type="password" name="associate-rpassword" value="" class="input-password" /><br />
								<input type="hidden" />
								<input class="save-change" type="submit" name="associate-submit" value="Save Changes"/>
							</form>
						</div>					
					</div>		    
				</div>
			</div>
		</div>
    
           <script>   
    $(".ep-tabs a").click(function() {
        var id=this.id;
		 $(".ep-tabs a").removeClass('bold');
		
		$(this).addClass("bold");
		$('.ep-tabs-content').hide();
		id='#'+id+'1';
		 $(id).fadeIn(1000);
		
    });
	<?php if($brand_id){?>
		$('.ep-tabs-content').hide();
		$('#partner-brands-tab1').show();
		$(".ep-tabs a").removeClass('bold');
		$('#partner-brands-tab').addClass('bold');
	<?php }else{ ?>
		$(".ds-brand-list li:first-child a").addClass('bold');
	<?php }?>
	</script>

	 <style>
	 
	</style>
	
<?php get_footer(); ?>