<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{


	public $isjiami;
	
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
		$user = Member::model()->find('username = :username', array(':username'=>$this->username));
		
		if($this->isjiami){
			$password = $this->password;
		}else{
			$password = md5($this->password.$user->salt);
		}

		if(!empty($user)){
			if($user->password!=$password){
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}else{
				
				$user->last_login_time=time();
				$user->last_login_ip=Yii::app()->request->UserHostAddress;//IP地址
				$user->save(false);
				//设置session信息
				$this->setState('nickname',$user->nickname);
				$this->setState('username',$user->username);
				$this->setState('photo',$user->photo);
				$this->setState('id',$user->id);
				$this->setState('groupCount',$user->groupCount);
				$this->setState('topicCount',$user->topicCount);

				// $this->setState('mGroupCount',$user->mGroupCount(array('condition'=>'uid !='.$user->id)));
				
				$this->errorCode=self::ERROR_NONE;
			}
		}else{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}


		return !$this->errorCode;
	}

}