<?php
/**
 * /tags          → shows the full tag cloud
 * /tags?tag=foo  → shows all pages tagged "foo"
 */
$activeTag = trim(strip_tags(kirby()->request()->get('tag') ?? ''));
?>
<?php snippet('header') ?>

<main class="main episode" role="main">

<?php if ($activeTag !== ''): ?>

  <?php
    // Easter egg preserved from the old results template
    $filterTag = strpos($activeTag, 'that fetish') !== false
      ? 'how in the hell did you get that fetish?'
      : $activeTag;
    $articles = $site->grandChildren()->listed()
      ->filterBy('tags', $filterTag, ',')
      ->sortBy('date', 'desc')
      ->paginate(15);
  ?>

  <div class="browsing-tag">
    <span class="label">browsing</span>
    <span class="tag selected"><?= html($filterTag) ?></span>
    <a class="tag-back" href="<?= $site->url() ?>/tags">&larr; all tags</a>
  </div>

  <?php snippet('briefs', ['articles' => $articles]) ?>

<?php else: ?>

  <h1 style="margin-top:0.75em;">Episode Tag Index</h1>

  <article class="full">
    <section class="tagcloud">
      <?php foreach ($site->tagCounts() as $tagName => $count): ?>
        <a class="tag" href="<?= $site->url() ?>/tags?tag=<?= rawurlencode($tagName) ?>">
          <span class="tag-name"><?= html($tagName) ?></span>
          <span class="tag-count"><?= $count ?></span>
        </a>
      <?php endforeach ?>
    </section>
  </article>

<?php endif ?>

</main>

<?php snippet('footer') ?>
