<?php snippet('header') ?>

<main class="main search" role="main">
  
  <form class="page-search">
    <div class="input-holder">
      <input type="search" name="q" value="<?php echo esc($query) ?>">
    </div>
    <button type="submit">search</button>
  </form>

  <div class="all-search-results">
  
  
  <?php if ($results->count() < 1) { ?>
    
    <?php
      $searchesToTry = array('britain', 'recipes', 'satan', 'furries', 'crime', 'juggalos', 'wikihow', 'magick', 'penis', 'drugs', 'reddit', 'teenagers', 'vampire', 'dragon', 'gross', 'questions');
      shuffle($searchesToTry);
      $searchesToTry = array_slice($searchesToTry, 0, 4)
    ?>

    <article class="no-search-results full">
      <?php if ($query != "") { ?>
        <p>
        No results for <b><?= esc($query); ?></b>.
        </p>
      <?php } ?>
      <p>
        Maybe try searching for 
        <?php 
          $termcount = 0;
          foreach($searchesToTry as $searchTerm) {
            $termcount++;
            if ($termcount == count($searchesToTry)) { echo 'or &nbsp;'; }
            echo '<a href="' . $site->url() . '/search?q=' .  $searchTerm . '">' . $searchTerm . '</a>';
            if ($termcount < count($searchesToTry)) { echo ', &nbsp;'; } else { echo '?'; }
          }
        ?>
      </p>
    </article>
  <?php } else { ?>
    <summary class="search-results-count">
      <?= $results->count(); ?> results found.
    </summary>
  <?php } ?>

  <?php snippet('briefs',  [ 'articles' => $results->sortBy('date', 'desc')->paginate(15)]) ?>
    
  </div>
  
</main>

<?php snippet('footer') ?>