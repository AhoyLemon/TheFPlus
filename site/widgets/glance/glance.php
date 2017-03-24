<?php

  global $site;
  $site = site();

return array(
  'title' => 'At a glance',
  'options' => array(
      array(
        'text' => 'Visit Site',
        'icon' => 'eye',
        'link' => $site->url(),
        'target' => '_blank'
      )
    ),
  'html' => function() {

    global $site;
/*  $site = kirby()->site(); // $site must be global in order to place it in the link-options */
    $count_chapters = $site->pages()->count();
    $count_pages = $site->index()->count();
    $count_files = $site->index()->files()->count();
    $count_images = $site->index()->files()->filterBy('type', 'image')->count();
    //$count_documents = $site->index()->files()->filterBy('type', 'document')->count();
    $count_users = $site->users()->count();

/*  $count_subpages = $site->grandchildren()->count(); // not needed, yet.. */

  	return  "<style>
              #glance-widget td {
                padding: 0 .75em .25em 0;
              }

              #glance-widget tr td:first-of-type {
                color: #555;
              }

              #glance-widget tr td.indent {
                text-indent: .5em;
                color: #999;
              }
            </style>".

            "<table>".
              "<tr><td>Sections</td><td><b>$count_chapters</b></td></tr>".
              "<tr><td class=\"indent\">Pages</td><td><b>$count_pages</b></td></tr>".
              "<tr><td>Files</td><td><b>$count_files</b></td></tr>".
              "<tr><td class=\"indent\">Images</td><td><b>$count_images</b></td></tr>".
              //"<tr><td class=\"indent\">Documents</td><td><b>$count_documents</b></td></tr>".
              "<tr><td>Users</td><td><b>$count_users</b></td></tr>".
            "</table>";
    }
);

?>