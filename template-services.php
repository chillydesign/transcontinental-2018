<?php /* Template Name: Services online */ get_header(); ?>

<div class="page_image" style="background-image:url('<?php if ( has_post_thumbnail()) :  ?><?php echo the_post_thumbnail_url(); ?><?php else: ?><?php echo get_home_url(); ?>/wp-content/uploads/2018/10/slide2-1.jpg'<?php endif; ?>)">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</div>



<div class="container">
	<div class="welcome-section">
		<h2>Offrez un voyage de rêve</h2>
	</div>
</div>


<div class="services_online">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="reservation_box">
					<div class="offre_img" style="background-image:url(<?php echo get_template_directory_uri();?>/img/champagne.jpg)">

						<h3 class="white_title">Listes</h3>
					</div>
					<div class="offre_content">
						<div class="allbutlink">
							<h3 class="black_title">de mariage et d'anniversaire</h3>
							<div class="excerpt">
								<p>Envie d'aventure pour votre mariage, votre anniversaire ou pour une occasion spéciale? Créez une liste et demandez à vos proches d'y contribuer. Nous nous occupons du reste.</p>
							</div>

						</div>
						<a class="readmore" href="#" target="_blank"><h6>Accéder aux listes</h6></a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="reservation_box">
					<div class="offre_img" style="background-image:url(<?php echo get_template_directory_uri();?>/img/gift.jpg)">

						<h3 class="white_title">Pour offrir</h3>
					</div>
					<div class="offre_content">
						<div class="allbutlink">
							<h3 class="black_title">Bons cadeaux</h3>
							<div class="excerpt">
								<p>Créez un bon cadeau à un proche en quelques clics pour offrir un voyage inoubliable.</p>
							</div>

						</div>
						<a class="readmore" href="#" target="_blank"><h6>Créer un bon cadeau</h6></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="program">
	<div class="container">
		<h2>Besoin d'aide? Nous sommes là pour vous aider.</h2>
		<a href="<?php echo get_home_url(); ?>/demande-de-renseignements" class="button"><h6>Contactez-nous</h6></a>
	</div>
</div>



<?php //get_sidebar(); ?>
<?php // get_template_part('sidebar_right'); ?>


</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->




<?php get_footer(); ?>
