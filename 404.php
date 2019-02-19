<?php get_header(); ?>

<div class="page_image" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/lost-sea.jpg;'); min-height: calc(100vh - 79px)">
	<div class="container">
		<h1>Vous êtes perdu?<br><span class="not_found">La page que vous recherchez n'existe pas ou a été déplacée.</span></h1><div></div>
		<a class="top_button button_404" href="<?php echo get_home_url(); ?>" class="button"><h6>Retour à l'accueil</h6></a><div class="ou">ou</div><a href="<?php echo get_home_url(); ?>/demande-de-renseignements" class="top_button  button_404" style="margin-top:20px; display:block;"><h6>Contactez-nous</h6></a>
	</div>
</div>




<?php get_footer(); ?>
