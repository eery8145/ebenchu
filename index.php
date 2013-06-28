<?php
date_default_timezone_set('Asia/Shanghai');
define('APP_PATH',dirname(__FILE__).'/');
if (!file_exists(APP_PATH.'protected/config/main.php')) {
    header("Location: install/");
}
//设置错误级别
//error_reporting(E_ALL);
//error_reporting(0);

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
// defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3); 
//引入常量定义
require_once(APP_PATH.'/protected/config/constant.php');
if (isset($_POST["PHPSESSID"]))
{
  session_id($_POST["PHPSESSID"]);
}

require_once($yii);
Yii::createWebApplication($config)->run();
