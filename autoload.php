<?php

function my_app_autoload($class)
{
    $filename = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
}

// Добавление автозагрузок в очередь

// Первый способ регистрации автозагрузки с помощью имени функции
spl_autoload_register('my_app_autoload');

// Второй способ неявной регистрации автозагрузки
spl_autoload_register(function($class) {
    $filename = __DIR__ . '/' . str_replace(['\\', 'App'], ['/', 'lib'], $class) . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
});