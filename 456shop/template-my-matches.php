
<?php
/*
Template Name: My Matches
*/

global $post;
$user=wp_get_current_user();
if($user->ID>0)
$userid=$user->ID;

 if( $userid < 1) {
 ?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php	
 }
 
 if(is_brand($userid))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php
 }
 
$matchcat = @$_GET["cat"];
?>

 


<?php get_header(); ?>
	
 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap post-template my-match-template">
			<div class="container">
				<div id="top-notify" class="woocommerce-message">
                      <div class="desktop-display"> The green dot highlights your matches! Keep exploring! It follows you around the library <a style="position:absolute;top:5px;right:10px;text-decoration: none;" href="javascript:void()" onclick="closeNotify();">x</a></div>
					   <div class="mobile-display"> Green Dot = Your Match <a style="position:absolute;top:5px;right:10px;text-decoration: none;" href="javascript:void()" onclick="closeNotify();">x</a></div>
                   </div>
				<div class="row-fluid" style="padding-top:0">	
					<div class="span12 post-page customer-profile">			
					<?php 
					
				
					
					/*
					Source:brandadmin.php
					returns one-d array of current user's answer.*/
					   $answers=getUserAnswers($userid);
					  
					   
					   $curly=array('s_s'=>223,'s_c'=>221,'s_g'=>238,'s_o'=>241,'s_mt'=>239,'s_hs'=>237,'s_hc'=>340);
					   $braids=array('s_s'=>254,'s_c'=>253,'s_g'=>256,'s_o'=>259,'s_mt'=>260,'s_hs'=>257,'s_hc'=>261);
					   $dreads=array('s_s'=>191,'s_c'=>192,'s_g'=>243,'s_o'=>247,'s_mt'=>245,'s_hs'=>243,'s_hc'=>246);
					   $n_straight=array('s_s'=>176,'s_c'=>177,'s_g'=>226,'s_o'=>229,'s_mt'=>227,'s_hs'=>225,'s_hc'=>228);
					   $r_straight=array('s_s'=>207,'s_c'=>205,'s_g'=>232,'s_o'=>235,'s_mt'=>233,'s_hs'=>231,'s_hc'=>234);
					   
					   $product_types=array(189=>$curly,250=>$braids,179=>$dreads,180=>$n_straight);
					   
					   //$product_cat=$product_types[$answers[3]][$matchcat];
					   
					   $product_cat=$product_types[$answers[3]][$matchcat];
					  
					 
					  // $mylibrary=getMyLibrary($user->ID);
					   // $mylibrary=getAllOrderedProducts($user->ID);
						//$mylibrary=getAllLikedProducts($user->ID);
						if($matchcat){
						 //Source:/functions/products.php
						 //Returns one dimensional array of products those are matched with current user's products.				
					      $matches=getMatchingProducts($user->ID,null,10,$product_cat);
					    }else{
						//Source:/functions/products.php
						 //Returns one dimensional array of products those are matched with current user's products.
						  $matches=getMatchingProducts($user->ID);
						}   
						
                       $cat=getTerm($answers[3]);					   
					   $catname=$cat->slug;
					     // Source:/functions/users.php
						 //returns user's avatar path
						$avatarpath=getAvatarPath($user->ID);
						// Source:/functions/users.php
						 //returns user's thumb path
						$thumbpath=getThumbPath($user->ID);
			         	$hairconditions = $_GET['hc'];
				        $hccat = $_GET['cat'];

				/*$matches=fillterMatches($matches,$hairconditions, $hccat);
				if(count($matches)>0)
					shuffle($matches);
				//$recomends=getRecommendedMatchingProducts($current_user->ID);
				if(count($recomends)>0)
				shuffle($recomends);
			    */
					 ?>
                    
				
					

			    <div class="panel entry-content" >
					<div class="match-products">	
					<a class="button btn primary desktop-display" style="float:right;padding:4px 7px;" href="<?php bloginfo('url');?>/my-hair-profile/">Edit Profile</a>
				
              

                    <div class="woocommerce">
						<div class="match_nav desktop-display">
							<div class="title_nav">
								<ul>
								<?php 
									$pageURL = current_page_url();
									//Source:functions/brandadmin.php
									//return condition's name
									$conditionNames = getConditionNames();
									$conditions = array();
									$conditions = explode(',',$answers[7]);
									foreach($conditions as $condition){
								?>
									<li><a href="?hc=<?php echo $condition;?>"><?php echo $conditionNames[$condition]; ?></a></li>
									<?php } ?>
								
								</ul>
							</div>   
							<div class="product_nav">
								<ul>
									<li <?php if(!$hccat) echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/">ALL</a></li>
									<li <?php if($hccat=='s_c') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_c'; else echo '?cat=s_c';?>">Conditioner</a></li>
									<li <?php if($hccat=='s_s') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_s'; else echo '?cat=s_s';?>">Shampoo</a></li>
									<li <?php if($hccat=='s_o') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_o'; else echo '?cat=s_o';?>">Oil</a></li>
									<li <?php if($hccat=='s_g') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_g'; else echo '?cat=s_g';?>">Gel</a></li>
									<li <?php if($hccat=='s_mt') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_mt'; else echo '?cat=s_mt';?>">Moisturiser</a></li>
									<li <?php if($hccat=='s_hs') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_hs'; else echo '?cat=s_hs';?>">Hair Spray</a></li>
									<li <?php if($hccat=='s_hc') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_hc'; else echo '?cat=s_hc';?>">Hair Color</a></li>
									<li <?php if($hccat=='repair') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=repair'; else echo '?cat=repair';?>">Hair Care/Repair</a></li>									
								</ul>
							</div>
						</div>
						<div class="mobile-display matches-top" style="position:relative">
						<h3 class="title">My Matches</h3>
						<a class="button btn primary" style="position:absolute;padding:5px 7px;right:0;top:12px" href="<?php bloginfo('url');?>/my-hair-profile/">Edit Profile</a>
						<ul class="ul-cats">
									<li <?php if($hccat=='s_c') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_c'; else echo '?cat=s_c';?>">Conditioner</a></li>
									<li <?php if($hccat=='s_s') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_s'; else echo '?cat=s_s';?>">Shampoo</a></li>
									<li <?php if($hccat=='s_o') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_o'; else echo '?cat=s_o';?>">Oil</a></li>
									<li <?php if($hccat=='s_g') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_g'; else echo '?cat=s_g';?>">Gel</a></li>
									<li <?php if($hccat=='s_mt') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_mt'; else echo '?cat=s_mt';?>">Moisturiser</a></li>
									<li <?php if($hccat=='s_hs') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_hs'; else echo '?cat=s_hs';?>">Hair Spray</a></li>
									<li <?php if($hccat=='s_hc') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=s_hc'; else echo '?cat=s_hc';?>">Hair Color</a></li>
									<li <?php if($hccat=='repair') echo 'class="m_active"';?>><a href="http://hairlibrary.com/my-matches/<?php if($hairconditions) echo '?hc='.$hairconditions.'&cat=repair'; else echo '?cat=repair';?>">Hair Care/Repair</a></li>									
								</ul>
						</div>
						
						
						<?php if($matches) {?>
                           <ul class="products row-fluid">
						   
						   <?php 
						   $i=1;
						   //if($matches){
						   foreach($matches as $match) {
                          	
						   ?>
							
                           <li id="pno-<?php echo $i;?>" class=" span3 product">
						   <div class="product-item shadow-s3" style="box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);">
                             <!-- <span class="onsale">Sale!</span>-->
							  <span class="onsale "></span>
                           <?php 
						   /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
						   getProductContent($match,$current_user->ID);?>
                    
                            </div>
						   </li>
						   <?php $i++;
						   
						   if($i>12)
						    break;
						   } //} ?>
						   </ul>
						   <div id="testID"></div>
						   <div class="loading-more" style="text-align: center; margin-top:100px;margin: 100px 0 0;">
						   <img alt="loading" src="<?php bloginfo('template_url'); ?>/assets/img/loading_pink.gif"/>
						   </div>
						   <a class="see-more button" href="javascript:void();" onclick="getMoreProducts();">See More</a>
						   
						   <?php } else { ?>
						   
						   <p style="margin:50px 100px"> Currently we have no recommendations available in this category. We are adding products to the library daily, check back in.</p>
						   <?php } ?>
						</div>
						
						<!--
						<div class="woocommerce recommended">
						<h3 class="title"> Recommended Matches</h3>
						
						
						<?php 
						
						
						if($recomends) {?>
                           <ul class="products row-fluid">
						   
						   <?php 
						   $i=1;
						   foreach($recomends as $match) {
                        
                             
						   ?>
							
                        
							  <span class="onsale "></span>
                           <?php 
						   /**
							 *
							 Source:/functions/products.php
							 Generate HTML layout of product content of given current user
							 *
							 **/
						   getProductContent($match,$current_user->ID);?>
                    
                            </div>
						   </li>
						   <?php $i++;
						   if($i>=20)
						    break;
						   } ?>
						   </ul>
						   
						
						   
						   <?php } else { ?>
						   
						   <p> No product matches</p>
						   <?php } ?>
						</div>
						
						-->

                   
					
					</div>
			</div>
			 
		    <div class="clear"></div>
