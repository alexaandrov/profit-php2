<?php

require __DIR__ . '/../../autoload.php';

use App\Models\Author;

$authors = Author::findAll();

var_dump($authors);

// ActiveRecord Model
//$users = new User();
//$users->setFirstName('John');
//$users->setLastName('Konel');
//$users->setEmail('kornel@kk.ru');