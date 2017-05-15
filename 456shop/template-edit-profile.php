
<?php
/*
Template Name: Edit Public profile
*/

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
 
 if(is_brand($userid))
 {?>
 <script>
 window.location.href = '<?php bloginfo('url'); ?>/';
 </script>
 
 <?php
 }
 $my_hair_wear = add_user_meta( $userid, 'my_hair_wear', true);
?>

<?php get_header(); ?>

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>$(function() {$( "#accordion" ).accordion();});</script>
	

<?php 
 include_once('brand-admin/templates/functions.php');
?>



 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap post-template edit-profile">
			<div class="container">					 
						<?php
						/*
						Source: functions/brandadmin.php
						returns one-d array of specific user's answer.
						*/
				 $answers=getUserAnswers($user->ID);
				// var_dump($answers);
				 ?>		
			
					<div class="ep_nav">
                      <h3 class="mobile-display edit-title title">Edit Profile</h3>
					<div class="title_nav tab_menu">	
							<ul class="ep-tabs 	<?php if($userid==$current_user->ID) echo 'have5';?>">
							
								<li><a class="bold" href="javascript:void()" id="hair-style-tab">Style</a></li>
								<li><a href="javascript:void()" id="hair-length-tab">Length</a></li>
								<li><a href="javascript:void()" id="hair-texture-tab">Texture</a></li>
								<li><a href="javascript:void()" id="chemical-treatment-tab">Treatments</a></li>
								<li><a href="javascript:void()" id="hair-conditions-tab">Conditions</a></li>
								<li><a href="javascript:void()" id="hair-description-tab">Description</a></li>
								<li><a href="javascript:void()" id="hair-wear-tab">Wear</a></li>
								<div class="clear"></div>
							</ul>
						</div>
					</div>
		
								
				<div id="panel-content" style="text-align:center;min-height:450px">		
						
