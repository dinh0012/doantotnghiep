<?php
namespace vendor\base;
use vendor\security\Csrf;
use vendor\web\Application;


abstract Class Controller{
    private $__content = array();
    public $layout = 'main' ;
    private $__controller;
    public function __construct()
    {
        $this->setController();
    }

    public function render($view, $data = array())
    {
        //dd(APPLICATION_PATH.'/views/'.strtolower(str_replace('Controller','',$this->getController()))  . $view . '.php');
        // Chuyển mảng dữ liệu thành từng biến
        extract($data);
        // Chuyển nội dung view thành biến thay vì in ra bằng cách dùng ab_start()
        //dd(basePath().Application::$defaultapp.'/views/'.strtolower(str_replace('Controller','',$this->getController())).'/'  . $view . '.php');
        if(!file_exists(basePath().'/'.Application::$defaultapp.'/views/'.strtolower(str_replace('Controller','',$this->getController())).'/'  . $view . '.php'))
        {
            echo 'File view "'.$view.'" not found';
            die();
        }
        ob_start();
            require_once  basePath().'/'.Application::$defaultapp.'/views/'.strtolower(str_replace('Controller','',$this->getController())).'/'  . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();
        ob_start();
        require_once  basePath().'/'.Application::$defaultapp. '/views/layouts/' . $this->layout . '.php';
        $content = ob_get_contents();
        ob_end_clean();
        // Gán nội dung vào danh sách view đã load
        $this->__content[] = $content;
        foreach ($this->__content as $html){
            echo $html;
        }
    }
    public function show()
    {
        foreach ($this->__content as $html){
            echo $html;
        }
    }
    protected function redirect($path)
    {
        header("Location:".$path);
    }
    public function getController()
    {
        return $this->__controller;
    }
    public static function beforAction($action,$csrf=true,$post=true,$get=true)
    {

        new Csrf($csrf,$post,$get);
        return true;
    }

    public function setController()
    {
        $controller = get_class($this); //get class
        $controller = explode('\\',$controller);
        $this->__controller = end($controller);
    }
}