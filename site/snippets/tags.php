<!-- TAGS -->
<?php if ($page->tags() != "") { ?>
  <div class="info-block episode-tags">
    <ul itemprop="keywords" content="<?php echo $page->tags() ?>">
      <li class="label">TAGS: </li>
      <?php $etags = explode(",", $page->tags()); ?>
      <?php foreach($etags as $etag): ?>
        <?php
          $tag = trim($etag);
          $tagmatches = $site->grandChildren()->filterBy('tags', $tag, ',');
          $x = $tagmatches->count();
          if ($tag == "merch") {
            echo '<a href="'.$site->url().'/merch">merch</a>';
          } else if ($x > 1) {
            echo '<a href="'.$site->url().'/tags?tag='. urlencode($tag) .'">'.$tag.'</a>';
          } else {
            echo '<a>'.$tag.'</a>';
          }
        ?>
      <?php endforeach ?>
    </ul>
  </div>
<?php } ?>