<?php get_header(); ?>

<div class="page_image" style="background-image:url('<?php if (has_post_thumbnail()) :  ?><?php echo the_post_thumbnail_url(); ?><?php else : ?><?php echo get_home_url(); ?>/wp-content/uploads/2018/10/slide2-1.jpg'<?php endif; ?>)">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</div>






<div class="container">
	<div class="row">


		<!-- section -->
		<section id="main_col" class="col-sm-9 ">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



					<!-- article -->
					<article id="main_article" <?php post_class(); ?>>

						<?php $page_gallery =  get_field('page_gallery'); ?>
						<?php $page_icons =  get_field('page_icons'); ?>
						<?php $file_upload =  get_field('file_upload'); ?>

						<?php if ($page_gallery) : ?>
							<div class="slideshow" style="height:350px">
								<ul>
									<?php foreach ($page_gallery as $image) : ?>
										<li><img style="width:auto;height:100%" src="<?php echo ($image['url']); ?>" alt="" /></li>
									<?php endforeach; ?>

								</ul>
							</div>
						<?php endif; ?>

						<?php if ($file_upload || $page_icons) : ?>
							<div class="row ">
								<div class="col-sm-9">
									<?php the_content(); ?>
								</div>
								<div class="col-sm-3 file_gallery">
									<?php if ($file_upload) : ?>
										<?php $file_type =  explode('/', $file_upload['mime_type'])[1]; ?>
										<?php $file_icon =  ($file_type == 'pdf') ? 'fa-file-pdf-o' : 'fa-file-text-o'; ?>
										<a target="_blank" class="file_upload" href="<?php echo $file_upload['url']; ?>"><i class="fa <?php echo $file_icon; ?>"></i><span><?php echo  $file_type; ?></span></a>
									<?php endif; ?>

									<?php if ($page_icons) : ?>
										<?php foreach ($page_icons as $icon) : ?>

											<img src="<?php echo ($icon['url']); ?>" alt="" />
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</div>

						<?php else : # IF NO GALLERY AND NO PDF 
						?>
							<?php the_content(); ?>
						<?php endif; ?>


						<br class="clear">

						<?php edit_post_link(); ?>





					</article>
					<!-- /article -->

				<?php endwhile; ?>

			<?php else : ?>

				<!-- article -->
				<article>

					<h2><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h2>

				</article>
				<!-- /article -->

			<?php endif; ?>

		</section>
		<!-- /section -->


		<?php get_sidebar(); ?>
		<?php // get_template_part('sidebar_right'); 
		?>


	</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->


<?php if (get_the_title() == 'Contact') : ?>
	<!-- <section style="margin: 0px 0 -20px;"><div id="agencymap"></div></section> -->
<?php endif; ?>



<?php get_footer(); ?>