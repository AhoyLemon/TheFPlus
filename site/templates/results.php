<?php snippet('header') ?>

  <main class="main" role="main">

    
    <?php 
      $ftag_pre = urldecode(param('tag'));
      $ftag = filter_var($ftag_pre,FILTER_SANITIZE_STRING);
    ?>

    <div class="browsing-tag">
      <span class="label">browsing</span>
      <span class="tag selected"><?= $ftag; ?></span>
    </div>
    
    <?php $articles = $site->grandChildren()->visible()->filterBy('tags', $ftag_pre, ',')->sortBy('date', 'desc')->paginate(16) ?>
    <?php snippet('briefs',  [ 'articles' => $articles]) ?>

  </main>

<?php snippet('footer') ?>