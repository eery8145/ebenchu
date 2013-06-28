<?php


class OloginForm extends CFormModel
{
	public $username; //昵称
	public $name; //真实姓名
	// public $mobile; //手机号

	public $account; //绑定账号
	public $password; //绑定账号密码

	public $mobile; //手机号码
	public $yanzheng; //验证码

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('account','check_account'),
			array('password','required'),
			array('username,name,mobile,yanzheng','required','message'=>'值不能为空'),
			array('mobile', 'match', 'pattern'=>'/^1[3|4|5|8]\d{9}$/', 'message'=>'请输入11位手机号码'),
			array('mobile','checkmobile'),
			array('yanzheng','checkyanzheng'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'昵称',
			'name'=>'真实姓名',
			'account'=>'账号',
			'password'=>'密码',
			'moblie'=>'手机号',
			'yanzheng'=>'验证码',
		);
	}


	//新增会员
	public function adduser(){
		$info = Yii::app()->session['otherlogin'];
		if(empty($info)){
			return false;
		}else{
			$AuthorConnector = new AuthorConnector;
			$MemberModel=new Member;

			$MemberModel->username = rand(100000,999999);
			$MemberModel->salt = rand(100000,999999);
			$MemberModel->password = md5('123456'.$MemberModel->salt);
			$MemberModel->nickname = $info['name'];
			// $MemberModel->name = $this->name; 屏蔽真实姓名
			$MemberModel->last_login_ip = Yii::app()->request->userHostAddress;
			$MemberModel->create_time = time();
			$MemberModel->update_time = time();
			$MemberModel->status = 1;
			if($info['source'] == 'qq'){
				$MemberModel->photo=Helper::GrabImage($info['userinfo']['figureurl_qq_2']);
			}else if($info['source'] == 'sina'){
				$MemberModel->photo=Helper::GrabImage($info['userinfo']['avatar_large']);
			}else{
				$MemberModel->photo=rand(1,95).'.jpg';//默认图片
			}

			$MemberModel->save(false);

			$AuthorConnector->openId = $info['openId'];
			$AuthorConnector->source = $info['source'];
			$AuthorConnector->userId = $MemberModel->id;
			$AuthorConnector->createTime = date('Y-m-d H:i:s');
			$AuthorConnector->validate = 0;
			$AuthorConnector->accessToken = $info['accessToken'];
			$AuthorConnector->save(false);

	  		$identity = new UserIdentity($MemberModel->username,$MemberModel->password,true);
	  		$identity->authenticate();
	  		$duration = 0;
	  		Yii::app()->user->login($identity,$duration);

  			unset(Yii::app()->session['otherlogin']);
		}
		return true;
	}

}
