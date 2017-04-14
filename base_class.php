<?php
require 'vendor/autoload.php';

class BaseClass extends stdclass {
  public $database;
  public $title;
  public $body = '';

  function __construct() {
    $this->database = new medoo(json_decode(file_get_contents('config/database.json'), true));
  }

  public static function connect_database() {
    $database = new medoo(json_decode(file_get_contents('config/database.json'), true));
    return $database;
  }
}
