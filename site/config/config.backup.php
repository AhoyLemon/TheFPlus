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
c::set('timezone','US/Central');
c::set('kirbytext.image.figure',false);
c::set('debug', true);
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
//c::set('cache.driver', 'file');
c::set('piwik_token', '9f500520fb01cb61f7580dbaa6bc4a04');
c::set('piwik_baseUrl', 'https://thefpl.us/analytics/');
c::set('piwik_siteId', '1');
c::set('panel.stylesheet', 'assets/css/panel.css');
c::set('panel.session.timeout', 10000); 

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
      $page = page('episode')->children()->visible()->shuffle()->first();
      return site()->visit($page);
    }
  ),
  array(
    'pattern' => 'stickers',
    'action'  => function() {
      return site()->visit('merch/stickers');
    }
  ),
  array(
    'pattern' => 'episode/100',
    'action'  => function() {
      header::redirect('/episode/100a', 301);
    }
  ),
  array(
    'pattern' => 'episode/200',
    'action'  => function() {
      header::redirect('/episode/200a', 301);
    }
  ),
  array(
    'pattern' => 'episode/wctfm',
    'action'  => function() {
      header::redirect('/also-made/wctfm', 301);
    }
  ),
  array(
    'pattern' => 'donate',
    'action'  => function() {
      header::redirect('/contribute/donate', 301);
    }
  ),
  array(
    'pattern' => 'wrote/an-f-plus-live-invitation',
    'action'  => function() {
      header::redirect('/wrote/live-5', 301);
    }
  ),
  array(
    'pattern' => 'live',
    'action'  => function() {
      return go('/find/tag:f%20plus%20live');
    }
  ),
  array(
    'pattern' => 'meet/squiddy-mcennui',
    'action'  => function() {
      return go('/meet/squiddy');
    }
  ),
  array(
    'pattern' => 'meet/travis-ramsey',
    'action'  => function() {
      header::redirect('/meet/moxie-ramsey', 301);
    }
  ),
  array(
    'pattern' => ['24th', 'episode/24th'],
    'action'  => function() {
      return go('/episode/24th-1');
    }
  ),

  array(
    'pattern' => 'also-made/(:any)',
    'action'  => function($slug) {

      $merchSlugs = array(
        'aaron-tank-shirts',
        'internet-jerseys',
        'patches',
        'football-congress-jerseys',
        'posters',
        'logo-mural-shirts',
        'tattoos',
        'buttons',
        'mousepads',
        'magnetic-poetry',
        'prints',
        'paintings',
        'pins',
        'wood-relief-prints',
        'fetish-catchers',
        'hoodie',
        'passports',
        'monster-manual-a-coloring-activity-book',
        'dugouts',
        'magnets',
        'stickers',
        'slap-bracelets'
      );

      if (in_array($slug, $merchSlugs)) {
        header::redirect('/merch/' . $slug, 301);
      } else {
        return site()->visit('also-made/' . $slug);
      }
      
    }
  ),

));