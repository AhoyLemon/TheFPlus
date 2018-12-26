<?php snippet('header') ?>

  <main class="main" role="main">

    
    <?php $ftag = urldecode(param('tag')); ?>
    <ul class="tags filtered">
      <label>browsing: </label>
      <li class="tag selected"><?php echo $ftag ?></li>
    </ul>
    
    <?php $articles = $site->grandChildren()->visible()->filterBy('tags', $ftag, ',')->sortBy('date', 'desc')->paginate(16) ?>
    <?php snippet('briefs',  [ 'articles' => $articles]) ?>

  </main>

<?php snippet('disqus-alt', array('allow_comments' => false)) ?>
<?php snippet('footer') ?>