<?php snippet('header') ?>


<main class="main page" role="main">

  <!-- SET UP VARIABLES -->
  <?php 
  $persons = explode(",", $page->cast()); 
$pubdate = date('l, F jS Y', $page->date());
$pubtime = date("g:ia", strtotime($page->time()));
if (strpos($page->featured_site(),',') !== false) {
  $multisite = true;
  $fsites = explode(",", $page->featured_site()); 
} else if ($page->featured_site() != '') {
  $multisite = false;
}
$etags = explode(",", $page->tags());
$songs = explode(",", $page->music_used());
  ?>

  <article class="episode full" itemscope itemtype="https://schema.org/RadioEpisode">
    <header>
      <h1>
        <span itemprop="episodeNumber" class="episode-number"><?php echo $page->uid() ?></span>:
        <span itemprop="name" class="episode-title"><?php echo $page->title() ?></span>
      </h1>

      <!-- FEATURED SITES -->
      <?php if ($page->featured_site() != ""): ?>
        <?php if ($multisite == true): ?>
        <div class="featured-site">
          Featured Sites: 
          <?php foreach($fsites as $fsite): ?>
          <span class="site"><?php echo trim($fsite) ?></span>
          <?php endforeach ?>
        </div>
        <?php endif ?>
        <?php if ($multisite == false): ?>
        <div class="featured-site">
          Featured Site:
          <span class="site">
            <?php echo trim($page->featured_site()) ?>
          </span>
          <?php endif ?>
        </div>
      <?php endif ?>

      <!-- DATE & TIME -->
      <time class="released" itemprop="datePublished" content="<?php echo $page->date('Y-m-d'); ?>T<?php echo $page->time(); ?>+06:00">
        <span class="date">
          <?php echo $pubdate ?>
        </span>
        @
        <span class="time">
          <?php echo $pubtime; ?>
        </span>
      </time>
    </header>

    <?php if($image = $page->image()): ?>
      <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="F Plus Episode <?php echo $page->uid() ?>">
    <?php endif ?>

    <!-- CAST LIST -->
    <ul class="cast authors ridiculists info-block">
      <?php foreach($persons as $person): ?>
        <li itemprop="actor">
          <a href="<?php echo url::home() ?>/meet/<?php $clink = preg_replace('/\s+/', '-', $person); echo strtolower($clink) ?>">
            <span><?php echo $person ?></span>
          </a>
      </li>
      <?php endforeach ?>
    </ul>
    
    <div class="info-block">
      <!-- CONTENT PROVIDER -->
      <?php if ($page->provider() != ""): ?>
        <div class="content-provider">
          <label>content for this episode was compiled by</label>
          <a href="<?php echo url::home() ?>/meet/<?php $plink = strtolower(preg_replace('/\s+/', '-', $page->provider())); echo strtolower($plink) ?>">
            <span itemprop="contributor" class="provider"><?php echo $page->provider() ?></span>
          </a>
        </div>
      <?php endif ?>

      <!-- EDITOR -->
      <?php if ($page->editor() != ""): ?>
        <div class="edited-by">
          <label>edited by</label>
          <span class="editor" itemprop="editor">
            <?php echo $page->editor() ?>
          </span>
        </div>
      <?php endif ?>
    </div>


    <!-- EPISODE SUMMARY TEXT -->
    <summary class="info-block" itemprop="description">
      <?php echo $page->text()->kirbytext() ?>
    </summary>

    <!-- MUSIC USED -->
    <?php if ($page->music_used() != ""): ?>
      <div class="music-used info-block">
        <span class="list-leader">MUSIC USED:</span>
        <ol itemscope itemtype="http://schema.org/MusicPlaylist">
          <?php foreach($songs as $song): ?>
          <li itemprop="track"><?php echo trim($song) ?></li>
          <?php endforeach ?>
        </ol>
      </div>
    <?php endif ?>

    <div class="episode-actions">
      <!-- DOWNLOAD FILE -->
      <a itemprop="audio" class="action download" href="<?php echo $page->episode_file() ?>" title="Download episode" download>
        <svg class="download" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
          <path d="M96.2,47.4c0,11.4-9.3,20.7-20.7,20.7h-8.3v-9h8.3c6.5,0,11.7-5.3,11.7-11.7c0-8-5.4-12.1-11.1-12.1C75.8,22,67,16.2,58.4,16.2c-11.3,0-16,8.6-17.1,11.8c-4.6-6.7-17.1-1.6-14.5,7.3c-7.8-1.4-14,4.4-14,12.1c0,6.5,5.3,11.7,12,11.7h11.4v9H24.8c-11.7,0-21-9.3-21-20.7c0-9.3,6.2-17.3,14.9-19.9c2.4-8.3,11.2-13.2,19.5-11c5-5.9,12.3-9.4,20.2-9.4c12.8,0,23.7,9.2,26,21.5C91.6,32.1,96.2,39.3,96.2,47.4z M68.2,76.3h-7.6V59.1H42.7v17.1h-7.6l16.5,16.6L68.2,76.3z"/>
        </svg>
      </a>

      <!-- READ DOCUMENT -->
      <?php if ($page->document_link() != ""): ?>
        <a itemprop="citation" class="action read" href="<?php echo $page->document_link() ?>" title="Read <?php echo $page->provider() ?>'s document"  target="_blank">
          <svg class="document" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
            <path d="M72.9,61.3H40.4v-7.1h32.4L72.9,61.3L72.9,61.3z M72.9,45.9H40.4v-7.1h32.4L72.9,45.9L72.9,45.9z M72.9,30.4H40.4v-7.1h32.4L72.9,30.4L72.9,30.4z M17,89.4V11.1H83c0,0,0,44,0,51.5c0,14.9-18.4,8.9-18.4,8.9s5.6,18-8.3,18C48.7,89.4,45,89.4,17,89.4z M92.4,63.4V1.7H7.6v97.2h48.9C72.5,98.9,92.4,77.9,92.4,63.4z M30.5,22.8c-2.3,0-4.1,1.8-4.1,4.1c0,2.3,1.8,4.1,4.1,4.1c2.3,0,4.1-1.8,4.1-4.1C34.5,24.6,32.7,22.8,30.5,22.8z M30.5,38.4c-2.3,0-4.1,1.8-4.1,4.1c0,2.3,1.8,4.1,4.1,4.1c2.3,0,4.1-1.8,4.1-4.1C34.5,40.2,32.7,38.4,30.5,38.4z M30.5,53.6c-2.3,0-4.1,1.8-4.1,4.1c0,2.3,1.8,4.1,4.1,4.1c2.3,0,4.1-1.8,4.1-4.1C34.5,55.5,32.7,53.6,30.5,53.6z"/>
          </svg>
        </a>
      <?php endif ?>

      <!-- AUDIO CONTAINER -->
      <div class="audio-holder">
        <audio src="<?php echo $page->episode_file() ?>" preload="none" controls></audio>
      </div>

      <span class="share-label">share: </span>

      <!-- TWEET THIS -->
      <a class="social twitter" href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->url()); ?>%20<?php echo ('via @TheFPlus')?>" target="_blank" title="Tweet this">
        <svg class="bird" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
          <path d="M98.1,20.2c-3.5,1.6-7.3,2.6-11.3,3.1c4.1-2.4,7.2-6.3,8.7-10.9c-3.8,2.3-8,3.9-12.5,4.8c-3.6-3.8-8.7-6.2-14.4-6.2c-10.9,0-19.7,8.8-19.7,19.7c0,1.5,0.2,3.1,0.5,4.5c-16.4-0.8-30.9-8.7-40.7-20.6c-1.7,2.9-2.7,6.3-2.7,9.9c0,6.8,3.5,12.9,8.8,16.4c-3.2-0.1-6.3-1-8.9-2.5c0,0.1,0,0.2,0,0.2c0,9.6,6.8,17.5,15.8,19.4c-1.7,0.5-3.4,0.7-5.2,0.7c-1.3,0-2.5-0.1-3.7-0.4c2.5,7.8,9.8,13.5,18.4,13.7c-6.8,5.3-15.3,8.4-24.5,8.4c-1.6,0-3.2-0.1-4.7-0.3c8.7,5.6,19.1,8.9,30.3,8.9c36.3,0,56.2-30.1,56.2-56.2c0-0.9,0-1.7-0.1-2.6C92.1,27.6,95.5,24.1,98.1,20.2z"/>
        </svg>
      </a>

      <!-- GOOGLE+ SHARE -->
      <a class="social googleplus" href="https://plus.google.com/share?url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title()); ?>" target="_blank" title="Share on Google+"> 
        <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
          <path d="M49.1,32.4c-1-7.2-5.6-13.1-11.1-13.3c-5.5-0.2-9.2,5.4-8.2,12.6c0.9,7.2,6.2,12.3,11.7,12.4C46.9,44.2,50.1,39.6,49.1,32.4z"/>
          <path d="M91.9,3.3H9.2C6,3.3,3.3,6,3.3,9.2v82.7c0,3.3,2.6,5.9,5.9,5.9h82.7c3.3,0,5.9-2.6,5.9-5.9V9.2C97.8,6,95.2,3.3,91.9,3.3zM39.2,85.3c-11.8,0-21.7-5.1-21.7-13.7c0-6.6,4.2-15.2,23.8-15.2c-2.9-2.4-3.6-5.7-1.8-9.3c-11.5,0-17.4-6.7-17.4-15.3c0-8.4,6.2-16,19-16c3.2,0,20.4,0,20.4,0l-4.6,4.6h-5.3c3.8,2.3,5.8,6.7,5.8,11.6c0,4.5-2.5,8.2-6,11c-6.3,4.9-4.7,7.6,1.9,12.4c6.5,4.9,8.6,8.6,8.6,14.4C61.8,76.7,55.4,85.3,39.2,85.3z M84.1,49.4h-8v8h-4.8v-8h-7.7v-4.8h7.7v-7.7h4.8v7.7h8V49.4z"/>
          <path d="M40.3,58.8c-8.2-0.1-15.1,5.2-15.1,11.3c0,6.2,5.9,11.4,14.1,11.4c10.5,0,15.5-4.9,15.5-11.1C54.8,64.5,49.4,58.8,40.3,58.8z"/>
        </svg>
      </a>
      
      <!-- FLATTR TIP -->
      <a class="social flattr" href="https://flattr.com/submit/auto?user_id=TheFPlus&url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title()); ?>" target="_blank" title="Tip us with Flattr">
        <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 400 400" xml:space="preserve">
          <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
            <path d="M37.1,3.3C14.7,3.3,3.3,16.2,3.3,40.2l0,0V57v33.6l21.9-21.9V43.1c0-10,2.6-16.3,11.5-17.7l0,0c3.1-0.6,9.5-0.4,13.6-0.4l0,0v15.2c0,0.1,0,0.4,0.1,0.5l0,0c0.2,0.6,0.7,1.1,1.4,1.1l0,0c0.4,0,0.7-0.2,1.1-0.5l0,0L90.8,3.3l-25.5,0H37.1z M75.5,31.9v25.6c0,10-2.6,16.3-11.5,17.7l0,0c-3.1,0.6-9.5,0.4-13.6,0.4l0,0V60.5c0-0.1,0-0.4-0.1-0.5l0,0c-0.2-0.6-0.7-1.1-1.4-1.1l0,0c-0.4,0-0.7,0.2-1.1,0.5l0,0L9.9,97.4l25.5,0h28.3c22.4,0,33.8-12.9,33.8-36.9l0,0V43.7V10L75.5,31.9z"/>
          </svg>
        </svg>
      </a>

      <!-- FACEBOOK SHARE -->
      <a class="social facebook" href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook">
        <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
          <path d="M92.1,3.3H8.5c-2.9,0-5.2,2.3-5.2,5.2v83.6c0,2.9,2.3,5.2,5.2,5.2h45V60.9H41.3V46.7h12.2V36.3c0-12.1,7.4-18.7,18.2-18.7c5.2,0,9.6,0.4,10.9,0.6v12.7l-7.5,0c-5.9,0-7,2.8-7,6.9v9.1h14l-1.8,14.2H68.2v36.4h23.9c2.9,0,5.2-2.3,5.2-5.2V8.5C97.3,5.7,95,3.3,92.1,3.3z"/>
        </svg>
      </a>
    </div>

    <!-- EPISODE TAGS -->
    <div class="info-block episode-tags">
      <span class="label">Episode Tags:</span>
      <ul itemprop="keywords" content="<?php echo $page->tags() ?>">
        <?php foreach($etags as $etag): ?>
          <?php $tagmatches = $site->grandChildren()->filterBy('tags', $etag, ','); ?>
          <?php $x = 0; ?>
          <?php foreach($tagmatches as $tagmatch): $x = $x+1; ?>
          <?php endforeach ?>
          <a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo rawurlencode($etag) ?>" <?php endif ?>><?php echo trim($etag) ?></a>
        <?php endforeach ?>
      </ul>
    </div>

    <!-- ADDITIONAL FUN -->
    <?php if ($page->bonus_content() != ""): ?>
      <div class="info-block custom-html">
        <h4>Additional Fun</h4>
        <?php echo $page->bonus_content()->kirbytext() ?>
      </div>
    <?php endif ?>
    
  </article>

  <section class="comments disqus">
    <?php snippet('disqus-alt', array('allow_comments' => true)) ?>
  </section>

</main>

<?php snippet('footer') ?>