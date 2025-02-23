<?php snippet('header') ?>

<?php
  $pubdate = date('l, F jS Y', $page->date());
  $pubtime = date("g:ia", strtotime($page->time()));
?>

<main class="main page" role="main">

    <article class="full <?php if($page->show_image() != 'true') { echo 'default'; } ?>" <?php if ($page->product_type() == "single") { echo ' itemscope itemtype="https://schema.org/Product" '; } ?> >

      <meta itemprop="url" content="<?= $page->url(); ?>" />
      
      <?php if($page->show_image() == 'true'):  ?>
        <figure>
          <?php if ($page->show_different_image() == "yes" && $page->page_image()->isNotEmpty()) { ?>
            <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->page_image()->filename() ?>" class="cover" alt="<?php echo $page->title() ?>" itemprop="image">
          <?php } else if ($page->cover() != "") { ?>
            <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="cover" alt="<?php echo $page->title() ?>" itemprop="image">
          <?php } else { ?>
            <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $page->title() ?>" itemprop="image">
          <?php } ?>
        </figure>
      <?php endif ?>

      <header>
        <h1 style="margin-bottom:0;" itemprop="name"><?php echo $page->title() ?></h1>
        
        <!-- DATE & TIME -->
        <time class="released" content="<?php echo $page->date('Y-m-d'); ?>T<?php echo $page->time(); ?>+06:00" itemprop="releaseDate">
          
          <?php if ($page->product_type() == "series") { 
            echo '<span>Last Release: </span>'; 
          }  else {
            echo '<span>Released: </span>'; 
          } ?>

          <strong class="date">
            <?php echo date('l, F jS Y', $page->date()); ?>
          </strong>
          @
          <strong class="time">
            <?php echo date("g:ia", strtotime($page->time())); ?>
          </strong>
        </time>
      </header>
      
      <div class="article-text" itemprop="description">
        <?php echo $page->text()->kirbytext() ?>
      </div>

      <? /* Single Product Form */ ?>
      <?php if ($page->product_type() == "single" && $page->buy_slug()->isNotEmpty()) { ?>
        

        <?php if ($page->soldout() == "1") { ?>

          <div style="font-size:170%; margin-top:1em;">SOLD OUT</div>

        <?php } else { ?>

          <form action="https://www.paypal.com/cgi-bin/webscr" class="paypal-buy-form" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="<?= $page->buy_slug(); ?>">
            <?php if ($page->buy_form_extra_html()->isNotEmpty()) { echo $page->buy_form_extra_html(); } ?>
            <button class="button submit" type="submit" onclick="trackEvent('merch', '<?= $page->title(); ?>', '<?= $page->title(); ?>', $page->buy_price());">
              <?php 
                if ($page->button_text()->isNotEmpty()) { echo $page->button_text(); 
                } else { echo 'BUY NOW'; } 
              ?>
            </button>
          </form>

        <?php } ?>

      <?php } ?>


      <?php if ($page->buy_price()->isNotEmpty()) { ?>
        <div itemprop="offers" itemscope itemtype="https://schema.org/Offer">
          <meta itemprop="price" content="<?= $page->buy_price(); ?>" />
          <meta itemprop="priceCurrency" content="USD" />

          <?php if ($page->soldout() == "0") { ?>
            <meta itemprop="availability" content="InStock" />
          <?php } else { ?>
            <meta itemprop="availability" content="SoldOut" />
          <?php } ?>

        </div>
      <?php } ?>


      <meta itemprop="brand" itemtype="https://schema.org/Organization" content="The F Plus" />

    </article>
      

    <?php if ($page->products()->isNotEmpty()) { ?>
      <div class="merch-grid buttons" style="margin-top:20px;">
        
        <?php foreach($page->products()->toStructure()->sortBy('series_num', 'desc') as $product): ?>
          <div class="grid-box button" itemscope itemtype="http://schema.org/Product">
            <a name="<?= $product->series_num(); ?>"></a>
            <!-- <meta itemprop="category" content="sticker" /> -->
            <meta itemprop="url" content="<?php echo $page->url() . '#'. $product->series_num(); ?>" />
            <meta itemprop="description" content="<?php echo strip_tags($page->text()->kirbytext());; ?>" />
            
            <?php if ($page->product_image_type() == "maxheight") { ?>
              <?php
                $figStyle = "";
                if ($page->figure_bg() != "") { $figStyle = 'style="background-image:url('.$page->figure_bg()->toFile()->url().')"'; }
              ?>
              <figure class="thumb-holder" <?= $figStyle; ?>>
                <?php if ($product->fullsize() != "") { ?>
                  <a class="zoom-photo" full-size="<?= $product->fullsize()->toFile()->url() ?>" full-width="<?= $product->fullsize()->toFile()->width() ?>" full-height="<?= $product->fullsize()->toFile()->height() ?>" itemprop="image">
                    <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $product->pic()->filename() ?>" class="thumb" />
                  </a>
                <?php } else { ?>
                  <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $product->pic()->filename() ?>" class="thumb" />
                <?php } ?>
              </figure>
            <?php } else { ?>
              <figure>
                <?php if ($product->fullsize() != "") { ?>
                  <a class="zoom-photo" full-size="<?= $product->fullsize()->toFile()->url() ?>" full-width="<?= $product->fullsize()->toFile()->width() ?>" full-height="<?= $product->fullsize()->toFile()->height() ?>" itemprop="image">
                    <img itemprop="image" src="<?php echo $product->pic()->toFile()->url(); ?>" class="thumb" />
                  </a>
                <?php } else { ?>
                  <img itemprop="image" src="<?php echo $product->pic()->toFile()->url(); ?>" class="thumb" />
                <?php } ?>
              </figure>
            <?php } ?>
            <div class="details">
              <div class="detail full name" itemprop="name">
                <label>Name</label>
                <div class="text"><?php echo $product->title(); ?></div>
              </div>

              <div class="detail two-thirds artist">
                <label>Artist</label>
                <?php $slug = strtolower(preg_replace('/\s+/', '-', str_replace(array("'", '!'), "", $product->artist()))); ?>
                <div class="text">
                  <?php if ($site->find('meet')->find($slug)) { ?>
                    <a href="http://thefpl.us/meet/<?php echo $slug; ?>"><?php echo $product->artist(); ?></a>
                  <?php } else { ?>
                    <span><?php echo $product->artist(); ?></span>
                  <?php } ?>
                </div>
              </div>
              <div class="detail third series">
                <label>Series</label>
                <div class="text">
                  <?php echo $product->series_num(); ?>
                </div>
              </div>
              
              <?php if ($product->reference() != "") { ?>
                <div class="detail full reference"> 
                  <label>Reference</label>
                  <?php if ($site->find('episode')->find($product->reference())) { ?>
                    <?php $ep = $site->find('episode')->find($product->reference()); ?>
                    <div class="text">
                      <a href="<?= $ep->url(); ?>">
                        <?= $ep->slug() . ': ' .  $ep->title(); ?>
                      </a>
                    </div>
                  <?php } else { ?>
                    <div class="text">
                      <?= $product->reference(); ?>
                    </div>
                  <?php } ?>
                </div>
              <?php } ?>
              
              <?php if ($product->dimensions() != "") { ?>
                <div class="detail third dimensions">
                  <label>Dimensions</label>
                  <div class="text">
                    <?php echo $product->dimensions(); ?>
                  </div>
                </div>
              <?php } ?>
              
              <?php if ($product->material() != "") { ?>
                <div class="detail third material">
                  <label>Material</label>
                  <div class="text">
                    <?php echo $product->material(); ?>
                  </div>
                </div>
              <?php } ?>
              
              <?php if ($product->printed() != "") { ?>
                <div class="detail third printed">
                  <label>Printed</label>
                  <div class="text">
                    <?php echo $product->printed(); ?>
                  </div>
                </div>
              <?php } ?>
              
              <?php if ($product->price() != "") { ?>
                <div class="detail third price">
                  <label>Price</label>
                  <div class="text">
                    $<?php echo $product->price(); ?>
                  </div>
                </div>
              <?php } ?>
              
              <div class="detail third released">
                <?php if ($product->released == "") { ?>
                  <label>Release</label>
                  <div class="text">
                    pending
                  </div>
                <?php } else { ?>
                  <label>Released</label>
                  <div class="text">
                    <?php echo $product->date('m/d/y', 'released'); ?>
                  </div>
                  <meta itemprop="releaseDate" content="<?php echo $product->released(); ?>" />
                <?php } ?>
              </div>
              <?php if ($product->soldout() != ""): ?>
                <div class="detail third sold-out">
                  <label>Sold Out</label>
                  <div class="text">
                    <?php echo $product->date('m/d/y', 'soldout'); ?>
                  </div>
                </div>
              <?php endif; ?>
              
              <?php $productAvailable = false; ?>
              <?php if ($product->buy_type() == "single" && $product->released != "") { ?>
                <?php if ($product->soldout() == "" && $product->single_slug() != "") { ?>
                  <?php $productAvailable = true; ?>
                  <div class="detail full buy-buttons" itemprop="offers" itemscope itemtype="http://schema.org/Offer" >
                    <meta itemprop="priceCurrency" content="USD" />
                    <meta itemprop="price" content="<?php echo $product->price(); ?>" />
                    <meta itemprop="url" content="<?php echo $page->url() . '#'. $product->series_num(); ?>" />
                    <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                    <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                    <div class="buttons single-button">
                      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick"/>
                        <input type="hidden" name="hosted_button_id" value="<?php echo $product->single_slug(); ?>"/>
                        <button class="single-button" type="submit" onclick="trackEvent('stickers', '<?php echo $product->title(); ?>', '$<?php echo $product->price(); ?>', <?php echo $product->price(); ?>);">
                          <?php if ($product->single_buttontext() !="") { echo $product->single_buttontext(); } else { echo 'BUY NOW'; } ?>
                        </button>
                      </form>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($product->buy_type() == "multiple") { ?>
                <?php if ($product->soldout() == "" && $product->buttona_slug() != "") { ?>
                  <?php $productAvailable = true; ?>
                  <div class="detail full buy-buttons">
                    <label>Buy Now</label>
                    <div class="buttons">
                      <?php if ($product->buttona_slug() != ""): ?>
                        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                          <meta itemprop="name" content="<?php echo $product->buttona_num(); ?> X <?php echo $product->title(); ?>" />
                          <meta itemprop="priceCurrency" content="USD" />
                          <meta itemprop="price" content="<?php echo $product->buttona_price(); ?>" />
                          <meta itemprop="url" content="<?php echo $page->url(); ?>" />
                          <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                          <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                        </div>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                          <input type="hidden" name="cmd" value="_s-xclick"/>
                          <input type="hidden" name="hosted_button_id" value="<?php echo $product->buttona_slug(); ?>"/>
                          <button type="submit" onclick="trackEvent('merch', '<?php echo $product->title(); ?>', '<?php echo $product->buttona_num(); ?> @ $<?php echo $product->buttona_price(); ?>', <?php echo $product->buttona_price(); ?>);"><?php echo $product->buttona_num(); ?> @ $<?php echo $product->buttona_price(); ?></button>
                        </form>
                      <?php endif; ?>
                      <?php if ($product->buttonb_slug() != ""): ?>
                        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                          <meta itemprop="name" content="<?php echo $product->buttonb_num(); ?> X <?php echo $product->title(); ?>" />
                          <meta itemprop="priceCurrency" content="USD" />
                          <meta itemprop="price" content="<?php echo $product->buttonb_price(); ?>" />
                          <meta itemprop="url" content="<?php echo $page->url(); ?>" />
                          <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                          <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                        </div>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                          <input type="hidden" name="cmd" value="_s-xclick"/>
                          <input type="hidden" name="hosted_button_id" value="<?php echo $product->buttonb_slug(); ?>"/>
                          <button type="submit" onclick="trackEvent('merch', '<?php echo $product->title(); ?>', '<?php echo $product->buttonb_num(); ?> @ $<?php echo $product->buttonb_price(); ?>', <?php echo $product->buttonb_price(); ?>);"><?php echo $product->buttonb_num(); ?> @ $<?php echo $product->buttonb_price(); ?></button>
                        </form>
                      <?php endif; ?>
                      <?php if ($product->buttonc_slug() != ""): ?>
                        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                          <meta itemprop="name" content="<?php echo $product->buttonc_num(); ?> X <?php echo $product->title(); ?>" />
                          <meta itemprop="priceCurrency" content="USD" />
                          <meta itemprop="price" content="<?php echo $product->buttonc_price(); ?>" />
                          <meta itemprop="url" content="<?php echo $page->url(); ?>" />
                          <meta itemprop="itemCondition" itemtype="http://schema.org/NewCondition" />
                          <meta itemprop="availability" itemtype="http://schema.org/LimitedAvailability" />
                        </div>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                          <input type="hidden" name="cmd" value="_s-xclick"/>
                          <input type="hidden" name="hosted_button_id" value="<?php echo $product->buttonc_slug(); ?>"/>
                          <button type="submit" onclick="trackEvent('merch', '<?php echo $product->title(); ?>', '<?php echo $product->buttonc_num(); ?> @ $<?php echo $product->buttonc_price(); ?>', <?php echo $product->buttonc_price(); ?>);"><?php echo $product->buttonc_num(); ?> @ $<?php echo $product->buttonc_price(); ?></button>
                        </form>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
              <?php if ($productAvailable == false) { ?>
                <?php if ($product->soldout() != "") { ?>
                  <div class="detail no-buttons" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span>SOLD OUT</span>
                    <meta itemprop="availability" content="http://schema.org/SoldOut" />
                    <meta itemprop="priceCurrency" content="USD" />
                    <?php if ($product->price() != "") { ?>
                      <meta itemprop="price" content="<?= $product->price(); ?>" />
                    <?php } else if ($product->buttona_price() != "") { ?> 
                      <meta itemprop="price" content="<?= $product->buttona_price(); ?>" />
                    <?php } ?>
                  </div>
                <?php } else if ($product->released == "") { ?>
                  <div class="detail no-buttons">
                    <span>PRINTING</span>
                  </div>
                <?php } ?>
              <?php } ?>

            </div>
            <span itemprop="brand" itemscope itemtype="http://schema.org/PerformingGroup">
              <meta itemprop="name" content="<?php echo $site->title(); ?>" />
              <meta itemprop="url" content="<?php echo $site->url(); ?>" />
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    <?php } ?>

    <?php if ($page->photos() != "") { ?>  
      <article class="full">

          <div class="product-photos">
            <?php if ($page->photos_leadin() != "") { ?>
              <h3><?= $page->photos_leadin(); ?></h3>
            <?php } ?>

            <?php if ($page->product_type() == "series") { ?>
              <?php foreach($page->photos()->toStructure()->sortBy('series_num', 'desc') as $photo): ?>
                <?php snippet('photogrid',  [ 'photo' => $photo]) ?>
              <?php endforeach; ?>
            <?php } else { ?>
              <?php foreach($page->photos()->toStructure() as $photo): ?>
                <?php snippet('photogrid',  [ 'photo' => $photo]) ?>
              <?php endforeach; ?>
            <?php } ?>
            <div class="share-your-photo">
              <?php echo $page->share_cta()->kirbytext(); ?>
            </div>
          </div>
        
        <?php snippet('tags') ?>
        
      </article>
    <?php } ?>
  
    <section class="comments disqus">
      <?php snippet('disqus', array('allow_comments' => true)) ?>
    </section>
    
  </main>

<?php snippet('footer') ?>