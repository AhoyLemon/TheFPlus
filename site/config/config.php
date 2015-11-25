<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'K2-PRO-a81a3a8225827a2b0ca48316273fc3b4');
c::set('rewrite', true);
c::set('cache', false);
c::set('cache.ignore', array(
  'home',
  'episode',
  'also-made',
  'search',
  'episode/feed',
  'episode/random',
  'find',
  'sitemap',
  'tags',
  'wrote'
));
// valid values: file|memcached|apc
c::set('cache.driver', 'file');
//c::set('ssl',true);
/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

/*
---------------------------------------
Routing
---------------------------------------
*/
c::set('routes', array(
  array(
    'pattern' => 'episode/random',
    'action'  => function() {
    	$page = page('episode')->children('visible')->shuffle()->first();
      //go($page->url());
			return site()->visit($page);
    }
  ),
  array(
    'pattern' => 'episode/100',
    'action'  => function() {
    	//$page = page('episode')->children('visible')->shuffle()->first();
      //go($page->url());
			 header::redirect('/episode/100a', 301);
    }
  )
));