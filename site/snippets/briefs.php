<section class="briefs summaries">
  <?php /*  $articles = $site->grandChildren()->visible()->sortBy('date', 'desc')->paginate(12) */ ?>

    <?php foreach($articles as $article): ?>

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
      }


      /*
      if ($article->template() == "episode") {
        $briefType = "episode";
      } else if ($article->parent()->slug() == "also-made") { ?>
        $briefType = "epi";
      }
      */
    ?>

    <a class="brief <?= $briefType; ?>" href="<?= $article->url(); ?>" title="<?= $altText; ?>">
      <div class="inner">
        <header class="name-and-title">
          <h2 class="title"><?= $article->title(); ?></h2>
          <time class="longdate">
            <span class="date">
              <?php echo date('D, M jS Y', $article->date()) ?>
            </span>
          </time>
          <?php if ($briefType == 'episode') { ?>
            <span class="episode-number"><?php echo $article->uid(); ?></span>
          <?php } ?>
        </header>

        <?php if ($briefType == "wrote") { ?>
          <figcaption>
            <div class="description">
              <p><?php echo excerpt($article->text(), 420) ?></p>
            </div>
          </figcaption>
        <?php } ?>

        <figure>
          <?php if ($article->cover() != "") { ?>
            <img src="<?= $article->cover()->toFile()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
          <?php } else { ?>
            <img src="<?= $article->image()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
          <?php } ?>
        </figure>
        
        <?php /* if ($briefType == "episode") { ?>
          <div class="release-date">
            <span>Released</span>
            <time><?= date('D, M jS Y', $article->date()); ?></time>
          </div>
          <?php } */ ?>

        <?/* Category */ ?>
        <?php if ($briefType == 'also-made') { ?>
          <div class="category">
            <span class="category-tag">
              <?= $article->category(); ?>
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
  
    <?php /*

    <?php if ($article->parent()->slug() == "episode") { ?>
  
      <?php if ($article->template() == "episode") { ?>


        <!-- EPISODE BRIEF -->
        <a class="episode brief" href="<?= $article->url(); ?>">
          <div class="inner">
            <header class="name-and-title">
              <h2 class="title"><?= $article->title(); ?></h2>
              <time class="published released">
                <span class="date">
                  <?php echo date('l, F jS Y', $article->date()) ?>
                </span>
                @
                <span class="time">
                  <?php echo date("g:ia", strtotime($article->time())) ?>
                </span>
              </time>

              <span class="episode-number"><?php echo $article->uid(); ?></span>
            </header>

            <figcaption>
              <div class="description">
                <p><?php echo excerpt($article->text(), 222) ?></p>
              </div>
              <?php if ($article->cast()->isNotEmpty()) {
                $persons = explode(",", $article->cast());
              ?>
                <ul class="cast ridiculists">
                  <?php foreach($persons as $person) { ?>
                    <li><?= $person ?></li>
                  <?php } ?>
                </ul>
              <?php } ?>
            </figcaption>

            <figure>
              <?php if ($article->cover() != "") { ?>
                <img src="<?= $article->cover()->toFile()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
              <?php } else { ?>
                <img src="<?= $image->toFile()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
              <?php } ?>
              </figure>

          </div>
        </a>

      <?php } else if ($article->template() == "marathon") { ?>
        <article class="episode brief marathon">
          <header>
            <h2 class="title">
              <a href="<?php echo $article->url() ?>">
                <span class="name">
                  <?php echo html($article->title()) ?>
                </span>
              </a>
            </h2>
            <time class="published released">
              <span class="date">
                <?php echo date('l, F jS Y', $article->date()) ?>
              </span>
              @
              <span class="time">
                <?php echo date("g:ia", strtotime($article->time())) ?>
              </span>
            </time>
          </header>
          <a class="image-holder" href="<?php echo $article->url() ?>" title="<?php echo html($article->title()) ?>">
            <img src="<?php echo $article->url() ?>/<?php echo $article->cover()->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
          </a>
          <summary>
            <div class="content">
              <ul>
                <?php foreach ($article->hours()->toStructure() as $hour) { ?>
                  <li><?php echo $hour->name(); ?></li>
                <?php } ?>
              </ul>
            </div>
          </summary>
          <a class="disqus-comment-count" href="<?php echo $article->url() ?>#disqus_thread" data-disqus-identifier="<?php echo $article->uri(); ?>"></a>
        </article>
      <?php } ?>
    <?php } else if ($article->parent()->slug() == "also-made") { ?>
      <!-- ALSO MADE BRIEF -->
      <a class="also-made brief" href="<?= $article->url(); ?>">
        <div class="inner">
          <header class="name-and-title">
            <h2 class="title"><?= $article->title(); ?></h2>
            <time class="published released">
              <span class="date">
                <?php echo date('l, F jS Y', $article->date()) ?>
              </span>
              @
              <span class="time">
                <?php echo date("g:ia", strtotime($article->time())) ?>
              </span>
            </time>

            <span class="episode-number"><?php echo $article->uid(); ?></span>
          </header>

          <figcaption>
            <div class="description">
              <p><?php echo excerpt($article->text(), 222) ?></p>
            </div>
            <?php if ($article->cast()->isNotEmpty()) {
              $persons = explode(",", $article->cast());
            ?>
              <ul class="cast ridiculists">
                <?php foreach($persons as $person) { ?>
                  <li><?= $person ?></li>
                <?php } ?>
              </ul>
            <?php } ?>
          </figcaption>

          <figure>
            <?php if ($article->cover() != "") { ?>
              <img src="<?= $article->cover()->toFile()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
            <?php } else { ?>
              <img src="<?= $image->toFile()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
            <?php } ?>
            </figure>

        </div>
      </a>
    <?php } else if ($article->parent()->slug() == "wrote") { ?>
      <!-- WROTE BRIEF -->
      <a class="wrote brief" href="<?= $article->url(); ?>">
        <div class="inner">
          <header class="name-and-title">
            <h2 class="title"><?= $article->title(); ?></h2>
            <time class="published released">
              <span class="date">
                <?php echo date('l, F jS Y', $article->date()) ?>
              </span>
              @
              <span class="time">
                <?php echo date("g:ia", strtotime($article->time())) ?>
              </span>
            </time>

            <span class="episode-number"><?php echo $article->uid(); ?></span>
          </header>

          <figcaption>
            <div class="description">
              <p><?php echo excerpt($article->text(), 222) ?></p>
            </div>
            <?php if ($article->cast()->isNotEmpty()) {
              $persons = explode(",", $article->cast());
            ?>
              <ul class="cast ridiculists">
                <?php foreach($persons as $person) { ?>
                  <li><?= $person ?></li>
                <?php } ?>
              </ul>
            <?php } ?>
          </figcaption>

          <figure>
            <?php if ($article->cover() != "") { ?>
              <img src="<?= $article->cover()->toFile()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
            <?php } else { ?>
              <img src="<?= $image->toFile()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
            <?php } ?>
            </figure>

        </div>
      </a>
    <?php } else if ($article->parent()->slug() == "guess") { ?>
      <article class="adjudicated-guess brief">
        <header>
          <h2 class="title">
            <a href="<?php echo $article->url() ?>">
              <?php echo html($article->title()) ?>
            </a>
          </h2>
          <time class="published released">
            <span class="date">
              <?php echo date('l, F jS Y', $article->date()) ?>
            </span>
            @
            <span class="time">
              <?php echo date("g:ia", strtotime($article->time())) ?>
            </span>
          </time>
        </header>
        <?php if($image = $article->image()): ?>
          <a class="image-holder" href="<?php echo $article->url() ?>" title="<?= $article->title(); ?>">
            <?php if ($article->cover() != "") { ?>
              <img src="<?= $article->cover()->toFile()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
            <?php } else { ?>
              <img src="<?= $image->toFile()->url(); ?>" class="cover" alt="<?= $article->title(); ?>" />
            <?php } ?>
            <?php if ($article->tags() != ""):
              $etags = explode(",", $article->tags());
            ?>
              <div class="hover-cover">
                <ul class="tags">
                  <?php foreach($etags as $etag): ?>
                  <li><?php echo $etag ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif ?>
          </a>
        <?php endif ?>
        <summary>
          <?php if ($article->cast() != ""):
            $persons = explode(",", $article->cast());
          ?>
            <ul class="cast authors">
              <?php foreach($persons as $person): ?>
                <li><?php echo $person ?></li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <div class="content">
            <p><?php echo excerpt($article->text(), 222) ?></p>
          </div>
        </summary>
        <a class="disqus-comment-count" href="<?php echo $article->url() ?>#disqus_thread" data-disqus-identifier="<?php echo $article->uri(); ?>"></a>
      </article>
    <?php } ?>

    <? */ ?>
  <?php endforeach ?>

  <?php snippet('pagination',  [ 'articles' => $articles]) ?>

</section>