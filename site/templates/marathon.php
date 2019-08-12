<?php snippet('header') ?>


<main class="main page" role="main">

  <meta http-equiv="last-modified" content="<?php echo $page->modified('Y-m-d@H:i:s'); ?>" />
  
  <div class="full marathon-block">

    <div class="marathon-overview">

      <figure>
        <?php if($page->cover() != "") { ?>
          <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="cover" alt="F Plus Episode <?php echo $page->uid() ?>">
        <?php } else if($image = $page->image()) { ?>
          <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="F Plus Episode <?php echo $page->uid() ?>">
        <?php } ?>
      </figure>
      <h1><?php echo $page->title(); ?></h1>
      
      <?php if ($page->text() != "") { ?>
        <summary class="info-block hours-leadin">

          <div class="recorded">
            <time>
              Recorded: 
              <span class="date">
                <?php echo date('l, F jS Y', strtotime($page->record_date_start())); ?>
              </span>
              @
              <span class="time">
                <?php echo date("g:ia", strtotime($page->record_time_start())); ?>
              </span>
              - 
              <span class="time">
                <?php echo date("g:ia", strtotime($page->record_time_end())); ?>
              </span>
              CST
            </time>
          </div>
          
          <div class="released">
            <time>
              Released: 
              <span class="date">
                <?php echo date('l, F jS Y', $page->date()); ?>
              </span>
              @
              <span class="time">
                <?php echo date("g:ia", strtotime($page->time())); ?>
              </span>
              CST
            </time>
          </div>

          <?php echo $page->text()->kirbytext() ?>
        </summary>
      <?php } ?>
    </div>
    
    <div class="marathon-hours">
      <?php foreach ($page->hours()->toStructure() as $hour) { ?>

        <article class="marathon-hour full">

            <header>
              <h2 class="block-title">HOUR <?php echo $hour->hour(); ?>: <?php echo $hour->name(); ?></h2>
              <?php /*
              <h5>
                <?php if ($hour->document_link()) { ?>
                  <a href="<?php echo $hour->document_link() ?>" title="Read <?php echo $hour->provider() ?>'s document"  target="_blank">
                    <span>Document</span>
                  </a>
                <?php } ?>
                provided by 
                <?php echo $hour->provider(); ?>
              </h5>
              */ ?>
            </header> 
            <div class="video-holder">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hour->youtube_url(); ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="detail-holder">
              <h5>
                <?php if ($hour->document_link()) { ?>
                  <a href="<?php echo $hour->document_link() ?>" title="Read <?php echo $hour->provider() ?>'s document"  target="_blank">
                    <span>Document</span>
                  </a>
                <?php } ?>
                provided by 
                <?php echo $hour->provider(); ?>
              </h5>
              <ul class="cast authors ridiculists info-block">
                <?php 
                  $readers = explode(",", $hour->cast());
                  $plink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $hour->provider())));
                ?>
                <?php foreach($readers as $person): ?>
                  <?php $mlink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $person))); ?>
                  <?php if ($site->find($mlink)) { ?>
                    <li itemprop="actor" itemscope itemtype="http://schema.org/Person"><a itemprop="url" href="<?php echo url::home() ?>/<?php echo $mlink; ?>"><span itemprop="name"><?php echo $person ?></span></a></li>
                  <?php } else { ?>
                    <li itemprop="actor"><?php echo $person ?></li>
                  <?php } ?>
                <?php endforeach ?>
              </ul>
              <?php if ($hour->artist() != "") { ?>
                <?php 
                  $alink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $hour->artist())));
                ?>
                <div class="artist">
                  Art by 
                  <?php if ($site->find($alink)) { ?>
                    <a href="<?php echo $site->url(); ?>/<?php echo $alink; ?>">
                      <span>
                        <?php echo $hour->artist(); ?>
                      </span>
                    </a>
                  <?php } else { ?>
                    <span>
                      <?php echo $hour->artist(); ?>
                    </span>
                  <?php } ?>
                </div>
              <?php } ?>
              <summary>
                <?php /* if ($hour->provider() != "" && $hour->document_link() != "") { ?>
                  <a class="action read" href="<?php echo $hour->document_link() ?>" title="Read <?php echo $hour->provider() ?>'s document"  target="_blank">
                    <svg viewBox="0 0 100 100">
                      <use xlink:href="#IconDocument"></use>
                    </svg>
                  </a>
                <?php } */ ?>
                <?php echo $hour->text()->kirbytext(); ?>
              </summary>
            </div>
        </article>
      <?php } ?>
    </div>

    <!-- ADDITIONAL FUN -->
    <?php if ($page->leadout() != "") { ?>
      <summary class="info-block hours-leadout">
        <?php echo $page->leadout()->kirbytext() ?>
      </summary>
    <?php } ?>
    
    <!-- LIVESTREAM GALLERY -->
    
    <?php if ($page->buttons() != "") { ?>
      <summary class="info-block marathon-gallery button-holder">
        
        <?php foreach ($page->buttons()->toStructure() as $button) { ?>
          <a href="<?= $button->url(); ?>" <?php if ($button->target_blank() == "1") { echo 'target="_blank"'; } ?> class="button">
            <?= $button->text(); ?>
          </a>
        <?php } ?>
      </summary>
    <?php } ?>
    
    <!-- EPISODE TAGS -->
    <?php if ($page->tags() != "") { ?>
      <?php $etags = explode(",", $page->tags()); ?>
      <div class="info-block episode-tags">
        <span class="label">Episode Tags:</span>
        <div style="font-size:1.4rem;">
          <?php foreach($etags as $etag): ?>
            <?php $tagmatches = $site->grandChildren()->filterBy('tags', $etag, ','); ?>
            <?php $x = 0; ?>
            <?php foreach($tagmatches as $tagmatch): $x = $x+1; ?>
            <?php endforeach ?>
            <a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo rawurlencode($etag) ?>" <?php endif ?>><?php echo trim($etag) ?></a>
          <?php endforeach ?>
        </div>
      </div>
    <?php } ?>
    
    
  </div>

  <section class="comments disqus">
    <?php snippet('disqus', array('allow_comments' => true)) ?>
  </section>

</main>

<?php snippet('footer') ?>