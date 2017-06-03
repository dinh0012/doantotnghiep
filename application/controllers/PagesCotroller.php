<?php
namespace application\controllers;
use application\models\Pages;
use vendor\base\Controller;

class PagesController extends Controller{
    public function actionDetail($id){
        $this->layout = 'tour';
        $Pages = Pages::model()->findById($id);
        $newPages = Pages::model()->where('id','<>',$id)->orderBy(['id'=>'DESC'])->limit(9)->get();

        if($Pages){
            $Pages = $Pages;
        }
        else
            $this->redirect('/');

        $this->render('detail',['Pages'=>$Pages,'newPages'=>$newPages]);
    }
    public function actionGetmap($tour_id){
        $tour = Pages::model()->findById($tour_id);
        if($tour){
            echo json_encode(['status'=>'Success',
                'name'=>$tour->name,
                'lat'=>$tour->lat,
                'lng'=>$tour->lng,
            ]);
        }
        else{
            echo json_encode(['status'=>'Error']);
        }
    }
}