<form name="hair_style" action="<?php bloginfo('url'); ?>/saveuserprofile.php" method="post" onsubmit="return fromValidation();">
							
					<div class="row-fluid ep-tabs-content" id="hair-style-tab1"  style="display:block">
                    <div class="section">
					 <h3 class="hair-type">My Current Hair Style IS...</h3>
					   <div class="question-images panel">
				   <ul class="d-hair-style">
					
					  <li>
					   <a class="hc_style <?php if($answers){ if($answers['3']=='188') echo 'active';}?>" href="javascript:void();" title="188"><img alt="Relaxed Straight Hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-straight.png" width="175px" />
					   <label>Straight</label>
					   </a>	
						
					  </li>
					   <li>
					    <a class="hc_style <?php if($answers){ if($answers['3']=='189') echo 'active';}?>" href="javascript:void();" title="189"><img alt="Naturally Curly Hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-curly.png"width="175px" />
						<label>Curly</label>
						</a>
						
					  
					  </li>
					  <li>
					    <a class="hc_style <?php if($answers){ if($answers['3']=='250') echo 'active';}?>" href="javascript:void();" title="250"><img alt="Braids" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-braids.png"width="175px" />
						<label>Braids</label>
						</a>
						
					  
					  </li>	
					  <li style="margin-right: 0">
					    <a class="hc_style <?php if($answers){ if($answers['3']=='179') echo 'active';}?>" href="javascript:void();" title="179"><img alt="Dreds" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair-locks.png"width="175px" />
						<label>Locks</label>
						</a>
						
					    
					  </li>
				<div class="clearfix"></div>
					</ul> 
					<div class="clear"></div>
				   </div>	
					</div>
					 </div>
					 
					 
					 
					 
					 
					 
					 <div class="row-fluid ep-tabs-content" id="hair-length-tab1">
                    					<div class="section">
				 <h3 class="hair-type">My Current Hair Length Is...</h3>
				   <div class="question-images panel">
				     <ul class="d-hair-length">
					  <li>
					    <a class="hc_length <?php if($answers){ if($answers['5']=='v_short') echo 'active';}?>" href="javascript:void();" title="v_short"><img alt="very-short-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/very-short-hair.png" width="100px" /></a>
					  
					  </li>
					  <li>
					    <a class="hc_length <?php if($answers){ if($answers['5']=='short') echo 'active';}?>" href="javascript:void();" title="short"><img alt="short-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/short-hair.png" width="96px" /></a>
					  
					  </li>
					  <li>
					    <a class="hc_length <?php if($answers){ if($answers['5']=='medium') echo 'active';}?>" href="javascript:void();" title="medium"><img alt="medium-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/medium-hair.png" width="100px" /></a>
					 
					  </li>
					  <li>
					    <a class="hc_length <?php if($answers){ if($answers['5']=='long') echo 'active';}?>" href="javascript:void();" title="long"><img alt="long-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/long-hair.png" width="96px" /></a>
					  
					  </li>
					   <li style="margin-right: 0">
					    <a class="<?php if($answers){ if($answers['5']=='v_long') echo 'active';}?>" href="javascript:void();" title="v_long"><img alt="very-long-hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/very-long-hair.png" width="105px" /></a>
					  
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				   </div>
					 </div>											
				<div class="row-fluid ep-tabs-content" id="hair-texture-tab1">
                    			<div class="section">
				 <h3 class="hair-type">My Natural Hair Texture Is...</h3>
				   <div class="question-images panel">
				    <ul class="d-hair-texture ">
					  <li id="texture-st">
					   <a  class="hc_texture <?php if($answers){ if($answers['4']=='1a') echo 'active';}?>" href="javascript:void();" title="1a"><img alt="1a" width="110px" src="<?php bloginfo('template_url'); ?>/assets/img/register/1a.png"/></a>
					  </li>
					   <li>
					  <a  class="hc_texture <?php if($answers){ if($answers['4']=='2a') echo 'active';}?>" href="javascript:void();" title="2a"><img alt="2a" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/2a.png"/></a>
					  </li>
					   <li>
						<a  class="hc_texture <?php if($answers){ if($answers['4']=='2b') echo 'active';}?>" href="javascript:void();" title="2b"><img alt="2b" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/2b.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture <?php if($answers){ if($answers['4']=='2c') echo 'active';}?>"  href="javascript:void();" title="2c"><img alt="2c" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/2c.png"/></a>
					  </li>
					  <li style="margin-right: 0">
					   <a  class="hc_texture <?php if($answers){ if($answers['4']=='3a') echo 'active';}?>" href="javascript:void();" title="3a"><img alt="3a" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/3a.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture <?php if($answers){ if($answers['4']=='3b') echo 'active';}?>"  href="javascript:void();" title="3b"><img alt="3b"  width="110px" src="<?php bloginfo('template_url'); ?>/assets/img/register/3b.png"/></a>
					  </li>
					  <li>
					  
					   <a  class="hc_texture <?php if($answers){ if($answers['4']=='3c') echo 'active';}?>" href="javascript:void();" title="3c"><img alt="3c" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/3c.png"/></a> 
					  </li>
					  <li>
					   <a class="hc_texture <?php if($answers){ if($answers['4']=='4a') echo 'active';}?>"  href="javascript:void();" title="4a"><img alt="4a"  width="110px" src="<?php bloginfo('template_url'); ?>/assets/img/register/4a.png"/></a>
					  </li>
					  <li>
					   <a class="hc_texture <?php if($answers){ if($answers['4']=='4b') echo 'active';}?>" href="javascript:void();" title="4b"><img alt="4b"  width="110px" src="<?php bloginfo('template_url'); ?>/assets/img/register/4b.png"/></a>
					  </li>
					  <li style="margin-right: 0">
					   <a class="hc_texture <?php if($answers){ if($answers['4']=='4c') echo 'active';}?>" href="javascript:void();" title="4c"><img alt="4c" width="110px"  src="<?php bloginfo('template_url'); ?>/assets/img/register/4c.png"/></a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				   </div>
					 </div>
					 
					 <div class="row-fluid ep-tabs-content" id="chemical-treatment-tab1">
 <div class="section">
	
				 <h3 class="hair-type">My Current Chemical Treatments are...</h3>
				   <div class="question-images panel">
				    <ul class="d-hair-treatment">
					<!-- Don't remove class from a -->
					<li class="process-stli hide" id="d-r-straight">
					   <a class="d-h-process <?php if($answers){ if($answers['8']=='r_straight') echo 'active';}?>" href="javascript:void();" title="r_straight"><img alt="Relaxed Straight" src="<?php bloginfo('template_url'); ?>/assets/img/register/relaxed-straight.png" width="200px" />
					  <label>Straighteners </label></a>
					  </li>
					 <li class="process-crli hide" id="d-p-curly">
					   <a  class="d-h-process <?php if($answers){ if($answers['8']=='p_curly') echo 'active';}?>" href="javascript:void();" title="p_curly"><img alt="Permed Curly" src="<?php bloginfo('template_url'); ?>/assets/img/register/purmed-curly.png" width="200px" />
					  <label>Texturizer</label></a>
					  </li>
					  <li class="process-crli" style="margin-right: 0">
					    <a class="<?php if($answers){ if($answers['8']=='Color') echo 'active';}?>" href="javascript:void();" title="yes"><img alt="Color" src="<?php bloginfo('template_url'); ?>/assets/img/register/hair_color.png" width="200px" />
					  <label>Hair Color</label></a>
					  </li><br />
					  <li id="pn-li" class="last-child" style="margin-right: 0">					   
					  <a class="d-h-process <?php if($answers){ if($answers['8']=='none') echo 'active';}?>" href="javascript:void();" title="none">I don't have any chemical treatments.</a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
	</div>
					 </div>
					 
					 
					 
					 
					 <div class="row-fluid ep-tabs-content" id="hair-conditions-tab1">
                    <div class="section">
				 <h3 class="hair-type ">My Hair Conditions Are...</h3>
				   <div class="question-images panel">
				    <ul class="d-hair-conditions">
					
					
					  <li >
					   <a class="<?php if($answers){ if(in_array('o_scalp',explode(',',$answers['7']))) echo 'active';}?>" href="javascript:void();" title="o_scalp"><img alt="Oily Scalp" src="<?php bloginfo('template_url'); ?>/assets/img/register/oily-scalp.png"/><label>Oily</label></a>
					   
					  </li>
					  <li class="notall">
					   <a class="<?php if($answers){ if(in_array('p_bald',explode(',',$answers['7']))) echo 'active';}?>" href="javascript:void();" title="p_bald"><img alt="Pattern Baldness" src="<?php bloginfo('template_url'); ?>/assets/img/register/pattern-baldness.png"/><label>Pattern Baldness</label></a>
					   
					  </li>
					 <li class="notall">
					   <a class="<?php if($answers){ if(in_array('alopecia',explode(',',$answers['7']))) echo 'active';}?>" href="javascript:void();" title="alopecia"><img alt="Alopecia" src="<?php bloginfo('template_url'); ?>/assets/img/register/alpecia.png"/><label>Alopecia</label></a>
					   
					  </li>
					 <li class="notall">
					   <a class="<?php if($answers){ if(in_array('g_hair',explode(',',$answers['7']))) echo 'active';}?>"  href="javascript:void();" title="g_hair"><img alt="Grey Hair" src="<?php bloginfo('template_url'); ?>/assets/img/register/gray-hair.png"/><label>Grey Hair</label></a>
					   
					  </li>
					  <li class="notall">
					   <a class="<?php if($answers){ if(in_array('sp_ends',explode(',',$answers['7']))) echo 'active';}?>" href="javascript:void();" title="sp_ends"><img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/assets/img/register/split-ends.png"/><label>Split Breakage</label></a>
					   
					  </li>
					  					  <li style="margin-right: 0">
					   <a class="<?php if($answers){ if(in_array('dry_scalp',explode(',',$answers['7']))) echo 'active';}?>" href="javascript:void();" title="dry_scalp"><img alt="Dry Itchy" src="<?php bloginfo('template_url'); ?>/assets/img/register/dry-scalp.png"/><label>Dry Itchy</label></a>
					   
					  </li><br />
					  <li class="last-child notall" style="margin-right: 0">
					  <a class="<?php if($answers){ if(in_array('normal',explode(',',$answers['7']))) echo 'active';}?>" href="javascript:void();" title="normal">I don't have any hair conditions</a>
					  </li>
					  <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	
