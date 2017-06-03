<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 26-Apr-17
 * Time: 9:03 PM
 */
namespace admin\models;
use vendor\helpers\Session;

class AdminLogin extends \vendor\base\Model
{
    public $_identity;
    public function tableName()
    {
        return 'users';
    }
    public function login()
    {
        if ($this->_identity === null) {
            $this->_identity = new AdminIdentity($this->email, $this->password);
            $this->_identity->authenticate();
        }

        if ($this->_identity->errorCode === AdminIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Session::login($this->_identity, $duration);
            return true;
        } else
            return $this->_identity->errorCode;
    }

}