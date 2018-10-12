<?php /* Template Name: Homepage Template */ get_header(); ?>

<div class="page_image homepage_image" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>')">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<a class="top_button" href="<?php echo get_home_url(); ?>/contact" class="button"><h6>Contactez-nous pour organiser votre voyage</h6></a>
	</div>
</div>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="container">
		<div class="welcome-section">
			<?php the_content(); ?>
			<a href="<?php echo get_home_url(); ?>/contact" class="button" style="margin-top:20px; display:block;"><h6>Contactez-nous pour organiser votre voyage</h6></a>
		</div>
	</div>

	<div class="offers">
		<div class="container">
			<?php $offres_arg = array(
				'post_type' => 'offre',
				"posts_per_page" => 6,
				'meta_key'	=> 'offer_end',
				'orderby' => 'meta_value',
				"order"  => "ASC"
			); ?>
			<?php $offres_loop = new WP_Query( $offres_arg );

			if ( $offres_loop -> have_posts() ) : ?>
			<div class="offers_slider_container">
				<div id="offers_slider">
					<?php while ( $offres_loop -> have_posts() ) :
						$offres_loop -> the_post(); ?>

						<div class="offre">
							<?php if(get_field('offer_end')):?>
								<?php $offre_time= get_field('offer_end'); ?>
								<?php $offre_number_time= strtotime(get_field('offer_end')); ?>
								<?php $time = time(); ?>
								<?php $diff = $offre_number_time - $time; ?>
								<?php if($diff < 0): ?>
									<div class="offer_label expired_offer_label">offre expirée</div>
								<?php else : ?>
									<div class="offer_label">jusqu'au <?php echo date('d.m.Y', $offre_number_time); ?></div>
								<?php endif; ?>
							<?php endif; ?>
							<div style="clear:both;"></div>
							<div class="offre_img" style="background-image:url(<?php the_post_thumbnail_url();?>)">

								<h3 class="white_title"><?php echo get_field('white_title'); ?></h3>
							</div>
							<div class="offre_content">
								<div class="allbutlink">
									<h3 class="black_title"><?php echo get_field('black_title'); ?></h3>
									<div class="excerpt">
										<?php if(get_field('extract')): ?>
											<p><?php echo get_field('extract'); ?></p>
										<?php else: ?>
											<?php
											$content = str_replace('! ', '. ', get_field('content'));
											$content = str_replace('</h2>', '. ', $content);
											$content = strip_tags($content);
											$content = '<p>' . strip_tags($content) . '</p>';
											$dot = ".";

											$position = stripos ($content, $dot); //find first dot position

											if($position) { //if there's a dot in our soruce text do
												$offset = $position + 1; //prepare offset
												$position2 = stripos ($content, $dot, $offset); //find second dot using offset
												$first_two = substr($content, 0, $position2); //put two first sentences under $first_two

												echo $first_two . '.'; //add a dot
											}

											else {  //if there are no dots
												//do nothing
											}
											?>
										<?php endif; ?>
									</div>

								</div>
								<a class="readmore" href="<?php the_permalink();?>"><h6>afficher l'offre</h6></a>
							</div>
						</div>

					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<a href="<?php echo get_home_url(); ?>/offre" class="button" style="display:block; text-align:center;"><h6>Découvrir toutes nos offres</h6></a>

	</div>
</div>

<div class="online">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="offre_img" style="background-image:url(<?php echo get_template_directory_uri();?>/img/plane.jpg)">

					<h3 class="white_title">Services online</h3>
				</div>
				<div class="offre_content">
					<div class="allbutlink">
						<h3 class="black_title">Réservation de vols, hôtels et voiture en ligne</h3>
						<div class="excerpt">
							<p>Utilisez nos services en ligne pour réserver votre voyage en quelques clics.</p>
						</div>

					</div>
					<a class="readmore" href="<?php echo get_home_url();?>/services-online"><h6>Réserver en ligne</h6></a>
				</div>

			</div>

			<div class="col-sm-6">
				<div class="offre_img" style="background-image:url(<?php echo get_template_directory_uri();?>/img/gift.jpg)">

					<h3 class="white_title">Pour offrir</h3>
				</div>
				<div class="offre_content">
					<div class="allbutlink">
						<h3 class="black_title">Bons cadeaux et listes de mariage en ligne</h3>
						<div class="excerpt">
							<p>Offrez-leur le voyage de leurs rêves. Choisissez le montant, ils choisiront leur destination!</p>
						</div>

					</div>
					<a class="readmore" href="<?php echo get_home_url();?>/pour-offrir"><h6>Offrir un voyage</h6></a>
				</div>

			</div>

		</div>
	</div>
</div>

<div class="locations">
	<div class="container">
		<h2>Prêt à partir? Retrouvez-nous dans une de nos agences </h2>
		<div class="row">
			<div class="col-sm-4 map_height">
				<div class="offre_img" style="background-image:url(<?php echo get_field('florissant_photo')['url']; ?>)">
					<h3 class="white_title">Agence de Florissant</h3>
				</div>
				<div class="offre_content" style="padding-top:10px;">
					<?php echo get_field('florissant'); ?>
				</div>
			</div>
			<div class="col-sm-4 map_height">
				<div class="offre_img" style="background-image:url(<?php echo get_field('chene_photo')['url']; ?>)">
					<h3 class="white_title">Agence de Chêne</h3>
				</div>
				<div class="offre_content" style="padding-top:10px;">
					<?php echo get_field('chene'); ?>
				</div>
			</div>
			<div class="col-sm-4"><div class="map_height" id="agencymap"></div></div>
		</div>
	</div>
</div>

<div class="program">
	<div class="container">
		<h2>Programmez votre prochain voyage</h2>
		<a href="<?php echo get_home_url(); ?>/contact" class="button"><h6>Contactez-nous</h6></a>
	</div>
</div>


<?endwhile; endif; ?>

<?php get_footer(); ?>
