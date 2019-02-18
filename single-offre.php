<?php get_header(); ?>


<!-- <div id="featured_slide"><?php  //get_template_part('slides'); ?></div> -->
<div class="page_image" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">
	<div class="container">
		<h1><?php echo get_field('white_title'); ?><br><?php echo get_field('black_title'); ?></h1>
		<a class="top_button" id="offre_slide" href="#reserver" class="button"><h6>Réservez maintenant</h6></a>
	</div>
</div>





<div class="container" >
	<div class="row">

		<!-- section -->
		<section id="main_col" class="col-sm-12">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="main_article" <?php post_class(); ?>>


					<?php $post_upload =  get_field('post_upload'); ?>
					<?php if( $post_upload ||  has_post_thumbnail()  ) : ?>

						<div class="row ">
							<div class="col-sm-8">
								<?php echo get_field('content'); ?>
								<?php if (get_field('photo_gallery')) : ?>
									<?php $images = get_field('photo_gallery'); ?>
									<div class="gallery_slider_container">
										<div id="gallery_slider">
											<?php foreach( $images as $image ): ?>
												<div>
													<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
													<p><?php echo $image['caption']; ?></p>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								<?php endif; ?>



							</div>




							<div class="col-sm-4">
								<div class="more_info_box">
									<h3>Plus d'informations</h3>
									<?php $offre_number_time= strtotime(get_field('offer_end')); ?>

										<p>
										<?php if(get_field('more_info')): ?>
											<?php the_field('more_info'); ?><br>
										<?php endif; ?>
										Offre valide jusqu'au <?php echo date('d.m.Y', $offre_number_time); ?>
									</p>
									<?php if(get_field('download')): ?>
									<a href="<?php the_field('download'); ?>" target="_blank" class="doc_link"><h6>Télécharger la documentation</h6></a>
										<?php endif; ?>
									<h3 id="reserver">Réserver</h3>
									<form action="#">
										<label for="nom">Votre nom</label>
										<input type="text" name="nom" required>
										<label for="email">Votre email</label>
										<input type="email" name="email" required>
										<label for="nombre">Nombre de personnes</label>
										<input type="number" name="nombre">
										<label for="message">Message</label>
										<textarea name="message" id="" cols="30" rows="10"></textarea>
										<input type="submit" value="Envoyer une demande de réservation">
									</form>

								</div>



							</div>
						</div>




					<?php else :  ?>
						<?php the_content(); // Dynamic Content ?>
						<?php if(get_field('contact')){echo $contact;} ?>
						<?php echo $backtonews; ?>
					<?php endif; ?>




					<?php edit_post_link(); ?>




					<?php //  comments_template(); ?>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

			</article>
			<!-- /article -->

		<?php endif; ?>

	</section>
	<!-- /section -->



	<?php //get_sidebar(); ?>
	<?php // get_template_part('sidebar_right'); ?>


</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->

<?php get_footer(); ?>
