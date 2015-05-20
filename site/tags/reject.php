<?php

kirbytext::$tags['reject'] = array(
  'attr' => array(
    'link',
    'by',
    'meet',
    'date'
  ),
  'html' => function($tag) {
    $doc = $tag->attr('reject');
    $link  = $tag->attr('link');
    $by = $tag->attr('by');
    $meet = $tag->attr('meet');
    $meetlink = strtolower(preg_replace('/\s+/', '-', $by));
    $date = $tag->attr('date');
    $html = '<li class="reject">';
    if ($link != "") {
      $html .= '<a class="doc-link" href="' . $link . '" target="_blank">';
    }
    $html .= $doc;
    if ($link != "") {
      $html .= '</a>';
    }
    $html .= '<span class="submitted-by">';
    if ($meet == "yes") {
      $html .= '<a class="meet-link" href="/meet/' . $meetlink .'">';
    }
    $html .= $by;
    if ($meet == "yes") {
      $html .= '</a>';
    }
    $html .= '</span>';
    if ($date != "") {
      $html .= '<time class="public-date">';
      $html .= date("F jS, Y", strtotime($date)); 
      $html .= '</time>';
    }
    $html .= '</li>';
    return $html;
    //return '<li class="reject"><a class="doc-link" href="' . $link . '" target="_blank">' . $doc . '</a>, submitted by <a class="submitter-link" href="/meet/' . $meetlink . '">' . $by . '</a></li>';
  }
);