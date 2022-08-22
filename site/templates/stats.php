<?php snippet('header') ?>


<main class="main page" role="main">
  <?php 
  
    $episodes = $site->find('episode')->children()->visible();

    $ridiculists = array();
    $total_days = 0;
    $total_hours = 0;
    $total_minutes = 0;
    $total_seconds = 0;

    foreach ($episodes as $episode) {
      $editor = $episode->editor();
      $m = false;


      if ($editor != "") {
        foreach ($ridiculists as $key => $ridiculist) {
          if ($editor == (string)$ridiculist['name']) {
            $ridiculists[$key]['edits'] = $ridiculists[$key]['edits'] + 1;
            $m = true;
          }
        }
        if ($m == false) {
          $e['name'] = $editor;
          $e['edits'] = 1;
          $e['appeared'] = 0;
          $e['provided'] = 0;
          array_push($ridiculists, $e);
        }
      }


      $persons = explode(",", $episode->cast());

      foreach ($persons as $person) {
        $m = false;
        foreach ($ridiculists as $key => $ridiculist) {
          if ($person == (string)$ridiculists[$key]['name']) {
            if ($ridiculist['appeared']) {
              $ridiculists[$key]['appeared'] = $ridiculists[$key]['appeared'] + 1;
            } else {
              $ridiculists[$key]['appeared'] = 1;
            }
            $m = true;
          }
        }
        if ($m == false) {
          $e['name'] = $person;
          $e['edits'] = 0;
          $e['appeared'] = 1;
          $e['provided'] = 0;
          array_push($ridiculists, $e);
        }
      }
      $provider = $episode->provider();

      if (strpos($episode->provider(), ',') !== false) {
        $pvs = explode(",", $episode->provider());
        foreach ($pvs as $provider) {
          $m = false;
          foreach ($ridiculists as $key => $ridiculist) {
            if ($provider == (string)$ridiculists[$key]['name']) {
              if ($ridiculist['provided']) {
                $ridiculists[$key]['provided'] = $ridiculists[$key]['provided'] + 1;
              } else {
                $ridiculists[$key]['provided'] = 1;
              }
              $m = true;
            }
          }
          if ($m == false) {
            $e['name'] = $provider;
            $e['edits'] = 0;
            $e['appeared'] = 0;
            $e['provided'] = 1;
            array_push($ridiculists, $e);
          }
        }
      } else {

        $m = false;
        if ($provider != "") {
          foreach ($ridiculists as $key => $ridiculist) {
            if ($provider == (string)$ridiculists[$key]['name']) {
              if ($ridiculist['provided']) {
                $ridiculists[$key]['provided'] = $ridiculists[$key]['provided'] + 1;
              } else {
                $ridiculists[$key]['provided'] = 1;
              }
              $m = true;
            }
          }
          if ($m == false) {
            $e['name'] = $provider;
            $e['edits'] = 0;
            $e['appeared'] = 0;
            $e['provided'] = 1;
            array_push($ridiculists, $e);
          }
        }
      }

      $runtime = $episode->runtime();
      if ($runtime != "") {
        $sr = explode(':', $runtime);

        if (count($sr) == 3) {
          $hours = intval($sr[0]);
          $minutes = intval($sr[1]);
          $seconds = intval($sr[2]);
        } else if (count($sr) == 2) {
          $hours = 0;
          $minutes = intval($sr[0]);
          $seconds = intval($sr[1]);
        } else {
          //echo '<p> No time duration for ' . $episode->slug() . '</p>';
          $hours = 0;
          $minutes = 0;
          $seconds = 0;
        }

        $total_seconds = $total_seconds + $seconds;
        if ($total_seconds > 59) {
          $total_minutes = $total_minutes + 1;
          $total_seconds = $total_seconds - 60;
        }

        $total_minutes = $total_minutes + $minutes;
        if ($total_minutes > 59) {
          $total_hours = $total_hours + 1;
          $total_minutes = $total_minutes - 60;
        }

        $total_hours = $total_hours + $hours;
        if ($total_hours > 23) {
          $total_days = $total_days + 1;
          $total_hours = $total_hours - 24;
        }
      } else {
        // I can't get a duration for this episode.
      }
    }

  ?>

  <?= css('assets/css/stats.css?lastUpdated=2022-08-22'); ?>
  <script src="https://unpkg.com/vue@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue-good-table@2.21.11/dist/vue-good-table.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vue-good-table@2.21.11/dist/vue-good-table.css" />
  <script type="module">
    new Vue({
      data: () => ({ 
        columns: [
          {
            label: 'Ridiculist',
            field: 'name',
            type: "text",
            thClass: "name-th",
            tdClass: "name"
          },
          {
            label: 'Appearances',
            tooltip: "Number of episodes this ridiculist has appeared in",
            field: 'appeared',
            type: 'number',
            thClass: "count-th",
            tdClass: "count"
          },
          {
            label: 'Edits',
            tooltip: "# of episodes this ridiculist has edited",
            field: 'edits',
            type: 'number',
            thClass: "count-th",
            tdClass: "count"
          },
          {
            label: 'Documents',
            field: 'provided',
            tooltip: 'A simple tooltip',
            type: 'number',
            thClass: "count-th",
            tdClass: "count"
          }
        ],
        rows: [

          <?php foreach ($ridiculists as $ridiculist) { ?>
            {
              name: `<?= $ridiculist['name']; ?>`,
              appeared: <?= $ridiculist['appeared']; ?>,
              edits: <?= $ridiculist['edits']; ?>,
              provided: <?= $ridiculist['provided']; ?>,

            },
          <?php } ?>
        ]
      }),

      methods: {
        addCommas(n) {
          return n;
        }
      }
    }).$mount('#GoodTable');
    Vue.use(VueGoodTable);
  </script>

  <div class="data-points">

    <div class="runtime-holder">
      <div class="label">Total Runtime:</div>

      <div class="measure days">
        <span class="num"><?= sprintf("%02d", $total_days); ?></span>
        <span class="units">days</span>
      </div>

      <div class="measure hours">
        <span class="num"><?= sprintf("%02d", $total_hours); ?></span>
        <span class="units">hours</span>
      </div>
      <div class="measure minutes">
        <span class="num"><?= sprintf("%02d", $total_minutes); ?></span>
        <span class="units">minutes</span>
      </div>
      <div class="measure seconds">
        <span class="num"><?= sprintf("%02d", $total_seconds); ?></span>
        <span class="units">seconds</span>
      </div>
    </div>

    <div class="table-holder" id="GoodTable">

      <vue-good-table
        :columns="columns"
        :rows="rows"
        compactMode
        max-height="95vh"
        fixed-header="true"
        :search-options="{
          enabled: true
        }"
        :sort-options="{
          enabled: true,
          initialSortBy: {field: 'appeared', type: 'desc'}
        }">
      </vue-good-table>

    </div>

    <?php if ($page->bonus_content()->isNotEmpty()) { ?>
      <div class="bonus-holder">
        <?php echo $page->bonus_content()->kirbytext() ?>
      </div>
    <?php } ?>
    
  </div>
  

</main>

<?php snippet('footer') ?>