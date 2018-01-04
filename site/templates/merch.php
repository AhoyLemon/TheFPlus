<?php snippet('header') ?>

  <main class="main page" role="main">

    <article class="full default">
      
    </article>
    
    <section class="merch-grid current">
      
      <article class="full default">
        <?php echo $page->text()->kirbytext() ?>
      </article>
      
      <?php foreach($page->current_merch()->toStructure() as $merch) { ?>
      
        <a href="<?= $merch->url(); ?>" class="grid-box">
          <figure>
            <img src="<?= $merch->pic()->toFile()->url(); ?>" alt="<? $merch->title(); ?>" />
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
    
    <section class="merch-grid sold-out">
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