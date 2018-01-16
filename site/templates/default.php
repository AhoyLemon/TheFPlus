<?php snippet('header') ?>

  <main class="main page" role="main">

    <article class="full default">
      <h1><?php echo $page->title() ?></h1>
      <div class="article-text">
        <?php echo $page->text()->kirbytext() ?>
      </div>
      <!-- ADDITIONAL FUN -->
    </article>
    
  </main>

<?php snippet('footer') ?>