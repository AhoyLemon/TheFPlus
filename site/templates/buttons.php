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
      
      <div class="merch-grid buttons">
        
        <?php foreach($page->buttons()->toStructure()->sortBy('series_num', 'desc') as $button): ?>
          <div class="grid-box button" itemscope itemtype="http://schema.org/Product">
            <a name="<?= $button->series_num(); ?>"></a>
            <meta itemprop="category" content="sticker" />
            <meta itemprop="url" content="<?php echo $page->url(); ?>" />
            <meta itemprop="description" content="<?php echo strip_tags($page->text()->kirbytext());; ?>" />
            <figure>
              <?php if ($button->fullsize() != "") { ?>
                <a onclick="window.open('<?= $button->fullsize()->toFile()->url() ?>', 'popupWindow', 'width=<?php echo $button->fullsize()->toFile()->width(); ?>,height=<?php echo $button->fullsize()->toFile()->height(); ?>');" class="zoom">
                  <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $button->pic()->filename() ?>" class="thumb" />
                </a>
              <?php } else { ?>
                <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $button->pic()->filename() ?>" class="thumb" />
              <?php } ?>
            </figure>
            <div class="details">
              <div class="detail full name" itemprop="name">
                <label>Name</label>
                <div class="text"><?php echo $button->title(); ?></div>
              </div>

              <div class="detail two-thirds artist">
                <label>Artist</label>
                <?php $slug = strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $button->artist()))); ?>
                <div class="text">
                  <?php if ($site->find('meet')->find($slug)) { ?>
                    <a href="http://thefpl.us/meet/<?php echo $slug; ?>"><?php echo $button->artist(); ?></a>
                  <?php } else { ?>
                    <span><?php echo $button->artist(); ?></span>
                  <?php } ?>
                </div>
              </div>
              <div class="detail third series">
                <label>Series</label>
                <div class="text">
                  <?php echo $button->series_num(); ?>
                </div>
              </div>

              <div class="detail third dimensions">
                <label>Dimensions</label>
                <div class="text">
                  <?php echo $button->dimensions(); ?>
                </div>
              </div>
              
              <div class="detail third printed">
                <label>Printed</label>
                <div class="text">
                  <?php echo $button->printed(); ?>
                </div>
              </div>
              <div class="detail third released">
                <?php if ($button->released == "") { ?>
                  <label>Release</label>
                  <div class="text">
                    pending
                  </div>
                <?php } else { ?>
                  <label>Released</label>
                  <div class="text">
                    <?php echo $button->date('m/d/y', 'released'); ?>
                  </div>
                  <meta itemprop="releaseDate" content="<?php echo $button->released(); ?>" />
                <?php } ?>
              </div>
              <?php if ($button->soldout() != ""): ?>
                <div class="third sold-out">
                  <?php echo $button->date('m/d/y', 'soldout'); ?>
                </div>
              <?php endif; ?>

              <?php if ($button->soldout() == "" && $button->buttona_slug() != "") { ?>
                <div class="detail full buy-buttons">
                  <label>Buy Now</label>
                  <div class="buttons">
                    <?php if ($button->buttona_slug() != ""): ?>
                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="name" content="<?php echo $button->buttona_num(); ?> X <?php echo $button->title(); ?>" />
                        <meta itemprop="priceCurrency" content="USD" />
                        <meta itemprop="price" content="<?php echo $button->buttona_price(); ?>" />
                        <meta itemprop="url" content="<?php echo $page->url(); ?>" />
                        <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                        <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                      </div>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $button->buttona_slug(); ?>"/>
                        <button type="submit" onclick="trackEvent('stickers', '<?php echo $button->title(); ?>', '<?php echo $button->buttona_num(); ?> @ $<?php echo $button->buttona_price(); ?>', <?php echo $button->buttona_price(); ?>);"><?php echo $button->buttona_num(); ?> @ $<?php echo $button->buttona_price(); ?></button>
                      </form>
                    <?php endif; ?>
                    <?php if ($button->buttonb_slug() != ""): ?>
                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="name" content="<?php echo $button->buttonb_num(); ?> X <?php echo $button->title(); ?>" />
                        <meta itemprop="priceCurrency" content="USD" />
                        <meta itemprop="price" content="<?php echo $button->buttonb_price(); ?>" />
                        <meta itemprop="url" content="<?php echo $page->url(); ?>" />
                        <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                        <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                      </div>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $button->buttonb_slug(); ?>"/>
                        <button type="submit" onclick="trackEvent('stickers', '<?php echo $button->title(); ?>', '<?php echo $button->buttonb_num(); ?> @ $<?php echo $button->buttonb_price(); ?>', <?php echo $button->buttonb_price(); ?>);"><?php echo $button->buttonb_num(); ?> @ $<?php echo $button->buttonb_price(); ?></button>
                      </form>
                    <?php endif; ?>
                    <?php if ($button->buttonc_slug() != ""): ?>
                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="name" content="<?php echo $button->buttonc_num(); ?> X <?php echo $button->title(); ?>" />
                        <meta itemprop="priceCurrency" content="USD" />
                        <meta itemprop="price" content="<?php echo $button->buttonc_price(); ?>" />
                        <meta itemprop="url" content="<?php echo $page->url(); ?>" />
                        <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                        <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                      </div>
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $button->buttonc_slug(); ?>"/>
                        <button type="submit" onclick="trackEvent('stickers', '<?php echo $button->title(); ?>', '<?php echo $button->buttonc_num(); ?> @ $<?php echo $button->buttonc_price(); ?>', <?php echo $button->buttonc_price(); ?>);"><?php echo $button->buttonc_num(); ?> @ $<?php echo $button->buttonc_price(); ?></button>
                      </form>
                    <?php endif; ?>
                  </div>
                </div>
              <?php } else if ($button->soldout() != "") { ?>
                <div class="no-buttons" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                  <span>SOLD OUT</span>
                  <meta itemprop="availability" content="http://schema.org/SoldOut" />
                  <meta itemprop="priceCurrency" content="USD" />
                  <meta itemprop="price" content="3" />
                </div>
              <?php } else if ($button->released == "") { ?>
                <div class="detail no-buttons">
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

        <?php if ($page->photos() != "") { ?>
          <div class="product-photos" style="margin-top:3em;">
            <?php if ($page->photos_leadin() != "") { ?>
              <h3><?= $page->photos_leadin(); ?></h3>
            <?php } ?>
            <?php foreach($page->photos()->toStructure()->sortBy('series_num', 'desc') as $photo): ?>
              <div class="photo-holder">
                <img src="<?php echo $page->url() ?>/<?php echo $photo->pic()->filename() ?>" data-series="<?php echo $photo->series_num(); ?>" alt="<?php echo $photo->desc(); ?>" />
              </div>
            <?php endforeach; ?>
            <div class="share-your-photo">
              <?php echo $page->share_cta()->kirbytext(); ?>
            </div>
          </div>
        <?php } ?>

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