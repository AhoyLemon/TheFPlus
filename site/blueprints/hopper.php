<?php if(!defined('KIRBY')) exit ?>

title: Hopper
pages: true
files: true
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
  builder:
    label: Hopper
    type: builder
    fieldsets:
      submitteddoc:
        label: Submitted Document
        entry: >
          <div class="document-block"><a href="{{docurl}}" target="_blank">{{title}}</a>, submitted by {{submitter}} {{subdate}}</div>
        fields:
          title:
            label: Title
            type: text
            width: 1/2
            icon: file-text-o
          docurl:
            label: URL
            type: url
            width: 1/2
            icon: link
          submitter:
            label: Submitter
            type: tags
            width: 1/2
            icon: gift
          subdate:
            label: Date Submitted
            type: date
            default: today
            width: 1/4
            format: MM/DD/YY
          recorded:
            label: Recorded 
            type: checkbox
            text: yup
            width: 1/4