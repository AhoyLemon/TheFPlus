<?php snippet('header') ?>

  <main class="main" role="main">

    
    <?php
      $ftag_pre = urldecode(param('tag') ?? '');
      // FILTER_SANITIZE_STRING was removed in PHP 8.1; strip tags manually
      $ftag = trim(strip_tags($ftag_pre));

      if (strpos($ftag, 'that fetish') !== false) {
        $ftag_pre = 'how in the hell did you get that fetish?';
        $ftag     = $ftag_pre;
      }
    ?>

    <div class="browsing-tag">
      <span class="label">browsing</span>
      <span class="tag selected"><?= $ftag; ?></span>
    </div>
    
    <?php $articles = $site->grandChildren()->listed()->filterBy('tags', $ftag_pre, ',')->sortBy('date', 'desc')->paginate(15) ?>
    <?php snippet('briefs',  [ 'articles' => $articles]) ?>

  </main>

<?php snippet('footer') ?>