<?php
namespace admin\controllers;

use application\models\Pages;
use application\models\Departures;
use vendor\helpers\Functions;
use vendor\helpers\Request;

class DeparturesController extends AdminController
{
    public function actionIndex()
    {
        $this->page_name = 'Departures Manager';
        if (isset($_GET['search'])) {
            $search = [
                'Departuresname' => $_GET['Departuresname'],
                'email' => $_GET['email'],
                'status' => $_GET['status'],
            ];
            $model = Departures::model()->search($search);
        } else
            $model = Departures::model()->find();
        $this->render('index', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Departures::model()->findById($id);
        $model->delete();
        $this->redirect('/admin/Departures');
    }

    public function actionUpdate($id)
    {
        $this->page_name = 'Update Departures';
        $model = Departures::model()->findById($id);

        $post = Request::getPost('Service');
        if (isset($post)) {
            $model->attributes = $post;
            $model->save();
        }
        $this->render('update', ['model' => $model]);
    }

    public function actionCreate()
    {
        //$model = Departures::model()->findById($id);
        $this->page_name = 'Create Departures';
        $post = Request::getPost('Departures');
        if (isset($post)) {
            $model = new Departures();
            $model->attributes = $post;
            $model->save();
        }
        $this->render('update');
    }
}