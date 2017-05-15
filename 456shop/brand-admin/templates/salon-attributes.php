<?php

$current_user = wp_get_current_user();
$salon_id = $current_user->ID;
	   $message="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	
	if(isset($_POST['save_salon'])){

		if(updateSalonAttributes($_POST))
		 	   $message="Attributes Saved Successfully";
	}
}


$salon=getSalonInfo($salon_id);
//var_dump($salon);
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
$(function() {
$( "#accordion" ).accordion();
});

</script>
<div id="main" class="wrap salon-profile">

             <div class="row-fluid salon-profile-registration" style="padding-top:0">
			   
				
				<div class="setting-form">
				<h3> ATTRIBUTES</h3>
				<p style="color: green;font-size: 18px;text-align: cente"> <?php echo $message;?></p>
				  <form action="#" method="post">
		 
<!-- // Heading END -->
<div class="innerLR entry-product">
	<!-- Widget -->
	<div class="widget widget-tabs">
	

		<!-- // Widget heading END -->
		
		<div class="widget-body">
			<div class="tab-content">
			
			
				
				
				<!-- Attributes -->
				<div class="tab-pane active" id="productAttributesTab">
				
	<div class="row-fluid">
	<div class="span6">
		<div class="span3">
			<strong> Intended Gender</strong>
		</div>
		<div class="span9">
			<label><input type="radio" value="male" name="gender"  <?php if($salon->ans[1]=="male") echo 'checked="checked"';?> /> Male </label>
			<label><input type="radio" value="female" name="gender"  <?php if($salon->ans[1]=="female") echo 'checked="checked"';?> />  Female</label>
			<label><input type="radio" value="both" name="gender" <?php if($salon->ans[1]=="both") echo 'checked="checked"';?> />  Both</label>
		</div>
		</div>
		<div class="span6">
		<div class="span4">
			<strong> Targeted Age Range</strong>
			<label><input type="checkbox"  id="selectall7" name="all7" value="sf"> Select All</label>
		</div>
		<?php 
		if($salon)
		{
		$answers=array();
       $answers=explode(',',$salon->ans[12]);
	  
	   }
		?>
		<div class="span7">
			<label><input type="checkbox"  class="selectedId7" name="ageRange[]" value="18" <?php if($salon && in_array('18',$answers)) echo 'checked="checked"';?>> Under 18</label>
			<label><input type="checkbox"  class="selectedId7" name="ageRange[]" value="19_25" <?php if($salon && in_array('19_25',$answers)) echo 'checked="checked"';?>> 19 - 25</label>
			<label><input type="checkbox"  class="selectedId7" name="ageRange[]" value="26_45" <?php if($salon && in_array('26_45',$answers)) echo 'checked="checked"';?>> 26 - 45</label>
			<label><input type="checkbox"  class="selectedId7" name="ageRange[]" value="46" <?php if($salon && in_array('46',$answers)) echo 'checked="checked"';?>> 46 and Older</label>
		</div>
		</div>
	</div>	
	
	
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
		if($salon)
		{
		$answers=array();
       $answers=explode(',',$salon->ans[5]);

	   }
		?>
			
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			   <div class="s-icon"><img alt="Very Short" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Short.png"/></div>
			  <p><input type="checkbox" class="selectedId1"   value="v_short" name="hairLenth[]" <?php if($salon && in_array('v_short',$answers)) echo 'checked="checked"';?>/><span> Very Short</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Short" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Short.png"/></div>
			  <p><input type="checkbox" class="selectedId1" value="short" name="hairLenth[]" <?php if($salon && in_array('short',$answers)) echo 'checked="checked"';?>/> <span>Short</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Medium" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Medium.png"/></div>
			  <p><input type="checkbox" class="selectedId1"  value="medium" name="hairLenth[]" <?php if($salon && in_array('medium',$answers)) echo 'checked="checked"';?>/> <span>Medium</span> </p>			 
			  </div>
			  <div class="span3">
			   <div class="s-icon"><img alt="Long" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Long.png"/></div>
			  <p><input type="checkbox" class="selectedId1"   value="long" name="hairLenth[]" <?php if($salon && in_array('long',$answers)) echo 'checked="checked"';?>/><span> Long</span> </p>			 
			  </div>
			  <div class="span3">
			   <div class="s-icon"><img alt="Very Long" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Long.png"/></div>
			  <p><input type="checkbox" class="selectedId1"   value="v_long" name="hairLenth[]" <?php if($salon && in_array('v_long',$answers)) echo 'checked="checked"';?>/><span> Very Long</span> </p>			 
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
		if($salon)
		{
		$answers=array();
       $answers=explode(',',$salon->ans[4]);
	  
	   }
		?>
			<!-- Column -->
			<div class="span10 h-texture">

			  <div class="span3">
			   <div class="s-icon"><img alt="1a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/1a.jpg"/></div>
              <p><input type="checkbox" class="selectedId2"   value="1a" name="hairTex[]" <?php if($salon && in_array('1a',$answers)) echo 'checked="checked"';?>/> <span>1a</span> <span style="left:50px" class="tool-tip">Hair Type 1a is naturally straight hair and the straightest out of all Hair Types. Since there is no discernible wave, the hair lays flat.</span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="2a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2a.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="2a" name="hairTex[]" <?php if($salon && in_array('2a',$answers)) echo 'checked="checked"';?>/><span> 2a </span><span style="left:-100px" class="tool-tip">Type 2a is gently, slightly "s" waved hair that stays closer to the head. It does not bounce, even when it is layered. 2a hair is  fine, thin and very easy to manage. It is also generally easily to straighten or curl. </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="2b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2b.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="2b" name="hairTex[]" <?php if($salon && in_array('2b',$answers)) echo 'checked="checked"';?>/> <span>2b</span><span style="left:-180px" class="tool-tip">The wave or curl forms throughout the hair in the shape of the letter "s". Type 2b hair stays close to the head and does not bounce up, even when it is layered. </span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="2c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2c.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="2c" name="hairTex[]" <?php if($salon && in_array('2c',$answers)) echo 'checked="checked"';?>/> <span>2c </span><span style="left:-300px" class="tool-tip">Type 2c is thicker, coarser wavy hair that is composed of a few more actual curls, as opposed to just waves. Type 2c hair tends to be more resistant to styling and will frizz easily. </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="3a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3a.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="3a" name="hairTex[]" <?php if($salon && in_array('3a',$answers)) echo 'checked="checked"';?>/> <span>3a </span><span style="left:-410px" class="tool-tip"> Type 3a curls show a definite large loopy "S" pattern. Curls are well-defined and springy. Curls are naturally big, loose and often very shiny.</span></p>			 
			  </div> 
			  <div class="span3 last">
			   <div class="s-icon"><img alt="3b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3b.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="3b" name="hairTex[]" <?php if($salon && in_array('3b',$answers)) echo 'checked="checked"';?>/><span> 3b</span><span style="left:-520px" class="tool-tip">People with Type 3b hair have well-defined, springy, copious curls that range from bouncy ringlets to tight corkscrews. 3b curls' circumference are Sharpie size. </span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="3c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3c.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="3c" name="hairTex[]" <?php if($salon && in_array('3c',$answers)) echo 'checked="checked"';?>/><span> 3c </span><span style="left:50px" class="tool-tip">3c hair has voluminous, tight curls in corkscrews, approximately the circumference of a pencil or straw. The curls can be either kinky, or very tightly curled, with lots and lots of strands densely packed together.</span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="4a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4a.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="4a" name="hairTex[]" <?php if($salon && in_array('4a',$answers)) echo 'checked="checked"';?>/><span> 4a </span><span style="left:-100px" class="tool-tip">4a is tightly coiled hair that has an "S" pattern. It has more moisture than 4b; it has a definite curl pattern. The circumference of the spirals is close to that of a crochet needle. The hair can be wiry or fine-textured. </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="4b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4b.png"/></div>
              <p><input type="checkbox" class="selectedId2"   value="4b" name="hairTex[]" <?php if($salon && in_array('4b',$answers)) echo 'checked="checked"';?>/> <span>4b </span><span style="left:-180px" class="tool-tip">Type 4b has a "Z" pattern, less of a defined curl pattern. Instead of curling or coiling, the hair bends in sharp angles like the letter "Z". Type 4 hair has a cotton-like feel.</span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="4c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4c.png"/></div>
              <p><input type="checkbox" class="selectedId2"    value="4c" name="hairTex[]" <?php if($salon && in_array('4c',$answers)) echo 'checked="checked"';?>/><span> 4c </span><span style="left:-300px" class="tool-tip"> Type 4c hair is composed of curl patterns that will almost never clump without doing a specific hair style. It can range from fine/thin/super soft to wiry/coarse with lots of densely packed strands. 4c hair has been described as a more "challenging" version of 4b hair.</span></p>			 
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
		if($salon)
		{
		$answers=array();
       $answers=explode(',',$salon->ans[8]);
	  
	   }
		?>
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			   <div class="s-icon"><img alt="Colored Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/colored_hair.jpg"/></div>
              <p><input type="checkbox" class="selectedId4"   value="c_hair" name="hairProc[]" <?php if($salon && in_array('c_hair',$answers)) echo 'checked="checked"';?>/> <span>Colored Hair</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Relaxed Straight" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/relaxed_straight.jpg"/></div>
              <p><input type="checkbox" class="selectedId4"   value="r_straight" name="hairProc[]" <?php if($salon && in_array('r_straight',$answers)) echo 'checked="checked"';?>/><span> Relaxed Straight</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Permed Curly" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/Permed_Curly.jpg"/></div>
              <p><input type="checkbox" class="selectedId4"   value="p_curly" name="hairProc[]" <?php if($salon && in_array('p_curly',$answers)) echo 'checked="checked"';?>/> <span>Permed Curly </span></p>	 
			  </div> 
			  <div class="span3 no-photo">
			  
              <p><input type="checkbox" class="selectedId4"   value="none" name="hairProc[]" <?php if($salon && in_array('none',$answers)) echo 'checked="checked"';?>/><span> None</span> </p>	 
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
		if($salon)
		{
		$answers=array();
       $answers=explode(',',$salon->ans[7]);
	  
	   }
		?>
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			   <div class="s-icon"><img alt="Oily Scalp" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Oily_Scalp.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"   value="o_scalp" name="hairCond[]" <?php if($salon && in_array('o_scalp',$answers)) echo 'checked="checked"';?>/> <span>Oily Scalp</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Pattern Baldness" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/pattern_baldness.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"     value="p_bald" name="hairCond[]" <?php if($salon && in_array('p_bald',$answers)) echo 'checked="checked"';?>/> <span>Pattern Baldness </span></p>	 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Alopecia" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/alopecia.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"   value="alopecia" name="hairCond[]" <?php if($salon && in_array('alopecia',$answers)) echo 'checked="checked"';?>/> <span>Alopecia </span></p>
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Grey Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Grey_Hair.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"   value="g_hair" name="hairCond[]" <?php if($salon && in_array('g_hair',$answers)) echo 'checked="checked"';?>/> <span>Grey Hair </span></p>
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Split_Ends.jpg"/></div>
              <p><input type="checkbox" class="selectedId5"   value="sp_ends" name="hairCond[]" <?php if($salon && in_array('sp_ends',$answers)) echo 'checked="checked"';?>/> <span>Split Ends/Breakage</span> </p>
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/how-to-get-rid-of-dry-itchy-scalp.jpg" width="120"/></div>
              <p><input type="checkbox" class="selectedId5"   value="sp_ends" name="hairCond[]" <?php if($salon && in_array('sp_ends',$answers)) echo 'checked="checked"';?>/> <span>Dry Itchy Scalp</span> </p>
			  </div> 
			  <div class="span3 last no-photo">
			
              <p><input type="checkbox" class="selectedId5"   value="normal" name="hairCond[]" <?php if($salon && in_array('normal',$answers)) echo 'checked="checked"';?>/> <span>Normal </span></p>
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
		     if($salon)
		      {
		        $answers=array();
                $answers=explode(',',$salon->ans[9]);
	  
	            }
	     	?>
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			   <div class="s-icon"><img alt="Weave" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/weave.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="weave" name="intStyl[]" <?php if($salon && in_array('weave',$answers)) echo 'checked="checked"';?>/> <span>Weave </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Relaxed Straight Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/relaxed_straight_Hairstyle.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="r_s_hair" name="intStyl[]" <?php if($salon && in_array('r_s_hair',$answers)) echo 'checked="checked"';?>/> <span>Relaxed Straight Hair </span></p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Braids" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/braids.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="braids" name="intStyl[]" <?php if($salon && in_array('braids',$answers)) echo 'checked="checked"';?>/><span> Braids</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Wigs" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/wigs.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="wigs" name="intStyl[]" <?php if($salon && in_array('wigs',$answers)) echo 'checked="checked"';?>/> <span>Wigs</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Dreds" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Dreadlocks.png"/></div>
              <p><input type="checkbox" class="selectedId6"   value="dreds" name="intStyl[]" <?php if($salon && in_array('dreds',$answers)) echo 'checked="checked"';?>/> <span>Dreds</span> </p>			 
			  </div> 
			  <div class="span3 last">
			   <div class="s-icon"><img alt="Permed/Texturized Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/texturized_permed_curly.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="p_t_hair" name="intStyl[]" <?php if($salon && in_array('p_t_hair',$answers)) echo 'checked="checked"';?>/> <span>Permed/Texturized Hair</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Naturally Curly Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Naturally_Curly.jpg"/></div>
              <p><input type="checkbox" class="selectedId6"   value="n_c_hair" name="intStyl[]" <?php if($salon && in_array('n_c_hair',$answers)) echo 'checked="checked"';?>/> <span>Naturally Curly Hair</span> </p>			 
			  </div> 
			  <div class="span3">
			   <div class="s-icon"><img alt="Naturally Straight Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Naturally_Straight.JPG"/></div>
              <p><input type="checkbox" class="selectedId6"   value="nt_st_hair" name="intStyl[]" <?php if($salon && in_array('nt_st_hair',$answers)) echo 'checked="checked"';?>/><span> Naturally Straight Hair</span> </p>			 
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
		     if($salon)
		      {
		        $answers=array();
                $answers=explode(',',$salon->ans[6]);
	  
	            }
	     	?>
			<!-- Column -->
			<div class="span10">

			  <div class="span3">
			  
              <p><input type="checkbox" class="selectedId3"   value="coarse" name="hairDes[]" <?php if($salon && in_array('coarse',$answers)) echo 'checked="checked"';?>/> <span>Coarse</span> </p>			 
			  </div> 
			  <div class="span3">
			   
              <p><input type="checkbox" class="selectedId3"   value="soft" name="hairDes[]" <?php if($salon && in_array('soft',$answers)) echo 'checked="checked"';?>/> <span>Soft</span> </p>			 
			  </div> 
			  <div class="span3">
			 
              <p><input type="checkbox" class="selectedId3"   value="fine" name="hairDes[]" <?php if($salon && in_array('fine',$answers)) echo 'checked="checked"';?>/> <span>Fine </span></p>			 
			  </div> 
			  <div class="span3">
			 
              <p><input type="checkbox" class="selectedId3"   value="thin" name="hairDes[]" <?php if($salon && in_array('thin',$answers)) echo 'checked="checked"';?>/> <span>Thin </span></p>			 
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
					
							 <input type="text" name="no_products" value="<?php if($salon) echo $salon->quantity_products;?>"/>
							<!-- 
							<select name="no_products" >
							<option value="1000" <?php if($salon)if($salon->quantity_products==1000) echo 'selected="selected"';?>>1000</option>
							<option value="2500" <?php if($salon)if($salon->quantity_products==2500) echo 'selected="selected"';?>>2500</option>
							<option value="5000" <?php if($salon)if($salon->quantity_products==5000) echo 'selected="selected"';?>>5000</option>
							</select>
							-->
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
							<label for="textDescription">  Price per Product (Don't Include $)</label>
							<input type="text" name="price" value="<?php if($salon) echo $salon->price;?>" placeholder="Don't Include $"/> 
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
							<input style="width:90%" type="text" name="product_tags" value="<?php if($salon) echo $salon->product_tags;?>"/> 
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
	$salon_id=$salon?$salon->ID:0;
	
	?>
	
<input type="hidden" name="salon_id" value="<?php echo $salon->id;?>"/>
<input type="hidden" name="user_id"	value="<?php echo $current_user->ID;?>"/>
</div>	
<input type="hidden" name="is_submit" value="1"/>
<div>
						<input type="submit" name="save_salon" value="Save" class="button"/>
					 </div>
				  
				  </form>
				
				
				
				
				</div>
			 
			 
			 </div>
			 </div>