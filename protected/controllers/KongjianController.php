<?php

class KongjianController extends Controller
{
	public $layout='common';

	public $filePath;
	
	public function actions()
	{
		list($s1, $s2) = explode(' ', microtime());   
		$fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
		$fileName.=rand(0,9999);
		if(!empty($_GET['fileName'])){
		  $fileName = $_GET['fileName'];
		}
		$path = $this->filePath[$_GET['filePath']];
		$after = $_GET['after'];
		$res = array(
		  //上传图片
		  'upload'=>array(
		    'class'=>'application.extensions.swfupload.SWFUploadAction',
		    'filepath'=>Yii::app()->basePath.'/../upload/'.$path.$fileName.'.EXT',
		    //注意这里是绝对路径,.EXT是文件后缀名替代符号
		    //'onAfterUpload'=>array($this,'saveFile'),
		  )
		);
		scoreAction::setScore(Yii::app()->user->id,'touxiang','add',false);//上传头像
		if(!empty($after)){
		  	$res['upload']['onAfterUpload'] = array($this,$after);
		}
		return $res;
	}

	public function init(){
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery.form.js');
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'common.css');
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'kongjian.css');
		$this->filePath=array(
	      1=>'user_photo/'.date('Y-m-d').'/',//套系(从upload目录开始)
		);
	}

	public function actionIndex()
	{
		$uid = Yii::app()->request->getParam('uid');

		$member = Member::model()->find('id = :id',array(':id'=>$uid));

		$topics = $member->topicMany;
		$this->pageKeyword=array(
			'title'=>$member->nickname.'的空间-'.Helper::siteConfig()->site_name,
			'keywords'=>$member->nickname.'的空间-'.Helper::siteConfig()->site_name,
			'description'=>$member->nickname.'的空间-'.Helper::siteConfig()->site_name,
		);
		$this->render('index', compact('member','topics'));
	}

	public function actionInfo(){
		$model=Member::model()->find('id = '.Yii::app()->user->id);
		if(!empty($_POST['Member'])){
    	//验证
    	$ajaxRes 	= 	CActiveForm::validate($model, array('nickname','email','remark','photo','info'), true, true);
    	$ajaxResArr = 	CJSON::decode($ajaxRes);
    	//验证结果
    	if(empty($ajaxResArr)){
    
    	 	if($model->save(false)){
    	 		die(CJSON::encode(array('status'=>1)));
    	 	}else{
    	 		die(CJSON::encode(array('status'=>0)));
    	 	}
    	 	
    	 }else{
    	 	die($ajaxRes);
    	 }
		}
		$this->pageKeyword=array(
			'title'=>'基本信息-'.Helper::siteConfig()->site_name,
			'keywords'=>'基本信息-'.Helper::siteConfig()->site_name,
			'description'=>'基本信息-'.Helper::siteConfig()->site_name,
		);
		$this->render('info',array(
			'model'=>$model,
		));
	}

	//修改密码
  public function actionChangepwd()
  {
    $model=Member::model()->find('id = '.Yii::app()->user->id);
    if(!empty($_POST['Member'])){
      //获取验证错误,需要制定验证字段
      $ajaxRes = CActiveForm::validate($model, array('oldpass','newpass','queren'),true,true);
      $ajaxResArr = CJSON::decode($ajaxRes);
      //验证结果为空入库
      if(empty($ajaxResArr)){

          $model->password = md5($model->newpass.$model->salt);

          if($model->save(false)){
              $res = $model->attributes;
              $res['status'] = 1;
              die(CJSON::encode($res));
          }else{
              die(CJSON::encode(array('status'=>0)));
          }
      }else{
          die($ajaxRes);
      }
    }
	$this->pageKeyword=array(
		'title'=>'修改密码-'.Helper::siteConfig()->site_name,
		'keywords'=>'修改密码-'.Helper::siteConfig()->site_name,
		'description'=>'修改密码-'.Helper::siteConfig()->site_name,
	);
    $this->render('changepwd',array('model'=>$model));
  }
  //我的积分
  public function actionMyscore(){
 
	if(Yii::app()->user->id){
		$model=Member::model()->find('id='.Yii::app()->user->id);
		$score=Score::model()->find('id=1');
		$myscore=$model->myUserScoreOne;
	}else{
		$this->redirect('/public/login');//未登录跳转页面
	}

	$this->pageKeyword=array(
		'title'=>'我的积分-'.Helper::siteConfig()->site_name,
		'keywords'=>'我的积分-'.Helper::siteConfig()->site_name,
		'description'=>'我的积分-'.Helper::siteConfig()->site_name,
	);
  	$this->render('myscore',array('myscore'=>$myscore,'score'=>$score,'model'=>$model));

  }


}