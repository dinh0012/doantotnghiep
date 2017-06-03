<?php
namespace vendor\security;
use vendor\helpers\Session;

class Csrf
{
    public static $_csrf_token_name = '_token';
    static $_csrf_value = '';
    static $_validate_post = true;
    static $_validate_get = true;

    function __construct($token_get = true,$post=true,$get=true)
    {

        if($token_get){
            self::$_validate_get = $get;
            self::$_validate_post = $post;
            if (!self::validate_token()) {
                die ('Token sai');
            }
        }
    }

    public static function _creatToken()
    {
        $token = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REQUEST_URI'] . time());
        Session::setState('_token', $token);
        return  $token;
    }

    public static function validate_token()
    {
        // Kiểm tra nếu phương thức hiện tại là POST
        if(self::$_validate_post){ // cho phep token phuong thuc post
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (!isset($_POST[self::$_csrf_token_name]) || !Session::checkState(self::$_csrf_token_name)) {
                    return false;
                } else if ($_POST[self::$_csrf_token_name] != Session::getState(self::$_csrf_token_name)) {
                    return false;
                }
            }
        }
        if(self::$_validate_get) {  // cho phep token phuong thuc get
            $uri = $_SERVER['REQUEST_URI'];
            if (strpos($uri, '?')) {
                if (!isset($_GET[self::$_csrf_token_name]) || !Session::checkState(self::$_csrf_token_name)) {
                    return false;
                } else if ($_GET[self::$_csrf_token_name] != Session::getState(self::$_csrf_token_name)) {
                    return false;
                }
            }
        }
        Session::unsetState(self::$_csrf_token_name);
        return true;
    }
    

}