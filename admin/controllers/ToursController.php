<?php
namespace admin\controllers;

use application\models\Pages;
use application\models\Services;
use application\models\Tours;
use vendor\helpers\Functions;
use vendor\helpers\Request;
use vendor\security\Validation;

class ToursController extends AdminController
{

    public function actionIndex()
    {
        $this->page_name = 'Tours Manager';
        if (isset($_GET['search'])) {
            $search = [
                'Toursname' => $_GET['Toursname'],
                'email' => $_GET['email'],
                'status' => $_GET['status'],
            ];
            $model = Tours::model()->search($search);
        } else
            $model = Tours::model()->find();
        $this->render('index', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Tours::model()->findById($id);
        $model->delete();
        $this->redirect('/admin/Tours');
    }

    public function actionUpdate($id)
    {

        $this->page_name = 'Update Tours';
        $model = Tours::model()->findById($id);
        $post = Request::getPost('Tour');
        if (isset($post)) {
            $model->attributes = $post;
            if(isset($post['services'])){
                $model->services = implode(',',$post['services']);
            }
            $model->save();
            $route = 'tours/detail';
            $slug = Functions::friendlyStr($model->name);
            $find_page = Pages::model()->findOne(['route'=>$route,'model_id'=>$model->id]);

            if($find_page){
                $find_page->slug = $slug;
                $find_page->title = $model->name;
                $find_page->save();

            }else{
                $page = new Pages();
                $page->route = $route;
                $page->slug = $slug;
                $page->title = $model->name;
                $page->model_id = $model->id;
                $page->save();
            }
            $base_path = basePath().'/uploads/tours/'.$id;
            if(!file_exists($base_path))
                mkdir("$base_path", 0777);
            if(isset($_FILES['files'])){
                $image = $_FILES['files'];
                // validate image
                if(!empty($image['name']) && !empty($image['name'][0])){
                    $images=[];
                    foreach ($image['tmp_name'] as $key => $item){
                        if(!Validation::ValidateImage($image['name'][$key]))
                            continue;
                        $file_name = rand(1,10000).time().'_'.$image['name'][$key];
                        move_uploaded_file($item,$base_path.'/'.$file_name);
                        $images[]=$file_name;
                    }
                    $images = json_encode($images);
                    $model = Tours::model()->findById($id);
                    if($model->images) {
                        $delete_imgs = json_decode($model->images);
                        foreach ($delete_imgs as $img) {
                            unlink($base_path . '/' . $img);
                        }
                    }
                    $model->images=$images;
                    $model->save();

                }
            }
        }
        $services = Services::model()->find();
        $this->render('update', ['model' => $model,'services'=>$services]);
    }

    public function actionCreate()
    {
        //$model = Tours::model()->findById($id);
        $this->page_name = 'Create Tours';
        $services = Services::model()->find();
        $post = Request::getPost('Tour');

        if (isset($post)) {
            $model = new Tours();
            $model->attributes = $post;
            if(isset($post['services'])){
                $model->services = implode(',',$post['services']);
            }
            $model->save();
            $route = 'tours/detail';
            $slug = Functions::friendlyStr($model->name);
            $find_page = Pages::model()->findOne(['route'=>$route,'model_id'=>$model->id]);
            if($find_page){
                $find_page->slug = $slug;
                $find_page->title = $model->name;
                $find_page->save();
            }else{
                $page = new Pages();
                $page->route = $route;
                $page->slug = $slug;
                $page->title = $model->name;
                $page->model_id = $model->id;
                $page->save();
            }

            $id=$model->id;
            $base_path = basePath().'/uploads/tours/'.$id;
            if(!file_exists($base_path))
                mkdir("$base_path", 0777);
            if(isset($_FILES['files'])){
                $image = $_FILES['files'];
                if(!empty($image['name']) && !empty($image['name'][0])){
                    $images=[];
                    foreach ($image['tmp_name'] as $key => $item){
                        $file_name = rand(1,10000).time().'_'.$image['name'][$key];
                        move_uploaded_file($item,$base_path.'/'.$file_name);
                        $images[]=$file_name;
                    }
                    $images = json_encode($images);
                    $model = Tours::model()->findById($id);
                    $model->images=$images;
                    $model->save();

                }
            }
        }
        $this->render('update',['services'=>$services]);
    }
    public static function beforAction($action, $csrf = false,$post=true,$get=false)
    {
        return parent::beforAction($action, $csrf,$post,$get); // TODO: Change the autogenerated stub
    }
}