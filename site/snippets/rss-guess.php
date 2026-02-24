<?php
// site/snippets/rss.php
// General RSS feed snippet for Kirby
if (!headers_sent()) {
  header('Content-Type: text/xml; charset=utf-8');
}
echo '<?xml version="1.0" encoding="utf-8"?>';
// echo '<?xml-stylesheet type="text/xsl" href="/assets/xsl/stan.xsl"?>';
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
        <title><?php echo $item->slug() ?>: <?php echo xml($item->title()) ?></title>
        <link><?=  $item->url(); ?></link>
        <guid><?= $item->url();  ?></guid>
        <pubDate><?php echo $item->date('D, d M Y') ?> <?php echo $item->time('H:i') ?>:00 CST</pubDate>
        <description>
          <?php echo $desc; ?>
        </description>
        <enclosure url="https://thefpl.us/podcasts/<?php echo $item->episode_file() ?>" length="<?php echo $item->file_size(); ?>000000" type="audio/mpeg"></enclosure>
        <content:encoded>
          <![CDATA[
            <?php echo $item->text()->kirbytext(); ?>
          ]]>
        </content:encoded>
        <itunes:author>The F Plus</itunes:author>
        <itunes:subtitle>with <?php echo xml($item->cast()) ?></itunes:subtitle>
        <itunes:duration><?php echo $item->runtime(); ?></itunes:duration>
        <itunes:summary><?php echo xml($desc); ?></itunes:summary>
        
        <?php if ($item->cover() != "") { ?>
          <itunes:image href="<?php echo $item->url() ?>/<?php echo $item->cover()->filename() ?>" />
        <?php } else if($image = $page->image()) { ?>
          <itunes:image href="<?php echo $item->url() ?>/<?php echo $image->filename() ?>" />
        <?php } ?>

      </item>
    <?php endforeach ?>
  </channel>
</rss>
