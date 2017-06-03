<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 20-Apr-17
 * Time: 11:08 PM
 */
namespace vendor\base;

use vendor\db\Criteria;
use vendor\db\Connection;

abstract class BaseModel
{
    protected $tableName;
    protected $tableFields;
    protected $tableColumn;
    protected $tableRelations;
    public $tableKey = 'id';
    protected $result;
    public static $_models;
    public static $_criteria;
    abstract protected function tableName();
    abstract protected function tableRelations();

    public final function __construct()
    {
        $this->tableName = $this->tableName();
        $this->tableRelations = $this->tableRelations();
        $query = \vendor\db\Connection::$dbInstance->prepare("DESCRIBE $this->tableName");
        $query->execute();
        $this->tableColumn = $query->fetchAll(\PDO::FETCH_COLUMN);
    }

    private function isEmpty()
    {
        foreach ($this->tableFields as $field) {
            if (!empty($field)) {
                $isNotEmpty[] = 1;
            } else {
                $isNotEmpty[] = 0;
            }
        }
        if (in_array('1', $isNotEmpty)) {
            return false;
        } else {
            return true;
        }
    }

    private function getResultObjects($result)
    {

        if(is_numeric($result)){
                $this->tableFields[ $this->tableKey] = $result;
            return $this;

        }

        if (!empty($result)) {
            if (!isset($result[0])) {
                foreach ($result as $key => $row) {
                    //foreach ($this->tableFields as $mkey => $mvalue) {
                        $this->tableFields[$key] = $row;
                   // }
                }
                return $this;
            }
            //$obj = [];
           // dd($result);
            foreach ($result as $item){
                $obj=new $this();
               foreach ($item as $key => $value){
                   $obj->tableFields[$key] = $value;
               }
                $modelArr[] = $obj;
            }
            return $modelArr;
            /*foreach ($result as $key => $row) {
                foreach ($modelObj->tableFields as $mkey => $mvalue) {
                    foreach ($row as $rkey => $rvalue) {
                        if ($modelObj->tableName . '_' . $mkey == $rkey) {
                            $modelObj->tableFields[$mkey] = $rvalue;
                        }
                    }
                }
                foreach ($modelObj->tableRelations as $key => $value) {
                    $tmp = ucfirst($value[1]);
                    $relObject = new $tmp;
                    foreach ($relObject->tableFields as $rokey => $rovalue) {
                        foreach ($row as $rkey => $rvalue) {
                            if ($relObject->tableName . '_' . $rokey == $rkey) {
                                $relObject->tableFields[$rokey] = $rvalue;
                            }
                        }
                    }
                    if (!$relObject->isEmpty()) {
                        $modelObj->tableFields[$key] = $relObject;
                    } else {
                        $modelObj->tableFields[$key] = null;
                    }
                }
                $modelArr[] = $modelObj;

            }*/

            /*foreach ($modelArr as $model) {
                foreach ($model->tableRelations as $relName => $relValue) {
                    $subObjArr[$model->id][] = $model->tableFields[$relName];
                }
                $parentModelArr[$model->id] = $model;
            }

            foreach ($subObjArr as $sKey => $sValue) {
                foreach ($parentModelArr as $pKey => $pValue) {
                    if ($pKey == $sKey) {
                        foreach ($pValue->tableRelations as $relName => $relValue) {
                            $pValue->tableFields[$relName] = $sValue;
                        }
                        $finalArr[$pKey] = $pValue;
                    }
                }
            }*/
            ////////////////////////////////////////////////////////////////////////////
        }
        //return $finalArr;
    }


