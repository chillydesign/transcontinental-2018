<?php get_header(); ?>

<div class="page_image" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">
	<div class="container">
		<h1>Nos offres</h1>
		<a class="top_button" href="<?php echo get_home_url(); ?>/demande-de-renseignements" class="button"><h6>Contactez-nous pour organiser votre voyage</h6></a>
	</div>
</div>

<?php get_template_part('list-offres-cat'); ?>

<div class="container" >
	<div class="row">



		<!-- section -->
		<section id="main_col" class="col-sm-12">
			<div id="offres_list">




			<?php get_template_part('loop-offres'); ?>


			</div>
		</section>
		<!-- /section -->




		<?php //get_sidebar(); ?>
		<?php // get_template_part('sidebar_right'); ?>


	</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->


<?php get_footer(); ?>
