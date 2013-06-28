<?php

class ArticleController extends Controller
{
	public $layout='read';

	public function init(){
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'common.css');
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'article.css');
	}

	public function actionIndex()
	{
		 //分类列表
		$cateList = Cate::model()->findAll(array('condition'=>'type = 1'));

		$cateId = Yii::app()->request->getParam('cateId');

		$condition = '';
		if(!empty($cateId)){
			$cate = Cate::model()->find('id = '.$cateId);
			$cateName = $cate->name;
			$condition = 'cateId = '.$cateId.' and status = 1';
			$count = Article::model()->count(array('condition'=>$condition,'order'=>'create_time desc'));
		}else{
			$cate = Cate::model()->find('id = '.$cateList[0]->id);
			$cateName = '最新文章';
			$condition = 'status = 1';
			$count = Article::model()->count(array('condition'=>$condition,'order'=>'create_time desc'));
		}

		$pages = new CPagination($count);
	    $pages->pageSize = 20; //分页显示条数
	    $pages->pageVar = 'p';

	    $articleList = Article::model()->findAll(array('condition'=>$condition,'limit'=>$pages->pageSize,'offset'=>$pages->currentPage*$pages->pageSize,'order'=>'create_time desc'));

	  
	    //seo设置
		$this->pageKeyword=array(
			'title'=>$cate->title.'-'.Helper::siteConfig()->site_name,
			'keywords'=>$cate->keywords,
			'description'=>$cate->des,
		);

		$this->render('index', compact('cateList', 'pages', 'articleList', 'cateName'));
	}

	public function actionShow(){
		$id = Yii::app()->request->getParam('id');

		$article = Article::model()->find('id = '.$id);
		if(empty($article)){
			throw new CHttpException(404,'没有此页面');
		}
		$article->click+=1;
		$article->save(false);
		//上一篇
		$prev=Article::model()->findAll(array("condition" => "id<".$article->id." and cateId=".$article->cateId." and status = 1","limit"=>1,'order'=>'create_time desc'));
		$prev=$prev[0];
		//下一篇
		$next=Article::model()->findAll(array("condition" => "id>".$article->id." and cateId=".$article->cateId." and status = 1","limit"=>1,'order'=>'create_time asc'));
		$next=$next[0];

		$xin = Article::model()->findAll(array('order'=>'create_time desc','limit'=>10));
		$re = Article::model()->findAll(array('order'=>'click desc','limit'=>10));
		//更多相关阅读
		$xiangguan=Article::model()->findAll(array("condition" =>"cateId=".$article->cateId." and status = 1","limit"=>5,'order'=>'create_time desc'));

		//seo设置
		$this->pageKeyword=array(
			'title'=>$article->title.'-'.$article->CateOne->name.'-'.Helper::siteConfig()->site_name,
			'keywords'=>$article->keywords,
			'description'=>Helper::truncate_utf8_string($article->des,100),
		);
		$this->render('show', compact('article','prev','next','xin','re','xiangguan'));
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