<?= '<?xml version="1.0" encoding="utf-8"?>' ?><?php if ($xsl) {
    echo PHP_EOL.'<?xml-stylesheet type="text/xsl" href="/assets/xsl/pedro.xsl" ?>';
} ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        <?php if ($images) { ?>xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"<?php } ?>
        <?php if ($videos) { ?>xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"<?php } ?>
>
  <?php
  // Calculate priorities for all items
  $prioritizedItems = [];
  foreach ($items as $item) {
    $urlPath = parse_url($item->{$urlfield}(), PHP_URL_PATH);
    if ($urlPath !== null) {
      $trimmed = trim($urlPath, '/');
      $depth = ($trimmed === '') ? 0 : substr_count($trimmed, '/') + 1;
    } else {
      $trimmed = '';
      $depth = 0;
    }
    $priority = 1 / pow(2, $depth);
    $prioritizedItems[] = [
      'item' => $item,
      'priority' => $priority,
      'isRoot' => ($trimmed === ''),
      'modified' => $item->modified()
    ];
  }
  // Sort: root first, then by last modified descending
  usort($prioritizedItems, function($a, $b) {
    if ($a['isRoot'] !== $b['isRoot']) {
      return $b['isRoot'] <=> $a['isRoot'];
    }
    return $b['modified'] <=> $a['modified'];
  });
  foreach ($prioritizedItems as $entry) {
    $item = $entry['item'];
    $priority = $entry['priority'];
  ?>
  <url>
    <loc><?= $item->{$urlfield}() ?></loc>
    <priority><?= number_format($priority, 2) ?></priority>
    <lastmod><?= date('c', $item->modified()) ?></lastmod>
    <?php if ($images) {
      $cover = $item->images()->first();
      if ($cover) { ?>
    <image:image>
      <image:loc><?= $cover->url() ?></image:loc>
    </image:image>
    <?php }
    } ?>
    <?php if ($videos) { ?>
    <?php foreach ($item->{$videosfield}() as $video) {
        if ($video) { ?>
    <video:video>
      <?php if ($image->{$videothumbnailfield}()->isNotEmpty()) { ?><video:thumbnail><?= $video->{$videothumbnailfield}() ?></video:thumbnail><?php } ?>
      <?php if ($image->{$videotitlefield}()->isNotEmpty()) { ?><video:title><?= \Kirby\Toolkit\Xml::encode($item->{$videotitlefield}()) ?></video:title><?php } ?>
      <?php if ($image->{$videodescriptionfield}()->isNotEmpty()) { ?><video:description><?= \Kirby\Toolkit\Xml::encode($item->{$videodescriptionfield}()) ?></video:description><?php } ?>
      <?php if (Str::contains($video->{$videourlfield}(), site()->url())) { ?><video:content_loc><?= $video->{$videourlfield}() ?></video:content_loc>
      <?php } else { ?><video:player_loc><?= $video->{$videourlfield}() ?></video:player_loc><?php } ?>
    </video:video>
    <?php }
        } ?>
    <?php } ?>
    </url>
  <?php } ?>
</urlset>
