<?php snippet('header') ?>

  <?php

    $paginateCount = 50;

    // use query parameters instead of URL segments
    $artistParam = get('artist');
    $sortParam   = get('sort');

    // start with the full set of images then narrow/sort as needed
    $images = $page->images();

    if ($artistParam) {
      $images = $images->filterBy('artist', $artistParam);
    }

    $sortType = null;

    switch ($sortParam) {
      case 'artist':
        $sortType = 'artist';
        $images   = $images->sortBy('artist');
        break;
      case 'artist-reverse':
        $sortType = 'artist-reverse';
        $images   = $images->sortBy('artist', 'desc');
        break;
      case 'episode':
        $sortType = 'episode';
        $images   = $images->sortBy('episode');
        break;
      case 'episode-reverse':
        $sortType = 'episode-reverse';
        $images   = $images->sortBy('episode', 'desc');
        break;
      case 'random':
        $sortType = 'random';
        $images   = $images->shuffle();
        break;
      default:
        // no explicit sort requested
        break;
    }

    if (!$sortType) {
      if ($artistParam) {
        // default sort when filtering an artist: newest-first (episode-reverse)
        $sortType = 'episode-reverse';
        $images   = $images->sortBy('episode', 'desc');
      } else {
        $sortType = 'random';
        $images   = $images->shuffle();
      }
    }

    $fanartSort = $images->paginate($paginateCount);
  ?>


  <main class="main edge-to-edge fanart" role="main">
    
<section class="fanart-grid" <?php if (!empty($sortParam)) { echo 'sort="'. $sortParam .'"';} ?> >

      <h1 class="fanart-headline"><?php echo $page->page_headline(); ?></h1>


      <div class="fanart-options sort-navigation">
        <div class="label">
          Sort all art by 
        </div>
        <div class="options">
          <?php
            // helper to generate URLs for sort links
            // if sort is artist/artist-reverse/random we clear any artist filter
            $baseUrl = $site->find('fanart')->url();
            function sortUrl($baseUrl, $sortName, $artistParam) {
              $params = ['sort' => $sortName];
              if ($artistParam && !in_array($sortName, ['artist','artist-reverse','random'])) {
                $params['artist'] = $artistParam;
              }
              return $baseUrl . '?' . http_build_query($params);
            }
          ?>
          <a class="switch-sort <?php if ($sortType == "artist") { echo 'active'; } ?>" href="<?= sortUrl($baseUrl, 'artist', $artistParam); ?>">Artist↓</a>
          <a class="switch-sort <?php if ($sortType == "artist-reverse") { echo 'active'; } ?>" href="<?= sortUrl($baseUrl, 'artist-reverse', $artistParam); ?>">Artist↑</a>
          <a class="switch-sort <?php if ($sortType == "episode") { echo 'active'; } ?>" href="<?= sortUrl($baseUrl, 'episode', $artistParam); ?>">Episode↓</a>
          <a class="switch-sort <?php if ($sortType == "episode-reverse") { echo 'active'; } ?>" href="<?= sortUrl($baseUrl, 'episode-reverse', $artistParam); ?>">Episode↑</a>
          <a class="switch-sort <?php if ($sortType == "random") { echo 'active'; } ?>" href="<?= sortUrl($baseUrl, 'random', $artistParam); ?>">Random!!!</a>
        </div>
      </div>

      <div class="fanart-options artist-filters">
        <div class="label">
          Featured artists:
        </div>
        <div class="options">
          <?php foreach (explode(',', $page->featured_artists()) as $fartist) { ?>
            <?php
              $activeClass = ($artistParam == $fartist) ? ' active' : '';

              if ($fartist == $artistParam) {
                // clicking the active artist link clears the filter
                $artistParams = [];
                if (!empty($sortParam)) {
                  $artistParams['sort'] = $sortParam;
                }
              } else {
                // selecting a new artist: default to episode-reverse sort
                $artistParams = ['artist' => $fartist, 'sort' => 'episode-reverse'];
              }

              $artistUrl   = $site->find('fanart')->url() . '?' . http_build_query($artistParams);
            ?>
            <a class="filter-link<?= $activeClass ?>" href="<?= $artistUrl; ?>">
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