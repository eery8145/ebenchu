<?php
/**
 * The default srbac controller
 */
class DefaultController extends CController {
  
  private $user;
  /**
   * The default action if no route is specified
   */
  public function init(){
    parent::init();
    $this->user = Yii::app()->controller->module->getComponent('user');
  }

	public function actionIndex() {
    if($this->user->isGuest){
      $this->redirect(array('/srbac/default/login'));
    }else{
      $this->redirect(array('/srbac/config/admin'));
    }
	}

  public function actionLogin(){
    $this->layout = 'admin';
    $model=Yii::createComponent('application.modules.srbac.models.LoginForm');
    
    if(isset($_POST['LoginForm']))
    {
      $model->attributes=$_POST['LoginForm'];
      if($model->validate() && $model->login()){
        $this->redirect(Yii::app()->createUrl('/srbac/config/admin'));
      }
    }
    // display the login form
    $this->renderPartial('login',array('model'=>$model));
  }

  public function actionLogout()
  {
    Yii::app()->controller->module->getComponent('user')->logout();
    $this->redirect(Yii::app()->createUrl('/srbac/default/login'));
  }

  public function actionShouye(){
    $this->render('shouye');
  }

 }