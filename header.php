<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    <?php chilly_site_favicons(); ?>
    
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $smp = social_meta_properties(); ?>
    <meta name="description" content="<?php echo $smp->description; ?>">
    <!-- Open Graph -->
    <meta property="og:url" content="<?php echo $smp->url; ?>">
    <meta property="og:type" content="<?php echo $smp->type; ?>" />
    <meta property="og:site_name" content="<?php echo $smp->site_name; ?>" >
    <meta property="og:title" content="<?php echo $smp->title; ?>">
    <meta property="og:description" content="<?php echo $smp->description; ?>">
    <meta property="og:img" content="<?php echo $smp->image; ?>">
    <meta property="og:image" content="<?php echo $smp->image; ?>">
    <meta property="fb:app_id" content="<?php echo $smp->facebook_id; ?>" />
    <!-- TWITTER -->
    <meta name="twitter:card" value="<?php echo $smp->description; ?>">
    <meta name="twitter:title" content="<?php echo $smp->title; ?>">
    <meta name="twitter:description" content="<?php echo $smp->description; ?>">
    <meta name="twitter:image" content="<?php echo $smp->image; ?>">
    <!-- GOOGLE -->
    <meta itemprop="name" content="<?php echo $smp->title; ?>">
    <meta itemprop="description" content="<?php echo $smp->description; ?>">
    <meta itemprop="image" content="<?php echo $smp->image; ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


		<!-- header -->
		<header class="header clear" id="header">
			<div class="container-fluid" >
			<div class="row">
				<div class="col-md-3">
                    <a class="logo" href="<?php echo home_url(); ?>">
                        <?php chilly_site_logo(); ?>
                    </a>
                </div>
				<?php //  bloginfo('name'); ?>
				<div class="col-md-9">
					<nav id="nav" class="nav" role="navigation">
						<a href="#" id="show_nav_button"><span style="position: relative; top: -1px;">&#9776;</span> Menu</a>
						<?php wp_nav_menu(array('theme_location'  => 'header-menu')); ?>
					</nav>
				</div>

			</div>
			</div>
			<?php do_action('icl_language_selector'); ?>





		</header>
		<!-- /header -->
