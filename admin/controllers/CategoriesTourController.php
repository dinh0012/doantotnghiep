<?php
namespace admin\controllers;

use application\models\Pages;
use application\models\CategoriesTour;
use vendor\helpers\Functions;
use vendor\helpers\Request;

class CategoriesTourController extends AdminController
{
    public function actionIndex()
    {
        $this->page_name = 'CategoriesTour Manager';
        if (isset($_GET['search'])) {
            $search = [
                'CategoriesTourname' => $_GET['CategoriesTourname'],
                'email' => $_GET['email'],
                'status' => $_GET['status'],
            ];
            $model = CategoriesTour::model()->search($search);
        } else
            $model = CategoriesTour::model()->find();
        $this->render('index', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = CategoriesTour::model()->findById($id);
        $model->delete();
        $this->redirect('/admin/CategoriesTour');
    }

    public function actionUpdate($id)
    {
        $this->page_name = 'Update CategoriesTour';
        $model = CategoriesTour::model()->findById($id);

        $post = Request::getPost('CategoriesTour');
        if (isset($post)) {
            $model->attributes = $post;
            $model->save();
            $route = 'categoriestour/detail';
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
            $base_path = basePath().'/uploads/categoriestour/'.$id;
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
                    $model = CategoriesTour::model()->findById($id);
                    if($model->images){
                        $delete_imgs = json_decode($model->images);
                        foreach ($delete_imgs as $img){
                            unlink($base_path.'/'.$img);
                        }
                    }
                    $model->images=$images;
                    $model->save();

                }
            }
        }
        $this->render('update', ['model' => $model]);
    }

    public function actionCreate()
    {
        //$model = CategoriesTour::model()->findById($id);

        $this->page_name = 'Create CategoriesTour';
        $post = Request::getPost('CategoriesTour');
        if (isset($post)) {
            $model = new CategoriesTour();
            $model->attributes = $post;
            $model->save();
            $route = 'categoriestour/detail';
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
            $base_path = basePath().'/uploads/categoriestour/'.$id;
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
                    $model = CategoriesTour::model()->findById($id);
                    $model->images=$images;
                    $model->save();

                }
            }
        }
        $this->render('update');
    }
}