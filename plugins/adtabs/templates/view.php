
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
	<li>Charts</li>
</ul>
<!-- // Breadcrumb END -->
<?php
					   $pid=$_GET['id'];
					    $current_user = wp_get_current_user();
					   $products=getAdminProducts($current_user->ID);
				      if($pid<1 && $products)
					    $pid=$products[0]->ID;
						
						$product_detail=getAdminProduct($pid);
					
						
						$answers=getAdminMyCustomersAnswer($product_detail->post_author,$pid);
					    $customers=getAdminMyCustomers($product_detail->post_author,$pid);
?>
<h3 class="heading-mosaic"> Product Overview -->> <?php echo getAdminProductTitle($pid);?></h3>
<div class="innerLR">
<!-- Filters -->
                
			<div class="filter-bar">
				<form action="" method="get" name="option-form">
				   <!-- Filter -->
					<div>
					 
						<label>Select:</label>
						<select name="id" style="width: 80px;">
						   <option>Select Product</option>
							<?php 
							if($products)
							foreach($products as $product){?>
							<option value="<?php echo $product->ID;?>" <?php if($pid==$product->ID) echo 'selected="selected"'?>><?php echo $product->post_name;?></option>
							<?php } ?>
						</select>
					</div>
					
					<!-- // Filter END -->
					<!-- Filter -->
					<div>
						<label>From:</label>
						<div class="input-append">
							<input type="text" name="from" id="dateRangeFrom" class="input-mini" value="08/05/13" style="width: 53px;" />
							<span class="add-on glyphicons calendar"><i></i></span>
						</div>
					</div>
					<!-- // Filter END -->
					
					<!-- Filter -->
					<div>
						<label>To:</label>
						<div class="input-append">
							<input type="text" name="to" id="dateRangeTo" class="input-mini" value="08/18/13" style="width: 53px;" />
							<span class="add-on glyphicons calendar"><i></i></span>
						</div>
					</div>
					 <div>
					 <input type="submit" value="Submit" class="button submit"/>
					 </div>
					<div class="clearfix"></div>
					<!-- // Filter END -->
					
                 
				</form>
			</div>
			<!-- // Filters END -->

	<!-- Widget -->
	<div class="widget">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Performance Chart</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Simple Chart -->
			<div id="chart_simple" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	
<!-- Row -->
<div class="row-fluid">
	
	<!-- Column -->
	<div class="span7">

				<div class="tab-pane active" id="tab3">
					
					<div id="usa-overview" style="height: 400px"></div>
						</div>
	
			
				
					
