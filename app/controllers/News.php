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

    protected function actionUpdate()
    {
        $id = $_GET['id'];
        $model = \App\Models\News::findById($id);
        
        $this->view->title = 'Edit news ' . $id;
        if (empty($_POST)) {
            $this->view->article = \App\Models\News::FindById($id);
            $this->view->display($this->viewPath . 'update.php');
        } else {
            $model->setTitle($_POST['title']);
            $model->setText($_POST['text']);
            $this->view->status = $model->update();
            $this->view->article = \App\Models\News::FindById($id);
            $this->view->display($this->viewPath . 'update.php');
        }
    }

    protected function actionDelete()
    {
        $this->view->status = \App\Models\News::deleteById($_GET['id']);
        $this->actionIndex();
    }
}