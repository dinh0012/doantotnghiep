<?php
/**
* 
*/
namespace admin\models;
use application\models\User;
use vendor\helpers\Functions;
use vendor\helpers\Session;

class AdminIdentity
{
	const ERROR_NONE=0;
	const ERROR_EMAIL_INVALID=1;
	const ERROR_PASSWORD_INVALID=2;
    const ERROR_STATUS_NOTACTIV=3;
    const ERROR_STATUS_BAN=4;
	public $username;
    public $user_id;
	public $password;
	public $errorCode;
	function __construct($username,$password)
	{
		$this->username=$username;
		$this->password=$password;
	}
	 public function authenticate()
    {
		$user = new User();
        $user = $user->findOne(array('email'=>$this->username, 'role'=> User::SUPER_ADMIN));
		if ($user === null)
			$this->errorCode=self::ERROR_EMAIL_INVALID;			
		else if(Functions::encrypting($this->password)!= $user->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else if($user->status=='inactive')
			$this->errorCode = self::ERROR_STATUS_NOTACTIV;
		else if($user->status=='banned')
			$this->errorCode = self::ERROR_STATUS_BAN;
		else {
			$this->user_id = $user->id;
			$this->username = $user->email;
			$this->errorCode = self::ERROR_NONE;
		}
		return $this->errorCode;
	}

}