</div>
					 </div>		
					<div class="row-fluid ep-tabs-content" id="hair-description-tab1">
<div class="section">
				 <h3  class="hair-type">The Following Best Describes My Hair As...</h3>
				   <div class="question-images panel">
				     <ul class="d-hair-des">
					  <li>
					  <a class="<?php if($answers){ if(in_array('coarse',explode(',',$answers['6']))) echo 'active';}?>" href="javascript:void();" title="coarse">Coarse</a>
					  </li>
					   <li >
					  <a class="<?php if($answers){ if(in_array('soft',explode(',',$answers['6']))) echo 'active';}?>" href="javascript:void();" title="soft">Soft</a>
					  </li>
					   <li >
					  <a class="<?php if($answers){ if(in_array('fine',explode(',',$answers['6']))) echo 'active';}?>" href="javascript:void();" title="fine">Fine</a>
					  </li>
					   <li >
					  <a class="<?php if($answers){ if(in_array('thin',explode(',',$answers['6']))) echo 'active';}?>" href="javascript:void();" title="thin">Thin</a>
					  </li>
					 <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				   
</div>
					 </div>					 
				
				<div class="row-fluid ep-tabs-content" id="hair-wear-tab1">
<div class="section">
				 <h3  class="hair-type">I Currently Wear...</h3>
				   <div class="question-images panel">
				     <ul class="d-hair-wear">
					 <li>
					  <a class="<?php if($my_hair_wear){ if($my_hair_wear=='extensions') echo 'active';}?>" href="javascript:void();" title="extensions">Hair extensions</a>
					  </li>
					   <li >
					  <a class="<?php if($my_hair_wear){ if($my_hair_wear=='wigs') echo 'active';}?>" href="javascript:void();" title="wigs">Wigs</a>
					  </li>
					   <li >
					  <a class="<?php if($my_hair_wear){ if($my_hair_wear=='no') echo 'active';}?>" href="javascript:void();" title="no">No speciality hair styles</a>
					  </li>					  
					 <div class="clearfix"></div>
					</ul>
					<div class="clear"></div>
				   </div>	 
				   
