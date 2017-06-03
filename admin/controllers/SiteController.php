<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 24-Apr-17
 * Time: 9:26 PM
 */
namespace admin\controllers;

class SiteController extends AdminController{
    public function actionIndex(){

        $this->render('index');
    }
}