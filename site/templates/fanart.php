<?php snippet('header') ?>

  <main class="main edge-to-edge" role="main">

    
    
    <section class="fanart-grid">

      <h1 class="fanart-headline"><?php echo $page->page_headline(); ?></h1>
        
      <?php foreach ($page->images()->shuffle() as $fanart): ?>
        <?php $fa = explode("-", $fanart->filename()); ?>
        <?php 
          if (count($fa) > 2) { 
          $x = explode('.', $fa[2]); 
          $slug = $x[0];
          } else { $slug = "episode"; }
        ?>
        <a href="/<?php echo $slug; ?>/<?php echo $fa[0]; ?>#AdditionalFun" class="fanart-link" title="<?= $slug; ?> <?= $fa[0]; ?>">
          <figure>
            <?php /* <img src="<?= $fanart->crop(250, 250)->url(); ?>" /> */ ?>
            <?php $fileParts = explode('.', $fanart->filename()); ?>
            <img src="https://thefpl.us/thumbs/fanart/<?= $fileParts[0] ?>-250x250.<?= $fileParts[1]; ?>" />
          </figure>
          <figcaption>
            <summary>
              <div class="artist">
                <?php $artistName = explode('.',$fa[count($fa) - 1])[0]; ?>
                <span class="name"><?= $artistName; ?></span>
              </div>
            </summary>
          </figcaption>
        </a>
      <?php endforeach; ?>

      <?php if ($page->text()->isNotEmpty()) { ?>
        <div class="fanart-out">
          <?php echo $page->text()->kirbytext(); ?>
        </div>
      <?php } ?>
        
    </section>

    
    
  </main>

<?php snippet('footer') ?>