<?php snippet('header') ?>

  <main class="main page" role="main">
    <h1><?php echo $page->title(); ?></h1>

    <article class="full default">
      <ul class="fanart-list">
        
      <?php foreach ($page->images()->shuffle() as $fanart): ?>
        <?php $fa = explode("-", $fanart->filename()); ?>
        <li>
          <a href="/episode/<?php echo $fa[0]; ?>#AdditionalFun" class="fanart-link">
            <img src="<?php echo $fanart->crop(250)->url(); ?>" class="fanart-thumb">
            <!--
            <img src="/fanart/<?php echo $fanart->filename(); ?>" class="fanart-thumb">
            -->
          </a>
        </li>
      <?php endforeach; ?>
        
      </ul>
      
    </article>
    
  </main>

<?php snippet('footer') ?>