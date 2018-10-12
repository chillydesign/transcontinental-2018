<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
        <?php $td = get_template_directory_uri(); ?>
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $td; ?>/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $td; ?>/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $td; ?>/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $td; ?>/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $td; ?>/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $td; ?>/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $td; ?>/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $td; ?>/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $td; ?>/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $td; ?>/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $td; ?>/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $td; ?>/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $td; ?>/img/favicon/favicon-16x16.png">

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo $td; ?>/css/justifiedGallery.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $td; ?>/css/slick.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $smp = social_meta_properties(); ?>
    <meta name="description" content="<?php echo $smp->description; ?>">
    <!-- Open Graph -->
    <meta property="og:url" content="<?php echo $smp->url; ?>">
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="Transcontinental" >
    <meta property="og:title" content="<?php echo $smp->title; ?>">
    <meta property="og:description" content="<?php echo $smp->description; ?>">
    <meta property="og:img" content="<?php echo $smp->image; ?>">
    <meta property="og:image" content="<?php echo $smp->image; ?>">
    <meta property="fb:app_id" content="250511685428818" />

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
				<div class="col-md-3"><a class="logo" href="<?php echo home_url(); ?>"><img src="<?php echo $td;?>/img/logo.png" alt="" /></a></div>
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
