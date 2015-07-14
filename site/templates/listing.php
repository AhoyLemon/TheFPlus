<?php snippet('header') ?>
  <main class="main" role="main">    
    <?php $ftag = urldecode (param('tag')); ?>
    <?php $thispage = urldecode (param('page')); ?>
    <?php if ($ftag): ?>
      <ul class="tags filtered">
        <label>browsing: </label>
        <li class="tag selected"><?php echo $ftag ?></li>
      </ul>
    <?php endif ?>
    
    <?php 
      if ($page->slug() == "episode") {
        $itemType = "https://schema.org/RadioEpisode";
        $fsites = explode(",", $page->featured_site()); 
      } else if ($page->slug() == "also-made") {
        $itemType = "https://schema.org/CreativeWork";
      }
    ?>
    <?php if (!$ftag): ?>
      <?php if ($page->uri() == "episode" && $thispage == "") {
        $articles = $page->children()->visible()->sortBy('date', 'desc')->paginate(27);
        $showRandom = true;
      } else {
        $articles = $page->children()->visible()->sortBy('date', 'desc')->paginate(28);
        $showRandom = false;
      } ?>
    <?php endif ?>
    <?php if ($ftag): ?>
      <?php $articles = $page->children()->visible()->filterBy('tags', $ftag, ',')->paginate(28) ?>
    <?php endif ?>
    <section class="<?php echo $page->slug(); ?> covers-only">
      <?php if ($showRandom == true): ?>
        <a href="/episode/random" title="Pick a random episode">
          <img src="/assets/images/random-card.png" class="cover">
          <summary>
            <h3 class="title" style="margin-bottom:0.6em;">RANDOM EPISODE</h3>
            <p>Feeling indecisive? How about you roll the dice and let our computer make the decision, deliver the content, and submit your personal information to the NSA for pennies on the dollar!</p>
          </summary>
        </a>
      <?php endif ?>
      <?php foreach($articles as $article): ?>
        <?php if($image = $article->image()): ?>
          <a href="<?php echo $article->url() ?>" title="<?php echo $article->title() ?>" itemscope itemtype="<?php echo $itemType; ?>">
            <meta itemprop="url" content="<?php echo $article->url(); ?>" />
            <img itemprop="image" src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" />
            <summary>
              <h4 class="title">
                <?php if ($article->parent()->slug() == "episode"): ?>
                  <?php echo $article->uid(); ?>:
                <?php endif ?>
                <span itemprop="name"><?php echo $article->title() ?></span>
              </h4>
              <p itemprop="description"><?php echo excerpt($article->text(), 185) ?></p>
            </summary>
            <span itemprop="discussionUrl" class="disqus-comment-count" data-disqus-identifier="<?php echo $article->uri(); ?>"></span>
          </a>
        <?php endif ?>
        <?php if(!$image = $article->image()): ?>
          <a href="<?php echo $article->url() ?>" class="no-image" title="<?php echo $article->title() ?>" itemscope itemtype="<?php echo $itemType; ?>">
            <meta itemprop="url" content="<?php echo $article->url(); ?>" />
            <h3 itemprop="name"><?php echo $article->title() ?></h3>
            <span class="disqus-comment-count" data-disqus-identifier="<?php echo $article->uri(); ?>"></span>
          </a>
        <?php endif ?>
      <?php endforeach ?>
    </section>
    
    <?php if($articles->pagination()->hasPages()): ?>
      <nav class="pagination">
        <?php if($articles->pagination()->hasNextPage()): ?>
          <a class="next" href="<?php echo $articles->pagination()->nextPageURL() ?>">older episodes</a>
        <?php endif ?>
        <?php if($articles->pagination()->hasPrevPage()): ?>
          <a class="prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">newer episodes</a>
        <?php endif ?>
      </nav>
    <?php endif ?>

  </main>

<style>
  .covers-only a { position:relative; }
  .covers-only a:hover .disqus-comment-count { display:block; }
</style>
<?php snippet('disqus-alt', array('allow_comments' => false)) ?>
<?php snippet('footer') ?>