<?php /* Template Name: Reservations Template */ get_header(); ?>
<?php $tdu = get_template_directory_uri(); ?>
<?php $home_url = get_home_url(); ?>
<div class="page_image" style="background-image:url('<?php if (has_post_thumbnail()) :  ?><?php echo the_post_thumbnail_url(); ?><?php else : ?><?php echo $home_url; ?>/wp-content/uploads/2018/10/slide2-1.jpg'<?php endif; ?>)">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</div>



<div class="container">
	<div class="welcome-section">
		<h2>Utilisez nos services de réservation en ligne pour préparer votre voyage</h2>
	</div>
</div>


<?php $col_class =  (is_zenith()) ? 'col-sm-4' : 'col-sm-4';  ?>


<div class="reservation">
	<div class="container">
		<div class="row">
			<div class="<?php echo $col_class; ?>">
				<div class="reservation_box">
					<div class="offre_img" style="background-image:url(<?php echo $tdu; ?>/img/plane.jpg)">
						<h3 class="white_title">Trouver</h3>
					</div>
					<div class="offre_content">
						<div class="allbutlink">
							<h3 class="black_title">un vol</h3>
							<div class="excerpt">
								<p>Entrez vos dates, vos critères et toutes les offres spéciales disponibles vous seront proposées.</p>
							</div>

						</div>
						<a class="readmore" href="https://aqtion1.airquest.com/aq4/jsp/?j_username=transcontinental.ch2&j_password=transcontinental.ch2" target="_blank">
							<h6>Réserver en ligne</h6>
						</a>
					</div>
				</div>
			</div>


			<div class="<?php echo $col_class; ?>">
				<div class="reservation_box">
					<div class="offre_img" style="background-image:url(<?php echo $tdu; ?>/img/hotel.jpg)">
						<h3 class="white_title">Rechercher</h3>
					</div>
					<div class="offre_content">
						<div class="allbutlink">
							<h3 class="black_title">un hôtel</h3>
							<div class="excerpt">
								<p>Réservez votre séjour en ligne.</p>
							</div>

						</div>
						<?php if (is_zenith() == false) : ?>
							<a class="readmore" href="https://www.booking.com/index.html?aid=2091365" target="_blank">
							<?php else : ?>
								<a class="readmore" href="https://www.booking.com/index.html?aid=2093527" target="_blank">
								<?php endif; ?>
								<h6>Réserver en ligne</h6>
								</a>
					</div>
				</div>
			</div>



			<div class="<?php echo $col_class; ?>">
				<div class="reservation_box">
					<div class="offre_img" style="background-image:url(<?php echo $tdu; ?>/img/car.jpg)">

						<h3 class="white_title">Réserver</h3>
					</div>
					<div class="offre_content">
						<div class="allbutlink">
							<h3 class="black_title">une voiture</h3>
							<div class="excerpt">
								<p>En quelques clics votre voiture de location sera confirmée.</p>
							</div>

						</div>
						<a class="readmore" href="https://partner.sunnycars.ch/ak/452593" target="_blank">
							<h6>Réserver en ligne</h6>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="program">
	<div class="container">
		<h2>Besoin d'aide? Nous sommes là pour vous aider.</h2>
		<a href="<?php echo  $home_url; ?>/demande-de-renseignements" class="button">
			<h6>Contactez-nous</h6>
		</a>
	</div>
</div>



<?php //get_sidebar();
?>
<?php // get_template_part('sidebar_right');
?>


</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->




<?php get_footer(); ?>