<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];

$action = !empty($_GET['action']) ? $_GET['action'] : 'Index';

$controller = new \App\Controllers\News();
$controller->action($action);
