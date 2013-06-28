<?php
/**
 * oauth login for yii 
 * 
 * @author windsdeng@gmail.com http://www.dlf5.com
 * @copyright Copyright &copy; 2010 dlf5.com
 */

Yii::import('ext.oauthlogin.qq.qqConnect',true);
Yii::import('ext.oauthlogin.sina.sinaWeibo',true);

class oauthLogin extends CWidget
{
	/***** widget options  *****/
	
	/******* widget public vars *******/
	public $baseUrl			= null;
	
	public $cssFile = array(
							'/css/oauth_login_yii.css',
			   		);
	
	public $data = array();
	
  /**
   *
   * @var  small_login and medium_login big_login
   */
  public $itemView = 'small_login';

  public $sina_code_url = null;

  public $qq_code_url = null;
  
  public $back_url = null;

  public $qqScope = array(
    'get_user_info',//在网站上显示登录用户的昵称、头像、性别
    'add_share',//发表一个网页分享，分享应用中的内容给好友
    'add_one_blog',//发表日志到QQ空间
    'list_album',//获取用户QQ空间相册列表
    'upload_pic',//上传一张照片到QQ空间相册
    'add_album',//在用户的空间相册里，创建一个新的个人相册
    'list_photo',//获取用户QQ空间相册中的照片列表
    'check_page_fans',//判断是否认证空间粉丝
    'get_info',//获取登录用户在腾讯微博详细资料
    'add_t',//发表一条微博
    'del_t',//删除一条微博
    'add_pic_t',//发表一条带图片的微博
    'get_repost_list',//获取单条微博的转发或点评列表
    'get_other_info',//获取他人微博资料
    'get_fanslist',//我的微博粉丝列表
    'get_idollist',//我的微博偶像列表
    'add_idol',//收听某个微博用户
    'del_idol',//取消收听某个微博用户
    'get_tenpay_addr',//在这个网站上将展现您财付通登记的收货地址
  );

  public $sinaScope = array(

    );


  /**
	* Initialize the widget
	*/
	public function init()
	{
		parent::init();        
		//Publish assets
		$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
		$this->baseUrl = Yii::app()->getAssetManager()->publish($dir);
		
		//Register the widget css files
		$cs=Yii::app()->clientScript;
		foreach($this->cssFile as $css) {
			
			$oauthCssFile = $this->baseUrl . $css;
			$cs->registerCssFile($oauthCssFile);
		}
        
        $this->sinaLogin();
        $this->qqLogin();
	}
	
	
  /**
   * sinaLogin
   */
  public function sinaLogin()
  {
    $state = md5(rand(5, 10));
    Yii::app()->session->add('sina_state',$state);
    $weiboService = new SaeTOAuthV2(WB_AKEY,WB_SKEY);
    $display = null;
    $scope = implode(',', $this->sinaScope);
    $this->sina_code_url = $weiboService->getAuthorizeURL(WB_CALLBACK_URL,'code',$state,$display,$scope);
    Yii::app()->session->add('back_url',$this->back_url.'?state='.$state);
  }
  
  /**
   * qqLogin
   */
  public function qqLogin()
  {
    $state = md5(rand(5, 10));
    Yii::app()->session->add('qq_state',$state);
    $qqService = new qqConnectAuthV2(QQ_APPID,QQ_APPKEY);
    $display = null;
    $scope = implode(',', $this->qqScope);
    $this->qq_code_url = $qqService->getAuthorizeURL(QQ_CALLBACK_URL,'code',$state,$display,$scope);
    Yii::app()->session->add('back_url',$this->back_url.'?state='.$state);
  }

  /**
	* Run the widget
	*/
	public function run()
	{
		parent::run();
		$this->getViewFile($this->itemView);
		$this->render($this->itemView,array('data',$this->data)); 	
	}

}	