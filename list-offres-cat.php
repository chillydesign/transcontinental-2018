<?php
$taxonomy     = 'offre_cat';
$orderby      = 'name';
$show_count   = false;
$pad_counts   = false;
$hierarchical = true;
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title
);
?>

<div class="category_menu">
  <div class="container">
    <ul>
      <li <?php if( $_SERVER['REQUEST_URI'] == '/transcontinental/offre/'){echo 'class="current_cat"';} ?>
><a href="<?php echo get_home_url(); ?>/offre">Toutes nos offres</a></li>
        <?php wp_list_categories( $args ); ?>
    </ul>
  </div>

</div>
