<?php snippet('header') ?>

  <main class="main edge-to-edge" role="main">
    <h1 class="fanart-headline"><?php echo $page->title(); ?></h1>

    <article class="full default">
      <ul class="fanart-list">
        
      <?php foreach ($page->images()->shuffle() as $fanart): ?>
        <?php $fa = explode("-", $fanart->filename()); ?>
        <?php 
          if (count($fa) > 2) { 
          $x = explode('.', $fa[2]); $slug = $x[0];
          } else { $slug = "episode"; }
        ?>
        <li>
          <a href="/<?php echo $slug; ?>/<?php echo $fa[0]; ?>#AdditionalFun" class="fanart-link" title="<?= $slug; ?> <?= $fa[0]; ?>">
            <figure style="background-image:url(<?= $fanart->crop(250, 250)->url(); ?>);">&nbsp;</figure>
          </a>
        </li>
      <?php endforeach; ?>
        
      </ul>
      
    </article>
    <div style="font-size:1.25em; padding:1em;">
      <?php echo $page->text()->kirbytext(); ?>
    </div>
    
  </main>

<?php snippet('footer') ?>