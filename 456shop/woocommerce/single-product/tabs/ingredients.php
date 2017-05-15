<?php
/**
 * ingredients tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
 <?php
 global $post;
 ?>
 <div class="ingredient-tab">

<?php  echo  get_post_meta( $post->ID, 'ingredients', true); ?>

 </div>