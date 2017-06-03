<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 25-Apr-17
 * Time: 9:16 PM
 */
namespace vendor\helpers;


use vendor\BaseApp;
use vendor\web\Application;

class Session extends BaseApp
{
    public function __construct()
    {
        $this->open();
    }

    public static function open()
    {
        session_start();
    }

    public static function setState($key = null, $value)
    {
        if ($key !== null)
            $_SESSION[$key] = $value;
        elseif (is_array($value)) {
            foreach ($value as $key => $item) {
                $_SESSION[$key] = $item;
            }
        } else
            $_SESSION[$value] = $value;
    }

    public static function getState($value)
    {
        if (isset($_SESSION[$value]))
            return $_SESSION[$value];
        else
            return;
    }

    public static function destroy()
    {
        session_unset();
        session_destroy();
    }

    public static function unsetState($value)
    {
        unset($_SESSION[$value]);
    }

    public static function checkState($value)
    {
        if (isset($_SESSION[$value]) && !empty($_SESSION[$value])) {
            return $_SESSION[$value];
        } else
            return false;
    }

    public static function login($identity, $duration)
    {
        self::setState('login', true);
        self::setState('username', $identity->username);
        self::setState('user_id', $identity->user_id);
        Application::setUserName($identity->username);
        Application::setUserId($identity->user_id);
        Application::setIsGuest(false);
    }

    public static function logout()
    {
        self::unsetState('login');
        self::unsetState('username');
        self::unsetState('user_id');
        Application::setUserName('');
        Application::setUserId('');
        Application::setIsGuest(true);
    }
}