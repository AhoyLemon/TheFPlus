<h1>I EDITED THIS</h1>  
<section class="episodes summaries">
    <?php $articles = $site->grandChildren()->visible()->sortBy('date', 'desc')->paginate(9) ?>
    <?php foreach($articles as $article): ?>
      <article class="<?php echo html($article->parent()->slug()) ?> brief">
      <header>
        <h2 class="title">
          <a href="<?php echo $article->url() ?>" title="<?php echo html($article->title()) ?>">
            <?php echo html($article->title()) ?>
          </a>
        </h2>
        <?php if ($article->date() != ""):
  $pubdate = date('l, F jS Y', $article->date());
$pubtime = date("g:ia", strtotime($article->time()));
        ?>
        <time class="published" datetime="<?php echo html($article->date()) ?>">
          <?php echo $pubdate ?> @ <?php echo $pubtime; ?>
        </time>
        <?php endif ?>
      </header>
      <a class="image-holder" href="<?php echo $article->url() ?>">
        <?php if($image = $article->image()): ?>
        <img src="<?php echo $image->url() ?>" class="cover" />
        <?php endif ?>
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
        <div class="content">
          <p><?php echo excerpt($article->text(), 222) ?></p>
        </div>
      </summary>
      <span class="disqus-comment-count" data-disqus-identifier="<?php echo $article->uri(); ?>"></span>
    </article>
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