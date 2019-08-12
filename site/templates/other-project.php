<?php snippet('header') ?>


<main class="main page" role="main">

  <!-- SET UP VARIABLES -->
  <?php 
    $pubdate = date('l, F jS Y', $page->date());
    $pubtime = date("g:ia", strtotime($page->time()));
    if ($page->cast() == "") {
      $multiperson = false;
    } else if (strpos($page->cast(),',') !== false) {
      $multiperson = true;
      $persons = explode(",", $page->cast()); 
    } else if ($page->cast() != '') {
      $multiperson = false;
    }


  ?>

  <article class="full <?php if ($page->show_image() == 'true') { echo ' episode '; } else { echo ' default '; } ?>" itemscope itemtype="https://schema.org/CreativeWork">

    <?php if( $image = $page->image()):  ?>
      <?php if($page->show_image() == 'true'):  ?>
        <figure>
          <?php if ($page->show_different_image() == "yes" && $page->page_image()->isNotEmpty()) { ?>
            <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->page_image()->filename() ?>" class="cover" alt="<?php echo $page->title() ?>">
          <?php } else if ($page->cover() != "") { ?>
            <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $page->cover()->filename() ?>" class="cover" alt="<?php echo $page->title() ?>">
          <?php } else { ?>
            <img itemprop="image" src="<?php echo $page->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $page->title() ?>">
          <?php } ?>
        </figure>
      <?php endif ?>
    <?php endif ?>

    <header>
      <h1 itemprop="name"><?php echo $page->title() ?></h1>

      <!-- DATE & TIME -->
      <time class="released" itemprop="datePublished" content="<?php echo $page->date('Y-m-d'); ?>T<?php echo $page->time(); ?>+06:00">
        <span class="date">
          <?php echo $pubdate ?>
        </span>
        @
        <span class="time">
          <?php echo $pubtime; ?>
        </span>
      </time>

    </header>

    <!-- CAST LIST -->
    <?php if ($page->cast() != ""): ?>
      <?php if ($multiperson == true): ?>
        <ul class="cast authors ridiculists info-block">
          <?php foreach($persons as $person): ?>
          <li itemprop="contributor" itemscope itemtype="http://schema.org/Person">
            <a itemprop="url" href="<?php echo url::home() ?>/meet/<?php $clink = preg_replace('/\s+/', '-', $person); echo strtolower($clink) ?>">
              <span itemprop="name"><?php echo $person ?></span>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
      <?php if ($multiperson == false): ?>
        <div class="author info-block">
          by 
          <span itemprop="author" itemscope itemtype="http://schema.org/Person">
            <a itemprop="url" href="<?php echo url::home() ?>/meet/<?php $clink = preg_replace('/\s+/', '-', $page->cast()); echo strtolower($clink) ?>">
              <span itemprop="name" class="provider"><?php echo $page->cast() ?></span>
            </a>
          </span>
        </div>
      <?php endif ?>
    <?php endif ?>

    <!-- YouTube Video -->
    <?php if (($page->category() == "video" || $page->category() == "qe") && $page->video_url()->isNotEmpty()) { ?>
      <figure class="video" style="margin-bottom:2em;">
        <?php 
          $v = explode("/", $page->video_url());
          $youTubeURL = "https://www.youtube.com/embed/" . $v[count($v) - 1];
        ?>
        <iframe src="<?= $youTubeURL; ?>" frameborder="0" allowfullscreen></iframe>
      </figure>
    <?php }  ?>

    <!-- SUMMARY TEXT -->
    <div class="article-text">
      <summary class="info-block" itemprop="description" content="<?php echo excerpt($page->text(), 222) ?>">
        <?php echo $page->text()->kirbytext() ?>
      </summary>
    </div>

    <?php snippet('page-actions') ?>
      
    <?php if ($page->photos() != "") { ?>
      <div class="product-photos" style="margin-top:3em;">
        <?php if ($page->photos_leadin() != "") { ?>
          <h3><?= $page->photos_leadin(); ?></h3>
        <?php } ?>
        <?php foreach($page->photos()->toStructure()->sortBy('series_num', 'desc') as $photo): ?>
          <div class="photo-holder">
            <?php if ($photo->full_size() != "") { ?>
              <a onclick="window.open('<?= $photo->full_size()->toFile()->url() ?>', '_blank', 'width=<?php echo $photo->full_size()->toFile()->width(); ?>,height=<?php echo $photo->full_size()->toFile()->height(); ?>');" class="zoom">
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
    <?php } ?>  
    

    <?php snippet('tags') ?>

    <!-- BONUS CONTENT -->
    <?php if ($page->bonus_content() != ""): ?>
      <a name="AdditionalFun"></a>
      <div class="info-block custom-html">
        <?php echo $page->bonus_content()->kirbytext() ?>
      </div>
    <?php endif ?>
      
      
      
    
  </article>

  <section class="comments disqus">
    <?php snippet('disqus', array('allow_comments' => true)) ?>
  </section>

</main>

<?php snippet('footer') ?>