    public final function findById($id = null)
    {
        $data = array();
        $id = intval($id); //lấy dạng so
        if ( isset(Connection::$dbInstance)) {
            $criteria = new Criteria($this);
            $criteria->condition(array($this->tableKey => $id));
            $criteria->one_result = true;
            $result = $criteria->execute();
        }
        if (!empty($result)) {
            $data = $this->getResultObjects($result);
            return $data;
        }
        else
            return false;
    }
    public final function delete()
    {
            $criteria = new Criteria($this,'DELETE');
            $criteria->condition(array($this->tableKey => $this->tableFields[$this->tableKey]));
            $result = $criteria->execute();
        return 1;
    }
    public final function orderBy($params)
    {
        if(!self::$_criteria)
            self::$_criteria = new Criteria($this);
        $criteria =  self::$_criteria;
        $criteria->orderBy='';
        $i=1;
        foreach ($params as $key => $value){
            if($i<count($params))
                $criteria->orderBy = ' '.$this->tableName.'.'.$key.' '.$value.', ';
            else
                $criteria->orderBy = ' '.$this->tableName.'.'.$key.' '.$value.' ';
        $i++;
        }
      return $this;
    }
    public final function limit($params)
    {
        $criteria = self::$_criteria;
        $criteria->limit='';
                $criteria->limit = $params;

        return $this;
    }
    public final function deleteAll()
    {
        $criteria = new Criteria($this,'DELETE');
        $criteria->condition($params='');
        $result = $criteria->execute();
    }

    public final function find($params = array(), $isStrict = true, $comparison = '=')
    {
        $data = array();
        if (isset(Connection::$dbInstance)) {
            $criteria = new Criteria($this);
            $criteria->condition($params);
            $result = $criteria->execute();
        }
        if (!empty($result)) {
            $result = $this->getResultObjects($result);
        }
        else
            $result = null;

        /*echo "<pre>";
        print_r($criteria);
        echo "</pre><hr>";*/

        return $result;
    }
    public final function findOne($params = array(), $isStrict = true, $comparison = '=')
    {
        $data = array();
        if (isset(Connection::$dbInstance)) {
            $criteria = new Criteria($this);
            $criteria->condition($params);
            $criteria->one_result = true;
            $result = $criteria->execute();
        }
        if (!empty($result)) {
            $result = $this->getResultObjects($result);
        }
        else
            $result = null;

        /*echo "<pre>";
        print_r($criteria);
        echo "</pre><hr>";*/

        return $result;
    }

    public final function findByCriteria($criteria)
    {
        $data = array();
        if (is_object($criteria)) {
            $result = $criteria->execute();
        }
        if (!empty($result)) {
            $data = $this->getResultObjects($result);
        }

        /*echo "<pre>";
        print_r($criteria);
        echo "</pre><hr>";*/

        /*echo "<pre>";
        print_r($result);
        echo "</pre><hr>";*/

        return $data;
    }

    //I can do this better!
    public final function findBySql($query)
    {
        $data = array();
        if (empty($query)) return $data;

        $queryObj = Connection::$dbInstance->prepare($query);
        $result = $queryObj->execute();
        $data = $queryObj->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

    public final function where($column,$operator,$value='')
    {
        if(!self::$_criteria)
             self::$_criteria = new Criteria($this);
        $criteria = self::$_criteria;
        $arr_operator = ['=','>','<','<>','>=','<=','IN'];
            if(in_array($operator,$arr_operator)){
                $criteria->condition([$column=>$value],$operator);
            }
            else{
                $criteria->condition([$column=>$operator],'=');
            }
        return $this;

    }

    public final function search($search)
    {

        $criteria = self::$_criteria;
        $criteria->search = true;
        $criteria->condition($search);
        return $this;

    }
    public final function count()
    {
        return count($this->result);
    }

    public final function save()
    {
        $criteria = new Criteria($this, 'SAVE');
        //dd($this->tableFields);
        //$criteria->condition(array($this->tableKey=>array($this->tableFields[$this->tableKey])));
        $result = $criteria->execute();
        if($result == 0){

        }else
            $this->id=$result;
      //  $result = $this->getResultObjects($result);
        return $result;
    }
    public final function get()
    {
        $criteria = self::$_criteria;

        $result = $criteria->execute();
        if (!empty($result)) {
            $result = $this->result = $this->getResultObjects($result);
        }
        else
            $result = $this->result = null;
        return $result;
    }

}