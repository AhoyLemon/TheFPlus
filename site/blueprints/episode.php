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
    label: Site(s) featured (comma separated, no HTTP)
    type: text
    icon: globe
    width: 1/2
  date:
    label: Release Date
    type: date
    format: MM/DD/YYYY
    width: 1/4
  time:
    label: Release Time
    type: time
    interval: 1
    width:1/4
  editor:
    label: Editor
    type: tags
    icon: scissors
    width:1/2
  cast:
    label: Cast
    type: tags
    icon: users  
  episode_file:
    label: Episode File
    type: url
    icon: volume-up
    width:1/2
  runtime:
    label: Runtime
    type: text
    placeholder: H:MM:SS
    icon:road 
    width:1/4
  file_size:
    label: File Size (in Mb)
    type: number
    placeholder: (ex 36)
    icon: file-audio-o
    width:1/4
  document_link:
    label: Document Link
    type: url
    icon: file-text-o
    width:1/2
  provider:
    label: Provider
    type: tags
    width: 1/2
    icon:gift
  text:
    label: Episode Summary
    type: textarea
    icon: align-left
  music_used:
    label: Music Used (comma separated)
    type: text
    icon:music
  tags:
    label: Episode Tags
    lowercase:true
    type: tags
  bonus_content:
    label: Bonus Content
    placeholder: Optional, anything here will be under the Additional Content header
    type:textarea
    icon:code