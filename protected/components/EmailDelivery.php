<?php
/*****************************************************
 * Created 2012-5-30
 *
 * 站外职位hr邮箱投递
 *
 * Author matian <matian@baijob.com>
 ****************************************************/

class EmailDelivery
{


//     emailTopicEnabled=true
// emailReplyEnabled=false
// port=25
// transport=smtp
// authEnabled=true
// emailFrom=001@deepcoo.com
// userName=xinniangjie
// password=xinniangjie
// host=smtp.exmail.qq.com
// emailEnabled=true
    
    /* 邮件服务器Host */
    private static $Host = 'smtp.exmail.qq.com';
    /* Username */
    private static $Username = 'xinniangjie.com';
    /* Password */
    private static $Password = 'xinniangjie';
    /* from address */
    private static $fromAddress = '001@deepcoo.com';
    /* from name */
    private static $fromName = 'service';
    /* 编码 */
    private static $CharSet = 'utf-8';
    /* Encoding */
    private static $Encoding = 'base64';
    /* Subject 标题 */
    private static $Subject = '来自百伯网的职位投递';

    /**
     * 发送邮件
     * @param String $emailAdress 邮件地址
     * @param String $Suject 发送邮件标题
     * @param String $body   发送邮件内容
     **/
    static public function bodySend($emailAdress, $Suject='', $body='')
    {
        $mail = new PhpMailer();
        $mail->CharSet    = self::$CharSet;
        $mail->Encoding   = self::$Encoding;
        $mail->Subject    = !empty($Suject) ? $Suject : self::$Suject;
        $mail->IsSMTP();
        $mail->Host       = self::$Host;
        $mail->SMTPAuth   = true;
        $mail->Username   = self::$Username;
        $mail->Password   = self::$Password;
        $mail->SetFrom(self::$fromAddress, self::$fromName);
        $mail->MsgHTML($body);
        $mail->AddAddress($emailAdress);
        
        $statu = $mail->Send();
        $mail->ClearAddresses();
        return !$statu ? false : true;
    }

    /**
     * 获取指定公司的邮箱
     * @param String $companyName 公司名
     * 成功返回公司名，失败返回flase
     **/
    static public function getCompanyEmail($companyName)
    {
        $mem = Yii::app()->cache;
        $key = 'hremial_getCompanyEmail1_' . $companyName;
        $email = $mem->get($key);
        
        if($email === false) {
            /* db */
            $db = Yii::app()->db_filter;

            $email = $db->createCommand()
                        ->select('email')
                        ->from('company_email')
                        ->where('name = :name', array(':name' => $companyName))
                        ->queryScalar();

            /* 验证 */
           // if(!preg_match("/^[0-9a-zA-Z]+(?:[\_\-][a-z0-9\-]+)*@[a-zA-Z0-9]+(?:[-.][a-zA-Z0-9]+)*\.[a-zA-Z]+$/i", $email)) {
             //   $email = false;
           // }
            /* 缓存 */
            $mem->set($key, $email, 86400);
            
            return $email;
        }else {
            return $email;
        }

    }

    /**
     * 发送申请，申请限制改成24小时后可以重新投递
     * @param Int $id 职位实体id
     * @param Int $userid 用户id
     * @param Int $resumeId 简历id
     * @return Boolean
     **/
    static public function isHrSend($id, $userid, $resumeId, $send_type=1)
    {
        /* 职位信息 */
        $job = new Jobinfo();
        $job->postId = $id;
        $jobInfo = $job->jobContent();
        if(empty($jobInfo)) return false;
        $hreamil = new Hremail();
        $hreamil->user_id = $userid;
        $hreamil->resume_id = $resumeId;
        $hreamil->job_id = $id;
        $hreamil->job_name = $jobInfo['title'];
        $hreamil->sourceid = $jobInfo['sourceId'];
        $hreamil->post_time = date('Y-m-d H:i:s');
        $hreamil->ts = date('Y-m-d H:i:s');
        $hreamil->source = $send_type;
        $hreamil->save();
        return $hreamil->attributes;
    }
    /**
     * 检查是否能进行hr投递----有附件时
     * @param Int $id 职位实体id
     * @param Int $userid 用户id
     * @param Int $resumeId 简历id
     * @param array $jobinfo 职位信息
     * @return Boolean
     *  $source 1 批量投递未登录 2 批量投递已登陆 3 一键投递已登录 4 一键投递未登录 5 阿拉丁一键投递
     **/
    static public function isHrAttachSend($jobinfo, $userid, $resumeId,$attach_id,$self=true, $source=4)
    {
        if (empty($attach_id) || empty($jobinfo)) return false;
        if (!is_array($jobinfo) && !is_object($jobinfo)){//兼容传递id的
            $id = $jobinfo;
            $jobinfo = OneDeliver::getJobInfo($id,$self);
            if (!$jobinfo) return false;
        }
        $hreamil = new AttachmentSendLog();
        $hreamil->corp_id = isset($jobinfo['company_id']) ? $jobinfo['company_id'] : 0;
        $hreamil->user_id = $userid;
        $hreamil->resume_id = $resumeId;
        $hreamil->job_id = $jobinfo['jobid'];
        $hreamil->job_name = isset($jobinfo['jobtitle']) ? $jobinfo['jobtitle'] : null;
        $hreamil->source = $source;
        $hreamil->post_time = date('Y-m-d H:i:s');
        $hreamil->attach_id = $attach_id;
        $hreamil->save();
        return $hreamil->attributes;
    }

}

?>
