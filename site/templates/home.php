<?php snippet('header') ?>
  
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "The F Plus",
      "url": "https://thefpl.us",
      "email": "lemon@thefpl.us",
      "foundingDate": "2009",
      "logo": "https://thefpl.us/schemaLogo.png",
      "description": "Terrible things, read with enthusiasm.",
      "alternateName": "The F+",
      "sameAs" : [ 
        "http://feeds.feedburner.com/TheFPlus",
        "https://twitter.com/TheFPlus",
        "https://plus.google.com/+TheFPlus",
        "https://www.facebook.com/thefplus"
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
  <link rel="alternate" type="application/rss+xml" title="The F Plus Episodes" href="http://feeds.feedburner.com/TheFPlus" />

  <main class="main" role="main">
    <?php if (param('flush') == "everything"): ?>
      <?php cache::flush(); ?>
      <h2>Cache flushed</h2>
    <?php endif ?>
    <?php snippet('briefs') ?>
  </main>

<?php snippet('disqus-alt', array('allow_comments' => false)) ?>
<?php snippet('footer') ?>