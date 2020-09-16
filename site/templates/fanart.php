<?php snippet('header') ?>

  <?php

    $paginateCount = 50;

    if (param('artist')) {
      $fanartSort = $page->images()->filterBy('artist', param('artist'))->paginate($paginateCount);
    }

    // Which way are you sorting?
    else if (param('sort') == "artist") {
      $sortType = "artist";
      $fanartSort = $page->images()->sortBy('artist')->paginate($paginateCount);
    } else if (param('sort') == "artist-reverse") {
      $sortType = "artist-reverse";
      $fanartSort = $page->images()->sortBy('artist','desc')->paginate($paginateCount);
    } else if (param('sort') == "episode") {
      $sortType = "episode";
      $fanartSort = $page->images()->sortBy('episode')->paginate($paginateCount);
    } else if (param('sort') == "episode-reverse") {
      $sortType = "episode-reverse";
      $fanartSort = $page->images()->sortBy('episode','desc')->paginate($paginateCount);
    } else if (param('sort') == "random") {
      $sortType = "random";
      $fanartSort = $page->images()->shuffle()->paginate($paginateCount);
    } else {
      $sortType = "random";
      $fanartSort = $page->images()->shuffle()->paginate($paginateCount);
    }
  ?>


  <main class="main edge-to-edge fanart" role="main">
    
    <section class="fanart-grid" <?php if (param('sort')) { echo 'sort="'. param('sort').'"';} ?> >

      <h1 class="fanart-headline"><?php echo $page->page_headline(); ?></h1>


      <div class="fanart-options sort-navigation">
        <div class="label">
          Sort all art by 
        </div>
        <div class="options">
          <a class="switch-sort <?php if ($sortType == "artist") { echo 'active'; } ?>" href="<?= $site->find('fanart')->url(); ?>/sort:artist">Artist↓</a>
          <a class="switch-sort <?php if ($sortType == "artist-reverse") { echo 'active'; } ?>" href="<?= $site->find('fanart')->url(); ?>/sort:artist-reverse">Artist↑</a>
          <a class="switch-sort <?php if ($sortType == "episode") { echo 'active'; } ?>" href="<?= $site->find('fanart')->url(); ?>/sort:episode">Episode↓</a>
          <a class="switch-sort <?php if ($sortType == "episode-reverse") { echo 'active'; } ?>" href="<?= $site->find('fanart')->url(); ?>/sort:episode-reverse">Episode↑</a>
          <a class="switch-sort <?php if ($sortType == "random") { echo 'active'; } ?>" href="<?= $site->find('fanart')->url(); ?>/sort:random">Random!!!</a>
        </div>
      </div>

      <div class="fanart-options artist-filters">
        <div class="label">
          Featured artists:
        </div>
        <div class="options">
          <?php foreach (explode(',', $page->featured_artists()) as $fartist) { ?>
            <a class="filter-link <?php if (param('artist') == $fartist) { echo ' active'; } ?>"
              href="<?= $site->find('fanart')->url() . '/artist:' . $fartist; ?>"
            >
              <?= $fartist; ?>
            </a>
          <?php } ?>
        </div>
      </div>

      <?php snippet('fanart-thumbnails',  [ 'fanartArray' => $fanartSort ]) ?>
        
    </section>

    
    <div class="fanart-pagination" style="padding:2rem;">
      <?php snippet('pagination',  [ 'articles' => $fanartSort]) ?>
    </div>

    <?php if ($page->text()->isNotEmpty()) { ?>
      <div class="fanart-cta">
        <?php echo $page->text()->kirbytext(); ?>
      </div>
    <?php } ?>
    
  </main>

<?php snippet('footer') ?>