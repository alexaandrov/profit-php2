<?php

use App\Models\User;
use App\View;

require __DIR__ .'/autoload.php';

$view = new View();
$view->title = 'Users';
$view->users = User::findAll();

echo $view->render(__DIR__ . '/web/templates/users.php');