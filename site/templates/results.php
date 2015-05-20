<?php snippet('header') ?>

  <main class="main" role="main">

    
    <?php $ftag = urldecode (param('tag')); ?>
    <ul class="tags filtered">
      <label>browsing: </label>
      <li class="tag selected"><?php echo $ftag ?></li>
    </ul>
    
    <section class="results summaries">
        
      <?php foreach($site->grandChildren()->visible()->filterBy('tags', $ftag, ',')->paginate(12) as $article): ?>

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
          <?php if($image = $article->image()): ?>
            <a class="image-holder" href="<?php echo $article->url() ?>">
              <img src="<?php echo $image->url() ?>" class="cover" />
              <?php if ($article->tags() != ""):
                $etags = explode(",", $article->tags());
              ?>
              <div class="hover-cover">
                <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 41.9" xml:space="preserve">
                  <path d="M11.7,9.5c0-0.9-0.3-1.7-1-2.4c-0.7-0.7-1.5-1-2.4-1c-0.9,0-1.7,0.3-2.4,1C5.3,7.8,5,8.6,5,9.5s0.3,1.7,1,2.4c0.7,0.7,1.5,1,2.4,1c0.9,0,1.7-0.3,2.4-1C11.4,11.2,11.7,10.4,11.7,9.5z M39.9,24.7c0,0.9-0.3,1.7-1,2.4L25.9,40c-0.7,0.7-1.5,1-2.4,1c-0.9,0-1.7-0.3-2.4-1L2.3,21.2c-0.7-0.7-1.2-1.5-1.7-2.7s-0.7-2.2-0.7-3.1v-11c0-0.9,0.3-1.7,1-2.4s1.5-1,2.4-1h11c0.9,0,2,0.2,3.1,0.7s2,1,2.7,1.7l18.9,18.8C39.5,23,39.9,23.8,39.9,24.7L39.9,24.7z M50,24.7c0,0.9-0.3,1.7-1,2.4L36.1,40c-0.7,0.7-1.5,1-2.4,1c-0.6,0-1.2-0.1-1.6-0.4c-0.4-0.2-0.9-0.6-1.4-1.2l12.4-12.4c0.7-0.7,1-1.4,1-2.4c0-0.9-0.3-1.7-1-2.4L24.3,3.5c-0.7-0.7-1.6-1.2-2.7-1.7c-1.1-0.5-2.2-0.7-3.1-0.7h5.9c0.9,0,2,0.2,3.1,0.7c1.1,0.5,2,1,2.7,1.7L49,22.3C49.7,23,50,23.8,50,24.7z"/>
                </svg>
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
              <div class="author">
                Written by 
                <?php echo $article->author() ?>
              </div>
            <?php endif ?>
            <div class="content">
              <p><?php echo excerpt($article->text(), 222) ?></p>
            </div>
          </summary>
          <?php if ($article->parent()->slug() == "episode"): ?>
            <span class="episode-number"><?php echo $article->uid(); ?></span>
          <?php endif ?>
          <a class="disqus-comment-count" href="<?php echo $article->url() ?>#disqus_thread" data-disqus-identifier="<?php echo $article->uri(); ?>"></a>
        </article>

      <?php endforeach ?>
    </section>

  </main>

<?php snippet('disqus-alt', array('allow_comments' => false)) ?>
<?php snippet('footer') ?>