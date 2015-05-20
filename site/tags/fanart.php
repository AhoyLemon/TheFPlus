<?php

kirbytext::$tags['fanart'] = array(
  'attr' => array(
    'by'
  ),
  'html' => function($tag) {

    $picture = $tag->attr('fanart');
    $artist  = $tag->attr('by', 'someone');

    return '<figure class="fanart"> <img src="/fanart/' . $picture . '" /> <figcaption>by ' . $artist . '</figcaption></figure>';
  }
);