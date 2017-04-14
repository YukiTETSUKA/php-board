<?php
require 'vendor/autoload.php';

class BaseClass extends stdclass {
  public $database;
  public $title;
  public $body = '';

  function __construct() {
    $this->database = new medoo((array) json_decode(file_get_contents('config/database.json')));
  }
}
