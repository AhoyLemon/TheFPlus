<?php



kirbytext::$tags['zoompic'] = array(
  'attr' => array(
    'caption'
  ),
  'html' => function($tag) {
    $fileName = $tag->attr('zoompic');
    $picture = $page->file($fileName)->url();
    //$picture = $tag->attr('zoompic')->toFile()->url();
    return '<figure class="fanart"> <img src="' . $picture . '" /></figure>';
  }
);
