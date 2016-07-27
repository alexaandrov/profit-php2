<?php

require __DIR__ . '/autoload.php';

use App\View;
use App\Models\News;

$view = new View();
$view->title = 'News';
$view->news = News::FindAll();

if (! empty($_GET['id'])) {
    $view->news = News::findById((int)$_GET['id']);
}

$view->display(__DIR__ . '/web/templates/news.php');