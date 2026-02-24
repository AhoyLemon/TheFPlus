<?php 
  $desc = $item->text()->excerpt(140)->xml();
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

  $multisite = false;
  if (count($fsites) > 1) {
    $multisite = true;
  }
?>

    <item>
      <title><?php echo $item->uid() ?>: <?= $item->title()->xml(); ?></title>
      <link><?php echo $item->url(); ?></link>
      <pubDate><?php echo $item->date()->toDate("D, d M Y") ?> <?php echo $item->time()->toDate("H:i"); ?> CST</pubDate>
      <enclosure url="https://thefpl.us/podcasts/<?php echo $item->episode_file() ?>" length="<?php echo $item->file_size(); ?>000000" type="audio/mpeg"></enclosure>
      <description><?= $desc; ?></description>
      <content:encoded>
<![CDATA[
      <?php 
        // CAST-------------------------------------
        if ($item->cast()->isNotEmpty()) {
          echo "<p>with: ";
          foreach($persons as $person) {
            echo '<a href="https://thefpl.us/meet/' . strtolower(preg_replace('/\s+/', '-', $person)) . '">' . $person . '</a> &nbsp;';
          }
          echo "</p>";
        }
    echo '
      ';
        // FEATURED SITE(S) -------------------------------------
        if ($item->featured_site()->isNotEmpty()) {
          echo "<p>reading: ";
          foreach($fsites as $fsite) {
            echo '<code>' . trim($fsite) . '</code> ';
          }
          echo "</p>";
        }
    echo '
      ';
        // PROVIDER(S) ----------------------------------
        if ($item->provider()->isNotEmpty()) {
          echo "<p>Content provided by " . $item->provider() . ".";
          if ($item->editor()->isNotEmpty()) {
            echo "<br />
        Edited by " . $item->editor() . ".";
          }
          echo "</p>";
        }
    echo '
      ';
        // MUSIC USED ----------------------------------
        if ($item->music_used()->isNotEmpty()) {
          echo '<p>Music used:</p> ';
          echo '<ol>';
          foreach($songs as $song) {
            echo '<li>' . trim($song) . '</li>';
          }
          echo '</ol>';
        }
    echo '
      ';
        // CHAPTERS ----------------------------------
      if ($item->chapters_toggle() == "yes" && $item->chapters()->isNotEmpty()) {
        echo '<p>';
        if ($item->chapter_provider()->isNotEmpty()) { echo 'Chapters provided by <strong>' . $item->chapter_provider() . '</strong>'; }
              else { echo 'This episode has chapters'; }
        echo '</p>';
      }
    ?>

]]>
    </content:encoded>
    <itunes:summary><?php echo $desc; ?></itunes:summary>
    <itunes:episode><?= $item->uid(); ?></itunes:episode>
    <itunes:title><?= $item->title()->xml(); ?></itunes:title>
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