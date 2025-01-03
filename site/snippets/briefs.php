<section class="briefs summaries">
  <?php /*  $articles = $site->grandChildren()->visible()->sortBy('date', 'desc')->paginate(12) */ ?>

    <?php $i = 0; $pageCount = urldecode(param('page')); ?>

    <?php foreach($articles as $article) { ?>

    <?php
      $i++;
      $briefType = $article->parent()->slug();
      $altText = "";
      if ($briefType == "episode") {
        if ((int)$article->uid()) {
          $altText = "Episode " . (int)$article->uid() . ": " . $article->title();
        } else {
          $altText = "Bonus Episode: " . $article->title();
        }
        
      } else if ($briefType == "also-made" || $briefType == "merch") {
        if ($article->template() == "stickers" || $article->template() == "merch-type") {
          $category = "merch";
        } else {
          $category = $article->category();
        }
        $altText = $category . ": " . $article->title(); 
      }


      if (($pageCount < 1 && $i == 1) || ($pageCount > 1 && $i == 7)) {
        $doubleSize = true;
      } else {
        $doubleSize = false;
      }

    ?>


    <?php if ($doubleSize == true) { ?>
      <div class="brief double-size <?= $briefType; ?>">
        <div class="inner">

          <?php /* Brief Image */ ?>
          <figure>
            <a href="<?= $article->url(); ?>" >
              <?php if ($article->cover()->isNotEmpty()) { ?>
                <img src="<?= $article->cover()->toFile()->url(); ?>" alt="<?= $article->title(); ?>" class="cover<?php if ($article->cover()->toFile()->extension() == "png") { echo ' no-shadow'; } ?>" width="<?= $article->cover()->toFile()->width(); ?>" height="<?= $article->cover()->toFile()->height(); ?>" />
              <?php } else if ($article->image())  { ?>
                <img src="<?= $article->image()->url(); ?>" alt="<?= $article->title(); ?>" width="<?= $article->image()->toFile()->width(); ?>" height="<?= $article->image()->toFile()->width(); ?>" class="cover<?php if ($article->image()->extension() == "png") { echo ' no-shadow'; } ?>" />
              <?php } ?>
            </a>
          </figure>

          <figcaption>
            
            <?php if ($article->date()) { ?>
              <time><?= date('l F jS, Y', $article->date()); ?></time>
            <?php } ?>

            <h2 class="title">
              <a href="<?= $article->url(); ?>">
                <?= $article->title(); ?>
              </a>
            </h2>

            <div class="description">
              <?php if ($briefType == "wrote") {
                echo excerpt($article->text(), 700);
              } else {
                echo excerpt($article->text(), 460);
              } ?>
            </div>
            

            <?php /* Cast */ ?>
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

            <?php /* Subject */ ?>
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

            <?php /* Category */ ?>
            <?php if ($briefType == 'also-made') { ?>
              <div class="category">
                <span class="category-tag">
                  <?= $category; ?>
                </span>
              </div>
            <?php } ?>

            <?php /* Episode # */ ?>
            <?php if ($briefType == 'episode') { ?>
              <?php if ((int)$article->uid()) { ?>
                <div class="category">
                  <span class="category-tag">
                      ep #<?= $article->uid(); ?>
                  </span>
                </div>
              <?php } ?>
            <?php } ?>

            <?php if ($article->chapters()->isNotEmpty()) { ?>
              <a href="<?= $article->url(); ?>#chapters" class="chapters-icon" title="This episode has chapters">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                  <path d="M0 0h26.5v27H0zM39.5 79H100v21H39.5zM39.5 0H100v27H39.5zM39.5 40H100v26H39.5zM0 79h26.5v21H0zM0 40h26.5v26H0z"/>
                </svg>
              </a>
            <?php } ?>

          </figcaption>

        </div>
      </div>
    <?php }?>

    <div class="brief <?= $briefType; ?> <?php if ($doubleSize == true) { echo 'has-double-size'; } ?>" title="<?= $altText; ?>">
      <div class="inner">

        <?php /* Brief Image */ ?>
        <?php if ($briefType != "wrote") { ?>
          <figure>
            <a href="<?= $article->url(); ?>">
              <?php if ($article->cover()->isNotEmpty()) { ?>
                <img src="<?= $article->cover()->toFile()->url(); ?>" alt="<?= $article->title(); ?>" class="cover<?php if ($article->cover()->toFile()->extension() == "png") { echo ' no-shadow'; } ?>" width="450" height="450" loading="lazy" />
              <?php } else if ($article->image())  { ?>
                <img src="<?= $article->image()->url(); ?>" alt="<?= $article->title(); ?>" class="cover<?php if ($article->image()->extension() == "png") { echo ' no-shadow'; } ?>" width="450" height="450" loading="lazy" />
              <?php } ?>
            </a>
          </figure>
        <?php } ?>


        <?php /* Title */ ?>
        <div class="name-and-title">
          <h2 class="title">
            <a href="<?= $article->url(); ?>">
              <?= $article->title(); ?>
            </a>
          </h2>
        </div>

        <?php if ($briefType == "wrote" || $briefType == "also-made" || $briefType == "merch") { ?>
          <figcaption>
            <div class="description">
              <?php if ($briefType == "wrote") {
                echo excerpt($article->text(), 420);
              } else {
                echo excerpt($article->text(), 265);
              } ?>
            </div>
          </figcaption>
        <?php } ?>

        <?php /* Category */ ?>
        <?php if ($briefType == 'also-made') { ?>
          <div class="category">
            <span class="category-tag">
              <?= $category; ?>
            </span>
          </div>
        <?php } ?>

        <?php /* Episode # */ ?>
        <?php if ($briefType == 'episode') { ?>
          <?php if ((int)$article->uid()) { ?>
            <div class="category">
              <span class="category-tag">
                  ep #<?= $article->uid(); ?>
              </span>
            </div>
          <?php } ?>
        <?php } ?>


        <?php /* Subject */ ?>
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

        <?php /* Cast */ ?>
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
        
        <?php if ($article->chapters()->isNotEmpty()) { ?>
          <a href="<?= $article->url(); ?>#chapters" class="chapters-icon" title="This episode has chapters">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
              <title>chapters</title>
              <path d="M0 0h26.5v27H0zM39.5 79H100v21H39.5zM39.5 0H100v27H39.5zM39.5 40H100v26H39.5zM0 79h26.5v21H0zM0 40h26.5v26H0z"/>
            </svg>
          </a>
        <?php } ?>

        <?php if ($article->role()->isNotEmpty()) { ?>
          <div class="job">
            <?= $article->job(); ?>
          </div>
        <?php } ?>

        <?php if ($article->role()->isNotEmpty()) { ?>
          <div class="role">
            <?php if ($article->role() == "regular") {
              echo "Regular Cast";
            } else if ($article->role() == "guest") {
              echo "Guest Reader";
            } else if ($article->role() == "guest") {
              echo "Content Provider";
            } ?>
          </div>
        <?php } ?>

        


      </div>

      <?php if ($article->date()) { ?>
        <time class="timebox">
          <span class="day"><?= date('d', $article->date()); ?></span>
          <span class="month"><?= date('M', $article->date()); ?></span>
          <span class="year"><?= date('Y', $article->date()); ?></span>
        </time>
      <?php } ?>
  
    </div>
    
  <?php } ?>

  <?php snippet('pagination',  [ 'articles' => $articles]) ?>

</section>