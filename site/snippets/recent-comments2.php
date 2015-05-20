  <footer class="footer cf" role="contentinfo">

    <div class="copyright">
      <?php echo $site->copyright()->kirbytext() ?>
    </div>

    <div class="colophon">
      <a href="http://getkirby.com/made-with-kirby-and-love">Made with Kirby and <b>♥</b></a>
    </div>
    
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="<?php echo url::home() ?>/assets/js/vendor/jquery.rss.min.js"></script>
  <script src="<?php echo url::home() ?>/assets/js/thefplus.js"></script>
  <script>
      jQuery(function($) {
        $("#rss-feeds").rss(
  "http://thefplus-dev.disqus.com/latest.rss",
  {
    // how many entries do you want?
    // default: 4
    // valid values: any integer
    limit: 5,

    // want to offset results being displayed?
    // default: false
    // valid values: any integer
    offsetStart: false, // offset start point
    offsetEnd: false, // offset end point

    // will request the API via https
    // default: false
    // valid values: false, true
    ssl: false,

    // outer template for the html transformation
    // default: "<ul>{entries}</ul>"
    // valid values: any string
    layoutTemplate: '<ul class="comments">{entries}</ul>',

    // inner template for each entry
    // default: '<li><a href="{url}">[{author}@{date}] {title}</a><br/>{shortBodyPlain}</li>'
    // valid values: any string
    entryTemplate: '<li><a class="title" href="{url}">{title}</a><blockquote class="comment">{shortBodyPlain}</blockquote><cite class="author" rel="author">{author}</cite></li>',

    // additional token definition for in-template-usage
    // default: {}
    // valid values: any object/hash
    tokens: {
      foo: 'bar',
      bar: function(entry, tokens) { return entry.title }
    },

    // output mode of google feed loader request
    // default: 'json'
    // valid values: 'json', 'json_xml'
    outputMode: 'json_xml',

    // the effect, which is used to let the entries appear
    // default: 'show'
    // valid values: 'show', 'slide', 'slideFast', 'slideSynced', 'slideFastSynced'
    effect: 'slideFastSynced',

    // a callback, which gets triggered when an error occurs
    // default: function() { throw new Error("jQuery RSS: url don't link to RSS-Feed") }
    error: function(){},

    // a callback, which gets triggered when everything was loaded successfully
    // this is an alternative to the next parameter (callback function)
    // default: function(){}
    success: function(){}
  },

  // callback function
  // called after feeds are successfully loaded and after animations are done
  function callback() {}
)
      })
    </script>

  </footer>
</body>
</html>