<?php snippet('header') ?>
  
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "PerformingGroup",
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
      }
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

<!--
                                                                                                                                   
b.             8     ,o888888o.               8 888888888o.          ,o888888o.     8 8888      88 8 888888888o 8888888 8888888888 
888o.          8  . 8888     `88.             8 8888    `^888.    . 8888     `88.   8 8888      88 8 8888    `88.     8 8888       
Y88888o.       8 ,8 8888       `8b            8 8888        `88. ,8 8888       `8b  8 8888      88 8 8888     `88     8 8888       
.`Y888888o.    8 88 8888        `8b           8 8888         `88 88 8888        `8b 8 8888      88 8 8888     ,88     8 8888       
8o. `Y888888o. 8 88 8888         88           8 8888          88 88 8888         88 8 8888      88 8 8888.   ,88'     8 8888       
8`Y8o. `Y88888o8 88 8888         88           8 8888          88 88 8888         88 8 8888      88 8 8888888888       8 8888       
8   `Y8o. `Y8888 88 8888        ,8P           8 8888         ,88 88 8888        ,8P 8 8888      88 8 8888    `88.     8 8888       
8      `Y8o. `Y8 `8 8888       ,8P            8 8888        ,88' `8 8888       ,8P  ` 8888     ,8P 8 8888      88     8 8888       
8         `Y8o.`  ` 8888     ,88'             8 8888    ,o88P'    ` 8888     ,88'     8888   ,d8P  8 8888    ,88'     8 8888       
8            `Yo     `8888888P'               8 888888888P'          `8888888P'        `Y88888P'   8 888888888P       8 8888       
-->