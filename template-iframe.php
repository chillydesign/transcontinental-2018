<?php /* Template Name: Iframe Online */ get_header(); ?>

	<?php if ( has_post_thumbnail()) :  ?>
	<div class="page_image" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>')"></div>
	<?php else: ?>
		<div id="featured_slide"><?php  get_template_part('slides'); ?></div>
	<?php endif; ?>

<div class="page_title">
	<h1 class="container"><?php the_title(); ?></h1>
</div>


<div class="container iframecontainer">

<iframe class="iframecontained" src="<?php the_field('adresse'); ?>" frameborder="0" style="overflow: hidden; height: 100%; width: 800px; max-width: calc(100% - 40px); position: absolute; margin-top: -20px;" height="100%" width="800px"></iframe>
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


</div> <!-- END OF CONTAINER -->



<?php get_footer(); ?>
