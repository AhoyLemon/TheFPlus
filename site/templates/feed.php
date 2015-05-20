<?php
echo page('episode')->children()->visible()->sortBy('date', 'desc')->feed(array(
  'title'       => $page->title(),
  'description' => $page->description(),
  'link'        => 'blog',
));
?>