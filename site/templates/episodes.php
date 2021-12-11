<?php snippet('header') ?>
    <!-- RSS LINK -->

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
      $articles = $page->children()->visible()->sortBy('date', 'desc')->paginate(27);
      $showRandom = true;
      $otherOptionsTile = false;
    } else if ($ftag) {
      $articles = $page->children()->visible()->filterBy('tags', $ftag, ',')->sortBy('date', 'desc')->paginate(26);
      $showRandom = false;
      $otherOptionsTile = false;
    } else {
      $articles = $page->children()->visible()->sortBy('date', 'desc')->paginate(26);
      $showRandom = false;
      $otherOptionsTile = rand(4, 20);
    } ?>
    
    <section class="<?php echo $page->slug(); ?> covers-only">
      <?php if ($showRandom == true): ?>
        <a class="tile" href="/episode/random" title="Pick a random episode">
          <img src="<?= $site->url(); ?>/assets/images/random-card.png" class="cover" loading="lazy" height="400" width="400" />
          <figcaption>
            <summary>
              <h4 class="title" style="margin-bottom:0.6em;">RANDOM EPISODE</h4>
              <p>Feeling indecisive? How about you roll the dice and let our computer make the decision, deliver the content, and submit your personal information to the NSA for pennies on the dollar!</p>
            </summary>
          </figcaption>
        </a>
      <?php endif ?>

      <?php $i = 0; ?>
      <?php foreach($articles as $key => $article): ?>
        <?php $i++; ?>

        <?php if ($i == $otherOptionsTile) { ?>
          <div class="tile other-options">
            <div class="inner">
              Can't find what you're looking for? Try <a href="<?= $site->find('search')->url(); ?>">seaching the site</a> or <a href="<?= $site->find('tags')->url(); ?>">browsing episode tags</a>.
            </div>
          </div>
        <?php } ?>

        <?php snippet('coverbox',  [ 'article' => $article]); ?>
      <?php endforeach ?>

      <?php if ($showRandom == false): ?>
        <a class="tile" href="/episode/random" title="Pick a random episode">
          <img src="<?= $site->url(); ?>/assets/images/random-card.png" class="cover" height="400" width="400" />
          <figcaption>
            <summary>
              <h4 class="title" style="margin-bottom:0.6em;">RANDOM EPISODE</h4>
              <p>Feeling indecisive? How about you roll the dice and let our computer make the decision, deliver the content, and submit your personal information to the NSA for pennies on the dollar!</p>
            </summary>
          </figcaption>
        </a>
      <?php endif ?>

    </section>

    <div class="episode-pagination" style="padding:2rem;">
      <?php snippet('pagination',  [ 'articles' => $articles]) ?>
    </div>

  </main>
<?php snippet('footer') ?>