</div>
					 </div>					 
				
				
				
				 <input id="d-hair-style-value" type="hidden" name="cat" value="<?php echo $answers['3'];?>"/>
				   <input id="d-hair-length-value" type="hidden" name="hairLenth" value="<?php echo $answers['5'];?>"/>
				   <input id="d-hair-texture-value" type="hidden" name="hairTex" value="<?php echo $answers['4'];?>"/>
				   <input id="d-hair-treatment-value" type="hidden" name="hairProc" value="<?php echo $answers['8'];?>"/>
				   <input id="d-hair-color-value" type="hidden" name="haircolor" value="<?php echo get_user_meta( $user_id, 'color_hair', $_POST['haircolor']);;?>"/>
				   <input id="d-hair-condition-value" type="hidden" name="hairCond" value="<?php echo $answers['7'];?>"/>
				   <input id="d-hair-des-value" type="hidden" name="hairDes" value="<?php echo $answers['6'];?>"/>
				    <input id="d-hair-wear-value" type="hidden" name="hairWear" value="<?php echo $my_hair_wear;?>"/>
				    <input id="d-hair-demograph-value" type="hidden" name="demogrph" value="<?php echo $answers['2'];?>"/>
				
				
					<input type="submit" value="Save Changes" class="button"/>
					<input type="hidden" name="is_hair_style" value="1"/>
					 <input type="hidden" name="user_id" value="<?php echo $user->ID;?>"/>
					  <input type="hidden" name="is_profile" value="0"/>
					</form>      
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

	 </script>

	 
	  <script>
  
$('.d-hair-style a').click(function(){

var cat=$(this).attr("title");

if(cat==189)
{
$('#d-r-straight').addClass('hide');
$('#d-p-curly').removeClass('hide');
}

  
  if(cat==188)
{
$('#d-p-curly').addClass('hide');
$('#d-r-straight').removeClass('hide');


}

if(cat!=188 && cat!=189)
{
$('#d-r-straight').removeClass('hide');
$('#d-p-curly').removeClass('hide');
}

  
   $('#d-hair-style-value').val(cat);
  //setFieldValuesDesktop('d-hair-style-value',cat,830,'#69CCB7');
  
  $('.d-hair-style a').removeClass('active');
    $(this).addClass("active");
 
});




$('.d-hair-length a').click(function(){
var title=$(this).attr("title");
  //setFieldValuesDesktop('d-hair-length-value',title,1660,'#A289C0');
   $('#d-hair-length-value').val(title);
    $('.d-hair-length a').removeClass('active');
  $(this).addClass("active");
});

