<?php if(!defined('KIRBY')) exit ?>

title: Stats
pages: true
files: true
fields:
  title:
    label: Title
    type:  text
  text:
    label: Page Text
    type: markdown
  bonus_code:
    label: Bonus Content
    placeholder: HTML, CSS and Javascript
    type: textarea
    icon: code