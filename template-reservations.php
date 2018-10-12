<?php /* Template Name: Reservations Template */ get_header(); ?>

<div class="page_image" style="background-image:url('<?php if ( has_post_thumbnail()) :  ?><?php echo the_post_thumbnail_url(); ?><?php else: ?><?php echo get_home_url(); ?>/wp-content/uploads/2018/10/slide2-1.jpg'<?php endif; ?>)">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</div>



<div class="container">
	<div class="welcome-section">
		<h2>Utilisez nos services de réservation en ligne pour préparer votre voyage</h2>
	</div>
</div>


<div class="reservation">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="reservation_box">
					<div class="offre_img" style="background-image:url(<?php echo get_template_directory_uri();?>/img/plane.jpg)">

						<h3 class="white_title">Trouver</h3>
					</div>
					<div class="offre_content">
						<div class="allbutlink">
							<h3 class="black_title">un vol</h3>
							<div class="excerpt">
								<p>Entrez vos dates, vos critères et toutes les offres spéciales disponibles vous seront proposées.</p>
							</div>

						</div>
						<a class="readmore" href="https://aqtion1.airquest.com/aq4/jsp/c/amadeus2/Aqtionbooker.jsp;jsessionid=6D82C06EF35A072C362E7EB9F5A564EB?j_username=transcontinental.ch&j_password=transcontinental.ch&&&termid=transcontinental.ch" target="_blank"><h6>Réserver en ligne</h6></a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="reservation_box">
					<div class="offre_img" style="background-image:url(<?php echo get_template_directory_uri();?>/img/hotel.jpg)">

						<h3 class="white_title">Rechercher</h3>
					</div>
					<div class="offre_content">
						<div class="allbutlink">
							<h3 class="black_title">un hôtel</h3>
							<div class="excerpt">
								<p>Réservez votre séjour en ligne.</p>
							</div>

						</div>
						<a class="readmore" href="http://www.hotelpronto.com/?affiliateid=30614" target="_blank"><h6>Réserver en ligne</h6></a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="reservation_box">
					<div class="offre_img" style="background-image:url(<?php echo get_template_directory_uri();?>/img/car.jpg)">

						<h3 class="white_title">Réserver</h3>
					</div>
					<div class="offre_content">
						<div class="allbutlink">
							<h3 class="black_title">une voiture</h3>
							<div class="excerpt">
								<p>En quelques clics votre voiture de location sera confirmée.</p>
							</div>

						</div>
						<a class="readmore" href="https://partner.sunnycars.ch/ak/452593" target="_blank"><h6>Réserver en ligne</h6></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="program">
	<div class="container">
		<h2>Besoin d'aide? Nous sommes là pour vous aider.</h2>
		<a href="<?php echo get_home_url(); ?>/contact" class="button"><h6>Contactez-nous</h6></a>
	</div>
</div>



<?php //get_sidebar(); ?>
<?php // get_template_part('sidebar_right'); ?>


</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->




<?php get_footer(); ?>
