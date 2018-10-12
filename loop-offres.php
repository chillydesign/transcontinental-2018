<?php
$today = current_time('Ymd');
$term = get_queried_object();
$cat = $term->slug;
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$offres_arg = array(
		'post_type' => 'offre',
		// "posts_per_page" => 1,
		// 'meta_query'             => array(
	  //       array(
	  //           'key'       => 'offer_end',
	  //           'value'     => $today,
	  //           'compare'   => '>',
	  //           'type'      => 'CHAR',
	  //       ),
	  //  ),
		'taxonomy' => 'offre_cat',
		'term' => $cat,
		'paged' => $paged,
		'meta_key'	=> 'offer_end',
		'orderby' => 'meta_value',
		"order"  => "DESC"
	);
 ?>
<?php $offres_loop = new WP_Query( $offres_arg ); ?>


<?php if ( $offres_loop -> have_posts() ) : ?>
<div class="offers_slider_container">
	<div id="offers_slider">
		<?php while ( $offres_loop -> have_posts() ) :
			$offres_loop -> the_post(); ?>
			<?php $cats= get_the_terms(get_the_ID(), 'category'); ?>
			<?php $cat_slugs = array_map(function($cat){
				return '"' . $cat->slug . '"';
			}, $cats ); ?>

			<div class="offre" data-groups='[<?php echo implode(', ' , $cat_slugs); ?>]'>
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


<?php if ( $offres_loop->max_num_pages  > 1) : ?>
<div class="pagination">
<?php  echo paginate_links(array(
		'base' => str_replace(9999, '%#%', get_pagenum_link(9999)),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $offres_loop->max_num_pages
));?>
</div>
<?php endif; ?>

<?php wp_reset_query(); ?>
