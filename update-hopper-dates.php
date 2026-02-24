<?php
// update-hopper-dates.php

// bootstrap Kirby so classes like Kirby\Toolkit\Yaml are available
require __DIR__ . '/kirby/bootstrap.php';

use Kirby\Toolkit\Yaml;

$oldPath = __DIR__ . '/content_old/7-submit/3-hopper/hopper.txt';
$newPath = __DIR__ . '/content/7_submit/3_hopper/hopper.txt';

$oldRaw = file_get_contents($oldPath);
$newRaw = file_get_contents($newPath);

$oldItems = Yaml::decode(preg_replace('/^.*?Builder:\s*/s','',$oldRaw));
$newItems = Yaml::decode(preg_replace('/^.*?Builder:\s*/s','',$newRaw));

$map = [];
foreach ($oldItems as $item) {
    if (!empty($item['title'])) {
        $map[$item['title']] = $item['subdate'] ?? '';
    }
}

$changed = false;
foreach ($newItems as &$item) {
    if (isset($item['subdate']) && trim($item['subdate']) === '' && isset($map[$item['title']])) {
        $item['subdate'] = $map[$item['title']];
        $changed = true;
    }
}

if ($changed) {
    $builderYaml = Yaml::encode($newItems, 4);
    $newRaw = preg_replace(
        '/(Builder:\s*\n)([\s\S]*)/m',
        '$1' . $builderYaml,
        $newRaw
    );
    file_put_contents($newPath, $newRaw);
    echo "subdates copied from old file to new file\n";
} else {
    echo "no empty subdates found, nothing to do\n";
}
