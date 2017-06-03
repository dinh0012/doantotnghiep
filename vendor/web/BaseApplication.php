<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 19-Apr-17
 * Time: 9:52 PM
 */
namespace vendor\web;


use App;
use application\controllers;
use application\models\Pages;
use vendor\db\Connection;

class BaseApplication
{
    public $defaultController = 'site';
    public static $defaultapp = 'application';
    public $controller;
    public $action;
    public $title;
    public $page_id = '';  // page_id model_id
    public $defaulaction = 'index';
    public static $user_id;
    public static $user_name;
    public static $isGuest = true;

    public static function getUserId()
    {
        return self::$user_id;
    }

    public static function getUserName()
    {
        return self::$user_name;
    }

    public static function setUserName($username)
    {
        self::$user_name = $username;
    }

    public static function setIsGuest($value)
    {
        self::$isGuest = $value;
    }

    public static function setUserId($id)
    {
        self::$user_id = $id;
    }

    public function __construct($config)
    {
        new Connection($config['db']);
        $uri = strtok($_SERVER["REQUEST_URI"], '?');
        if (isset($_SERVER['REDIRECT_URL'])) {


            $slug = $_SERVER['REDIRECT_URL'];
            $slug = str_replace('/', '', $slug);
            $page = Pages::model()->findOne(['slug' => $slug]);
            if ($page) { //neeu slug cos trong page table
                $route_arr = explode('/', $page->route);
                $controller = ucfirst($route_arr[0]) . 'Controller';
                $action = 'action' . ucfirst($route_arr[1]);
                $this->page_id = $page->model_id;
                $this->title = $page->title;
            }
        }
        $array_uri = explode('/', $uri);
        if (strpos($uri, 'admin') !== false) {  //check url admin
            self::$defaultapp = 'admin';
            $controller_uri = $array_uri[2];
            $action_uri = isset($array_uri[3]) ? $array_uri[3] : '';
        } else {
            $controller_uri = $array_uri[1];
            $action_uri = isset($array_uri[2]) ? $array_uri[2] : '';
        }
        if (empty($controller_uri) || $controller_uri == '')
            $controller_uri = $this->defaultController;
        if (empty($action_uri) || $action_uri == '')
            $action_uri = $this->defaulaction;
        $action_uri = 'action' . ucfirst($action_uri);
        $controller_uri = ucfirst($controller_uri) . 'Controller';
        foreach ($config['routes'] as $key => $item) {
            if ($key == $uri) {
                $arr = explode('@', $item);
                $controller = ucfirst($arr[0]) . 'Controller';
                $action = 'action' . ucfirst($arr[1]);
                break;
            }
        }

        if (isset($controller) && isset($action)) {
            return $this->checkUrl($controller, $action);
        }
        if (isset($action_uri) && isset($controller_uri)) {
            return $this->checkUrl($controller_uri, $action_uri);
        }
    }

    public function checkUrl($controller, $action)
    {
        if (!file_exists(App::$root . self::$defaultapp . '/controllers/' . $controller . '.php'))
            return false;
        //require_once $this->defaultapp.'/controllers/' . $controller . '.php';
        $this->controller = $controller;
        $this->action = $action;
        return true;
    }


}