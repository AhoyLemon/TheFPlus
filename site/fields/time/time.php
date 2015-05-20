<?php

class TimeField extends InputField {

  public function __construct() {

    $this->type        = 'text';
    $this->icon        = 'clock-o';
    $this->placeholder = 'time';
  }
}