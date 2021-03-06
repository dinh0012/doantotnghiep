<?php
namespace application\controllers;
use application\models\Tours;
use vendor\base\Controller;

class ToursController extends Controller{
    public function actionDetail($id){
        $this->layout = 'tour';
        $tours = Tours::model()->findById($id);
        $newtours = Tours::model()->where('id','<>',$id)->orderBy(['id'=>'DESC'])->limit(9)->get();

        if($tours){
            $tours = $tours;
        }
        else
            $this->redirect('/');

        $this->render('detail',['tours'=>$tours,'newtours'=>$newtours]);
    }
    public function actionGetmap($tour_id){
        $tour = Tours::model()->findById($tour_id);
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
    public static function beforAction($action, $csrf = false,$post=true,$get=false)
    {
        return parent::beforAction($action, $csrf,$post,$get); // TODO: Change the autogenerated stub
    }
}