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

			<?php
            $today = date("Y-m-d");
            $offers_to_show = 6;
            $offres_arg = array(
				'post_type' => 'offre',
				"posts_per_page" => $offers_to_show,
				'meta_key'	=> 'offer_end',
				'orderby' => 'meta_value',
                "order"  => "ASC",
                'meta_query' => array(
                    array(
                        'key' => 'offer_end', // Check the offerend date field is in the future
                        'value' => $today,
                        'compare' => '>=',
                        'type' => 'DATE'
                    )

                )
			); ?>
			<?php $offres_loop = new WP_Query( $offres_arg ); ?>
            <?php $offres_loop_count = $offres_loop->post_count; ?>

			<div class="offers_slider_container">
				<div id="offers_slider">
                    <?php if ( $offres_loop -> have_posts() ) : ?>
                        <?php while ( $offres_loop -> have_posts() ) :
                            $offres_loop -> the_post(); ?>
                            <?php get_template_part('offer_template'); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>

                    <?php if ($offres_loop_count < $offers_to_show) : ?>
                        <?php
                        $offers_required = $offers_to_show - $offres_loop_count;
                        $offres_old_arg = array(
                            'post_type' => 'offre',
                            "posts_per_page" => $offers_required,
                            'meta_key'	=> 'offer_end',
                            'orderby' => 'meta_value',
                            "order"  => "ASC",
                            'meta_query' => array(
                                array(
                                    'key' => 'offer_end', // Check the offerend date field is in the past
                                    'value' => $today,
                                    'compare' => '<',
                                    'type' => 'DATE'
                                )
                            )
                        ); ?>
                        <?php $offres_loop_old = new WP_Query( $offres_old_arg ); ?>
                        <?php if ( $offres_loop_old -> have_posts() ) : ?>
                            <?php while ( $offres_loop_old -> have_posts() ) :
                                $offres_loop_old -> the_post(); ?>
                                <?php get_template_part('offer_template'); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>

                    <?php endif; // if we need to fill up the offers loop ?>



				</div>
			</div>

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
			<div class="col-sm-4 ">
                <?php $florissant_photo =  get_field('florissant_photo'); ?>
				<div class="offre_img" style="background-image:url(<?php echo $florissant_photo['sizes']['medium']; ?>)">
					<h3 class="white_title"><?php if(is_zenith()){ echo 'Zénith Voyages Gland';} else {echo 'Agence de Florissant'; } ?></h3>
				</div>
				<div class="offre_content" style="padding-top:10px;">
					<?php echo get_field('florissant'); ?>
				</div>
			</div>
			<div class="col-sm-4 ">
                <?php $chene_photo =  get_field('chene_photo'); ?>
				<div class="offre_img" style="background-image:url(<?php echo $chene_photo['sizes']['medium']; ?>)">
					<h3 class="white_title"><?php if(is_zenith()){ echo 'Zénith Voyages Nyon';} else {echo 'Agence de Chêne'; } ?></h3>
				</div>
				<div class="offre_content" style="padding-top:10px;">
					<?php echo get_field('chene'); ?>
				</div>
			</div>

			<div class="col-sm-4 ">
                <?php $eaux_photo =  get_field('eaux_photo'); ?>
				<div class="offre_img" style="background-image:url(<?php echo $eaux_photo['sizes']['medium']; ?>)">
					<h3 class="white_title"><?php if(is_zenith()){ echo 'Zénith Voyages Eaux Vives';} else {echo 'Agence de Eaux Vives'; } ?></h3>
				</div>
				<div class="offre_content" style="padding-top:10px;">
					<?php echo get_field('eaux'); ?>
				</div>
			</div>
			 </div> <!--END OF ROW -->

      <?php if(is_zenith()) : ?>
        <script>
        	var locations = [[46.4226507, 6.2615992, 'Agence Gland'], [46.3826367, 6.2362164, 'Agence Nyon'], [46.2042583,6.1570301, 'Agence Eaux Vives']  ];
        </script>
      <?php else: ?>
      <script>
      	var locations = [[46.192858, 6.162241, 'Agence Florissant'], [46.193973, 6.195679, 'Agence Chêne'], [46.2042583,6.1570301, 'Agence Eaux Vives']];
      </script>
    <?php endif; ?>
	<br>
	<br>
	<div class="row">
			<div class="col-sm-12"><div id="agencymap"></div></div>
	</div> <!--END OF ROW -->
		
	</div>
</div>

<div class="program <?php if(is_zenith()){echo 'zenith_program';} ?>">
	<div class="container">
		<h2>Programmez votre prochain voyage</h2>
		<a href="<?php echo  $home_url; ?>/demande-de-renseignements" class="button"><h6>Contactez-nous</h6></a>
	</div>
</div>


<?endwhile; endif; ?>

<?php get_footer(); ?>
