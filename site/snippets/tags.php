<!-- TAGS -->
<?php if ($page->tags() != "") { ?>
  <div class="info-block episode-tags">
    <!-- <span class="label">Tags:</span> -->
    <ul itemprop="keywords" content="<?php echo $page->tags() ?>">
      <li class="label">TAGS: </li>
      <?php $etags = explode(",", $page->tags()); ?>
      <?php foreach($etags as $etag): ?>
        <?php
          $tagmatches = $site->grandChildren()->filterBy('tags', $etag, ',');
          $x = 0;
          foreach($tagmatches as $tagmatch) { $x = $x+1; }
          $tag = trim($etag);
          if ($tag == "merch") {
            echo '<a href="'.$site->url().'/merch">merch</a>';
          } else if ($x > 1) {
            echo '<a href="'.$site->url().'/find/tag:'. urlencode($tag) .'">'.$tag.'</a>';
          } else {
            echo '<a>'.$tag.'</a>';
          }
        ?>
      <?php endforeach ?>
    </ul>
  </div>
<?php } ?>