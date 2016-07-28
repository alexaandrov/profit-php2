<?php

//header("Location: " .'/app/controllers/index.php');

require __DIR__ . '/autoload.php';

$controller = new \App\Controllers\News();
$controller->action('Index');