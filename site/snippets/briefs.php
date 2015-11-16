<section class="briefs summaries">
  <?php $articles = $site->grandChildren()->visible()->sortBy('date', 'desc')->paginate(12) ?>
  <?php foreach($articles as $article): ?>
  
    <?php if ($article->parent()->slug() == "episode"): ?>
      <!-- EPISODE BRIEF -->
      <article class="episode brief">
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
        <?php if($image = $article->image()): ?>
          <a class="image-holder" href="<?php echo $article->url() ?>" title="<?php echo html($article->title()) ?>">
            <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
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
            <ul class="cast ridiculists">
              <?php foreach($persons as $person): ?>
                <li><?php echo $person ?></li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <div class="content">
            <p><?php echo excerpt($article->text(), 222) ?></p>
          </div>
        </summary>
        <span class="episode-number"><?php echo $article->uid(); ?></span>
        <a class="disqus-comment-count" href="<?php echo $article->url() ?>#disqus_thread" data-disqus-identifier="<?php echo $article->uri(); ?>"></a>
      </article>
    <?php endif ?>
    <?php if ($article->parent()->slug() == "also-made"): ?>
      <!-- ALSO MADE BRIEF -->
      <article class="also-made brief">
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
          <a class="image-holder" href="<?php echo $article->url() ?>" title="<?php echo $article->title(); ?>">
            <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
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
    <?php endif ?>
    <?php if ($article->parent()->slug() == "wrote"): ?>
      <!-- WROTE BRIEF -->
      <article class="wrote brief">
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
          <a class="image-holder" href="<?php echo $article->url() ?>" title="<?php echo $article->title(); ?>">
            <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
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
            <ul class="cast ridiculists authors">
              <?php foreach($persons as $person): ?>
              <li><?php echo $person ?></li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <?php if ($article->author() != ""): ?>
            <div class="author-block">
              by: 
              <span class="author"><?php echo $article->author() ?></span>
            </div>
          <?php endif ?>
          <div class="content">
            <p><?php echo excerpt($article->text(), 222) ?></p>
          </div>
					<span class="time-estimate"><?php echo $article->text()->readingtime() ?></span>
          <a class="disqus-comment-count" href="<?php echo $article->url() ?>#disqus_thread" data-disqus-identifier="<?php echo $article->uri(); ?>"></a>
        </summary>
      </article>
    <?php endif ?>
  <?php endforeach ?>
</section>

<?php if($articles->pagination()->hasPages()): ?>
  <nav class="pagination">
    <?php if($articles->pagination()->hasNextPage()): ?>
    <a class="next" href="<?php echo $articles->pagination()->nextPageURL() ?>">older posts</a>
    <?php endif ?>
    <?php if($articles->pagination()->hasPrevPage()): ?>
    <a class="prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">newer posts</a>
    <?php endif ?>
  </nav>
<?php endif ?>