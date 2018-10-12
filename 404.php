<?php get_header(); ?>

<div class="page_image" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">
	<div class="container">
		<h1>la page que vous recherchez n'existe pas.</h1>
	</div>
</div>



<div class="container" >
	<div class="row">

		<!-- section -->
		<section id="main_col" class="col-sm-9">


			<!-- article -->
			<article id="main_article">

				<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
				<h2>
					<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
				</h2>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->





		<?php get_sidebar(); ?>
		<?php // get_template_part('sidebar_right'); ?>


	</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->


<?php get_footer(); ?>
