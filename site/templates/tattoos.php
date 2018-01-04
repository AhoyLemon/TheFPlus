<?php snippet('header') ?>
<? /*
<link href="/assets/css/sticker-boxes.css?updated=2017-10-09" rel="stylesheet" type="text/css">
*/ ?>

<?php
  $pubdate = date('l, F jS Y', $page->date());
  $pubtime = date("g:ia", strtotime($page->time()));
?>

<main class="main page" role="main">

    <article class="full default">
      <header>
        <h1 style="margin-bottom:0;"><?php echo $page->title() ?></h1>
        
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
      
      <?php echo $page->text()->kirbytext() ?>
      
    </article>
      
      <div class="merch-grid tattoos">
        
        <?php foreach($page->tattoos()->toStructure()->sortBy('series_num', 'desc') as $sticker): ?>
          <div class="grid-box tattoo" itemscope itemtype="http://schema.org/Product">
            <meta itemprop="category" content="sticker" />
            <meta itemprop="url" content="<?php echo $page->url(); ?>" />
            <meta itemprop="description" content="<?php echo strip_tags($page->text()->kirbytext());; ?>" />
            <div class="thumb-holder" style="background-image:url(<?= $page->skin()->toFile()->url(); ?>)">
              <?php if ($sticker->fullsize() != "") { ?>
                <a onclick="window.open('<?= $sticker->fullsize()->toFile()->url() ?>', 'popupWindow', 'width=<?php echo $sticker->fullsize()->toFile()->width(); ?>,height=<?php echo $sticker->fullsize()->toFile()->height(); ?>');" class="zoom">
                  <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $sticker->pic()->filename() ?>" class="thumb" />
                </a>
              <?php } else { ?>
                <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $sticker->pic()->filename() ?>" class="thumb" />
              <?php } ?>
            </div>
            <div class="details">
              <div class="detail full name" itemprop="name">
                <label>Name</label>
                <div class="text"><?php echo $sticker->title(); ?></div>
              </div>

              <div class="detail two-thirds artist">
                <label>Artist</label>
                <?php $slug = strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $sticker->artist()))); ?>
                <div class="text">
                  <?php if ($site->find('meet')->find($slug)) { ?>
                    <a href="http://thefpl.us/meet/<?php echo $slug; ?>"><?php echo $sticker->artist(); ?></a>
                  <?php } else { ?>
                    <span><?php echo $sticker->artist(); ?></span>
                  <?php } ?>
                </div>
              </div>
              <div class="third third series">
                <label>Series</label>
                <div class="text">
                  <?php echo $sticker->series_num(); ?>
                </div>
                
              </div>

              <div class="detail third dimensions">
                <label>Dimensions</label>
                <div class="text">
                  <?php echo $sticker->dimensions(); ?>
                </div>
              </div>
              
              <div class="detail third printed">
                <label>Printed</label>
                <div class="text">
                  <?php echo $sticker->printed(); ?>
                </div>
              </div>
              <div class="detail third released">
                <?php if ($sticker->released == "") { ?>
                  <label>Release</label>
                  <div class="text">
                    pending
                  </div>
                <?php } else { ?>
                  <label>Released</label>
                  <div class="text">
                    <?php echo $sticker->date('m/d/y', 'released'); ?>
                  </div>
                  <meta itemprop="releaseDate" content="<?php echo $sticker->released(); ?>" />
                <?php } ?>
              </div>
              <?php if ($sticker->soldout() != ""): ?>
                <div class="third sold-out">
                  <?php echo $sticker->date('m/d/y', 'soldout'); ?>
                </div>
              <?php endif; ?>

              <?php if ($sticker->soldout() == "" && $sticker->buttona_slug() != "") { ?>
                <div class="detail full buy-buttons">
                  <label>Buy Now</label>
                  <div class="buttons">
                    <?php if ($sticker->buttona_slug() != ""): ?>
                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="name" content="<?php echo $sticker->buttona_num(); ?> X <?php echo $sticker->title(); ?>" />
                        <meta itemprop="priceCurrency" content="USD" />
                        <meta itemprop="price" content="<?php echo $sticker->buttona_price(); ?>" />
                        <meta itemprop="url" content="<?php echo $page->url(); ?>" />
                        <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                        <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                      </div>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $sticker->buttona_slug(); ?>"/>
                        <button type="submit" onclick="trackEvent('stickers', '<?php echo $sticker->title(); ?>', '<?php echo $sticker->buttona_num(); ?> @ $<?php echo $sticker->buttona_price(); ?>', <?php echo $sticker->buttona_price(); ?>);"><?php echo $sticker->buttona_num(); ?> @ $<?php echo $sticker->buttona_price(); ?></button>
                      </form>
                    <?php endif; ?>
                    <?php if ($sticker->buttonb_slug() != ""): ?>
                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="name" content="<?php echo $sticker->buttonb_num(); ?> X <?php echo $sticker->title(); ?>" />
                        <meta itemprop="priceCurrency" content="USD" />
                        <meta itemprop="price" content="<?php echo $sticker->buttonb_price(); ?>" />
                        <meta itemprop="url" content="<?php echo $page->url(); ?>" />
                        <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                        <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                      </div>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $sticker->buttonb_slug(); ?>"/>
                        <button type="submit" onclick="trackEvent('stickers', '<?php echo $sticker->title(); ?>', '<?php echo $sticker->buttonb_num(); ?> @ $<?php echo $sticker->buttonb_price(); ?>', <?php echo $sticker->buttonb_price(); ?>);"><?php echo $sticker->buttonb_num(); ?> @ $<?php echo $sticker->buttonb_price(); ?></button>
                      </form>
                    <?php endif; ?>
                    <?php if ($sticker->buttonc_slug() != ""): ?>
                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="name" content="<?php echo $sticker->buttonc_num(); ?> X <?php echo $sticker->title(); ?>" />
                        <meta itemprop="priceCurrency" content="USD" />
                        <meta itemprop="price" content="<?php echo $sticker->buttonc_price(); ?>" />
                        <meta itemprop="url" content="<?php echo $page->url(); ?>" />
                        <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                        <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                      </div>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $sticker->buttonc_slug(); ?>"/>
                        <button type="submit" onclick="trackEvent('stickers', '<?php echo $sticker->title(); ?>', '<?php echo $sticker->buttonc_num(); ?> @ $<?php echo $sticker->buttonc_price(); ?>', <?php echo $sticker->buttonc_price(); ?>);"><?php echo $sticker->buttonc_num(); ?> @ $<?php echo $sticker->buttonc_price(); ?></button>
                      </form>
                    <?php endif; ?>
                  </div>
                </div>
              <?php } else if ($sticker->soldout() != "") { ?>
                <div class="no-buttons" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                  <span>SOLD OUT</span>
                  <meta itemprop="availability" content="http://schema.org/SoldOut" />
                  <meta itemprop="priceCurrency" content="USD" />
                  <meta itemprop="price" content="3" />
                </div>
              <?php } else if ($sticker->released == "") { ?>
                <div class="no-buttons">
                  <span>PRINTING</span>
                </div>
              <?php } ?>

            </div>
            <span itemprop="brand" itemscope itemtype="http://schema.org/PerformingGroup">
              <meta itemprop="name" content="<?php echo $site->title(); ?>" />
              <meta itemprop="url" content="<?php echo $site->url(); ?>" />
            </span>
          </div>
        <?php endforeach; ?>
      </div>
  
      <article class="full default" style="margin-top:20px;">

        <div class="product-photos" style="margin-top:3em;">
          <h3>Some Tattoos in the world...</h3>
          <?php foreach($page->photos()->toStructure()->sortBy('series_num', 'desc') as $photo): ?>
            <div class="photo-holder">
              <img src="<?php echo $page->url() ?>/<?php echo $photo->pic()->filename() ?>" data-series="<?php echo $photo->series_num(); ?>" alt="<?php echo $photo->desc(); ?>" />
            </div>
          <?php endforeach; ?>
          <div class="share-your-photo">
            <?php echo $page->share_cta()->kirbytext(); ?>
          </div>
        </div>

        <!-- TAGS -->
        <?php if ($page->tags() != "") { ?>
          <div class="info-block episode-tags">
            <span class="label">Tags:</span>
            <ul itemprop="keywords" content="<?php echo $page->tags() ?>">
              <?php $etags = explode(",", $page->tags()); ?>
              <?php foreach($etags as $etag): ?>
                <?php $tagmatches = $site->grandChildren()->filterBy('tags', $etag, ','); ?>
                <?php $x = 0; ?>
                <?php foreach($tagmatches as $tagmatch): $x = $x+1; ?>
                <?php endforeach ?>
                <a <?php if ($x > 1): ?> href="<?php echo url::home() ?>/find/tag:<?php echo trim($etag) ?>" <?php endif ?>><?php echo trim($etag) ?></a>
              <?php endforeach ?>
            </ul>
          </div>
        <?php } ?>
        
      </article>
  
    <section class="comments disqus">
      <?php snippet('disqus-alt', array('allow_comments' => true)) ?>
    </section>
    
  </main>

<?php snippet('footer') ?>