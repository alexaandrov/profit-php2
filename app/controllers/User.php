<?php

namespace App\Controllers;

use App\MultiException;

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

    protected function actionCreate()
    {
        if (! empty($_POST)) {
            $values = [
                'firstName' => $_POST['firstName'],
                'lastName'  => $_POST['lastName'],
                'email'     => $_POST['email']
            ];
        } else {
            $values = [];
        }
        var_dump($values);
        try {
            $user = new \App\Models\User();
            $user->fill($values);
            $this->view->status = $user->insert();
        } catch (MultiException $e) {
            $this->view->errors = $e;
        }
        $this->view->title = 'Create user';
        $this->view->display($this->viewPath . 'create.php');
    }
}