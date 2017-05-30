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
    if (strpos($page->provider(),',') !== false) {
      $submitters = explode(",", $page->provider());
      $multisubmitter = true;
    } else if ($page->provider() != "") {
      $plink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $page->provider())));
      $multisubmitter = false;
    }
  ?>

  <meta http-equiv="last-modified" content="<?php echo $page->modified('Y-m-d@H:i:s'); ?>" />
  
  <article class="episode full" itemscope itemtype="http://schema.org/RadioEpisode">
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
    
    <?php if($page->cover() != "") { ?>
      <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="cover" alt="F Plus Episode <?php echo $page->uid() ?>">
    <?php } else if($image = $page->image()) { ?>
      <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="F Plus Episode <?php echo $page->uid() ?>">
    <?php } ?>

    <!-- CAST LIST -->
    <ul class="cast authors ridiculists info-block">
      <?php foreach($persons as $person): ?>
        <?php $mlink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $person))); ?>
        <?php if ($site->find($mlink)) { ?>
          <li itemprop="actor" itemscope itemtype="http://schema.org/Person"><a itemprop="url" href="<?php echo url::home() ?>/<?php echo $mlink; ?>"><span itemprop="name"><?php echo $person ?></span></a></li>
        <?php } else { ?>
          <li itemprop="actor"><?php echo $person ?></li>
        <?php } ?>
      <?php endforeach ?>
    </ul>
    
    <div class="info-block">
      <!-- CONTENT PROVIDER -->
      <?php if ($page->provider() != ""): ?>
        <div class="content-provider">
          <label>Content for this episode was compiled by</label>
            <?php if ($multisubmitter == false) { ?>
              <?php if ($site->find($plink)) { ?>
                <span itemprop="contributor" itemscope itemtype="http://schema.org/Person">
                  <a itemprop="url" href="<?php echo url::home() ?>/<?php echo $plink; ?>">
                    <span itemprop="name" class="provider"><?php echo $page->provider() ?></span>
                  </a>
                </span>
              <?php } else { ?>
                <span itemprop="contributor" class="provider"><?php echo $page->provider() ?></span>
              <?php } ?>
            <?php } else if ($multisubmitter == true) { ?>
              <?php foreach($submitters as $submitter): ?>
                <?php $sublink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $submitter))); ?>
                <?php if ($site->find($sublink)) { ?>
                  <span itemprop="contributor" itemscope itemtype="http://schema.org/Person" class="multi">
                    <a itemprop="url" href="<?php echo url::home() ?>/<?php echo $sublink; ?>">
                      <span itemprop="name" class="provider"><?php echo $submitter; ?></span>
                    </a>
                  </span>
                <?php } else { ?>
                  <span itemprop="name" class="provider multi"><?php echo $submitter; ?></span>
                <?php } ?>
              <?php endforeach ?>
            <?php } ?>
        </div>
      <?php endif ?>

      <!-- EDITOR -->
      <?php if ($page->editor() != ""): ?>
        <div class="edited-by">
          <label>Edited by</label>
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
        <ol itemprop="musicBy" itemscope itemtype="http://schema.org/MusicPlaylist">
          <?php foreach($songs as $song): ?>
          <li itemprop="track" itemscope itemtype="http://schema.org/MusicRecording">
            <span itemprop="name"><?php echo trim($song) ?></span>
          </li>
          <?php endforeach ?>
        </ol>
      </div>
    <?php endif ?>

    <div class="episode-actions">
      <!-- DOWNLOAD FILE -->
      <?php if ($page->episode_file() != ""): ?>
        <a itemprop="audio" class="action download" href="<?= $site->url(); ?>/podcasts/<?php echo $page->episode_file() ?>" title="Download episode" download>
          <svg viewBox="0 0 100 100">
            <use xlink:href="#IconDownload"></use>
          </svg>
          <span class="label go-right">Download this episode</span>
        </a>
      <?php endif; ?>

      <!-- READ DOCUMENT -->
      <?php if ($page->document_link() != ""): ?>
        <a itemprop="citation" class="action read" href="<?php echo $page->document_link() ?>" title="Read <?php echo $page->provider() ?>'s document"  target="_blank">
          <svg viewBox="0 0 100 100">
            <use xlink:href="#IconDocument"></use>
          </svg>
          <span class="label go-right">Read <?php echo $page->provider() ?>'s document</span>
        </a>
      <?php endif ?>

      <!-- AUDIO CONTAINER -->
      <?php if ($page->episode_file() != ""): ?>
        <div class="audio-holder" itemprop="audio">
          <audio src="/podcasts/<?php echo $page->episode_file() ?>" preload="none" controls></audio>
        </div>
      <?php endif; ?>
      
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
      
    </div>

    <!-- EPISODE TAGS -->
    <?php if ($page->tags() != "") { ?>
      <div class="info-block episode-tags">
        <span class="label">Episode Tags:</span>
        <div itemprop="keywords" content="<?php echo $page->tags() ?>">
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

    <!-- ADDITIONAL FUN -->
    <?php if ($page->bonus_content() != ""): ?>
      <div class="info-block additional-fun">
        <a name="AdditionalFun"></a>
        <h4>Additional Fun</h4>
        <?php echo $page->bonus_content()->kirbytext() ?>
      </div>
    <?php endif ?>
    
  </article>

  <section class="comments disqus">
    <?php snippet('disqus-alt', array('allow_comments' => true)) ?>
  </section>

</main>

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "<?php echo $page->parent()->url(); ?>",
        "url": "<?php echo $page->parent()->url(); ?>",
        "name": "<?php echo $page->parent()->title(); ?>"
      }
    },{
      "@type": "ListItem",
      "position": 3,
      "item": {
        "@id": "<?php echo $page->url(); ?>",
        "url": "<?php echo $page->url(); ?>",
        "name": "<?php echo $page->title(); ?>"
      }
    }]
  }
</script>


<?php snippet('footer') ?>