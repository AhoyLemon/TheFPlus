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
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- Master CSS -->
  <?= css('assets/css/thefplus.css?updated=2022-06-23'); ?>
  <?php snippet('meta') ?>
</head>
<body>
  <?php if($page->isHomePage()) { ?>
  
<!--[if shorty get down good lord]>

    ooooo      ooo   .oooooo.        oooooooooo.   ooooo   .oooooo.      .oooooo.    ooooo ooooooooooooo oooooo   oooo 
    `888b.     `8'  d8P'  `Y8b       `888'   `Y8b  `888'  d8P'  `Y8b    d8P'  `Y8b   `888' 8'   888   `8  `888.   .8'  
    8 `88b.    8  888      888       888      888  888  888           888            888       888        `888. .8'   
    8   `88b.  8  888      888       888      888  888  888           888            888       888         `888.8'    
    8     `88b.8  888      888       888      888  888  888     ooooo 888     ooooo  888       888          `888'     
    8       `888  `88b    d88'       888     d88'  888  `88.    .88'  `88.    .88'   888       888           888      
    o8o        `8   `Y8bood8P'       o888bood8P'   o888o  `Y8bood8P'    `Y8bood8P'   o888o     o888o         o888o     

<![endif]-->
  <?php } ?>
  <?= js('assets/js/vendor/jquery-3.5.1.min.js'); ?>
  <?= js('assets/js/thefplus.min.js?updated=2020-09-11b'); ?>

  <?php snippet('sidebar') ?>