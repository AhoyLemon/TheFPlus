<?php snippet('header') ?>

  <main class="main edge-to-edge" role="main">
    <h1 class="fanart-headline"><?php echo $page->title(); ?></h1>

    <article class="full default">
      <ul class="fanart-list">
        
      <?php foreach ($page->images()->shuffle() as $fanart): ?>
        <?php $fa = explode("-", $fanart->filename()); ?>
        <li>
          <a href="/episode/<?php echo $fa[0]; ?>#AdditionalFun" class="fanart-link">
            <img src="<?php echo $fanart->crop(250, 250)->url(); ?>" class="fanart-thumb">
          </a>
        </li>
      <?php endforeach; ?>
        
      </ul>
      
    </article>
    
  </main>

<?php snippet('footer') ?>