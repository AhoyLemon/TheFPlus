<?php snippet('header') ?>

  <main class="main page" role="main">

    <article class="full default">
      <?php echo $page->text()->kirbytext() ?>
    </article>
    
    <section class="merch-grid current">
      <h3>For Sale</h3>
      <?php foreach($page->current_merch()->toStructure() as $merch) { ?>
      
        <a href="<?= $merch->url(); ?>" class="grid-box">
          <figure>
            <img src="<?= $merch->pic()->toFile()->url(); ?>" alt="<? $merch->title(); ?>" />
          </figure>
          <div class="details">
            <div class="name"><?= $merch->title(); ?></div>
            <div class="type"><?= $merch->type(); ?></div>
            <div class="price"><?= $merch->price(); ?></div>
            <?php if ($merch->release_date() != "") { ?>
              <div class="released"><?= $merch->date('m/d/y', 'release_date'); ?></div>
            <?php } ?>
          </div>
        </a>
      <?php } ?>
    </section>
    
    <section class="merch-grid sold-out">
      <h3>Sold Out</h3>
      <?php foreach($page->sold_merch()->toStructure() as $merch) { ?>
      
        <div href="<?= $merch->url(); ?>" class="grid-box">
          <figure>
            <img src="<?= $merch->pic()->toFile()->url(); ?>" alt="<? $merch->title(); ?>" />
          </figure>
          <div class="details">
            <div class="name">
              <?php if ($merch->url() != "") { ?>
                <a href="<?= $merch->url(); ?>" class="title-link">
                  <?= $merch->title(); ?>
                </a>
              <?php } else { ?>
                <?= $merch->title(); ?>
              <?php } ?>
            </div>
            
            <?php if ($merch->type() != "") { ?>
              <div class="type"><?= $merch->type(); ?></div>
            <?php } ?>
            <?php /*
            <?php if ($merch->price() != "") { ?>
              <div class="price"><?= $merch->price(); ?></div>
            <?php } ?>
            <?php if ($merch->release_date() != "") { ?>
              <div class="released"><?= $merch->date('m/d/y', 'release_date'); ?></div>
            <?php } ?>
            */ ?>
            <?php if ($merch->sold_date() != "") { ?>
              <div class="sold-date"><?= $merch->date('m/d/y', 'sold_date'); ?></div>
            <?php } ?>
            
          </div>
        </div>
      <?php } ?>
    </section>
    
  </main>

<?php snippet('footer') ?>