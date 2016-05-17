<?php if(!defined('KIRBY')) exit ?>

title: F Plus Episode
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
    width: 1/2
  featured_site:
    label: Site(s) featured
    type: text
    icon: globe
    width: 1/2
    help: Comma separated, no HTTP://
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
  cover:
    label: Cover Image
    type: image
    width: 1/2
  cast:
    label: Cast
    type: tags
    icon: users  
  episode_file:
    label: Episode File
    type: text
    icon: volume-up
    placeholder: (ex fplus_055.mp3)
    width: 1/2
  runtime:
    label: Runtime
    type: text
    placeholder: H:MM:SS
    icon: road 
    width: 1/4
  file_size:
    label: File Size (in Mb)
    type: number
    placeholder: (ex 36)
    icon: file-audio-o
    width: 1/4
  document_link:
    label: Document Link
    type: url
    icon: file-text-o
    width: 1/2
  editor:
    label: Editor
    type: tags
    icon: scissors
    width: 1/4
  provider:
    label: Provider
    type: tags
    width: 1/4
    icon: gift
  text:
    label: Episode Summary
    type: markdown
    icon: align-left
  music_used:
    label: Music Used (comma separated)
    type: text
    icon: music
  tags:
    label: Episode Tags
    lowercase:true
    type: tags
  bonus_content:
    label: Bonus Content
    type: markdown
    icon:code
    help: Optional, anything here will be under the Additional Content header