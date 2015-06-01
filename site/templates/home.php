<?php snippet('header') ?>
  
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "PerformingGroup",
      "name": "The F Plus",
      "url": "http://thefpl.us",
      "logo": "http://thefpl.us/favicon-192x192.png",
      "sameAs" : [ 
        "https://www.facebook.com/thefplus",
        "https://twitter.com/TheFPlus",
        "https://plus.google.com/+TheFPlus"
      ]
    }
  </script>

  <main class="main" role="main">
    <?php snippet('briefs') ?>
  </main>

<?php snippet('disqus-alt', array('allow_comments' => false)) ?>
<?php snippet('footer') ?>
