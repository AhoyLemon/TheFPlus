<?php snippet('header') ?>

  <main class="main page" role="main">

    <article class="full default">
      <h1><?php echo $page->title() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </article>
    
  </main>

<?php snippet('footer') ?>
<?php if ($page->bonus_code() != ""): ?>
  <!-- ADDITIONAL FUN -->
  <div class="custom-html">
    <?php echo $page->bonus_code()->html() ?>
  </div>
<?php endif ?>