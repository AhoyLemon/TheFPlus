<?php snippet('header') ?>

<main class="main" role="main">
  
  <nav class="toggle people">
    <style>
      .summaries .person.guest, .summaries .person.submitter { display:none; }
    </style>
    <label>Show:</label>
    <a class="active" data-for="regular">
      <svg class="checkbox" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
        <rect fill="#EE1C4E" stroke="#000000"  stroke-miterlimit="10" width="100" height="100"/>
      </svg>
      <span>Regular Cast</span>
    </a>
    <a data-for="guest">
      <svg class="checkbox" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
        <rect fill="#EE1C4E" stroke="#000000"  stroke-miterlimit="10" width="100" height="100"/>
      </svg>
      <span>Guest Readers</span>
    </a>
    <a data-for="submitter">
      <svg class="checkbox" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" xml:space="preserve">
        <rect fill="#EE1C4E" stroke="#000000"  stroke-miterlimit="10" width="100" height="100"/>
      </svg>
      <span>Content Providers</span>
    </a>
  </nav>
  
  <section class="people summaries">
    <?php foreach($page->children() as $article): ?>
    <article class="person brief <?php echo $article->role() ?>">
      <header>
        <h2 class="title">
          <a href="<?php echo $article->url() ?>" title="<?php echo html($article->title()) ?>">
            <?php echo $article->title(); ?>
          </a>
        </h2>
        <!--
        <h3 class="job">
          <?php echo $article->job() ?>
        </h3>
        -->
      </header>
      <?php if($image = $article->image()): ?>
        <a class="image-holder" href="<?php echo $article->url() ?>" alt="<?php echo html($article->title()) ?>">
          <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" />
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
    </article>
    
    <?php endforeach ?>

  </section>
</main>

<?php snippet('footer') ?>