<?php

return [
	'debug' => true,
	'yaml.handler' => 'symfony',
	'content' => [
		// make the media tokens independent from the instance
		// otherwise the global _media CDN directory won't work
		'salt' => 'demodemo'
	],
	'panel' => [
		'vue' => [
			'compiler' => false
		]
	],
	'thumbs' => [
		'driver' => 'gd',
		'format' => 'webp'
	],
	'updates' => [
		'plugins' => [
			'getkirby/*'  => false
		]
	],
	'routes' => [

		// SITEMAP
		[
			'pattern' => [ 'sitemap.xml', 'sitemap' ],
			'method' => 'GET',
			'action'  => function () {
					return site()->index()->listed()->limit(800)->sitemap(['images' => true]);
			}
		],

		// EPISODE FEED
		[
			'pattern' => 'episode/feed',
			'action'  => function () {
				$episodes = site()->find('episode')->children()->listed()->sortBy('date', 'desc');
				$feedTitle = 'Episodes';
				$feedLink = url('episode');
				$feedDescription = 'The latest updates from the episodes.';
				return new Kirby\Cms\Response(
					snippet('rss', [
						'episodes' => $episodes,
						'feedTitle' => $feedTitle,
						'feedLink' => $feedLink,
						'feedDescription' => $feedDescription
					], true),
					'text/xml'
				);
			}
		],
		
		// ADJUDICATED GUESS FEED
		[
			'pattern' => 'guess/feed',
			'action'  => function () {
				$episodes = site()->find('guess')->children()->listed()->sortBy('date', 'desc');
				$feedPage = site()->find('guess')->find('feed');
				$feedTitle = 'Guess';
				$feedLink = url('guess');
				$feedDescription = 'The latest updates from the guess.';
				return new Kirby\Cms\Response(
					snippet('rss-guess', [
						'episodes' => $episodes,
						'feedTitle' => $feedPage->title(),
						'feedLink' => $feedPage->url(),
						'feedDescription' => $feedPage->text()
					], true),
					'text/xml'
				);
			}
		],

		// COVER-IMAGE FILE SERVING – clean, stable asset URLs
		// The coverImage() page method generates URLs like /episode/415/ep415.jpg.
		// This route intercepts those requests, finds the file via the Kirby page
		// tree, and streams it directly – bypassing the media-token system so the
		// URL is permanent regardless of content edits.
		//
		// Pattern: any path whose final segment contains a dot (i.e. has an extension).
		// Requests that don't resolve to a known page file fall through to Kirby's
		// normal routing (returning null continues route matching).
		[
			'pattern' => '(:all)',
			'action'  => function (string $path) {
				// Split off the last path component as the candidate filename.
				$lastSlash = strrpos($path, '/');
				if ($lastSlash === false) {
					return null; // top-level slug, not a file
				}

				$filename = substr($path, $lastSlash + 1);
				$pagePath = substr($path, 0, $lastSlash);

				// Only act on paths that look like files (have an extension).
				if (strpos($filename, '.') === false) {
					return null;
				}

				// Find the parent page and the file within it.
				$parentPage = page($pagePath);
				if (!$parentPage) {
					return null;
				}

				$file = $parentPage->file($filename);
				if ($file && file_exists($file->root())) {
					header('Content-Type: '   . $file->mime());
					header('Content-Length: ' . filesize($file->root()));
					header('Cache-Control: public, max-age=31536000, immutable');
					header('Last-Modified: '  . gmdate('D, d M Y H:i:s', filemtime($file->root())) . ' GMT');
					readfile($file->root());
					exit;
				}

				return null; // file not found – fall through to 404
			}
		],
		
		[
			'pattern' => '(:all).(html|yml|txt)',
			'action'  => function ($path, $type) {
				if ($page = page($path)) {
					// set all template vars for the page
					$page->render();

					$templates = [
						'yml'  => 'blueprint',
						'html' => 'template',
						'txt'  => 'content'
					];

					// render a different template
					return kirby()->template($templates[$type])->render([
						'example' => $page->parents()->count() ? $page->parents()->last()->slug() : $page->slug(),
						'page'    => $page
					]);
				}
			}
		],
		
	],
	'sylvainjule.locator' => [
		'tiles' => 'voyager',
	],
	'whoops' => true
];
