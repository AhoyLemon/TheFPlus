<section class="briefs summaries">
  <?php /*  $articles = $site->grandChildren()->visible()->sortBy('date', 'desc')->paginate(12) */ ?>

    <?php foreach($articles as $article) { ?>

    <?php
      $briefType = $article->parent()->slug();

      $altText = "";
      if ($briefType == "episode") {
        if ((int)$article->uid()) {
          $altText = "Episode " . (int)$article->uid() . ": " . $article->title();
        } else {
          $altText = "Bonus Episode: " . $article->title();
        }
        
      } else if ($briefType == "also-made") {
        $altText = $article->category() . ": " . $article->title(); 
        $category = $article->category();
        if ($article->template() == "stickers" || $article->template() == "merch-type") {
          $category = "merch";
        }
      }
    ?>

    <a class="brief <?= $briefType; ?>" href="<?= $article->url(); ?>" title="<?= $altText; ?>">
      <div class="inner">

        <?php /* Brief Image */ ?>
        <?php if ($briefType != "wrote") { ?>
          <figure>
            <?php if ($article->cover()->isNotEmpty()) { ?>
              <img src="<?= $article->cover()->toFile()->url(); ?>" alt="<?= $article->title(); ?>" class="cover<?php if ($article->cover()->toFile()->extension() == "png") { echo ' no-shadow'; } ?>" />
            <?php } else if ($article->image()->isNotEmpty())  { ?>
              <img src="<?= $article->image()->url(); ?>" alt="<?= $article->title(); ?>" class="cover<?php if ($article->image()->extension() == "png") { echo ' no-shadow'; } ?>" />
            <?php } ?>
          </figure>
        <?php } ?>


        <?php /* Title */ ?>
        <?php if ($briefType == "wrote" || $briefType == "also-made") { ?>
          <div class="name-and-title">
            <h2 class="title"><?= $article->title(); ?></h2>
          </div>
        <?php } ?>

        <?php if ($briefType == "wrote" || $briefType == "also-made") { ?>
          <figcaption>
            <div class="description">
              <?php if ($briefType == "wrote") {
                echo excerpt($article->text(), 420);
              } else if ($briefType == "also-made") {
                echo excerpt($article->text(), 100);
              } ?>
            </div>
          </figcaption>
        <?php } ?>

        <?/* Category */ ?>
        <?php if ($briefType == 'also-made') { ?>
          <div class="category">
            <span class="category-tag">
              <?= $category; ?>
            </span>
          </div>
        <?php } ?>

        <?/* Subject */ ?>
        <?php if ($article->featured_site()->isNotEmpty()) { ?>
          <div class="subject">
            <?php if (strpos($article->featured_site(), ',') == false) { ?>
              <span>reading</span> <strong class="source"><?= $article->featured_site(); ?></strong>
            <?php } else { ?>
              </span>reading</span> 
              <?php $contentSource = explode(",", $article->featured_site()); ?>
              <ul>
                <?php foreach($contentSource as $key => $s) { ?>
                  <li class="source"><?= $s ?></li>
                <?php } ?>
              </ul>
            <?php } ?>
          </div>
        <?php } ?>

        <?/* Cast */ ?>
        <?php if ($article->cast()->isNotEmpty()) { ?>
          <div class="cast">
            <?php if ($article->cast()->isNotEmpty()) {
              $persons = explode(",", $article->cast());
            ?>
              <span>with</span>
              <ul>
                <?php foreach($persons as $key => $person) { ?>
                  <li><?= $person ?></li>
                <?php } ?>
              </ul>
            <?php } ?>
          </div>
        <?php } ?>



      </div>
      <time class="timebox">
        <span class="day"><?= date('d', $article->date()); ?></span>
        <span class="month"><?= date('M', $article->date()); ?></span>
        <span class="year"><?= date('Y', $article->date()); ?></span>
      </time>
  
    </a>
    
  <?php } ?>

  <?php snippet('pagination',  [ 'articles' => $articles]) ?>

</section>