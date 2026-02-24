<?php snippet('header') ?>
  <main class="main edge-to-edge" role="main" data-template="episodes">
    <?php $ftag = param('tag') !== null ? urldecode(param('tag')) : null; ?>
    <?php $thispage = param('page') !== null ? urldecode(param('page')) : null; ?>
    <?php if ($ftag): ?>
      <ul class="tags filtered">
        <label>browsing: </label>
        <li class="tag selected"><?php echo $ftag ?></li>
      </ul>
    <?php endif ?>
    
    <?php 
      if ($page->slug() == "episode") {
        $fsites = explode(",", $page->featured_site());
      }
    ?>
    <?php if (!$ftag): ?>
      <?php if ($page->uri() == "episode" && $thispage == "") {
        $articles = $page->children()->listed()->sortBy('date', 'desc')->paginate(26);
        $showRandom = true;
      } else if ($page->uri() == "also-made") {
        $articles = $site->find('also-made','guess')->children()->listed()->sortBy('date', 'desc')->paginate(28);
        $showRandom = false;
      } else {
        $articles = $page->children()->listed()->sortBy('date', 'desc')->paginate(26);
        $showRandom = false;
      } ?>
    <?php endif ?>
    <?php if ($ftag): ?>
      <?php $articles = $page->children()->listed()->filterBy('tags', $ftag, ',')->sortBy('date', 'desc')->paginate(28) ?>
      
    <?php endif ?>
    
    <section class="<?php echo $page->slug(); ?> covers-only">
      <?php foreach($articles as $article): ?>
        <?php snippet('coverbox',  [ 'article' => $article]); ?>
      <?php endforeach ?>
    </section>

    <div class="episode-pagination" style="padding:2rem;">
      <?php snippet('pagination',  [ 'articles' => $articles]) ?>
    </div>

  </main>
<?php snippet('footer') ?>