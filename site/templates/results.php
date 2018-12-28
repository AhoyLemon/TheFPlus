<?php snippet('header') ?>

  <main class="main" role="main">

    
    <?php $ftag = urldecode(param('tag')); ?>

    <div class="browsing-tag">
      <span class="label">browsing</span>
      <span class="tag selected"><?php echo $ftag ?></span>
    </div>
    
    <?php $articles = $site->grandChildren()->visible()->filterBy('tags', $ftag, ',')->sortBy('date', 'desc')->paginate(16) ?>
    <?php snippet('briefs',  [ 'articles' => $articles]) ?>

  </main>

<?php snippet('footer') ?>