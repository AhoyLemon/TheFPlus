<div class="app" id="app"></div>
<script src="//cdn.podlove.org/web-player/5.x/embed.js"></script>

<?php if ( $page->chapters()->isNotEmpty()) {
  $chapters = array();
  foreach ($page->chapters()->toStructure() as $c) {

    $a = (float)str_replace(':', '', $c->timestamp());
    $b = str_pad($a, 6, '0', STR_PAD_LEFT);
    $z = rtrim(chunk_split(substr($b,-6),2,':'),':');
    $n = trim($c->name());
    array_push($chapters, array("timestamp" => $z, "name" => $n));
  }
} ?>

<script>

  const episode = {
  // Configuration Version
  version: 5,

  /**
   * Show Related Information
   */
  show: {
    title: "<?= $site->title(); ?>",
    subtitle: "<?= $site->description(); ?>",
    summary: "<?= $site->description(); ?>",
    poster: "https://thefpl.us/assets/images/og-image.png",
    link: "<?= $site->url(); ?>"
  },



  /**
   * Episode related Information
   */
  title: "<?= addslashes($page->title()); ?>",
  subtitle: "Reading: <?= str_replace(',', '   ', $page->featured_site()); ?>",
  summary: `<?= preg_replace( "/\r|\n/", "", $page->text()->kirbytext() ); ?>`,
  publicationDate: "<?= $page->date(); ?>",
  //poster: "<?= $page->cover()->toFile()->url(); ?>",
  // ISO 8601 Duration format ([hh]:[mm]:[ss].[sss]), capable of add ing milliseconds, see https://en.wikipedia.org/wiki/ISO_8601
  <?php if ($page->runtime()->isNotEmpty()) { ?>
    duration: '<?= $page->runtime(); ?>',
  <?php } ?>
  link: "<?= $page->url(); ?>",
  /**
   * Audio Assets
   * - media Assets played by the audio player
   * - format support depends on the used browser (https://en.wikipedia.org/wiki/HTML5_audio#Supported_audio_coding_formats)
   * - also supports HLS streams
   *
   * Asset
   * - url: absolute path to media asset
   * - size: file size in  byte
   * - (title): title to be displayed in download tab
   * - mimeType: media asset mimeType
   */
  audio: [
    {
      url: '<?= $site->url(); ?>/podcasts/<?= $page->episode_file(); ?>',
      <?php if ($page->file_size()->isNotEmpty()) { ?>
        size: <?= $page->file_size(); ?>000000,
      <?php } ?>
      title: "MP3 Audio (mp3)",
      mimeType: "audio/mpeg"
    }
  ],


  <?php if ($page->chapters_toggle() == "yes" && $page->chapters()->isNotEmpty()) { ?>
    chapters: [
      <?php foreach ($chapters as $chapter) { ?>
        { start:'<?= $chapter['timestamp']; ?>', title: '<?= addslashes($chapter['name']); ?>', href:"", image:"" },
      <?php } ?>
    ],
  <?php } ?>

  /**
   * Contributors
   * - used by info and transcripts tab
   *
   * Contributor
   * - id: used as a reference in transcripts
   * - name: name of the contributor
   * - (avatar): avatar of the contributor
   * - (group): contributors group
   */
};

const config = {
  version: 5,

  // player asset base path, falls back to ./
  base: "player/",

  activeTab: "chapters", // default active tab, can be set to [chapters, files, share, playlist]

  theme: {
    /**
     * Tokens
     * - if defined the player defaults are dropped
     * - rgba as well as hex values are allowed
     * - use this generator to get a direct visual feedback:
     */
    tokens: {
      brand: "#87B0D4",
      brandDark: "#0F2942",
      brandDarkest: "#1A3A4A",
      brandLightest: "#E5EAECFF",
      shadeDark: "#807E7C",
      shadeBase: "#807E7C",
      contrast: "#000",
      alt: "#fff"
    },

    /**
     * Fonts
     * - by default the system font stack is used (https://css-tricks.com/snippets/css/system-font-stack/)
     *
     * font:
     * - name: font name that is used in the font stack
     * - family: list of fonts in a fallback order
     * - weight: font weight of the defined font
     * - src: list of web font sources (allowed: woff, woff2, ttf, eot, svg)
     */
    fonts: {
      ci: {
        name: "RobotoBlack",
        family: [
          "RobotoBlack",
          "Calibri",
          "Candara",
          "Arial",
          "Helvetica",
          "sans-serif"
        ],
        weight: 900,
        src: ["./assets/roboto-black.woff2"]
      },
      regular: {
        name: "FiraSansLight",
        family: [
          "FiraSansLight",
          "Calibri",
          "Candara",
          "Arial",
          "Helvetica",
          "sans-serif"
        ],
        weight: 300,
        src: ["./assets/fira-sans-light.woff2"]
      },
      bold: {
        name: "FiraSansBold",
        family: [
          "FiraSansBold",
          "Calibri",
          "Candara",
          "Arial",
          "Helvetica",
          "sans-serif"
        ],
        weight: 700,
        src: ["./assets/fira-sans-normal.woff2"]
      }
    }
  },

  /**
   * Subscribe Button
   * - configuration for the subsscribe button overlay
   * - if not defined the subscribe button won't be rendered
   */
  "subscribe-button": {
    feed: "https://feeds.podlovers.org/mp3", // Rss feed

    /**
     * Clients
     * - list of supported podcast clients on android, iOS, Windows, OSX
     * - only available clients on the used os/platform are shown
     * - order in list determines rendered order
     */
    clients: [
      {
        id: "apple-podcasts",
        service: "id1523714548" // https://podcasts.apple.com/podcast/[service]
      },
      {
        id: "antenna-pod"
      },
      {
        id: "beyond-pod"
      },
      // {
      //   id: "castbox",
      //   service: "castbox-id"
      // },
      {
        id: "castro"
      },
      {
        id: "clementine"
      },
      // {
      //   id: "deezer",
      //   service: "" https://www.deezer.com/en/show/[service]
      // },
      {
        id: "downcast"
      },
      {
        id: "google-podcasts",
        service: "https://feeds.podlovers.org/mp3" // feed
      },
      {
        id: "gpodder"
      },
      {
        id: "itunes"
      },
      {
        id: "i-catcher"
      },
      {
        id: "instacast"
      },
      {
        id: "overcast"
      },
      {
        id: "player-fm"
      },
      {
        id: "pocket-casts",
        service: "TheFPlus" // feed
      },
      {
        id: "pod-grasp"
      },
      {
        id: "podcast-addict"
      },
      {
        id: "podcast-republic"
      },
      {
        id: "podcat"
      },
      {
        id: "podscout"
      },
      {
        id: "rss-radio"
      },
      // {
      //   id: "soundcloud",
      //   service: "", // https://soundcloud.com/[service]
      // },
      // {
      //   id: "spotify",
      //   service: "", // https://open.spotify.com/show/[service]
      // },
      // {
      //   id: "stitcher",
      //   service: "" // https://www.stitcher.com/podcast/[service]
      // },
      // {
      //   id: "youtube",
      //   service: "" // https://www.youtube.com/channel/[service]
      // },
      {
        id: "rss"
      }
    ]
  },

  /*
    Share Tab
  */
  share: {
    /**
     * Share Channels:
     * - list of available channels in share tab
     */
    channels: [
      "facebook",
      "twitter",
      "whats-app",
      "linkedin",
      "pinterest",
      "xing",
      "mail",
      "link"
    ],
    sharePlaytime: true
  }
};



  window.podlovePlayer("#app", episode, config);
</script>