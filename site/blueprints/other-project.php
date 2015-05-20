<?php if(!defined('KIRBY')) exit ?>

title: Other Project
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
    width: 1/2
  category:
    label: Category
    type: select
    width: 1/2
    options:
      qe: Quite Exasperating
      irregular: Irregular
      wrongest: The Wrongest Words
      else: Something Else
  date:
    label: Release Date
    type: date
    format: MM/DD/YYYY
    width: 1/2
  time:
    label: Release Time
    type: time
    interval: 1
    width:1/2
  cast:
    label: Cast
    type: tags
    lowercase:true
    icon: users
  show_image:
    label: Show image on page?
    type: toggle
    text: yes/no
    width:1/2
  episode_file:
    label: Episode File
    type: url
    icon: volume-up
    width:1/2
  text:
    label: Item Summary
    type: textarea
    icon: align-left
  tags:
    label: Project Tags
    lowercase:true
    type: tags
  bonus_content:
    label: Bonus Content
    placeholder: Raw HTML only, use only if completely necessary
    type:textarea
    icon:code