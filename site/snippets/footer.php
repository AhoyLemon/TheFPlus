    <footer class="footer">
    <?php snippet('garbage-day-2') ?>
      <?php snippet('analytics') ?>

      <?php /*
      <script type="text/javascript">
        //This is the "Offline page" service worker

        //Add this below content to your HTML page, or add the js file to your page at the very top to register service worker
        if (navigator.serviceWorker.controller) {
          console.log('[PWA Builder] active service worker found, no need to register')
        } else {
          //Register the ServiceWorker
          navigator.serviceWorker.register('<?= $site->url(); ?>/service-worker.js', {
            scope: './'
          }).then(function(reg) {
            console.log('Service worker has been registered for scope:'+ reg.scope);
          });
        }

      </script>
      */ ?>

      <?php /*

      /// Deprecating Javascript based NewURL rerouting
      <script src="<?php echo url::home() ?>/assets/js/newurl.js"></script>

      */ ?>
      
    </footer>


    <?php if($page->isHomePage()): ?>
    <!--

    ooooo      ooo   .oooooo.        oooooooooo.     .oooooo.   ooooo     ooo oooooooooo.  ooooooooooooo 
    `888b.     `8'  d8P'  `Y8b       `888'   `Y8b   d8P'  `Y8b  `888'     `8' `888'   `Y8b 8'   888   `8 
    8 `88b.    8  888      888       888      888 888      888  888       8   888     888      888      
    8   `88b.  8  888      888       888      888 888      888  888       8   888oooo888'      888      
    8     `88b.8  888      888       888      888 888      888  888       8   888    `88b      888      
    8       `888  `88b    d88'       888     d88' `88b    d88'  `88.    .8'   888    .88P      888      
    o8o        `8   `Y8bood8P'       o888bood8P'    `Y8bood8P'     `YbodP'    o888bood8P'      o888o     

    -->
    <?php endif; ?>

  </body>
</html>