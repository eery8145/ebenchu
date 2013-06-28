<?php

class Helper extends CController
{
  // Helper::truncate_utf8_string($content,20,false);   //不显示省略号
  // Helper::truncate_utf8_string($content,20);  //显示省略号 
  // 字符截取函数
  public static function truncate_utf8_string($string, $length, $etc = '...')
  {
      $result = '';
      $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
      $strlen = strlen($string);
      for ($i = 0; (($i < $strlen) && ($length > 0)); $i++)
          {
          if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0'))
                  {
              if ($length < 1.0)
                          {
                  break;
              }
              $result .= substr($string, $i, $number);
              $length -= 1.0;
              $i += $number - 1;
          }
                  else
                  {
              $result .= substr($string, $i, 1);
              $length -= 0.5;
          }
      }
      $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
      if ($i < $strlen)
          {
                  $result .= $etc;
      }
      return $result;
  }

    //获取时间
  public static  function getTime($time){
    if(!empty($time)){
      $dqTime=time();     
      if($dqTime>$time){
        $t=$dqTime-$time;
        $m=60;
        $f=60*60;
        $x=24*60*60;
        if($t<$m){
          $show=gmdate('s',$t).'秒前';
        }elseif ($t<$f) {
          $show=gmdate('i',$t).'分钟前';
        }elseif ($t<$x) {
          $show=gmdate('H',$t).'小时前';
        }else{
          $show=Helper::truncate_utf8_string(date('Y-m-d',$time),5,false); 
        }
          return $show;
      }else{
          return false;
      }
    }else{
      return false;
    }

  }

  //对象转为数组
  public static function objToArr($models){
    $res = array();
    foreach ($models as $key => $value) {
      $res[] = $value->attributes;
    }
    return $res;
  }


  //获取空格分割后的手机号码
  public static function getPhone($phone,$str=' '){
    if(is_numeric(trim($phone))){
      $str1=substr(trim($phone),0,3);
      $str2=substr(trim($phone),3,4);
      $str3=substr(trim($phone),7,4);
      $newStr=$str1.$str.$str2.$str.$str3;
    }else{
      $newStr=false;
    }
    return $newStr;
  }


  //验证表单字段
  public static function checkField(){
    $from =array_keys($_POST);
    if(!empty($from)){
      $checkStr=array_keys($_POST[$from[0]]);
      $model = new $from[0];
      if(!empty($_POST[$from[0]])){
        //赋值给模型      
        $model->attributes=$_POST[$from[0]];
        //获取验证错误
        $ajaxRes = CActiveForm::validate($model, array($checkStr[0]));
        $ajaxResArr = CJSON::decode($ajaxRes);
        //验证结果
        return $ajaxResArr;
      }else{
        exit;
      }
    }else{
      exit;
    }
    
  }
  

  


  //生成随机码
  public static function randomCode($num='6'){
   $newNum='';
    for ($i=0; $i < $num; $i++) { 
       $str=rand(0,9);
       $newNum.=$str;
    }
    return  $newNum;
  }

