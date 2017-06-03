<?php
namespace vendor\db;
Class ActiveRecord {
    private $_tableName;
    private $_insert;
    private $_update;
    public function __construct()
    {
        $this->db = Connection::connect()->db;
    }
    public  function gettableName($tableName){
        return $this->_tableName = $tableName;
    }
    public  function settableName(){
        return $this->_tableName;
    }
    public function save(){

    }

}