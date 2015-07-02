<?php snippet('header') ?>


<main class="main page" role="main">

  <!-- SET UP VARIABLES -->
  <?php 
    $pubdate = date('l, F jS Y', $page->date());
    $pubtime = date("g:ia", strtotime($page->time()));
    $etags = explode(",", $page->tags());
    if (strpos($page->cast(),',') !== false) {
      $multiperson = true;
      $persons = explode(",", $page->cast()); 
    } else if ($page->cast() != '') {
      $multiperson = false;
    }
  ?>

  <article class="episode full" itemscope itemtype="https://schema.org/CreativeWork">
    <header>
      <h1><?php echo $page->title() ?></h1>

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
    <?php if( $image = $page->image()):  ?>
      <?php if(  $page->show_image() == 'true'):  ?>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $page->title() ?>">
      <?php endif ?>
    <?php endif ?>

    <!-- CAST LIST -->
    <?php if ($multiperson == true): ?>
      <ul class="cast authors ridiculists info-block">
        <?php foreach($persons as $person): ?>
        <li itemprop="contributor"><a href="<?php echo url::home() ?>/meet/<?php $clink = preg_replace('/\s+/', '-', $person); echo strtolower($clink) ?>"><?php echo $person ?></a></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>
    <?php if ($multiperson == false): ?>
      <div class="author info-block">
        by 
        <a href="<?php echo url::home() ?>/meet/<?php $clink = preg_replace('/\s+/', '-', $page->cast()); echo $clink ?>">
          <span itemprop="contributor"><?php echo $page->cast() ?></span>
        </a>
      </div>
    <?php endif ?>
    
    <!-- EPISODE SUMMARY TEXT -->
    <summary class="info-block" itemprop="description">
      <?php echo $page->text()->kirbytext() ?>
    </summary>

    <div class="otherproject-actions episode-actions">
      <?php if ($page->episode_file() != ""): ?>
        <!-- DOWNLOAD FILE -->
        <a itemprop="audio" class="action download" href="<?php echo $page->episode_file() ?>" title="Download episode" download>
          <svg class="download" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
            <path d="M96.2,47.4c0,11.4-9.3,20.7-20.7,20.7h-8.3v-9h8.3c6.5,0,11.7-5.3,11.7-11.7c0-8-5.4-12.1-11.1-12.1C75.8,22,67,16.2,58.4,16.2c-11.3,0-16,8.6-17.1,11.8c-4.6-6.7-17.1-1.6-14.5,7.3c-7.8-1.4-14,4.4-14,12.1c0,6.5,5.3,11.7,12,11.7h11.4v9H24.8c-11.7,0-21-9.3-21-20.7c0-9.3,6.2-17.3,14.9-19.9c2.4-8.3,11.2-13.2,19.5-11c5-5.9,12.3-9.4,20.2-9.4c12.8,0,23.7,9.2,26,21.5C91.6,32.1,96.2,39.3,96.2,47.4z M68.2,76.3h-7.6V59.1H42.7v17.1h-7.6l16.5,16.6L68.2,76.3z"/>
          </svg>
        </a>
      <?php endif ?>
			<div class="audio-holder">
				<!-- AUDIO CONTAINER -->
				<?php if ($page->episode_file() != ""): ?>
					<audio src="<?php echo $page->episode_file() ?>" preload="none" controls></audio>
				<?php endif ?>
			</div>

      <span class="share-label">share: </span>

      <!-- TWEET THIS -->
      <?php if ($page->category() != "wrongest"): ?>
        <a class="social twitter" href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->url()); ?>%20<?php echo ('via @TheFPlus')?>" target="blank" title="Tweet this">
      <?php endif ?>
      <?php if ($page->category() == "wrongest"): ?>
        <a class="social twitter" href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fwrongest.net&amp;text=Playing%20The%20Wrongest%20Words%20gets%20you%20laid!&amp;via=WrongestWords" target="blank" title="Tweet this">
      <?php endif ?>
        <svg class="bird" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
          <path d="M98.1,20.2c-3.5,1.6-7.3,2.6-11.3,3.1c4.1-2.4,7.2-6.3,8.7-10.9c-3.8,2.3-8,3.9-12.5,4.8c-3.6-3.8-8.7-6.2-14.4-6.2c-10.9,0-19.7,8.8-19.7,19.7c0,1.5,0.2,3.1,0.5,4.5c-16.4-0.8-30.9-8.7-40.7-20.6c-1.7,2.9-2.7,6.3-2.7,9.9c0,6.8,3.5,12.9,8.8,16.4c-3.2-0.1-6.3-1-8.9-2.5c0,0.1,0,0.2,0,0.2c0,9.6,6.8,17.5,15.8,19.4c-1.7,0.5-3.4,0.7-5.2,0.7c-1.3,0-2.5-0.1-3.7-0.4c2.5,7.8,9.8,13.5,18.4,13.7c-6.8,5.3-15.3,8.4-24.5,8.4c-1.6,0-3.2-0.1-4.7-0.3c8.7,5.6,19.1,8.9,30.3,8.9c36.3,0,56.2-30.1,56.2-56.2c0-0.9,0-1.7-0.1-2.6C92.1,27.6,95.5,24.1,98.1,20.2z"/>
        </svg>
      </a>

      <?php if ($page->category() != "wrongest"): ?>
      <!-- GOOGLE+ SHARE -->
        <a class="social googleplus" href="https://plusone.google.com/_/+1/confirm?hl=de&url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title()); ?>" target="blank" title="Share on Google+">
          <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
            <path d="M49.1,32.4c-1-7.2-5.6-13.1-11.1-13.3c-5.5-0.2-9.2,5.4-8.2,12.6c0.9,7.2,6.2,12.3,11.7,12.4C46.9,44.2,50.1,39.6,49.1,32.4z"/>
            <path d="M91.9,3.3H9.2C6,3.3,3.3,6,3.3,9.2v82.7c0,3.3,2.6,5.9,5.9,5.9h82.7c3.3,0,5.9-2.6,5.9-5.9V9.2C97.8,6,95.2,3.3,91.9,3.3zM39.2,85.3c-11.8,0-21.7-5.1-21.7-13.7c0-6.6,4.2-15.2,23.8-15.2c-2.9-2.4-3.6-5.7-1.8-9.3c-11.5,0-17.4-6.7-17.4-15.3c0-8.4,6.2-16,19-16c3.2,0,20.4,0,20.4,0l-4.6,4.6h-5.3c3.8,2.3,5.8,6.7,5.8,11.6c0,4.5-2.5,8.2-6,11c-6.3,4.9-4.7,7.6,1.9,12.4c6.5,4.9,8.6,8.6,8.6,14.4C61.8,76.7,55.4,85.3,39.2,85.3z M84.1,49.4h-8v8h-4.8v-8h-7.7v-4.8h7.7v-7.7h4.8v7.7h8V49.4z"/>
            <path d="M40.3,58.8c-8.2-0.1-15.1,5.2-15.1,11.3c0,6.2,5.9,11.4,14.1,11.4c10.5,0,15.5-4.9,15.5-11.1C54.8,64.5,49.4,58.8,40.3,58.8z"/>
          </svg>
        </a>
      <?php endif ?>
          
      <?php if ($page->category() == "wrongest"): ?>
        <!-- GITHUB -->
        <a class="social github" data-network="GitHub" href="https://github.com/AnotherDole/wrongest/" title="Contribute on GitHub">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M50.7,4.5c-26,0-47.1,21.1-47.1,47.1c0,20.8,13.5,38.4,32.2,44.7c2.4,0.4,3.2-1,3.2-2.3c0-1.1,0-4.1-0.1-8c-13.1,2.8-15.9-6.3-15.9-6.3c-2.1-5.4-5.2-6.9-5.2-6.9c-4.3-2.9,0.3-2.9,0.3-2.9c4.7,0.3,7.2,4.9,7.2,4.9c4.2,7.2,11,5.1,13.7,3.9c0.4-3,1.6-5.1,3-6.3c-10.5-1.2-21.4-5.2-21.4-23.3c0-5.1,1.8-9.3,4.8-12.6c-0.5-1.2-2.1-6,0.5-12.5c0,0,4-1.3,12.9,4.8c3.8-1,7.8-1.6,11.8-1.6c4,0,8,0.5,11.8,1.6c9-6.1,12.9-4.8,12.9-4.8c2.6,6.5,1,11.3,0.5,12.5c3,3.3,4.8,7.5,4.8,12.6c0,18.1-11,22.1-21.5,23.2c1.7,1.5,3.2,4.3,3.2,8.7c0,6.3-0.1,11.4-0.1,12.9c0,1.3,0.8,2.7,3.2,2.3C84.3,90,97.7,72.4,97.7,51.6C97.7,25.6,76.6,4.5,50.7,4.5z"/>
          </svg>
        </a>
      <?php endif ?>
      
      <!-- FLATTR TIP -->
      <?php if ($page->category() != "wrongest"): ?>
        <a class="social flattr" href="https://flattr.com/submit/auto?user_id=TheFPlus&url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title()); ?>" target="_blank" title="Tip us with Flattr">
      <?php endif ?>
      <?php if ($page->category() == "wrongest"): ?>
        <a class="social flattr" data-network="Flattr" href="https://flattr.com/submit/auto?url=http%3A%2F%2Fwrongest.net%2F&amp;user_id=thefplus&amp;title=The%20Wrongest%20Words" title="Tip us with Flattr">
      <?php endif ?>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
          <path class="top-left" fill="#f9ad33" d="M38.7,7.3C18.6,7.3,8.3,18.9,8.3,40.6l0,0v15.1V86L28,66.2V43.2c0-9,2.4-14.7,10.3-15.9l0,0c2.8-0.5,8.6-0.4,12.3-0.4l0,0v13.7c0,0.1,0,0.3,0,0.5l0,0c0.2,0.6,0.7,1,1.2,1l0,0c0.3,0,0.7-0.2,1-0.5l0,0L87.1,7.3l-22.9,0H38.7z"/>
          <path class="bottom-right" fill="#89b443" d="M73.3,33.1v23.1c0,9-2.4,14.7-10.3,15.9l0,0c-2.8,0.5-8.6,0.4-12.3,0.4l0,0V58.8c0-0.1,0-0.3,0-0.5l0,0c-0.2-0.6-0.7-1-1.2-1l0,0c-0.3,0-0.7,0.2-1,0.5l0,0L14.2,92l22.9,0h25.4C82.7,92,93,80.4,93,58.8l0,0V43.7V13.4L73.3,33.1z"/>
        </svg>
      </a>

      <!-- FACEBOOK SHARE -->
      <a class="social facebook" href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook">
        <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
          <path d="M92.1,3.3H8.5c-2.9,0-5.2,2.3-5.2,5.2v83.6c0,2.9,2.3,5.2,5.2,5.2h45V60.9H41.3V46.7h12.2V36.3c0-12.1,7.4-18.7,18.2-18.7c5.2,0,9.6,0.4,10.9,0.6v12.7l-7.5,0c-5.9,0-7,2.8-7,6.9v9.1h14l-1.8,14.2H68.2v36.4h23.9c2.9,0,5.2-2.3,5.2-5.2V8.5C97.3,5.7,95,3.3,92.1,3.3z"/>
        </svg>
      </a>
    </div>

    <!-- TAGS -->
    <div class="info-block episode-tags">
      <span class="label">Tags:</span>
      <ul itemprop="keywords" content="<?php echo $page->tags() ?>">
        <?php foreach($etags as $etag): ?>
          <?php $tagmatches = $site->grandChildren()->filterBy('tags', $etag, ','); ?>
          <?php $x = 0; ?>
          <?php foreach($tagmatches as $tagmatch): $x = $x+1; ?>
          <?php endforeach ?>
          <a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo trim($etag) ?>" <?php endif ?>><?php echo trim($etag) ?></a>
        <?php endforeach ?>
      </ul>
    </div>

    <!-- BONUS CONTENT -->
    <?php if ($page->bonus_content() != ""): ?>
      <div class="info-block custom-html">
        <?php echo $page->bonus_content()->kirbytext() ?>
      </div>
    <?php endif ?>
  </article>

  <section class="comments disqus">
    <?php snippet('disqus-alt', array('allow_comments' => true)) ?>
  </section>

</main>

<?php snippet('footer') ?>