<?php

require __DIR__ . '/autoload.php';

$action = !empty($_GET['action']) ? $_GET['action'] : 'Index';

$controller = new \App\Controllers\News();
$controller->action($action);
