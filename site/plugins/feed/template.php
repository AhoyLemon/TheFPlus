<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
  <channel>
    <title>The F Plus</title>
    <link>http://thefpl.us</link>
    <language>en-us</language>
    <copyright>2009 - <?php echo date("Y") ?> Creative Commons</copyright>
    <description>The F Plus is a weekly podcast wherein we find terrible writing from the internet and beyond, wrap a theme around it, and then bring it to you in the most entertaining way we can.</description>
    <image>
      <url>http://thefpl.us/podcasts/feedburner_144.png</url>
      <title>The F Plus</title>
      <link>http://thefpl.us</link>
    </image>
    <itunes:subtitle>Terrible things read with enthusiasm.</itunes:subtitle>	
    <itunes:author>The F Plus</itunes:author>
    <itunes:summary>The F Plus is a weekly podcast wherein we find terrible writing from the internet and beyond, wrap a theme around it, and then bring it to you in the most entertaining way we can.</itunes:summary>
    <itunes:owner>
      <itunes:name>Lemon</itunes:name>		
      <itunes:email>lemon@thefpl.us</itunes:email>
    </itunes:owner>
    <itunes:category text="Comedy"></itunes:category>
    <itunes:explicit>yes</itunes:explicit>
    <itunes:image href="http://thefpl.us/podcasts/logo3.png" />

    <generator><?php echo c::get('feed.generator', 'Kirby') ?></generator>

    <?php foreach($items as $item): ?>
      <?php 
        if (strpos($item->featured_site(),',') !== false) {
          $multisite = true;
          $fsites = explode(",", $item->featured_site()); 
        } else if ($item->featured_site() != '') {
          $multisite = false;
        }
        $songs = explode(",", $item->music_used());
        $persons = explode(",", $item->cast());
      ?>
      <item>
        <title><?php echo $item->uid() ?>: <?php echo xml($item->title()) ?></title>
        <link><?php echo xml($item->url()) ?></link>
        <guid><?php echo xml($item->url()) ?></guid>
        <pubDate><?php echo $item->date('D, d M Y') ?> <?php echo $item->time('H:i') ?>:00 CST</pubDate>
        <description><?php echo $item->text()->xml() ?></description>
        <enclosure url="<?php echo $item->episode_file() ?>" length="<?php echo $item->file_size(); ?>000000" type="audio/mpeg"></enclosure>
        <content:encoded>
          <![CDATA[
            <?php if ($item->cast() != ""): ?>
              <p>with:
                <?php foreach($persons as $person): ?>
                  <a href="http://thefpl.us/meet/<?php $clink = preg_replace('/\s+/', '-', $person); echo strtolower($clink) ?>"><?php echo $person ?></a> &nbsp;
                <?php endforeach ?>
              </p>
            <?php endif ?>
            <?php if ($item->featured_site() != ""): ?>
              <p>reading: 
                <?php if ($multisite == true): ?>
                  <?php foreach($fsites as $fsite): ?>
                    <b><?php echo trim($fsite) ?></b> &nbsp;
                  <?php endforeach ?>
                <?php endif ?>
                <?php if ($multisite == false): ?>
                  <b><?php echo trim($item->featured_site()) ?></b>
                <?php endif ?>
              </p>
            <?php endif ?>
            <?php echo $item->{$textfield}()->kirbytext() ?>
            <?php if ($item->music_used() != ""): ?>
              <p>Music used:</p>
              <ol>
                <?php foreach($songs as $song): ?>
                  <li><?php echo trim($song) ?></li>
                <?php endforeach ?>
              </ol>
            <?php endif ?>
          ]]>
        </content:encoded>
        <itunes:author>The F Plus</itunes:author>
        <itunes:subtitle>reading <?php echo xml($item->featured_site()) ?></itunes:subtitle>
        <itunes:duration><?php echo $item->runtime(); ?></itunes:duration>
        <itunes:summary><?php echo $item->text()->xml() ?></itunes:summary>
        <?php if($image = $item->image()): ?>
          <itunes:image href="<?php echo $item->url() ?>/<?php echo $image->filename() ?>" />
        <?php endif ?>
        <atom:link rel="payment" type="text/html" href="https://flattr.com/submit/auto?user_id=TheFPlus&amp;url=<?php echo rawurlencode ($item->url()); ?>&amp;title=<?php echo rawurlencode($item->title()); ?>"/>
      </item>
    <?php endforeach ?>

</channel>
</rss>