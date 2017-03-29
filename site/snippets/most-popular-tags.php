<?php $tagcloud = tagcloud(page('episode'), array('limit' => 20)); ?>
<h4 class="popular-tags">most popular tags</h4>
<ul class="tag-cloud">
  <?php foreach($tagcloud as $tag): ?>
    <li>
      <a href="<?php echo $tag->url() ?>">
        <?php echo $tag->name() ?>
      </a>
    </li>
  <?php endforeach ?>
</ul>