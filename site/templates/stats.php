<?php snippet('header') ?>

  <main class="main page" role="main">

    <?php $episodes = $site->find('episode')->children()->visible(); ?>
    
    <?php $ridiculists = array(); $total_days = 0; $total_hours = 0; $total_minutes = 0; $total_seconds = 0; ?>
    
    <?php foreach($episodes as $episode) {
      $editor = $episode->editor();
      //echo '<h2>' . $editor . '</h2>';
      
        $m = false;
        if ($editor != "") {
          
          foreach($ridiculists as $key => $ridiculist) {
            //echo $z->name;
            if ($editor == (string)$ridiculist['name']) {
              $ridiculists[$key]['edits'] = $ridiculists[$key]['edits'] + 1;
              $m = true;
            } else {
              //echo $editor. "!= " . $z['name'] . '</br>';
            }
          }
          if ($m == false) {
            $e['name'] = $editor;
            $e['edits'] = 1;
            $e['appeared'] = 0;
            $e['provided'] = 0;
            array_push($ridiculists,$e);
          }
        }
  
  
        $persons = explode(",", $episode->cast()); 
  
        foreach ($persons as $person) {
          //echo '<p> $person is ' . $person . '.</p>';
          $m = false;
          foreach($ridiculists as $key => $ridiculist) {
            //echo $z->name;
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
            /*
            if ($person == "isfahan") {
              echo '<h2>isfahan marked for ' . $episode->slug();
            }
            */
            $e['name'] = $person;
            $e['edits'] = 0;
            $e['appeared'] = 1;
            $e['provided'] = 0;
            array_push($ridiculists,$e);
          }
        }
  
        $provider = $episode->provider();
        $m = false;
        if ($provider != "") {
          foreach($ridiculists as $key => $ridiculist) {
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
            if ($provider == "portaxx") {
              echo '<p> portaxx marked for episode ' . $episode->slug() . '.</p>';
            }
            $e['name'] = $provider;
            $e['edits'] = 0;
            $e['appeared'] = 0;
            $e['provided'] = 1;
            array_push($ridiculists,$e);
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
          //echo '<p> No time duration for ' . $episode->slug() . '</p>';
          //$hours = 0;
          //$minutes = 0;
          //$seconds = 0;
        }
      }
    ?>
    
    <script src="/assets/js/vendor/chartist.js" type="text/javascript"></script>
    <style>
      .ct-chart-pie path { fill:currentColor; }
      .ct-chart-pie g:nth-child(7n) { color:#ff0000; }
      .ct-chart-pie g:nth-child(7n +1) { color:#00ff00; }
      .ct-chart-pie g:nth-child(7n +2) { color:#0000ff; }
      .ct-chart-pie g:nth-child(7n +3) { color:#ffff00; }
      .ct-chart-pie g:nth-child(7n +4) { color:#ff00ff; }
      .ct-chart-pie g:nth-child(7n +5) { color:#ffff00; }
    </style>
    <div class="ct-chart" style="height:600px;"></div>
    <script>
      var data = {
        labels: [
          <?php foreach($ridiculists as $ed) { ?>
            "<?php echo $ed['name']; ?>",
          <?php } ?>
          ],
          series: [
          <?php foreach($ridiculists as $ed) {
            echo $ed['appeared'] . ",";
          } ?>
          ]
      };

      var options = {
        labelInterpolationFnc: function(value) {
          return value[0]
        }
      };

      var responsiveOptions = [
        ['screen and (min-width: 640px)', {
          chartPadding: 30,
          labelOffset: 100,
          labelDirection: 'explode',
          labelInterpolationFnc: function(value) {
            return value;
          }
        }],
        ['screen and (min-width: 1024px)', {
          labelOffset: 80,
          chartPadding: 20
        }]
      ];

      new Chartist.Pie('.ct-chart', data, options, responsiveOptions);
    </script>
    
    <?php /* $colorArray = array("#ff0000", "#00ff00", "#0000ff", "#ffff00", "#00ffff", "#ff00ff", "#ffffff", "#000000"); $c = 0; ?>
    
    <script>
      var pieData = [
         <?php foreach($ridiculists as $ed): ?>
          <?php if ($ed['appeared'] > 0 && $ed['name'] != "Lemon" && $ed['name'] != "Boots Raingear"): ?>
            {
              value: <?php echo $ed['appeared']; ?>,
              <?php
                echo 'color: "' . $colorArray[$c] . '",';
                $c = $c +1;
                if ($c > 6) {
                  $c = 0;
                }
              ?>
              label: "<?php echo $ed['name']; ?>"
            },
          <?php endif; ?>
        <?php endforeach; ?>
      ];
      var context = document.getElementById('skills').getContext('2d');
      var skillsChart = new Chart(context).Pie(pieData);
      <?php /*
      var data = [
        <?php foreach($ridiculists as $ed): ?>
          <?php if ($ed['edits'] > 0): ?>
            {
              value: <?php echo $ed['edits']; ?>,
              label: "<?php echo $ed['name']; ?>"
            }
          <?php endif; ?>
        <?php endforeach; ?>
        ];
        */ ?>
    
    
    <h1>Total Runtime: <?php echo $total_days; ?>:<?php echo $total_hours; ?>:<?php echo $total_minutes; ?>:<?php echo $total_seconds; ?></h1>
    
    <table >
      <thead>
        <tr>
          <th>Editor</th>
          <th>Edits</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($ridiculists as $ed): ?>
          <?php if ($ed['edits'] > 0): ?>
            <tr>
              <td><?php echo $ed['name']; ?></td>
              <td><?php echo $ed['edits']; ?></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br /><br /><br />
    <table>
      <thead>
        <tr>
          <th>Cast</th>
          <th>Appeared</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($ridiculists as $a): ?>
          <?php if ($a['appeared'] > 0): ?>
            <tr>
              <td><?php echo $a['name']; ?></td>
              <td><?php echo $a['appeared']; ?></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br /><br /><br />
    <table>
      <thead>
        <tr>
          <th>Provider</th>
          <th>Documents</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($ridiculists as $p): ?>
          <?php if ($p['provided'] > 0): ?>
            <tr>
              <td><?php echo $p['name']; ?></td>
              <td><?php echo $p['provided']; ?></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    
    
  </main>

<?php snippet('footer') ?>