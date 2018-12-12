<?php snippet('header') ?>

<main class="main" role="main">
  
  <nav class="toggle people">
    <label>Show:</label>
    <a class="active" data-for="regular">
      <svg class="checkbox" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <path class="box" d="M85.6 95.5h-83V12.4h83.1v83.1zm-79-4h75.1V16.4H6.6v75.1z" />
        <path class="check" d="M83.9 5.3c.4-.4.9-.6 1.5-.6s1.1.2 1.5.6L98 16.6c.4.4.6.9.6 1.4 0 .6-.2 1.1-.6 1.4L45.1 72.3c-.4.4-.9.6-1.5.6h-.1c-.6 0-1.1-.2-1.5-.6L21.6 52c-.4-.4-.6-.9-.6-1.5s.2-1.1.6-1.4l11.2-11.2c.4-.4.9-.6 1.4-.6.6 0 1.1.2 1.5.6l7.8 7.8L83.9 5.3z" fill="#ed214f"/>
      </svg>
      <span>Regular Cast</span>
    </a>
    <a data-for="guest">
      <svg class="checkbox" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <path class="box" d="M85.6 95.5h-83V12.4h83.1v83.1zm-79-4h75.1V16.4H6.6v75.1z" />
        <path class="check" d="M83.9 5.3c.4-.4.9-.6 1.5-.6s1.1.2 1.5.6L98 16.6c.4.4.6.9.6 1.4 0 .6-.2 1.1-.6 1.4L45.1 72.3c-.4.4-.9.6-1.5.6h-.1c-.6 0-1.1-.2-1.5-.6L21.6 52c-.4-.4-.6-.9-.6-1.5s.2-1.1.6-1.4l11.2-11.2c.4-.4.9-.6 1.4-.6.6 0 1.1.2 1.5.6l7.8 7.8L83.9 5.3z" fill="#ed214f"/>
      </svg>
      <span>Guest Readers</span>
    </a>
    <a data-for="submitter">
      <svg class="checkbox" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <path class="box" d="M85.6 95.5h-83V12.4h83.1v83.1zm-79-4h75.1V16.4H6.6v75.1z" />
        <path class="check" d="M83.9 5.3c.4-.4.9-.6 1.5-.6s1.1.2 1.5.6L98 16.6c.4.4.6.9.6 1.4 0 .6-.2 1.1-.6 1.4L45.1 72.3c-.4.4-.9.6-1.5.6h-.1c-.6 0-1.1-.2-1.5-.6L21.6 52c-.4-.4-.6-.9-.6-1.5s.2-1.1.6-1.4l11.2-11.2c.4-.4.9-.6 1.4-.6.6 0 1.1.2 1.5.6l7.8 7.8L83.9 5.3z" fill="#ed214f"/>
      </svg>
      <span>Content Providers</span>
    </a>
  </nav>
  
  <section class="people people-grid">
    <?php foreach($page->children()->visible()->sortBy('title', 'asc') as $article): ?>
      <a class="person brief <?php echo $article->role() ?> <?php if ($article->role() != "regular") { echo 'hidden'; } ?>" href="<?= $article->url(); ?>">

        <figcaption>
          <?php echo $article->title(); ?>
        </figcaption>

        <figure>
          <?php if ($article->cover() != "") { ?>
            <img src="<?php echo $article->url() ?>/<?php echo $article->cover()->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
          <?php } else { ?>
            <img src="<?php echo $article->url() ?>/<?php echo $article->image()->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
          <?php } ?>
        </figure>

        <?php /*
        <header>
          <a href="<?php echo $article->url() ?>" title="<?php echo html($article->title()) ?>">
            <?php echo $article->title(); ?>
          </a>
        </header>
        <?php if($image = $article->image()): ?>
          <a class="image-holder" href="<?php echo $article->url() ?>" alt="<?php echo html($article->title()) ?>">
            
            <?php if ($article->cover() != "") { ?>
              <img src="<?php echo $article->url() ?>/<?php echo $article->cover()->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
            <?php } else { ?>
              <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
            <?php } ?>
            
            <div class="hover-cover">
              <?php if ($article->text() != ""): ?>
                <div class="content">
                  <?php echo excerpt($article->text(), 222) ?>
                </div>
              <?php endif; ?>
            </div>
          </a>
        <?php endif ?>
        <?php if(!$image = $article->image()): ?>
          <summary>
            <div class="content">
              <p><?php echo excerpt($article->text(), 222) ?></p>
            </div>
          </summary>
        <?php endif ?>

        */ ?>
      </a>
    <?php endforeach ?>
  </section>
  
  <?php if ($page->undergrid() != "") { ?>
    <div class="undergrid" style="margin-top:1em; margin-bottom:1em;">
      <?php echo $page->undergrid()->kirbytext(); ?>
    </div>
  <?php } ?>
  
</main>

<?php snippet('footer') ?>