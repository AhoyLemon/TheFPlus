<script src="https://cdn.podlove.org/web-player/embed.js"></script>
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

    podlovePlayer('#PodLovePlayer', {
        title: '<?= addslashes($page->title()); ?>',
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
              { start:"<?= $chapter['timestamp']; ?>", title: '<?= addslashes($chapter['name']); ?>'},
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
      <?php } ?>
      ],
      visibleComponents: [
        'tabInfo',
        <?php if ($page->chapters_toggle() == "yes" && $page->chapters()->isNotEmpty()) { ?>
          'tabChapters',
          'controlChapters',
        <?php } ?>
        'tabFiles',
        'tabShare',
        'showTitle',
        'episodeTitle',
        'progressbar',
        'controlSteppers',
        
      ]
    }).then(function (store) {
      store.subscribe(() => {
        const { lastAction } = store.getState()
        
        //console.log({ type: lastAction.type, payload: lastAction.payload })
        if (lastAction.type == "PLAY") {
          trackEvent("listen", "play", p);
        }

      });
    });
</script>

<div class="document-link-holder">
  <?php if ($page->document_link()->isNotEmpty()) { ?>
    <a itemprop="citation" class="action read" href="<?php echo $page->document_link() ?>" title="Read <?php echo $page->provider() ?>'s document"  target="_blank">
      <svg viewBox="0 0 100 100">
      <path d="M65.3 57H44.2v-4.6h21l.1 4.6zm0-10H44.2v-4.6h21l.1 4.6zm0-10H44.2v-4.6h21l.1 4.6zM29.1 75.3V24.4h42.8v33.4c0 9.7-11.9 5.8-11.9 5.8s3.6 11.7-5.4 11.7H29.1zM78 58.4V18.3H23v63.1h31.7c10.4 0 23.3-13.6 23.3-23zM37.8 32c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c-.1-1.5-1.3-2.7-2.7-2.7zm0 10.1c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c-.1-1.5-1.3-2.7-2.7-2.7zm0 9.9c-1.5 0-2.7 1.2-2.7 2.7 0 1.5 1.2 2.7 2.7 2.7s2.7-1.2 2.7-2.7c-.1-1.5-1.3-2.7-2.7-2.7z"/>
      </svg>
      <span class="label go-right">Read <?= str_replace(",", " & ", $page->provider()); ?>'s document</span>
    </a>
  <?php } ?>
</div>



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