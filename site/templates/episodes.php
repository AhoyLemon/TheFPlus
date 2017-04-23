<?php snippet('header') ?>
    <!-- RSS LINK -->
  <link type="application/rss+xml" rel="alternate"title="The F Plus" href="https://feeds.feedburner.com/TheFPlus"/>

  <main class="main edge-to-edge" role="main" data-template="episodes">
    <?php $ftag = urldecode (param('tag')); ?>
    <?php $thispage = urldecode(param('page')); ?>
    <?php if ($ftag): ?>
      <ul class="tags filtered">
        <label>browsing: </label>
        <li class="tag selected"><?php echo $ftag ?></li>
      </ul>
    <?php endif ?>
    
    <?php $fsites = explode(",", $page->featured_site()); ?>
    
    <?php if ($thispage == "") {
      $articles = $page->children()->visible()->sortBy('date', 'desc')->paginate(26);
      $showRandom = true;
    } else if ($ftag) {
      $articles = $page->children()->visible()->filterBy('tags', $ftag, ',')->sortBy('date', 'desc')->paginate(26);
      $showRandom = false;
    } else {
      $articles = $page->children()->visible()->sortBy('date', 'desc')->paginate(26);
      $showRandom = false;
    } ?>
    
    <section class="<?php echo $page->slug(); ?> covers-only">
      <?php if ($showRandom == true): ?>
        <a href="/episode/random" title="Pick a random episode">
          <img src="/assets/images/random-card.png" class="cover">
          <summary>
            <h4 class="title" style="margin-bottom:0.6em;">RANDOM EPISODE</h4>
            <p>Feeling indecisive? How about you roll the dice and let our computer make the decision, deliver the content, and submit your personal information to the NSA for pennies on the dollar!</p>
          </summary>
        </a>
      <?php endif ?>
      <?php if($articles->pagination()->hasPrevPage()): ?>
        <a class="prev tile" href="<?php echo $articles->pagination()->prevPageURL() ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
            <title>Previous Page</title>
            <path class="st0" d="M202.8 159.4H223c3.6 0 6.9.3 10 1 3 .7 5.6 1.8 7.7 3.3 2.1 1.5 3.8 3.5 4.9 6 1.2 2.5 1.8 5.5 1.8 9.2 0 3.5-.6 6.5-1.8 9.1-1.2 2.6-2.8 4.7-5 6.3-2.1 1.7-4.7 2.9-7.7 3.8-3 .8-6.3 1.3-9.9 1.3h-11.9v26.2h-8.4v-66.2zm19.2 33c5.8 0 10-1.1 12.8-3.3 2.8-2.2 4.2-5.6 4.2-10.3 0-4.8-1.4-8.1-4.2-9.9-2.8-1.8-7.1-2.8-12.8-2.8h-10.9v26.3H222zM313.1 225.5l-15.9-27.9h-12v27.9h-8.4v-66h20.6c3.4 0 6.5.3 9.3 1 2.9.6 5.3 1.7 7.3 3.2 2 1.5 3.6 3.4 4.8 5.7 1.1 2.4 1.7 5.2 1.7 8.7 0 5.2-1.3 9.3-4 12.4-2.7 3.1-6.3 5.2-10.8 6.3l16.7 28.8h-9.3zm-27.9-34.8h11.1c5.2 0 9.1-1.1 11.9-3.2 2.8-2.1 4.1-5.3 4.1-9.6 0-4.4-1.4-7.4-4.1-9.2-2.8-1.7-6.7-2.6-11.9-2.6h-11.1v24.6zM351.5 159.4h38.1v7h-29.7v20.7H385v7.1h-25.1v24h30.7v7.1h-39.1v-65.9zM411.6 159.4h9l10.6 35.6c1.2 4 2.3 7.6 3.2 11 .9 3.4 2 7 3.3 10.9h.4c1.2-3.9 2.3-7.5 3.2-10.9.9-3.4 2-7 3.1-11l10.6-35.6h8.6l-20.9 66h-9.8l-21.3-66z"/>
            <path class="st0" d="M202.3 273.4h20.2c3.6 0 6.9.3 10 1 3 .7 5.6 1.8 7.7 3.3 2.1 1.5 3.8 3.5 4.9 6 1.2 2.5 1.8 5.5 1.8 9.2 0 3.5-.6 6.5-1.8 9.1-1.2 2.6-2.8 4.7-5 6.3-2.1 1.7-4.7 2.9-7.7 3.8-3 .8-6.3 1.3-9.9 1.3h-11.9v26.2h-8.4v-66.2zm19.2 33c5.8 0 10-1.1 12.8-3.3 2.8-2.2 4.2-5.6 4.2-10.3 0-4.8-1.4-8.1-4.2-9.9-2.8-1.8-7.1-2.8-12.8-2.8h-10.9v26.3h10.9zM301.5 319.3h-24.1l-6.3 20.1h-8.6l22.3-66h9.5l22.3 66h-9l-6.1-20.1zm-2.1-6.8l-3.1-10.1c-1.2-3.7-2.4-7.4-3.4-11-1.1-3.7-2.1-7.4-3.2-11.2h-.4c-1 3.8-2 7.6-3.1 11.2-1.1 3.7-2.2 7.3-3.4 11l-3.1 10.1h19.7zM337.4 306.4c0-5.3.8-10.1 2.3-14.3 1.5-4.2 3.6-7.8 6.3-10.8s5.9-5.2 9.6-6.8c3.7-1.6 7.8-2.4 12.2-2.4 4.6 0 8.4.9 11.4 2.6 3.1 1.7 5.6 3.6 7.5 5.6l-4.7 5.3c-1.7-1.7-3.6-3.2-5.8-4.4-2.2-1.2-5-1.8-8.3-1.8-3.4 0-6.4.6-9.1 1.9-2.7 1.2-5 3-6.8 5.3-1.9 2.3-3.3 5.1-4.4 8.4-1 3.3-1.6 7-1.6 11.1 0 4.2.5 7.9 1.5 11.2 1 3.3 2.4 6.2 4.2 8.5 1.8 2.4 4.1 4.2 6.8 5.4 2.7 1.3 5.9 1.9 9.4 1.9 2.3 0 4.6-.4 6.7-1.1 2.1-.7 3.8-1.7 5.2-2.9v-17.2h-14V305h21.6v28c-2.1 2.2-5 4-8.5 5.5s-7.5 2.2-11.9 2.2-8.4-.8-12-2.3-6.7-3.8-9.4-6.7c-2.6-2.9-4.7-6.5-6.1-10.8-1.4-4.3-2.1-9.1-2.1-14.5zM419.4 273.4h38.1v7h-29.7v20.7h25.1v7.1h-25.1v24h30.7v7.1h-39.1v-65.9z"/>
            <path class="st0" d="M250 463.3c-1 0-2-.4-2.8-1.2L37.9 252.8c-1.6-1.6-1.6-4.1 0-5.7L247.2 37.9c1.6-1.6 4.1-1.6 5.7 0 1.6 1.6 1.6 4.1 0 5.7L46.4 250l206.4 206.4c1.6 1.6 1.6 4.1 0 5.7-.8.8-1.8 1.2-2.8 1.2z" id="Layer_6"/>
          </svg>
        </a>
      <?php endif; ?>
      <?php foreach($articles as $article): ?>
        <?php if($image = $article->image()) { ?>
          <a href="<?php echo $article->url() ?>" title="<?php echo $article->title() ?>">
            <?php if ($article->cover() != "") { ?>
              <img src="<?php echo $article->url() ?>/<?php echo $article->cover()->filename() ?>" class="cover" />
            <?php } else { ?>
              <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" />
            <?php } ?>
            
            <summary>
              <h4 class="title">
                <?php if ($article->parent()->slug() == "episode"): ?>
                  <?php echo $article->uid(); ?>:
                <?php endif ?>
                <span><?php echo $article->title() ?></span>
              </h4>
              <p><?php echo excerpt($article->text(), 185) ?></p>
            </summary>
            <span class="disqus-comment-count" data-disqus-identifier="<?php echo $article->uri(); ?>"></span>
          </a>
        <?php } else { ?>
          <a href="<?php echo $article->url() ?>" class="no-image" title="<?php echo $article->title() ?>">
            <h3><?php echo $article->title() ?></h3>
            <span class="disqus-comment-count" data-disqus-identifier="<?php echo $article->uri(); ?>"></span>
          </a>
        <?php } ?>
      <?php endforeach ?>
      <?php if($articles->pagination()->hasNextPage()): ?>
        <a class="next tile" href="<?php echo $articles->pagination()->nextPageURL() ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
            <title>Next Page</title>
            <path class="st0" d="M250 463.3c-1 0-2-.4-2.8-1.2-1.6-1.6-1.6-4.1 0-5.7L453.6 250 247.2 43.6c-1.6-1.6-1.6-4.1 0-5.7 1.6-1.6 4.1-1.6 5.7 0l209.3 209.3c1.6 1.6 1.6 4.1 0 5.7L252.8 462.1c-.8.8-1.8 1.2-2.8 1.2z" id="Layer_2"/>
            <path class="st0" d="M42.5 157.4h8.7L75 198.9l7.1 13.7h.4c-.2-3.4-.4-6.8-.7-10.4-.2-3.6-.4-7.1-.4-10.6v-34.1h8v66h-8.7l-24-41.6-7.1-13.6h-.4c.3 3.4.5 6.8.8 10.2.2 3.5.4 6.9.4 10.4v34.5h-8v-66zM123.7 157.4h38.1v7h-29.7v20.7h25.1v7.1h-25.1v24h30.7v7.1h-39.1v-65.9zM204.6 189.3l-17.9-31.9h9.3l9 16.9c.9 1.5 1.7 3 2.5 4.5.8 1.4 1.7 3.1 2.7 5.1h.4c.9-1.9 1.8-3.6 2.5-5.1.7-1.4 1.5-2.9 2.3-4.5l8.8-16.9h8.9l-18 32.3 19.2 33.7H225l-9.7-17.8c-.9-1.6-1.8-3.3-2.7-5-.9-1.7-1.9-3.6-3-5.6h-.6c-.9 2-1.8 3.9-2.7 5.6-.9 1.7-1.7 3.4-2.5 5l-9.6 17.8h-8.9l19.3-34.1zM272.3 164.5h-19.9v-7h48.3v7h-19.9v59h-8.5v-59z"/>
            <path class="st0" d="M42.5 275.4h20.2c3.6 0 6.9.3 10 1 3 .7 5.6 1.8 7.7 3.3 2.1 1.5 3.8 3.5 4.9 6 1.2 2.5 1.8 5.5 1.8 9.2 0 3.5-.6 6.5-1.8 9.1-1.2 2.6-2.8 4.7-5 6.3-2.1 1.7-4.7 2.9-7.7 3.8-3 .8-6.3 1.3-9.9 1.3H50.8v26.2h-8.4v-66.2zm19.2 33c5.8 0 10-1.1 12.8-3.3 2.8-2.2 4.2-5.6 4.2-10.3 0-4.8-1.4-8.1-4.2-9.9-2.8-1.8-7.1-2.8-12.8-2.8H50.8v26.3h10.9zM141.7 321.3h-24.1l-6.3 20.1h-8.6l22.3-66h9.5l22.3 66h-9l-6.1-20.1zm-2.1-6.8l-3.1-10.1c-1.2-3.7-2.4-7.4-3.4-11-1.1-3.7-2.1-7.4-3.2-11.2h-.4c-1 3.8-2 7.6-3.1 11.2-1.1 3.7-2.2 7.3-3.4 11l-3.1 10.1h19.7zM177.6 308.4c0-5.3.8-10.1 2.3-14.3 1.5-4.2 3.6-7.8 6.3-10.8 2.7-3 5.9-5.2 9.6-6.8 3.7-1.6 7.8-2.4 12.2-2.4 4.6 0 8.4.9 11.4 2.6 3.1 1.7 5.6 3.6 7.5 5.6l-4.7 5.3c-1.7-1.7-3.6-3.2-5.8-4.4-2.2-1.2-5-1.8-8.3-1.8-3.4 0-6.4.6-9.1 1.9-2.7 1.2-5 3-6.8 5.3-1.9 2.3-3.3 5.1-4.4 8.4-1 3.3-1.6 7-1.6 11.1 0 4.2.5 7.9 1.5 11.2 1 3.3 2.4 6.2 4.2 8.5 1.8 2.4 4.1 4.2 6.8 5.4 2.7 1.3 5.9 1.9 9.4 1.9 2.3 0 4.6-.4 6.7-1.1 2.1-.7 3.8-1.7 5.2-2.9v-17.2h-14V307h21.6v28c-2.1 2.2-5 4-8.5 5.5s-7.5 2.2-11.9 2.2-8.4-.8-12-2.3-6.7-3.8-9.4-6.7c-2.6-2.9-4.7-6.5-6.1-10.8-1.4-4.3-2.1-9.1-2.1-14.5zM259.6 275.4h38.1v7H268v20.7h25v7.1h-25v24h30.7v7.1h-39.1v-65.9z"/>
          </svg>
        </a>
      <?php endif ?>
    </section>

  </main>
<?php snippet('disqus-alt', array('allow_comments' => false)) ?>
<?php snippet('footer') ?>