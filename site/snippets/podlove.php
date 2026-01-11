<?= js('assets/js/vendor/podlove.web-player.4.5.13.js'); ?>

<a name="chapters"></a>


<div id="PodLovePlayer" class="audio-player-wrapper">
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

  var p = window.location.pathname;

  var episodeHasBeenPlayed = false;

  if (window.location.pathname.includes('random')) {
    p = window.location.pathname + " (RANDOM)";
  }

  podlovePlayer('#PodLovePlayer', {
      title: '<?= addslashes($page->title()); ?>',
      subtitle: 'Reading: <?= str_replace(',', '   ', $page->featured_site()); ?>',
      summary: `<?= preg_replace( "/\r|\n/", "", $page->text()->kirbytext() ); ?>`,
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
          summary: '<?= $site->description(); ?>',
          poster: 'https://thefpl.us/assets/images/og-image.png',
          link: '<?= $site->url(); ?>'
      },
      <?php if ($page->runtime()->isNotEmpty()) { ?>
        duration: '<?= $page->runtime(); ?>',
      <?php } ?>
      link: '<?= $page->url(); ?>',
      <?php if ($page->chapters_toggle() == "yes" && $page->chapters()->isNotEmpty()) { ?>
        chapters: [
          <?php foreach ($chapters as $chapter) { ?>
            { start:'<?= $chapter['timestamp']; ?>', title: '<?= addslashes($chapter['name']); ?>'},
          <?php } ?>
        ],
      <?php } ?>
      <?php if ($page->episode_file()->isNotEmpty()) { ?>
        audio: [
          {
            url: '<?= $site->url(); ?>/podcasts/<?= $page->episode_file(); ?>',
            mimeType: 'audio/mp3',
            <?php if ($page->file_size()->isNotEmpty()) { ?>
              size: <?= $page->file_size(); ?>000000,
            <?php } ?>
            title: 'Audio MP3'
          }
        ],
      <?php } ?>

      <?php if ($page->cast()->isNotEmpty()) { ?>
      contributors: [
        <?php $persons = explode(",", $page->cast()); ?>
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
      ],
    <?php } ?>
    visibleComponents: [
      'tabInfo',
      <?php if ($page->chapters_toggle() == "yes" && $page->chapters()->isNotEmpty()) { ?>
        'tabChapters',
        'controlChapters',
      <?php } ?>
      'tabShare',
      'tabFiles',
      'showTitle',
      'episodeTitle',
      'progressbar',
      'controlSteppers',
      
    ]
  }).then(function (store) {
    store.subscribe(() => {
      const { lastAction } = store.getState()
      

      console.log(lastAction);
      //console.log({ type: lastAction.type, payload: lastAction.payload })
      if (lastAction.type == "PLAY") {
        if (!episodeHasBeenPlayed) {
          trackEvent("listen", "play", p);
        }
        episodeHasBeenPlayed = true;
      }
      
      if (lastAction.type === "TOGGLE_TAB" && lastAction.payload == "files") {
        if (lastAction.payload == "files") {
          trackEvent("listen", "download", p);
        }
      }

    });
  });

</script>