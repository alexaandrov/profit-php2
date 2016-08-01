<?php

namespace App\Controllers;

class User extends Controller
{
    protected $viewPath = __DIR__ . '/../views/user/';

    protected function actionIndex()
    {
        $this->view->title = 'User';
        $this->view->users = \App\Models\User::FindAll();
        $this->view->display($this->viewPath . 'index.php');
    }

    protected function actionView()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 1;
        }
        $this->view->title = 'User: ' . $id;
        $this->view->user = \App\Models\User::FindById($id);
        $this->view->display($this->viewPath . 'view.php');
    }
}