<?php
// site/templates/rss.php
// General RSS feed template for Kirby

header('Content-type: application/rss+xml; charset="utf-8"');
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<rss version="2.0">
  <channel>
    <title><?= $feedTitle ?></title>
    <link><?= $feedLink ?></link>
    <lastBuildDate><?= date(DATE_RSS) ?></lastBuildDate>
    <description><?= $feedDescription ?></description>
    <?php foreach ($episodes as $episode): ?>
      <?php snippet('rss-item', ['episode' => $episode]) ?>
    <?php endforeach ?>
  </channel>
</rss>
