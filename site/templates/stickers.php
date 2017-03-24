<?php snippet('header') ?>
<link href="/assets/css/sticker-boxes.css?updated=2017-03-15" rel="stylesheet" type="text/css">

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
      
      <div class="stickers">
        
        <?php foreach($page->stickers()->toStructure()->sortBy('series_num', 'desc') as $sticker): ?>
          <dl class="sticker-box" itemscope itemtype="http://schema.org/Product">
            <meta itemprop="category" content="sticker" />
            <meta itemprop="url" content="<?php echo $page->url(); ?>" />
            <meta itemprop="description" content="<?php echo strip_tags($page->text()->kirbytext());; ?>" />
            <dt>
              <div class="thumb-holder">
                <?php if ($sticker->fullsize() != "") { ?>
                  <a onclick="window.open('<?php echo $page->url() ?>/<?php echo $sticker->fullsize()->filename() ?>', 'popupWindow', 'width=<?php echo $sticker->fullsize()->toFile()->width(); ?>,height=<?php echo $sticker->fullsize()->toFile()->height(); ?>');" class="zoom">
                    <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $sticker->pic()->filename() ?>" class="thumb" />
                  </a>
                <?php } else { ?>
                  <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $sticker->pic()->filename() ?>" class="thumb" />
                <?php } ?>
              </div>
              <div class="details">
                <div class="full title" itemprop="name"><?php echo $sticker->title(); ?></div>
                
                <div class="two-thirds artist">
                  <?php $slug = strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $sticker->artist()))); ?>
                  <?php if ($site->find('meet')->find($slug)) { ?>
                    <a href="http://thefpl.us/meet/<?php echo $slug; ?>"><?php echo $sticker->artist(); ?></a>
                  <?php } else { ?>
                    <span><?php echo $sticker->artist(); ?></span>
                  <?php } ?>
                </div>
                <div class="third series-number"><?php echo $sticker->series_num(); ?></div>
                
                <div class="third dimensions"><?php echo $sticker->dimensions(); ?></div>
                <div class="third shape"><?php echo $sticker->shape(); ?></div>
                <div class="third material"><?php echo $sticker->vinyl(); ?></div>
                <div class="third printed"><?php echo $sticker->printed(); ?></div>
                <div class="third released">
                  <?php if ($sticker->released == "") { ?>
                    pending
                  <?php } else { ?>
                    <?php echo $sticker->date('m/d/y', 'released'); ?>
                    <meta itemprop="releaseDate" content="<?php echo $sticker->released(); ?>" />
                  <?php } ?>
                </div>
                <?php if ($sticker->soldout() != ""): ?>
                  <div class="third sold-out">
                    <?php echo $sticker->date('m/d/y', 'soldout'); ?>
                  </div>
                <?php endif; ?>
                
                <?php if ($sticker->soldout() == "" && $sticker->buttona_slug() != "") { ?>
                  <div class="buy-buttons">
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
                <?php } else if ($sticker->soldout() != "") { ?>
                  <div class="no-buttons" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span>SOLD OUT</span>
                    <meta itemprop="availability" content="http://schema.org/SoldOut" />
                    <meta itemprop="priceCurrency" content="USD" />
                    <meta itemprop="price" content="3" />
                  </div>
                <?php } ?>
                
              </div>
              <span itemprop="brand" itemscope itemtype="http://schema.org/PerformingGroup">
                <meta itemprop="name" content="<?php echo $site->title(); ?>" />
                <meta itemprop="url" content="<?php echo $site->url(); ?>" />
              </span>
            </dt>
          </dl>
        <?php endforeach; ?>
      </div>
      
      <div class="splc-description">
        <?php echo $page->splc_desc()->kirbytext() ?>
        <p>Sales of these stickers have contributed <strong>$<?php echo $page->splc_total(); ?></strong> to their campaign. Last donation made on <strong><?php echo date('F jS, Y', strtotime($page->splc_asof())); ?></strong></p>
      </div>

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
      
    </article>
  
    <section class="comments disqus">
      <?php snippet('disqus-alt', array('allow_comments' => true)) ?>
    </section>
    
  </main>

<?php snippet('footer') ?>