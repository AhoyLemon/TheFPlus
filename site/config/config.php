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
		// SITEMAP
		[
			'pattern' => [ 'sitemap.xml', 'sitemap' ],
			'method' => 'GET',
			'action'  => function () {
					return site()->index()->listed()->limit(800)->sitemap(['images' => true]);
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
];
