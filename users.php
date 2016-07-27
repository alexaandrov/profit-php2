<?php

use App\Models\User;
use App\View;

require __DIR__ .'/autoload.php';

$user = new User();

$view = new View();
$view->title = 'Index';
$view->users = User::findAll();
echo $view->render(__DIR__ . '/web/templates/users.php');

// ActiveRecord Model
//$users = new User();
//$users->setFirstName('John');
//$users->setLastName('Konel');
//$users->setEmail('kornel@kk.ru');