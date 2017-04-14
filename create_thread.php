<?php /* スレッドを作成する */
require_once 'base_class.php';

$database = BaseClass::connect_database();

$database->insert('threads', $_POST);

header("Location: http://{$_SERVER['SERVER_ADDR']}:{$_SERVER['SERVER_PORT']}/board");
