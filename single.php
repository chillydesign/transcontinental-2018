<?php get_header(); ?>
<?php $contact = '
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
'; ?>
<?php $backtonews = '
<div style="margin-top: 20px;">
	<p><a href="' . get_home_url() . '/news"><< Retour aux news</a></p>
</div>
'; ?>

<!-- <div id="featured_slide"><?php  //get_template_part('slides'); ?></div> -->

	<!-- <div id="featured_slide"><?php  //get_template_part('slides'); ?></div> -->
	<div class="page_image" style="background-image:url('<?php if(get_the_post_thumbnail_url()){echo get_the_post_thumbnail_url();} else {echo get_the_post_thumbnail_url(2);} ?>')">
		<div class="container">
			<h1><?php the_title(); ?></h1>
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
					<div class="col-sm-9">
						<?php the_content(); ?>
						<?php if(get_field('contact')){echo $contact;} ?>
						<?php echo $backtonews; ?>
					</div>
					<div class="col-sm-3 file_gallery">

						<?php if( $post_upload  ) : ?>
							<?php $file_type =  explode('/', $post_upload['mime_type'])[1]; ?>
							<?php $file_icon =  ($file_type == 'pdf') ? 'fa-file-pdf-o' : 'fa-file-text-o'; ?>
							<a target="_blank" class="file_upload" href="<?php echo $post_upload['url']; ?>"><i class="fa <?php echo $file_icon; ?>"></i><span><?php echo  $file_type; ?></span></a>
						<?php endif; ?>

						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>

								<?php the_post_thumbnail(); // Fullsize image for the single post ?>

						<?php endif; ?>
						<!-- /post thumbnail -->

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
