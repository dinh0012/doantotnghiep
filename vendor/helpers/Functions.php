<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 25-Apr-17
 * Time: 10:08 PM
 */
namespace vendor\helpers;
class Functions{
    public static function encrypting($value){
        return md5($value);
    }
    public static function friendlyStr($str, $connect = '-')
    {
        $str = strtolower($str);
//                 $file=fopen('D:\test1.txt','w');
//                 fwrite($file,print_r($str ,true));
//                 fclose($file);
        static $replacements = array();
        if (empty($replacements)) {
            $unicode = array(

                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

                'd'=>'đ',

                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

                'i'=>'í|ì|ỉ|ĩ|ị',

                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

                'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

                'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

                'D'=>'Đ',

                'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

                'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

                'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

                'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

                'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

            );
            foreach($unicode as $nonUnicode=>$uni){

                $str = preg_replace("/($uni)/i", $nonUnicode, $str);

            }
        }
        $str = strtr(trim($str), $replacements);
        //$str = strtolower(preg_replace(array('/\'/', '/[^a-zA-Z0-9]+/', '/(^_|_$)/'), array('', "-", ''), $str));
        $str = preg_replace(array('/\'/', '/[^a-zA-Z0-9]+/', '/(^_|_$)/'), array('', "-", ''), $str);

        return trim($str, $connect);
    }

}