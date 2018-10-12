
<aside id="sidebar_left" class="sidebar   col-sm-3  ">

	<?php if( is_page() ): ?>
		<?php $siblings = get_page_siblings(get_the_ID() ); ?> 
		<div class="sidebar_inner">
			<ul class="siblings">
				<?php
				foreach ($siblings as $sibling) {
					$selected = ( get_the_ID() == $sibling->ID  ) ? 'class="active_page" ' : '';
					echo '<li><a '. $selected . ' href="'. get_permalink($sibling->ID) . '">'  . $sibling->post_title  .'</a></li>';
				}

				?>

			</ul>
		</div>



	<?php else: ?>


		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>

	<?php endif; ?>




</aside>




