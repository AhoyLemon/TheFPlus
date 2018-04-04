  <?php
    //$d = strtotime('2018-04-07T10:00:00');
    $date1 = new DateTime('2018-04-07T11:00:00');
    $date2 = new DateTime();
    $diff = $date2->diff($date1);
    if ($date1 > $date2) {
  
      // COUNT DOWN ?>

      <style>
        .garbage-day-banner { position: fixed; bottom: 0; right: 0; left:0; background: #c0282d; color: white; display: flex; flex-wrap: wrap; padding:10px; transform: translateY(120%); transition:transform 2s ease; }
        .garbage-day-banner .box { padding-left: 10px; padding-right: 10px; }
        .garbage-day-banner .count { font-size: 400%; font-weight: bold; line-height: 80%; text-align: center; }
        .garbage-day-banner .label { text-align: center; text-transform: uppercase; }
        .garbage-day-banner .until { font-style: italic; padding-left: 20px; }
        .garbage-day-banner .first.line { font-size:206%; }
        .garbage-day-banner .page-link { position: absolute; top: 0; right: 0; bottom: 0; left: 0; }
        .garbage-day-banner .close { position: absolute; top: 0; right: 0; width: 40px; height: 40px; font-size: 32px; background: transparent; border: none; color: white; cursor: pointer; }
        @media (min-width:768px) { 
          .garbage-day-banner { padding-left: 310px; }
        }
        @media (min-width:441px) and (max-width:620px) { 
          .garbage-day-banner .until { font-size:2.25vw; }
        }
        @media (max-width:440px) {
          .garbage-day-banner .box { flex-basis: 50%;}
          .garbage-day-banner .until { flex-basis: 100%; font-size:3vw; text-align: center; }
        }

        .garbage-day-banner.visible { transform: translateX(0); }
      </style>
      
      <div class="garbage-day-banner" id="GarbageDayBanner">
        <div class="box days-box">
          <?php if ($diff->format('%d') > 0) {
              echo '<div class="count">' . $diff->format('%D') . '</div>';
            } else if ($diff->format('%d') < 1) {
              echo '<div class="count">00</div>';
            }
          ?>
          <div class="label">days</div>
        </div>
        
        <div class="box days-box">
          <?php if ($diff->format('%d') > 0) {
              echo '<div class="count">' . $diff->format('%D') . '</div>';
            } else if ($diff->format('%d') < 1) {
              echo '<div class="count">00</div>';
            }
          ?>
          <div class="label">hours</div>
        </div>
        
        
        <div class="until">
          <span class="first line">
            until it's <b>Garbage Day!</b>
          </span>
          <br />
          <span class="second line">
            (24 More Terrible Hours with The F Plus)
          </span>
        </div>
        
        <a class="page-link" href="https://www.twitch.tv/thefplus">&nbsp;</a>
        
        <button id="CloseBanner" class="x close">x</button>
        
      </div>
    <?php } else if ($diff->format('%d') < 1) { 

      // GARBAGE DAY IS RIGHT NOW ?>

      <style>
        #GarbageDayIsNow { position: fixed; bottom:0; right:0; z-index: 7; }
      </style>

      <figure id="GarbageDayIsNow">
        <a href="https://www.twitch.tv/TheFPlus">
          <img src="<?php echo url::home() ?>/assets/24th/img/garbage_day.gif" class="gif" />
        </a>
      </figure>
      <h1 style="position:fixed; bottom:0; right:0; background:red; z-index:">It is garbage day! <?= $diff->format('%d') ?></h1>

    <?php } else { ?>

      <!-- Garbage Day Is Over -->

    <?php } ?>



<script>

  if (sessionStorage.bannerClosed != "true") {
    $('#GarbageDayBanner').addClass('visible');
  }

  $('#CloseBanner').click(function() {
    sessionStorage.setItem("bannerClosed", "true");
    $('#GarbageDayBanner').removeClass('visible');
  });
</script>