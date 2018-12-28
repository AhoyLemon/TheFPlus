<?php snippet('header') ?>
  <main class="main" role="main">
		
    <?php snippet('briefs',  [ 'articles' => $page->children()->visible()->sortBy('date', 'desc')->paginate(12)]) ?>
    
    <?php if($articles->pagination()->hasPages()): ?>
      <nav class="pagination">
        <?php if($articles->pagination()->hasNextPage()): ?>
          <a class="next" href="<?php echo $articles->pagination()->nextPageURL() ?>">older posts</a>
        <?php endif ?>
        <?php if($articles->pagination()->hasPrevPage()): ?>
          <a class="prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">newer posts</a>
        <?php endif ?>
        
        <?php $randumb = $page->children()->visible()->shuffle()->first(); ?>    
        <a class="randumb" href="<?php echo $randumb->url(); ?>">random</a>
      </nav>
    <?php endif ?>

  </main>
<?php snippet('footer') ?>