<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 20-Apr-17
 * Time: 10:23 PM
 */
namespace vendor\db;
Class Connection{
    public $dsn;
    public $db;
    public $password;
    public static $dbInstance=null;
    public function __construct($db)
    {
        try {
            $dbh = new \PDO($db['dsn'],$db['username'],$db['password']);
            $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $dbh->exec("set names ".$db['charset']);
            self::$dbInstance = $dbh;
        }
        catch(\PDOException $e)
        {
            echo $e->getMessage();
            die();
        }
    }
    public function connect(){
        if(isset(self::$dbInstance)){
            self::$dbInstance = new self();
        }
        return self::$dbInstance;
    }
}