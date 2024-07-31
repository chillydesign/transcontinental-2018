<?php /* Template Name: Page parente */ get_header(); ?>

<?php if (has_post_thumbnail()) :  ?>
	<div class="page_image" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>')"></div>
<?php else : ?>
	<div id="featured_slide"><?php get_template_part('slides'); ?></div>
<?php endif; ?>

<div class="page_title">
	<h1 class="container"><?php the_title(); ?></h1>
</div>





<div class="container">
	<div class="container">
		<div class="row">

			<!-- section -->
			<!-- <section id="main_col" class="col-sm-9 "> -->
			<section>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<!-- article -->
						<article id="main_article" <?php post_class(); ?>>

							<?php the_content(); ?>
							<hr>
							<br>
							<br>



							<?php $children = get_posts(array('posts_per_page' => -1, 'post_type' => 'page',  'post_parent' =>  $post->ID)); ?>
							<?php if (sizeof($children) > 0) : ?>
								<?php $i = 1; ?>
								<div class="row">
									<?php foreach ($children as $child) : ?>
										<?php $child_id = $child->ID; ?>
										<div class="col-sm-4">
											<a href="<?php echo $child->guid; ?>">
												<div class="block" style="background-image: url(<?php echo get_the_post_thumbnail_url($child_id); ?>);">
													<h4><?php print_r($child->post_title); ?></h4>
												</div>
											</a>
										</div>
										<?php if ($i % 3 == 0) {
											echo '</div><div class="row">';
										} ?>
										<?php $i++; ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<hr>
							<br>

							<h3>Contactez-nous</h3>


							<div class="row">
								<div class="col-sm-4">
									<p>
										TRANSCONTINENTAL Florissant<br>
										66, route de Florissant<br>
										CH – 1206 Genève<br>
										T +41 22 347 27 27<br>
										<a href="mailto:info@transcontinental.ch">info@transcontinental.ch</a>
									</p>
								</div>
								<div class="col-sm-4">
									<p>
										TRANSCONTINENTAL Chêne-Bourg<br>
										48, rue de Genève<br>
										CH – 1225 Chêne-Bourg<br>
										T +41 22 869 18 18<br>
										<a href="mailto:chene@transcontinental.ch">chene@transcontinental.ch</a>
									</p>
								</div>
							</div>
							<p>Votre équipe Transcontinental</p>


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


			<?php //get_sidebar(); 
			?>
			<?php // get_template_part('sidebar_right'); 
			?>


		</div> <!-- END OF ROW -->
	</div> <!-- END OF CONTAINER -->
</div> <!-- END OF CONTAINER -->


<?php if (get_the_title() == 'Contact') : ?>

	<section style="margin: 0px 0 -20px;">
		<div id="agencymap"></div>
	</section>
<?php endif; ?>



<?php get_footer(); ?>