  //根据email获取email首页
  public static  function goToMail($mail){  
     $t=explode('@',$mail);  
     $t=strtolower($t[1]);  
     if($t=='163.com'){
         return 'mail.163.com';  
     }else if($t=='vip.163.com'){
         return 'vip.163.com';
     }else if($t=='126.com'){
         return 'mail.126.com';
     }else if($t=='qq.com'||$t=='vip.qq.com'||$t=='foxmail.com'){
         return 'mail.qq.com';
     }else if($t=='gmail.com'){
         return 'mail.google.com';
     }else if($t=='sohu.com'){
         return 'mail.sohu.com';
     }else if($t=='tom.com'){
         return 'mail.tom.com';
     }else if($t=='vip.sina.com'){
         return 'vip.sina.com';
     }else if($t=='sina.com.cn'||$t=='sina.com'){
         return 'mail.sina.com.cn';
     }else if($t=='tom.com'){
         return 'mail.tom.com';
     }else if($t=='yahoo.com.cn'||$t=='yahoo.cn'){
         return 'mail.cn.yahoo.com';  
     }else if($t=='tom.com'){
         return 'mail.tom.com';
     }else if($t=='yeah.net'){
         return 'www.yeah.net';
     }else if($t=='21cn.com'){
         return 'mail.21cn.com';  
     }else if($t=='hotmail.com'){
         return 'www.hotmail.com';
     }else if($t=='sogou.com'){
         return 'mail.sogou.com';
     }else if($t=='188.com'){
         return 'www.188.com';
     }else if($t=='139.com'){
         return 'mail.10086.cn';
     }else if($t=='189.cn'){
         return 'webmail15.189.cn/webmail';
     }else if($t=='wo.com.cn'){
         return 'mail.wo.com.cn/smsmail';
     }else if($t=='139.com'){
         return 'mail.10086.cn';
    }else {
         return 'mail.163.com';
     }
 } 
  //发送邮件
  //$toEmail 发送给谁的邮件地址
  //$title   标题
  //$message 发送内容
  public static function SendEmail($toEmail,$title,$message,$fromname='新娘街官网')
  {
    $mail  =Yii::app()->mailer;
    $mail->Charset='UTF-8';
    //$mail->Host = 'mail.chinaauto.com.cn';
    $mail->Host = 'smtp.exmail.qq.com';
    $mail->Port = 25;     
    $mail->IsSMTP();
    $mail->SMTPAuth= true;
    $mail->Username = "ebenchu@qq.com";  // 你的用户名，或者完整邮箱地址
    $mail->Password = "fuxingli520";     // 邮箱密码
    $mail->SetFrom('ebenchu@qq.com', $fromname);     // 发送的邮箱和发送人
    $mail->AddAddress($toEmail);
    
    $mail->Subject ="=?utf-8?B?" . base64_encode($title) . "?=";
    $mail->Body = $message;

    return $mail->send() ? true : false;
  }


  //json存储中文
  //暂时只处理一维数组为json数据
  public static function jsonHelper($arr){
     if(is_array($arr)){  
        foreach ( $arr as $key => $value ) {   
            $arr[$key] = urlencode ( $value );   
        }
        return urldecode ( CJSON::encode ( $arr ) );  
     }else{
      return false;
     }
  }




  public static function format_date($date,$isShowDate=true) {
    $limit = time() - $date;
    if($limit < 60){
      return $limit . '秒钟之前';
    }
    if($limit >= 60 && $limit < 3600){
      return floor($limit/60) . '分钟之前';
    }
    if($limit >= 3600 && $limit < 86400){
      return floor($limit/3600) . '小时之前';
    }
    if($limit >= 86400 and $limit<259200){
      return floor($limit/86400) . '天之前';
    }
    if($limit >= 259200 and $isShowDate){
      return date('Y-m-d', $date);
    }else{
      return '';
    }
  }
  
  public static function siteConfig(){
    $config=Config::model()->find('id=1');
    return $config;
  }
 
  //由于分词软件较大加QQ群283691798获取下载地址,下载后覆盖/extensions/fenci即可
  public static function fenci($con){
    include_once(dirname(dirname(__FILE__)).'/extensions/fenci/index.php');
    $tages=new tags;
    return $tages->getTages($con);
  }

  // Function: 获取远程图片并把它保存到本地 
  // 确定您有把文件写入本地服务器的权限
  // 变量说明:
  // $url 是远程图片的完整URL地址，不能为空。 
  // $filename 是可选变量: 如果为空，本地文件名将基于时间和日期 
  // 自动生成. 
  public static function GrabImage($url,$filepath="/upload/user_photo/",$filename=""){
    if($url==""):return false;
    endif;
    if($filename==""){ 
      list($s1, $s2) = explode(' ', microtime());   
      $filename = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
      $filename.=rand(0,9999);
      $filename.='.jpg';
    }
    ob_start();
    readfile($url);
    $img = ob_get_contents();
    ob_end_clean();
    $size = strlen($img);
    $filepath=$_SERVER['DOCUMENT_ROOT'].$filepath;
    $fp=@fopen($filepath.$filename, "a");
    fwrite($fp,$img);
    fclose($fp);
    return $filename;
  }

  //过滤数组
  public static function filterarray($post,$filter){
    $res = array();
    foreach ($filter as $key => $value) {
      $res[$value] = $post[$value];
    }
    return $res;
  }
 
}
?>