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
    <itunes:owner>
      <itunes:name>Lemon</itunes:name>		
      <itunes:email>lemon@thefpl.us</itunes:email>
    </itunes:owner>
    <itunes:category text="Comedy"></itunes:category>
    <itunes:explicit>yes</itunes:explicit>
    <itunes:image href="https://thefpl.us/podcasts/logo4.png" />

    <generator><?php echo c::get('feed.generator', 'Kirby') ?></generator>

    <?php $itemCount = 0; ?>

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
<?php if ($itemCount < 50) { ?>
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
            ]]>
          </content:encoded>
          <itunes:summary><?php echo $desc; ?></itunes:summary>
<?php } else { ?>
          <description>
            Show notes at <?php echo xml($item->url()); ?>
          </description>
          <content:encoded>
            <![CDATA[
              <p>Show notes available in the <a href="<?php echo xml($item->url()); ?>">episode page</p>
            ]]>
          </content:encoded>
<?php } ?>
          
          <itunes:author>The F Plus</itunes:author>
          <?php if ($item->featured_site() != "") { ?>
            <itunes:subtitle>reading <?php echo xml($item->featured_site()) ?></itunes:subtitle>
          <?php } else { ?>
            <itunes:subtitle><?php echo excerpt($item->text()->xml(), 100); ?></itunes:subtitle>
          <?php } ?>

          <itunes:duration><?php echo $item->runtime(); ?></itunes:duration>

          <?php if ($item->cover() != "") { ?>
            <itunes:image href="<?php echo $item->url() ?>/<?php echo $item->cover()->filename() ?>" />
          <?php } else if($image = $page->image()) { ?>
            <itunes:image href="<?php echo $item->url() ?>/<?php echo $image->filename() ?>" />
          <?php } ?>
        </item>
      <?php } ?>
    <?php endforeach ?>

</channel>
</rss>