<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* General Settings
    ================================================== */
    $body_font_family = get_option_tree('body_font_family',$theme_options);
    $heading_font_family = get_option_tree('heading_font_family',$theme_options);
    $elements_font_family = get_option_tree('elements_font_family',$theme_options);
    $navigation_font_family = get_option_tree('navigation_font_family',$theme_options);
    $google_character_sets = get_option_tree('google_character_sets',$theme_options);
}
?>

	<!-- Google Web Fonts
  ================================================== -->
  
    <?php if($body_font_family == 'Open+Sans'
    || $body_font_family == 'Titillium+Web'
    || $body_font_family == 'Oxygen'
    || $body_font_family == 'Quicksand'
    || $body_font_family == 'Lato'
    || $body_font_family == 'Raleway'
    || $body_font_family == 'Source+Sans+Pro'
    || $body_font_family == 'Dosis'
    || $body_font_family == 'Exo'
    ){ ?>
        <link href='http://fonts.googleapis.com/css?family=<?php echo $body_font_family; ?>:300,400,700,400italic<?php if($google_character_sets){echo '&subset=latin,'; echo $google_character_sets; } ?>' rel='stylesheet' type='text/css'>
    <?php }?>
    
    <?php 
    if($heading_font_family == 'Open+Sans'
    || $heading_font_family == 'Titillium+Web'
    || $heading_font_family == 'Oxygen'
    || $heading_font_family == 'Quicksand'
    || $heading_font_family == 'Lato'
    || $heading_font_family == 'Raleway'
    || $heading_font_family == 'Source+Sans+Pro'
    || $heading_font_family == 'Dosis'
    || $heading_font_family == 'Exo'
    ){ ?>
        <link href='http://fonts.googleapis.com/css?family=<?php echo $heading_font_family; ?>:300,400,700,400italic<?php if($google_character_sets){echo '&subset=latin,'; echo $google_character_sets; } ?>' rel='stylesheet' type='text/css'>
    <?php }?>
    
    <?php 
    
    if($elements_font_family == 'Open+Sans'
    || $elements_font_family == 'Titillium+Web'
    || $elements_font_family == 'Oxygen'
    || $elements_font_family == 'Quicksand'
    || $elements_font_family == 'Lato'
    || $elements_font_family == 'Raleway'
    || $elements_font_family == 'Source+Sans+Pro'
    || $elements_font_family == 'Dosis'
    || $elements_font_family == 'Exo'
    ){ ?>
        <link href='http://fonts.googleapis.com/css?family=<?php echo $elements_font_family; ?>:300,400,700,400italic<?php if($google_character_sets){echo '&subset=latin,'; echo $google_character_sets; } ?>' rel='stylesheet' type='text/css'>
    <?php }?>
    
    <?php 
    if($navigation_font_family == 'Open+Sans'
    || $navigation_font_family == 'Titillium+Web'
    || $navigation_font_family == 'Oxygen'
    || $navigation_font_family == 'Quicksand'
    || $navigation_font_family == 'Lato'
    || $navigation_font_family == 'Raleway'
    || $navigation_font_family == 'Source+Sans+Pro'
    || $navigation_font_family == 'Dosis'
    || $navigation_font_family == 'Exo'
    ){ ?>
        <link href='http://fonts.googleapis.com/css?family=<?php echo $navigation_font_family; ?>:300,400,700,400italic<?php if($google_character_sets){echo '&subset=latin,'; echo $google_character_sets; } ?>' rel='stylesheet' type='text/css'>
    <?php }?>
    
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>