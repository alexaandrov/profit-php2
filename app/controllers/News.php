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
        $id = $_GET['id'];
        $this->view->title = 'News ' . $id;
        $this->view->article = \App\Models\News::FindById($id);
        $this->view->display($this->viewPath . 'view.php');
    }
    
    protected function actionDelete()
    {
        $this->view->status = \App\Models\News::deleteById($_GET['id']);
        $this->actionIndex();
    }
}