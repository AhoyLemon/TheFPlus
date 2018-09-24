<?php snippet('header') ?>


<main class="main page" role="main">

  <!-- SET UP VARIABLES -->
  <?php 
    $pubdate = date('l, F jS Y', $page->date());
    $pubtime = date("g:ia", strtotime($page->time()));
    if ($page->cast() == "") {
      $multiperson = false;
    } else if (strpos($page->cast(),',') !== false) {
      $multiperson = true;
      $persons = explode(",", $page->cast()); 
    } else if ($page->cast() != '') {
      $multiperson = false;
    }
  ?>

  <article class="episode full" itemscope itemtype="https://schema.org/CreativeWork">
    <header>
      <h1 itemprop="name"><?php echo $page->title() ?></h1>

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
      <?php if($page->show_image() == 'true'):  ?>
        <?php if ($page->show_different_image() == "yes" && $page->page_image()->isNotEmpty()) { ?>
          <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->page_image()->filename() ?>" class="cover" alt="<?php echo $page->title() ?>">
        <?php } else if ($page->cover() != "") { ?>
          <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="cover" alt="<?php echo $page->title() ?>">
        <?php } else { ?>
          <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $page->title() ?>">
        <?php } ?>
      <?php endif ?>
    <?php endif ?>

    <!-- CAST LIST -->
    <?php if ($page->cast() != ""): ?>
      <?php if ($multiperson == true): ?>
        <ul class="cast authors ridiculists info-block">
          <?php foreach($persons as $person): ?>
          <li itemprop="contributor" itemscope itemtype="http://schema.org/Person">
            <a itemprop="url" href="<?php echo url::home() ?>/meet/<?php $clink = preg_replace('/\s+/', '-', $person); echo strtolower($clink) ?>">
              <span itemprop="name"><?php echo $person ?></span>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
      <?php if ($multiperson == false): ?>
        <div class="author info-block">
          by 
          <span itemprop="author" itemscope itemtype="http://schema.org/Person">
            <a itemprop="url" href="<?php echo url::home() ?>/meet/<?php $clink = preg_replace('/\s+/', '-', $page->cast()); echo $clink ?>">
              <span itemprop="name" class="provider"><?php echo $page->cast() ?></span>
            </a>
          </span>
        </div>
      <?php endif ?>
    <?php endif ?>

    <!-- SUMMARY TEXT -->
    <div class="article-text">
      <summary class="info-block" itemprop="description" content="<?php echo excerpt($page->text(), 222) ?>">
        <?php echo $page->text()->kirbytext() ?>
      </summary>
    </div>

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
      
      
      <!-- Contribute To The F Plus -->
      <a class="social contribute" href="/contribute/" title="Contribute To The Podcast">
        <svg viewBox="0 0 100 100">
          <use class="top lid" xlink:href="#IconContributeTop"></use>
          <use class="bottom" xlink:href="#IconContributeBottom"></use>
        </svg>
        <span class="label">Contribute to the Podcast</span>
      </a>
      
      <!-- Fork on GitHub -->
      <?php if ($page->github_repo() != ""): ?>
        <a class="social github" data-network="GitHub" href="<?php echo $page->github_repo(); ?>" title="Fork on GitHub" target="_blank">
          <svg viewBox="0 0 100 100">
            <use xlink:href="#IconGitHub"></use>
          </svg>
          <span class="label">Fork on GitHub</span>
        </a>
      <?php endif ?>

      <!-- TWEET THIS -->
      <?php if ($page->tweet_intent() != "") { ?>
        <a class="social twitter" href="<?php echo $page->tweet_intent(); ?>" target="blank" title="Tweet this">
      <?php } else { ?>
        <a class="social twitter" href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->url()); ?>%20<?php echo ('via @TheFPlus')?>" target="blank" title="Tweet this">
      <?php } ?>
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconTwitter"></use>
        </svg>
        <span class="label">Tweet this</span>
      </a>
          
      <!-- FACEBOOK SHARE -->
      <a class="social facebook" href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook">
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconFacebook"></use>
        </svg>
        <span class="label">Share on Facebook+</span>
      </a>
          
      <a class="social tumblr" href="http://www.tumblr.com/share/link?url=<?php echo rawurlencode ($page->url()); ?>&amp;name=<?php echo rawurlencode ($page->title()); ?>&amp;description=<?php echo excerpt($page->text()->xml(), 180) ?>">
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconTumblr"></use>
        </svg>
        <span class="label">Post to Tumblr</span>
      </a>
      
    </div>
      
    <?php if ($page->photos() != "") { ?>
      <div class="product-photos" style="margin-top:3em;">
        <?php if ($page->photos_leadin() != "") { ?>
          <h3><?= $page->photos_leadin(); ?></h3>
        <?php } ?>
        <?php foreach($page->photos()->toStructure()->sortBy('series_num', 'desc') as $photo): ?>
          <div class="photo-holder">
            <?php if ($photo->full_size() != "") { ?>
              <a onclick="window.open('<?= $photo->full_size()->toFile()->url() ?>', 'popupWindow', 'width=<?php echo $photo->full_size()->toFile()->width(); ?>,height=<?php echo $photo->full_size()->toFile()->height(); ?>');" class="zoom">
                  <img src="<?php echo $page->url() ?>/<?php echo $photo->pic()->filename() ?>" data-series="<?php echo $photo->series_num(); ?>" alt="<?php echo $photo->desc(); ?>" />
              </a>
            <?php } else { ?>
              <img src="<?php echo $page->url() ?>/<?php echo $photo->pic()->filename() ?>" data-series="<?php echo $photo->series_num(); ?>" alt="<?php echo $photo->desc(); ?>" />
            <?php } ?>
          </div>
        <?php endforeach; ?>
        <div class="share-your-photo">
          <?php echo $page->share_cta()->kirbytext(); ?>
        </div>
      </div>
    <?php } ?>  
    

    <?php snippet('tags') ?>

    <!-- BONUS CONTENT -->
    <?php if ($page->bonus_content() != ""): ?>
      <a name="AdditionalFun"></a>
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