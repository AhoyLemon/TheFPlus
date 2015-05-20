<?php if(!defined('KIRBY')) exit ?>

title: Person
pages: false
files: true
fields:
  title:
    label: Name
    type: text
    width:1/2
  role:
    label: Role
    type: select
    required: true
    width:1/2
    options:
      regular: Regular Cast
      guest: Guest Reader
      submitter: Content Submitter
  job:
    label: Position
    type: text
    icon: suitcase
    width:1/2
  website:
    label: website
    type: url
    width:1/2
  text:
    label: Bio
    icon: align-left
    type: textarea
  twitter:
    label: twitter
    type: text
    icon: twitter
    placeholder: without @
    width:1/2
  email:
    label: email
    type: email
    width:1/2
  favorite_episode:
    label: Favorite Episode(s) (comma separated, up to 3)
    type: text
    placeholder: # only
    icon: star
    width:1/2
  ballpit_account:
    label: ballp.it account
    type: url
    width:1/2