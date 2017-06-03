<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 20-Apr-17
 * Time: 11:08 PM
 */
namespace vendor\base;

use vendor\db\Criteria;
use vendor\helpers\Functions;
use vendor\security\Xss;

Class Model extends BaseModel
{

    public function tableName()
    {
        return;
    }

    public function tableRelations()
    {
        return;
    }

    public static function model($classname = __CLASS__)
    {
        if (isset(self::$_models[$classname]))
            return self::$_models[$classname];
        else {
            $model = self::$_models[$classname] = new $classname(null);
            //self::$_criteria = new Criteria($model);
            return $model;
        }
    }

    public final function __get($name)
    {
        //dd($name);
        // return $this->$name;
        switch ($name) {
            case 'tableName':
                return $this->tableName;
                break;
            case 'attributes':
                return $this->attributes;
                break;
            case 'tableFields':
                return $this->tableFields;
                break;
            case 'tableRelations':
                return $this->tableRelations;
                break;
            case 'tableKey':
                return $this->tableKey;
                break;
            case 'id':
                return $this->tableFields[$this->tableKey];
                break;
            case isset($this->tableRelations[$name]):
                if ($this->tableRelations[$name][0] == 'BELONGS_TO') {
                    $linkedName = ucfirst($this->tableRelations[$name][1]);
                    $linkedObj = new $linkedName;
                    $linkedRes = $linkedObj->findById($this->tableFields[$this->tableRelations[$name][2]]);
                    return $linkedRes;
                } elseif ($this->tableRelations[$name][0] == 'HAS_MANY') {
                    $linkedName = ucfirst($this->tableRelations[$name][1]);
                    $linkedObj = new $linkedName;
                    $criteria = new Criteria($linkedObj);
                    $criteria->condition(array($this->tableRelations[$name][2] => array($this->id)));
                    $linkedRes = $linkedObj->findByCriteria($criteria);
                    return $linkedRes;
                } elseif ($this->tableRelations[$name][0] == 'MANY_MANY') {
                    return 'MANY_MANY'; //not implemented yet!
                }
                break;
            case isset($this->tableFields[$name]):
                return $this->tableFields[$name];
                break;
        }
    }


    public final function __set($name, $value)
    {

        //dd(array_key_exists($name, $this->tableColumn));
        //   return $this->$name = $value;
        if(is_string($value)){
            $value = Xss::preventXSS($value);
        }

        switch ($name) {
            case is_array($this->tableFields) && array_key_exists($name, $this->tableFields):
                $this->tableFields[$name] = $value;
                break;
            case is_array($this->tableColumn) && in_array($name, $this->tableColumn):
                $this->tableFields[$name] = $value;
                break;
            case 'attributes':
                foreach ($this->tableColumn as $key => $item) {
                    if (isset($value[$item])) {
                        $value[$item] = Xss::preventXSS($value[$item]);
                        $this->tableFields[$item] = $value[$item];
                        if ($item =='password' && isset($value[$item])) {
                            if ($value['password'] == '' || empty($value['password']))
                                unset($this->tableFields['password']);
                            elseif($value['password'] !== '' && !empty($value['password'])){
                                $this->tableFields['password'] = Functions::encrypting($value['password']);
                            }
                        }
                        if ($value[$item] == '' && $item !== 'password')
                            $this->tableFields[$item] = null;
                    }

                }
                break;
            case is_array($this->tableRelations) && (array_key_exists($name, $this->tableRelations) && is_array($value)):
                if ($this->tableRelations[$name][0] == 'BELONGS_TO') {
                    $linkedName = $this->tableRelations[$name][1];
                    $linkedObj = new $linkedName;

                    //I have to check is the field unique!
                    foreach ($value as $key => $val) {
                        if (array_key_exists($key, $linkedObj->tableFields)) {
                            $linkedObj->tableFields[$key] = $val;
                            $criteria = new Criteria($linkedObj);
                            $criteria->condition(array($key => array($val)));
                        }
                    }
                    $test = $linkedObj->findByCriteria($criteria);
                    if (empty($test)) {
                        $lastId = $linkedObj->save();
                    } else {
                        foreach ($test as $key => $value) {
                            $lastId = $key;
                        }
                    }
                    ///////////////////////////

                    $this->tableFields[$this->tableRelations[$name][2]] = $lastId;
                }
                break;
        }
    }
}