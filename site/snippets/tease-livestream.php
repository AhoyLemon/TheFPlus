<?php $stream = $site->find('24th'); ?>

<div class="tease-livestream" style="display:none;">
  <?php
	$marathonStart = new DateTime('2017-03-31T18:00CDT');
	$marathonStartUnix = $marathonStart->getTimestamp();
	$intervalSeconds = time() - $marathonStartUnix;
	$interval = ceil($intervalSeconds / 3600) + 1; 
  ?>
  <div class="inner">
    <h2 class="this-is">
      <?php echo $stream->teaser_pre()->kirbytext(); ?>
      <strong>
        <?php echo strval($interval); ?>
      </strong>
      <?php echo $stream->teaser_post()->kirbytext(); ?>
    </h2>
    <div class="button-holder">
      <a class="button" href="<?php echo $site->find('24th')->url(); ?>">
        <?php echo $stream->teaser_button()->kirbytext(); ?>
      </a>
    </div>
  </div>
</div>
