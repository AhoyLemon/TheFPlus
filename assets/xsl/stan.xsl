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
                  <a href="https://play.google.com/music/m/Ihlfeggusqrvudj3k22sqrvpmmu?t=The_F_Plus">Google Play Music</a>
                  or
                  <a href="https://overcast.fm/itunes334184087/the-f-plus">Overcast</a>
                  or
                  <a href="https://radiopublic.com/the-f-plus-GqnR55">Radio Public</a>
                  or
                  <a href="https://castro.fm/podcast/813f4919-6245-464d-a603-fb2b4bf0fbc1">Castro</a>
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

          <!-- <img class="show-cover">
            <xsl:attribute name="src">
              <xsl:value-of select="./itunes:image/@href"/>
            </xsl:attribute>
          </img> -->

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
          <img class="cover episode-image">
            <xsl:attribute name="src">
              <xsl:value-of select="image"/>
            </xsl:attribute>
          </img>
          <figcaption>
            <a class="download-button">
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

      <xsl:value-of select="content:encoded" disable-output-escaping="yes" />
      
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