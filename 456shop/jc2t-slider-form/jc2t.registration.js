	
	function change_phone_prefix(ref) {
		var s = ref.value.split('_');
		prefix = document.getElementById('prefix_phone');
		if( isArray(s) && s[1] != null) {
			prefix.value = '+' + s[1];
		}
		compile_phone_number();
	}

	function isArray(obj) {
		return (obj.constructor.toString().indexOf("Array") != -1);
	}

	function compile_phone_number() {
		jQuery('#phone_complete').val(jQuery('#prefix_phone').val() + jQuery('#phone').val());
	}

	function jc2t_quick_validate(id) {
		switch (id) {
			case 're_username' :
				if( jQuery('#username').val() != jQuery('#re_username').val() ) { 
					jQuery('#re_username').addClass('error');
				} else {
					jQuery('#re_username').removeClass('error');
				}
			break;
			
			case 're_email' :
				if( jQuery('#email').val() != jQuery('#re_email').val() ) { 
					jQuery('#re_email').addClass('error');
				} else {
					jQuery('#re_email').removeClass('error');
				}
			break;
			
			case 're_password' :
				if( jQuery('#password').val() != jQuery('#re_password').val() ) { 
					jQuery('#re_password').addClass('error');
				} else {
					jQuery('#re_password').removeClass('error');
				}
			break;
		}
	}
	
	function empty_field_check(id) {
		if( jQuery.trim($('#' + id).val()).length == 0 ) {
			return false;
		} else {
			return true;
		}
	}
	
	function validate_email(address) {
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg.test(address) == false) {
			return false;
		}
		return true;
	}
	
	
	
	/*-------------------*/
	
	
	var __email = '';
	
	function __email_blur(val) {
		if( __email == val ) {
			return false;
		} else {
			__email = val;
			MBT_check_useremail_availability(val);
		}
	}
	
	function ___email_update(bool) {
		if( bool == 1 ) {
			$('#email_loading').hide();
			$('#email_valid').css('display', 'inline-block');
			$('#email_invalid').hide();
			$('#email').removeClass('error');
		} else {
			$('#email_loading').hide();
			$('#email_valid').hide();
			$('#email_invalid').css('display', 'inline-block');
			$('#email').addClass('error');
		}
	}
	
	var __username = '';
	
	function __username_blur(val) {
		if( __username == val ) {
			return false;
		} else {
			__username = val;
			MBT_check_username_availability(val);
		}
	}
	
	function ___username_update(bool) {
		if( bool == 1 ) {
			$('#username_loading').hide();
			$('#username_valid').css('display', 'inline-block');
			$('#username_invalid').hide();
			$('#username').removeClass('error');
		} else {
			$('#username_loading').hide();
			$('#username_valid').hide();
			$('#username_invalid').css('display', 'inline-block');
			$('#username').addClass('error');
		}
	}