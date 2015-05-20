<?php if(!defined('KIRBY')) exit ?>

title: Cast Member
pages: false
files: true
fields:
  title:
    label: Name
    type:  text
    width:1/2
  job:
    label: Position
    type: text
    width:1/2
  text:
    label: Bio
    type: textarea
  website:
    label: website
    type: url
    width:1/2
  twitter:
    label: twitter
    type: text
    width:1/2
  email:
    label: email
    type: email
    width:1/2
  favorite_episode:
    label: Favorite Episode
    type: number
    width:1/2
  ballpit_account:
    label: ballp.it account
    type: url
    width:1/2
  other_links:
    label: other links (comma separated, NO HTTP)
    type:text
    width:1/2