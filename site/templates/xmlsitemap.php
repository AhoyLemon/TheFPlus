<?php
// send the right header
header('Content-type: text/xml; charset="utf-8"');

// echo the doctype
echo '<?xml version="1.0" encoding="utf-8"?>';
/* echo  '<?xml-stylesheet type="text/xsl" href="https://gitcdn.xyz/repo/pedroborges/xml-sitemap-stylesheet/master/sitemap.xsl"?>'; */
echo '<?xml-stylesheet type="text/xsl" href="' . $site->url() . '/assets/xsl/pedro.xsl"?>';


/* echo  '<?xml-stylesheet type="text/xsl" href="' . $site->url() . ' /assets/xsl/sitemap.xsl" ?>'; */
	$ignore = array('sitemap', 'error', 'find', 'error/flush');
?>
<urlset
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
  xmlns:xhtml="http://www.w3.org/1999/xhtml"
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  
  <?php foreach($pages->index()->visible() as $p): ?>
    <?php if(in_array($p->uri(), $ignore)) continue ?>
    <url>
      <loc><?php echo html($p->url()) ?></loc>
      <lastmod><?php echo $p->modified('c') ?></lastmod>
      <priority><?php echo ($p->isHomePage()) ? 1 : number_format(0.5/$p->depth(), 1) ?></priority>

      <?php if($p->cover() != "") { ?>
        <image:image>
          <image:loc><?= $p->url(); ?>/<?= $p->cover()->filename(); ?></image:loc>
          <?php if ($p->parent() == "episode") { ?>
            <image:caption>Episode <?= $p->uid(); ?> Cover Image</image:caption>
          <?php } ?>
        </image:image>
      <?php } ?>

    </url>
  <?php endforeach ?>
</urlset>