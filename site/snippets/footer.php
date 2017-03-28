  <footer class="footer">
    
    <?php if(!$page->isHomePage()): ?>
      <?php snippet('tease-livestream') ?>
    <?php endif ?>
    
  <script src="<?php echo url::home() ?>/assets/js/thefplus.js?v=11.14.16"></script>
  <?php snippet('analytics') ?>
  <script src="<?php echo url::home() ?>/assets/js/newurl.js"></script>
  </footer>
</body>
</html>