</div>
	<!-- // Column END -->
	
	<!-- Column -->
	<div class="span5">
	
		<!-- Tabs -->
		<div class="innerLR">
			<div class="separator bottom"></div>
			<div class="tabsbar tabsbar-2 margin-none">
				<ul class="row-fluid row-merge">
					<li class="span6 glyphicons chat active"><a href="#tab-chat" data-toggle="tab"><i></i> Feedback</a></li>
					<li class="span6 glyphicons envelope"><a href="#tab-messages" data-toggle="tab"><i></i> <span>Ratings</span></a></li>
				</ul>
			</div>
		</div>
		<!-- // Tabs END -->
	
		<!-- Tabs content -->
		<div class="tab-content">
	
		<!-- Chat -->
		<div class="tab-pane innerAll active" id="tab-chat">
			<div class="box-generic widget-chat">
				
				<!-- Slim Scroll -->
				<div class="slim-scroll chat-items" data-scroll-height="240px">
					
					<!-- Media item -->
					<div class="media">
						<div class="media-object pull-left thumb"><img src="<?php bloginfo('template_url');?>/brand-admin/images/ProfilePhotos.jpg" width="80" alt=""></div>
						<div class="media-body">
							<blockquote>
								<small><a href="#" title="" class="strong">Shantelle Watkins</a> <cite>just now</cite></small>
								<p>I really enjoyed this product and I was so surprised how clean my scalp felt after the treatment.</p>
							</blockquote>
						</div>
					</div>
					<!-- // Media item END -->
					
					<!-- Media item -->
					<div class="media">
						<div class="media-object pull-right thumb"><img src="<?php bloginfo('template_url');?>/brand-admin/images/photo.jpg" width="80" alt=""></div>
						<div class="media-body right">
							<blockquote class="pull-right">
								<small><a href="#" title="" class="strong">Desiree McDougal</a><cite> 2 minutes ago</cite></small>
								<p>I dont like products that have to smell medicated in order to work. This was very effective and the smell was very calming. I would definitely recommend this product.</p>
							</blockquote>
						</div>
					</div>
					<!-- // Media item END -->
					
					<!-- Media item -->
					<div class="media">
						<div class="media-object pull-left thumb"><img src="<?php bloginfo('template_url');?>/brand-admin/images/jpg54271x300.jpg" width="80" alt=""></div>
						<div class="media-body">
							<blockquote>
								<small><a href="#" title="" class="strong">Erica Cummings </a> <cite>15 minutes ago</cite></small>
								<p>I used the product and found that when I left the product in overnight and styled my hair in the morning that it was so hydrated and shiny. I was pleasantly surprised. The best part I noticed that there was no flaking after it dried..</p>
							</blockquote>
						</div>
					</div>
					<!-- // Media item END -->
					
				</div>
				<!-- // Slim Scroll END -->
				
				<div class="chat-controls">
					<div class="innerLR">
						<form class="margin-none">
							<div class="row-fluid">
								<div class="span10">
									<input type="text" name="message" class="input-block-level margin-none" placeholder="Type your message .." />
								</div>
								<div class="span2">
									<button type="submit" class="btn btn-block btn-inverse">Send</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
		<!-- // Chat END -->
	
		<!-- Messages -->
		<div class="widget widget-4 widget-messages margin-bottom-none tab-pane widget-scroll" data-scroll-height="272px" id="tab-messages">
		
			<!-- Widget Heading -->
			<div class="widget-head">
				<h4 class="heading">Your Ratings</h4>
				<span class="pull-right"><a href="" class="btn btn-small btn-primary btn-icon glyphicons envelope"><i></i>View all</a></span>
				<div class="clearfix"></div>
			</div>
			<!-- // Widget Heading END -->
			
			<div class="widget-body">
				<div>
					<ul class="ratings">
						<!-- Message -->
						<li>
							<span class="meta glyphicons user single"><i></i> Adrian <span>1 hour ago</span></span>
							
							<div class="rat-img5"></div>
						</li>
						<!-- // Message END -->
						
						<!-- Message -->
						<li>
							<span class="meta glyphicons user single"><i></i> Sean <span>10 seconds ago</span></span>
							<div class="rat-img5"></div>
						</li>
						<!-- // Message END -->
						
									
			<!-- Message -->
						<li>
							<span class="meta glyphicons user single"><i></i> Taura <span>1 hour ago</span></span>
							<div class="rat-img4"></div>
						</li>
						<!-- // Message END -->
												<!-- Message -->
						<li>
							<span class="meta glyphicons user single"><i></i> Ashley <span>1 hour ago</span></span>
							<div class="rat-img45"></div>
						</li>
						<!-- // Message END -->
												<!-- Message -->
						<li>
							<span class="meta glyphicons user single"><i></i> Aneka <span>1 hour ago</span></span>
							<div class="rat-img5"></div>
						</li>
						<!-- // Message END -->
												<!-- Message -->
						<li>
							<span class="meta glyphicons user single"><i></i> Megan <span>1 hour ago</span></span>
							<div class="rat-img5"></div>
						</li>
						<!-- // Message END -->
												<!-- Message -->
						<li>
							<span class="meta glyphicons user single"><i></i> Jasmine <span>1 hour ago</span></span>
							<div class="rat-img45"></div>
						</li>
						<!-- // Message END -->
												
					</ul>
				</div>
			</div>
		</div>
		<!-- // Messages END -->
		
		</div>
		<!-- // Tabs content END -->
		
	</div>
	<!-- // Column END -->
	
</div>
<!-- // Row END -->
<div class="separator bottom"></div>
	<!-- Widget -->
	<div class="widget d-none">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Lines chart with fill & without points</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Chart with lines and fill with no points -->
			<div id="chart_lines_fill_nopoints" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	
	<!-- Widget -->
	<div class="widget d-none">
		
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Ordered bars chart</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Ordered bars Chart -->
			<div id="chart_ordered_bars" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	
	<!-- Widget -->
	<div class="row-fluid">
	<div class="widget span6">
	
		
		<div class="widget-head">
			<h4 class="heading">Gender</h4>
		</div>
		<?php
		$male=get_admin_user_ans_count(1,'male',$answers);
		$female=get_admin_user_ans_count(1,'female',$answers);
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
	<!-- // Widget END -->
	</div>
