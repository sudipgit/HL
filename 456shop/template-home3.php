<?php
/*
Template Name: New Home3 Template
*/
?>
 
<?php 
$current_user = wp_get_current_user();
if($current_user->ID>0)
{
 get_template_part( 'page-templates/home-after2'); 
 }else {
 
  get_template_part( 'page-templates/home-before-final'); 
 }
?>
