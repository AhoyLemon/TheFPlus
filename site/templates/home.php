<?php snippet('header') ?>
  
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "PerformingGroup",
      "name": "The F Plus",
      "url": "http://thefpl.us",
      "email": "lemon@thefpl.us",
      "foundingDate": "2009",
      "logo": "http://thefpl.us/schemaLogo.png",
      "alternateName": "The F+",
      "sameAs" : [ 
        "https://www.facebook.com/thefplus",
        "https://twitter.com/TheFPlus",
        "https://plus.google.com/+TheFPlus"
      ]
    }
  </script>

  <main class="main" role="main">
    <?php if (param('flush') == "everything"): ?>
      <?php cache::flush(); ?>
      <h2>Cache flushed</h2>
    <?php endif ?>
    <?php snippet('briefs') ?>
  </main>

<?php snippet('disqus-alt', array('allow_comments' => false)) ?>
<?php snippet('footer') ?>
