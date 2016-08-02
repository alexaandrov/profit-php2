<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];

$controller = !empty($_GET['controller']) ? $_GET['controller'] : 'Site';
$action = !empty($_GET['action']) ? $_GET['action'] : 'Index';

switch ($controller) {
    case 'Site':
        $controller = new \App\Controllers\Site();
        break;
    case 'News':
        $controller = new \App\Controllers\News();
        break;
    case 'User':
        $controller = new \App\Controllers\User();
        break;
    default:
        $controller = new \App\Controllers\Site();
        break;
}

try {
    $controller->action($action);
} catch (\App\Exceptions\Core $e) {
    echo 'Возникло ислючение приложения';
} catch (\App\Exceptions\Db $e) {
    $logger = new \App\Logger();
    $context[] = $e->getTraceAsString();
    $logger->error($e->getMessage(), $context);
    $view = new \App\View();
    $view->e = $e;
    $view->title = 'Database error';
    $view->display(__DIR__ . '/app/web/templates/db-exception.php');
}

//$controller->action($action);
