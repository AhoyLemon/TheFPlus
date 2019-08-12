<?php snippet('header') ?>


<main class="main page" role="main">

  <!-- SET UP VARIABLES -->
  <?php 
    $pubdate = date('l, F jS Y', $page->date());
    $pubtime = date("g:ia", strtotime($page->time()));
    $etags = explode(",", $page->tags());
  ?>

  <!-- <article class="blog full" itemscope itemtype="http://schema.org/BlogPosting"> -->
  <article class="full blog" itemscope itemtype="http://schema.org/BlogPosting" <?php if ($page->cover()->isNotEmpty()) { echo 'style="max-width:unset;"'; } ?> >

    <?php if ($page->cover()->isNotEmpty()) { ?>
      <figure>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="cover" alt="<?php echo $page->title() ?>">
      </figure>
    <?php } ?>

    <header>
      <meta itemprop="mainEntityOfPage" content="<?php echo $page->url(); ?>" />
      <h1 itemprop="name"><?php echo $page->title() ?></h1>
      <meta itemprop="headline" content="<?php echo $page->title() ?>" />
      <meta itemprop="wordCount" content="<?php echo $page->text()->words(); ?>" />
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
      
      <meta itemprop="dateModified" content="<?php echo $page->modified('d/m/Y H:i+06:00') ?>" />
      <!-- AUTHOR -->
      <?php if ($page->author() != ""): ?>
        <h4 class="author">
          <span>by</span>
          <a href="<?php echo url::home() ?>/meet/<?php $plink = strtolower(preg_replace('/\s+/', '-', $page->author())); echo $plink ?>">
            <span itemprop="author"><?php echo $page->author() ?></span>
          </a>
        </h4>
      <?php endif ?>
      <?php if ($page->image()): ?>
        <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
          <meta itemprop="url" content="<?php echo $page->url() ?>/<?php echo $page->image()->filename() ?>" />
          <meta itemprop="height" content="<?php echo $page->image()->height(); ?>" />
          <meta itemprop="width" content="<?php echo $page->image()->width(); ?>" />
        </div>
      <?php endif; ?>
    </header>

    <div class="content" itemprop="articleBody">
      <?php echo $page->text()->kirbytext() ?>
    </div>

    <?php snippet('page-actions'); ?>

    <!-- EPISODE TAGS -->
    <?php if ($page->tags() != ""): ?>
      <div class="info-block blog-tags">
        <span class="label">This post is tagged:</span>
          <div itemprop="keywords" content="<?php echo $page->tags(); ?>">
          <?php foreach($etags as $etag): ?>
            <?php $tagmatches = $site->grandChildren()->filterBy('tags', $etag, ','); ?>
            <?php $x = 0; ?>
            <?php foreach($tagmatches as $tagmatch): $x = $x+1; ?>
            <?php endforeach ?>
            <a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo trim($etag) ?>" <?php endif ?>><?php echo trim($etag) ?></a>
          <?php endforeach ?>
          </div>
      </div>
    <?php endif; ?>
    <div itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
      <meta itemprop="name" content="<?php echo $site->title(); ?>" />
      <meta itemprop="url" content="<?php echo $site->url(); ?>" />
      <div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
        <meta itemprop="url" content="https://thefpl.us/schemaLogo.png" />
      </div>
    </div>
  </article>

  <section class="comments disqus">
    <?php snippet('disqus', array('allow_comments' => true)) ?>
  </section>

</main>

<?php snippet('footer') ?>