<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 24-Apr-17
 * Time: 9:26 PM
 */
namespace admin\controllers;

use admin\models\AdminIdentity;
use admin\models\AdminLogin;
use vendor\base\Controller;
use vendor\helpers\Request;
use vendor\helpers\Session;
use vendor\web\Application;

class LoginController extends Controller
{
    public function actionIndex()
    {

        if(Application::$isGuest){
            $data ='';
            $this->layout = 'login';
            $post = Request::getPost();
            if(isset($post['AdminLogin'])){
                $model = new AdminLogin();
                $model->attributes = $post['AdminLogin'];
                $login = $model->login();
                if($login === true){
                    $this->redirect(baseUrlAmin());
                }
                else{
                    switch ($login){
                        case AdminIdentity::ERROR_EMAIL_INVALID || AdminIdentity::ERROR_PASSWORD_INVALID;
                            $data = 'Email or password invalid!';
                            break;
                        case AdminIdentity::ERROR_STATUS_NOTACTIV;
                            $data = 'User is inactive!';
                            break;
                        case AdminIdentity::ERROR_STATUS_BAN;
                            $data = 'User has been banned';
                            break;
                    }

                }

            }
            $this->render('index',['data'=>$data]);
        }else
            $this->redirect(baseUrlAmin());

    }
    public function actionLogout()
    {
        if(!Application::$isGuest){
            Session::logout();
            $this->redirect(baseUrlAmin());
        }else
            $this->redirect(baseUrlAmin());

    }
}