<div class="separator bottom"></div>
	<!-- Widget -->
	<div class="widget d-none">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Stacked bars chart</h4>
		</div>
		<!-- // Widget heading END -->
		
			<div class="widget-body">
		
			<!-- Horizontal Bars Chart -->
			<div id="chart_horizontal_bars" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	
	<!-- Widget -->
	<div class="widget d-none">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Pie chart</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
		
			<!-- Pie Chart -->
			<div id="chart_pie" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	
	<!-- Widget -->
	<div class="widget">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Age</h4>
		</div>
		<!-- // Widget heading END -->
	<div class="widget-body">
		
			<!-- Stacked bars Chart -->
			<div id="chart_stacked_bars" style="height: 250px;"></div>
		</div>
		
	
	</div>
	<!-- // Widget END -->
	
	<!-- Widget -->
	<div class="widget d-none">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Auto updating chart</h4>
		</div>
		<!-- // Widget heading END -->
	
		<div class="widget-body">
		
			<!-- Live Chart -->
			<div id="chart_live" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Widget END -->
	<?php 
	 
	
	  $ans= getAdminProdcutAnswers($pid);
	//var_dump($ans);
	?>
	<div class="row-fluid stat-icons">

	<div class="widget">
		<div class="widget-head">
         <h4 class="heading">Hair Length</h4>
        </div>
		<div class="widget-body">
	<!--<h3 class="icons-header">Hair Length</h3>-->
                       <?php   $srts=explode(',',$ans[5]); ?>
			          <div class="span2 <?php if(!in_array('v_short',$srts)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Very Short" class="widget-stats small margin-bottom-none">
							<img alt="Very Short" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_length/Very_Short.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(5,'v_short',$answers);?> </span>
						</a>
						<p><span> Very Short</span></p>
						<!-- // Stats Widget END -->
						
					</div>
		<div class="span2 <?php if(!in_array('short',$srts)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Short" class="widget-stats small">
							<img alt="Short" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_length/Short.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(5,'short',$answers);?></span>
						</a>
						<p><span> Short</span></p>
						<!-- // Stats Widget END -->
						
		</div>
		<div class="span2 <?php if(!in_array('medium',$srts)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Medium" class="widget-stats small">
							<img alt="Medium" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_length/Medium.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(5,'medium',$answers);?></span>
						</a>
						<p><span> Medium</span></p>
						<!-- // Stats Widget END -->
						
			</div>
			<div class="span2 <?php if(!in_array('long',$srts)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Long" class="widget-stats small">
							<img alt="Long" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_length/Long.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(5,'long',$answers);?></span>
						</a>
						<p><span> Long</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('v_long',$srts)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Very Long" class="widget-stats small margin-bottom-none">
							<img alt="Very Long" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_length/Very_Long.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(5,'v_long',$answers);?></span>
						</a>
						<p><span> Very Long</span></p>
						<!-- // Stats Widget END -->
						
					</div>	<div class="clear"></div>
                      <div class="span5">
				
			<!-- Horizontal Bars Chart -->
			 <div id="chart_length_pie" style="height: 250px;"></div>
		
	</div>
				<div class="clear"></div>	 
					  </div>

	
	</div>
	</div>

	
	<div class="row-fluid stat-icons">
		<div class="widget">
		<div class="widget-head">
         <h4 class="heading">Hair Texture</h4>
        </div>
		<div class="widget-body">
	<!--<h3 class="icons-header">Hair Texture</h3>-->
	 <?php   $tex=explode(',',$ans[4]); ?>
	<div class="span2 <?php if(!in_array('1a',$tex)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="1a" class="widget-stats small margin-bottom-none">
							<img alt="1a" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/1a.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'1a',$answers);?></span>
						</a>
						<p><span> 1a</span></p>
						<!-- // Stats Widget END -->
						
					</div>
		<div class="span2 <?php if(!in_array('2a',$tex)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="2a" class="widget-stats small">
							<img alt="2a" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/2a.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'2a',$answers);?></span>
						</a>
						<p><span> 2a</span></p>
						<!-- // Stats Widget END -->
						
		</div>
		<div class="span2 <?php if(!in_array('2b',$tex)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="2b" class="widget-stats small">
							<img alt="2b" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/2b.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'2b',$answers);?></span>
						</a>
						<p><span>2b </span></p>
						<!-- // Stats Widget END -->
						
			</div>
			<div class="span2 <?php if(!in_array('2c',$tex)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="2c" class="widget-stats small">
							<img alt="2c" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/2c.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'2c',$answers);?></span>
						</a>
						<p><span>2c </span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('3a',$tex)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="3a" class="widget-stats small margin-bottom-none">
							<img alt="3a" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/3a.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'3a',$answers);?></span>
						</a>
						<p><span>3a </span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('3b',$tex)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="3b" class="widget-stats small">
							<img alt="3b" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/3b.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'3b',$answers);?></span>
						</a>
						<p><span> 3b</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('3a',$tex)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="3c" class="widget-stats small">
							<img alt="3c" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/3c.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'3c',$answers);?></span>
						</a>
						<p><span>3c </span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('4a',$tex)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="4a" class="widget-stats small">
							<img alt="4a" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/4a.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'4a',$answers);?></span>
						</a>
						<p><span> 4a</span></p>
						
					</div>
					<div class="span2 <?php if(!in_array('4b',$tex)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="4b" class="widget-stats small">
							<img alt="4b" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/4b.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'4b',$answers);?></span>
						</a>
						<p><span> 4b</span></p>
					</div>
					<div class="span2 <?php if(!in_array('4c',$tex)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="4c" class="widget-stats small">
							<img alt="4c" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_texture/4c.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(4,'4c',$answers);?></span>
						</a>
						<p><span>4c </span></p>
						
					</div>
						<div class="clear"></div>
					    <div class="span5">
				
			<!-- Horizontal Bars Chart -->
			 <div id="chart_tex_pie" style="height: 250px;"></div>
		
	</div>
				<div class="clear"></div>	
	  </div>
	  </div>
	  </div>
	  

	<div class="row-fluid stat-icons">
	<div class="widget">
		<div class="widget-head">
         <h4 class="heading">Hair Process</h4>
        </div>
		<div class="widget-body">
		<?php   $hps=explode(',',$ans[8]); ?>
	      <div class="span2 <?php if(!in_array('c_hair',$hps)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Colored Hair" class="widget-stats small margin-bottom-none">
							<img alt="Colored Hair" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_process/colored_hair.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(8,'c_hair',$answers);?></span>
						</a>
						<p><span> Colored Hair</span></p>
						
					</div>
	               <div class="span2 <?php if(!in_array('r_straight',$hps)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Relaxed Straight" class="widget-stats small">
							<img alt="Relaxed Straight" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_process/relaxed_straight.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(8,'r_straight',$answers);?></span>
						</a>
							<p><span> Relaxed Straight</span></p>
						
					</div>
					
					 <div class="span2 <?php if(!in_array('p_curly',$hps)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="Permed Curly" class="widget-stats small ">
							<img alt="Permed Curly" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_process/Permed_Curly.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(8,'p_curly',$answers);?></span>
						</a>
						<p><span> Permed Curly</span></p>
						
					</div>
					<div class="clear"></div>
			 <div class="span5">
				
			<!-- Horizontal Bars Chart -->
			 <div id="chart_process_pie" style="height: 250px;"></div>
		
	                </div>
					<div class="clear"></div>
					</div>
		</div>
	  </div>
	  
	  
	<div class="row-fluid stat-icons">
	    <!--<h3 class="icons-header">Hair Conditions</h3>-->
	
		 <div class="widget">
		<div class="widget-head">
         <h4 class="heading">Hair Conditions</h4>
        </div>
		<?php   $hcs=explode(',',$ans[7]);

		?>
		<div class="widget-body">
	        <div class="span2 <?php if(!in_array('o_scalp',$hcs)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Oily Scalp" class="widget-stats small">
							<img alt="Oily Scalp" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_condition/Oily_Scalp.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(7,'o_scalp',$answers);?></span>
						</a>
						<p><span> Oily Scalp</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					 <div class="span2 <?php if(!in_array('p_bald',$hcs)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Pattern Baldness" class="widget-stats small margin-bottom-none">
							<img alt="Pattern Baldness" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_condition/pattern_baldness.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(7,'p_bald',$answers);?></span>
						</a>
						<p><span> Pattern Baldness</span></p>
						<!-- // Stats Widget END -->
						
					</div>
				 <div class="span2 <?php if(!in_array('g_hair',$hcs)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="Alopecia" class="widget-stats small ">
							<img alt="Alopecia" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_condition/alopecia.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(7,'g_hair',$answers);?></span>
						</a>
						<p><span> Alopecia</span></p>
						<!-- // Stats Widget END -->
						
					</div>
				 <div class="span2 <?php if(!in_array('sp_ends',$hcs)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="Grey Hair" class="widget-stats small ">
							<img alt="Grey Hair" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_condition/Grey_Hair.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(7,'sp_ends',$answers);?></span>
						</a>
						<p><span> Grey Hair</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					 <div class="span2 <?php if(!in_array('sp_ends',$hcs)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Split Ends" class="widget-stats small">
							<img alt="Split Ends" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_condition/Split_Ends.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(7,'sp_ends',$answers);?></span>
						</a>
						<p><span> Split Ends</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					 <div class="span2 <?php if(!in_array('normal',$hcs)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Split Ends" class="widget-stats small">
							<img alt="Normal" src=""/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(7,'normal',$answers);?></span>
						</a>
						<p><span> Normal</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="clear"></div>
			 <div class="span5">
				
			<!-- Horizontal Bars Chart -->
			 <div id="chart_condition_pie" style="height: 250px;"></div>
		
	                </div>
					<div class="clear"></div>
				</div>	
		</div>
	  </div>	  
	  
	

	  
	  
		  <div class="row-fluid stat-icons">
	 <div class="widget">
		<div class="widget-head">
         <h4 class="heading">Intended Hair Style</h4>
        </div>
		<?php   $hss=explode(',',$ans[9]); ?>
		<div class="widget-body">
	      <div class="span2 <?php if(!in_array('weave',$hss)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Weave" class="widget-stats small margin-bottom-none">
							<img alt="Weave" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/weave.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(9,'weave',$answers);?></span>
						</a>
						<p><span> Weave</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('r_s_hair',$hss)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Relaxed Straight Hair" class="widget-stats small margin-bottom-none">
							<img alt="Relaxed Straight Hair" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/relaxed_straight_Hairstyle.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(9,'r_s_hair',$answers);?></span>
						</a>
						<p><span> Relaxed Straight Hair</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('braids',$hss)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Braids" class="widget-stats small">
							<img alt="Braids" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/braids.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(9,'braids',$answers);?></span>
						</a>
						<p><span> Braids</span></p>
						<!-- // Stats Widget END -->
						
			</div>
		           <div class="span2 <?php if(!in_array('wigs',$hss)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Wigs" class="widget-stats small">
							<img alt="Wigs" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/wigs.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(9,'wigs',$answers);?></span>
						</a>
						<p><span> Wigs</span></p>
						<!-- // Stats Widget END -->
						
		     </div>
		<div class="span2 <?php if(!in_array('dreds',$hss)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Dreds" class="widget-stats small">
							<img alt="Dreds" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/Dreadlocks.png"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(9,'dreds',$answers);?></span>
						</a>
						<p><span> Dreds</span></p>
						<!-- // Stats Widget END -->
						
			</div>
			<div class="span2 <?php if(!in_array('p_t_hair',$hss)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Permed/Texturized Hair" class="widget-stats small">
							<img alt="Permed/Texturized Hair" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/texturized_permed_curly.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(9,'p_t_hair',$answers);?></span>
						</a>
						<p><span> Permed/Texturized Hair</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('n_c_hair',$hss)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Naturally Curly Hair" class="widget-stats small">
							<img alt="Naturally Curly Hair" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/Naturally_Curly.jpg"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(9,'n_c_hair',$answers);?></span>
						</a>
						<p><span> Naturally Curly Hair</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('nt_st_hair',$hss)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Naturally Straight Hair" class="widget-stats small">
							<img alt="Naturally Straight Hair" src="<?php bloginfo('url');?>/wp-content/themes/456shop/brand-admin/images/hair_style/Naturally_Straight.JPG"/>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(9,'nt_st_hair',$answers);?></span>
						</a>
						<p><span> Naturally Straight Hair</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="clear"></div>
			 <div class="span5">
				
			<!-- Horizontal Bars Chart -->
			 <div id="chart_hstyle_pie" style="height: 250px;"></div>
		
	                </div>
					<div class="clear"></div>
					</div>
					
		</div>
	  </div>

	
	<div class="separator bottom"></div>
	  
	  <div class="row-fluid stat-icons">
	<div class="widget">
		<div class="widget-head">
         <h4 class="heading">Hair Description</h4>
        </div>
		<?php $hds=explode(',',$ans[6]); ?>
		<div class="widget-body">
	      <div class="span2 <?php if(!in_array('coarse',$hds)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Coarse" class="widget-stats small margin-bottom-none">
							<span class="glyphicons fishes"><i></i></span>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(6,'coarse',$answers);?></span>
						</a>
						<p><span> Coarse</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="span2 <?php if(!in_array('soft',$hds)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="Soft" class="widget-stats small">
							<span class="glyphicons alarm"><i></i></span>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(6,'soft',$answers);?></span>
						</a>
						<p><span> Soft</span></p>
						<!-- // Stats Widget END -->
						
					</div>
	         <div class="span2 <?php if(!in_array('fine',$hds)) echo 'no_apply';?>">
					
						<!-- Stats Widget -->
						<a href="" title="Fine" class="widget-stats small">
							<span class="glyphicons notes"><i></i></span>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(6,'fine',$answers);?></span>
						</a>
						<p><span> Fine</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					
					<div class="span2 <?php if(!in_array('thin',$hds)) echo 'no_apply';?>">
						
						<!-- Stats Widget -->
						<a href="" title="Thin" class="widget-stats small">
							<span class="glyphicons coins"><i></i></span>
							<span class="count label label-primary"><?php echo get_admin_user_ans_count(6,'thin',$answers);?></span>
						</a>
						<p><span> Thin</span></p>
						<!-- // Stats Widget END -->
						
					</div>
					<div class="clear"></div>
			 <div class="span5">
				
			<!-- Horizontal Bars Chart -->
			 <div id="chart_des_pie" style="height: 250px;"></div>
		
	                </div>
					<div class="clear"></div>
					</div>
		
	  </div>
	  
	  </div>
	
	<div class="separator bottom"></div>

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
     

	/*var arrLatLng = [
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
			];*/
			
			var arrLatLng = [
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
				
			];

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

					
		var arr = [
		   { label: "African American/Black",  data: 20 },
		    { label: "Caucasian",  data: 10 },
		    { label: "European",  data: 15 },
		    { label: "Spanish/Latin",  data: 0 },
		    { label: "Asian",  data: 5 },
		    { label: "Other",  data: 25 }
		  
		];
		
		var arr2 = [
		   { label: "African American/Black",  data: <?php echo get_admin_user_ans_count(2,'Afb',$answers);?> },
		    { label: "Caucasian",  data: <?php echo get_admin_user_ans_count(2,'Cau',$answers);?> },
		    { label: "European",  data: <?php echo get_admin_user_ans_count(2,'Euro',$answers);?> },
		    { label: "Spanish/Latin",  data: <?php echo get_admin_user_ans_count(2,'Spnsh',$answers);?> },
		    { label: "Asian",  data: <?php echo get_admin_user_ans_count(2,'Asn',$answers);?> },
		    { label: "Other",  data: <?php echo get_admin_user_ans_count(2,'Indn',$answers);?> }
		  
		];

		function updateDonut()
		{
			charts.chart_donut.setData(arr);
		}


	
	
	   
	  //   data: null;
	
		var d1 = [];
		   // for (var i = 0; i <= 10; i += 1)
		        d1.push(['20',<?php echo '400';?>]);
			     d1.push(['25',<?php echo '100';?>]);
				 d1.push(['30',<?php echo '20';?>]);
				  d1.push(['31',<?php echo '280';?>]);
				  d1.push(['32',<?php echo '20';?>]);
			 //   d1.push(['50',<?php echo '360';?>]);
				 d1.push(['26',<?php echo '400';?>]);
			     d1.push(['16',<?php echo '800';?>]);
				 d1.push(['35',<?php echo '800';?>]);
				  d1.push(['22',<?php echo '250';?>]);
				   d1.push(['15',<?php echo '459';?>]);

		 var d2 = [];
		   // for (var i = 0; i <= 10; i += 1)
				d2.push(['1',<?php echo get_admin_user_ans_count(12,1,$answers);?>]);
				d2.push(['2',<?php echo get_admin_user_ans_count(12,2,$answers);?>]);
				d2.push(['3',<?php echo get_admin_user_ans_count(12,3,$answers);?>]);
				d2.push(['4',<?php echo get_admin_user_ans_count(12,4,$answers);?>]);
				d2.push(['5',<?php echo get_admin_user_ans_count(12,5,$answers);?>]);
				d2.push(['6',<?php echo get_admin_user_ans_count(12,6,$answers);?>]);
				d2.push(['7',<?php echo get_admin_user_ans_count(12,7,$answers);?>]);
				d2.push(['8',<?php echo get_admin_user_ans_count(12,8,$answers);?>]);
				d2.push(['9',<?php echo get_admin_user_ans_count(12,9,$answers);?>]);
				d2.push(['10',<?php echo get_admin_user_ans_count(12,10,$answers);?>]);
				d2.push(['11',<?php echo get_admin_user_ans_count(12,11,$answers);?>]);
				d2.push(['12',<?php echo get_admin_user_ans_count(12,12,$answers);?>]);
				d2.push(['13',<?php echo get_admin_user_ans_count(12,13,$answers);?>]);
				d2.push(['14',<?php echo get_admin_user_ans_count(12,14,$answers);?>]);
				d2.push(['15',<?php echo get_admin_user_ans_count(12,15,$answers);?>]);
				d2.push(['16',<?php echo get_admin_user_ans_count(12,16,$answers);?>]);
				d2.push(['17',<?php echo get_admin_user_ans_count(12,17,$answers);?>]);
				d2.push(['18',<?php echo get_admin_user_ans_count(12,18,$answers);?>]);
				d2.push(['19',<?php echo get_admin_user_ans_count(12,19,$answers);?>]);
				d2.push(['20',<?php echo get_admin_user_ans_count(12,20,$answers);?>]);
				d2.push(['21',<?php echo get_admin_user_ans_count(12,21,$answers);?>]);
				d2.push(['22',<?php echo get_admin_user_ans_count(12,22,$answers);?>]);
				d2.push(['23',<?php echo get_admin_user_ans_count(12,23,$answers);?>]);
				d2.push(['24',<?php echo get_admin_user_ans_count(12,24,$answers);?>]);
				d2.push(['25',<?php echo get_admin_user_ans_count(12,25,$answers);?>]);
				d2.push(['26',<?php echo get_admin_user_ans_count(12,26,$answers);?>]);
				d2.push(['27',<?php echo get_admin_user_ans_count(12,27,$answers);?>]);
				d2.push(['28',<?php echo get_admin_user_ans_count(12,28,$answers);?>]);
				d2.push(['29',<?php echo get_admin_user_ans_count(12,29,$answers);?>]);
				d2.push(['30',<?php echo get_admin_user_ans_count(12,30,$answers);?>]);
				d2.push(['31',<?php echo get_admin_user_ans_count(12,31,$answers);?>]);
				d2.push(['32',<?php echo get_admin_user_ans_count(12,32,$answers);?>]);
				d2.push(['33',<?php echo get_admin_user_ans_count(12,33,$answers);?>]);
				d2.push(['34',<?php echo get_admin_user_ans_count(12,34,$answers);?>]);
				d2.push(['35',<?php echo get_admin_user_ans_count(12,35,$answers);?>]);
				d2.push(['36',<?php echo get_admin_user_ans_count(12,36,$answers);?>]);
				d2.push(['37',<?php echo get_admin_user_ans_count(12,37,$answers);?>]);
				d2.push(['38',<?php echo get_admin_user_ans_count(12,38,$answers);?>]);
				d2.push(['39',<?php echo get_admin_user_ans_count(12,39,$answers);?>]);
				d2.push(['40',<?php echo get_admin_user_ans_count(12,40,$answers);?>]);
				d2.push(['41',<?php echo get_admin_user_ans_count(12,41,$answers);?>]);
				d2.push(['42',<?php echo get_admin_user_ans_count(12,42,$answers);?>]);
				d2.push(['43',<?php echo get_admin_user_ans_count(12,43,$answers);?>]);
				d2.push(['44',<?php echo get_admin_user_ans_count(12,44,$answers);?>]);
				d2.push(['45',<?php echo get_admin_user_ans_count(12,45,$answers);?>]);
				d2.push(['46',<?php echo get_admin_user_ans_count(12,46,$answers);?>]);
				d2.push(['47',<?php echo get_admin_user_ans_count(12,47,$answers);?>]);
				d2.push(['48',<?php echo get_admin_user_ans_count(12,48,$answers);?>]);
				d2.push(['49',<?php echo get_admin_user_ans_count(12,49,$answers);?>]);
				d2.push(['50',<?php echo get_admin_user_ans_count(12,50,$answers);?>]);

		 
		    data = new Array();
		 
		    data.push({
		     	label: "Customers",
		        data: d2
		    });

			
	function updateStacked()
		{
			charts.chart_stacked_bars.setData(data);
		}


