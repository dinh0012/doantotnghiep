<?php
namespace admin\controllers;
use application\models\Tours;
use vendor\helpers\Request;

class FileController extends AdminController
{
    public function actionUploadImages()
    {
        dd($_POST);
        if (isset($_POST["file"])) {
            // do php stuff
            // call `json_encode` on `file` object
            $file = json_encode($_POST["file"]);
            // return `file` as `json` string
            echo $file;
        }
    }
}