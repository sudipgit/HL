<?php
/*
Template Name: Brand Page
*/
?>
<?php get_header(); ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.blue.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.plastic.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.round.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/price-slider/css/jslider.round.plastic.css" type="text/css">
  <!-- end -->

	<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
	
	<!-- bin/jquery.slider.min.js -->
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/tmpl.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/price-slider/js/jquery.slider.js"></script>
<style>
body {
    background-attachment: fixed;
	}
</style>
<?php

 $bid=$_GET['id'];
 if(!$bid)
 //Source: functions/brandadmin.php
 //returns brand id by brand slug
 $bid=getBrandIDBySlug($_GET['n']);
 $current_user = wp_get_current_user();
 //Source: functions/likes.php
 $is_liked=isFollowed($current_user->ID,$bid,'brand');
 
 if($current_user->ID<1)
  $msg="Please login to Follow";
 if($is_liked) 
  $msg="You already Followed";
  //Source: functions/likes.php
 $follows=getTotalFollowers($bid,'brand');



?>

<script>
	
function saveFollow() { 
   
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $bid;?>&type=brand",
        success:function(data){
             $("#heartf").hide(1000);
			  $("#heartf-after").show(500);
			 $("#follow-no").html('<?php echo $follows+1;?>');
        }
    });
   
	
}

