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
      $plink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $page->provider())));
      $multisubmitter = false;
    }
  ?>

  <article class="episode full" itemscope itemtype="http://schema.org/RadioEpisode">
    <header>
      <h1>
        <span itemprop="episodeNumber" class="episode-number"><?php echo $page->uid() ?></span>:
        <span itemprop="name" class="episode-title"><?php echo $page->title() ?></span>
      </h1>

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
      <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="cover" alt="Adjudicated Guess Episode <?php echo $page->uid() ?>">
    <?php } else if($image = $page->image()) { ?>
      <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="Adjudicated Guess Episode <?php echo $page->uid() ?>">
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
    
    <div class="subscribe">
      <?php echo $page->parent()->subscribe()->kirbytext(); ?>
    </div>

    <div class="episode-actions">
      <!-- DOWNLOAD FILE -->
      <?php if ($page->episode_file() != ""): ?>
        <a itemprop="audio" class="action download" href="/podcasts/<?php echo $page->episode_file() ?>" title="Download episode" download>
          <svg viewBox="0 0 100 100">
            <use xlink:href="#IconDownload"></use>
          </svg>
          <span class="label go-right">Download this episode</span>
        </a>
      <?php endif; ?>

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
      <a class="social facebook" href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook">
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconFacebook"></use>
        </svg>
        <span class="label">Share on Facebook</span>
      </a>
      
      <a class="social tumblr" href="http://www.tumblr.com/share/link?url=<?php echo rawurlencode ($page->url()); ?>&amp;name=<?php echo rawurlencode ($page->title()); ?>&amp;description=<?php echo excerpt($page->text()->xml(), 180) ?>">
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconTumblr"></use>
        </svg>
        <span class="label">Post to Tumblr</span>
      </a>
         
    </div>

    
    <!-- SOURCES -->
    
    <?php if ($page->sources() != "") { ?>
      <div class="info-block sources">
        <b>Sources</b>
        <ul>
          <?php foreach ($page->sources()->toStructure() as $source) { ?>
            <li>
              <a href="<?php echo $source->url(); ?>" target="_blank">
                <?php echo $source->name(); ?>
              </a>
              <?php if ($source->provider() != "") { ?>
                ( <?php echo $source->provider(); ?> )
              <?php } ?>
            </li>
          <?php } ?>
        </ul>
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
    
    <?php echo $page->parent()->contribute()->kirbytext(); ?>
    
  </article>

  <section class="comments disqus">
    <?php snippet('disqus-alt', array('allow_comments' => true)) ?>
  </section>

</main>

<?php snippet('footer') ?>