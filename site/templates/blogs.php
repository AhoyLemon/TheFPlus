<?php snippet('header') ?>
  <main class="main" role="main">
		
    <?php snippet('briefs',  [ 'articles' => $page->children()->listed()->sortBy('date', 'desc')->paginate(11)]) ?>

  </main>
<?php snippet('footer') ?>