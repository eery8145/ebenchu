<?php

class AboutController extends Controller
{
	public $layout='common';
	public function init(){
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'common.css');
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'article.css');
	}

	public function actionIndex()
	{
	

		$id = Yii::app()->request->getParam('id');

		$data = Cate::model()->find(array('condition'=>'id = :id','params'=>array(':id'=>$id)));

		$danye = Cate::model()->findAll(array('condition'=>'type = 2 and status = 1'));
		$this->pageKeyword=array(
			'title'=>$data->name.'-'.Helper::siteConfig()->site_name,
			'keywords'=>$data->name,
			'description'=>$data->name,
		);		

		$this->render('index',array('data'=>$data,'danye'=>$danye));
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