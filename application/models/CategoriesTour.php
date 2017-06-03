<?php

namespace application\models;

use vendor\base\Model;


Class CategoriesTour extends Model
{
    public function tableName()
    {
        return 'categories_tour';
    }
    /*public function tableRelations()
    {
        return [
            //'profile'=>array('HAS_ONE', 'Profile', 'user_id'),
            'product' => array('HAS_MANY', 'Product', 'user_id'),
        ];
    }*/

    //de qui get list cat chidrent


    public static function getListCat($parent = 0)
    {
        $model = self::model()->getCatByParent($parent);
        $route = 'categoriestour/detail';
        if ($model) {
            $catetegories = [];
            foreach ($model as $cat) {
                $page = Pages::model()->findOne(['route'=>$route,'model_id'=>$cat->id]);
                $catetegories[$cat->id] = $cat->tableFields;
                $catetegories[$cat->id]['slug'] = $page->slug;
                $chidrent = self::getCatByParent($cat->id);
                if ($chidrent) {
                    $chid_cat = [];
                    foreach ($chidrent as $child) {
                        $catetegories[$cat->id]['chidrent'] = self::getListCat($cat->id);
                    }
                }
            }
            return $catetegories;
        }
    }

    public static function optionCats($model, $option = 0,$level=0)
    {
        if ($option == 0){
            $option = self::getListCat();
            $html ='';
        }

        foreach ($option as $value) {
            echo '<option class="level-'.$level.'" value="' . $value['id'] . '"' . (!empty($model) && $model->parent == $value["id"] ? "selected" : "") . '>' .str_repeat('&nbsp;-', $level) .' ' .
                $value['name']. '</option>';
            if (isset($value['chidrent'])) {

                self::optionCats($model,$value['chidrent'],$level + 1);
            }
        }
    }

    public static function getCatByParent($parent)
    {
        $model = self::model()->find(['parent' => $parent]);
        return $model;
    }
    //laay tat ca cac con cua cat
    public static function getCatChildrent($parent)
    {
        $childrent = self::getCatByParent($parent);
        $return='';
        $return.= $parent.',';
        if($childrent)
        {
            foreach ($childrent as $chid){

                $return.= self::getCatChildrent($chid->id);
            }
        }

        return $return;
    }

    public static function model($classname = __CLASS__)
    {
        return parent::model($classname);
    }
}