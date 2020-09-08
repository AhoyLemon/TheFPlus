<div class="photo-holder">
  <?php if ($photo->full_size() != "") { ?>
    <a class="zoom-photo" full-size="<?= $photo->full_size()->toFile()->url() ?>" itemprop="image">
      <img src="<?php echo $photo->pic()->toFile()->crop(260,260)->url() ?>" data-series="<?php echo $photo->series_num(); ?>" loading="lazy" width="320" height="320" alt="<?php echo $photo->desc(); ?>" />
    </a>
  <?php } else { ?>
    <img src="<?php echo $photo->pic()->toFile()->crop(260,260)->url() ?>" data-series="<?php echo $photo->series_num(); ?>" loading="lazy" width="320" height="320" alt="<?php echo $photo->desc(); ?>" itemprop="image" />
  <?php } ?>
</div>