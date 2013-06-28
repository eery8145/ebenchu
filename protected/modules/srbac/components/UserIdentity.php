<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	public $username;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Admins::model()->find('username = :username', array(':username'=>$this->username));

		if(!isset($user))
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		elseif($user->password!==md5($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else
		{
			// 记录登录ip
			$user->ip = Yii::app()->request->userHostAddress;
			$user->save(false);
			$this->setState('__id',$user->userid);
			//设置session信息
			$this->setState('username',$user->username);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

}