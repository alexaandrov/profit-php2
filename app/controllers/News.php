<?php

namespace App\Controllers;

use App\View;
use App\Models\News;

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
        $this->view->news = News::FindAll();
        $this->view->display(__DIR__ . '/../views/news.php');
    }
}