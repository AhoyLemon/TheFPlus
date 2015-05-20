<?php if(!defined('KIRBY')) exit ?>

title: Blog Posts
pages:
  template:
    - blog
files: true
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea