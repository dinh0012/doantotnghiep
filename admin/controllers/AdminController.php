<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 25-Apr-17
 * Time: 9:18 PM
 */
namespace admin\controllers;
use admin\models\AdminIdentity;
use application\models\User;
use vendor\base\Controller;
use vendor\helpers\Session;
use vendor\web\Application;


class AdminController extends Controller{
    public $page_name;
    public function __construct()
    {
        parent::__construct();
        $login = Session::getState('login');
        if(isset($login) && $login){
            $check = $this->checkUserAccess();
            if(!$check){
                $this->redirect(baseUrlAmin().'/login');
            }
        } else
            $this->redirect(baseUrlAmin().'/login');
    }
    public function checkUserAccess()
    {
        if (Application::$isGuest) {
            return false;
        } else {
            $account = User::model()->findById(Application::$user_id);
            if($account->role == User::SUPER_ADMIN)
            {
                $this->username = $account->email;
                return true;
            }
            else
                return false;
        }
    }
}