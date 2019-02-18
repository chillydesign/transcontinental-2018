<?php $i = 1; ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="position:relative; border: 0!important; margin-bottom: 50px!important; box-shadow: 0 0 19px 3px rgba(0,0,0,0.1);">


		<div class="row">

			<div class="col-sm-9 <?php if($i%2 == 0){echo 'col-sm-push-3';} ?>">
				<!-- post title -->
				<h2 style="font-size:2em; text-transform:uppercase; margin-bottom:0;">
					<a style="border:0; text-decoration: none;" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<!-- /post title -->

				<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

			</div>
			<div class="col-sm-3 hidden-xs <?php if($i%2 == 0){echo 'col-sm-pull-9';} ?> file_gallery news_file_gallery" style="position: absolute; top: 0;  height: 100%; <?php if($i%2 == 0){ echo 'left:0;';} else {echo 'right:0;';} ?>
			<?php if ( has_post_thumbnail()) { ?>
				 background-image:url(' <?php echo thumbnail_of_post_url(get_the_ID(), 'large'); ?>'); background-size : cover; background-position: center; background-repeat:no-repeat;
				 <?php } else { ?>
					 background-image:url(' <?php echo get_template_directory_uri(); ?>/img/transco-news.png'); background-size : auto 100%; background-repeat:no-repeat; background-position:right;
					 <?php } ?>">
			</div>

		</div>






		<?php if( is_single()  && false ): ?>
			<p class="meta">
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?>. </span>
				<span class="posts_category"><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?>
					<!-- /post details -->
				</p>

			<?php endif; ?>




		</article>
		<!-- /article -->

	<?php $i++; ?>
	<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
