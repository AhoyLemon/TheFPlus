<?php snippet('header') ?>


<main class="main page" role="main">

  <!-- SET UP VARIABLES -->
  <?php 
    $pubdate = date('l, F jS Y', $page->date());
    $pubtime = date("g:ia", strtotime($page->time()));
    $etags = explode(",", $page->tags());
  ?>

  <article class="blog full" itemscope itemtype="http://schema.org/BlogPosting">
    <header>
      <h1 itemprop="name"><?php echo $page->title() ?></h1>
      <!-- DATE & TIME -->
      <time class="released">
        <span class="date" itemprop="datePublished" content="<?php echo $page->date('Y-m-d'); ?>T<?php echo $page->time(); ?>+06:00">
          <?php echo $pubdate; ?>
        </span>
        @
        <span class="time">
          <?php echo $pubtime; ?>
        </span>
      </time>
      <!-- AUTHOR -->
      <?php if ($page->author() != ""): ?>
        <h4 class="author">
          <span>by</span>
          <a href="<?php echo url::home() ?>/meet/<?php $plink = strtolower(preg_replace('/\s+/', '-', $page->author())); echo $plink ?>">
            <span itemprop="author"><?php echo $page->author() ?></span>
          </a>
        </h4>
      <?php endif ?>
      <meta itemprop="headline" content="<?php echo $page->title() ?>" />
        <?php if ($page->image): ?>
			<meta itemprop="image" content="<?php echo $page->url() ?>/<?php echo $page->image()->filename() ?>" />
        <?php endif; ?>
    </header>
    
    <div class="content" itemprop="articleBody">
      <?php echo $page->text()->kirbytext() ?>
    </div>

    <div class="social-actions episode-actions">
			
			<div class="audio-holder"></div>

      <!-- <span class="share-label">share: </span> -->
      
      <!-- Contribute To The F Plus -->
      <a class="social contribute" href="/contribute/" title="Contribute To The Podcast">
        <svg viewBox="0 0 100 100">
          <use class="top lid" xlink:href="#IconContributeTop"></use>
          <use class="bottom" xlink:href="#IconContributeBottom"></use>
        </svg>
        <span class="label">Contribute to the Podcast</span>
      </a>

      <!-- TWEET THIS -->
      <a class="social twitter" href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->url()); ?>%20<?php echo ('via @TheFPlus')?>" target="blank" title="Tweet this">
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconTwitter"></use>
        </svg>
        <span class="label">Tweet this</span>
      </a>

      <!-- GOOGLE+ SHARE -->
      <a class="social googleplus" href="https://plus.google.com/share?url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title()); ?>" target="_blank" title="Share on Google+"> 
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconGooglePlus"></use>
        </svg>
        <span class="label">Share on Google+</span>
      </a>

      <!-- FACEBOOK SHARE -->
      <a class="social facebook" href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook">
        <svg viewBox="0 0 100 100">
          <use xlink:href="#IconFacebook"></use>
        </svg>
        <span class="label">Share on Facebook</span>
      </a>

    </div>

    <!-- EPISODE TAGS -->
    <div class="info-block blog-tags">
      <span class="label">This post is tagged:</span>
        <ul itemprop="keywords" content="<?php echo $page->tags(); ?>">
        <?php foreach($etags as $etag): ?>
          <?php $tagmatches = $site->grandChildren()->filterBy('tags', $etag, ','); ?>
          <?php $x = 0; ?>
          <?php foreach($tagmatches as $tagmatch): $x = $x+1; ?>
          <?php endforeach ?>
          <a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo trim($etag) ?>" <?php endif ?>><?php echo trim($etag) ?></a>
        <?php endforeach ?>
        </ul>
    </div>
    
  </article>

  <section class="comments disqus">
    <?php snippet('disqus-alt', array('allow_comments' => true)) ?>
  </section>

</main>

<?php snippet('footer') ?>