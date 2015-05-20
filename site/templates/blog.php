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

    <div class="social-actions">

      <span class="share-label">share: </span>

      <!-- TWEET THIS -->
      <a class="social twitter" href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->url()); ?>%20<?php echo ('via @TheFPlus')?>" target="blank" title="Tweet this">
        <svg class="bird" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
          <path d="M98.1,20.2c-3.5,1.6-7.3,2.6-11.3,3.1c4.1-2.4,7.2-6.3,8.7-10.9c-3.8,2.3-8,3.9-12.5,4.8c-3.6-3.8-8.7-6.2-14.4-6.2c-10.9,0-19.7,8.8-19.7,19.7c0,1.5,0.2,3.1,0.5,4.5c-16.4-0.8-30.9-8.7-40.7-20.6c-1.7,2.9-2.7,6.3-2.7,9.9c0,6.8,3.5,12.9,8.8,16.4c-3.2-0.1-6.3-1-8.9-2.5c0,0.1,0,0.2,0,0.2c0,9.6,6.8,17.5,15.8,19.4c-1.7,0.5-3.4,0.7-5.2,0.7c-1.3,0-2.5-0.1-3.7-0.4c2.5,7.8,9.8,13.5,18.4,13.7c-6.8,5.3-15.3,8.4-24.5,8.4c-1.6,0-3.2-0.1-4.7-0.3c8.7,5.6,19.1,8.9,30.3,8.9c36.3,0,56.2-30.1,56.2-56.2c0-0.9,0-1.7-0.1-2.6C92.1,27.6,95.5,24.1,98.1,20.2z"/>
        </svg>
      </a>

      <!-- GOOGLE+ SHARE -->
      <a class="social googleplus" href="https://plusone.google.com/_/+1/confirm?hl=de&url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title()); ?>" target="blank" title="Share on Google+">
        <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
          <path d="M49.1,32.4c-1-7.2-5.6-13.1-11.1-13.3c-5.5-0.2-9.2,5.4-8.2,12.6c0.9,7.2,6.2,12.3,11.7,12.4C46.9,44.2,50.1,39.6,49.1,32.4z"/>
          <path d="M91.9,3.3H9.2C6,3.3,3.3,6,3.3,9.2v82.7c0,3.3,2.6,5.9,5.9,5.9h82.7c3.3,0,5.9-2.6,5.9-5.9V9.2C97.8,6,95.2,3.3,91.9,3.3zM39.2,85.3c-11.8,0-21.7-5.1-21.7-13.7c0-6.6,4.2-15.2,23.8-15.2c-2.9-2.4-3.6-5.7-1.8-9.3c-11.5,0-17.4-6.7-17.4-15.3c0-8.4,6.2-16,19-16c3.2,0,20.4,0,20.4,0l-4.6,4.6h-5.3c3.8,2.3,5.8,6.7,5.8,11.6c0,4.5-2.5,8.2-6,11c-6.3,4.9-4.7,7.6,1.9,12.4c6.5,4.9,8.6,8.6,8.6,14.4C61.8,76.7,55.4,85.3,39.2,85.3z M84.1,49.4h-8v8h-4.8v-8h-7.7v-4.8h7.7v-7.7h4.8v7.7h8V49.4z"/>
          <path d="M40.3,58.8c-8.2-0.1-15.1,5.2-15.1,11.3c0,6.2,5.9,11.4,14.1,11.4c10.5,0,15.5-4.9,15.5-11.1C54.8,64.5,49.4,58.8,40.3,58.8z"/>
        </svg>
      </a>
      
      <!-- FLATTR TIP -->
      <a class="social flattr" href="https://flattr.com/submit/auto?user_id=TheFPlus&url=<?php echo rawurlencode ($page->url()); ?>&title=<?php echo rawurlencode($page->title()); ?>" target="_blank" title="Tip us with Flattr">
        <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
          <path d="M37.1,3.3C14.7,3.3,3.3,16.2,3.3,40.2l0,0V57v33.6l21.9-21.9V43.1c0-10,2.6-16.3,11.5-17.7l0,0c3.1-0.6,9.5-0.4,13.6-0.4l0,0v15.2c0,0.1,0,0.4,0.1,0.5l0,0c0.2,0.6,0.7,1.1,1.4,1.1l0,0c0.4,0,0.7-0.2,1.1-0.5l0,0L90.8,3.3l-25.5,0H37.1z M75.5,31.9v25.6c0,10-2.6,16.3-11.5,17.7l0,0c-3.1,0.6-9.5,0.4-13.6,0.4l0,0V60.5c0-0.1,0-0.4-0.1-0.5l0,0c-0.2-0.6-0.7-1.1-1.4-1.1l0,0c-0.4,0-0.7,0.2-1.1,0.5l0,0L9.9,97.4l25.5,0h28.3c22.4,0,33.8-12.9,33.8-36.9l0,0V43.7V10L75.5,31.9z"/>
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