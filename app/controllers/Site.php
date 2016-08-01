<?php

namespace App\Controllers;

class Site extends Controller
{
    protected $viewPath = __DIR__ . '/../views/site/';

    protected function actionIndex()
    {
        $this->view->title = 'Home';
        $this->view->display($this->viewPath . 'index.php');
    }
}