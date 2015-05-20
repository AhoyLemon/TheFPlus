<?php snippet('header') ?>


<main class="main episode" role="main">
  
  <style>
    .tagcloud { padding-left:0; text-align:justify; }
    .tagcloud li { display:inline-block; }
    article.full .episode-tags a[href] { background-color:rgba(174,38,38,0.05); }
  </style>

  <h1>Episode Tag Index:</h1>
  <?php $tagcloud = tagcloud(page('episode')) ?>
  
  <article class="full">
    <ul class="tagcloud episode-tags">
      <?php foreach($tagcloud as $tag): ?>
      <li>
        <?php $x = 0; ?>
        <?php $tagmatches = $site->grandChildren()->filterBy('template','episode')->filterBy('tags', $tag->name(), ','); ?>
        <?php foreach($tagmatches as $tagmatch): $x = $x+1; ?>
        <?php endforeach ?>
        <a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo rawurlencode($tag->name()) ?>" <?php endif ?>><?php echo trim($tag->name()) ?> (<?php echo $x; ?>)</a>
      </li>
      <?php endforeach ?>
    </ul>
  </article>

</main>



<?php snippet('footer') ?>
