<script src="https://cdn.podlove.org/web-player/embed.js"></script>
<div id="PodLovePlayer">
  <audio preload="none" controls>
    <source src="/podcasts/<?php echo $page->episode_file() ?>" type="audio/mpeg" />
  </audio>
</div>
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
        <?php } ?>
        show: {
            title: '<?= $site->title(); ?>',
            subtitle: '<?= $site->description(); ?>',
            //summary: 'Die muntere Talk Show um Leben mit Technik, das Netz und Technikkultur. Bisweilen Apple-lastig aber selten einseitig. Wir leben und lieben Technologie und reden darüber. Mit Tim, hukl, roddi, Clemens und Denis. Freak Show hieß irgendwann mal mobileMacs.',
            poster: 'https://thefpl.us/assets/images/og-image.png',
            url: '<?= $site->url(); ?>'
        },
        duration: '<?= $page->runtime(); ?>',
        /*
        chapters: [
            { start:"00:00:00", title: 'Intro'},
            { start:"00:01:39", title: 'Begrüßung'},
            { start:"00:04:58", title: 'IETF Meeting Netzwerk'},
            { start:"00:18:37", title: 'Kalender'},
            { start:"00:33:40", title: 'Freak Show Bingo'},
            { start:"00:35:37", title: 'Wikipedia'},
            { start:"01:17:26", title: 'iPhone Akkukalibration'},
            { start:"01:24:55", title: 'Alte iPads und iPod touches'},
            { start:"01:31:02", title: 'Find My Friends'},
            { start:"01:41:46", title: 'iPhone Music Player'},
            { start:"01:56:13", title: 'Apple Watch'},
            { start:"02:11:51", title: 'Kommandozeile: System Appreciation'},
            { start:"02:23:10", title: 'Sound und Design für Games'},
            { start:"02:24:59", title: 'Kommandozeile: Remote Deployment'},
            { start:"02:32:37", title: 'Kommandozeile: Man Pages'},
            { start:"02:44:31", title: 'Kommandozeile: screen vs. tmux'},
            { start:"02:58:02", title: 'Star Wars: Machete Order & Phantom Edit'},
            { start:"03:20:05", title: 'Kopfhörer-Ersatzteile'},
            { start:"03:23:39", title: 'Dante'},
            { start:"03:38:03", title: 'Dante Via'},
            { start:"03:45:33", title: 'Internet of Things Security'},
            { start:"03:56:11", title: 'That One Privacy Guy\'s VPN Comparison Chart'},
            { start:"04:10:00", title: 'Ausklang'}
        ],
        */
        audio: [
          {
            url: '<?= $site->url(); ?>/podcasts/<?= $page->episode_file(); ?>',
            mimeType: 'audio/mp3',
            size: <?= $page->file_size(); ?>000000,
            title: 'Audio MP3'
          }
        ],
        /*
        reference: {
            config: '//podlove-player.surge.sh/fixtures/example.json',
            share: '//podlove-player.surge.sh/share'
        },
        */
        <?php $persons = explode(",", $page->cast()); ?>
        contributors: [

        <?php foreach($persons as $person) { ?>
        {
          name: `<?= $person; ?>`,
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
        'poster',
        'showTitle',
        'episodeTitle',
        'subtitle',
        'progressbar',
        'controlSteppers',
        'controlChapters'
      ]
    });
</script>