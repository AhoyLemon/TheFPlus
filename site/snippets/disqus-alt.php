
<?php $disqus_identifier = $page->uri(); ?>
<div id="disqus_thread"></div>
<script type="text/javascript">
  var disqus_shortname = 'thefplus';
  var disqus_identifier = '<?php echo $disqus_identifier ?>';
  <?php
    if (strpos($disqus_identifier,'episode') !== false) {
      echo 'var disqus_category_id = "3926085";
';
    }
  ?>
  <?php if ($allow_comments ==  true): ?>
  (function() {
    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
  })();
  <?php endif ?>
  
  (function () {
      var s = document.createElement('script'); s.async = true;
      s.type = 'text/javascript';
      s.src = '//' + disqus_shortname + '.disqus.com/count.js';
      (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
  }());
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>