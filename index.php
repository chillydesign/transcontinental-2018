<?php get_header(); ?>


<?php if('http://transcontinental.ch/wp-content/uploads/2017/03/sunset.jpg'){ ?> 
	<div class="page_image" style="background-image:url('http://transcontinental.ch/wp-content/uploads/2017/03/sunset.jpg')"></div>
<?php }  else { ?> <div id="featured_slide"><?php  get_template_part('slides'); ?></div> <?php } ?>




<div class="page_title">
	<h1 class="container">News</h1>
</div>



<div class="container" >
	<div class="row">

		<!-- section -->
		<section id="main_col" class="col-sm-12">
			<div id="main_article">


			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>
			</div>
		</section>
		<!-- /section -->




		<?php //get_sidebar(); ?>
		<?php // get_template_part('sidebar_right'); ?>


	</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->









<?php get_footer(); ?>
