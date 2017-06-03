<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 26-Apr-17
 * Time: 11:27 PM
 */
namespace admin\controllers;

use application\models\User;
use vendor\helpers\Request;

class UserController extends AdminController
{

    public function actionIndex()
    {
        $this->page_name = 'User Manager';
        if (isset($_GET['search'])) {
            $search = [
                'username' => $_GET['username'],
                'email' => $_GET['email'],
                'status' => $_GET['status'],
            ];
            $model = User::model()->search($search);
        } else
            $model = User::model()->find();
        $this->render('index', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = User::model()->findById($id);
        $model->delete();
        $this->redirect('/admin/user');
    }

    public function actionUpdate($id)
    {
        $this->page_name = 'Update User';
        $model = User::model()->findById($id);
        $post = Request::getPost('User');
        if (isset($post)) {
            $model->attributes = $post;
            $model->save();
        }
        $this->render('update', ['model' => $model]);
    }

    public function actionCreate()
    {
        //$model = User::model()->findById($id);
        $this->page_name = 'Create User';
        $post = Request::getPost('User');
        if (isset($post)) {
            $model = new User();
            $model->attributes = $post;
            $model->save();
        }
        $this->render('update');
    }
}