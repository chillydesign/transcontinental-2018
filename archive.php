<?php get_header(); ?>

<div id="featured_slide"><?php  get_template_part('slides'); ?></div>

<div class="page_title">
	<h1 class="container"><?php _e( 'Archives', 'html5blank' ); ?></h1>
</div>



<div class="container" >
	<div class="row">



		<!-- section -->
		<section id="main_col" class="col-sm-9">
			<div id="main_article">



			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>
			</div>
		</section>
		<!-- /section -->


		

		<?php get_sidebar(); ?>
		<?php // get_template_part('sidebar_right'); ?>


	</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->


<?php get_footer(); ?>