function saveFollowm() { 
   
    $.ajax({
            type:"post",
            url:"<?php bloginfo('url');?>/savelike.php",
        data:"uid=<?php echo $current_user->ID;?>&id=<?php echo $bid;?>&type=brand",
        success:function(data){
             $("#heartfm").hide(1000);
			  $("#heartf-afterm").show(500);
			 $("#follow-nom").html('<?php echo $follows+1;?>');
        }
    });
   
	
}
</script>

		<div id="main" class="wrap brand-page">
			<div class="container">
	           <?php	
              	 /**
				Source:functions/brandadmin.php
				returns Brand info of given brand id**/			
				$brand= get_brand_info($bid);
				//source: functions/brandadmin.php
				//returns the thumbnail path of brands.
               $thumbpath=getBrandThumbPath($brand->user_id,'avatar');
	            
				   
				$args=null;   
				$type=$_GET['pt'];   
				  switch($type)
						{

						case 'conditioner':
								$args=array(253,213,192,217,196,177,221,205,209,200);  
								break;
						case 'shampoo':
								$args=array(254,215,191,219,195,176,223,207,211);  
								break;
						case 'oil':
								$args=array(259,247,229,241,235,276);  
								break;
						case 'gel':
								$args=array(256,244,226,238,232,277);  
								break;
						case 'moisturizer':
								$args=array(260,245,227,239,233,278);  
								break;
						case 'spray':
								$args=array(257,243,225,237,231,279);  
								break;
						case 'color':
								$args=array(261,246,228,240,234,280);  
								break;
						case 'repair':
								$args=array(265,267,269,264,271,273);  
								break;
						case 'wigs':
								$args=array(284,293,299,305,311);  
								break;
						case 'irons':
								$args=array(285,292,298,304,310);  
								break;
						case 'accessories':
								$args=array(286,291,297,303,309);  
								break;
						case 'relaxer':
								$args=array(287,290,296,302,308);  
								break;
						case 'texturizer':
								$args=array(288,289,295,301,307);  
								break;
						case 'extensions':
								$args=array(283,294,300,306,312);  
								break;		
																		
		

						}				  
				    
					 if(isset($_POST['sortby']))
				     $sort=$_POST['sortby'];
				if(isset($_POST['price']))
				     $price=$_POST['price'];
					 //Source: functions/brandadmin.php
				 	$c_ids=get_brand_products($bid,$args,null,$sort,$price);
				
					include_once('brand-admin/templates/functions.php');
	              $current_user = wp_get_current_user();
				  if($current_user>0)
				  //Source: functions/products.php
				  //Returns one dimensional array of matching products.
				$mymatches=getMatchingProducts($current_user->ID);
			//var_dump($mymatches);
				if($type=="match" && $mymatches)
				{
				
				   $list=array();
				    foreach($c_ids as $c_id)
					{
					  if( $mymatches && count($mymatches)>0 && in_array($c_id->id,$mymatches))
					   $list[]=$c_id;
					
					}
				
				$c_ids=array();
				$c_ids=$list;
				
				}
				
				


	             ?>
				<div class="row-fluid brand-info">
				<?php
				/** Return formatted string**/				
               $cname=getFormatedDes($brand->company_name);
			   
			   ?>
			   
			   		<div class="span6">
						<div class="brand-info-image ">
						
						<?php if($brand->show_video==1 && $brand->embed_video!=""){
						   /** Return formatted string**/			
						   echo getFormatedDes($brand->embed_video);
						}else{ ?>
						<img src="<?php echo $thumbpath;?>" width="460" alt="Profile" />										
						<?php }?>
						</div>
					
					</div>
					<div class="span6 info-left" style="padding-top:0;">
						<h1 class="brand-info-title" style="margin-bottom:10px;float:left;margin-right:15px;line-height:25px"> <?php echo $cname;?> </h1>	
						<div class="social-md-bar desktop-display">
							<div class="line"></div>
							<div class="media-bar" style="text-align:left;float:left;padding-top:2px">
								<ul>
								    <?php if($brand->facebook!=""){ ?>
									<li><a title="Facebook" target="_blank" class="facebook" href="<?php echo $brand->facebook;?>">Facebook</a></li>
									<?php } ?>
									
									<?php if($brand->twitter!=""){ ?>
									<li><a  target="_blank"  title="Twitter" class="twitter" href="<?php echo $brand->twitter;?>">Twitter</a></li>
									<?php } ?>
									
							      <?php if($brand->instagram!=""){ ?>
									<li><a target="_blank"  title="Instagram" class="instagram" href="<?php echo $brand->instagram;?>">Inatagram</a></li>
									<?php } ?>
								   <?php if($brand->thumblr!=""){ ?>
									<li><a target="_blank"  title="Tumblr" class="thumblr" href="<?php echo $brand->thumblr;?>">Tumblr</a></li>
									<?php } ?>
									<?php if($brand->youtube!=""){ ?>
									<li><a target="_blank"  title="YouTube" class="youtube" href="<?php echo $brand->youtube;?>">Youtube</a></li>
									<?php } ?>
									
									
									
								</ul>
								<div class="clear"></div>
							</div>
						</div>
						
                       <div class="clear"></div>
					   
						<p class="brand-info-des"> 
						<?php /*$overview=stripslashes($brand->overview);
		                $overview=stripslashes($overview);
						 $overview=stripslashes($overview);
		             echo stripslashes($overview);*/
					 echo getFormatedDes($brand->overview);?>  
		          </p>
				  	  <div class="follow-buttons section desktop-display">
		              <?php if(!is_brand($current_user->ID)) {?>
			        <a style="<?php if($is_liked || $current_user->ID<1) echo 'display:none';?>" class="follow-button" id="heartf" title="Follow" href="javascript:saveFollow();">Inspired</a>
			       <a style="<?php if(!$is_liked && $current_user->ID>0) echo 'display:none';?>" class="follow-button after-follow" id="heartf-after" href="javascript:void();" title="<?php echo $msg;?>"><?php if($current_user->ID<1) echo 'Inspired'; else echo 'Following';?></a>
				    <?php } ?>
			        <p class="followers"><span id="follow-nom"><? echo $follows;?></span> Inspired</p>
			           <div class="clear"></div>
			           </div>
				  	  <div class="follow-buttons section mobile-display" style="padding-bottom:15px;">
		              <?php if(!is_brand($current_user->ID)) {?>
			        <a  style="<?php if($is_liked || $current_user->ID<1) echo 'display:none';?>" class="follow-button" id="heartfm" title="Follow" href="javascript:saveFollowm();">Inspired</a>
			       <a style="<?php if(!$is_liked && $current_user->ID>0) echo 'display:none';?>" class="follow-button after-follow" id="heartfm-after" href="javascript:void();" title="<?php echo $msg;?>"><?php if($current_user->ID<1) echo 'Inspired'; else echo 'Following';?></a>
				    <?php } ?>
			        <!--<p class="followers"><span id="follow-no"><? echo $follows;?></span> Inspired</p>-->
			           <div class="clear"></div>
			           </div>
					<div class="social-md-bar mobile-display">
							<div class="line"></div>
							<div class="media-bar">
								<ul>
								    <?php if($brand->facebook!=""){ ?>
									<li><a title="Facebook" target="_blank" class="facebook" href="<?php echo $brand->facebook;?>">Facebook</a></li>
									<?php } ?>
									
									<?php if($brand->twitter!=""){ ?>
									<li><a  target="_blank"  title="Twitter" class="twitter" href="<?php echo $brand->twitter;?>">Twitter</a></li>
									<?php } ?>
									
							      <?php if($brand->instagram!=""){ ?>
									<li><a target="_blank"  title="Instagram" class="instagram" href="<?php echo $brand->instagram;?>">Inatagram</a></li>
									<?php } ?>
								   <?php if($brand->thumblr!=""){ ?>
									<li><a target="_blank"  title="Tumblr" class="thumblr" href="<?php echo $brand->thumblr;?>">Tumblr</a></li>
									<?php } ?>
									<?php if($brand->youtube!=""){ ?>
									<li><a target="_blank"  title="YouTube" class="youtube" href="<?php echo $brand->youtube;?>">Youtube</a></li>
									<?php } ?>
									
									
									
								</ul>
								<div class="clear"></div>
							</div>
						</div>
						
						 
					  
					</div>
			
						
				</div>
				
				<div class="row-fluid brand-product-tabs">	
				
				<div class="brand-product-header">
					<div class="sort-by-product desktop-display">
						<form id="sort-form" action="" method="post">
							<label for="">Sort By</label>
							<select name="sortby" onchange="submitForm();">
								<option value="" >Newest</option>
								<option value="desc" <?php if($sort=="desc") echo 'selected="selected"';?>>Most Popular</option>
								<option value="asc" <?php if($sort=="asc") echo 'selected="selected"';?>>Least Popular</option>
							</select>
							<input type="hidden" name="price" value="<?php echo $price;?>"/>
						</form>
					</div>
					<!--<h3 class="desktop-display"> <?php  echo getFormatedDes($cname);?></h3>-->
					<p><?php echo count($c_ids);?> Items</p>
				<hr>
				</div>
				
		         <?php  
			
				 
                if($_GET['pp'])
				  $current=$_GET['pp'];
				  else
				   $current=1;
          			
					
				?>
					<div>	 
		          
					<div class="panel entry-content" id="tab11">
					
					<div class="span3 left-bar desktop-display">
					
				    <div class="layout price-range">
					  <h3>Heart Range</h3>
                       <form id="s-form" action="" method="post">
                          <div class="layout-slider">
						  
                         <input id="Slider2" type="slider" name="price" value="<?php if($price) echo $price;else echo '1;1000';?>" />
                       </div>
                      <script type="text/javascript" charset="utf-8">
                           jQuery("#Slider2").slider({ from: 1, to: 100, heterogeneity: ['1/5'], step: 5, dimension: '&nbsp;&hearts;' });
                        </script>
						<input type="hidden" name="sortby" value="<?php echo $sort;?>"/>
						</form>
                    </div>
					<ul>
						<li <?php if($type=='') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=all">All</a></li>
						<li <?php if($type=='match') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=match">My Matches</a></li>
						<li <?php if($type=='conditioner') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=conditioner">Conditioner</a></li>
						<li <?php if($type=='shampoo') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=shampoo">Shampoo</a></li>
						<li <?php if($type=='oil') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=oil">Oil</a></li>
						<li <?php if($type=='gel') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=gel">Gel</a></li>
						<li <?php if($type=='moisturizer') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=moisturizer">Moisturizer</a></li>
						<li <?php if($type=='spray') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=spray">Hair Spray</a></li>
						<li <?php if($type=='color') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=color">Hair Color</a></li>
						<li <?php if($type=='repair') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=repair">Hair Care/Repair</a></li>
						
						<li <?php if($type=='extensions') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=extensions">Hair Extensions</a></li>
						<li <?php if($type=='wigs') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=wigs">Wigs</a></li>
						<li <?php if($type=='irons') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=irons">Irons and Curlers</a></li>
						<li <?php if($type=='accessories') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=accessories">Hair accessories</a></li>
						<li <?php if($type=='relaxer') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=relaxer">Relaxer/Straightening Treatment</a></li>
                        <li <?php if($type=='texturizer') echo 'class="active"';?>><a href="<?php bloginfo('url');?>/brand/?id=<?php echo $bid;?>&pt=texturizer">Texturizer</a></li>



					</ul>
					
					
					<span class="leftbar-brand-title left-bar-title">All Brands</span>
					<ul class="left-brand-names">
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(164);?>">Aesop</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(114);?>">Affirm</a></li>
                        <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(99);?>">African Pride</a></li>
                        <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(125);?>">Agadir</a></li>
						<li><a href="#">Aphogee</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6329);?>">AlbertoVo5</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(167);?>">Alder New York</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(215);?>">Alikay Naturals</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6318);?>">American Crew</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(389);?>">Art Of Shaving</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(173);?>">Aunt Jackies</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6341);?>">Aussie</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(222);?>">Aveda</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(113);?>">Avlon</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(78);?>">Beautiful Textures</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(109);?>">Bigen</a></li>
						<li><a href="#">Bobbi Boss</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(112);?>">Bohyme</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(223);?>">Bumble and Bumble</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6506);?>">Burtsbees</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6476);?>">California Baby</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(117);?>">Cantu</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(34);?>">Carol's Daughter</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6464);?>">Chi</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6339);?>">Clairol</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6500);?>">Clear</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(105);?>">Creme Of Nature</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(224);?>">Conair</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(101);?>">Dark & Lovely</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(220);?>">Davines</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(81);?>">DEVA CURL</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(108);?>">Doo Grow</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6502);?>">Dove</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(160);?>">Dr Bronner</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(185);?>">Dr Miracles</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6316);?>">EcoStyler</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(115);?>">Elasta Qp</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(107);?>">Fantasia</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6323);?>">Fekkai</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6335);?>">Garnier Fructise</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6317);?>">Gillette</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6311);?>">Got2Be</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6467);?>">HairEnvy</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(106);?>">Hairfinity</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(191);?>">Hair Library</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(221);?>">Hair Rules</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6336);?>">Herbal Essence</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6447);?>">Infusium 23</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(166);?>">Intelligent Nutrients</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6507);?>">Its A 10</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(98);?>">Jane Carter Solution</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6479);?>">John Frieda</a></li>
						 <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6478);?>">Just for Men</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6445);?>">Karen’s Body Beautiful </a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(111);?>">Kinky Curly</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6319);?>">Knotty Boy</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6333);?>">Laila Ali</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(118);?>">Lisa Raye</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6444);?>">Living Proof</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6334);?>">Loreal Paris</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6441);?>">Luster</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(183);?>">Macadamia</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(163);?>">Malin+Goetz</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(102);?>">Mane n Tail</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6313);?>">Manic Panic</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6327);?>">Matrix</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(80);?>">Miss Jessie's</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(100);?>">Mixed Chicks</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6314);?>">Mizani</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(212);?>">Moroccanoil</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6338);?>">Motions</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6320);?>">Murrays</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6337);?>">Neutrogena</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6325);?>">Nexxus</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6450);?>">Nioxin</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6332);?>">Organix</a></li>
						<li><a href="#">ORS Beauty</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(218);?>">Ouidad</a></li>
						
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(104);?>">Palmers</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6465);?>">Pantene</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6322);?>">Paul Mitchell</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6443);?>">Phyto</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(77);?>">Profective</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(216);?>">Pureology</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6326);?>">Redken</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6315);?>">Revlon</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6474);?>">Rogaine</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(219);?>">Sexy Hair</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(103);?>">SheaMoisture</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6312);?>">Splat</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6330);?>">suave</a></li>
						<li><a href="#">Sulfur 8</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6449);?>">Sunny Isle</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(110);?>">4 Naturals</a></li>
					    <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(79);?>">Taliah Waajid</a></li>
						
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(214);?>">The Dry Bar</a></li>
						<li><a href="#">ThermaSilk</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6331);?>">Tigi</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6455);?>">Toppik</a></li>
				        <li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(165);?>">Travis Dowdy</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6340);?>">Treseeme</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6328);?>">Vidal Sassoon</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6468);?>">Viviscal</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6446);?>">Wahl Clippers</a></li>
						<li><a href="<?php bloginfo('url');?>/brand/?n=<?php echo getBrandSlug(6321);?>">Wen</a></li>
					</ul>
					
					</div>
					<div class="span9">
					<div class="woocomerce margin-left-none">
						<?php if($c_ids) {
						?>
                           <ul class="products">
						   
						   <?php 
						/*   	
							$total_page=floor(count($c_ids)/12);	
							if(count($c_ids)%12 !=0)
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
						   $pages=($current-1)*12;
						   $j=0;
						   $i=0;*/
						   foreach($c_ids as $match)
						   {
						     // $j++;
                            // if($j >$pages && $j<= $pages+12)
					         //  {
                        $brand2=null;
						   $ppost=get_post($match->id);
						    /**
							Source:functions/brandadmin.php
							returns Brand info of given brand id**/
						   $brand2= get_brand_info($ppost->post_author);
						   ?>
							
                           <li class=" span4 product <?php if($i%3==0) echo 'first';?>">
						   <div class="product-item shadow-s3" style="box-shadow: 1px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                         <?php if( $mymatches && count($mymatches)>0 && in_array($match->id,$mymatches)) { ?>						   
						   <span class="onsale"></span>
						   <?php } ?>
                             <!-- <span class="onsale">Sale!</span>-->
                             <?php 
							  /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
							 getProductContent($match->id,$current_user->ID);?>
					         
                            </div>
						   </li>
						   <?php $i++; } //} ?>
						   </ul>
						   <?php } else { ?>
						   
						   <p> No products available</p>
						   <?php } ?>
						   </div>
					</div>
					
					</div> 

					
					</div> 
					
					<div class="clear"></div>
					<!--
					 	<div class="pagination pagination-small pull-right" style="margin: 0;">
					<ul>
						<li class="<?php if($current==1) echo 'disabled';?>"><a href="<?php //bloginfo('url');?>/brand/?pp=<?php //echo $prev;?>">&laquo;</a></li>
						<?php for($i=1;$i<=$total_page;$i++){?>
						<li class="<?php if($i==$current) echo 'active';?>"><a href="<?php //bloginfo('url');?>/brand/?pp=<?php //echo $i;?>"><?php //echo $i;?></a></li>
						<?php } ?>
						
						<li class="<?php if($current==$total_page) echo 'disabled';?>"><a href="<?php //bloginfo('url');?>/brand/?pp=<?php //echo $next;?>">&raquo;</a></li>
					</ul>
				</div>-->
					
					</div>

			</div>
		</div>
        <script>
		function submitForm()
		{
		
		$('#sort-form').submit();
		}
		
		

		$( "#shop-menu-item" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>