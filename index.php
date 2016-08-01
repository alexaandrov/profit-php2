<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];

$controller = !empty($_GET['controller']) ? $_GET['controller'] : 'News';
$action = !empty($_GET['action']) ? $_GET['action'] : 'Index';


switch ($controller) {
    case 'News':
        $controller = new \App\Controllers\News();
        break;
    case 'User':
        $controller = new \App\Controllers\User();
}

$controller->action($action);
