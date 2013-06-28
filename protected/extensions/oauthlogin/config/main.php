<?php

$config = Config::model()->find('id = 1');

/**
 * @var 新浪配置
 */
define( "WB_AKEY" , $config->sina_key );
define( "WB_SKEY" , $config->sina_secret );
define( "WB_CALLBACK_URL" , 'http://'.$_SERVER['HTTP_HOST'].'/public/wblogin');

/**
 * @var QQ配置
 */

define( "QQ_APPID" , $config->qq_key );
define( "QQ_APPKEY" , $config->qq_secret );
define( "QQ_CALLBACK_URL" ,'http://'.$_SERVER['HTTP_HOST'].'/public/qqlogin');

