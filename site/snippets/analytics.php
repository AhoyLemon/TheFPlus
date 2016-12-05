<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["setDomains", ["*.thefpl.us"]]);
  <?php if ($page->template() == "error") {
    echo "_paq.push(['setDocumentTitle',  '404/URL = ' +  encodeURIComponent(document.location.pathname+document.location.search) + '/From = ' + encodeURIComponent(document.referrer)]);";
  } ?>
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//thefpl.us/analytics/";
    _paq.push(['setTrackerUrl', u+'pwk.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'pwk.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//thefpl.us/analytics/pwk.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->