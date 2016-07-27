<?php

require __DIR__ . '/../../autoload.php';

use App\Models\User;
use App\View;

$view = new View();
$view->title = 'Users';
$view->users = User::findAll();

echo $view->render(__DIR__ . '/../views/users.php');