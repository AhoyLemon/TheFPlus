<?php snippet('header') ?>

  <main class="main edge-to-edge" role="main">

    <h1 class="fanart-headline"><?php echo $page->page_headline(); ?></h1>
    
    <ul class="fanart-grid">
        
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
            <img src="<?= $fanart->crop(250, 250)->url(); ?>" />
            <?php /* <img src="<?= $fanart->url(); ?>"> */ ?>
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
        
      </ul>

    <div style="font-size:1.25em; padding:1em;">
      <?php echo $page->text()->kirbytext(); ?>
    </div>
    
  </main>

<?php snippet('footer') ?>