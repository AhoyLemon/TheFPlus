<?xml-stylesheet type="text/xsl" href="<?= $site->url(); ?>/assets/xsl/stan.xsl"?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
  <channel>
    <title>The F Plus</title>
    <link>https://thefpl.us</link>
    <language>en-us</language>
    <copyright>2009 - <?php echo date("Y") ?> Creative Commons CC BY-SA</copyright>
    <description><?php echo $site->description() ?></description>
  
    <image>
      <url>https://thefpl.us/podcasts/feedburner_144.png</url>
      <title>The F Plus</title>
      <link>https://thefpl.us</link>
    </image>
    <itunes:subtitle>Terrible things read with enthusiasm.</itunes:subtitle>	
    <itunes:author>The F Plus</itunes:author>
    <itunes:summary><?php echo $site->description() ?></itunes:summary>
    <itunes:type>episodic</itunes:type>
    <itunes:owner>
      <itunes:name>Lemon</itunes:name>		
      <itunes:email>lemon@thefpl.us</itunes:email>
    </itunes:owner>
    <itunes:category text="Comedy"></itunes:category>
    <itunes:explicit>yes</itunes:explicit>
    <itunes:image href="https://thefpl.us/podcasts/logo4.png" />

    <generator><?php echo c::get('feed.generator', 'Kirby') ?></generator>

    <?php $itemCount = 0; ?>

    <item>
      <?php $itemCount++; ?>
      <title>Garbage Day videos are online</title>
      <link>https://thefpl.us/episode/garbage-day-2019-1</link>
      <guid>https://thefpl.us/episode/garbage-day-2019-1</guid>
      <pubDate>Mon, 27 May 2019 11:33:00 CST</pubDate>
      <enclosure url="https://thefpl.us/podcasts/promo_gd2019-online.mp3" length="702597" type="audio/mpeg"></enclosure>
      <description>
      Call your lawyers, The Garbage Day Records are online. On May 18th of 2019, The F Plus set out to record live for 24 hours straight to raise money for the National Network of Abortion Funds. Missed the live event? We won’t judge you. Visit thefpl.us to catch up on all 24 hours. Theme songs, objectivists, conspiracy theorists, garlicky vaginas, that **** Dave who can’t even **** flip, it’s all been recorded and online, alongside 12 terrific artists trying to draw something to make sense of it all. Stream the hours at your leisure and donate to the charities directly. Because this all seemed like a good idea at the time.
      </description>
      <content:encoded>
        <![CDATA[
                          <p>Call your lawyers, The Garbage Day Records are online.</p><p>On May 18th of 2019, The F Plus set out to record live for 24 hours straight to raise money for the National Network of Abortion Funds.</p><p>Missed the live event? We won’t judge you. Visit thefpl.us to catch up on all 24 hours. Theme songs, objectivists, conspiracy theorists, garlicky vaginas, that **** Dave who can’t even **** flip, it’s all been recorded and online, alongside 12 terrific artists trying to draw something to make sense of it all.</p><p>Stream the hours at your leisure and donate to the charities directly. Because this all seemed like a good idea at the time.</p>          
                      ]]>
      </content:encoded>
      <itunes:summary>Call your lawyers, The Garbage Day Records are online. On May 18th of 2019, The F Plus set out to record live for 24 hours straight to raise money for the National Network of Abortion Funds. Missed the live event? We won’t judge you. Visit thefpl.us to catch up on all 24 hours. Theme songs, objectivists, conspiracy theorists, garlicky vaginas, that **** Dave who can’t even **** flip, it’s all been recorded and online, alongside 12 terrific artists trying to draw something to make sense of it all. Stream the hours at your leisure and donate to the charities directly. Because this all seemed like a good idea at the time.</itunes:summary>
      <itunes:title>Garbage Day videos are online</itunes:title>
      <itunes:episodeType>trailer</itunes:episodeType>
      <itunes:author>The F Plus</itunes:author>
      <itunes:subtitle>Garbage Day 2: Another Another 24 Terrible Hours</itunes:subtitle>
      <itunes:duration>0:00:37</itunes:duration>
      <image>https://thefpl.us/assets/24th/img/albert-square.jpg</image>
      <itunes:image href="https://thefpl.us/assets/24th/img/albert-square.jpg" />
    </item>

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
        $desc = strip_tags($item->text()->kirbytext());
      ?>
      <?php if ($item->episode_file() != "") { ?>
        <?php $itemCount++; ?>
        <item>
          <title><?php echo $item->uid() ?>: <?php echo xml($item->title()) ?></title>
          <link><?php echo xml($item->url()); ?></link>
          <guid><?php echo xml($item->url()); ?></guid>
          <pubDate><?php echo $item->date('D, d M Y') ?> <?php echo $item->time('H:i') ?>:00 CST</pubDate>
          <enclosure url="https://thefpl.us/podcasts/<?php echo $item->episode_file() ?>" length="<?php echo $item->file_size(); ?>000000" type="audio/mpeg"></enclosure>
          <description>
            <?php echo $desc; ?>
          </description>
          <content:encoded>
            <![CDATA[
              <?php if ($item->cast() != ""): ?>
                <p>with:
                  <?php foreach($persons as $person): ?>
                    <a href="https://thefpl.us/meet/<?php $clink = preg_replace('/\s+/', '-', $person); echo strtolower($clink) ?>"><?php echo $person ?></a> &nbsp;
                  <?php endforeach ?>
                </p>
              <?php endif ?>
              <?php if ($item->featured_site() != ""): ?>
                <p>reading: 
                  <?php if ($multisite == true): ?>
                    <?php foreach($fsites as $fsite): ?>
                      <code><?php echo trim($fsite) ?></code> &nbsp;
                    <?php endforeach ?>
                  <?php endif ?>
                  <?php if ($multisite == false): ?>
                    <code><?php echo trim($item->featured_site()) ?></code>
                  <?php endif ?>
                </p>
              <?php endif ?>
              <?php if ($item->provider() != ""): ?>
                <p>
                  Content provided by <?php echo $item->provider(); ?>.
                  <?php if ($item->editor() != ""): ?>
                  <br />Edited by <?php echo $item->editor(); ?>.
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

              <?php if ($item->chapters_toggle() == "yes" && $item->chapters()->isNotEmpty()) { ?>
                <p>
                  <?php if ($item->chapter_provider()->isNotEmpty()) { echo 'Chapters provided by <strong>' . $item->chapter_provider() . '</strong>'; }
                        else { echo 'This episode has chapters'; }
                  ?>
                </p>
              <?php } ?>
            ]]>
          </content:encoded>
          <itunes:summary><?php echo $desc; ?></itunes:summary>
          <itunes:episode><?= $item->uid(); ?></itunes:episode>
          <itunes:title><?= xml($item->title()) ?></itunes:title>
          <?php if (is_numeric($item->uid())) { ?>
            <itunes:episodeType>full</itunes:episodeType>
          <?php } else { ?>
            <itunes:episodeType>bonus</itunes:episodeType>
          <?php } ?>
          
          <itunes:author>The F Plus</itunes:author>
          <?php if ($item->featured_site() != "") { ?>
            <itunes:subtitle>reading <?php echo xml($item->featured_site()) ?></itunes:subtitle>
          <?php } else { ?>
            <itunes:subtitle><?php echo excerpt($item->text()->xml(), 100); ?></itunes:subtitle>
          <?php } ?>

          <itunes:duration><?php echo $item->runtime(); ?></itunes:duration>

          <?php if ($item->cover() != "") { ?>
            <image><?php echo $item->url() ?>/<?php echo $item->cover()->filename() ?></image>
            <itunes:image href="<?= $item->cover()->toFile()->resize(1400)->url(); ?>" />
            <?php /* <itunes:image href="<?php echo $item->url() ?>/<?php echo $item->cover()->filename() ?>" /> */ ?>
          <?php } else if($image = $page->image()) { ?>
            <itunes:image href="<?php echo $item->url() ?>/<?php echo $image->filename() ?>" />
          <?php } ?>
        </item>
      <?php } ?>
    <?php endforeach ?>

</channel>
</rss>