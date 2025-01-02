<?xml-stylesheet type="text/xsl" href="<?= $site->url(); ?>/assets/xsl/stan.xsl"?>
<rss 
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:podcast="https://podcastindex.org/namespace/1.0"
	version="2.0">
<channel>
<title>The F Plus</title>
<link>https://thefpl.us</link>
<language>en-us</language>
<copyright>2009 - <?php echo date("Y") ?> Creative Commons CC BY-SA</copyright>
<description><?php echo $site->description() ?></description>

<image>
	<url>https://thefpl.us/podcasts/logo_144.png</url>
	<title>The F Plus</title>
	<link>https://thefpl.us</link>
</image>

<itunes:subtitle>Terrible things read with enthusiasm.</itunes:subtitle>	
<itunes:author>The F Plus</itunes:author>
<itunes:summary><?php echo $site->description() ?></itunes:summary>
<itunes:type>episodic</itunes:type>
<itunes:owner>
	<itunes:name>Lemon</itunes:name>		
	<itunes:email>lemon@thefpl.us</itunes:email>
</itunes:owner>
<itunes:category>Comedy</itunes:category>
<itunes:explicit>true</itunes:explicit>
<itunes:image href="https://thefpl.us/podcasts/logo5.png" />
<podcast:funding url="https://thefpl.us/contribute/donate">Donate via PayPal</podcast:funding>
<podcast:license>CC-BY-NC-4.0</podcast:license>

<generator><?php echo c::get('feed.generator', 'Kirby') ?></generator>
<?php $itemCount = 0; ?>
<?php foreach($items as $item): ?>
	<?php 
	if (strpos($item->featured_site(),',') !== false) {
		$multisite = true;
		$fsites = explode(",", $item->featured_site()); 
	} else if ($item->featured_site() != '') {
		$multisite = false;
	}
	$songs = explode(",", $item->music_used());
	$persons = explode(",", $item->cast());
	$desc = strip_tags($item->text()->kirbytext());
	?>
	<?php if ($item->episode_file() != "") { ?>
		<?php $itemCount++; ?>
		
		<item>
			<title><?php echo $item->uid() ?>: <?php echo xml($item->title()) ?></title>
			<link><?php echo xml($item->url()); ?></link>
			<guid><?php echo xml($item->url()); ?></guid>
			<pubDate><?php echo $item->date('D, d M Y') ?> <?php echo $item->time('H:i') ?>:00 CST</pubDate>
			<enclosure url="https://thefpl.us/podcasts/<?php echo $item->episode_file() ?>" length="<?php echo $item->file_size(); ?>000000" type="audio/mpeg"></enclosure>
			<description>
				<?php echo $desc; ?>
			</description>
<?php if ($item->cast()->isNotEmpty()) { ?>
	<?php $persons = explode(",", $item->cast()); ?>
	<?php foreach($persons as $person): ?>
		<?php $mlink = 'meet/'.strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $person))); ?>
		<?php if ($site->find($mlink)) { ?>
			
			<podcast:person href="<?= $site->find($mlink)->url() ?>" avatar="<?= $site->find($mlink)->image()->url() ?>" role="<?= $person == 'Lemon' ? 'Host' : 'Guest' ?>"><?= $person ?></podcast:person>
		<?php } else { ?>
			<podcast:person role="Guest"><?= $person ?></podcast:person>
		<?php } ?>
	<?php endforeach ?>
<?php } ?>
<?php if ($item->transcript()->isNotEmpty()) { ?>
			<podcast:transcript url="https://thefpl.us/podcasts/transcripts/<?= $item->transcript() ?>" type="text/vtt" language="en" rel="captions" />
<?php } ?>

			<content:encoded>
<?php 
	echo '<![CDATA[
';

///////////////////////////////
// CAST
if ($item->cast()->isNotEmpty()) {
	echo "<p>with:
";
	foreach($persons as $person) {
		$clink = strtolower(preg_replace('/\s+/', '-', str_replace("'", "", $person)));
		echo '	<a href="https://thefpl.us/meet/'.$clink.'">'.$person.'</a>
';
	}
	echo "</p>
";
}
///////////////////////////////////////
// FEATURED SITE(S)
if ($item->featured_site()->isNotEmpty()) {
	echo "<p>reading: 
";
	if ($multisite == true) {
		foreach($fsites as $fsite) {
			echo "	<code>".trim($fsite)."</code>
";
		}
	} else {
		echo "	<code>". trim($item->featured_site())."</code>
";
	}
	echo "</p>
";
}

///////////////////////////////////////
// FEATURED SITE(S)
if ($item->provider()->isNotEmpty()) {
	echo "<p>Content provided by <strong>".$item->provider()."</strong>.</p>
";
}

///////////////////////////////////////
// EDITOR
if ($item->editor()->isNotEmpty()) {
	echo "<p>Edited by <strong>".$item->editor()."</strong>.</p>
";
}

///////////////////////////////////////
// EPISODE DESCRIPTION
echo $item->{$textfield}()->kirbytext();
echo "
";
///////////////////////////////////////
// FEATURED SITE(S)
if ($item->music_used()->isNotEmpty()) {
	echo "<p>Music used:
	<ol>
";
	foreach($songs as $song) {
		echo "		<li>".trim($song)."</li>
";
	}
	echo "	</ol>
</p>
";
}


////////////////////////////////////////////
// CHAPTERS?
if ($item->chapters_toggle() == "yes" && $item->chapters()->isNotEmpty()) {
	if ($item->chapter_provider()->isNotEmpty()) {
		echo "<p>Chapters provided by <strong>".$item->chapter_provider()."</strong></p>
";
	} else {
		echo "<p>This episode has chapters</p>
";
	}
}
?>
]]>
			</content:encoded>
			<itunes:summary><?php echo $desc; ?></itunes:summary>
			<itunes:episode><?= $item->uid(); ?></itunes:episode>
			<itunes:title><?= xml($item->title()) ?></itunes:title>
<?php if (is_numeric($item->uid())) { ?>
			<itunes:episodeType>full</itunes:episodeType>
<?php } else { ?>
			<itunes:episodeType>bonus</itunes:episodeType>
<?php } ?>	
			<itunes:author>The F Plus</itunes:author>
<?php if ($item->featured_site()->isNotEmpty()) { ?>
			<itunes:subtitle>reading <?php echo xml($item->featured_site()) ?></itunes:subtitle>
<?php } else { ?>
			<itunes:subtitle><?php echo excerpt($item->text()->xml(), 100); ?></itunes:subtitle>
<?php } ?>						
			<itunes:duration><?php echo $item->runtime(); ?></itunes:duration>
<?php if ($item->cover() != "") { ?>
			<image><?php echo $item->url() ?>/<?php echo $item->cover()->filename() ?></image>
			<itunes:image href="<?= $item->cover()->toFile()->resize(1400)->url(); ?>" />
<?php } else if($image = $page->image()) { ?>
			<itunes:image href="<?php echo $item->url() ?>/<?php echo $image->filename() ?>" />
<?php } ?>
		</item>
	<?php } ?>
<?php endforeach ?>
	</channel>
</rss>