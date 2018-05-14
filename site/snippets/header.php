<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <?php if($page->isHomePage()): ?>
  
  
  
<!--
                                                                                                                                                           
b.             8     ,o888888o.               8 888888888o.       8 8888     ,o888888o.        ,o888888o.     8 8888 8888888 8888888888 `8.`8888.      ,8' 
888o.          8  . 8888     `88.             8 8888    `^888.    8 8888    8888     `88.     8888     `88.   8 8888       8 8888        `8.`8888.    ,8'  
Y88888o.       8 ,8 8888       `8b            8 8888        `88.  8 8888 ,8 8888       `8. ,8 8888       `8.  8 8888       8 8888         `8.`8888.  ,8'   
.`Y888888o.    8 88 8888        `8b           8 8888         `88  8 8888 88 8888           88 8888            8 8888       8 8888          `8.`8888.,8'    
8o. `Y888888o. 8 88 8888         88           8 8888          88  8 8888 88 8888           88 8888            8 8888       8 8888           `8.`88888'     
8`Y8o. `Y88888o8 88 8888         88           8 8888          88  8 8888 88 8888           88 8888            8 8888       8 8888            `8. 8888      
8   `Y8o. `Y8888 88 8888        ,8P           8 8888         ,88  8 8888 88 8888   8888888 88 8888   8888888  8 8888       8 8888             `8 8888      
8      `Y8o. `Y8 `8 8888       ,8P            8 8888        ,88'  8 8888 `8 8888       .8' `8 8888       .8'  8 8888       8 8888              8 8888      
8         `Y8o.`  ` 8888     ,88'             8 8888    ,o88P'    8 8888    8888     ,88'     8888     ,88'   8 8888       8 8888              8 8888      
8            `Yo     `8888888P'               8 888888888P'       8 8888     `8888888P'        `8888888P'     8 8888       8 8888              8 8888      
  -->  
  
  <?php endif; ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <?php if ($page->isHomePage()) { ?>
    <title>The F Plus: Terrible Things Read With Enthusiasm</title>
  <?php } else { ?>
    <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <?php } ?>
  <meta name="description" content="<?php echo excerpt($page->text()->xml(), 150) ?>">
  <!-- Favicons -->  
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#c0282d">
  <meta name="apple-mobile-web-app-title" content="The F Plus">
  <meta name="application-name" content="The F Plus">
  <meta name="msapplication-TileColor" content="#c0282d">
  <meta name="msapplication-TileImage" content="/mstile-144x144.png">
  <meta name="theme-color" content="#c0282d">
  
  <!-- Twitter -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@TheFPlus" />
  <meta name="twitter:creator" content="@AhoyLemon">
  <meta name="twitter:title" content="<?php echo $page->title(); ?>" />
  <meta name="twitter:description" content="<?php echo excerpt($page->text()->xml(), 180) ?>" />
  <?php if ($page->cover() != "") { ?>
    <meta name="twitter:image" content="<?php echo $page->url(); ?>/<?php echo $page->cover()->filename(); ?>" />
  <?php } else if($image = $page->image()) { ?>
    <meta name="twitter:image" content="<?php echo $page->url(); ?>/<?php echo $image->filename(); ?>" />
  <?php } else { ?>
    <meta name="twitter:image" content="https://thefpl.us/assets/images/og-image.png" />
	<?php } ?>
  <meta name="twitter:url" content="<?php echo $page->url() ;?>" />
  <!-- OpenGraph  -->
  <meta property="og:site_name" content="<?php echo $site->title(); ?>" />
  <meta property="og:title" content="<?php echo $page->title(); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $page->url() ;?>">
  <?php if ($page->cover() != "") { ?>
    <meta property="og:image" content="<?php echo $page->url(); ?>/<?php echo $page->cover()->filename(); ?>" />
    <meta property="og:image:width" content="<?php echo $page->cover()->toFile()->width(); ?>" />
    <meta property="og:image:height" content="<?php echo $page->cover()->toFile()->height(); ?>" />
  <?php } else if($image = $page->image()) { ?>
    <meta property="og:image" content="<?php echo $page->url(); ?>/<?php echo $image->filename(); ?>" />
  <?php } else { ?>
    <meta property="og:image" content="https://thefpl.us/assets/images/og-image.png" />
	<?php } ?>
  <meta property="og:description" content="<?php echo excerpt($page->text()->xml(), 200) ?>">
  <meta property="og:email" content="lemon@thefpl.us">
  
  <!-- Font -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,300italic,600italic' rel='stylesheet' type='text/css'>
  <!-- Master CSS -->
  <?= css('assets/css/thefplus.css?lastUpdated=05.01.2018'); ?>

</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <?php snippet('svg') ?>
  <?php snippet('mobile-menu') ?>
  <?php snippet('menu') ?>