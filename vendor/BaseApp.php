<?php
namespace vendor;

use vendor\helpers\Session;

class BaseApp
{

    public static $root ;

    public static $app ='frontend';
    public static $container;


    public static function autoload($className)
    {
        $root = str_replace(__NAMESPACE__,'',__DIR__); //get root dir
        self::$root = $root;
      if (strpos($className, '\\') !== false) {
            $classFile = $root.str_replace('\\', '/', $className) . '.php';
        //  dd(static::$classMap);
            if ($classFile === false || !is_file($classFile)) {
                return;
            }
        } else {
            echo '404';
        }

       // dd($classFile);
        include($classFile);
        if (!class_exists($className, false) && !interface_exists($className, false) && !trait_exists($className, false)) {
            throw new \Exception("Unable to find '$className' in file: $classFile. Namespace missing?");
        }
    }

}
