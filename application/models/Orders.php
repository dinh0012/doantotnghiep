<?php

namespace application\models;

use vendor\base\Model;


Class Orders extends Model{
    public function tableName()
    {
        return 'orders';
    }
    /*public function tableRelations()
    {
        return [
            //'profile'=>array('HAS_ONE', 'Profile', 'user_id'),
            'product' => array('HAS_MANY', 'Product', 'user_id'),
        ];
    }*/

    public static function model($classname = __CLASS__)
    {
        return parent::model($classname);
    }
}