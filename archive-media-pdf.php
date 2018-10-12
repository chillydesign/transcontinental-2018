<?php get_header(); ?>


<?php
// FEATURED IMAGE FOR BLOG PAGE
$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_option( 'page_for_posts' )   ), 'full' );
 if ( $src) :  ?>
    <div class="page_image" style="background-image:url('<?php echo $src[0] ; ?>')"></div>
<?php else: ?>
    <div class="page_image" style="background-color:#ddd"></div>
<?php endif; ?>



<div class="container" >

    <section>
        <article>
            <h1>Medias</h1>
        </article>

        <div class="row">

            <!-- section -->
            <!-- <div class="col-sm-9"> -->
            <div class="col-sm-12 medias">
            <?php $args = array( 'post_type' => 'media-pdf', 'posts_per_page' => 30 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
              <a href="<?php echo get_field('pdf')['url']; ?>"" target="_blank"><h2 style="text-transform:uppercase; text-decoration: underline;"><?php the_title(); ?></h2></a>
              <?php the_content(); ?>
            <?php endwhile;?>

                <?php //get_template_part('loop'); ?>

                <?php get_template_part('pagination'); ?>
            </div>

            <?php // get_sidebar(); ?>
        </div> <!-- END OF ROW -->
    </section>
    <!-- /section -->








</div> <!-- END OF CONTAINER -->









<?php get_footer(); ?>
