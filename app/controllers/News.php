<?php

namespace App\Controllers;

use App\View;

class News
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        return $this->$methodName();
    }

    protected function actionIndex()
    {
        $this->view->title = 'News';
        $this->view->news = \App\Models\News::FindAll();
        $this->view->display(__DIR__ . '/../views/news.php');
    }

}