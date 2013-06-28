<?php

class TongchengController extends Controller
{
	public $layout='common';
	
	public function init(){
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.2.6.min.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery.form.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'tongcheng.js');
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'common.css');
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'kongjian.css');
	}

	public function actionIndex()
	{
		$this->pageKeyword=array(
			'title'=>'同城活动-'.Helper::siteConfig()->site_name,
			'keywords'=>'同城活动',
			'description'=>'同城活动',
		);

		$huodong = Huodong::model()->findAll(array('limit'=>12));
		
		$this->render('index',compact('huodong'));
	}

	public function actiondetail()
	{
		$this->render('detail');
	}

}