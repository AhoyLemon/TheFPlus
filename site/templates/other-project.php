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
    <div class="article-text" style="margin-top:1em;">
      <summary class="info-block" itemprop="description" content="<?php echo excerpt($page->text(), 222) ?>">
        <?php echo $page->text()->kirbytext() ?>
      </summary>

      <!-- Audio File -->
      <?php if ($page->episode_file()->isNotEmpty()) { ?>
        <audio style="margin-bottom:2em; width:100%;" controls src="<?= $page->episode_file(); ?>" preload="none">
        </audio>

        <div style="display:block; margin-bottom:2em;">
        <a href="<?= $page->episode_file(); ?>" download>Download File</a>
        </div>
      <?php }  ?>

      <!-- GitHub Repo -->
      <div class="ballpit-link-holder">
        <?php if ($page->github_repo()->isNotEmpty()) { ?>
          <a class="action ballpit" href="<?php echo $page->github_repo() ?>" title="Ballpit Thread: <?= $page->title(); ?>"  target="_blank">
            <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub icon</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
            <span class="label go-right">See this project on GitHub</span>
          </a>
        <?php } ?>
      </div>


    </div>
      
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