<?php

/**
 * Created by PhpStorm.
 * User: Window
 * Date: 26-Apr-17
 * Time: 8:49 PM
 */
namespace vendor\helpers;
Class Request
{
    static function getPost($value = null)
    {
        if ($value == null)
            return $_POST;
        else
            if(isset($_POST[$value]))
                return $_POST[$value];
    }

    static function getGet($value = null)
    {
        if ($value == null)
            return $_GET;
        else
            if(isset($_GET[$value]))
            return $_GET[$value];
    }
    static function getRequest($value = null)
    {
        if ($value == null)
            return $_REQUEST;
        else
            if(isset($_REQUEST[$value]))
                return $_REQUEST[$value];
    }
}