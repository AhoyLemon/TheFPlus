<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: 
  template:
    - default
    - listing
    - people
    - results
    - blogs
    - page_withbonus
fields:
  title:
    label: Title
    type:  text
  author:
    label: Author
    type:  text
  description:
    label: Description
    type:  textarea
  keywords:
    label: Keywords
    type:  tags
  copyright:
    label: Copyright
    type:  textarea