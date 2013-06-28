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
    'get_user_info',//����վ����ʾ��¼�û����ǳơ�ͷ���Ա�
    'add_share',//����һ����ҳ��������Ӧ���е����ݸ�����
    'add_one_blog',//������־��QQ�ռ�
    'list_album',//��ȡ�û�QQ�ռ�����б�
    'upload_pic',//�ϴ�һ����Ƭ��QQ�ռ����
    'add_album',//���û��Ŀռ���������һ���µĸ������
    'list_photo',//��ȡ�û�QQ�ռ�����е���Ƭ�б�
    'check_page_fans',//�ж��Ƿ���֤�ռ��˿
    'get_info',//��ȡ��¼�û�����Ѷ΢����ϸ����
    'add_t',//����һ��΢��
    'del_t',//ɾ��һ��΢��
    'add_pic_t',//����һ����ͼƬ��΢��
    'get_repost_list',//��ȡ����΢����ת��������б�
    'get_other_info',//��ȡ����΢������
    'get_fanslist',//�ҵ�΢����˿�б�
    'get_idollist',//�ҵ�΢��ż���б�
    'add_idol',//����ĳ��΢���û�
    'del_idol',//ȡ������ĳ��΢���û�
    'get_tenpay_addr',//�������վ�Ͻ�չ�����Ƹ�ͨ�Ǽǵ��ջ���ַ
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