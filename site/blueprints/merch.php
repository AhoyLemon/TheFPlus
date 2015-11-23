<?php if(!defined('KIRBY')) exit ?>

title: Merchandise
pages: true
files: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Intro the page
    type: textarea
    icon: align-left
  merch:
    label: Additional Merch
    type: structure
    entry: >
      {{url}}
    fields:
      url:
        label: Relative URL (no thefpl.us)
        type: text