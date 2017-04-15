<?php /* メッセージを投稿する */
require_once 'base_class.php';

$database = BaseClass::connect_database();

$database->insert('messages', $_POST);

header("Location: {$_SERVER['HTTP_REFERER']}");
