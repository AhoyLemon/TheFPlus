<?php 

  if ($page->description()->isNotEmpty()) {
    $description = $page->description();
  } else if ($page->text()->isNotEmpty()) {
    $description = $page->text()->excerpt(150,true,'...');
  } else {
    $description = $site->description();
  }

  $pageTitle = $page->title()->isNotEmpty() ? $page->title() : $site->title();
  $canonicalURL = $page->url();
  $siteEmail = $site->email()->isNotEmpty() ? $site->email() : "";

  $lastUpdated = "";
  if ($page->template() == "home") { 
    $lastUpdated = $site->grandChildren()->listed()->sortBy('date', 'desc')->first()->date('Y-m-d');
  } else if ( in_array($page->template(), ['episodes', 'blogs', 'other-projects', 'guesses'] )) {
    $lastUpdated = $page->children()->listed()->sortBy('date', 'desc')->first()->date('Y-m-d');
  } else if ( in_array($page->template(), ['hopper', 'dump'] )) {
    $lastUpdated = $page->builder()->toStructure()->sortBy('subdate', 'desc')->first()->subdate();
  } else if ($page->template() == "stickers") { 
    $lastUpdated = $page->stickers()->toStructure()->sortBy('series_num', 'desc')->first()->released();
  } else {
    $lastUpdated = $page->modified('Y-m-d@H:i:s');
  }

  $ogImageURL = "";
  $ogImageWidth = "";
  $ogImageHeight = "";
  if ($page->og_image()->isNotEmpty() && $page->og_image()->toFile()) {
    $ogImageURL = $page->url() . '/' . $page->og_image()->filename();
    $ogImageWidth = $page->og_image()->toFile()->width();
    $ogImageHeight = $page->og_image()->toFile()->height();
  } else if ($page->cover()->isNotEmpty() && $page->cover()->toFile()) {
    $ogImageURL = $page->url() . '/' . $page->cover()->filename();
    $ogImageWidth = $page->cover()->toFile()->width();
    $ogImageHeight = $page->cover()->toFile()->height();
  } else {
    $ogImageURL = $site->og_image()->toFile()->url();
    $ogImageWidth = $site->og_image()->toFile()->width();
    $ogImageHeight = $site->og_image()->toFile()->height();
  }
?>

<meta name="description" content="<?= $description; ?>">
<meta http-equiv="last-modified" content="<?= $lastUpdated ?>" />
<link rel="canonical" href="<?= $canonicalURL; ?>" />

<?php /***** OPEN GRAPH *****/ ?>
<meta property="og:site_name" content="<?= $site->title(); ?>" />
<meta property="og:title" content="<?= $pageTitle; ?>" />
<meta property="og:url" content="<?= $canonicalURL; ?>" />
<meta property="og:image" content="<?= $ogImageURL; ?>" />
<meta property="og:image:width" content="<?= $ogImageWidth; ?>" />
<meta property="og:image:height" content="<?= $ogImageHeight; ?>" />
<meta property="og:description" content="<?= $description; ?>" />
<meta property="og:email" content="<?= $siteEmail; ?>">

<?php /***** TWITTER *****/ ?>
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@TheFPlus" />
<meta name="twitter:creator" content="@AhoyLemon" />
<meta name="twitter:title" content="<?= $pageTitle; ?>" />
<meta name="twitter:description" content="<?= $description; ?>" />
<meta name="twitter:image" content="<?= $ogImageURL; ?>" />
<meta name="twitter:url" content="<?= $canonicalURL;?>" />

<?php snippet('favicons') ?>