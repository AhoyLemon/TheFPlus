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

    <figure>
      <?php if($page->cover() != "") { ?>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="cover" alt="Adjudicated Guess Episode <?php echo $page->uid() ?>">
      <?php } else if($image = $page->image()) { ?>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="Adjudicated Guess Episode <?php echo $page->uid() ?>">
      <?php } ?>
    </figure>

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

    <?php snippet('page-actions') ?>

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
    <?php snippet('disqus', array('allow_comments' => true)) ?>
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
        "name": "<?php echo $page->parent()->title(); ?>",
        "image": "<?php echo $page->parent()->url() ?>/<?php echo $page->parent()->podcast_image()->filename() ?>"
      }
    },{
      "@type": "ListItem",
      "position": 3,
      "item": {
        "@id": "<?php echo $page->url(); ?>",
        "url": "<?php echo $page->url(); ?>",
        "name": "<?php echo $page->title(); ?>",
        "image": "<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>"
      }
    }]
  }
</script>


<?php snippet('footer') ?>