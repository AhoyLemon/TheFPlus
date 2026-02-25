<?php snippet('header') ?>


<!-- RSS LINK -->
<link type="application/rss+xml" rel="alternate" title="Adjudicated Guess" href="http://feeds.feedburner.com/aguess"/>

<main class="main page" role="main">

  <article class="episode full">
    <header>
      <h1>
        <span class="episode-title"><?php echo $page->title() ?></span>
      </h1>
    </header>
    
    <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->podcast_image()->filename() ?>" class="cover" alt="Adjudicated Guess Logo">

    <!-- EPISODE SUMMARY TEXT -->
    <summary class="info-block" itemprop="description">
      <?php echo $page->text()->kirbytext() ?>
    </summary>
    
    <div class="subscribe">
      <?php echo $page->subscribe()->kirbytext(); ?>
    </div>
    
    <?php echo $page->contribute()->kirbytext(); ?>
    
  </article>
  
  <section class="guess-episodes">
    <header>Episodes</header>
    <?php foreach($page->children()->listed()->sortBy('date', 'desc') as $guess) { ?>
    <article class="guess-summary">
      <h3>
        <a href="<?php echo $guess->url(); ?>"><?php echo $guess->slug(); ?>: <?php echo $guess->title(); ?></a>
      </h3>
      <summary>
        <?php echo $guess->text()->kirbytext(); ?>
      </summary>
    </article>
  <?php } ?>
  </section>
  
  
  

</main>

<?php snippet('footer') ?>