<?php foreach ($fanartArray as $fanart): ?>

  <?php 
  $thisArtist = $fanart->artist();
  $mlink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $fanart->artist()))); 
  if ($site->find($mlink)) { 
    $artistPage = url::home() . '/' . $mlink;
  } else {
    $artistPage = null;
  }

  $fanartThumbnail = $fanart->crop(320)->url();
  $fanartFull = $fanart->url();
  if ($fanart->episode()->isNotEmpty() && $site->find('episode/'. $fanart->episode())) {
    $episodeExists = true;
    $episodeTitle = $site->find('episode/'.$fanart->episode())->title();
    $episodeURL = $site->find('episode/'.$fanart->episode())->url();  
  } else {
    $episodeExists = false;
    $episodeTitle = "";
    $episodeURL = "";  
  }

  if ($fanart->caption()->isNotEmpty() && $thisArtist != '') {
    $altText = str_replace('"','&quot;',$fanart->caption()) . " ~ art by " . $thisArtist;
  } else if ($fanart->caption()->isNotEmpty()) {
    $altText = str_replace('"','&quot;',$fanart->caption());
  } else if ($thisArtist != '') {
    $altText = "art by " . $thisArtist;
  } else {
    $altText = "";
  }

  ?>

  <figure class="fanart-thumb">

    <a name="<?= $fanart->filename(); ?>" class="full-fanart-link"
      full-size="<?=$fanartFull; ?>" 
      <?php if ($thisArtist) { echo 'artist="' . $thisArtist . '" '; } ?>
      <?php if ($artistPage) { echo 'artist-page="' . $artistPage . '" '; } ?>
      <?php if ($episodeTitle) { echo 'episode-title="' . $episodeTitle . '" '; } ?>
      <?php if ($episodeURL) { echo 'episode-url="' . $episodeURL . '" '; } ?>
      <?php if ($fanart->width()) { echo 'full-width="' . $fanart->width() . '"'; } ?>
      <?php if ($fanart->height()) { echo 'full-height="' . $fanart->height() . '"'; } ?>
    >
      <img src="<?= $fanartThumbnail; ?>" loading="lazy" width="320" height="320" alt="<?= $altText; ?>" />
    </a>
    <figcaption class="details">

      <?php if ($episodeExists && $page->intendedTemplate() != 'episode') { ?>
        <div class="detail episode">
          <label>Episode</label>
          <div class="text">
            <a href="<?= $episodeURL; ?>">
              <span><?= $episodeTitle; ?></span>
            </a>
          </div>
        </div>
      <?php } ?>

      <?php if ($thisArtist && $page->intendedTemplate() != 'person') { ?>
        <div class="detail artist">
          <label>Art By</label>
          <div class="text">
            <?php if ($site->find($mlink)) { ?>
              <a href="<?= url::home() . '/' . $mlink; ?>">
                <?= $thisArtist; ?>
              </a>
            <?php } else { ?>
                <span><?= $thisArtist; ?></span>
            <?php } ?>
          </div>
        </div>
      <?php } ?>

    </figcaption>
  </figure>
<?php endforeach; ?>