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

    <?php snippet('podlove') ?>

    <div class="document-link-holder">
      <?php if ($page->document_link()->isNotEmpty()) { ?>
        <a itemprop="citation" class="action read" href="<?php echo $page->document_link() ?>" title="Read <?php echo $page->provider() ?>'s document"  target="_blank">
          <svg viewBox="0 0 100 100">
          <path d="M65.3 57H44.2v-4.6h21l.1 4.6zm0-10H44.2v-4.6h21l.1 4.6zm0-10H44.2v-4.6h21l.1 4.6zM29.1 75.3V24.4h42.8v33.4c0 9.7-11.9 5.8-11.9 5.8s3.6 11.7-5.4 11.7H29.1zM78 58.4V18.3H23v63.1h31.7c10.4 0 23.3-13.6 23.3-23zM37.8 32c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c-.1-1.5-1.3-2.7-2.7-2.7zm0 10.1c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c-.1-1.5-1.3-2.7-2.7-2.7zm0 9.9c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c-.1-1.5-1.3-2.7-2.7-2.7z"/>
          </svg>
          <span class="label go-right">Read <?= str_replace(",", " & ", $page->provider()); ?>'s document</span>
        </a>
      <?php } ?>
    </div>

    <div class="ballpit-link-holder">
      <?php if ($page->ballpit_url()->isNotEmpty()) { ?>
        <a class="action ballpit" href="<?php echo $page->ballpit_url() ?>" title="Ballpit Thread: <?= $page->title(); ?>"  target="_blank">
          <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
            <g>
              <path d="M16.6 14.8c.7.2 3.2-6.2 10.2-6.5 3.5-.1 6.1 2.8 6.4 2.3.3-.5-1.3-2.9-6.8-3.1-6.3 0-10.5 7.1-9.8 7.3z"/>
              <path d="M16.6 12.5s3.1-7.1 9.9-7.6c4.3-.1 5.4 2.5 5.4 2.5s-.9-1.3-5.5-1.5c-6.5.4-9.8 6.6-9.8 6.6z"/>
              <ellipse cx="31.5" cy="20.3" rx=".9" ry="1.5"/>
              <ellipse cx="26.8" cy="20" rx=".7" ry="1.2"/>
              <path d="M40.1 35.9c-6 .1-12.2 4.8-14.4 6.7-1.5-1.4-2.4-3.2-1.8-5.6 0-1.3 3.3-5.6 6.7-6.9.9 1.1 2.4 2.7 3 2.5.6-.2 1.6-2.4 2.1-3.8 1.2-.2 2.5-.3 3.6-.4.6 1.2 1.8 3.5 2.5 3.4.7-.1 2.4-2.4 3.2-3.5h1.1c-.1-.4-.3-.8-.5-1.3-1-2.2-2.2-4.3-3.8-6.1-1.1-1.2-2.3-2.2-3.7-3.1-1.3-.9-3-1.5-4.2-2.5-.5-.5-1.1-1.3-1.8-1.6-.7-.3-1.7-.2-2.2.2-.4.3-.4.5-.8.2-.8-.4-1.2-1.3-1.9-1.8-1.7-1.3-4.1-.8-5.5.7-.7.8-1.1 1.8-1.8 2.6-.8 1-2.1 1.3-3.1 2.2-1.8 1.7-3.4 3.5-4.6 5.7-1 2-1.6 4.2-1.8 6.4-.7 6.3.9 12.5 11.6 18.8 9.6 4.3 19.1-1.3 19.1-1.3S32.6 47 27.5 44c.9-.7 2.4-1.9 5.2-3 4.8-1.9 9.5.5 10.1 1.9.6 1.4.6 4.5.6 4.5s1.6-1.7 1.4-3.6c-.2-1.9-.9-3.8-.9-3.8s1.3.3 2.7 1.7c1.3 1.4 1.7 4.2 1.7 4.2s1.2-2.2 1.1-4.1c.1-1.9-1.9-6-9.3-5.9zm-17.4-7.2c-2.8-.5-4.4-4.5-3.5-8.9.9-4.4 3.8-7.5 6.6-6.9 1.5.3 2.7 1.6 3.3 3.5.3-1 1-1.8 1.8-2 1.8-.4 3.8 1.6 4.6 4.7.8 3-.1 5.8-1.8 6.3-1.6.4-3.4-1.2-4.3-3.7v.2c-1 4.3-3.9 7.4-6.7 6.8z"/>
            </g>
          </svg>
          <span class="label go-right">Visit this episode's thread on ballp.it</span>
        </a>
      <?php } ?>
    </div>

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