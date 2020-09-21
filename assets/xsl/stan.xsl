<xsl:stylesheet
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:npr="http://www.npr.org/rss/"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
  xmlns:atom="http://www.w3.org/2005/Atom"
version="2.0">

  <xsl:output method="html"/>
  <xsl:variable name="title" select="/rss/channel/title"/>
  <xsl:template match="/">
    <html>
      <head>
        <title>
          <xsl:value-of select="$title"/>
          (RSS Feed)
        </title>
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC:300,400,700" rel="stylesheet" />
        <link rel="stylesheet" href="https://thefpl.us/assets/css/stan.css" type="text/css" />
      </head>
    
      <xsl:apply-templates select="rss/channel"/>
      
    </html>

  </xsl:template>
  <xsl:template match="channel">
    <body>
      <div id="main">
        <div class="rss-content">

          <header class="show-overview">
            <div class="show-overview-inner">

              <h1>
                <xsl:value-of select="./title"/>
              </h1>
              
              <p class="show-description">
                <xsl:value-of select="./description"/>
              </p>

              <div id="instructions">
                <p>
                  Subscribe to this podcast in 
                  <a href="https://pca.st/TheFPlus">Pocket Casts</a>
                  or 
                  <a href="https://itunes.apple.com/us/podcast/the-f-plus/id334184087">Apple Podcasts</a>
                  or
                  <a href="https://podcasts.google.com/feed/aHR0cHM6Ly90aGVmcGwudXMvZXBpc29kZS9mZWVk">Google Podcasts</a>
                  or
                  <a href="https://overcast.fm/itunes334184087/the-f-plus">Overcast</a>
                  or
                  <a href="https://podchaser.com/TheFPlus">Podchaser</a>
                  or
                  <a href="https://radiopublic.com/the-f-plus-GqnR55">Radio Public</a>
                  or
                  <a href="https://castro.fm/podcast/813f4919-6245-464d-a603-fb2b4bf0fbc1">Castro</a>
                  or
                  <a href="https://music.amazon.com/podcasts/a973c6d8-1b4b-4e78-bbb9-0a47abb638ec/The-F-Plus">Amazon Podcasts</a>
                  or
                  <a href="https://open.spotify.com/show/76COtISaGDglXLrVGyQ5cE">Spotify</a>
                  or
                  <a href="https://www.stitcher.com/podcast/the-f-plus">Stitcher</a>.
                </p>
                <p>
                  Or copy 
                  <code>https://thefpl.us/episode/feed</code>
                  into your app of choice.
                </p>


              </div>

            </div>

          </header>

          <div id="Javascripts">
            <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
            <script src="https://thefpl.us/assets/js/thefplus.js"></script>
            <script type="text/javascript">
              var _paq = _paq || [];
              _paq.push(["setDomains", ["*.thefpl.us"]]);
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

            <script>
              if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1){
                $(document).ready(function() {
                  $('.description').each(function() {
                    let h = $(this).text();
                    $(this).html(h);
                  }); 
                })
              }
            </script>

          </div>

          <section class="episodes">
            <xsl:apply-templates select="item"/>
          </section>

        </div>
      </div>

    </body>
  </xsl:template>


  <!-- Episode -->
  <xsl:template match="item">
    <article class="episode">

      <xsl:if test="image">
        <figure class="cover">
          <img class="cover episode-image" loading="lazy" width="320" height="320">
            <xsl:attribute name="src">
              <xsl:value-of select="image"/>
            </xsl:attribute>
          </img>
          <figcaption>
            <a class="download-button action download">
              <xsl:attribute name="href">
                  <xsl:value-of select="enclosure/@url"/>?ref=download
              </xsl:attribute>
              <xsl:attribute name="download"></xsl:attribute>
              Download episode
            </a>
          </figcaption>
        </figure>
      </xsl:if>

      <h2 class="title">
        <a>
          <xsl:attribute name="href">
              <xsl:value-of select="link"/>
          </xsl:attribute>
          <xsl:value-of select="title"/>
        </a>
      </h2>

      <xsl:if test="pubDate">
        <time>
          <xsl:value-of select="pubDate" />
        </time>
      </xsl:if>

      <div class="description">
        <xsl:value-of select="content:encoded" disable-output-escaping="yes" />
      </div>
      
      <!-- <p class="episode_meta">
        <a>
            <xsl:attribute name="href">
                <xsl:value-of select="enclosure/@url"/>?ref=download
            </xsl:attribute>
            Download episode
        </a> |
        File size: <xsl:value-of select='format-number(number(enclosure/@length div "1024000"),"0.0")'/>MB
      </p> -->
      </article>
  </xsl:template>


</xsl:stylesheet>