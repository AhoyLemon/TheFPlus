<?php snippet('header') ?>


<main class="main episode" role="main">

  <h1>Episode Tag Index:</h1>
  <?php $tagcloud = tagcloud(page('episode')) ?>
  
  <article class="full">
    <ul class="tagcloud">
      <?php foreach($tagcloud as $tag): ?>
      <li>
        <?php $x = 0; ?>
        <?php $tagmatches = $site->grandChildren()->filterBy('tags', $tag->name(), ','); ?>
        <?php foreach($tagmatches as $tagmatch) { $x = $x+1; } ?>
        <a href="<?= $site->url() . '/find/tag:' .  rawurlencode($tag->name()) ?>">
          <?= trim($tag->name()); ?>
          <?php if ($x > 1) { echo '(' . $x . ')'; } ?>
        </a>
        <?php /* <a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo rawurlencode($tag->name()) ?>" <?php endif ?>><?php echo trim($tag->name()) ?> (<?php echo $x; ?>)</a> */ ?>
      </li>
      <?php endforeach ?>
    </ul>
  </article>

</main>



<?php snippet('footer') ?>
