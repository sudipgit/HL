
<?php
/*
Template Name: Magazine Template
*/
?>

<?php  get_header(); ?>


		<div id="main" class="wrap magazine-template">
			<div class="container">
		
				<div class="row-fluid">
		
			     
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content();?>
                    <?php endwhile;?>
                    <?php endif; ?>
                 </div>
                   
				</div>
			</div>
	
<?php get_footer(); ?>

