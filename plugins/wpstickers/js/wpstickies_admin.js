jQuery(document).ready(function() {


	// INIT SETTINGS
	jQuery('.wpstickies_general_table input.selector').tagsInput({
		width : '500px',
		height : '40px',
		defaultText : 'add a rule'
	});

	jQuery('#wpstickies_create_custom_roles input.custom, #wpstickies_modify_custom_roles input.custom').tagsInput({
		width : '500px',
		height : '80px',
	});

	// Preview
	jQuery('a[href*="wpstickies_preview"]').click(function(e) {
		e.preventDefault();
		tb_show('', jQuery(this).attr('href') + '?type=image&amp;TB_iframe=true&width=900&height=700');
	});

	//
	// AJAX actions of pending and latest stickies
	//
	jQuery('.wpstickies-actions a').live('click', function(e) {

		// Prevent default submission of browser
		e.preventDefault();

		// Save current element
		var element = this;

		// Get params
		var params = jQuery(this).attr('rel').split(',');

		// Confirmation on remove
		if(jQuery(element).hasClass('remove')) {
			if(!confirm('Are you sure you want to remove this sticky?')) {
				return;
			}
		}

		// Make ajax request
		jQuery.post( ajaxurl, { action : params[0], id : params[1] }, function(data) {

			// Add "no more" line if this is the last table row
			if(jQuery(element).closest('table').find('tr').length < 3) {
				setTimeout(function() {
					jQuery('<tr><td colspan="5">There is no more content this time.</td></tr>').appendTo(jQuery(element).closest('table'));
					jQuery(element).closest('table').find('tr').eq(0).remove();
				}, 300);
			}

			// Insert this row to latest stickies when accepting
			if(jQuery(element).hasClass('accept') || jQuery(element).hasClass('restore')) {

				// Remove "no stickies" message and prepend titles
				if(jQuery('.wpstickies-latest-table').eq(0).find('tr').length < 2) {
					jQuery('.wpstickies-latest-table').eq(0).find('tr').remove();
					jQuery('<tr><th class="image">Preview</th><th class="title">Title / Caption</th><th class="content">Content</th><th class="user">User</th><th class="modified">Modified</th><th class="actions">Actions</th></tr>').prependTo('.wpstickies-latest-table:eq(0)');
				}

				// Insert
				var clone = jQuery(element).closest('tr').clone().insertAfter( jQuery('.wpstickies-latest-table').find('tr').eq(0) );
				clone.find('td').eq(6).remove();
				clone.find('td').eq(4).attr('class', 'modified');
				clone.find('td').eq(5).html('<a href="#" class="remove" rel="wpstickies_remove,'+params[1]+'" title="Remove"></a>');
			}

			// Insert this row to latest stickies when accepting
			if(jQuery(element).hasClass('remove')) {

				// Remove "no stickies" message and prepend titles
				if(jQuery('.wpstickies-restore-table').find('tr').length < 2) {
					jQuery('.wpstickies-restore-table').find('tr').remove();
					jQuery('<tr><th class="image">Preview</th><th class="title">Title / Caption</th><th class="content">Content</th><th class="user">User</th><th class="modified">Modified</th><th class="actions">Actions</th></tr>').prependTo('.wpstickies-restore-table');
				}

				// Insert
				var clone = jQuery(element).closest('tr').clone().insertAfter( jQuery('.wpstickies-restore-table').find('tr').eq(0) );
				clone.find('td').eq(5).html('<a href="#" class="restore" rel="wpstickies_restore,'+params[1]+'" title="Restore"></a>');
			}


			// Hide current table row
			jQuery(element).closest('tr').fadeOut(300, function() {
				jQuery(this).remove();
			});
		});
	});

	//
	// SUBMIT actions for saving all values under one key
	//

	jQuery('#wpstickies-options-table').submit(function(e) {

		// Prevent browsers default submission
		e.preventDefault();

		// Search and rewrite the name attribute of form elements
		jQuery(this).find('input, select').each(function() {

			// Skip this form element
			if(jQuery(this).attr('name') == 'posted') {
				return true;
			}

			// Rewrite name ATTR
			jQuery(this).attr('name', 'wpstickies-options['+jQuery(this).attr('name')+']');
		});

		// Post the form
		jQuery.post( jQuery(this).attr('action'), jQuery(this).serialize(), function(data) {
			if(data != 'SUCCESS') {
				alert(data);
			} else {
				window.location.reload(true);
			}
		});
	});
})