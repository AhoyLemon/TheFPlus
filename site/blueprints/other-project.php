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
      website: Website
      merch: Merchandise
      else: Something Else
  date:
    label: Release Date
    type: date
    format: MM/DD/YYYY
    width: 1/4
  time:
    label: Release Time
    type: time
    interval: 1
    width: 1/4
  show_image:
    label: Show image on page?
    type: toggle
    text: yes/no
    width: 1/2
  cast:
    label: Cast
    type: tags
    icon: users
  text:
    label: Item Summary
    type: markdown
  episode_file:
    label: Episode File
    type: url
    placeholder: (if applicable)
    icon: volume-up
    width: 1/2
  github_repo:
    label: GitHub Repo URL
    type: url
    placeholder: (if applicable)
    icon: github
    width: 1/2
  tags:
    label: Project Tags
    lowercase: true
    type: tags
  tweet_intent:
    label: Custom Tweet Intent
    type: url
    placeholder: Use only if you want something different.
    icon: retweet
  bonus_content:
    label: Bonus Content
    type: textarea
    icon: code