<?php
/**
 * Created by PhpStorm.
 * Services: Window
 * Date: 26-Apr-17
 * Time: 11:27 PM
 */
namespace admin\controllers;

use application\models\Services;
use vendor\helpers\Request;

class ServicesController extends AdminController
{

    public function actionIndex()
    {
        $this->page_name = 'Services Manager';
        if (isset($_GET['search'])) {
            $search = [
                'Servicesname' => $_GET['Servicesname'],
                'email' => $_GET['email'],
                'status' => $_GET['status'],
            ];
            $model = Services::model()->search($search);
        } else
            $model = Services::model()->find();
        $this->render('index', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Services::model()->findById($id);
        $model->delete();
        $this->redirect('/admin/Services');
    }

    public function actionUpdate($id)
    {
        $this->page_name = 'Update Services';
        $model = Services::model()->findById($id);

        $post = Request::getPost('Service');
        if (isset($post)) {
            $model->attributes = $post;
            $model->save();
        }
        $this->render('update', ['model' => $model]);
    }

    public function actionCreate()
    {
        //$model = Services::model()->findById($id);
        $this->page_name = 'Create Services';
        $post = Request::getPost('Service');
        if (isset($post)) {
            $model = new Services();
            $model->attributes = $post;
            $model->save();
        }
        $this->render('update');
    }
}