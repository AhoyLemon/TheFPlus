<?php
// site/snippets/rss.php
// General RSS feed snippet for Kirby
if (!headers_sent()) {
  header('Content-Type: text/xml; charset=utf-8');
}
echo '<?xml version="1.0" encoding="utf-8"?>';
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
      <item>
        <title><?= $item->slug() ?>: <?= $item->title()->xml(); ?></title>
        <link><?=  $item->url(); ?></link>
        <guid><?= $item->url();  ?></guid>
        <pubDate><?= $item->date('D, d M Y') ?> <?= $item->time('H:i') ?>:00 CST</pubDate>
        <description>
          <?= $item->text()->xml(); ?>
        </description>
        <enclosure url="https://thefpl.us/podcasts/<?php echo $item->episode_file() ?>" length="<?php echo $item->file_size(); ?>000000" type="audio/mpeg"></enclosure>
        <content:encoded>
          <![CDATA[
            <?= $item->text()->kirbytext(); ?>
          ]]>
        </content:encoded>
        <itunes:author>The F Plus</itunes:author>
        <itunes:subtitle>with <?= $item->cast()->xml() ?></itunes:subtitle>
        <itunes:duration><?= $item->runtime()->xml() ?></itunes:duration>
        <itunes:summary><?= $item->text()->truncate(140,"...")->xml() ?></itunes:summary>
        
        <?php if ($item->cover() != "") { ?>
          <itunes:image href="<?php echo $item->url() ?>/<?php echo $item->cover()->filename() ?>" />
        <?php } else if($image = $page->image()) { ?>
          <itunes:image href="<?php echo $item->url() ?>/<?php echo $image->filename() ?>" />
        <?php } ?>

      </item>
    <?php endforeach ?>
  </channel>
</rss>
