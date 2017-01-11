
<div id="disqus_thread"></div>
<script type="text/javascript">
  var disqus_shortname = 'thefplus';
  var disqus_identifier = '<?php echo $page->uri(); ?>';
  <?php if ($page->parent()->slug() == "episode") {
    echo 'var disqus_title = "' . $page->uid() . ': ' . $page->title() . '";
    ';
    echo 'var disqus_category_id = "3926085";';
  } else {
    echo 'var disqus_title = "' . $page->title() . '";';
  } ?>
  <?php if ($allow_comments ==  true): ?>
  (function() {
    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    
    /*
    var checkDisqus = setInterval(function() {
      if ($('#post-list')) {
        console.log('found posts');
        clearInterval(checkDisqus);
      } else {
        console.log('have not found it');
      }
    }, 50);
    */
    
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