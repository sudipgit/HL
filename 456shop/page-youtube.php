<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Dynamically Load Youtube Video Iframe embed code inside a DIV</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'><script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<style>
	body
	{
		margin	: 0;
		padding	: 0;
		background	: #EEE;
		color		: #333;
		font-family: 'Open Sans', sans-serif;
		font-size	: 12px;
	}
	#wrapper
	{
		width	: 1012px;
		margin	: 0 auto;
	}
	
	.the-player
	{
		width	: 560px;
		height	: 315px;
		border	: 1px solid #333;
		float: right;
	}
	
	.vidoe-icon
	{
		float: left;
		width: 250px;
		height: 150px;
		background-color: gray;
		margin: 2px;
		position: relative;
	}

	.embed-code
	{
		width	: 301px;
		height	: 85px;
	}
	
	.vidoe-title
	{
		background-color: black;
		opacity: .5;
		position: absolute;
		bottom: 0;
		height: 30px;
		width: 100%;
	}

	.vidoe-title h2
	{
		color: #FFF;
		font-size:17px;
		font-weight: bold;
		margin: 0px 5px; 
	}
	
	.video-icon
	{
		height: 80px;
	}

	
	.btn-load-video
	{
		border: 1px solid #AAA;
		padding: 3px 5px;
		text-decoration: none;
		background: #333;
		color: #FFF;
	}
	#vidoe-container
	{
		margin: 5px;
		padding: 10px;
	}
</style>
<body>

	<?php
	
	$args = array(
	'posts_per_page'  => 3,
	'offset'          => 0,
	'category'        => '',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'include'         => '',
	'exclude'         => '',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_type'       => 'youtube',
	'post_mime_type'  => '',
	'post_parent'     => '',
	'post_status'     => 'publish',
	'suppress_filters' => true );
	$posts  = get_posts($args);
		// echo "<pre>";
		// 	print_r($posts);
		// echo "</pre>";
	?>

	
	<div id="wrapper">
		
<?php
	if($posts)
	{
?>
	<div id="vidoe-container">
		<div class="the-player">
		</div>

<?php
		foreach($posts as $post)
		{
		?>
			<div class="vidoe-icon">
				<div class="video-icon"><?php  echo get_the_post_thumbnail( $post->ID ,  array('250','150' ) ); ?> </div>
				<a class="btn-load-video" data-iframe-content='<?php echo $post->post_content; ?>' href="javascript:void(0)" ><div class="vidoe-title"><h2><?php echo $post->post_title; ?></h2></div></a>
			</div>
		<?php
		}
		?>
	</div>
<?php		
	}	
?>
	<script type="text/javascript">
	$(document).ready(function() {
		$('.btn-load-video').click(function() {
			 // event.preventDefault(); 
			 // jQuery(this).attr('data-iframe-content');
			 // alert(jQuery(this).attr('data-iframe-content'));
			 $('.the-player').html(jQuery(this).attr('data-iframe-content'));
			 
			});
		});
	</script>
 </body>
</html>