<?php snippet('header') ?>

  <main class="main" role="main">

    
    <?php 
      $ftag_pre = urldecode(param('tag'));
      $ftag = filter_var($ftag_pre,FILTER_SANITIZE_STRING);

      if(strpos($ftag, "that fetish") !== false){
        $ftag_pre = "how in the hell did you get that fetish?";
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