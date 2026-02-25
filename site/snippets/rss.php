<?php
// site/snippets/rss.php
// General RSS feed snippet for Kirby
if (!headers_sent()) {
  header('Content-Type: text/xml; charset=utf-8');
}
echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<?xml-stylesheet type="text/xsl" href="/assets/xsl/stan.xsl"?>';
?>
<rss 
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
  xmlns:atom="http://www.w3.org/2005/Atom"
  xmlns:podcast="https://podcastindex.org/namespace/1.0"
  version="2.0"
>
  <channel>
    <title><?= $feedTitle ?></title>
    <link><?= $feedLink ?></link>
    <lastBuildDate><?= date(DATE_RSS) ?></lastBuildDate>
    <description><?= $feedDescription ?></description>
    <?php foreach ($episodes as $item): ?>
      <?php snippet('rss-item', ['item' => $item, 'image'] ) ?>
    <?php endforeach ?>
  </channel>
</rss>
