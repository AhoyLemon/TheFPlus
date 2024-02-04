<?php snippet('header') ?>
  
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "PerformingGroup",
      "name": "The F Plus",
      "url": "https://thefpl.us",
      "email": "lemon@thefpl.us",
      "foundingDate": "2009",
      "logo": "https://thefpl.us/favicon.svg",
      "description": "Terrible things, read with enthusiasm.",
      "alternateName": "The F+",
      "sameAs" : [ 
        <?php 
          $i = 0;
          $c = count($site->schema_sameas()->toStructure());
          foreach ($site->schema_sameas()->toStructure() as $sameas) {
            $i++;
            echo '"' . $sameas->url() . '"'; 
            if ($i != $c) { echo ', 
            '; }
          }
        ?>
      ],
      "owns": {
        "@context": "https://schema.org",
        "@type": "Brand",
        "name": "Ball Pit",
        "url": "http://ballp.it",
        "logo": "http://ballp.it/Themes/Giggle/svg/new-logo.svg"
      },
      "founder": {
        "name": "Lemon",
        "url": "https://thefpl.us/meet/lemon"
      }
    }
  </script>
  <!-- RSS FEED -->
  <link rel="alternate" type="application/rss+xml" title="The F Plus Episodes" href="https://thefpl.us/episode/feed" />
  
  <main class="main" role="main">
    <?php if (param('flush') == "everything"): ?>
      <?php cache::flush(); ?>
      <h2>Cache flushed</h2>
    <?php endif ?>

    <?php snippet('briefs',  [ 'articles' => $site->grandChildren()->visible()->sortBy('date', 'desc')->paginate(15)]) ?>
  </main>
<?php snippet('footer') ?>