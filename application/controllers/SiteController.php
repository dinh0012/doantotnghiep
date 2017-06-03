<?php
namespace application\controllers;
use application\models\CategoriesTour;
use application\models\User;
use vendor\base\Controller;
use application\models\Site;
use vendor\db\Criteria;

class SiteController extends Controller{
    public $defautlController = 'Site';
    public function actionIndex(){
       // dd(CategoriesTour::getListCat());
        //$model = User::model()->findById(160);
        $this->render('index');
    }
    public function actionContact(){
        // dd(CategoriesTour::getListCat());
        //$model = User::model()->findById(160);
        $this->render('contact');
    }
}