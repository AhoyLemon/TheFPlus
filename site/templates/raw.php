<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="text">
      <h1><?php echo $page->title() ?></h1>
      <?php echo $page->text()->html() ?>
    </div>

  </main>

<?php snippet('footer') ?>