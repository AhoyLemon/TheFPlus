<?php
  // send the right header
  header('Content-type: text/xml; charset="utf-8"');
?>
<?xml version="1.0" encoding="utf-8"?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
  <channel>
    <title><?php echo $page->parent()->title(); ?></title>
    <link><?php echo $page->parent()->url(); ?></link>
    <language>en-us</language>
    <copyright>2016 Creative Commons CC BY-SA</copyright>
    <description><?php echo $page->parent()->text() ?></description>
  
    <image>
      <url>https://thefpl.us/podcasts/guess_144.png</url>
      <title><?php echo $page->parent()->title(); ?></title>
      <link><?php echo $page->parent()->url(); ?></link>
    </image>
    <itunes:subtitle><?php echo $page->parent()->url(); ?></itunes:subtitle>	
    <itunes:author>The F Plus</itunes:author>
    <itunes:summary><?php echo $page->parent()->text(); ?></itunes:summary>
    <itunes:owner>
      <itunes:name>Lemon</itunes:name>		
      <itunes:email>lemon@thefpl.us</itunes:email>
    </itunes:owner>
    <itunes:category text="Comedy"></itunes:category>
    <itunes:category text="Education"></itunes:category>
    <itunes:explicit>yes</itunes:explicit>
    <itunes:image href="https://thefpl.us/podcasts/guess_1400.png"></itunes:image>

    <generator><?php echo c::get('feed.generator', 'Kirby') ?></generator>

    <?php foreach($page->siblings()->visible() as $item): ?>
      <?php 
        $persons = explode(",", $item->cast());
        $desc = strip_tags($item->text()->kirbytext());
      ?>
      <item>
        <title><?php echo $item->slug() ?>: <?php echo xml($item->title()) ?></title>
        <link><?php echo xml($item->url()) ?></link>
        <guid><?php echo xml($item->url()) ?></guid>
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