<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo excerpt($page->text()->xml(), 150) ?>">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png?v=062615">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png?v=062615">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png?v=062615">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png?v=062615">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png?v=062615">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png?v=062615">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png?v=062615">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png?v=062615">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png?v=062615">
	<link rel="icon" type="image/png" href="/favicon-32x32.png?v=062615" sizes="32x32">
	<link rel="icon" type="image/png" href="/android-chrome-192x192.png?v=062615" sizes="192x192">
	<link rel="icon" type="image/png" href="/favicon-96x96.png?v=062615" sizes="96x96">
	<link rel="icon" type="image/png" href="/favicon-16x16.png?v=062615" sizes="16x16">
	<link rel="manifest" href="/manifest.json?v=062615">
	<link rel="shortcut icon" href="/favicon.ico?v=062615">
	<meta name="apple-mobile-web-app-title" content="The F Plus">
	<meta name="application-name" content="The F Plus">
	<meta name="msapplication-TileColor" content="#c0282d">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png?v=062615">
	<meta name="theme-color" content="#c0282d">
  <!-- Flattr -->
  <link rel="payment" href="https://flattr.com/submit/auto?user_id=TheFPlus&url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title());?>" type="text/html" />
  
  
  <!-- Twitter -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@TheFPlus" />
  <meta name="twitter:creator" content="@AhoyLemon">
  <meta name="twitter:title" content="<?php echo $page->title(); ?>" />
  <meta name="twitter:description" content="<?php echo excerpt($page->text()->xml(), 180) ?>" />
  <?php if($image = $page->image()): ?>
    <meta name="twitter:image" content="<?php echo $page->url(); ?>/<?php echo $image->filename(); ?>" />
  <?php endif ?>
	<?php if(!$image = $page->image()): ?>
		<meta name="twitter:image" content="https://thefpl.us/assets/images/twitter-newcard.png" />
	<?php endif ?>
  <meta name="twitter:url" content="<?php echo $page->url() ;?>" />
  <!-- Facebook -->
  <meta property="og:title" content="<?php echo $page->title(); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $page->url() ;?>">
  <?php if($image = $page->image()): ?>
    <meta name="og:image" content="<?php echo $page->url(); ?>/<?php echo $image->filename(); ?>" />
  <?php endif ?>
	<?php if(!$image = $page->image()): ?>
		<meta name="og:image" content="https://thefpl.us/assets/images/og-image.png" />
	<?php endif ?>
  <meta property="og:description" content="<?php echo excerpt($page->text()->xml(), 200) ?>">
  <meta property="og:email" content="lemon@thefpl.us">
  
  <!-- Font -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <link href="/assets/css/thefplus.css?=09.16.15" rel="stylesheet" type="text/css">

</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <?php snippet('mobile-menu') ?>
  <?php snippet('menu') ?>