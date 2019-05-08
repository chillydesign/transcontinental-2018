<?php get_header(); ?>

<?php  if (get_website_theme() == 'zenith') :
	$contact = '
		<div class="row" style="max-width: 600px;">
		<div class="col-sm-12"><h3>Contacts & Réservations</h3></div>
		<p class="col-sm-12">Nos conseillers spécialisés sont à votre disposition pour vous aider à faire le bon choix.</p>
			<p class="col-sm-6">
				<strong>ZENITH VOYAGES Gland </strong><br>
				9, avenue du Mont-Blanc<br>
1196 Gland<br>
T +41 22 364 46 91<br>
<a href="mailto:info@zenithvoyages.ch">info@zenithvoyages.ch</a>
			</p>
			<p class="col-sm-6">
				<strong>ZENITH VOYAGES Nyon </strong><br>
				6, place Bel-Air<br>
			1260 Nyon<br>
				T +41 22 362 98 80 <br>
				<a href="mailto:nyon@zenithvoyages.ch">nyon@zenithvoyages.ch</a>
			</p>
		</div>
	';
	else :

$contact = '
	<div class="row" style="max-width: 600px;">
	<div class="col-sm-12"><h3>Contacts & Réservations</h3></div>
	<p class="col-sm-12">Nos conseillers spécialisés sont à votre disposition pour vous aider à faire le bon choix.</p>
		<p class="col-sm-6">
			<strong>TRANSCONTINENTAL Florissant </strong><br>
			66, route de Florissant<br>
			CH – 1206 Genève <br>
			T +41 22 347 27 27 <br>
			<a href="mailto:info@transcontinental.ch">info@transcontinental.ch</a>
		</p>
		<p class="col-sm-6">
			<strong>TRANSCONTINENTAL Chêne-Bourg </strong><br>
			48, rue de Genève<br>
			CH – 1225 Chêne-Bourg<br>
			T +41 22 869 18 18 <br>
			<a href="mailto:chene@transcontinental.ch">chene@transcontinental.ch</a>
		</p>
	</div>
';
endif; ?>


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

								<?php if(get_field('contact')){echo $contact;} ?>



							</div>




							<div class="col-sm-4">
								<div class="more_info_box">
									<h3>Plus d'informations</h3>
									<?php $offre_number_time= strtotime(get_field('offer_end')); ?>

										<p>
                                        <?php $more_info = get_field('more_info'); ?>
										<?php if( $more_info ): ?>
											<?php echo $more_info; ?><br>
										<?php endif; ?>
										Offre valide jusqu'au <?php echo date('d.m.Y', $offre_number_time); ?>
									</p>

                                    <?php $download = get_field('download'); ?>
									<?php if( $download ): ?>
									<a href="<?php echo $download; ?>" target="_blank" class="doc_link"><h6>Télécharger la documentation</h6></a>
										<?php endif; ?>
									<h3 id="reserver">Réserver</h3>
									<form id="send_offer" action="send_offer.php">
										<label for="name">Votre nom</label>
										<input type="text" id="name" name="name" required />
										<label for="email">Votre email</label>
										<input type="email" id="email" name="email" required />
										<label for="number">Nombre de personnes</label>
										<input type="number" id="number" name="number" />
										<label for="message">Message</label>
										<textarea name="message" id="message" cols="30" rows="10"></textarea>
										<button type="submit">Envoyer une demande de réservation</button>
                                        <input type="hidden"  id="offer_title" name="offer_title" value="<?php echo get_the_title(); ?>" />
                                        <p id="sendOfferResponse"></p>
									</form>
                                    <?php $tdu = get_template_directory_uri(); ?>
                                    <script> var send_offer_url = '<?php echo $tdu; ?>/send_offer.php';</script>

								</div>



							</div>
						</div>




					<?php else :  ?>
						<?php the_content(); // Dynamic Content ?>
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