$('.d-hair-texture a').click(function(){
var title=$(this).attr("title");
  //setFieldValuesDesktop('d-hair-texture-value',title,2490,'#88D5EF');
  $('#d-hair-texture-value').val(title);
    $('.d-hair-texture a').removeClass('active');
  $(this).addClass("active");
 });





$('.d-hair-conditions a').click(function(){
	var title=$(this).attr("title");
	var aclass=$(this).attr("class");
	if(aclass=='active')
	{
	var new_conds= new Array();
	var conditions=$('#d-hair-condition-value').val();
	var conditions_a=conditions.split(',');
	var j=0;
    for (i = 0; i < conditions_a.length; i++) {
       if (conditions_a[i] !== title) {
           new_conds[j] = conditions_a[i];
		    j++;
         }
		 
		
      }
	     new_conds.join(',');  
    $('#d-hair-condition-value').val(new_conds);
	$(this).removeClass('active');
	  

	}else
	{
	
	var conditions=$('#d-hair-condition-value').val();
	if(conditions=="" || title=="normal" || conditions=="normal" )
	{
	$('.d-hair-conditions a').removeClass("active");
	$(this).addClass('active');
	 conditions=title;
	 }
	 else
	 {
	  conditions=conditions+','+title;
	  $(this).addClass('active');
	  }
	  
	$('#d-hair-condition-value').val(conditions);
	}
	
	
	
});

$('.d-hair-treatment a').click(function(){
var title=$(this).attr("title");
 if(title==='yes')
 {
  var color=$('#d-hair-color-value').val();
   if(color==='yes')
    {
     $('#d-hair-color-value').val('no');
	 $(this).removeClass("active");
     }
	 else
	 {
	 $('#d-hair-color-value').val('yes');
	  $(this).addClass("active");
	 }
  
  
  
  }
  else
  {
  $('.d-h-process').removeClass("active");
  $('#d-hair-treatment-value').val(title);
   $(this).addClass("active");
  }
  

  
});


$('.d-hair-des a').click(function(){
	var title=$(this).attr("title");
	var aclass=$(this).attr("class");
	if(aclass=='active')
	{
	var new_conds= new Array();
	var conditions=$('#d-hair-des-value').val();
	var conditions_a=conditions.split(',');
	var j=0;
    for (i = 0; i < conditions_a.length; i++) {
       if (conditions_a[i] !== title) {
           new_conds[j] = conditions_a[i];
		    j++;
         }
		 
		
      }
	     new_conds.join(',');  
    $('#d-hair-des-value').val(new_conds);
	$(this).removeClass('active');
	  

	}else
	{
	$(this).addClass('active');
	var conditions=$('#d-hair-des-value').val();
	if(conditions=="")
	 conditions=title;
	 else
	  conditions=conditions+','+title;
	  
	$('#d-hair-des-value').val(conditions);
	}
	
	
	
});

$('.d-hair-wear a').click(function(){
var title=$(this).attr("title");
  $('#d-hair-wear-value').val(title);
  $('.d-hair-wear a').removeClass('active');
   $(this).addClass("active");
 
}); 

$('.d-hair-demograph a').click(function(){
var title=$(this).attr("title");
 // setFieldValuesDesktop('d-hair-color-value',title,5820,'#FDD4CE');
  $('#d-hair-demograph-value').val(title);
  $('.d-hair-demograph a').removeClass('active');
   $(this).addClass("active");
 
}); 
 /* 
function fromValidation()
			{return false;
				}*/
				
				
	 function fromValidation()
			{
				var style = document.forms["hair_style"]["cat"].value;
				var length = document.forms["hair_style"]["hairLenth"].value;
				var texture = document.forms["hair_style"]["hairTex"].value;
				var treatment = document.forms["hair_style"]["hairProc"].value;				
				var color = document.forms["hair_style"]["haircolor"].value;				
				var condition = document.forms["hair_style"]["hairCond"].value;
				var des = document.forms["hair_style"]["hairDes"].value;
				var demogrph = document.forms["hair_style"]["demogrph"].value;
				var hairWear = document.forms["hair_style"]["hairWear"].value;
				
				if ((style == "") || (length == "") || (texture == "") || (treatment == "") || (condition == "") || (des == "") || (hairWear == "")) {
					alert("All fields must be filled out");
					return false;
				}else{
					//alert("All fields are filled");
					return true;
				}
			}
  </script>
	
<?php get_footer(); ?>