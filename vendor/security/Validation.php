<?php
namespace vendor\security;

class Validation
{
    public static function ValidateImage($image){
        $exts = array('gif', 'png', 'jpg','jpge');
        $ext_image = explode('.', $image);
        $ext_image = end($ext_image);
        if(in_array($ext_image, $exts)){
            return true;
        }
        return false;
    }
    

}