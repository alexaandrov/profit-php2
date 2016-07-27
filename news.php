<?php

require __DIR__ . '/autoload.php';

use App\Models\News;

$news = News::findAll();

if (! empty($_GET['id'])) {
    $news = News::findById((int)$_GET['id']);
}

include __DIR__ . '/web/templates/news.php';