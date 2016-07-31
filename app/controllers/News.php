<?php

namespace App\Controllers;

class News extends Controller
{
    protected $viewPath = __DIR__ . '/../views/news/';

    protected function actionIndex()
    {
        $this->view->title = 'News';
        $this->view->news = \App\Models\News::FindAll();
        $this->view->display($this->viewPath . 'index.php');
    }

    protected function actionView()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 1;
        }
        $this->view->title = 'One news';
        $this->view->article = \App\Models\News::FindById($id);
        $this->view->display($this->viewPath . 'view.php');
    }
}