<?php snippet('header') ?>

  <main class="main page" role="main">
    
    <section class="merch-grid current">
      
      <article class="full default">
        <div class="article-text">
          <?php echo $page->text()->kirbytext() ?>
        </div>
        <a name="available"></a>
      </article>
      

      <?php if ($page->current_text()->isNotEmpty()) { ?>
        <article class="full default">
          <?php echo $page->current_text()->kirbytext() ?>
        </article>
      <?php } ?>

      <?php foreach($page->current_merch()->toStructure()->flip() as $merch) { ?>
      
        <a href="<?= $merch->url(); ?>" class="grid-box">
          <figure>
            <img src="<?= $merch->pic()->toFile()->url(); ?>" alt="<? $merch->title(); ?>" />
            
            <?php if ($merch->almost_gone == "1") { ?>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="almost-gone">
                <path d="M-4.3 102l108.6-50.6V102H-4.3z" fill="#333"/>
                <path class="almost-gone-text" d="M47.5 90.2c-.5-1.1.2-2 2.3-3.2-.3-.7-.9-1.4-1.8-1-.6.3-1.1.9-1.3 1.3l-.3-.3c.2-.4.7-1.1 1.5-1.4 1.1-.5 1.9.1 2.4 1.2l1.4 3.1-.4.2-.3-.6c-.3.6-.7 1.2-1.4 1.5-.8.2-1.6.1-2.1-.8zm3.2-1.3l-.7-1.6c-1.9 1.1-2.3 1.9-2 2.7.3.7.9.7 1.5.5.5-.3.9-.8 1.2-1.6zm2.4-.6l-3-6.6.4-.2 3 6.6c.1.2.2.3.4.2 0 0 .1 0 .2-.1l.2.3c-.1.1-.1.1-.3.2-.4.3-.7.2-.9-.4zm.4-5.2l.4-.2.4.7c.2-.7.6-1.3 1.1-1.6.8-.4 1.3-.1 1.8.4.3-.8.6-1.5 1.2-1.7 1-.4 1.7-.1 2.3 1.2l1.4 3.1-.4.2-1.4-3c-.5-1-1-1.3-1.8-1-.5.2-.8.7-1 1.6l1.7 3.6-.4.2-1.4-3c-.5-1-1-1.3-1.8-1-.4.2-.8.7-1 1.6l1.7 3.6-.4.2-2.4-4.9zm8.9-1.1c-.7-1.6-.2-3 1-3.5s2.6-.1 3.3 1.5c.7 1.6.1 3-1 3.5-1.2.5-2.6.1-3.3-1.5zm3.8-1.8c-.6-1.3-1.7-1.8-2.7-1.4-1 .4-1.3 1.6-.7 2.9s1.7 1.8 2.7 1.4c.9-.4 1.3-1.6.7-2.9zm2.2 1.3l.1-.4c.6.2 1.1.2 1.8-.1.8-.3.9-1 .7-1.5-.3-.6-1-.6-1.7-.5-.8.1-1.8.1-2.2-.7-.3-.7 0-1.5 1-2 .5-.2 1.1-.3 1.6-.1l-.1.4c-.4-.1-.9-.1-1.3.1-.8.3-.9.9-.7 1.4.3.5.9.5 1.6.5.9-.1 1.8-.2 2.2.7.3.7 0 1.6-1 2.1-.7.3-1.5.3-2 .1zm4.4-3l-1.4-3.1-.8.3-.2-.3.7-.4-.6-1.4.4-.2.6 1.4 1.4-.6.2.4-1.4.6 1.4 3.1c.3.6.6 1 1.3.7.2-.1.4-.3.5-.4l.3.3c-.2.2-.5.4-.7.5-.8.5-1.3 0-1.7-.9zM74.5 90.4c-.2-.4-.1-1 .2-1.5-.3 0-.6-.2-.8-.6-.2-.4 0-.9.1-1.1-.4-.1-.9-.5-1.2-1-.5-1 0-2 .9-2.5.3-.1.5-.2.7-.2l1.6-.7.2.4-1.1.5c.4.1.8.5 1.1 1 .4 1 0 2-.9 2.5-.3.1-.6.2-.9.2-.1.3-.2.6-.1.9.2.3.5.5 1.2.2l1-.5c1.1-.5 1.7-.4 2.1.4s-.1 2-1.5 2.7c-1.2.3-2.2.1-2.6-.7zm1.2-5.7c-.4-.8-1.2-1.1-1.8-.8-.7.3-1 1.1-.6 1.9s1.2 1.1 1.9.8c.5-.3.9-1.1.5-1.9zm2.5 3.7c-.2-.5-.7-.6-1.4-.2l-1 .5c-.1 0-.4.1-.6.2-.3.5-.3 1-.2 1.3.3.6 1 .8 2.1.3.9-.6 1.3-1.5 1.1-2.1zm-.4-3.6c-.7-1.6-.2-3 1-3.5s2.6-.1 3.3 1.5c.7 1.6.1 3-1 3.5s-2.6.1-3.3-1.5zm3.9-1.8c-.6-1.3-1.7-1.8-2.7-1.4s-1.3 1.6-.7 2.9c.6 1.3 1.7 1.8 2.7 1.4s1.2-1.6.7-2.9zm.8-3.3l.4-.2.4.7c.3-.7.6-1.3 1.3-1.6 1-.5 1.7-.1 2.3 1.2l1.4 3.1-.4.2-1.4-3c-.5-1-1-1.4-1.8-1-.6.3-.8.8-1.2 1.6l1.7 3.6-.4.2-2.3-4.8zm6 .2c-.7-1.6-.1-3 .9-3.5 1.1-.5 2.2 0 2.9 1.4.1.1.1.2.1.4L89 79.8c.6 1.2 1.7 1.7 2.8 1.3.5-.2.9-.6 1.1-1l.3.3c-.3.4-.6.8-1.3 1.2-1.3.4-2.7-.1-3.4-1.7zm3.4-1.9c-.6-1.2-1.4-1.6-2.3-1.2-.8.4-1.2 1.4-.8 2.6l3.1-1.4z"/>
              </svg>
            <?php } ?>
            
          </figure>
          <div class="details">
            <div class="detail name full">
              <label>Name</label>
              <div class="text"><?= $merch->title(); ?></div>
            </div>
            <div class="detail type half">
              <label>Type</label>
              <div class="text"><?= $merch->type(); ?></div>
            </div>
            <div class="detail price half">
              <label>Price</label>
              <div class="text"><?= $merch->price(); ?></div>
            </div>
          </div>
        </a>
      <?php } ?>
    </section>
    
    <section class="merch-grid sold-out" style="margin-top:4em;">
      <a name="soldout"></a>
      <article class="full default">
        <?php echo $page->sold_text()->kirbytext() ?>
      </article>
      <?php foreach($page->sold_merch()->toStructure()->sortBy('sold_date', 'desc') as $merch) { ?>
      
        <div href="<?= $merch->url(); ?>" class="grid-box">
          <figure>
            <img src="<?= $merch->pic()->toFile()->url(); ?>" alt="<? $merch->title(); ?>" />
          </figure>
          <div class="details">
            <div class="detail name full">
              <label>Name</label>
              <?php if ($merch->url() != "") { ?>
                <div class="text">
                  <a href="<?= $merch->url(); ?>" class="title-link">
                    <?= $merch->title(); ?>
                  </a>
                </div>
              <?php } else { ?>
                <div class="text">
                  <?= $merch->title(); ?>
                </div>
              <?php } ?>
            </div>
            
            <?php if ($merch->type() != "") { ?>
              <div class="detail type half">
                <label>Type</label>
                <div class="text">
                  <?= $merch->type(); ?>
                </div>
              </div>
            <?php } ?>
            <?php if ($merch->sold_date() != "") { ?>
              <div class="detail date sold-date half">
                <label>Sold Out</label>
                <div class="text">
                  <?= $merch->date('m/d/y', 'sold_date'); ?>
                </div>
              </div>
            <?php } ?>
            
          </div>
        </div>
      <?php } ?>
    </section>
    
  </main>

<?php snippet('footer') ?>