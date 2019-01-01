<?php if($image = $article->image()) { ?>
  <a class="tile" href="<?php echo $article->url() ?>" title="<?php echo $article->title() ?>">
    <?php if ($article->cover() != "") { ?>
      <img src="<?php echo $article->url() ?>/<?php echo $article->cover()->filename() ?>" class="cover" />
    <?php } else { ?>
      <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" />
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
    </summary>
  </a>
<?php } else { ?>
  <a href="<?php echo $article->url() ?>" class="no-image" title="<?php echo $article->title() ?>">
    <h3><?php echo $article->title() ?></h3>
    <span class="disqus-comment-count" data-disqus-identifier="<?php echo $article->uri(); ?>"></span>
  </a>
<?php } ?>