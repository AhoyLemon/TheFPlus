<?php 
  $date1 = new DateTime('2019-05-18T11:00:00');
  $date2 = new DateTime();
  
  if ($date1 > $date2) {
    $IsItGarbageDay = "notYet";
    $diff = $date2->diff($date1);
  } else {
    $IsItGarbageDay = "yes";
  }

?>


<link href="https://fonts.googleapis.com/css?family=Freckle+Face" rel="stylesheet">
<?= css('assets/24th/css/garbageday.css?updated=2019-05-12'); ?>

<?php if ($page->slug() != "garbage-day-2019-24-terrible-hours-with-the-f-plus") { ?>
  <aside class="garbage-day <?php if ($IsItGarbageDay == "notYet") { echo 'off-canvas'; } else if ($IsItGarbageDay == "yes") { echo 'today'; } ?>" >
    <?php if ($IsItGarbageDay == "notYet") { ?>
      <div class="time-until">
        <?php if ($diff->format('%d') > 1) {
            echo '<div class="count">' . ( (int)$diff->format('%d') + 1)  . '</div>';
            echo '<div class="measurement">days until</div>';
          } else if ($diff->format('%h') > 0) {
            if ($diff->format('%d') == 1) {
              $hourCount = (24 + $diff->format('%h'));
            } else {
              $hourCount = $diff->format('%h');
            }
            echo '<div class="count">' . $hourCount . '</div>';
            echo '<div class="measurement">hours until</div>';
          }
        ?>
      </div>
    <?php } ?>
    <?php if ($IsItGarbageDay == "yes") { ?>
      <a class="hide-albert" id="HideAlbert">X</a>
    <?php } ?>
    <figure>
      <img src="<?= $site->url(); ?>/assets/24th/svg/albert.svg" id="AlbertSVG" alt="Albert Trocity, The Racoon" />
    </figure>
    <figcaption>
      <?php if ($IsItGarbageDay == "notYet") { ?>
        <a href="https://thefpl.us/wrote/garbage-day-2019-24-terrible-hours-with-the-f-plus">
          Garbage Day!
        </a>
      <?php } ?>
      <?php if ($IsItGarbageDay == "yes") { ?>
        <a href="https://www.twitch.tv/TheFPlus">
          It's Garbage Day!
        </a>
      <?php } ?>
    </figcaption>
  </aside>
<?php } ?>

<script>
  $('#HideAlbert').click(function() {
    $('#AlbertSVG').hide();
    $('.garbage-day figcaption').addClass('alone');
  });
</script>