</div>


					
					</div>
		
                     
                    </div>
				</div>
<script>
page=2;
 my_matches = new Array();
	var j=0
	<?php if($matches) {
	$count=0;
	 foreach($matches as $match) {	
	 if($count>250)
	  break;
	  $count++;
	?>
my_matches[j] ='<?php echo $match ?>';
	j++;
	<?php } }?>
 
 
function getMoreProducts(){

var initial_index=(page-1)*12;
var ending_index=page*12;
//var id_string="2936-5143";

var id_string="";
for(var i = initial_index ; i < ending_index ; i++){
 if(i<j)
 {
  if(id_string=="")
    id_string=my_matches[i];
	else
	id_string=id_string+"-"+my_matches[i];
 }
}
	
cssclass=".loading-more";

 $(cssclass).show();
 	
    $.ajax({
        type:"post",
        url:"http://hairlibrary.com/ajaxmatches.php",
		data:"my_matches="+id_string,
        success:function(data){
	  $('.products').append(data);		
		$(cssclass).hide();
		
        }
    });
 
 
 page++;
  
  if(ending_index>=j)
  $('.see-more').hide();
 
}

function closeNotify()
{
$('#top-notify').fadeOut(1000);
}
</script>
      <script>
		$( "#match-menu-item" ).addClass( "active_menu_item" );
		</script>
<?php get_footer(); ?>