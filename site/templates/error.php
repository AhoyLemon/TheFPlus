<?php snippet('header') ?>
  <main class="main page four-oh-four" role="main">

    <h1 style="font-size: 15vw; text-align: center; opacity: 0.5; padding-top: 0.35em; padding-bottom: 0.35em;">Error 404.</h1>
    <article class="full default">
      
      <h2 style="margin-bottom:1em;"><?php echo $_SERVER["REQUEST_URI"]; ?> doesn't exist.</h2>
      <?= $page->text()->kirbytext(); ?>
    </article>
  </main>


<?php snippet('footer') ?>