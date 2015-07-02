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
      <!-- AUTHOR -->
      <?php if ($page->author() != ""): ?>
      <h3 style="margin:-.5em 0 0 0; float:right;">
        <span>by</span>
        <a href="<?php echo url::home() ?>/meet/<?php $plink = strtolower(preg_replace('/\s+/', '-', $page->author())); echo $plink ?>">
          <span itemprop="author"><?php echo $page->author() ?></span>
        </a>
      </h3>
      <?php endif ?>
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
      
    </header>

    <div class="content" itemprop="articleBody">
      <?php echo $page->text()->kirbytext() ?>
    </div>

    <div class="social-actions episode-actions">
			
			<div class="audio-holder"></div>

      <span class="share-label">share: </span>

      <!-- TWEET THIS -->
      <a class="social twitter" href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->url()); ?>%20<?php echo ('via @TheFPlus')?>" target="blank" title="Tweet this">
        <svg viewBox="0 0 100 100">
					<use xlink:href="#IconTwitter"></use>
				</svg>
      </a>

      <!-- GOOGLE+ SHARE -->
      <a class="social googleplus" href="https://plusone.google.com/_/+1/confirm?hl=de&url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title()); ?>" target="blank" title="Share on Google+">
        <svg viewBox="0 0 100 100">
					<use xlink:href="#IconGooglePlus"></use>
				</svg>
      </a>
      
      <!-- FLATTR TIP -->
      <a class="social flattr" href="https://flattr.com/submit/auto?user_id=TheFPlus&url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title()); ?>" target="_blank" title="Tip us with Flattr">
        <svg viewBox="0 0 100 100">
					<use class="top-left orange" xlink:href="#FlattrTopLeft"></use>
					<use class="bottom-right green" xlink:href="#FlattrBottomRight"></use>
				</svg>
      </a>

      <!-- FACEBOOK SHARE -->
      <a class="social facebook" href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" title="Share on Facebook">
        <svg viewBox="0 0 100 100">
					<use xlink:href="#IconFacebook"></use>
				</svg>
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