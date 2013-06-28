<?php

class TupianController extends Controller
{
  public $layout='common';
  // 拖动相册
	public function actionIndex(){
    $this->renderPartial('index');
  }

  // 瀑布流1
  public function actionPubu(){
    $this->render('pubu');
  }

  // 瀑布流2
  public function actionPubua(){
    $this->render('pubua');
  }
}