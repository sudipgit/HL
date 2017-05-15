<?php

	global $wp_query;

	// Assets
	$image = base64_decode($wp_query->get('wps_image'));
	$css = plugins_url('/css/preview.css', __FILE__);
	$js = plugins_url('/js/preview.js', __FILE__);


	wp_head();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Preview for WPStickies</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="<?php echo $css ?>" type="text/css" media="screen">
	</head>
	<body>
		<h1>WP Stickies Image Preview</h1>
		<img src="<?php echo $image ?>" class="wp-image-preview" alt="WPStickies Preview Image">
		<script type="text/javascript" src="<?php echo $js ?>"></script>
	</body>
</html>