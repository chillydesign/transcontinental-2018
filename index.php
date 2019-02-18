<?php get_header(); ?>

<!--
<?php if('http://transcontinental.ch/wp-content/uploads/2017/03/sunset.jpg'){ ?>
<div class="page_image" style="background-image:url('http://transcontinental.ch/wp-content/uploads/2017/03/sunset.jpg')"></div>
<?php }  else { ?> <div id="featured_slide"><?php  get_template_part('slides'); ?></div> <?php } ?> -->


<div class="page_image" style="background-image:url('<?php echo get_the_post_thumbnail_url(2); ?>')">
	<div class="container">
		<h1>News</h1>
	</div>
</div>


<div  style="background:#e7e7e7;">
	<div class="container">
		<div class="row">

			<!-- section -->
			<section id="main_col" class="col-sm-12">
				<div id="main_article" style="padding-top:80px;">


					<?php get_template_part('loop'); ?>

					<?php get_template_part('pagination'); ?>
				</div>
			</section>
			<!-- /section -->




			<?php //get_sidebar(); ?>
			<?php // get_template_part('sidebar_right'); ?>


		</div> <!-- END OF ROW -->
	</div> <!-- END OF CONTAINER -->
</div>









<?php get_footer(); ?>
