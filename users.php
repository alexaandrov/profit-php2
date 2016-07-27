<?php

use App\Models\User;

require __DIR__ .'/autoload.php';

$users = User::findAll();

include __DIR__ . '/web/templates/users.php';

// ActiveRecord Model
//$users = new User();
//$users->setFirstName('John');
//$users->setLastName('Konel');
//$users->setEmail('kornel@kk.ru');