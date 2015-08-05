<?php if(!defined('KIRBY')) exit ?>

title: Submission Dump
pages: true
files: true
fields:
  title:
    label: Title
    type:  text
  text:
    label: Page Text
    type: textarea
    icon: align-left
  builder:
    label: Rejected Documents
    type: builder
    fieldsets:
      submitteddoc:
        label: Rejected Document
        entry: >
          <div class="document-block"><a href="{{docurl}}" target="_blank">{{title}}</a>, submitted by {{submitter}} {{rejectdate}}</div>
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
          rejectdate:
            label: Date Rejected
            type: date
            width: 1/2
            default: today
            format: MM/DD/YY