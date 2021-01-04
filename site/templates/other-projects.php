<?php snippet('header') ?>
  <main class="main edge-to-edge" role="main" data-template="episodes">
    <?php $ftag = urldecode (param('tag')); ?>
    <?php $thispage = urldecode(param('page')); ?>
    <?php if ($ftag): ?>
      <ul class="tags filtered">
        <label>browsing: </label>
        <li class="tag selected"><?php echo $ftag ?></li>
      </ul>
    <?php endif ?>
    
    <?php 
      if ($page->slug() == "episode") {
        $fsites = explode(",", $page->featured_site());
      }
    ?>
    <?php if (!$ftag): ?>
      <?php if ($page->uri() == "episode" && $thispage == "") {
        $articles = $page->children()->listed()->sortBy('date', 'desc')->paginate(26);
        $showRandom = true;
      } else if ($page->uri() == "also-made") {
        $articles = $site->find('also-made','guess')->children()->listed()->sortBy('date', 'desc')->paginate(28);
        $showRandom = false;
      } else {
        $articles = $page->children()->listed()->sortBy('date', 'desc')->paginate(26);
        $showRandom = false;
      } ?>
    <?php endif ?>
    <?php if ($ftag): ?>
      <?php $articles = $page->children()->listed()->filterBy('tags', $ftag, ',')->sortBy('date', 'desc')->paginate(28) ?>
      
    <?php endif ?>
    
    <section class="<?php echo $page->slug(); ?> covers-only">
      <?php /*
      <?php if($articles->pagination()->hasPrevPage()): ?>
        <a class="pagination-tile prev tile" href="<?php echo $articles->pagination()->prevPageURL() ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"> 
            <path class="arrow" d="M501.18 0L251.83 245.53 499.05 500h589.53V0z"/>
            <path class="text" d="M93.95 391.3c3.81-4.54 8.42-6.29 12.59-6.29 8.93 0 15.15 7.61 15.15 19.18 0 12.3-6.51 19.98-15.88 19.98-3.95 0-8.13-1.17-11.78-5.49v6.81c0 4.25.07 9.81.22 14.13l7.47.59v1.98H82.97v-1.98l6.66-.59c.07-4.32.15-9.81.15-14.05v-22.76c0-5.05-.07-9.3-.22-12.96l-6.73-.29v-1.9l9.88-2.42.95.51.29 5.55zm.22 25.18c3.51 3.59 6.81 4.76 10.76 4.76 6.51 0 12.08-4.83 12.08-16.83 0-10.98-4.83-16.62-11.78-16.62-3.37 0-6.88 1.24-11.05 5.56v23.13zM142.55 395.69c2.42-6.44 7.39-10.69 12.44-10.69 2.64 0 4.83 1.03 5.49 2.49 0 2.42-1.02 3.73-3.37 3.73-1.61 0-2.78-.88-4.39-2.34l-.81-.73c-4.03 1.76-6.95 5.49-9.37 11.49v6.95c0 3.88.07 9.88.22 13.91l7.03.66v1.98h-18.08v-1.98l6.44-.66c.07-4.03.15-9.96.15-13.91v-4.03c0-4.98-.07-9.08-.22-12.74l-6.81-.29v-1.9l9.96-2.42.95.51.37 9.97zM171.1 404.11c.15 11.79 6.51 16.91 13.98 16.91 5.05 0 8.86-1.98 11.78-5.27l1.17.95c-3 4.61-8.05 7.47-14.05 7.47-9.52 0-17.57-6.44-17.57-19.62 0-12 8.2-19.54 17.35-19.54 9 0 14.49 6.29 14.49 14.71 0 1.76-.15 3.29-.44 4.39H171.1zm20.06-2.2c2.12 0 2.78-1.17 2.78-3.66 0-5.86-3.88-11.05-10.32-11.05-6.51 0-11.86 5.78-12.44 14.71h19.98zM243.5 388.08l-4.98.51-13.1 34.99h-2.27l-13.76-34.99-5.42-.51v-2.05h16.98v2.05l-6.73.51 11.05 29.5 10.54-29.42-6.81-.59v-2.05h14.49v2.05z"/>
          </svg>
        </a>
      <?php endif; ?>
      */ ?>
      <?php foreach($articles as $article): ?>
        <?php snippet('coverbox',  [ 'article' => $article]); ?>
      <?php endforeach ?>
      <?php /*
      <?php if($articles->pagination()->hasNextPage()): ?>
        <a class="pagination-tile next tile" href="<?php echo $articles->pagination()->nextPageURL() ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
            <path class="arrow" d="M.64 500L250 254.47 2.77 0h-589.53v500z"/>
            <path class="text" d="M322.16 421.16v1.98h-17.05v-1.98l6.51-.66c.07-4.03.15-9.88.15-13.91v-7.91c0-7.61-2.71-10.32-7.25-10.32-3.29 0-7.91 1.46-13.25 7.1v11.13c0 3.95.07 9.88.22 13.91l5.86.66v1.98h-16.98v-1.98l6.51-.66c.07-4.03.15-10.03.15-13.91v-4.03c0-4.98-.07-9.08-.22-12.74l-6.81-.29v-1.9l9.96-2.42.95.51.29 7.39c4.98-5.71 10.25-8.13 15.08-8.13 6.15 0 9.74 3.66 9.74 13.69v7.91c0 4.03.07 9.95.15 13.91l5.99.67zM336.14 404.11c.15 11.79 6.51 16.91 13.98 16.91 5.05 0 8.86-1.98 11.79-5.27l1.17.95c-3 4.61-8.05 7.47-14.05 7.47-9.52 0-17.57-6.44-17.57-19.62 0-12 8.2-19.54 17.35-19.54 9 0 14.49 6.29 14.49 14.71 0 1.76-.15 3.29-.44 4.39h-26.72zm20.06-2.2c2.12 0 2.78-1.17 2.78-3.66 0-5.86-3.88-11.05-10.32-11.05-6.51 0-11.86 5.78-12.44 14.71h19.98zM409.34 421.16v1.98h-16.62l-.07-1.98 6.22-.58-9.74-13.98-10.1 13.91 5.78.66v1.98h-14.27v-1.98l5.34-.58 12-15.74-11.42-16.25-5.34-.51v-2.05H387v2.05l-5.71.51 9.44 13.54 9.74-13.47-5.86-.59v-2.05h13.98v2.05l-5.05.51L392 403.81l11.93 16.76 5.41.59zM437.89 421.09c-1.9 1.98-4.61 3.07-7.98 3.07-5.71 0-8.34-3.15-8.27-9.52 0-1.76.07-3.22.07-5.78v-20.28h-7.69v-2.12l7.83-.66 1.46-11.2h3.15l-.37 11.42H437v2.56h-10.98v26.13c0 4.68 1.83 6.73 5.12 6.73 2.2 0 3.73-.59 5.71-1.76l1.04 1.41z"/>
          </svg>
        </a>
      <?php endif ?>
      */ ?>
    </section>

    <div class="episode-pagination" style="padding:2rem;">
      <?php snippet('pagination',  [ 'articles' => $articles]) ?>
    </div>

  </main>
<?php snippet('footer') ?>