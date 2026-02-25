<?php

require __DIR__ . '/kirby/bootstrap.php';

$kirby = new Kirby;

// authenticate as almighty
$kirby->impersonate('kirby');

foreach (page('fanart')->images() as $image) {

  try {
      $image->update([
        'template' => 'fanimage'
      ]);
      echo 'The meta info has been updated';
  } catch (Exception $e) {
      echo $e->getMessage();
  }

}