<?php 
  $desc = $item->text()->excerpt(140);
  $persons = str::split($item->cast(), ',');
  $fsites = str::split($item->featured_site(), ',');
  $songs = str::split($item->music_used(), ',');
  $multisite = false;
  $episodeCover = null;
  if ($item->cover()->isNotEmpty() && $item->cover()->toFile()) {
    $episodeCover = $item->cover()->toFile()->url();
  } else if ($img = $item->images()->first()) {
    $episodeCover = $img->url();
  }
?>

<item>
  <title><?php echo $item->uid() ?>: <?= $item->title()->xml(); ?></title>
  <link><?php echo $item->url(); ?></link>
  <guid><?php echo $item->url(); ?></guid>
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
<?php echo $desc ?>
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
  <itunes:title><?= $item->title() ?></itunes:title>
  <?php if (is_numeric($item->uid())) { ?>
    <itunes:episodeType>full</itunes:episodeType>
  <?php } else { ?>
    <itunes:episodeType>bonus</itunes:episodeType>
  <?php } ?>
  
  <itunes:author>The F Plus</itunes:author>
  <?php if ($item->featured_site() != "") { ?>
    <itunes:subtitle>reading <?php echo $item->featured_site(); ?></itunes:subtitle>
  <?php } else if ($item->text()->isNotEmpty()) { ?>
    <itunes:subtitle><?php echo $item->text()->excerpt(100); ?></itunes:subtitle>
  <?php } ?>

  <itunes:duration><?php echo $item->runtime(); ?></itunes:duration>

<?php if ($episodeCover) { ?>
  <image><?= $episodeCover; ?></image>
  <itunes:image href="<?= $episodeCover; ?>" />
<?php } ?>

</item>