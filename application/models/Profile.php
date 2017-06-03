<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 23-Apr-17
 * Time: 11:53 PM
 */
namespace application\models;
use vendor\base\Model;
Class Profile extends Model{
    public function tableName()
    {
        return 'profile';
    }
    public function tableKey()
    {
        return 'id';
    }
    public function tableFields()
    {
        return ['user'=>'',
            'sdtt'=>'',
            'user_id'=>''
        ];
    }
    public function tableRelations()
    {
        return[
            'id'=>array('BELONGS_TO', 'Profile', 'user_id'),
            /*'categories'=>array('MANY_MANY', 'Category',
                'tbl_post_category(post_id, category_id)'),
            'posts'=>array('HAS_MANY', 'Post', 'author_id'),
            'profile'=>array('HAS_ONE', 'Profile', 'owner_id'),*/
        ];
    }
}