<?php /* Template Name: Homepage Template */ get_header(); ?>

<?php $home_url = get_home_url(); ?>
<?php $tdu = get_template_directory_uri(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<?php
$images_for_slider = array();
$slider = get_field('slider');

 if ($slider):
     foreach ($slider as $image) {
         array_push($images_for_slider, $image['sizes']['large']);
     }

else : # no slider use featured image
     $image = thumbnail_of_post_url(get_the_ID(), 'large');
     if ($image) {
        array_push($images_for_slider, $image);
     }

endif; # no slider use featured image

?>

<div class="page_image homepage_image">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<a class="top_button button" href="<?php echo $home_url; ?>/demande-de-renseignements"><h6>Contactez-nous pour organiser votre voyage</h6></a>
	</div>

    <?php if (sizeof($images_for_slider) > 0): ?>
        <div class="header_slider">
            <?php foreach ($images_for_slider as $image) : ?>
                <div class="header_slider_image"  style="background-image:url('<?php echo $image; ?>')"></div>
            <?php endforeach; ?>
        </div>
    <?php endif ?>

</div>


	<div class="container">
		<div class="welcome-section">
			<?php the_content(); ?>
			<a href="<?php echo $home_url; ?>/demande-de-renseignements" class="button" style="margin-top:20px; display:block;"><h6>Contactez-nous pour organiser votre voyage</h6></a>
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
                            <?php $offre_time = get_field('offer_end'); ?>
							<?php if( $offre_time  ):?>
								<?php $offre_number_time = strtotime( $offre_time ); ?>
								<?php $time = time(); ?>
								<?php $diff = $offre_number_time - $time; ?>
								<?php if($diff < 0): ?>
									<div class="offer_label expired_offer_label">offre expirée</div>
								<?php else : ?>
									<div class="offer_label">jusqu'au <?php echo date('d.m.Y', $offre_number_time); ?></div>
								<?php endif; ?>
							<?php endif; ?>
							<div style="clear:both;"></div>
                            <?php $offre_img = thumbnail_of_post_url(get_the_ID(), 'medium');  ?>
							<div class="offre_img" style="background-image:url(<?php echo $offre_img; ?>)">

								<h3 class="white_title"><?php echo get_field('white_title'); ?></h3>
							</div>
							<div class="offre_content">
								<div class="allbutlink">
									<h3 class="black_title"><?php echo get_field('black_title'); ?></h3>
									<div class="excerpt">
                                        <?php $extract = get_field('extract'); ?>
										<?php if( $extract ): ?>
											<p><?php echo $extract; ?></p>
										<?php else: ?>
											<?php
											$content = str_replace('! ', '. ', get_field('content'));
											$content = str_replace('</h2>', '. ', $content);
											$content = strip_tags($content);
											$content = '<p>' . strip_tags($content) . '</p>';
											$dot = ".";

											$position = stripos($content, $dot); //find first dot position

											if($position) { //if there's a dot in our source text do
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
		<a href="<?php echo $home_url; ?>/offre" class="button" style="display:block; text-align:center;"><h6>Découvrir toutes nos offres</h6></a>

	</div>
</div>

<div class="online">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="offre_img" style="background-image:url(<?php echo $tdu;?>/img/plane.jpg)">

					<h3 class="white_title">Services online</h3>
				</div>
				<div class="offre_content">
					<div class="allbutlink">
						<h3 class="black_title">Réservation de vols, hôtels et voiture en ligne</h3>
						<div class="excerpt">
							<p>Utilisez nos services en ligne pour réserver votre voyage en quelques clics.</p>
						</div>

					</div>
					<a class="readmore" href="<?php echo $home_url;?>/reservations-2424-h"><h6>Réserver en ligne</h6></a>
				</div>

			</div>

			<div class="col-sm-6">
				<div class="offre_img" style="background-image:url(<?php echo $tdu; ?>/img/gift.jpg)">

					<h3 class="white_title">Pour offrir</h3>
				</div>
				<div class="offre_content">
					<div class="allbutlink">
						<h3 class="black_title">Bons cadeaux et listes de mariage en ligne</h3>
						<div class="excerpt">
							<p>Offrez un voyage de rêve. Choisissez le montant, ils choisiront leur destination!</p>
						</div>

					</div>
					<a class="readmore" href="<?php echo $home_url; ?>/pour-offrir"><h6>Offrir un voyage</h6></a>
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
                <?php $florissant_photo =  get_field('florissant_photo'); ?>
				<div class="offre_img" style="background-image:url(<?php echo $florissant_photo['sizes']['medium']; ?>)">
					<h3 class="white_title">Agence de Florissant</h3>
				</div>
				<div class="offre_content" style="padding-top:10px;">
					<?php echo get_field('florissant'); ?>
				</div>
			</div>
			<div class="col-sm-4 map_height">
                <?php $chene_photo =  get_field('chene_photo'); ?>
				<div class="offre_img" style="background-image:url(<?php echo $chene_photo['sizes']['medium']; ?>)">
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
		<a href="<?php echo  $home_url; ?>/demande-de-renseignements" class="button"><h6>Contactez-nous</h6></a>
	</div>
</div>


<?endwhile; endif; ?>

<?php get_footer(); ?>
