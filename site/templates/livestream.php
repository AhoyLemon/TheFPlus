<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
    
    <meta name="description" content="<?php echo excerpt($page->text()->xml(), 150) ?>">
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-title" content="The F Plus">
    <meta name="application-name" content="The F Plus">
    <meta name="msapplication-TileColor" content="#c0282d">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#c0282d">
    
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@TheFPlus" />
    <meta name="twitter:creator" content="@AhoyLemon">
    <meta name="twitter:title" content="<?php echo $page->title(); ?>" />
    <meta name="twitter:description" content="<?php echo excerpt($page->text()->xml(), 180) ?>" />
    <meta name="twitter:image" content="<?php echo $page->url(); ?>/<?php echo $page->livestream_logo(); ?>" />
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo $page->title(); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $page->url() ;?>">
    <meta property="og:image" content="<?php echo $page->url(); ?>/<?php echo $page->livestream_logo(); ?>" />
    <meta property="og:description" content="<?php echo excerpt($page->text()->xml(), 200) ?>">
    <meta property="og:email" content="lemon@thefpl.us">
    
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Bitter:400,700" rel="stylesheet">
    <link rel="stylesheet" href="/assets/24th/css/24th.css">
    
  </head>
  <body>
    <aside>
      <div id="ChatHolder" class="iframe-holder">
        <iframe src="https://www.twitch.tv/TheFPlus/chat" frameborder="0" scrolling="no" class="chat"></iframe>
      </div>
      <div id="DonationVertical" style="display:none;" class="donation-vertical"></div>
      <div class="dismiss-holder"><a data-toggle="chat" data-chat="yes">dismiss chat</a></div>
    </aside>
    <footer>
      <?php 
        $marathonStart = new DateTime('2017-03-31T18:00CDT');
        $marathonStartUnix = $marathonStart->getTimestamp();
        $intervalSeconds = time() - $marathonStartUnix;
        $interval = ceil($intervalSeconds / 3600) + 1;
      ?>
      
      <!-- STREAM LOGO -->
      <div class="logo-box box<?php if ($page->livestream_logo() == "") { echo ' hidden'; } ?>">
        <div class="inside"><img src="<?php echo $page->url(); ?>/<?php echo $page->livestream_logo(); ?>" class="trashfire"></div>
      </div>
      
      <div id="FooterGrid" class="grid">
        <div class="hour-box box">
          <div class="inside">
            <div class="label">This is hour</div>
            <div class="number" data-holds="current hour">
              <?php echo strval($interval); ?>
            </div>
          </div>
        </div>
        <div class="doc-box box<?php if ($page->current_doc() == "") { echo " hidden"; } ?>">
          <div class="inside">
            <div class="document">
              <div class="label">currently reading</div>
              <div class="name" data-holds="document name">
                <?php if ($page->current_doc_url() != "") { ?>
                  <a href="<?php echo $page->current_doc_url(); ?>" class="doc-link">
                    <?php echo $page->current_doc(); ?>
                  </a>
                <?php } else { ?>
                  <span><?php echo $page->current_doc(); ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="provider<?php if ($page->current_doc_provider() == "") { echo " hidden"; } ?>">
              <div class="label">provided by</div>
              <div class="name" data-holds="provider">
                <?php echo $page->current_doc_provider(); ?>
              </div>
            </div>
          </div>
        </div>
        <?php $readers = explode(",", $page->current_readers()); ?>
        <div class="participant-box box<?php if ($page->current_readers() == "") { echo " hidden"; } ?>">
          <div class="inside">
            <div>
              <div class="label">Your Ridiculists:</div>
              <div class="readers">
                <?php foreach ($readers as $reader) { ?>
                  <span class="name"><?php echo $reader; ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="artist<?php if ($page->current_artist() == "") { echo " hidden"; } ?>">
              <div class="label">Your Artist:</div>
              <div class="name" data-holds="artist name">
                <?php echo $page->current_artist(); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="donation-total-box box">
          <div class="inside"> 
            <div class="label">Donation Total</div>
            <div class="dollars"></div>
          </div>
        </div>
        <div class="recent-donation box transparent">
          <div class="inside">
            <div class="label">Last Donation:</div>
            <div class="donation last-donation">
              <span class="name"></span> 
              gave 
              <span class="amount"></span> 
              at 
              <time></time>
            </div>
            <blockquote></blockquote>
          </div>
        </div>
        <div class="donation-button box">
          <div class="inside"><a href="https://twitch.streamlabs.com/thefplus" target="_blank" class="button">DONATE NOW</a></div>
        </div>
      </div>
    </footer>
    <main>
      
      <!-- OVERLAY -->
      <div class="text-overlay<?php if ($page->overlay_active() != "true") { echo " hidden"; } ?>">
        <div class="inner" data-holds="overlay_text">
          <?php echo $page->overlay_text()->kirbytext(); ?>
        </div>
      </div>
      
      <!-- BATTLE -->
      <div class="versus-stripe hidden">
        <div class="blue">
          <div class="label"></div>
          <div class="amount"></div>
        </div>
        <div class="vs"><span>vs</span></div>
        <div class="red">
          <div class="label"></div>
          <div class="amount"></div>
        </div>
      </div>
      
      <!-- BUILD YOUR OWN COUNTER -->
      
      <div class="osd-counter<?php if ($page->counter_active() != "true") { echo " hidden"; } ?>">
        <div class="inside">
          <div class="label"><?php echo $page->counter_label(); ?></div>
          <div class="count"><?php echo $page->counter_number(); ?></div>
        </div>
      </div>
      
      
      <!-- DONATION GOAL -->
      <div class="donation-goal hidden">
        
        <div class="goal-title" data-holds="goal_title"></div>
        <div class="donation-price" data-holds="goal_max"></div>
        <div class="donation-meter">
          <div class="heat" style="height: 0">
            <span class="current-total" data-holds="currentTotal"></span>
          </div>
        </div>
      </div>
      
      <!-- iFrame -->
      <iframe src="<?php echo $page->iframe_url(); ?>" frameborder="0" allowfullscreen="true" scrolling="no"></iframe>
      
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/assets/24th/js/moment.js"></script>
    <script src="/assets/24th/js/24th.js"></script>
    <script>

      setInterval(function(){ 
        getDonations();
        setTimeout(function(){
          refreshInfo();
        }, 2000);
      }, 10000);

    </script>
  </body>
</html>
