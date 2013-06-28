<?php

class PublicController extends Controller
{
	public $layout='public';
	public function init(){
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery.form.js');
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'common.css');
	}
	public function actions(){
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,  //背景颜色
				'minLength'=>4,  //最短为4位
				'maxLength'=>4,   //是长为4位
				'transparent'=>true,  //显示为透明，当关闭该选项，才显示背景颜色
				),
		);
	}
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLogin(){
		$model=new LoginForm;

		if(!empty($_POST['LoginForm'])){

			//赋值给模型      
			$model->attributes=$_POST['LoginForm'];
			//获取验证错误
			$ajaxRes = CActiveForm::validate($model, array('username','password'));
			$ajaxResArr = CJSON::decode($ajaxRes);
			//验证结果为空入库
			if(empty($ajaxResArr)){
			  if($model->validate() && $model->login()){
			  		scoreAction::setScore(Yii::app()->user->id,'denglu','add',false);//登陆加积分
			      	die(CJSON::encode(array('status'=>1)));
			  }else{
			      	die(CJSON::encode(array('status'=>0)));
			  }
			}else{
			  die($ajaxRes);
			}
		}
		
		$this->render('login',array('model'=>$model));
	}
	//退出登陆
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	//注册
	public function actionRegister(){

		$this->pageKeyword['title'] = Helper::siteConfig()->site_name.'-注册';
		$this->pageKeyword['keywords'] = Helper::siteConfig()->site_name.'-注册';
		$this->pageKeyword['description'] = Helper::siteConfig()->site_name.'-注册';

		//实例化用户模型
		$memberModel=new Member;
		if(!empty($_POST['Member'])){
			//赋值给模型      
	      	$memberModel->attributes=$_POST['Member'];
	      	//验证
	      	$ajaxRes 	= 	CActiveForm::validate($memberModel, array('username','nickname','password','passwordrepeat','verifyCode'));
	      	$ajaxResArr = 	CJSON::decode($ajaxRes);
	      	//验证结果
	      	if(empty($ajaxResArr)){
	      	 
	      	 	$score=Score::model()->find('id=1');

	      	 	$memberModel->salt=Helper::randomCode();//加盐值
	      	 	$memberModel->password=$memberModel->hashPassword();//密码
	      	 	$memberModel->create_time=time();//创建时间
	      	 	$memberModel->update_time=time();//更新时间
	      	 	$memberModel->status=1;//状态
	      	 	$memberModel->role_id=1;//状态
	      	 	$memberModel->photo=rand(1,95).'.jpg';//头像
	      	 	$memberModel->last_login_time=time();//登陆时间
	      	 	$memberModel->last_login_ip=Yii::app()->request->UserHostAddress;//IP地址
	      	 	$memberModel->score=$score->zhuce;//注册积分
	      	 	$memberModel->save(false);
	      	 	//创建用户积分
	      	 	$memberModel->createrScore();

	      	 	//用户积分

	      	 	die(CJSON::encode(array('status'=>1)));
	      	 }else{
	      	 	die($ajaxRes);
	      	 }

		}
		$this->render('register',array('memberModel'=>$memberModel));

	}

	//qq登陆
	public function actionQqlogin(){
		Yii::import('ext.oauthlogin.qq.qqConnect',true);
		$code = Yii::app()->request->getParam('code');
		$state = Yii::app()->request->getParam('state');
		$qqService = new qqConnectAuthV2(QQ_APPID,QQ_APPKEY);
		$type = 'code';

		$keys['code'] = $code;
		$keys['state'] = $state;
		$keys['redirect_uri'] = QQ_CALLBACK_URL;
    	$res = $qqService->getAccessToken($type, $keys);

	    $params['access_token'] = $res['access_token'];
	    $params['openid'] = $res['openid'];
	    $userinfo = $qqService->getUserInfo($params);
	    $name = $userinfo['nickname'];
	    if(!empty($res['access_token'])){
	    	$accessToken = $res['access_token'];
	    	$openId = $res['openid'];
	    	$model = AuthorConnector::model()->find("openId = :openId and source = 'qq' and validate = 0",array(":openId"=>$openId));
	    	if(empty($model)){
	    		$source = 'qq';
	    		//新用户,设置session,跳转到注册页面
	    		Yii::app()->session->add('otherlogin',compact('accessToken','openId','source','userinfo','name'));
	    		$loginForm = new OloginForm;
				$loginForm->adduser(); //添加新用户并且登陆
	    		$this->redirect(array('/'));
	    	}else{
	    		//绑定的用户,直接登陆
	    		$user = Member::model()->find("id = :id",array(":id"=>$model->userId));
	    		//更新token
	    		$model->accessToken = $res['access_token'];
	    		$model->save(false);
	    		$account = $user->username;
	    		$identity = new UserIdentity($account,$user->password,true);
	    		$identity->authenticate();
	    		$duration = 0;
	    		Yii::app()->user->login($identity,$duration);
	    		$this->redirect(Yii::app()->user->returnUrl);
	    	}
	    }else{
	    	$this->redirect(array('/'));
	    }
	}

	//sina登陆
	public function actionWblogin(){
		
		Yii::import('ext.oauthlogin.sina.sinaWeibo',true);
		$code = Yii::app()->request->getParam('code');
		$state = Yii::app()->request->getParam('state');
		$weiboService = new SaeTOAuthV2(WB_AKEY,WB_SKEY);
		$type = 'code';
		$keys['code'] = $code;
		$keys['state'] = $state;
		$keys['redirect_uri'] = WB_CALLBACK_URL;
		$res = $weiboService->getAccessToken($type, $keys);
		$params['access_token'] = $res['access_token'];
    	$params['openid'] = $res['uid'];
    	$weiboServiceDetail = new SaeTClientV2(WB_AKEY,WB_SKEY,$res['access_token']);
    	$userinfo = $weiboServiceDetail->getUserShow($res);
    	$name = $userinfo['name'];
    	if(!empty($res['access_token'])){
    		$accessToken = $res['access_token'];
    		$openId = $res['uid'];
    		$source = 'sina';
    		$model = AuthorConnector::model()->find("openId = :openId and source = 'sina' and validate = 0",array(":openId"=>$openId));
    		if(empty($model)){
    			//新用户,设置session,跳转到注册页面
    			Yii::app()->session->add('otherlogin',compact('accessToken','openId','source','userinfo','name'));
    			$loginForm = new OloginForm;
			  	$loginForm->adduser(); //添加新用户并且登陆
    			$this->redirect(array('/'));
    		}else{
    			//绑定的用户,直接登陆
    			$user = Member::model()->find("id = :id",array(":id"=>$model->userId));
    			//更新token
    			$model->accessToken = $res['access_token'];
    			$model->save(false);
    			$account = $user->username;
    			$identity = new UserIdentity($account,$user->password,true);
    			$identity->authenticate();
    			$duration = 0;
    			Yii::app()->user->login($identity,$duration);
    			$this->redirect(Yii::app()->user->returnUrl);
    		}
    	}else{
    		$this->redirect(array('site/index'));
    	}
	}


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}