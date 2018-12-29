<?php snippet('header') ?>
  <main class="main" role="main">
		
    <?php snippet('briefs',  [ 'articles' => $page->children()->visible()->sortBy('date', 'desc')->paginate(12)]) ?>

  </main>
<?php snippet('footer') ?>