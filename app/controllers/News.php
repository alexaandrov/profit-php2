<?php

namespace App\Controllers;

use \App\Models\News as NewsModel;

class News extends Controller
{
    protected $viewPath = __DIR__ . '/../views/news/';

    protected function actionIndex()
    {
        $this->view->title = 'News';
        $this->view->news = NewsModel::FindAll();
        $this->view->display($this->viewPath . 'index.php');
    }

    protected function actionView()
    {
        $id = $_GET['id'];
        $this->view->title = 'News ' . $id;
        $this->view->article = NewsModel::FindById($id);
        $this->view->display($this->viewPath . 'view.php');
    }

    protected function actionUpdate()
    {
        $id = $_GET['id'];
        $model = NewsModel::findById($id);
        
        $this->view->title = 'Edit news ' . $id;
        if (empty($_POST)) {
            $this->view->article = NewsModel::FindById($id);
            $this->view->display($this->viewPath . 'update.php');
        } else {
            $model->setTitle($_POST['title']);
            $model->setText($_POST['text']);
            $this->view->status = $model->update();
            $this->view->article = NewsModel::FindById($id);
            $this->view->display($this->viewPath . 'update.php');
        }
    }

    protected function actionCreate()
    {
        if (empty($_POST)) {
            $this->view->display($this->viewPath . 'create.php');
        } else {
            $this->view->title = "Create news";
            $model = new NewsModel();
            $model->setAuthor($_POST['author_id']);
            $model->setTitle($_POST['title']);
            $model->setText($_POST['text']);
            $this->view->status = $model->insert();
            $this->view->display($this->viewPath . 'create.php');
        }
    }

    protected function actionDelete()
    {
        $this->view->status = NewsModel::deleteById($_GET['id']);
        $this->actionIndex();
    }
}