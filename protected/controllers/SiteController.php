<?php

class SiteController extends Controller
{
	public $layout='site';
 
	public function init(){
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'/common.css');
	}
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex(){
		
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery.form.js');
		$model=new LoginForm;

		// 推荐小组
		$groupList = Group::model()->findAll(array('condition'=>'status = 1','order'=>'sort desc','limit'=>20));
		// 活跃用户
		$memberList = Member::model()->findAll(array('condition'=>'','order'=>'last_login_time desc','limit'=>20));
		// 最新创建小组
		$groupListNew = Group::model()->findAll(array('condition'=>'status = 1','order'=>'id desc','limit'=>20));
		// 最热话题
		$topicList = Topic::model()->findAll(array('condition'=>'status != 2','order'=>'istop asc,id desc','limit'=>10));
		// 最新文章
		$articleList = Article::model()->findAll(array('condition'=>'status = 1','order'=>'id desc','limit'=>8));

		//首页幻灯
		$ad = Ad::model()->findAll(array('condition'=>'status = 1','order'=>'sort desc','limit'=>8));

		$this->pageKeyword=array(
			'title'=>Helper::siteConfig()->seo_title,
			'keywords'=>Helper::siteConfig()->seo_keywords,
			'description'=>Helper::siteConfig()->seo_description,
		);
		$this->render('index',compact('model','groupList','memberList','groupListNew','topicList','articleList','ad'));
	}

	public function actionDown(){

		if(Yii::app()->user->isGuest){
			header("Content-type: text/html; charset=utf-8");
			echo "<script>alert('请注册并登录后下载，谢谢支持!');window.location.href='/public/register';</script>";
			exit;
		}

		$file_dir= $_SERVER['DOCUMENT_ROOT'].'/anzhuangbao/';
		$file_name="ebenchu.zip";
		if (!file_exists($file_dir.$file_name)) { //检查文件是否存在
			echo "no file!";
			exit;
		}else{
			echo 1;
			$file = fopen($file_dir . $file_name,"r"); // 打开文件 
			Header("Content-type: application/octet-stream"); 
			Header("Accept-Ranges: bytes"); 
			Header("Accept-Length: ".filesize($file_dir . $file_name)); 
			Header("Content-Disposition: attachment; filename=" . $file_name); // 输出文件内容 
			echo fread($file,filesize($file_dir . $file_name)); 
			fclose($file);
			exit;
		}
	}

	public function actionTest(){
		Helper::SendEmail('57766213@qq.com','测试邮件','测试邮件内容');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
}