<?php $is_home = is_front_page() ; ?>
<?php $posts_count = ( $is_home  ) ?  -1 : 1 ?>
<?php $posts_orderby = ( $is_home  ) ?  'date' : 'rand' ?>
<?php $slides_loop = new WP_Query(array(
	'post_type' => 'slide',  
	'posts_per_page' => $posts_count
	,'order' => 'DESC'
	,'orderby' =>  $posts_orderby
)); ?>



<?php if ($slides_loop->have_posts() ) : ?>





<div class="top_slideshow slideshow"><ul>
	<?php while($slides_loop->have_posts()) : $slides_loop->the_post(); ?>
			<?php $quotation_text =  get_field('quotation_text'); ?>
			<?php $latlon =  get_field('lat_lon'); ?>
		<li data-latlon="<?php echo $latlon; ?>" class="slide" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>'); ">

		<?php if ($is_home) : ?>

			<?php if (isset($quotation_text)): ?>
			<blockquote><?php echo $quotation_text; ?>
			<cite><?php echo get_field('quotation_author'); ?></cite>
			</blockquote>

<?php if ( $latlon != '' ) : ?>
			<div  class="map_location" >
				<span class="location_name"><?php echo get_field('location_name'); ?></span>
				<span class="lat_lon"><?php echo $latlon ?></span>
			</div>
<?php endif; ?>
			<?php endif; ?>

		<?php endif; ?>

		</li>
		

	<?php endwhile; ?>
</ul></div> <!-- END OF SLIDESHOW -->
<input type="hidden" name="lat_lon"  id="lat_lon" value="" />
<?php endif; ?>


<?php if (false) : ?>
	<?php while($slides_loop->have_posts()) : $slides_loop->the_post(); ?>
<div style="margin-top:-80px;height:400px;width:100%;background-size:cover;background-position:center center;background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>'); "></div>
	<?php endwhile; ?>
<?php endif; ?>





<?php wp_reset_query(); ?>