<?php
/*
Template Name: My Hair Profile
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

?>

<?php get_header(); ?>
	
 <link href="<?php bloginfo('template_url'); ?>/brand-admin/css/custom.css" rel="stylesheet" />	
		<div id="main" class="wrap post-template">
			<div class="container">
				<?php
				 $answers=getUserAnswers($user->ID);
				 ?>
				<div class="row-fluid" style="padding-top:0">	
					<div class="span12 post-page customer-profile customer-hair-profile">		
		       <div class="profile-title">
			   <?php  $thumbpath=getThumbPath($userid); ?>
			   	<a class="big-circle desktop-display <?php echo getUserHairStyle($userid);?>" href="<?php bloginfo('url');?>/profile/?id=<?php echo $userid;?>">
				<div class="inner-round"><img alt="profile picture" class="user-thumb" src="<?php echo $thumbpath;?>" width="100">
				</div>
				</a>
				<h3 class="my-account-title"> <span>My Hair Profile</span></h3>
			
				</div>
				
			<div class="panel entry-content" id="tab31">
				<div class="row-fluid match-products" id="panel-content">	
					<form name="hair_style" action="<?php bloginfo('url'); ?>/saveuserprofile.php" method="post">
				<div class="section">
					 <h3>Current Hair Style?</h3>
					   <div class="question-images panel">
				    <ul>
					  <li>
					   <img alt="Weave" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/weave.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="249" <?php if($answers){ if($answers['3']=='249') echo 'checked="checked"';}?>> Weave </label>
					  </li>
					  <li>
					   <img alt="Relaxed Straight Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/relaxed_straight_Hairstyle.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="188" <?php if($answers){ if($answers['3']=='188') echo 'checked="checked"';}?>> Relaxed Straight </label>
					  </li>
					  <li>
					   <img alt="Braids" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/braids.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="250" <?php if($answers){ if($answers['3']=='250') echo 'checked="checked"';}?>> Braids </label>
					  </li>
					  <li>
					   <img alt="Wigs" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/wigs.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="187" <?php if($answers){ if($answers['3']=='187') echo 'checked="checked"';}?>> Wigs </label>
					  </li>
					  <li>
					   <img alt="Dreds" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Dreadlocks.png"/>
					  <label class="hc_style"><input type="radio" name="cat" value="179" <?php if($answers){ if($answers['3']=='179') echo 'checked="checked"';}?>> Dreds </label>
					  </li>
					
					  <li>
					   <img alt="Naturally Curly Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Naturally_Curly.jpg"/>
					  <label class="hc_style"><input type="radio" name="cat" value="189" <?php if($answers){ if($answers['3']=='189') echo 'checked="checked"';}?>> Naturally Curly </label>
					  </li>
					  <li>
					   <img alt="Naturally Straight Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_style/Naturally_Straight.JPG"/>
					  <label class="hc_style"><input type="radio" name="cat" value="180" <?php if($answers){ if($answers['3']=='180') echo 'checked="checked"';}?>> Naturally Straight </label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	
					</div>
					<div class="section">
				 <h3 class="hair-type">Current hair Length?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li>
					   <img alt="Very_Short" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Short.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="v_short" <?php if($answers){ if($answers['5']=='v_short') echo 'checked="checked"';}?>> Very Short </label>
					  </li>
					  <li>
					   <img alt="Short" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Short.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="short" <?php if($answers){ if($answers['5']=='short') echo 'checked="checked"';}?>> Short </label>
					  </li>
					  <li>
					   <img alt="Medium" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Medium.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="medium" <?php if($answers){ if($answers['5']=='medium') echo 'checked="checked"';}?>> Medium </label>
					  </li>
					  <li>
					   <img alt="Long" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Long.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="long" <?php if($answers){ if($answers['5']=='long') echo 'checked="checked"';}?>> Long</label>
					  </li>
					   <li>
					   <img alt="Very_Long" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_length/Very_Long.png"/>
					  <label class="hc_length"><input type="radio" name="hairLenth" value="v_long" <?php if($answers){ if($answers['5']=='v_long') echo 'checked="checked"';}?>>Very Long</label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	 
				   </div>
			<div class="section">
				 <h3 class="hair-type">Current Hair Texture?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li>
					   <img alt="1a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/1a.jpg"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="1a" <?php if($answers){ if($answers['4']=='1a') echo 'checked="checked"';}?>> 1a <span style="left:50px" class="tool-tip">Hair Type 1a is naturally straight hair and the straightest out of all Hair Types. Since there is no discernible wave, the hair lays flat.

</span></label>
					  </li>
					  <li>
					  <img alt="2a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2a.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="2a" <?php if($answers){ if($answers['4']=='2a') echo 'checked="checked"';}?>> 2a <span style="left:-100px" class="tool-tip">Type 2a is gently, slightly "s" waved hair that stays closer to the head. It does not bounce, even when it is layered. 2a hair is  fine, thin and very easy to manage. It is also generally easily to straighten or curl. </span></label>
					  </li>
					  <li>
						<img alt="2b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2b.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="2b" <?php if($answers){ if($answers['4']=='2b') echo 'checked="checked"';}?>> 2b <span style="left:-180px" class="tool-tip">The wave or curl forms throughout the hair in the shape of the letter "s". Type 2b hair stays close to the head and does not bounce up, even when it is layered. </span></label>
					  </li>
					  <li>
					   <img alt="2c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/2c.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="2c" <?php if($answers){ if($answers['4']=='2c') echo 'checked="checked"';}?>> 2c<span style="left:-300px" class="tool-tip">Type 2c is thicker, coarser wavy hair that is composed of a few more actual curls, as opposed to just waves. Type 2c hair tends to be more resistant to styling and will frizz easily. </span></label>
					  </li>
					  <li>
					   <img alt="3a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3a.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="3a" <?php if($answers){ if($answers['4']=='3a') echo 'checked="checked"';}?>> 3a <span style="left:-410px" class="tool-tip"> Type 3a curls show a definite large loopy "S" pattern. Curls are well-defined and springy. Curls are naturally big, loose and often very shiny.

</span></label>
					  </li>
					  <li>
					   <img alt="3b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3b.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="3b" <?php if($answers){ if($answers['4']=='3b') echo 'checked="checked"';}?>> 3b <span style="left:50px" class="tool-tip">People with Type 3b hair have well-defined, springy, copious curls that range from bouncy ringlets to tight corkscrews. 3b curls' circumference are Sharpie size. 

</span></label>
					  </li>
					  <li>
					   <img alt="3c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/3c.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="3c" <?php if($answers){ if($answers['4']=='3c') echo 'checked="checked"';}?>> 3c <span style="left:-100px" class="tool-tip">3c hair has voluminous, tight curls in corkscrews, approximately the circumference of a pencil or straw. The curls can be either kinky, or very tightly curled, with lots and lots of strands densely packed together.</span></label>
					  </li>
					  <li>
					   <img alt="4a" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4a.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="4a" <?php if($answers){ if($answers['4']=='4a') echo 'checked="checked"';}?>> 4a <span style="left:-180px" class="tool-tip">4a is tightly coiled hair that has an "S" pattern. It has more moisture than 4b; it has a definite curl pattern. The circumference of the spirals is close to that of a crochet needle. The hair can be wiry or fine-textured. </span></label>
					  </li>
					  <li>
					   <img alt="4b" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4b.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="4b" <?php if($answers){ if($answers['4']=='4b') echo 'checked="checked"';}?>> 4b <span style="left:-300px" class="tool-tip">Type 4b has a "Z" pattern, less of a defined curl pattern. Instead of curling or coiling, the hair bends in sharp angles like the letter "Z". Type 4 hair has a cotton-like feel.</span></label>
					  </li>
					  <li>
					   <img alt="4c" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_texture/4c.png"/>
					  <label class="hc_texture"><input type="radio" name="hairTex" value="4c" <?php if($answers){ if($answers['4']=='4c') echo 'checked="checked"';}?>> 4c <span style="left:-410px" class="tool-tip"> Type 4c hair is composed of curl patterns that will almost never clump without doing a specific hair style. It can range from fine/thin/super soft to wiry/coarse with lots of densely packed strands. 4c hair has been described as a more "challenging" version of 4b hair.</span></label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	 
				   </div>
				   <div class="section">
	
				 <h3 class="hair-type">Current Hair processes?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li>
					   <img alt="Colored Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/colored_hair.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="c_hair" <?php if($answers){ if($answers['8']=='c_hair') echo 'checked="checked"';}?>> Colored Hair </label>
					  </li>
					  <li>
					   <img alt="Relaxed Straight" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/relaxed_straight.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="r_straight" <?php if($answers){ if($answers['8']=='r_straight') echo 'checked="checked"';}?>> Relaxed Straight </label>
					  </li>
					  <li>
					   <img alt="Permed Curly" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_process/Permed_Curly.jpg"/>
					  <label class="hc_process"><input type="radio" name="hairProc" value="p_curly" <?php if($answers){ if($answers['8']=='p_curly') echo 'checked="checked"';}?>> Permed Curly </label>
					  </li>
					  <li>
					   
					  <label class="hc_process"><input type="radio" name="hairProc" value="none" <?php if($answers){ if($answers['8']=='none') echo 'checked="checked"';}?>> None</label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	 
	</div>
	<div class="section">
				 <h3 class="hair-type ">Current Hair Conditions?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li>
					   <img alt="Oily Scalp" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Oily_Scalp.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="o_scalp" <?php if($answers){ if($answers['7']=='o_scalp') echo 'checked="checked"';}?>> Oily Scalp </label>
					  </li>
					  <li>
					   <img alt="Pattern Baldness" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/pattern_baldness.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="p_bald" <?php if($answers){ if($answers['7']=='p_bald') echo 'checked="checked"';}?>> Pattern Baldness </label>
					  </li>
					  <li>
					   <img alt="Alopecia" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/alopecia.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="alopecia" <?php if($answers){ if($answers['7']=='alopecia') echo 'checked="checked"';}?>> Alopecia </label>
					  </li>
					  <li>
					   <img alt="Grey Hair" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Grey_Hair.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="g_hair" <?php if($answers){ if($answers['7']=='g_hair') echo 'checked="checked"';}?>> Grey Hair </label>
					  </li>
					  <li>
					   <img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/Split_Ends.jpg"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="sp_ends" <?php if($answers){ if($answers['7']=='sp_ends') echo 'checked="checked"';}?>> Split Ends </label>
					  </li>
					   <li>
					   <img alt="Split Ends" src="<?php bloginfo('template_url'); ?>/brand-admin/images/hair_condition/how-to-get-rid-of-dry-itchy-scalp.jpg" width="120"/>
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="sp_ends" <?php if($f_post){ if($f_post['hairCond']=='d_slap') echo 'checked="checked"';}?>> Dry Itchy Scalp </label>
					  </li>
					  <li>
					   
					  <label class="hc_conditions"><input type="radio" name="hairCond" value="normal" <?php if($answers){ if($answers['7']=='normal') echo 'checked="checked"';}?>> Normal</label>
					  </li>
					</ul>
					<div class="clear"></div>
				   </div>	
</div>
<div class="section">
       
				 <h3>Current Hair Description?</h3>
				   <div class="question-images panel">
				    <ul>
					  <li >
					  
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="coarse" <?php if($f_post){ if($f_post['hairDes']=='Coarse') echo 'checked="checked"';}?>> Coarse</label>
					  </li>
					   <li >
					  
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="soft" <?php if($f_post){ if($f_post['hairDes']=='soft') echo 'checked="checked"';}?>> Soft</label>
					  </li>
					   <li >
					   
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="fine" <?php if($f_post){ if($f_post['hairDes']=='fine') echo 'checked="checked"';}?>> Fine</label>
					  </li>
					   <li >
					 
					  <label class="hc_descriptions"><input type="checkbox" name="hairDes[]" value="thin" <?php if($f_post){ if($f_post['hairDes']=='thin') echo 'checked="checked"';}?>> Thin</label>
					  </li>
					 
					</ul>
					<div class="clear"></div>
				   </div>	 
				   
</div>
					
					<input type="submit" value="Save Changes" class="button"/>
					<input type="hidden" name="is_hair_style" value="1"/>
					 <input type="hidden" name="user_id" value="<?php echo $user->ID;?>"/>
					  <input type="hidden" name="is_profile" value="0"/>
					</form>
					
					</div>
			</div>


					
					</div>
		
                     
                    </div>
				</div>
			</div>

     
<?php get_footer(); ?>