<?php snippet('header') ?>

  <?php
    // Which way are you sorting?
    $sortType = "artist";
    $fanartSort = $page->images()->sortBy('artist');


    $thisArtist = "";
    $thisEpisode = "";
  ?>


  <main class="main edge-to-edge" role="main">

    
    
    <section class="fanart-grid">

      <h1 class="fanart-headline">by <?php echo $page->page_headline(); ?>...</h1>
        
      <?php foreach ($fanartSort as $fanart): ?>

        <?php if ($thisArtist != $fanart->artist()) {
          $thisArtist = $fanart->artist();
          $mlink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $thisArtist))); ?>
          <div class="artist-box">
            <?php if ($site->find($mlink)) { ?>
              <a href="<?= url::home() . '/' . $mlink; ?>">
                <?= $thisArtist; ?>
              </a>
            <?php } else { ?>
              <span><?= $thisArtist; ?></span>
            <?php } ?>
          </div>
        <?php } ?>

        <figure class="fanart-thumb">
          <img src="<?=$fanart->crop(320,320)->url(); ?>" />
          <figcaption>
            <!-- <div class="artist"><?= $fanart->artist(); ?></div>--->
            <div class="episode"><?= $site->find('episode/'.$fanart->episode())->title(); ?></div>
          </figcaption>
        </figure>
      <?php endforeach; ?>

      <?php if ($page->text()->isNotEmpty()) { ?>
        <div class="fanart-out">
          <?php echo $page->text()->kirbytext(); ?>
        </div>
      <?php } ?>
        
    </section>

    
    
  </main>

<?php snippet('footer') ?>