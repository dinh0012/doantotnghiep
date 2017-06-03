<?php
namespace application\controllers;
use application\models\CategoriesTour;
use application\models\Tours;
use vendor\base\Controller;

class CategoriestourController extends Controller{
    public function actionDetail($id){

        $this->layout = 'tour';
        $tours = Tours::getTourbyCat($id);
        if($tours){
            $tours = $tours;
        }
        else
            $tours ='';
        $model = CategoriesTour::model()->findById($id);
        $this->render('detail',['model'=>$model,'tours'=>$tours]);
    }
}