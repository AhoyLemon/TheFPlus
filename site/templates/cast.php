<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="text">
      <?php if($image = $page->image()): ?>
        <img src="<?php echo $image->url() ?>" alt="">
      <?php endif ?>
      <h1><?php echo $page->title() ?></h1>
      
      <!-- JOB -->
      <h2><?php echo $page->job() ?></h2>
      
      <!-- EPISODE SUMMARY TEXT -->
      <summary>
        <?php echo $page->text()->kirbytext() ?>
      </summary>
      
      <!-- WEBSITE --->
      <?php if ($page->website() != ""): ?>
        <a href="<?php echo $page->website() ?>" target="_blank"><?php echo $page->website() ?></a>
      <?php endif ?>
      
      <!-- TWITTER --->
      <?php if ($page->twitter() != ""): ?>
        <a href="http://twitter.com/<?php echo $page->twitter() ?>" target="_blank"><?php echo $page->twitter() ?></a>
      <?php endif ?>
      
      <?php if ($page->email() != ""): ?>
        <a href="mailto:<?php echo $page->email() ?>" target="_blank"><?php echo $page->email() ?></a>
      <?php endif ?>
      
      <?php if ($page->favorite_episode() != ""): ?>
        <a href="http://hirelemon.com/kirby/episode/<?php echo $page->favorite_episode() ?>"><?php echo $page->favorite_episode() ?></a>
      <?php endif ?>
      
      <?php if ($page->ballpit_account() != ""): ?>
        <a href="<?php echo $page->ballpit_account() ?>"><?php echo $page->ballpit_account() ?></a>
      <?php endif ?>
      
      <?php if ($page->other_links() != ""):
        $links = explode(",", $page->other_links()); 
      ?>
        <?php foreach($links as $link): ?>
          <li><a href="http://<?php echo $link ?>" target="_blank"><?php echo $link ?></a></li>
        <?php endforeach ?>
      <?php endif ?>
      
    </div>

  </main>

<?php snippet('footer') ?>