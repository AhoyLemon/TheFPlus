<script src="https://cdn.podlove.org/web-player/embed.js"></script>
<a name="chapters"></a>
<div id="PodLovePlayer">
  <audio preload="none" controls>
    <source src="/podcasts/<?php echo $page->episode_file() ?>" type="audio/mpeg" />
  </audio>
</div>

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

<script>
    podlovePlayer('#PodLovePlayer', {
        title: '<?= $page->title(); ?>',
        /*
        subtitle: `<?= $page->text()->xml(); ?>`,
        summary: 'Wir haben eine wie wir finden abwechslungsreiche Sendung produziert, die wir Euch wie immer mit Freude bereitstellen. Während die Live-Hörer Freak-Show-Bingo spielen, greifen wir das Wikipedia-Thema der letzten Sendung auf und liefern auch noch weitere Aspekte des optimalen Star-Wars-Medienkonsums frei Haus. Dazu viel Nerderei rund um die Kommandozeile, eine Einschätzung der Perspektive der Apple Watch, ein Rant über die mangelhafte Security  im Internet of Things (and Buildings) und allerlei anderer Kram.  Roddi setzt dieses Mal aus, sonst Vollbesetzung.',
        */
        summary: `<?= $page->text()->kirbytext(); ?>`,
        
        theme: {
          main: '#131313',
          highlight: '#c0282d'
        },
        publicationDate: '<?php echo $page->date('Y-m-d'); ?>T<?php echo $page->time(); ?>+06:00',
        <?php if ($page->cover()->isNotEmpty()) { ?>
          poster: '<?= $page->cover()->toFile()->url(); ?>',
        <?php } else if ($page->image()) { ?>
          poster: '<?= $page->image()->url(); ?>',
        <?php } ?>
        show: {
            title: '<?= $site->title(); ?>',
            subtitle: '<?= $site->description(); ?>',
            //summary: 'Die muntere Talk Show um Leben mit Technik, das Netz und Technikkultur. Bisweilen Apple-lastig aber selten einseitig. Wir leben und lieben Technologie und reden darüber. Mit Tim, hukl, roddi, Clemens und Denis. Freak Show hieß irgendwann mal mobileMacs.',
            poster: 'https://thefpl.us/assets/images/og-image.png',
            link: '<?= $site->url(); ?>'
        },
        duration: '<?= $page->runtime(); ?>',
        link: '<?= $page->url(); ?>',
        <?php if ($page->chapters_toggle() == "yes" && $page->chapters()->isNotEmpty()) { ?>
          chapters: [
            <?php foreach ($chapters as $chapter) { ?>
              { start:"<?= $chapter['timestamp']; ?>", title: '<?= addslashes($chapter['name']); ?>'},
            <?php } ?>
          ],
        <?php } ?>
        audio: [
          {
            url: '<?= $site->url(); ?>/podcasts/<?= $page->episode_file(); ?>',
            mimeType: 'audio/mp3',
            size: <?= $page->file_size(); ?>000000,
            title: 'Audio MP3'
          }
        ],

        <?php $persons = explode(",", $page->cast()); ?>
        contributors: [

        <?php foreach($persons as $person) { ?>
        {
          name: '<?= addslashes($person); ?>',
          <?php $mlink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $person))); ?>
          <?php if ($site->find($mlink)) { ?>
            avatar: '<?= $site->find($mlink)->image()->url(); ?>',
          <?php } ?>
          comment: null
        },
      <?php } ?>
      <?php /* if ($page->provider()->isNotEmpty()) { ?>
        {
          name: `<?= $page->provider(); ?>`,
          group: { id: '2', slug: 'provider', title: "Content Provider" },
          <?php $mlink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $page->provider()))); ?>
          <?php if ($site->find($mlink)) { ?>
            avatar: '<?= $site->find($mlink)->image()->url(); ?>',
          <?php } ?>
          comment: null
        }
      <?php } */ ?>
      ],
      visibleComponents: [
        'tabInfo',
        'tabChapters',
        'tabFiles',
        //'tabAudio',
        'tabShare',
        //'poster',
        'showTitle',
        'episodeTitle',
        'subtitle',
        'progressbar',
        'controlSteppers',
        'controlChapters'
      ]
    });
</script>


<?php if ($page->chapters_toggle() == "yes" && $page->chapters()->isNotEmpty()) { ?>
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