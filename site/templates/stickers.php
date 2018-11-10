<?php snippet('header') ?>

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
      
      <div class="article-text">
        <?php echo $page->text()->kirbytext() ?>
      </div>
      
    </article>
      
      <div class="merch-grid stickers">
        
        <!-- Stickers which are still for sale -->
        <?php foreach($page->stickers()->toStructure()->sortBy('series_num', 'desc') as $sticker): ?>

          <?php if ($sticker->soldout()->isEmpty()) { ?>     
            <div class="grid-box sticker-box" itemscope itemtype="http://schema.org/Product">
              <a name="<?= $sticker->series_num(); ?>"></a>
              <meta itemprop="category" content="sticker" />
              <meta itemprop="url" content="<?php echo $page->url() . '#'. $sticker->series_num(); ?>" />
              <meta itemprop="description" content="<?php echo strip_tags($page->text()->kirbytext());; ?>" />
              <figure class="thumb-holder">
                <?php if ($sticker->fullsize() != "") { ?>
                  <a onclick="window.open('<?php echo $sticker->fullsize()->toFile()->url(); ?>', 'popupWindow', 'width=<?php echo $sticker->fullsize()->toFile()->width(); ?>,height=<?php echo $sticker->fullsize()->toFile()->height(); ?>');" class="zoom">
                    <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $sticker->pic()->filename() ?>" class="thumb" />
                    
                    <?php if ($sticker->almost_gone == "1") { ?>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="almost-gone">
                        <path d="M-4.3 102l108.6-50.6V102H-4.3z" fill="#333"></path>
                        <path class="almost-gone-text" d="M47.5 90.2c-.5-1.1.2-2 2.3-3.2-.3-.7-.9-1.4-1.8-1-.6.3-1.1.9-1.3 1.3l-.3-.3c.2-.4.7-1.1 1.5-1.4 1.1-.5 1.9.1 2.4 1.2l1.4 3.1-.4.2-.3-.6c-.3.6-.7 1.2-1.4 1.5-.8.2-1.6.1-2.1-.8zm3.2-1.3l-.7-1.6c-1.9 1.1-2.3 1.9-2 2.7.3.7.9.7 1.5.5.5-.3.9-.8 1.2-1.6zm2.4-.6l-3-6.6.4-.2 3 6.6c.1.2.2.3.4.2 0 0 .1 0 .2-.1l.2.3c-.1.1-.1.1-.3.2-.4.3-.7.2-.9-.4zm.4-5.2l.4-.2.4.7c.2-.7.6-1.3 1.1-1.6.8-.4 1.3-.1 1.8.4.3-.8.6-1.5 1.2-1.7 1-.4 1.7-.1 2.3 1.2l1.4 3.1-.4.2-1.4-3c-.5-1-1-1.3-1.8-1-.5.2-.8.7-1 1.6l1.7 3.6-.4.2-1.4-3c-.5-1-1-1.3-1.8-1-.4.2-.8.7-1 1.6l1.7 3.6-.4.2-2.4-4.9zm8.9-1.1c-.7-1.6-.2-3 1-3.5s2.6-.1 3.3 1.5c.7 1.6.1 3-1 3.5-1.2.5-2.6.1-3.3-1.5zm3.8-1.8c-.6-1.3-1.7-1.8-2.7-1.4-1 .4-1.3 1.6-.7 2.9s1.7 1.8 2.7 1.4c.9-.4 1.3-1.6.7-2.9zm2.2 1.3l.1-.4c.6.2 1.1.2 1.8-.1.8-.3.9-1 .7-1.5-.3-.6-1-.6-1.7-.5-.8.1-1.8.1-2.2-.7-.3-.7 0-1.5 1-2 .5-.2 1.1-.3 1.6-.1l-.1.4c-.4-.1-.9-.1-1.3.1-.8.3-.9.9-.7 1.4.3.5.9.5 1.6.5.9-.1 1.8-.2 2.2.7.3.7 0 1.6-1 2.1-.7.3-1.5.3-2 .1zm4.4-3l-1.4-3.1-.8.3-.2-.3.7-.4-.6-1.4.4-.2.6 1.4 1.4-.6.2.4-1.4.6 1.4 3.1c.3.6.6 1 1.3.7.2-.1.4-.3.5-.4l.3.3c-.2.2-.5.4-.7.5-.8.5-1.3 0-1.7-.9zM74.5 90.4c-.2-.4-.1-1 .2-1.5-.3 0-.6-.2-.8-.6-.2-.4 0-.9.1-1.1-.4-.1-.9-.5-1.2-1-.5-1 0-2 .9-2.5.3-.1.5-.2.7-.2l1.6-.7.2.4-1.1.5c.4.1.8.5 1.1 1 .4 1 0 2-.9 2.5-.3.1-.6.2-.9.2-.1.3-.2.6-.1.9.2.3.5.5 1.2.2l1-.5c1.1-.5 1.7-.4 2.1.4s-.1 2-1.5 2.7c-1.2.3-2.2.1-2.6-.7zm1.2-5.7c-.4-.8-1.2-1.1-1.8-.8-.7.3-1 1.1-.6 1.9s1.2 1.1 1.9.8c.5-.3.9-1.1.5-1.9zm2.5 3.7c-.2-.5-.7-.6-1.4-.2l-1 .5c-.1 0-.4.1-.6.2-.3.5-.3 1-.2 1.3.3.6 1 .8 2.1.3.9-.6 1.3-1.5 1.1-2.1zm-.4-3.6c-.7-1.6-.2-3 1-3.5s2.6-.1 3.3 1.5c.7 1.6.1 3-1 3.5s-2.6.1-3.3-1.5zm3.9-1.8c-.6-1.3-1.7-1.8-2.7-1.4s-1.3 1.6-.7 2.9c.6 1.3 1.7 1.8 2.7 1.4s1.2-1.6.7-2.9zm.8-3.3l.4-.2.4.7c.3-.7.6-1.3 1.3-1.6 1-.5 1.7-.1 2.3 1.2l1.4 3.1-.4.2-1.4-3c-.5-1-1-1.4-1.8-1-.6.3-.8.8-1.2 1.6l1.7 3.6-.4.2-2.3-4.8zm6 .2c-.7-1.6-.1-3 .9-3.5 1.1-.5 2.2 0 2.9 1.4.1.1.1.2.1.4L89 79.8c.6 1.2 1.7 1.7 2.8 1.3.5-.2.9-.6 1.1-1l.3.3c-.3.4-.6.8-1.3 1.2-1.3.4-2.7-.1-3.4-1.7zm3.4-1.9c-.6-1.2-1.4-1.6-2.3-1.2-.8.4-1.2 1.4-.8 2.6l3.1-1.4z"></path>
                      </svg>
                    <?php } ?>
                    
                  </a>
                <?php } else { ?>
                  <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $sticker->pic()->filename() ?>" class="thumb" />
                <?php } ?>
              </figure>
              <div class="details">
                <div class="detail full name">
                  <label>Name</label>
                  <div class="text" itemprop="name">
                    <?php echo $sticker->title(); ?>
                  </div>
                </div>

                <div class="detail two-thirds artist">
                  <label>Artist</label>
                  <div class="text">
                    <?php $slug = strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $sticker->artist()))); ?>
                    <?php if ($site->find('meet')->find($slug)) { ?>
                      <a href="http://thefpl.us/meet/<?php echo $slug; ?>"><?php echo $sticker->artist(); ?></a>
                    <?php } else { ?>
                      <span><?php echo $sticker->artist(); ?></span>
                    <?php } ?>
                  </div>
                </div>
                
                <div class="detail third series-number">
                  <label>Series</label>
                  <div class="text">
                    <?php echo $sticker->series_num(); ?>
                  </div>
                </div>
                
              <?php if ($sticker->reference() != "") { ?>
                  <div class="detail full reference"> 
                    <label>Reference</label>
                    <?php if ($site->find('episode')->find($sticker->reference())) { ?>
                      <?php $ep = $site->find('episode')->find($sticker->reference()); ?>
                      <div class="text">
                        <a href="<?= $ep->url(); ?>">
                          <?= $ep->slug() . ': ' .  $ep->title(); ?>
                        </a>
                      </div>
                    <?php } else { ?>
                      <div class="text">
                        <?= $sticker->reference(); ?>
                      </div>
                    <?php } ?>
                  </div>
                <?php } ?>

                <div class="detail third dimensions">
                  <label>Dimensions</label>
                  <div class="text">
                    <?php echo $sticker->dimensions(); ?>
                  </div>
                </div>
                
                <div class="detail third shape">
                  <label>Shape</label>
                  <div class="text">
                    <?php echo $sticker->shape(); ?>
                  </div>
                </div>
                
                <div class="detail third material">
                  <label>Material</label>
                  <div class="text">
                    <?php echo $sticker->vinyl(); ?>
                  </div>
                </div>
                
                <div class="detail third printed">
                  <label>Printed</label>
                  <div class="text">
                    <?php echo $sticker->printed(); ?>
                  </div>
                </div>
                <div class="detail third released">
                  <label>Released</label>
                  <div class="text">
                    <?php if ($sticker->released == "") { ?>
                      pending
                    <?php } else { ?>
                      <?php echo $sticker->date('m/d/y', 'released'); ?>
                      <meta itemprop="releaseDate" content="<?php echo $sticker->released(); ?>" />
                    <?php } ?>
                  </div>
                </div>
                <?php if ($sticker->soldout() != ""): ?>
                  <div class="detail third sold-out">
                    <label>Sold Out</label>
                    <div class="text">
                      <?php echo $sticker->date('m/d/y', 'soldout'); ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ($sticker->soldout() == "" && $sticker->buttona_slug() != ""  && $sticker->released() != "") { ?>
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
                  <div class="detail full no-buttons" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span>SOLD OUT</span>
                    <meta itemprop="availability" content="http://schema.org/SoldOut" />
                    <meta itemprop="priceCurrency" content="USD" />
                    <meta itemprop="price" content="3" />
                  </div>
                <?php } else if ($sticker->released == "") { ?>
                  <div class="detail full no-buttons">
                    <span>PRINTING</span>
                  </div>
                <?php } ?>

              </div>
                <span itemprop="brand" itemscope itemtype="http://schema.org/PerformingGroup">
                  <meta itemprop="name" content="<?php echo $site->title(); ?>" />
                  <meta itemprop="url" content="<?php echo $site->url(); ?>" />
                </span>
            </div>
            <?php } ?>

        <?php endforeach; ?>

        <!-- Stickers which are sold out -->
        <?php foreach($page->stickers()->toStructure()->sortBy('series_num', 'desc') as $sticker): ?>

          <?php if ($sticker->soldout()->isNotEmpty()) { ?>     
            <div class="grid-box sticker-box" itemscope itemtype="http://schema.org/Product">
              <a name="<?= $sticker->series_num(); ?>"></a>
              <meta itemprop="category" content="sticker" />
              <meta itemprop="url" content="<?php echo $page->url() . '#'. $sticker->series_num(); ?>" />
              <meta itemprop="description" content="<?php echo strip_tags($page->text()->kirbytext());; ?>" />
              <figure class="thumb-holder">
                <?php if ($sticker->fullsize() != "") { ?>
                  <a onclick="window.open('<?php echo $sticker->fullsize()->toFile()->url(); ?>', 'popupWindow', 'width=<?php echo $sticker->fullsize()->toFile()->width(); ?>,height=<?php echo $sticker->fullsize()->toFile()->height(); ?>');" class="zoom">
                    <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $sticker->pic()->filename() ?>" class="thumb" />
                    
                    <?php if ($sticker->almost_gone == "1") { ?>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="almost-gone">
                        <path d="M-4.3 102l108.6-50.6V102H-4.3z" fill="#333"></path>
                        <path class="almost-gone-text" d="M47.5 90.2c-.5-1.1.2-2 2.3-3.2-.3-.7-.9-1.4-1.8-1-.6.3-1.1.9-1.3 1.3l-.3-.3c.2-.4.7-1.1 1.5-1.4 1.1-.5 1.9.1 2.4 1.2l1.4 3.1-.4.2-.3-.6c-.3.6-.7 1.2-1.4 1.5-.8.2-1.6.1-2.1-.8zm3.2-1.3l-.7-1.6c-1.9 1.1-2.3 1.9-2 2.7.3.7.9.7 1.5.5.5-.3.9-.8 1.2-1.6zm2.4-.6l-3-6.6.4-.2 3 6.6c.1.2.2.3.4.2 0 0 .1 0 .2-.1l.2.3c-.1.1-.1.1-.3.2-.4.3-.7.2-.9-.4zm.4-5.2l.4-.2.4.7c.2-.7.6-1.3 1.1-1.6.8-.4 1.3-.1 1.8.4.3-.8.6-1.5 1.2-1.7 1-.4 1.7-.1 2.3 1.2l1.4 3.1-.4.2-1.4-3c-.5-1-1-1.3-1.8-1-.5.2-.8.7-1 1.6l1.7 3.6-.4.2-1.4-3c-.5-1-1-1.3-1.8-1-.4.2-.8.7-1 1.6l1.7 3.6-.4.2-2.4-4.9zm8.9-1.1c-.7-1.6-.2-3 1-3.5s2.6-.1 3.3 1.5c.7 1.6.1 3-1 3.5-1.2.5-2.6.1-3.3-1.5zm3.8-1.8c-.6-1.3-1.7-1.8-2.7-1.4-1 .4-1.3 1.6-.7 2.9s1.7 1.8 2.7 1.4c.9-.4 1.3-1.6.7-2.9zm2.2 1.3l.1-.4c.6.2 1.1.2 1.8-.1.8-.3.9-1 .7-1.5-.3-.6-1-.6-1.7-.5-.8.1-1.8.1-2.2-.7-.3-.7 0-1.5 1-2 .5-.2 1.1-.3 1.6-.1l-.1.4c-.4-.1-.9-.1-1.3.1-.8.3-.9.9-.7 1.4.3.5.9.5 1.6.5.9-.1 1.8-.2 2.2.7.3.7 0 1.6-1 2.1-.7.3-1.5.3-2 .1zm4.4-3l-1.4-3.1-.8.3-.2-.3.7-.4-.6-1.4.4-.2.6 1.4 1.4-.6.2.4-1.4.6 1.4 3.1c.3.6.6 1 1.3.7.2-.1.4-.3.5-.4l.3.3c-.2.2-.5.4-.7.5-.8.5-1.3 0-1.7-.9zM74.5 90.4c-.2-.4-.1-1 .2-1.5-.3 0-.6-.2-.8-.6-.2-.4 0-.9.1-1.1-.4-.1-.9-.5-1.2-1-.5-1 0-2 .9-2.5.3-.1.5-.2.7-.2l1.6-.7.2.4-1.1.5c.4.1.8.5 1.1 1 .4 1 0 2-.9 2.5-.3.1-.6.2-.9.2-.1.3-.2.6-.1.9.2.3.5.5 1.2.2l1-.5c1.1-.5 1.7-.4 2.1.4s-.1 2-1.5 2.7c-1.2.3-2.2.1-2.6-.7zm1.2-5.7c-.4-.8-1.2-1.1-1.8-.8-.7.3-1 1.1-.6 1.9s1.2 1.1 1.9.8c.5-.3.9-1.1.5-1.9zm2.5 3.7c-.2-.5-.7-.6-1.4-.2l-1 .5c-.1 0-.4.1-.6.2-.3.5-.3 1-.2 1.3.3.6 1 .8 2.1.3.9-.6 1.3-1.5 1.1-2.1zm-.4-3.6c-.7-1.6-.2-3 1-3.5s2.6-.1 3.3 1.5c.7 1.6.1 3-1 3.5s-2.6.1-3.3-1.5zm3.9-1.8c-.6-1.3-1.7-1.8-2.7-1.4s-1.3 1.6-.7 2.9c.6 1.3 1.7 1.8 2.7 1.4s1.2-1.6.7-2.9zm.8-3.3l.4-.2.4.7c.3-.7.6-1.3 1.3-1.6 1-.5 1.7-.1 2.3 1.2l1.4 3.1-.4.2-1.4-3c-.5-1-1-1.4-1.8-1-.6.3-.8.8-1.2 1.6l1.7 3.6-.4.2-2.3-4.8zm6 .2c-.7-1.6-.1-3 .9-3.5 1.1-.5 2.2 0 2.9 1.4.1.1.1.2.1.4L89 79.8c.6 1.2 1.7 1.7 2.8 1.3.5-.2.9-.6 1.1-1l.3.3c-.3.4-.6.8-1.3 1.2-1.3.4-2.7-.1-3.4-1.7zm3.4-1.9c-.6-1.2-1.4-1.6-2.3-1.2-.8.4-1.2 1.4-.8 2.6l3.1-1.4z"></path>
                      </svg>
                    <?php } ?>
                    
                  </a>
                <?php } else { ?>
                  <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $sticker->pic()->filename() ?>" class="thumb" />
                <?php } ?>
              </figure>
              <div class="details">
                <div class="detail full name">
                  <label>Name</label>
                  <div class="text" itemprop="name">
                    <?php echo $sticker->title(); ?>
                  </div>
                </div>

                <div class="detail two-thirds artist">
                  <label>Artist</label>
                  <div class="text">
                    <?php $slug = strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $sticker->artist()))); ?>
                    <?php if ($site->find('meet')->find($slug)) { ?>
                      <a href="http://thefpl.us/meet/<?php echo $slug; ?>"><?php echo $sticker->artist(); ?></a>
                    <?php } else { ?>
                      <span><?php echo $sticker->artist(); ?></span>
                    <?php } ?>
                  </div>
                </div>
                
                <div class="detail third series-number">
                  <label>Series</label>
                  <div class="text">
                    <?php echo $sticker->series_num(); ?>
                  </div>
                </div>
                
              <?php if ($sticker->reference() != "") { ?>
                  <div class="detail full reference"> 
                    <label>Reference</label>
                    <?php if ($site->find('episode')->find($sticker->reference())) { ?>
                      <?php $ep = $site->find('episode')->find($sticker->reference()); ?>
                      <div class="text">
                        <a href="<?= $ep->url(); ?>">
                          <?= $ep->slug() . ': ' .  $ep->title(); ?>
                        </a>
                      </div>
                    <?php } else { ?>
                      <div class="text">
                        <?= $sticker->reference(); ?>
                      </div>
                    <?php } ?>
                  </div>
                <?php } ?>

                <div class="detail third dimensions">
                  <label>Dimensions</label>
                  <div class="text">
                    <?php echo $sticker->dimensions(); ?>
                  </div>
                </div>
                
                <div class="detail third shape">
                  <label>Shape</label>
                  <div class="text">
                    <?php echo $sticker->shape(); ?>
                  </div>
                </div>
                
                <div class="detail third material">
                  <label>Material</label>
                  <div class="text">
                    <?php echo $sticker->vinyl(); ?>
                  </div>
                </div>
                
                <div class="detail third printed">
                  <label>Printed</label>
                  <div class="text">
                    <?php echo $sticker->printed(); ?>
                  </div>
                </div>
                <div class="detail third released">
                  <label>Released</label>
                  <div class="text">
                    <?php if ($sticker->released == "") { ?>
                      pending
                    <?php } else { ?>
                      <?php echo $sticker->date('m/d/y', 'released'); ?>
                      <meta itemprop="releaseDate" content="<?php echo $sticker->released(); ?>" />
                    <?php } ?>
                  </div>
                </div>
                <?php if ($sticker->soldout() != ""): ?>
                  <div class="detail third sold-out">
                    <label>Sold Out</label>
                    <div class="text">
                      <?php echo $sticker->date('m/d/y', 'soldout'); ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ($sticker->soldout() == "" && $sticker->buttona_slug() != ""  && $sticker->released() != "") { ?>
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
                  <div class="detail full no-buttons" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span>SOLD OUT</span>
                    <meta itemprop="availability" content="http://schema.org/SoldOut" />
                    <meta itemprop="priceCurrency" content="USD" />
                    <meta itemprop="price" content="3" />
                  </div>
                <?php } else if ($sticker->released == "") { ?>
                  <div class="detail full no-buttons">
                    <span>PRINTING</span>
                  </div>
                <?php } ?>

              </div>
                <span itemprop="brand" itemscope itemtype="http://schema.org/PerformingGroup">
                  <meta itemprop="name" content="<?php echo $site->title(); ?>" />
                  <meta itemprop="url" content="<?php echo $site->url(); ?>" />
                </span>
            </div>
            <?php } ?>

        <?php endforeach; ?>
      </div>
  
      <article class="full default" style="margin-top:20px;">
        <div class="splc-description">
          <?php echo $page->splc_desc()->kirbytext() ?>
          <?php $splc_total = (int)(string)$page->splc_total(); ?>
          <p>Sales of these stickers have contributed <strong>$<?php echo number_format($splc_total); ?></strong> to their campaign. Last donation made on <strong><?php echo date('F jS, Y', strtotime($page->splc_asof())); ?></strong></p>
        </div>
      <article class="full default">

      <div class="product-photos">
        <h3>Some Stickers in the world...</h3>
        <?php foreach($page->photos()->toStructure()->sortBy('series_num', 'desc') as $photo): ?>
          <div class="photo-holder">
            <?php if ($photo->full_size() != "") { ?>
              <a onclick="window.open('<?= $photo->full_size()->toFile()->url() ?>', 'popupWindow', 'width=<?php echo $photo->full_size()->toFile()->width(); ?>,height=<?php echo $photo->full_size()->toFile()->height(); ?>');" class="zoom">
                  <img src="<?php echo $page->url() ?>/<?php echo $photo->pic()->filename() ?>" data-series="<?php echo $photo->series_num(); ?>" alt="<?php echo $photo->desc(); ?>" />
              </a>
            <?php } else { ?>
              <img src="<?php echo $page->url() ?>/<?php echo $photo->pic()->filename() ?>" data-series="<?php echo $photo->series_num(); ?>" alt="<?php echo $photo->desc(); ?>" />
            <?php } ?>
          </div>
        <?php endforeach; ?>
        <div class="share-your-photo">
          <?php echo $page->share_cta()->kirbytext(); ?>
        </div>
      </div>
      
      <?php snippet('tags') ?>
  
    <section class="comments disqus">
      <?php snippet('disqus-alt', array('allow_comments' => true)) ?>
    </section>
    
  </main>

<?php snippet('footer') ?>