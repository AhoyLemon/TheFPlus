<?php snippet('header') ?>
<link href="/assets/css/sticker-boxes.css" rel="stylesheet" type="text/css">

<?php
  $pubdate = date('l, F jS Y', $page->date());
  $pubtime = date("g:ia", strtotime($page->time()));
?>

<main class="main page" role="main">

    <article class="full default">
      <header>
        <h1><?php echo $page->title() ?></h1>
        
        <!-- DATE & TIME -->
        <time class="released" content="<?php echo $page->date('Y-m-d'); ?>T<?php echo $page->time(); ?>+06:00">
          <span>Last Release: </span>
          <strong class="date">
            <?php echo date('l, F jS Y', $page->date()); ?>
          </strong>
          @
          <strong class="time">
            <?php echo date("g:ia", strtotime($page->time())); ?>
          </strong>
        </time>
      </header>
      
      <!-- CAST LIST -->
      <?php /* if ($page->cast() != "") { ?>
        <?php $persons = explode(",", $page->cast()); ?>
        <ul class="cast authors ridiculists info-block artists">
          <?php foreach($persons as $person): ?>
            <?php $mlink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $person))); ?>
            <?php if ($site->find($mlink)) { ?>
              <li itemprop="actor" itemscope itemtype="http://schema.org/Person"><a itemprop="url" href="<?php echo url::home() ?>/<?php echo $mlink; ?>"><span itemprop="name"><?php echo $person ?></span></a></li>
            <?php } else { ?>
              <li itemprop="actor"><?php echo $person ?></li>
            <?php } ?>
          <?php endforeach ?>
        </ul>
      <?php }  */ ?>
      
      <?php echo $page->text()->kirbytext() ?>
      
      <div class="stickers">
        
        <?php foreach($page->stickers()->toStructure()->sortBy('series_num', 'desc') as $sticker): ?>
          <dl class="sticker-box">
            <dt>
              <div class="thumb-holder">
                <img src="<?php echo $page->url() ?>/<?php echo $sticker->pic()->filename() ?>" class="thumb" />
              </div>
              <div class="details">
                <div class="full title"><?php echo $sticker->title(); ?></div>
                <div class="third series-number"><?php echo $sticker->series_num(); ?></div>
                <div class="third artist">
                  <?php $slug = strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $sticker->artist()))); ?>
                  <a href="http://thefpl.us/meet/<?php echo $slug; ?>"><?php echo $sticker->artist(); ?></a>
                </div>
                <div class="third printed"><?php echo $sticker->printed(); ?></div>
                <div class="third dimensions"><?php echo $sticker->dimensions(); ?></div>
                <div class="third shape"><?php echo $sticker->shape(); ?></div>
                <div class="third material"><?php echo $sticker->vinyl(); ?></div>
                <div class="half released">
                  <?php if ($sticker->released == "") { ?>
                    pending
                  <?php } else { ?>
                    <?php echo $sticker->date('m/d/y', 'released'); ?>
                  <?php } ?>
                </div>
                <?php if ($sticker->soldout() != ""): ?>
                  <div class="half sold-out"><?php echo $sticker->date('m/d/y', 'soldout'); ?></div>
                <?php endif; ?>
                
                
                <?php if ($sticker->soldout() == "" && $sticker->buttona_slug() != "") { ?>
                  <div class="buy-buttons">
                    <?php if ($sticker->buttona_slug() != ""): ?>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $sticker->buttona_slug(); ?>"/>
                        <button type="submit" onclick="trackEvent('stickers', '<?php echo $sticker->title(); ?>', '<?php echo $sticker->buttona_num(); ?> @ $<?php echo $sticker->buttona_price(); ?>', <?php echo $sticker->buttona_price(); ?>);"><?php echo $sticker->buttona_num(); ?> @ $<?php echo $sticker->buttona_price(); ?></button>
                      </form>
                    <?php endif; ?>
                    <?php if ($sticker->buttonb_slug() != ""): ?>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $sticker->buttonb_slug(); ?>"/>
                        <button type="submit" onclick="trackEvent('stickers', '<?php echo $sticker->title(); ?>', '<?php echo $sticker->buttonb_num(); ?> @ $<?php echo $sticker->buttonb_price(); ?>', <?php echo $sticker->buttonb_price(); ?>);"><?php echo $sticker->buttonb_num(); ?> @ $<?php echo $sticker->buttonb_price(); ?></button>
                      </form>
                    <?php endif; ?>
                    <?php if ($sticker->buttonc_slug() != ""): ?>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $sticker->buttonc_slug(); ?>"/>
                        <button type="submit" onclick="trackEvent('stickers', '<?php echo $sticker->title(); ?>', '<?php echo $sticker->buttonc_num(); ?> @ $<?php echo $sticker->buttonc_price(); ?>', <?php echo $sticker->buttonc_price(); ?>);"><?php echo $sticker->buttonc_num(); ?> @ $<?php echo $sticker->buttonc_price(); ?></button>
                      </form>
                    <?php endif; ?>
                  </div>
                <?php } else if ($sticker->soldout() != "") { ?>
                  <div class="no-buttons">
                    <span>SOLD OUT</span>
                  </div>
                <?php } ?>
                
              </div>
            </dt>
          </dl>
        <?php endforeach; ?>
        
        
        <?php echo $page->splc_desc()->kirbytext() ?>
        
        <div class="sticker-photo-grid">
          <h3>Some Stickers in the world...</h3>
          <?php foreach($page->photos()->toStructure()->sortBy('series_num', 'desc') as $photo): ?>
            <div class="photo-holder">
              <img src="<?php echo $page->url() ?>/<?php echo $photo->pic()->filename() ?>" data-series="<?php echo $photo->series_num(); ?>" alt="<?php echo $photo->desc(); ?>" />
            </div>
          <?php endforeach; ?>
          <div class="share-your-photo">
            <?php echo $page->share_cta()->kirbytext(); ?>
          </div>
        </div>
        
        
        
        
      </div>
    </article>
    
  </main>

<?php snippet('footer') ?>