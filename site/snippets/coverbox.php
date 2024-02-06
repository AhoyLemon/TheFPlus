<?php if($image = $article->image()) { ?>
  <a class="tile" href="<?php echo $article->url() ?>" title="<?php echo $article->title() ?>">
    <figure>

      <div class="cover-loading">
        <div class="episode-summary">
          <?php if (is_numeric($article->uid())) {  ?>
            <div class="episode-number">
              <?= $article->uid(); ?>
            </div>
          <?php } ?>
          <div class="episode-title">
            <?php echo $article->title(); ?>
          </div>
        </div>
      </div>

      <?php if ($article->cover() != "") { ?>
        <img src="<?php echo $article->url() ?>/<?php echo $article->cover()->filename() ?>" class="cover" loading="lazy" height="400" width="400" alt="<?= 'episode ' . $article->slug() . ' : ' . $article->title(); ?>" />
      <?php } else { ?>
        <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" loading="lazy" height="400" width="400" />
      <?php } ?>
    
      <figcaption>
        <summary>
        <h4 class="title">
          <?php if (is_numeric($article->uid())) { echo $article->uid() . ": "; } ?>
          <span><?php echo $article->title() ?></span>
        </h4>
          <p><?php echo excerpt($article->text(), 185) ?></p>
        </summary>
      </figcaption>

    </figure>
  </a>
<?php } else { ?>
  <a href="<?php echo $article->url() ?>" class="no-image" title="<?php echo $article->title() ?>">
    <h3><?php echo $article->title() ?></h3>
    <span class="disqus-comment-count" data-disqus-identifier="<?php echo $article->uri(); ?>"></span>
  </a>
<?php } ?>