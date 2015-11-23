<?php if(!defined('KIRBY')) exit ?>

title: Blog Post
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
    width: 1/2
  author:
    label: author
    type: text
    icon: user
    width: 1/2
  date:
    label: Publish Date
    type: date
    format: MM/DD/YYYY
    width: 1/2
  time:
    label: Publish Time
    type: time
    width:1/2
  text:
    label: Start writing, fucko!
    type: textarea
    icon: align-left
  tags:
    label: Tags
    type: tags