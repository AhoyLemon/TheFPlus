<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
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
  <link rel="manifest" href="<?= $site->url(); ?>/manifest.json">
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
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC:300,400,700" rel="stylesheet">
  <!-- Master CSS -->
  <?= css('assets/css/thefplus.css?updated=2019-03-14'); ?>

</head>
<body>
  <?php if($page->isHomePage()): ?>
  
<!--
                                                                                                                                                           
ooooo      ooo   .oooooo.        oooooooooo.   ooooo   .oooooo.      .oooooo.    ooooo ooooooooooooo oooooo   oooo 
`888b.     `8'  d8P'  `Y8b       `888'   `Y8b  `888'  d8P'  `Y8b    d8P'  `Y8b   `888' 8'   888   `8  `888.   .8'  
 8 `88b.    8  888      888       888      888  888  888           888            888       888        `888. .8'   
 8   `88b.  8  888      888       888      888  888  888           888            888       888         `888.8'    
 8     `88b.8  888      888       888      888  888  888     ooooo 888     ooooo  888       888          `888'     
 8       `888  `88b    d88'       888     d88'  888  `88.    .88'  `88.    .88'   888       888           888      
o8o        `8   `Y8bood8P'       o888bood8P'   o888o  `Y8bood8P'    `Y8bood8P'   o888o     o888o         o888o     

  -->  


  
  <?php endif; ?>

  <?= js('assets/js/vendor/jquery-3.3.1.min.js'); ?>

  <?php snippet('sidebar') ?>