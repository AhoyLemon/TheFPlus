<?php
echo $site->find('episode')->children()->listed()->sortBy('date', 'desc')->feed(array(
  'title'       => $page->title(),
  'description' => $page->description(),
  'link'        => 'blog',
));
?>