<?php

	// Retrieve options
	$options = get_option('wpstickies-options');
	$options = empty($options) ? array() : $options;
	$options = is_array($options) ? $options : unserialize($options);

	$GLOBALS['wpstickies_options'] = $options;

	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "wpstickies";

	// Get pending stickies
	$GLOBALS['pending_stickies'] = $wpdb->get_results( "SELECT * FROM $table_name
										WHERE flag_hidden = '1' AND flag_deleted = '0'
										ORDER BY date_c DESC LIMIT 100" );

	// Get latest stickies
	$GLOBALS['latest_stickies'] = $wpdb->get_results( "SELECT * FROM $table_name
									WHERE flag_hidden = '0' AND flag_deleted = '0'
									ORDER BY date_c DESC LIMIT 50" );

	// Get latest stickies
	$GLOBALS['removed_stickies'] = $wpdb->get_results( "SELECT * FROM $table_name
									WHERE flag_deleted = '1'
									ORDER BY date_c DESC LIMIT 50" );

	function convert_quotes($str) {
		return str_replace('"', '&quot;', $str);
	}

?>


<div id="wpstickies-metaboxes-general" class="wrap">
<?php screen_icon('options-general'); ?>
<h2>wpStickies Admin Page</h2>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']?>" id="wpstickies-options-table">
	<input type="hidden" name="posted" value="1">
	<?php wp_nonce_field('wpstickies-metaboxes-general'); ?>
	<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
	<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>

	<div class="metabox-holder">
		<?php do_meta_boxes($GLOBALS['options_page'], 'normal', array()); ?>
	</div>

	<?php function wpstickies_metabox_general() { ?>
	<?php $options = $GLOBALS['wpstickies_options']; ?>
	<table class="form-table wpstickies_general_table">
	    <tr valign="top">
	    	<th scope="row"><strong>Selector:</strong></th>
	    	<td>
	    		<?php $options['selector'] = empty($options['selector']) ? 'img[class*=&quot;wp-image&quot;], .wpstickies' : convert_quotes(stripslashes($options['selector'])); ?>
	    		<input type="text" name="selector" class="selector" value="<?php echo $options['selector'] ?>"><br>
	    		You can control here on which elements you want to apply wpStickies.
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>Custom capability:</strong></th>
	    	<td>
	    		<?php $options['capability'] = empty($options['capability']) ? 'manage_options' : $options['capability']; ?>
	    		<input type="text" name="capability" value="<?php echo $options['capability'] ?>"><br>
	    		You can set a custom capability to provide access certain users to wpStickies admin area.<br>
	    		You can view the predefined capabilities <a href="http://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table" target="_blank">here</a>.<br>
	    		The default capability for administrators is "manage_options".<br><br>

	    		<input type="checkbox" name="allow_settings_change" <?php echo isset($options['allow_settings_change']) ? 'checked="checked"' : '' ?>> Allow non-administrator users to change plugin settings
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>imageMinWidth:</strong></th>
	    	<td>
	    		<?php $options['image_min_width'] = empty($options['image_min_width']) ? '150' : $options['image_min_width']; ?>
	    		<input type="text" name="image_min_width" value="<?php echo $options['image_min_width'] ?>"><br>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>imageMinHeight:</strong></th>
	    	<td>
	    		<?php $options['image_min_height'] = empty($options['image_min_height']) ? '100' : $options['image_min_height']; ?>
	    		<input type="text" name="image_min_height" value="<?php echo $options['image_min_height'] ?>"><br>
	    		wpStickies won't be applied on images which has less size what you specify here in pixels. <br>
	    		With this option you can prevent wpStickies applying on small and unwanted images.
	 		</td>
	 	</tr>
	</table>
	<?php } ?>

	<?php function wpstickies_metabox_permissions() { ?>
	<?php $options = $GLOBALS['wpstickies_options']; ?>
	<table class="form-table">
	    <tr valign="top">
	    	<th scope="row"><strong>Users who can create new stickies:</strong></th>
	    	<td>
	    		<div id="wpstickies_create_custom_roles">
		    		<?php $options['create_roles'] = empty($options['create_roles']) ? 'administrator' : $options['create_roles']; ?>
		    		<?php $options['create_custom_roles'] = empty($options['create_custom_roles']) ? '' : $options['create_custom_roles']; ?>
		 			<label><input type="radio" name="create_roles" value="administrator" <?php echo ($options['create_roles'] == 'administrator') ? 'checked="checked"' : '' ?>> Only administrators</label><br>
		 			<label><input type="radio" name="create_roles" value="wpstickiesadmins" <?php echo ($options['create_roles'] == 'wpstickiesadmins') ? 'checked="checked"' : '' ?>> wpStickies admins</label> <a href="#" title="Our plugin already created a new user role for you to gather all your wpStickies admins under a single group. This is a low-level role with exactly the same permissions as Subscribers except the group members can create or modify stickies. You can change your users roles under the 'Users' tab on the sidebar.">[ ? ]</a><br>
		 			<label><input type="radio" name="create_roles" value="subscribers" <?php echo ($options['create_roles'] == 'subscribers') ? 'checked="checked"' : '' ?>> Subscribers</label><br>
		 			<label><input type="radio" name="create_roles" value="everyone" <?php echo ($options['create_roles'] == 'everyone') ? 'checked="checked"' : '' ?>> Everyone</label><br>

		 			<label><input type="radio" name="create_roles" value="custom" <?php echo ($options['create_roles'] == 'custom') ? 'checked="checked"' : '' ?>> Custom</label>
		 			<input type="text" name="create_custom_roles" class="custom" value="<?php echo $options['create_custom_roles'] ?>" class="roles"><br><br>

		 			<label><input type="checkbox" name="create_auto_accept" value="1" <?php echo isset($options['create_auto_accept']) ? 'checked="checked"' : '' ?>> Auto-accept pending stickies</label>
		 		</div>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>Pending stickes displayed as:</strong></th>
	    	<td>
	    		<?php $options['display_pending_stickies'] = empty($options['display_pending_stickies']) ? 'invisible' : $options['display_pending_stickies']; ?>
	 			<label><input type="radio" name="display_pending_stickies" value="visible" <?php echo ($options['display_pending_stickies'] == 'visible') ? 'checked="checked"' : '' ?>> Visible<br></label>
	 			<label><input type="radio" name="display_pending_stickies" value="invisible" <?php echo ($options['display_pending_stickies'] == 'invisible') ? 'checked="checked"' : '' ?>> Invisible<br></label>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>Users who can modify their own stickies:</strong></th>
	    	<td>
	    		<div id="wpstickies_modify_custom_roles">
		    		<?php $options['modify_roles'] = empty($options['modify_roles']) ? 'administrator' : $options['modify_roles']; ?>
		    		<?php $options['modify_custom_roles'] = empty($options['modify_custom_roles']) ? '' : $options['modify_custom_roles']; ?>
		    		<label><input type="radio" name="modify_roles" value="administrator" <?php echo ($options['modify_roles'] == 'administrator') ? 'checked="checked"' : '' ?>> Only administrators</label><br>
		 			<label><input type="radio" name="modify_roles" value="wpstickiesadmins" <?php echo ($options['modify_roles'] == 'wpstickiesadmins') ? 'checked="checked"' : '' ?>> wpStickies admins</label> <a href="#" title="Our plugin already created a new user role for you to gather all your wpStickies admins under a single group. This is a low-level role with exactly the same permissions as Subscribers except the group members can create or modify stickies. You can change your users roles under the 'Users' tab on the sidebar.">[ ? ]</a><br>
		 			<label><input type="radio" name="modify_roles" value="subscribers" <?php echo ($options['modify_roles'] == 'subscribers') ? 'checked="checked"' : '' ?>> Subscribers</label><br>

		 			<label><input type="radio" name="modify_roles" value="custom" <?php echo ($options['modify_roles'] == 'custom') ? 'checked="checked"' : '' ?>> Custom</label>
		 			<input type="text" name="modify_custom_roles" class="custom" value="<?php echo $options['modify_custom_roles'] ?>" class="roles"><br><br>
		 		</div>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>After a modification ...</strong></th>
	    	<td>
	    		<?php $options['requirereconfirmation'] = empty($options['requirereconfirmation']) ? 'yes' : $options['requirereconfirmation']; ?>
	 			<label><input type="radio" name="requirereconfirmation" value="yes" <?php echo ($options['requirereconfirmation'] == 'yes') ? 'checked="checked"' : '' ?>> ... add sticky to the pending list for re-confirmation<br></label>
	 			<label><input type="radio" name="requirereconfirmation" value="no" <?php echo ($options['requirereconfirmation'] == 'no') ? 'checked="checked"' : '' ?>> ... treat as confirmed sticky if it was previously accepted<br></label>
	 			<label><input type="radio" name="requirereconfirmation" value="auto_accept" <?php echo ($options['requirereconfirmation'] == 'auto_accept') ? 'checked="checked"' : '' ?>> ... always ignore pendig list, accept them automatically.<br></label>
	 		</td>
	 	</tr>
	</table>
	<?php } ?>

	<?php function wpstickies_metabox_appearance() { ?>
	<?php $options = $GLOBALS['wpstickies_options']; ?>
	<table class="form-table">
	    <tr valign="top">
	    	<td colspan="2">
	    		<table class="wpstickies_appearance_table">
	    			<thead>
	    				<tr>
	    					<th class="type"></th>
	    					<th class="direction">direction</th>
	    					<th class="easing">easing</th>
	    					<th class="duration">duration</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr>
	    					<td class="type">Mouse enter animation:</td>
	    					<td class="direction">
	    						<?php $options['directionin'] = empty($options['directionin']) ? 'bottom' : $options['directionin']; ?>
	    						<select name="directionin">
	    						    <option <?php echo ($options['directionin'] == 'fade') ? 'selected="selected"' : ''?>>fade</option>
	    						    <option <?php echo ($options['directionin'] == 'top') ? 'selected="selected"' : ''?>>top</option>
	    						    <option <?php echo ($options['directionin'] == 'bottom') ? 'selected="selected"' : ''?>>bottom</option>
	    						    <option <?php echo ($options['directionin'] == 'left') ? 'selected="selected"' : ''?>>left</option>
	    						    <option <?php echo ($options['directionin'] == 'right') ? 'selected="selected"' : ''?>>right</option>
	    						</select>
	    					</td>
	    					<td class="easing">
	    						<?php $options['easingin'] = empty($options['easingin']) ? 'easeOutQuart' : $options['easingin']; ?>
	    						<select name="easingin">
	    						    <option <?php echo ($options['easingin'] == 'linear') ? 'selected="selected"' : ''?>>linear</option>
	    						    <option <?php echo ($options['easingin'] == 'swing') ? 'selected="selected"' : ''?>>swing</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInQuad') ? 'selected="selected"' : ''?>>easeInQuad</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutQuad') ? 'selected="selected"' : ''?>>easeOutQuad</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutQuad') ? 'selected="selected"' : ''?>>easeInOutQuad</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInCubic') ? 'selected="selected"' : ''?>>easeInCubic</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutCubic') ? 'selected="selected"' : ''?>>easeOutCubic</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutCubic') ? 'selected="selected"' : ''?>>easeInOutCubic</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInQuart') ? 'selected="selected"' : ''?>>easeInQuart</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutQuart') ? 'selected="selected"' : ''?>>easeOutQuart</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutQuart') ? 'selected="selected"' : ''?>>easeInOutQuart</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInQuint') ? 'selected="selected"' : ''?>>easeInQuint</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutQuint') ? 'selected="selected"' : ''?>>easeOutQuint</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutQuint') ? 'selected="selected"' : ''?>>easeInOutQuint</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInSine') ? 'selected="selected"' : ''?>>easeInSine</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutSine') ? 'selected="selected"' : ''?>>easeOutSine</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutSine') ? 'selected="selected"' : ''?>>easeInOutSine</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInExpo') ? 'selected="selected"' : ''?>>easeInExpo</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutExpo') ? 'selected="selected"' : ''?>>easeOutExpo</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutExpo') ? 'selected="selected"' : ''?>>easeInOutExpo</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInCirc') ? 'selected="selected"' : ''?>>easeInCirc</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutCirc') ? 'selected="selected"' : ''?>>easeOutCirc</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutCirc') ? 'selected="selected"' : ''?>>easeInOutCirc</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInElastic') ? 'selected="selected"' : ''?>>easeInElastic</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutElastic') ? 'selected="selected"' : ''?>>easeOutElastic</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutElastic') ? 'selected="selected"' : ''?>>easeInOutElastic</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInBack') ? 'selected="selected"' : ''?>>easeInBack</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutBack') ? 'selected="selected"' : ''?>>easeOutBack</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutBack') ? 'selected="selected"' : ''?>>easeInOutBack</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInBounce') ? 'selected="selected"' : ''?>>easeInBounce</option>
	    						    <option <?php echo ($options['easingin'] == 'easeOutBounce') ? 'selected="selected"' : ''?>>easeOutBounce</option>
	    						    <option <?php echo ($options['easingin'] == 'easeInOutBounce') ? 'selected="selected"' : ''?>>easeInOutBounce</option>
	    						</select>
	    					</td>
	    					<td class="duration">
	    						<?php $options['durationin'] = empty($options['durationin']) ? '500' : $options['durationin']; ?>
	    						<input type="text" name="durationin" value="<?php echo $options['durationin'] ?>"> ms
	    					</td>
	    				</tr>
	    				<tr>
	    					<td class="type">Mouse out animation:</td>
	    					<td class="direction">
	    						<?php $options['directionout'] = empty($options['directionout']) ? 'fade' : $options['directionout']; ?>
	    						<select name="directionout">
		    					    <option <?php echo ($options['directionout'] == 'fade') ? 'selected="selected"' : ''?>>fade</option>
	    						    <option <?php echo ($options['directionout'] == 'top') ? 'selected="selected"' : ''?>>top</option>
	    						    <option <?php echo ($options['directionout'] == 'bottom') ? 'selected="selected"' : ''?>>bottom</option>
	    						    <option <?php echo ($options['directionout'] == 'left') ? 'selected="selected"' : ''?>>left</option>
	    						    <option <?php echo ($options['directionout'] == 'right') ? 'selected="selected"' : ''?>>right</option>
	    						</select>
	    					</td>
	    					<td class="easing">
	    						<?php $options['easingout'] = empty($options['easingout']) ? 'easeInBack' : $options['easingout']; ?>
	    						<select name="easingout">
	    						    <option <?php echo ($options['easingout'] == 'linear') ? 'selected="selected"' : ''?>>linear</option>
	    						    <option <?php echo ($options['easingout'] == 'swing') ? 'selected="selected"' : ''?>>swing</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInQuad') ? 'selected="selected"' : ''?>>easeInQuad</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutQuad') ? 'selected="selected"' : ''?>>easeOutQuad</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutQuad') ? 'selected="selected"' : ''?>>easeInOutQuad</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInCubic') ? 'selected="selected"' : ''?>>easeInCubic</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutCubic') ? 'selected="selected"' : ''?>>easeOutCubic</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutCubic') ? 'selected="selected"' : ''?>>easeInOutCubic</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInQuart') ? 'selected="selected"' : ''?>>easeInQuart</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutQuart') ? 'selected="selected"' : ''?>>easeOutQuart</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutQuart') ? 'selected="selected"' : ''?>>easeInOutQuart</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInQuint') ? 'selected="selected"' : ''?>>easeInQuint</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutQuint') ? 'selected="selected"' : ''?>>easeOutQuint</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutQuint') ? 'selected="selected"' : ''?>>easeInOutQuint</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInSine') ? 'selected="selected"' : ''?>>easeInSine</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutSine') ? 'selected="selected"' : ''?>>easeOutSine</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutSine') ? 'selected="selected"' : ''?>>easeInOutSine</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInExpo') ? 'selected="selected"' : ''?>>easeInExpo</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutExpo') ? 'selected="selected"' : ''?>>easeOutExpo</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutExpo') ? 'selected="selected"' : ''?>>easeInOutExpo</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInCirc') ? 'selected="selected"' : ''?>>easeInCirc</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutCirc') ? 'selected="selected"' : ''?>>easeOutCirc</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutCirc') ? 'selected="selected"' : ''?>>easeInOutCirc</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInElastic') ? 'selected="selected"' : ''?>>easeInElastic</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutElastic') ? 'selected="selected"' : ''?>>easeOutElastic</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutElastic') ? 'selected="selected"' : ''?>>easeInOutElastic</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInBack') ? 'selected="selected"' : ''?>>easeInBack</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutBack') ? 'selected="selected"' : ''?>>easeOutBack</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutBack') ? 'selected="selected"' : ''?>>easeInOutBack</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInBounce') ? 'selected="selected"' : ''?>>easeInBounce</option>
	    						    <option <?php echo ($options['easingout'] == 'easeOutBounce') ? 'selected="selected"' : ''?>>easeOutBounce</option>
	    						    <option <?php echo ($options['easingout'] == 'easeInOutBounce') ? 'selected="selected"' : ''?>>easeInOutBounce</option>
	    						</select>
	    					</td>
	    					<td class="duration">
	    						<?php $options['durationout'] = empty($options['durationout']) ? '250' : $options['durationout']; ?>
	    						<input type="text" name="durationout" value="<?php echo $options['durationout'] ?>"> ms
	    					</td>
	    				</tr>
	    				<tr>
	    					<td class="type">Bubble animation:</td>
	    					<td class="direction"></td>
	    					<td class="easing">
	    						<?php $options['spot_bubble_easing'] = empty($options['spot_bubble_easing']) ? 'easeOutBack' : $options['spot_bubble_easing']; ?>
	    						<select name="easingout">
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'linear') ? 'selected="selected"' : ''?>>linear</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'swing') ? 'selected="selected"' : ''?>>swing</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInQuad') ? 'selected="selected"' : ''?>>easeInQuad</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutQuad') ? 'selected="selected"' : ''?>>easeOutQuad</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutQuad') ? 'selected="selected"' : ''?>>easeInOutQuad</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInCubic') ? 'selected="selected"' : ''?>>easeInCubic</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutCubic') ? 'selected="selected"' : ''?>>easeOutCubic</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutCubic') ? 'selected="selected"' : ''?>>easeInOutCubic</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInQuart') ? 'selected="selected"' : ''?>>easeInQuart</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutQuart') ? 'selected="selected"' : ''?>>easeOutQuart</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutQuart') ? 'selected="selected"' : ''?>>easeInOutQuart</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInQuint') ? 'selected="selected"' : ''?>>easeInQuint</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutQuint') ? 'selected="selected"' : ''?>>easeOutQuint</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutQuint') ? 'selected="selected"' : ''?>>easeInOutQuint</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInSine') ? 'selected="selected"' : ''?>>easeInSine</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutSine') ? 'selected="selected"' : ''?>>easeOutSine</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutSine') ? 'selected="selected"' : ''?>>easeInOutSine</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInExpo') ? 'selected="selected"' : ''?>>easeInExpo</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutExpo') ? 'selected="selected"' : ''?>>easeOutExpo</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutExpo') ? 'selected="selected"' : ''?>>easeInOutExpo</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInCirc') ? 'selected="selected"' : ''?>>easeInCirc</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutCirc') ? 'selected="selected"' : ''?>>easeOutCirc</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutCirc') ? 'selected="selected"' : ''?>>easeInOutCirc</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInElastic') ? 'selected="selected"' : ''?>>easeInElastic</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutElastic') ? 'selected="selected"' : ''?>>easeOutElastic</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutElastic') ? 'selected="selected"' : ''?>>easeInOutElastic</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInBack') ? 'selected="selected"' : ''?>>easeInBack</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutBack') ? 'selected="selected"' : ''?>>easeOutBack</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutBack') ? 'selected="selected"' : ''?>>easeInOutBack</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInBounce') ? 'selected="selected"' : ''?>>easeInBounce</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeOutBounce') ? 'selected="selected"' : ''?>>easeOutBounce</option>
	    						    <option <?php echo ($options['spot_bubble_easing'] == 'easeInOutBounce') ? 'selected="selected"' : ''?>>easeInOutBounce</option>
	    						</select>
	    					</td>
	    					<td class="duration">
	    						<?php $options['spot_bubble_duration'] = empty($options['spot_bubble_duration']) ? '200' : $options['spot_bubble_duration']; ?>
	    						<input type="text" name="spot_bubble_duration" value="<?php echo $options['spot_bubble_duration'] ?>"> ms
	    					</td>
	    				</tr>
	    			</tbody>
	    		</table>
	 		</td>
	 	</tr>

	    <tr valign="top">
	    	<th scope="row"><strong>Delay:</strong></th>
	    	<td>
	    		<?php $options['delay'] = empty($options['delay']) ? '30' : $options['delay']; ?>
	 			<input type="text" name="delay" class="wpstickies_delay" value="<?php echo $options['delay'] ?>"> ms
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>Show messages:</strong></th>
	    	<td>
	    		<?php $options['show_messages'] = empty($options['show_messages']) ? 'true' : $options['show_messages']; ?>
		    	<label><input type="radio" name="show_messages" value="true" <?php echo ($options['show_messages'] == 'true') ? 'checked="checked"' : '' ?>> enabled</label>
		    	<label><input type="radio" name="show_messages" value="false" <?php echo ($options['show_messages'] == 'false') ? 'checked="checked"' : '' ?>> disabled</label>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>alwaysVisible:</strong></th>
	    	<td>
	    		<?php $options['always_visible'] = empty($options['always_visible']) ? 'true' : $options['always_visible']; ?>
		    	<label><input type="radio" name="always_visible" value="true" <?php echo ($options['always_visible'] == 'true') ? 'checked="checked"' : '' ?>> enabled</label>
		    	<label><input type="radio" name="always_visible" value="false" <?php echo ($options['always_visible'] == 'false') ? 'checked="checked"' : '' ?>> disabled</label>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>spotBubbleDirection:</strong></th>
	    	<td>
	    		<?php $options['spot_bubble_direction'] = empty($options['spot_bubble_direction']) ? 'top' : $options['spot_bubble_direction']; ?>
		    	<select name="spot_bubble_direction">
		    		<option <?php echo ($options['spot_bubble_direction'] == 'top') ? 'selected="selected"' : ''?>>top</option>
		    		<option <?php echo ($options['spot_bubble_direction'] == 'right') ? 'selected="selected"' : ''?>>right</option>
		    		<option <?php echo ($options['spot_bubble_direction'] == 'bottom') ? 'selected="selected"' : ''?>>bottom</option>
		    		<option <?php echo ($options['spot_bubble_direction'] == 'left') ? 'selected="selected"' : ''?>>left</option>
		    	</select>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>autoChangeDirections:</strong></th>
	    	<td>
	    		<?php $options['auto_change_direction'] = empty($options['auto_change_direction']) ? 'true' : $options['auto_change_direction']; ?>
		    	<label><input type="radio" name="auto_change_direction" value="true" <?php echo ($options['show_messages'] == 'true') ? 'checked="checked"' : '' ?>> enabled</label>
		    	<label><input type="radio" name="auto_change_direction" value="false" <?php echo ($options['show_messages'] == 'false') ? 'checked="checked"' : '' ?>> disabled</label>
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>spotBubbleDistance:</strong></th>
	    	<td>
	    		<?php $options['spot_bubble_distance'] = empty($options['spot_bubble_distance']) ? '2' : $options['spot_bubble_distance']; ?>
	 			<input type="text" name="spot_bubble_distance" class="wpstickies_delay" value="<?php echo $options['spot_bubble_distance'] ?>">
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>areaMinWidth:</strong></th>
	    	<td>
	    		<?php $options['area_min_width'] = empty($options['area_min_width']) ? '25' : $options['area_min_width']; ?>
	 			<input type="text" name="area_min_width" class="wpstickies_delay" value="<?php echo $options['area_min_width'] ?>">
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>areaMinHeight:</strong></th>
	    	<td>
	    		<?php $options['area_min_height'] = empty($options['area_min_height']) ? '25' : $options['area_min_height']; ?>
	 			<input type="text" name="area_min_height" class="wpstickies_delay" value="<?php echo $options['area_min_height'] ?>">
	 		</td>
	 	</tr>
	    <tr valign="top">
	    	<th scope="row"><strong>spotButtonsPosition:</strong></th>
	    	<td>
	    		<?php $options['spot_buttons_position'] = empty($options['spot_buttons_position']) ? 'left' : $options['spot_buttons_position']; ?>
		    	<select name="spot_bubble_spot_buttons_positiondirection">
		    		<option <?php echo ($options['spot_buttons_position'] == 'top') ? 'selected="selected"' : ''?>>top</option>
		    		<option <?php echo ($options['spot_buttons_position'] == 'right') ? 'selected="selected"' : ''?>>right</option>
		    		<option <?php echo ($options['spot_buttons_position'] == 'bottom') ? 'selected="selected"' : ''?>>bottom</option>
		    		<option <?php echo ($options['spot_buttons_position'] == 'left') ? 'selected="selected"' : ''?>>left</option>
		    	</select>
	 		</td>
	 	</tr>
	</table>
	<?php } ?>


	<?php function wpstickies_metabox_language_settings() { ?>
	<?php $options = $GLOBALS['wpstickies_options']; ?>
	<table class="form-table wpstickies_lang_table">
	    <tr valign="top">
	    	<?php $options['lang_area_caption'] = empty($options['lang_area_caption']) ? 'add a name or caption' : convert_quotes(stripslashes($options['lang_area_caption'])); ?>
	    	<th scope="row"><strong>areaCaption:</strong></th>
	    	<td>
	    		<input type="text" name="lang_area_caption" value="<?php echo $options['lang_area_caption'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_spot_title'] = empty($options['lang_spot_title']) ? 'Sample Title' : convert_quotes(stripslashes($options['lang_spot_title'])); ?>
	    	<th scope="row"><strong>spotTitle:</strong></th>
	    	<td>
	    		<input type="text" name="lang_spot_title" value="<?php echo $options['lang_spot_title'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['land_spot_content'] = empty($options['land_spot_content']) ? 'You can write here text and you can also use HTML code. For example you can simply include an image or a link.' : convert_quotes(stripslashes($options['land_spot_content'])); ?>
	    	<th scope="row"><strong>spotContent:</strong></th>
	    	<td>
	    		<input type="text" name="land_spot_content" value="<?php echo $options['land_spot_content'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_btn_google'] = empty($options['lang_btn_google']) ? 'Google' : convert_quotes(stripslashes($options['lang_btn_google'])); ?>
	    	<th scope="row"><strong>btnGoogle:</strong></th>
	    	<td>
	    		<input type="text" name="lang_btn_google" value="<?php echo $options['lang_btn_google'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_btn_youtube'] = empty($options['lang_btn_youtube']) ? 'YouTube' : convert_quotes(stripslashes($options['lang_btn_youtube'])); ?>
	    	<th scope="row"><strong>btnYouTube:</strong></th>
	    	<td>
	    		<input type="text" name="lang_btn_youtube" value="<?php echo $options['lang_btn_youtube'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_btn_vimeo'] = empty($options['lang_btn_vimeo']) ? 'Vimeo' : convert_quotes(stripslashes($options['lang_btn_vimeo'])); ?>
	    	<th scope="row"><strong>btnVimeo:</strong></th>
	    	<td>
	    		<input type="text" name="lang_btn_vimeo" value="<?php echo $options['lang_btn_vimeo'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_btn_wikipedia'] = empty($options['lang_btn_wikipedia']) ? 'Wikipedia' : convert_quotes(stripslashes($options['lang_btn_wikipedia'])); ?>
	    	<th scope="row"><strong>btnWikipedia:</strong></th>
	    	<td>
	    		<input type="text" name="lang_btn_wikipedia" value="<?php echo $options['lang_btn_wikipedia'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_btn_facebook'] = empty($options['lang_btn_facebook']) ? 'Facebook' : convert_quotes(stripslashes($options['lang_btn_facebook'])); ?>
	    	<th scope="row"><strong>btnFacebook:</strong></th>
	    	<td>
	    		<input type="text" name="lang_btn_facebook" value="<?php echo $options['lang_btn_facebook'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_over'] = empty($options['lang_msg_over']) ? 'wpStickies: Click on the image to create a new spot or draw an area to tag faces.' : convert_quotes(stripslashes($options['lang_msg_over'])); ?>
	    	<th scope="row"><strong>msgOver:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_over" value="<?php echo $options['lang_msg_over'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_drag_spot'] = empty($options['lang_msg_drag_spot']) ? 'wpStickies: You can drag this sticky anywhere over the image by taking and moving the spot.' : convert_quotes(stripslashes($options['lang_msg_drag_spot'])); ?>
	    	<th scope="row"><strong>msgDragSpot:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_drag_spot" value="<?php echo $options['lang_msg_drag_spot'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_drag_area'] = empty($options['lang_msg_drag_area']) ? 'wpStickies: You can drag this sticky anywhere over the image by taking and moving the area.' : convert_quotes(stripslashes($options['lang_msg_drag_area'])); ?>
	    	<th scope="row"><strong>msgDragArea:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_drag_area" value="<?php echo $options['lang_msg_drag_area'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_btn_save'] = empty($options['lang_msg_btn_save']) ? 'wpStickies: SAVE CHANGES' : convert_quotes(stripslashes($options['lang_msg_btn_save'])); ?>
	    	<th scope="row"><strong>msgBtnSave:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_btn_save" value="<?php echo $options['lang_msg_btn_save'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_btn_remove'] = empty($options['lang_msg_btn_remove']) ? 'wpStickies: REMOVE THIS STICKY' : convert_quotes(stripslashes($options['lang_msg_btn_remove'])); ?>
	    	<th scope="row"><strong>msgBtnRemove:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_btn_remove" value="<?php echo $options['lang_msg_btn_remove'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_btn_reposition'] = empty($options['lang_msg_btn_reposition']) ? 'wpStickies: CHANGE THE DIRECTION OF THE BUBBLE' : convert_quotes(stripslashes($options['lang_msg_btn_reposition'])); ?>
	    	<th scope="row"><strong>msgBtnReposition:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_btn_reposition" value="<?php echo $options['lang_msg_btn_reposition'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_btn_color'] = empty($options['lang_msg_btn_color']) ? 'wpStickies: CHANGE THE COLOR OF THE BUBBLE' : convert_quotes(stripslashes($options['lang_msg_btn_color'])); ?>
	    	<th scope="row"><strong>msgBtnColor:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_btn_color" value="<?php echo $options['lang_msg_btn_color'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_btn_size'] = empty($options['lang_msg_btn_size']) ? 'wpStickies: CHANGE THE WIDTH OF THE BUBBLE' : convert_quotes(stripslashes($options['lang_msg_btn_size'])); ?>
	    	<th scope="row"><strong>msgBtnSize:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_btn_size" value="<?php echo $options['lang_msg_btn_size'] ?>">
	    	</td>
	    </tr>

	    <tr valign="top">
	    	<?php $options['lang_msg_save'] = empty($options['lang_msg_save']) ? 'wpStickies: STICKY SAVED' : convert_quotes(stripslashes($options['lang_msg_save'])); ?>
	    	<th scope="row"><strong>msgSave:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_save" value="<?php echo $options['lang_msg_save'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_remove'] = empty($options['lang_msg_remove']) ? 'wpStickies: STICKY REMOVED' : convert_quotes(stripslashes($options['lang_msg_remove'])); ?>
	    	<th scope="row"><strong>msgRemove:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_remove" value="<?php echo $options['lang_msg_remove'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_msg_disabled'] = empty($options['lang_msg_disabled']) ? 'Disable wpStickies on this image	' : convert_quotes(stripslashes($options['lang_msg_disabled'])); ?>
	    	<th scope="row"><strong>msgDisabled:</strong></th>
	    	<td>
	    		<input type="text" name="lang_msg_disabled" value="<?php echo $options['lang_msg_disabled'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_conf_remove'] = empty($options['lang_conf_remove']) ? 'wpStickies: You clicked to remove this sticky. If you confirm, it will be permanently removed from the database. Are you sure?' : convert_quotes(stripslashes($options['lang_conf_remove'])); ?>
	    	<th scope="row"><strong>confRemove:</strong></th>
	    	<td>
	    		<input type="text" name="lang_conf_remove" value="<?php echo $options['lang_conf_remove'] ?>">
	    	</td>
	    </tr>

	    <tr valign="top">
	    	<?php $options['lang_err_remove'] = empty($options['lang_err_remove']) ? 'wpStickies: The following error occurred during remove: You don\'t have permission to remove this sticky!' : convert_quotes(stripslashes($options['lang_err_remove'])); ?>
	    	<th scope="row"><strong>errRemove:</strong></th>
	    	<td>
	    		<input type="text" name="lang_err_remove" value="<?php echo $options['lang_err_remove'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_err_create'] = empty($options['lang_err_create']) ? 'wpStickies: The following error occurred during save: You don\'t have permission to create new stickies!' : convert_quotes(stripslashes($options['lang_err_create'])); ?>
	    	<th scope="row"><strong>errCreate:</strong></th>
	    	<td>
	    		<input type="text" name="lang_err_create" value="<?php echo $options['lang_err_create'] ?>">
	    	</td>
	    </tr>
	    <tr valign="top">
	    	<?php $options['lang_err_modify'] = empty($options['lang_err_modify']) ? 'wpStickies: The following error occurred during save: You don\'t have permission to modify this sticky!' : convert_quotes(stripslashes($options['lang_err_modify'])); ?>
	    	<th scope="row"><strong>errModify:</strong></th>
	    	<td>
	    		<input type="text" name="lang_err_modify" value="<?php echo $options['lang_err_modify'] ?>">
	    	</td>
	    </tr>
	</table>
	<?php } ?>

	<input type="hidden" name="posted" value="1">
	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</form>

<?php function wpstickies_metabox_peding() { ?>
<p>Pending stickies won't show up on your front-end page until an administrator accept them.</p>
<table class="wpstickies-pending-table">
	<?php if(!empty($GLOBALS['pending_stickies'])) : ?>
    <tr>
    	<th class="image">Preview</th>
    	<th class="title">Title / Caption</th>
    	<th class="content">Content</th>
    	<th class="user">User</th>
    	<th class="created">Created</th>
    	<th class="actions" colspan="2">Actions</th>
    </tr>
    <?php endif; ?>

 	<?php foreach($GLOBALS['pending_stickies'] as $item) : ?>
 	<?php $data = json_decode(stripslashes($item->data), true); ?>
    <tr>
    	<td class="image">
    		<a href="/wpstickies_preview/<?php echo base64_encode($item->image)?>">
    			<img src="<?php echo $item->image ?>">
    		</a>
    	</td>
    	<td class="title">
    		<?php if($data['sticky']['type'] == 'area') { ?>
    		<?php echo stripslashes($data['area']['caption']) ?>
    		<?php } else { ?>
    		<?php echo stripslashes($data['spot']['title']) ?>
    		<?php } ?>
    	</td>
    	<td class="content">
    		<?php if($data['sticky']['type'] == 'area') { ?>
    		No content
    		<?php } else { ?>
    		<?php echo stripslashes($data['spot']['content']) ?>
    		<?php } ?>
    	</td>
    	<td class="user">
    		<?php if(empty($item->user_id)) { ?>
    		Unregistered
    		<?php } else { ?>
    		<?php echo $item->user_name?>
    		<?php } ?>
    	</td>
    	<td class="created">
    		<?php echo date(get_option('date_format'), $item->date_c) ?><br>
    		<?php echo date(get_option('time_format'), $item->date_c) ?>
    	</td>
    	<td class="action wpstickies-actions"><a href="#" class="accept" rel="wpstickies_accept,<?php echo $item->id?>" title="Accept"></a></td>
    	<td class="action wpstickies-actions"><a href="#" class="reject" rel="wpstickies_reject,<?php echo $item->id?>" title="Reject"></a></td>
    </tr>
	<?php endforeach; ?>

	<?php if(empty($GLOBALS['pending_stickies'])) : ?>
	<tr>
		<td colspan="6">There are no pending stickies.</td>
	</tr>
	<?php endif; ?>
</table>
<?php } ?>

<?php function wpstickies_metabox_latest() { ?>
<table class="wpstickies-latest-table">
	<?php if(!empty($GLOBALS['latest_stickies'])) : ?>
    <tr>
    	<th class="image">Preview</th>
    	<th class="title">Title / Caption</th>
    	<th class="content">Content</th>
    	<th class="user">User</th>
    	<th class="modified">Modified</th>
    	<th class="actions">Actions</th>
    </tr>
    <?php endif; ?>

    <?php foreach($GLOBALS['latest_stickies'] as $item) : ?>
    <?php $data = json_decode(stripslashes($item->data), true); ?>
    <tr>
    	<td class="image">
    		<a href="/wpstickies_preview/<?php echo base64_encode($item->image)?>">
    			<img src="<?php echo $item->image ?>">
    		</a>
    	</td>
    	<td class="title">
	    	<?php if($data['sticky']['type'] == 'area') { ?>
    		<?php echo stripslashes($data['area']['caption']) ?>
    		<?php } else { ?>
    		<?php echo stripslashes($data['spot']['title']) ?>
    		<?php } ?>
    	</td>
    	<td class="content">
	    	<?php if($data['sticky']['type'] == 'area') { ?>
    		No content
    		<?php } else { ?>
    		<?php echo stripslashes($data['spot']['content']) ?>
    		<?php } ?>
    	</td>
    	<td class="user"><?php echo $item->user_name ?></td>
    	<td class="modified">
	    	<?php echo date(get_option('date_format'), $item->date_c) ?><br>
    		<?php echo date(get_option('time_format'), $item->date_c) ?>
    	</td>
    	<td class="action wpstickies-actions"><a href="#" class="remove" rel="wpstickies_remove,<?php echo $item->id?>" title="Remove"></a></td>
    </tr>
    <?php endforeach; ?>

    <?php if(empty($GLOBALS['latest_stickies'])) : ?>
    <tr>
    	<td colspan="5">No stickes yet.</td>
    </tr>
    <?php endif; ?>
</table>
<?php } ?>
</div>


<?php function wpstickies_metabox_restore() { ?>
<table class="wpstickies-latest-table wpstickies-restore-table">
	<?php if(!empty($GLOBALS['removed_stickies'])) : ?>
    <tr>
    	<th class="image">Preview</th>
    	<th class="title">Title / Caption</th>
    	<th class="content">Content</th>
    	<th class="user">User</th>
    	<th class="modified">Modified</th>
    	<th class="actions">Actions</th>
    </tr>
    <?php endif; ?>

    <?php foreach($GLOBALS['removed_stickies'] as $item) : ?>
    <?php $data = json_decode(stripslashes($item->data), true); ?>
    <tr>
    	<td class="image">
    		<a href="/wpstickies_preview/<?php echo base64_encode($item->image)?>">
    			<img src="<?php echo $item->image ?>">
    		</a>
    	</td>
    	<td class="title">
	    	<?php if($data['sticky']['type'] == 'area') { ?>
    		<?php echo stripslashes($data['area']['caption']) ?>
    		<?php } else { ?>
    		<?php echo stripslashes($data['spot']['title']) ?>
    		<?php } ?>
    	</td>
    	<td class="content">
	    	<?php if($data['sticky']['type'] == 'area') { ?>
    		No content
    		<?php } else { ?>
    		<?php echo stripslashes($data['spot']['content']) ?>
    		<?php } ?>
    	</td>
    	<td class="user"><?php echo $item->user_name ?></td>
    	<td class="modified">
	    	<?php echo date(get_option('date_format'), $item->date_c) ?><br>
    		<?php echo date(get_option('time_format'), $item->date_c) ?>
    	</td>
    	<td class="action wpstickies-actions"><a href="#" class="restore" rel="wpstickies_restore,<?php echo $item->id?>" title="Restore"></a></td>
    </tr>
    <?php endforeach; ?>

    <?php if(empty($GLOBALS['removed_stickies'])) : ?>
    <tr>
    	<td colspan="5">There are no removed stickies yet.</td>
    </tr>
    <?php endif; ?>
</table>
<?php } ?>
</div>


<script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready( function($) {
    	// close postboxes that should be closed
    	jQuery('.if-js-closed').removeClass('if-js-closed').addClass('closed');
    	// postboxes setup
    	postboxes.add_postbox_toggles('<?php echo $GLOBALS['options_page'] ?>');
    });
    //]]>
</script>
