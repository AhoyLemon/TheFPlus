  <footer class="footer">
    <script src="<?php echo url::home() ?>/assets/js/thefplus.js?v=01.06.18"></script>
    <?php snippet('analytics') ?>

    <? /*
    <script type="text/javascript">
      // Register the service worker
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
          // Registration was successful
          console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }).catch(function(err) {
          // registration failed :(
          console.log('ServiceWorker registration failed: ', err);
        });
      }
    </script>
    */ ?>

    <script src="<?php echo url::home() ?>/assets/js/newurl.js"></script>
  </footer>
</body>
</html>