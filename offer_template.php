<div class="offre">
    <?php $offre_time = get_field('offer_end'); ?>
    <?php if ($offre_time) : ?>
        <?php $offre_number_time = strtotime($offre_time); ?>
        <?php $time = time(); ?>
        <?php $diff = $offre_number_time - $time; ?>
        <?php if ($diff < 0) : ?>
            <div class="offer_label expired_offer_label">offre expirée</div>
        <?php else : ?>
            <div class="offer_label">jusqu'au <?php echo date('d.m.Y', $offre_number_time); ?></div>
        <?php endif; ?>
    <?php else : ?>
        <div class="offer_label label_invisible">&nbsp;</div>
    <?php endif; ?>
    <div style="clear:both;"></div>
    <?php $offre_img = thumbnail_of_post_url(get_the_ID(), 'medium');  ?>
    <div class="offre_img" style="background-image:url(<?php echo $offre_img; ?>)">

        <h3 class="white_title"><?php echo get_field('white_title'); ?></h3>
    </div>
    <div class="offre_content">
        <div class="allbutlink">
            <h3 class="black_title"><?php echo get_field('black_title'); ?></h3>
            <div class="excerpt">
                <?php $extract = get_field('extract'); ?>
                <?php if ($extract) : ?>
                    <p><?php echo $extract; ?></p>
                <?php else : ?>
                    <?php
                    $content = str_replace('! ', '. ', get_field('content'));
                    $content = str_replace('</h2>', '. ', $content);
                    $content = strip_tags($content);
                    $content = '<p>' . strip_tags($content) . '</p>';
                    $dot = ".";

                    $position = stripos($content, $dot); //find first dot position

                    if ($position) { //if there's a dot in our source text do
                        $offset = $position + 1; //prepare offset
                        $position2 = stripos($content, $dot, $offset); //find second dot using offset
                        $first_two = substr($content, 0, $position2); //put two first sentences under $first_two

                        echo $first_two . '.'; //add a dot
                    } else {  //if there are no dots
                        //do nothing
                    }
                    ?>
                <?php endif; ?>
            </div>

        </div>
        <a class="readmore" href="<?php the_permalink(); ?>">
            <h6>afficher l'offre</h6>
        </a>
    </div>
</div>