<?php 

return function($site, $pages, $page) {

  $query   = get('q');
  $results = $site->search($query, 'title|text|featured_site|music_used');

  return array(
    'query'   => $query,
    'results' => $results, 
  );

};