<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php echo $site->title(); ?> | <?php echo $page->title(); ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sumana:400,700">
    <link rel="stylesheet" href="/assets/24th/css/24th.css">
  </head>
  <body>
    <aside>
      <div id="ChatHolder" class="iframe-holder">
        <?php /*
        <iframe src="http://www.twitch.tv/TwitchPresents/chat" frameborder="0" scrolling="no" class="chat"></iframe>
        */ ?>
      </div>
      <div id="DonationVertical" style="display:none;" class="donation-vertical"></div>
      <div class="dismiss-holder"><a data-toggle="chat" data-chat="yes">dismiss chat</a></div>
    </aside>
    <footer>
      <?php $streamStart = new DateTime('2017-03-23T11:25CDT'); ?>
      <?php $thisIsNow = new DateTime("now"); ?>
      <?php $interval = $streamStart->diff($thisIsNow); ?>
      <div style="display:none;" class="versus-stripe">
        <div class="blue">
          <div class="label">BLUE</div>
          <div class="amount">$666</div>
        </div>
        <div class="vs"><span>vs</span></div>
        <div class="red">
          <div class="label">RED</div>
          <div class="amount">$333</div>
        </div>
      </div>
      
      
      <div class="logo-box box<?php if ($page->livestream_logo() == "") { echo ' hidden'; } ?>">
        <div class="inside"><img src="<?php echo $page->url(); ?>/<?php echo $page->livestream_logo(); ?>" class="trashfire"></div>
      </div>
      <div id="FooterGrid" class="grid">
        <div class="hour-box box">
          <div class="inside">
            <div class="label">This is hour</div>
            <div class="number" data-holds="current hour">
              <?php /* echo $interval->format('%H%'); */ ?>
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
                    <?php echo $page->current_doc_url(); ?>
                  </a>
                <?php } else { ?>
                  <span><?php echo $page->current_doc(); ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="provider<?php if ($page->current_doc_provider() == "") { echo " hidden"; } ?>">
              <div class="label">provided by</div>
              <div class="name" data-holds="provider">
                <?php /* echo $page->current_doc_provider(); */ ?>
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
                <?php /* echo $page->current_artist(); */ ?>
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
        <div class="recent-donation box">
          <div class="inside">
            <div class="label">Last Donation:</div>
            <div class="donation last-donation"><span class="name"></span> gave <span class="amount"></span> at 
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
      
      <div class="donation-counter<?php if ($page->goal_active() != "true") { echo " hidden"; } ?>">
        
        <?php 
          //$maff = ((int)(string)$page->gtest() / 600);
          $gmin = (int)(string)$page->goal_min();
          $gmax = (int)(string)$page->goal_max();
          $gdiff = ((250 - $gmin) / ($gmax - $gmin) * 100);
          //$goal_pct = (441.56 - $page->goal_min()) / ($page->goal_min() - $page->goal_min());
        ?>
        
        <div class="donation-goal" data-holds="goal_title"><?php echo $page->goal_title(); ?></div>
        <div class="donation-price" data-holds="goal_max">$<?php echo number_format($gmax); ?></div>
        <div class="donation-meter">
          <div class="heat" style="height: <?php echo $gdiff; ?>%;">
            <span class="current-total" data-holds="currentTotal">$250.50</span>
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

      <?php if ($page->battle_active() == "true" && $page->battle_query_a() != "" && $page->battle_query_b() != "") { ?>
        getBattle('<?php echo $page->battle_query_a(); ?>', '<?php echo $page->battle_query_b(); ?>');
      <?php } ?>

      setInterval(function(){ 
        getDonations();
        setTimeout(function(){
          refreshInfo();
        }, 2000);
      }, 10000);

    </script>
  </body>
</html>