var arrlength= [
		    { label: "Very Short",  data: 30 },
		    { label: "Short",  data: 20 },
		    { label: "Medium",  data: 15 },
		    { label: "Long",  data: 50 },
		    { label: "Very Long",  data: 12 }
		   
		];
		
		var arrlength2= [
		    { label: "Very Short",  data: <?php echo get_admin_user_ans_count(5,'v_short',$answers);?> },
		    { label: "Short",  data: <?php echo get_admin_user_ans_count(5,'short',$answers);?> },
		    { label: "Medium",  data: <?php echo get_admin_user_ans_count(5,'medium',$answers);?>  },
		    { label: "Long",  data: <?php echo get_admin_user_ans_count(5,'long',$answers);?>  },
		    { label: "Very Long",  data: <?php echo get_admin_user_ans_count(5,'v_long',$answers);?>  }
		   
		];

	
		function updateLengthPie()
		{
			charts.chart_length_pie.setData(arrlength2);
		}


	
   var arrtex =[
		    { label: "1a",  data: 50 },
		    { label: "2a",  data: 23 },
		    { label: "2b",  data: 15 },
		    { label: "2c",  data: 90 },
		    { label: "3a",  data: 22 },
		    { label: "3b",  data: 3 },
			 { label: "3c",  data: 39 },
		    { label: "4a",  data: 120 },
		    { label: "4b",  data: 30 },
		    { label: "4c",  data: 35 }
		];

	   var arrtex2 =[
		    { label: "1a",  data: <?php echo get_admin_user_ans_count(4,'1a',$answers);?> },
		    { label: "2a",  data: <?php echo get_admin_user_ans_count(4,'2a',$answers);?> },
		    { label: "2b",  data: <?php echo get_admin_user_ans_count(4,'2b',$answers);?> },
		    { label: "2c",  data: <?php echo get_admin_user_ans_count(4,'2c',$answers);?> },
		    { label: "3a",  data: <?php echo get_admin_user_ans_count(4,'3a',$answers);?> },
		    { label: "3b",  data: <?php echo get_admin_user_ans_count(4,'3b',$answers);?> },
			 { label: "3c",  data: <?php echo get_admin_user_ans_count(4,'3c',$answers);?> },
		    { label: "4a",  data: <?php echo get_admin_user_ans_count(4,'4a',$answers);?> },
		    { label: "4b",  data: <?php echo get_admin_user_ans_count(4,'4b',$answers);?> },
		    { label: "4c",  data: <?php echo get_admin_user_ans_count(4,'4c',$answers);?> }
		];
		function updateTexPie()
		{
		 
		charts.chart_tex_pie.setData(arrtex2);
		}

		   
		   
		var arrpro =[
		    { label: "Colored Hair",  data: 38 },
		    { label: "Relaxed Straight",  data: 23 },
		    { label: " Permed Curly",  data: 15 }
		];

		var arrpro2 =[
		    { label: "Colored Hair",  data: <?php echo get_admin_user_ans_count(8,'c_hair',$answers);?> },
		    { label: "Relaxed Straight",  data: <?php echo get_admin_user_ans_count(8,'r_straight',$answers);?> },
		    { label: " Permed Curly",  data: <?php echo get_admin_user_ans_count(8,'p_curly',$answers);?> }
		];

		function updateProcessPie()
		{
		 
		charts.chart_process_pie.setData(arrpro2);
		}
		
		
		var	arrcond =[
		    { label: "Oily Scalp",  data: 58 },
		    { label: "Pattern Baldness",  data: 23 },
		    { label: "Alopecia",  data: 15 },
		    { label: "Grey Hair",  data: 79 },
		    { label: "Split Ends",  data: 12 },
		    { label: "Normal",  data: 23 }
		];
		var arrcond2 =[
		    { label: "Oily Scalp",  data: <?php echo get_admin_user_ans_count(7,'o_scalp',$answers);?> },
		    { label: "Pattern Baldness",  data: <?php echo get_admin_user_ans_count(7,'p_bald',$answers);?> },
		    { label: "Alopecia",  data: <?php echo get_admin_user_ans_count(7,'alopecia',$answers);?> },
		    { label: "Grey Hair",  data: <?php echo get_admin_user_ans_count(7,'g_hair',$answers);?> },
		    { label: "Split Ends",  data: <?php echo get_admin_user_ans_count(7,'sp_ends',$answers);?> },
		    { label: "Normal",  data: <?php echo get_admin_user_ans_count(7,'normal',$answers);?> }
		];

	
		function updateConditionPie()
		{
		 
		charts.chart_condition_pie.setData(arrcond2);
		}

		var arrhsty =[
		     { label: "Weave",  data: 38 },
		    { label: "Relaxed Straight Hair",  data: 23 },
		    { label: "Braids",  data: 150 },
		    { label: "Wigs",  data: 90 },
		    { label: "Dreds",  data: 12 },
		    { label: "Permed/Texturized Hair",  data: 3 },
			{ label: "Naturally Curly Hair",  data: 12 },
			{ label: "Naturally Straight Hair",  data: 12 }
		];

	
		var arrhsty2 =[
		    { label: "Weave",  data: <?php echo get_admin_user_ans_count(9,'weave',$answers);?> },
		    { label: "Relaxed Straight Hair",  data: <?php echo get_admin_user_ans_count(9,'r_s_hair',$answers);?> },
		    { label: "Braids",  data: <?php echo get_admin_user_ans_count(9,'braids',$answers);?> },
		    { label: "Wigs",  data: <?php echo get_admin_user_ans_count(9,'wigs',$answers);?> },
		    { label: "Dreds",  data: <?php echo get_admin_user_ans_count(9,'dreds',$answers);?> },
		    { label: "Permed/Texturized Hair",  data: <?php echo get_admin_user_ans_count(9,'p_t_hair',$answers);?> },
			{ label: "Naturally Curly Hair",  data: <?php echo get_admin_user_ans_count(9,'n_c_hair',$answers);?> },
			{ label: "Naturally Straight Hair",  data: <?php echo get_admin_user_ans_count(9,'nt_st_hair',$answers);?> }
		];

		function updateHstylePie()
		{
		 
		charts.chart_hstyle_pie.setData(arrhsty2);
		}

		var arrdes =[
		      { label: "Coarse",  data: 38 },
		    { label: "Soft",  data: 23 },
		    { label: "Fine",  data: 15 },
		    { label: "Thin",  data: 90 }
		];

	var	arrdes2 =[
		    { label: "Coarse",  data: <?php echo get_admin_user_ans_count(6,'coarse',$answers);?> },
		    { label: "Soft",  data: <?php echo get_admin_user_ans_count(6,'soft',$answers);?> },
		    { label: "Fine",  data: <?php echo get_admin_user_ans_count(6,'fine',$answers);?> },
		    { label: "Thin",  data: <?php echo get_admin_user_ans_count(6,'thin',$answers);?> }
		];
		function updateDesPie()
		{
		 
		charts.chart_des_pie.setData(arrdes2);
		}
	
	
	
	function updateCharts()
		{
		initUSAOverview();
		updateDonut();
		updateStacked();
		updateLengthPie();
		updateTexPie();
		updateProcessPie();
		updateConditionPie();
		updateHstylePie();
		updateDesPie();
		
		}
		
	
	window.onload = updateCharts;

	
	</script>
