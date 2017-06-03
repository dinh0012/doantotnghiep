<?php

namespace application\models;

use admin\controllers\ToursController;
use vendor\base\Model;


Class Tours extends Model
{
    public function tableName()
    {
        return 'tours';
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

    public static function optionCats($id_cat, $option = 0, $level = 0)
    {
        if ($option == 0) {
            $option = CategoriesTour::getListCat();
            $html = '';
        }
        foreach ($option as $value) {
            echo '<option class="level-' . $level . '" value="' . $value['id'] . '"' . (!empty($id_cat) && $id_cat == $value["id"] ? "selected" : "") . '>' . str_repeat('&nbsp;-', $level) . ' ' .
                $value['name'] . '</option>';
            if (isset($value['chidrent'])) {

                self::optionCats($id_cat, $value['chidrent'], $level + 1);
            }
        }
    }

    public static function optionDeparture($id)
    {
        $departures = Departures::model()->find();
        foreach ($departures as $value) {
            echo '<option value="' . $value->id . '"' . (!empty($id) && $id == $value->id ? "selected" : "") . '>' .
                $value->name . '</option>';
        }

    }
    public static function getTourbyCat($cat_id)
    {
        $cats = CategoriesTour::getCatChildrent($cat_id);
        $cats = explode(',',$cats);
        array_pop($cats); //bỏ phần tử cuối
        $arr = [];
        $route = 'tours/detail';
        foreach ($cats as $cat){
            $tour[$cat] = Tours::model()->orderBy(['id'=>'DESC'])->find(['category'=>$cat]);
            if($tour[$cat]){
                foreach ($tour[$cat] as $item){
                    $page = Pages::model()->findOne(['route'=>$route,'model_id'=>$item->id]);
                    $item->tableFields['slug']=$page->slug;

                }
            }
            if($tour[$cat])
                $arr = array_merge($arr,$tour[$cat]);
        }
        return $arr;
    }
}