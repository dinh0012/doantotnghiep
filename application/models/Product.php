<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 23-Apr-17
 * Time: 11:53 PM
 */
namespace application\models;
use vendor\base\Model;
Class Product extends Model{
    public function tableName()
    {
        return 'product';
    }
    public function tableKey()
    {
        return 'id';
    }
    public function tableFields()
    {
        return ['name'=>'',
            'code'=>'',
            'price'=>'',
            'description'=>'',
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