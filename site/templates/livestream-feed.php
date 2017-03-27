<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$data = $page->parent();
$json = array();

$json[] = array(

  'title'                => (string)$data->title(),
  'logo'                 => (string)$data->livestream_logo(),
  'iframe_url'           => (string)$data->iframe_url(),
  'current_doc'          => (string)$data->current_doc(),
  'current_doc_url'      => (string)$data->current_doc_url(),
  'current_doc_provider' => (string)$data->current_doc_provider(),
  'current_artist'       => (string)$data->current_artist(),
  'current_readers'      => (string)$data->current_readers(),
  'battle_active'        => (string)$data->battle_active(),
  'battle_query_a'       => (string)$data->battle_query_a(),
  'battle_query_b'       => (string)$data->battle_query_b(),
  'goal_active'          => (string)$data->goal_active(),
  'goal_title'           => (string)$data->goal_title(),
  'goal_max'             => (string)$data->goal_max(),
  'goal_min'             => (string)$data->goal_min(),
  'overlay_active'       => (string)$data->overlay_active(),
  'overlay_text'         => (string)$data->overlay_text()->kirbytext()
);


echo json_encode($json);

?>