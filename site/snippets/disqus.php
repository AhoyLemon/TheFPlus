<?php

// set the defaults
if(!isset($allow_comments))        $disqus_url = thisURL();

$disqus_title     = addcslashes($disqus_title, "'");
$disqus_developer = ($disqus_developer) ? 'true' : 'false';

?>
<div id="disqus_thread"></div>
<script type="text/javascript">
  var disqus_shortname  = '<?php echo $disqus_shortname ?>'; // required: replace example with your forum shortname
  var disqus_title      = '<?php echo html($disqus_title) ?>';
  var disqus_developer  = '<?php echo $disqus_developer ?>'; // developer mode
  var disqus_identifier = '<?php echo $disqus_identifier ?>';
  var disqus_url        = '<?php echo $disqus_url ?>';
  var disqus_category   = 'Podcast';

  (function() {
    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
    dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
  })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<span class="dsq-brlink">loading comments</span>