<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

//获取url
$hostInfo = $_SERVER['HTTP_HOST'];
$newHostInfo = str_replace('http://', '', $hostInfo);
//获取域名前缀
$hostQian = substr($newHostInfo,0,strpos($newHostInfo,'.'));
$host = str_replace($hostQian.'.', '', $newHostInfo);
 
return array(
  'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
  'name'=>'xinniangjie',
  'language'=>'zh_cn',
  // preloading 'log' component
  'preload'=>array('log'),

  // autoloading model and component classes 
  'import'=>array(
    'application.models.*',
    'application.components.*',
    'application.extensions.*',
    'application.extensions.hanzi.HanziTools',//中文库
    'application.modules.srbac.controllers.SBaseController',
    'application.helpers.*',
  ),
  
  'aliases' => array(
    'xupload' => 'ext.xupload'
  ),

  'modules'=>array(
    // uncomment the following to enable the Gii tool
    
    // 'gii'=>array(
    //  'class'=>'system.gii.GiiModule',
    //  'password'=>'123456',
    //  // If removed, Gii defaults to localhost only. Edit carefully to taste.
    //  'ipFilters'=>array('127.0.0.1','::1'),
    // ),
    'srbac' => array(
          'userclass'=>'Admins',
          'userid'=>'userid',
          'username'=>'username',
          'debug'=>true,
          'pageSize'=>10,
          'superUser' =>'Authority',
          'css'=>'srbac.css',
          'layout'=>'application.views.layouts.new',
          'notAuthorizedView'=>'srbac.views.authitem.unauthorized',
          'alwaysAllowed'=>array('SiteLogin','SiteLogout','SiteIndex','SiteAdmin','SiteError', 'SiteContact'),
          'userActions'=>array('Show','View','List'),
          'listBoxNumberOfLines' => 15,
          'imagesPath' => 'srbac.images',
          'imagesPack'=>'noia',
          'iconText'=>true,
          // 'header'=>'srbac.views.authitem.header',
          // 'footer'=>'srbac.views.authitem.footer',
          // 'showHeader'=>true,
          // 'showFooter'=>true,
          'alwaysAllowedPath'=>'srbac.components',
      ),
    'personal',
    'shops'
  ),

  // application components
  'components'=>array(
    
    'image'=>array(
      'class'=>'application.extensions.image.CImageComponent',
      // GD or ImageMagick
      'driver'=>'GD',
      // ImageMagick setup path
      'params'=>array('directory'=>'/upload/'),
    ),

    'user'=>array(
      // enable cookie-based authentication
      'allowAutoLogin'=>true,
      'loginUrl'=>'/public/login',
      'guestName'=>'main',
      'stateKeyPrefix'=>'xnj_',
    ),

    'authManager'=>array(
        'class'=>'CDbAuthManager',
        'connectionID'=>'db',
        'itemTable'=>'rbac_items',
        'assignmentTable'=>'rbac_assignments',
        'itemChildTable'=>'rbac_itemchildren',
    ),

    'cache' => array(
        'class'     => 'system.caching.CMemCache',
        'servers' => array(
          // array('host' => '192.168.0.119', 'port' => 11211),
          array('host' => '127.0.0.1', 'port' => 11211),
         ),
    ),
       
    'session' => array (
        'class'=> 'CCacheHttpSession',
        'cacheID' => 'cache',
        'autoStart' => true,
        'timeout' => 3600,
        'cookieParams' => array('domain'=>'.'.$host,'lifetime' => 0),
    ),

    'urlManager'=>array(
      'urlFormat'=>'path',
      'showScriptName'=>false,
      'rules'=>array(

        //分类页
        'chanpin/<cate:\d+>-<zcate:\d+>-<attr>-pn<p:\d+>'=>'productsearch/index',
        'chanpin/<cate:\d+>-<zcate:\d+>-pn<p:\d+>'=>'productsearch/index',
        'chanpin/<cate:\d+>-pn<p:\d+>'=>'productsearch/index',

        'chanpin/<cate:\d+>-<zcate:\d+>-<attr>'=>'productsearch/index',
        'chanpin/<cate:\d+>-<zcate:\d+>'=>'productsearch/index',
        'chanpin/<cate:\d+>'=>'productsearch/index',

        'guwen/<id:\d+>.html'=>'hjgw/hjgw/id/<id>',//婚嫁顾问内页
        
        'http://shop.'.$host.'/<id:\d+>'=>'shop/index',//商铺首页
        'http://shop.'.$host.'/product/<id:\d+>.html' => 'shop/shopproduct',
        'http://shop.'.$host.'/album/<id:\d+>.html' => 'shop/shopalbuminto',
        'http://shop.'.$host.'/contact/<id:\d+>.html' => 'shop/contact',
        'http://shop.'.$host.'/cash/<id:\d+>.html' => 'shop/basksingle',
        'http://shop.'.$host.'/show/<id:\d+>.html' => 'shop/credit',
        'http://shop.'.$host.'/comment/<id:\d+>.html' => 'shop/cashback',
        'http://shop.'.$host.'/album/<id:\d+>/<album:\d+>.html' => 'shop/shopphotointo',
        'http://shop.'.$host.'/product/<id:\d+>/<productId:\d+>.html' => 'shop/product',
        'http://shop.'.$host.'/album/<id:\d+>/<album:\d+>' => 'shop/shopphotointo',
        'http://shop.'.$host.'/shop/<a:\w+>' => 'shop/<a>',

        //单页
        'personalregister.do'=>'public/Personalregister',
        'shopregister.do'=>'public/shopregister',
        '/reg'=>'public/Personalregister',
        '/about'=>'site/about',
        '/ad'=>'site/adsplan',
        '/job'=>'site/job',
        '/help'=>'site/help',
        '/contact'=>'site/contact',
        '/statement'=>'site/statement',
        '/sitemap.html'=>'site/sitemap',
        '/topic/'=>'topic/index',
        '<_c:(marry|paint|wedding|dress|personalphoto|club|jewelry|emcee)>.do' => 'tgy/<_c>',
        
        '/bbs/post/<id:\d+>.html'=>'bbs/post',//帖子页面
        '/bbs/<id:\d+>'=>'/bbs/zone',//圈子页面

        '/shangjia/h<h:\d+>q<q:\d+>/pn<p1:\d+>'=>array('/zsj/index'),//找商家
        '/shangjia/h<h:\d+>/pn<p1:\d+>'=>array('/zsj/index'),//找商家
        '/shangjia/q<q:\d+>/pn<p1:\d+>'=>array('/zsj/index'),//找商家
        '/shangjia/h<h:\d+>q<q:\d+>'=>array('/zsj/index'),//找商家
        '/shangjia/h<h:\d+>'=>array('/zsj/index'),//找商家
        '/shangjia/q<q:\d+>'=>array('/zsj/index'),//找商家
        '/shangjia/pn<p1:\d+>'=>array('/zsj/index'),//找商家

        '/youhui/h<h:\d+>q<q:\d+>/pn<p1:\d+>'=>array('/tyh/index'),//淘优惠
        '/youhui/h<h:\d+>/pn<p1:\d+>'=>array('/tyh/index'),//淘优惠
        '/youhui/q<q:\d+>/pn<p1:\d+>'=>array('/tyh/index'),//淘优惠
        '/youhui/h<h:\d+>q<q:\d+>'=>array('/tyh/index'),//淘优惠
        '/youhui/h<h:\d+>'=>array('/tyh/index'),//淘优惠
        '/youhui/q<q:\d+>'=>array('/tyh/index'),//淘优惠
        '/youhui/pn<p1:\d+>'=>array('/tyh/index'),//淘优惠

        //首页
        '/shangjia/'=>'zsj/index',
        '/youhui/'=>'tyh/index',
        '/guwen/'=>'hjgw/index',
        '/bbs/'=>'bbs/index',
        '/fuli/'=>'/hyfl/index',
        
        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
      ),
    ),

    // 数据库设置
    'db'=>array(
      // 'connectionString' => 'mysql:host=124.193.217.222;dbname=xinniangjie',
      'connectionString' => 'mysql:host=127.0.0.1;dbname=xnj',
      // 'connectionString' => 'mysql:host=192.168.0.119;dbname=xinniangjieonline',
      'emulatePrepare' => true,
      'username' => 'root',
      'password' => '234p@co#@Ao#1',
      // 'password' => 'deep@coo#1013',
      'charset' => 'utf8',
    ),
    
    'errorHandler'=>array(
      'errorAction'=>'site/error',
    ),

     //  'log'=>array(
     //   'class'=>'CLogRouter',
     //   'routes'=>array(
     //     // array(
     //     //  'class'=>'CFileLogRoute',
     //     //  'levels'=>'error, warning',
     //     // ),
     //     array(
     //       'class'=>'CWebLogRoute',
     //     ),
        
     //   ),
     // ),
    
    'mailer' => array(
          'class' => 'application.extensions.mailer.EMailer',
          'pathViews' => 'application.views.email',
          'pathLayouts' => 'application.views.email.layouts'
       ),
  ), 
  
  // application-level parameters that can be accessed
  // using Yii::app()->params['paramName']
  'params'=>array(
    // this is used in contact page
    'adminEmail'=>'webmaster@example.com',
    'photoUrl'=>array(
      // 'userPhoto'=>'/upload/user_photo/',  //头像及商家logo
      // 'albumPhoto'=>'/upload/album_photo/',//照片
      // 'shopPhoto'=>'/upload/shop_file/',
      // 'MemberOrder'=>'/upload/member_order/',//会员上传凭证/收据
      // 'hunjia'=>'/upload/vote_file/',//婚嫁顾问
      // 'xinyong'=>'/upload/approve/',//商家信用图
      // 'quanzi'=>'/upload/zone_photo/',//圈子
      // 'zhuanti'=>'/upload/topic_file/',//专题图
      // 'link'=>'/upload/link_file/',//友情链接图
      // 'shaidan'=>'/upload/shaidan_photo/',//晒单图片
      // 'qianfa'=>'/upload/cms_photo/',//签发的图

      'shop'=>'/shop/index/',//商铺

      'userPhoto'=>'http://image.'.$host.'/user_photo/',  //头像及商家logo
      'albumPhoto'=>'http://image.'.$host.'/album_photo/',//照片
      'shopPhoto'=>'http://image.'.$host.'/shop_file/',
      'MemberOrder'=>'http://image.'.$host.'/member_order/',//会员上传凭证/收据
      'hunjia'=>'http://image.'.$host.'/vote_file/',//婚嫁顾问
      'xinyong'=>'http://image.'.$host.'/approve/',//商家信用图
      'quanzi'=>'http://image.'.$host.'/zone_photo/',//圈子
      'zhuanti'=>'http://image.'.$host.'/topic_file/',//专题图
      'qianfa'=>'http://image.'.$host.'/cms_photo/',//签发的图
      'shaidan'=>'http://image.'.$host.'/shaidan_photo/',//晒单图片
      'link'=>'http://image.'.$host.'/link_file/',//友情链接图
    ),
    'shopAdLink'=>array(
      'ad1'=>'http://www.ad1.com',    //广告图片地址1
      'ad2'=>'http://www.ad2.com',  //广告图片地址2
      'ad3'=>'http://www.ad3.com',  //广告图片地址3
    ),
    'contactLink'=>array(
      'qqKefu'=>'http://wpa.qq.com/msgrd?V=1&Uin=744460113&Site=ioshenmue&Menu=yes',    //qq客服链接
      'sinaweibo'=>'http://e.weibo.com/533923466',  //新娘街新浪微博
      'qqweibo'=>'http://e.t.qq.com/xinnianjie',  //新娘街腾讯微博
    ),
    'photoUpload'=>array(
      'base'=>Yii::app()->basePath.'/../upload/',
      'hunjia'=>'vote_file',
    ),
    'SmallImagesUrl'=>'/static/status/',//小图片路径
    'qqKefu'=>'744 460 113',
    
    'cityId'=>1,
    'userGrade'=>array(
      'normal'=>'0',  //普通用户
      'free'=>'2',//免费商铺
      'vip'=>'1',//VIP商铺
      'brand'=>'3',//皇冠商铺
      'gold'=>'4',//金牌商铺
      'silver'=>'5',//银牌商铺
    ),
    //  CMS地方版商城栏目页
    'cmsMark'=>array(
          'Cms_Marry'     =>  '1',    //婚纱摄影
          'Cms_Wedding'   =>  '3',    //婚庆服务
          'Cms_Jewelry'   =>  '6',    //钻石首饰
          'Cms_Dress'     =>  '2',    //婚纱礼服
          'Cms_Hotel'     =>  '12',   //婚宴酒店
          'Cms_Articles'    =>  '13',   //婚庆用品
          'Cms_Beauty'    =>  '4',    //新娘美容
          'Cms_Life'      =>  '11',   //蜜月旅游
          'Cms_Renovation'  =>  '7',    //婚房装修
          'Cms_Post'      =>  '20',   //帖子展示页
          'Cms_ForumIndex'  =>  '30',   //社区首页
          'Cms_CityIndex'   =>  '40',   //地区首页
          'Cms_Shop'      =>  '60',   //商铺后台
          'Cms_ShangCheng'  =>  '70',   //商城广告
          'Cms_Prosernal'   =>  '80',   //个人广告
          //'Cms_GuWen'       =>  '50';   //婚嫁顾问
        'Cms_Article'   =>  "article",  //签发文字
        'Cms_Product'   =>  "product",  //签发套系
        'Cms_Photo'     =>  "photo",    //签发图片
        'Cms_Guwen'     =>  "guwen",    //签发顾问
    ),
    //缓存前缀
    'CachePrefixes'=>array(
       'City'       =>  'CityCache_',     //地区
       'Area'       =>  'AreaCache_',     //区域
       'Industry'     =>  'IndustryCache_',   //行业
    ),
 
  ),


);