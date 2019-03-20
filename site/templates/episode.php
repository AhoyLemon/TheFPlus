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
  
  <article class="episode full" itemscope itemtype="http://schema.org/Episode">
    
    <figure>
      <?php if($page->cover() != "") { ?>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="cover" alt="F Plus Episode <?php echo $page->uid() ?>">
      <?php } else if($image = $page->image()) { ?>
        <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="F Plus Episode <?php echo $page->uid() ?>">
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
      
    </header>
    
    
    
    <div class="article-text">

    <!-- CAST LIST -->
    <?php if ($page->cast()->isNotEmpty()) { ?>
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
    <?php } ?>
    
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
    
    </div>

    <?php if ($page->cover_cite_toggle() == "yes") { ?>
      <div class="cover-image-citation" style="margin-top:1em; margin-bottom:1em;">
        Cover image uses 
        <strong><?= $page->cover_cite_title(); ?></strong>
        <?php if ($page->cover_cite_artist() != "" && $page->cover_cite_url() != "" ) { ?>
          by <a href="<?= $page->cover_cite_url(); ?>"><?= $page->cover_cite_artist(); ?></a>
        <?php } else if ($page->cover_cite_artist() != "") { ?>
          by <?= $page->cover_cite_artist(); ?>
        <?php } ?>
      </div>
    <?php } ?>

    <?php snippet('episode-actions') ?>

    <!-- EPISODE TAGS -->
    <?php snippet('tags') ?>

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
    <?php snippet('disqus', array('allow_comments' => true)) ?>
  </section>

</main>

<?php if ($page->cover() != "") { ?>
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "item": {
          "@id": "<?= $site->url(); ?>",
          "name": "<?= $site->title(); ?>",
          "url": "<?= $site->url(); ?>",
          "image": "https://thefpl.us/assets/images/og-image.png"
        }
      },
      {
        "@type": "ListItem",
        "position": 2,
        "item": {
          "@id": "https://thefpl.us/episode",
          "name": "Episodes",
          "url": "<?= $page->parent()->url(); ?>",
          "image": "https://thefpl.us/assets/images/og-image.png"
        }
      },
      {
        "@type": "ListItem",
        "position": 3,
        "item": {
          "@id": "<?= $page->url(); ?>",
          "name": "<?= $page->title(); ?>",
          "url": "<?= $page->url(); ?>",
          "image": "<?= $page->cover()->toFile()->url(); ?>"
        }
      }
    ]
  }
  </script>
<?php } ?>



<?php snippet('footer') ?>