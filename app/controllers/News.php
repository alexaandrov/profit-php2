<?php

namespace App\Controllers;

use App\View;

class News extends Controller
{
    protected function actionIndex()
    {
        $this->view->title = 'News';
        $this->view->news = \App\Models\News::FindAll();
        $this->view->display(__DIR__ . '/../views/news.php');
    }

    protected function actionOne()
    {
        if (! empty($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 1;
        }
        $this->view->title = 'One news';
        $this->view->article = \App\Models\News::FindById($id);
        $this->view->display(__DIR__ . '/../views/one-news.php');
    }
}