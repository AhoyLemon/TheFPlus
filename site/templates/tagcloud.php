<?php snippet('header') ?>


<main class="main episode" role="main">

  <h1 style="margin-top:0.75em;">Episode Tag Index</h1>
  <?php $tagcloud = tagcloud(page('episode')) ?>
  
  <article class="full">
    <section class="tagcloud">
      <?php foreach($tagcloud as $tag): ?>
        <?php 
          $x = 0;
          $tagmatches = $site->grandChildren()->filterBy('tags', $tag->name(), ',');
          foreach($tagmatches as $tagmatch) { $x = $x+1; }
        ?>
        <a class="tag" href="<?= $site->url() . '/find/tag:' .  rawurlencode($tag->name()) ?>">
          <span class="tag-name"><?= trim($tag->name()); ?></span>
          <span class="tag-count"><?= $x; ?></span>
        </a>
      <?php endforeach ?>
    </section>
  </article>

</main>



<?php snippet('footer') ?>
