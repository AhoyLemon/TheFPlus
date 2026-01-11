<?php if ($page->chapters_toggle() == "yes" && $page->chapters()->isNotEmpty()) { ?>

  <?php if ( $page->chapters()->isNotEmpty()) {
    $chapters = array();
    foreach ($page->chapters()->toStructure() as $c) {

      $a = (float)str_replace(':', '', $c->timestamp());
      $b = str_pad($a, 6, '0', STR_PAD_LEFT);
      $z = rtrim(chunk_split(substr($b,-6),2,':'),':');
      $n = trim($c->name());
      array_push($chapters, array("timestamp" => $z, "name" => $n));
    }
  } ?>
  <dl class="chapters-info">
    <dt>

      <span class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
          <path d="M13 10v82l80-41z"/>
        </svg>
      </span>

      <?php if ($page->chapter_provider()->isNotEmpty()) { ?>
        Chapters provided by <?= $page->chapter_provider(); ?>
      <?php } else { ?>
        Chapters
      <?php } ?>
    </dt>
    <dd>
      <table class="chapters">
        <tbody>
          <?php $i = 0; ?>
          <?php foreach ($chapters as $c) { ?>
            <?php $i++; ?>
            <tr>
              <td class="count"><?= $i; ?></td>
              <td class="timestamp"><?= $c['timestamp'] ?></td>
              <td class="name"><?= $c['name']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </dd>
  </dl>

  <script>
    $('dl.chapters-info dt').click(function() {
      $(this).parent().toggleClass('expanded');
    });
  </script>

<?php } ?>