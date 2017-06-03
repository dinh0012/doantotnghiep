<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 19-Apr-17
 * Time: 12:14 AM
 */
function d($var,$caller=null)
{
    if(!isset($caller)){
        $caller = array_shift(debug_backtrace(1));
    }
    echo '<code>File: '.$caller['file'].' / Line: '.$caller['line'].'</code>';
    echo '<pre>';
    vendor\helpers\VarDumper::dump($var, 10, true);
    echo '</pre>';
}

/**
 * Debug function with die() after
 * dd($var);
 */
function basePathAmin(){
    return basePath().'/admin/';
}

function basePath(){
    $path = $_SERVER['DOCUMENT_ROOT'];
    return $path;
}
function baseUrlAmin(){
    return baseUrl().'/admin';
}
function baseUrl(){
    $url = $_SERVER['SERVER_NAME'];
   // $url = str_replace('common\config','',$path);
    return 'http://'.$url;
}
function dd($var,$die = true)
{
    echo '<pre>';
    vendor\helpers\VarDumper::dump($var, 10, true);
    echo '</pre>';
    if($die)
    die();
}