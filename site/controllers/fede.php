<?php 
return function ($page, $site, $kirby) {
    // do something with the page, site and kirby
    $kirby
    ->response()
    ->code(202)
    ->header('Content-Type', 'text/xml; charset=UTF-8')
    ->header('Vary','Accept-Encoding')
    ->header('x-foo', 'bar');
};