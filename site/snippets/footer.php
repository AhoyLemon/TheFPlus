  <footer class="footer">
  <script src="<?php echo url::home() ?>/assets/js/thefplus.js?v=01.20.16"></script>
  <?php snippet('analytics') ?>
    <script>
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js');
      }
    </script>
  <script src="<?php echo url::home() ?>/assets/js/newurl.js"></script>
  </footer>
</body>
</html>