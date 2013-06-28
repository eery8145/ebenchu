<?php

$hostInfo = $_SERVER['HTTP_HOST'];
$newHostInfo = str_replace('http://', '', $hostInfo);

$hostQian = substr($newHostInfo,0,strpos($newHostInfo,'.'));
$host = str_replace($hostQian.'.', '', $newHostInfo);
 
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'language'=>'zh_cn',
	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
	    'application.modules.srbac.controllers.SBaseController',
	    'application.helpers.*',
		'application.extensions.phaActiveColumn.*'
	),
	
	'aliases' => array(
		'xupload' => 'ext.xupload'
	),

	'modules'=>array(
		'srbac' => array(
	        'userclass'=>'Admins',
	        'userid'=>'userid',
	        'username'=>'username',
	        'debug'=>true,
	        'pageSize'=>10,
	        'superUser' =>'Authority',
	        'css'=>'srbac.css',
	        'layout'=>'application.modules.srbac.views.layouts.admin',
	        'notAuthorizedView'=>'srbac.views.authitem.unauthorized',
	        'alwaysAllowed'=>array('SiteLogin','SiteLogout','SiteIndex','SiteAdmin','SiteError', 'SiteContact'),
	        'userActions'=>array('Show','View','List'),
	        'listBoxNumberOfLines' => 15,
	        'imagesPath' => 'srbac.images',
	        'imagesPack'=>'noia',
	        'iconText'=>true,
	        'alwaysAllowedPath'=>'srbac.components',
	    ),
	),

	'components'=>array(
		
		'image'=>array(
	      'class'=>'application.extensions.image.CImageComponent',
	      'driver'=>'GD',
	      'params'=>array('directory'=>'/upload/'),
	    ),

		'user'=>array(
			'allowAutoLogin'=>true,
			'loginUrl'=>'/public/login',
			'guestName'=>'main',
			'stateKeyPrefix'=>'zidongdenglu',
		),

		'authManager'=>array(
	      'class'=>'CDbAuthManager',
	      'connectionID'=>'db',
	      'itemTable'=>'#DB_PREFIX#items',
	      'assignmentTable'=>'#DB_PREFIX#assignments',
	      'itemChildTable'=>'#DB_PREFIX#itemchildren',
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				// 搜索
				'/search/<keyword:.*>'=>'group/search',
				// 个人空间
				'/kongjian/<uid:\d+>'=>'/kongjian/index',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// 数据库设置
		'db'=>array(
			'connectionString' => 'mysql:host=#DB_HOST#;dbname=#DB_NAME#',
			'emulatePrepare' => true,
			'username' => '#DB_USER#',
			'password' => '#DB_PWD#',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),

		 //  'log'=>array(
		 //  	'class'=>'CLogRouter',
		 //  	'routes'=>array(
		 //  		// array(
		 //  		// 	'class'=>'CFileLogRoute',
		 //  		// 	'levels'=>'error, warning',
		 //  		// ),
		 //  		array(
		 //  			'class'=>'CWebLogRoute',
		 // 		),
				
		 // 	),
		 // ),
		
		'mailer' => array(
          'class' => 'application.extensions.mailer.EMailer',
          'pathViews' => 'application.views.email',
          'pathLayouts' => 'application.views.email.layouts'
       ),
	), 
	
	'params' => array(
		'tablePrefix' => '#DB_PREFIX#'
	), 
	
);