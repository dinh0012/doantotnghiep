<?php

namespace vendor\web;
use App;

use vendor\base\Controller;
use vendor\helpers\Request;
use vendor\helpers\Session;

class Application extends BaseApplication
{

   public function __construct($config)
   {
       if(parent::__construct($config)){

           Session::open();
           $username = Session::getState('username');
           $user_id = Session::getState('user_id');
           if(isset($user_id) && isset($username)){
               self::$user_name = $username;
               self::$user_id = $user_id;
               self::$isGuest = false;
           }
           $this->run();

       }
       else
           echo '404';
       /*else         header("Location: /not-found");*/

   }
   public function run(){
       $controllerObject = $this->controller;
       $controllerObject =  self::$defaultapp."\controllers\\".$controllerObject;
      // dd($controllerObject);
       $controllerObject = new $controllerObject();
       if ( !method_exists($controllerObject,$this->action)){
           echo $this->action.' Không tồn tại';
           die();
       }
       $ReflectionMethod =  new \ReflectionMethod($controllerObject, $this->action); //get param of metod
       $params = $ReflectionMethod->getParameters();
       $paramNames = array_map(function( $item ){
           return $item->getName();
       }, $params);
       $param = '';
       if(!empty($paramNames)){
            $i=1;
           foreach ($params as $var){
               if(Request::getGet($var->name))
                   $param = Request::getGet($var->name);
               else
                   if(!empty($this->page_id)) // param = page_id
                       $param = $this->page_id;
           }
       }
        if($controllerObject::beforAction($this->action))
            $controllerObject->{$this->action}($param);
   }

}
