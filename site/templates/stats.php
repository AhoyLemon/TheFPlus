<?php snippet('header') ?>

  <main class="main page" role="main">

    <?php $episodes = $site->children('episode')->children()->visible()->limit(12) ?>
    
    <?php $ridiculists = array(); ?>
    
    <?php foreach($episodes as $episode) {
      $editor = $episode->editor();
      //echo '<h2>' . $editor . '</h2>';
      
        $m = false;
        if ($editor != "") {
          
          foreach($ridiculists as $z) {
            //echo $z->name;
            if ($editor == (string)$z['name']) {
              echo '<h1>MATCH</h1>';
              echo '<h2>' . $z['name'] . ' has ' . $z['edits'] . ' edits </h2>';
              $z['edits'] = "2";
              $m = true;
            } else {
              //echo $editor. "!= " . $z['name'] . '</br>';
            }
          }
          if ($m == false) {
            $e['name'] = $editor;
            $e['edits'] = "1";
            array_push($ridiculists,$e);
          }
        }
      }
    ?>
    
    
    <table>
      <thead>
        <tr>
          <th>Editor</th>
          <th>Edits</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($ridiculists as $ed): ?>
          <tr>
            <td><?php echo $ed['name']; ?></td>
            <td><?php echo $ed['edits']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    
  </main>

<?php snippet('footer') ?>