<?php snippet('header') ?>


<main class="main page" role="main">

  <meta http-equiv="last-modified" content="<?php echo $page->modified('Y-m-d@H:i:s'); ?>" />
  
  <div class="full marathon-block">
    <h1><?php echo $page->title(); ?></h1>
    
    <div class="recorded">
      <time>
        Recorded: 
        <span class="date">
          <?php echo date('l, F jS Y', strtotime($page->record_date_start())); ?>
        </span>
        @
        <span class="time">
          <?php echo date("g:ia", strtotime($page->record_time_start())); ?>
        </span>
        - 
        <span class="time">
          <?php echo date("g:ia", strtotime($page->record_time_end())); ?>
        </span>
        CST
      </time>
    </div>
    
    <div class="released">
      <time>
        Released: 
        <span class="date">
          <?php echo date('l, F jS Y', $page->date()); ?>
        </span>
        @
        <span class="time">
          <?php echo date("g:ia", strtotime($page->time())); ?>
        </span>
        CST
      </time>
    </div>
    
    <?php if ($page->text() != "") { ?>
      <summary class="info-block hours-leadin">
        <?php echo $page->text()->kirbytext() ?>
      </summary>
    <?php } ?>
    
    <div class="marathon-hours">
      <?php foreach ($page->hours()->toStructure() as $hour) { ?>

        <article class="marathon-hour full">

            <header>
              <h2 class="block-title">HOUR <?php echo $hour->hour(); ?>: <?php echo $hour->name(); ?></h2>
              <h5>
                provided by 
                <?php echo $hour->provider(); ?>
              </h5>
            </header> 
            <div class="video-holder">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hour->youtube_url(); ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="detail-holder">
              <ul class="cast authors ridiculists info-block">
                <?php 
                  $readers = explode(",", $hour->cast());
                  $plink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $hour->provider())));
                ?>
                <?php foreach($readers as $person): ?>
                  <?php $mlink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $person))); ?>
                  <?php if ($site->find($mlink)) { ?>
                    <li itemprop="actor" itemscope itemtype="http://schema.org/Person"><a itemprop="url" href="<?php echo url::home() ?>/<?php echo $mlink; ?>"><span itemprop="name"><?php echo $person ?></span></a></li>
                  <?php } else { ?>
                    <li itemprop="actor"><?php echo $person ?></li>
                  <?php } ?>
                <?php endforeach ?>
              </ul>
              <?php if ($hour->artist() != "") { ?>
                <?php 
                  $alink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $hour->artist())));
                ?>
                <div class="artist">
                  Art by 
                  <?php if ($site->find($alink)) { ?>
                    <a href="<?php echo $site->url(); ?>/<?php echo $alink; ?>">
                      <span>
                        <?php echo $hour->artist(); ?>
                      </span>
                    </a>
                  <?php } else { ?>
                    <span>
                      <?php echo $hour->artist(); ?>
                    </span>
                  <?php } ?>
                </div>
              <?php } ?>
              <summary>
                <a class="action read" href="<?php echo $hour->document_link() ?>" title="Read <?php echo $hour->provider() ?>'s document"  target="_blank">
                  <svg viewBox="0 0 100 100">
                    <use xlink:href="#IconDocument"></use>
                  </svg>
                </a>
                <?php echo $hour->text()->kirbytext(); ?>
              </summary>
            </div>
        </article>
      <?php } ?>
    </div>
    
    

    <?php /* <div class="episode-actions">
      
      <!-- Contribute To The F Plus -->
      <a class="social contribute" href="/contribute/" title="Contribute To The Podcast">
        <svg viewBox="0 0 100 100">
          <use class="top lid" xlink:href="#IconContributeTop"></use>
          <use class="bottom" xlink:href="#IconContributeBottom"></use>
        </svg>
        <span class="label">Contribute to the Podcast</span>
      </a>

      <!-- TWEET THIS -->
      <a class="social twitter" href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode($page->title()); ?>%0A&url=<?php echo rawurlencode($page->url()); ?>&via=TheFPlus" target="_blank" title="Tweet this">
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconTwitter"></use>
        </svg>
        <span class="label">Tweet this episode</span>
      </a>
      
      <!-- FACEBOOK SHARE -->
      <a class="social facebook" href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" title="Share on Facebook">
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconFacebook"></use>
        </svg>
        <span class="label">Share on Facebook</span>
      </a>
      
      
      
      <?php if (strpos($page->tags(), 'reddit') !== false) { ?>
        <!-- REDDIT SHARE -->
        <a class="social reddit" href="https://reddit.com/submit/?<?php echo rawurlencode ($page->url()); ?>" target="_blank" title="Share on Reddit">
          <svg viewBox="0 0 100 100">
            <use xlink:href="#IconReddit"></use>
          </svg>
          <span class="label">Share on Reddit</span>
        </a>
      <?php } else { ?>
        <!-- TUMBLR SHARE -->
        <a class="social tumblr" href="http://www.tumblr.com/share/link?url=<?php echo rawurlencode ($page->url()); ?>&amp;name=<?php echo rawurlencode ($page->title()); ?>&amp;description=<?php echo excerpt($page->text()->xml(), 180) ?>">
          <svg viewBox="0 0 100 100">
            <use xlink:href="#IconTumblr"></use>
          </svg>
          <span class="label">Post to Tumblr</span>
        </a>
      <?php } ?>
      
    </div> */ ?>

    <!-- ADDITIONAL FUN -->
    <?php if ($page->leadout() != "") { ?>
      <summary class="info-block hours-leadout">
        <?php echo $page->leadout()->kirbytext() ?>
      </summary>
    <?php } ?>
    
    <!-- LIVESTREAM GALLERY -->
    
    <summary class="info-block marathon-gallery button-holder">
      <a href="https://goo.gl/photos/t7iy7MhVPXNXJUKo9" target="_blank" class="button">All Livestream Art</a>
    </summary>
    
    <!-- EPISODE TAGS -->
    <?php if ($page->tags() != "") { ?>
      <?php $etags = explode(",", $page->tags()); ?>
      <div class="info-block episode-tags">
        <span class="label">Episode Tags:</span>
        <div style="font-size:1.4rem;">
          <?php foreach($etags as $etag): ?>
            <?php $tagmatches = $site->grandChildren()->filterBy('tags', $etag, ','); ?>
            <?php $x = 0; ?>
            <?php foreach($tagmatches as $tagmatch): $x = $x+1; ?>
            <?php endforeach ?>
            <a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo rawurlencode($etag) ?>" <?php endif ?>><?php echo trim($etag) ?></a>
          <?php endforeach ?>
        </div>
      </div>
    <?php } ?>
    
    
  </div>

  <section class="comments disqus">
    <?php snippet('disqus-alt', array('allow_comments' => true)) ?>
  </section>

</main>

<?php snippet('footer') ?>