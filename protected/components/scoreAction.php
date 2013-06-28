<?php

/*
    //可重复动作
    // scoreAction::setScore('1','xihuan','add'); //喜欢
    // scoreAction::setScore('1','fatie','add');  //发帖
    // scoreAction::setScore('1','huitie','add'); //回帖
    // scoreAction::setScore('1','jiajing','add');//加精
    // scoreAction::setScore('1','yaoqing','add');//邀请注册
    // scoreAction::setScore('1','jiahaoyou','add');//加好友
    // scoreAction::setScore('1','zhiding','add');//置顶
    // scoreAction::setScore('1','jiajing','add');//加精
    // scoreAction::setScore('1','xiaozu','add');//创建小组
    // scoreAction::setScore('1','jiangli','add');//奖励
    //不可重复动作
    // scoreAction::setScore('1','shoujiyz','add',false);//手机验证
    
    // scoreAction::setScore('1','denglu','add',false);//登陆
    // scoreAction::setScore('1','qiandao','add',false);//签到
    // scoreAction::setScore('1','touxiang','add',false);//上传头像
    // scoreAction::setScore('1','emailyz','add',false);//邮箱验证
    //扣分动作
    // scoreAction::setScore('1','chengfa','del');//惩罚扣分
    // scoreAction::setScore('1','shantie','del');//删帖扣分
    // scoreAction::setScore('1','shanchu','del');//删除扣分

    //清除当天积分动作
    //scoreAction::resetScoreAction();//


*/

class  scoreAction extends CController
{
	  public static $Score;
	  public static $UserScore;
  	public static $Member;
  	public static $beishu;
    public static $full;
    public static $smallFull;
	//用户行为
	//$id 用户id
	//$field 操作字段
	//$action 行为  add  增加  del 减少
	//$plural true 为可重复动作 false 为不可重复动作
	public static function setScore($id, $field,$action,$plural=true){
      self::getMember($id);
  		if($plural==true){
        if($action=='add'){
            self::isFull();
            if(self::$full){
              self::isSmallFull($field);
              if(self::$smallFull){
                self::addScores($field);
              }
            }
        }elseif ($action=='del') {
            self::delScore($field);
        }
      }else{
        self::addScore($field);
      }
  	}
    public static function getMember($id){
          //用户信息
          $Member=Member::model()->find('status =1 and id='.$id);
          self::$Member=$Member;
          //用户等级信息
          self::$beishu=$Member->roleOne->multiple?$Member->roleOne->multiple:1;
          //积分规则
          self::$Score=Score::model()->find('id=1');
          //用户积分信息
          self::$UserScore=empty($Member->myUserScoreOne)?self::createScore():$Member->myUserScoreOne;

    }
    //可重复增加积分
    public static  function addScores($field){
      $scoreField=$field;
      $myScoreField=$field.'df';
      $num=self::$UserScore->$myScoreField+(self::$Score->$scoreField*self::$beishu);
      self::$UserScore->$myScoreField=$num;
      self::$UserScore->save(false);
      self::$Member->score+=self::$Score->$scoreField*self::$beishu;
      self::$Member->save(false);
    }
    //不可重复增加
    public static function addScore($field){
      if(empty(self::$UserScore->$field)){
        self::$UserScore->$field=self::$Score->$field*self::$beishu;
        self::$UserScore->save(false);
        self::$Member->score+=self::$UserScore->$field;
        self::$Member->save(false);
      }
    }


  	//减少积分
  	public static function delScore($field){
      if(self::$Member->score>0){
      	self::$UserScore->$field='-'.self::$Score->$field;
      	self::$UserScore->save(false);
      }
  	}

  	//判断总积分是否已满
  	public static function isFull(){
      $dangqian=self::$UserScore;
      $count=$dangqian->fatiedf+$dangqian->huitiedf+$dangqian->xihuandf+$dangqian->jiajingdf+$dangqian->yaoqingdf+$dangqian->jiahaoyoudf+$dangqian->zhidingdf+$dangqian->xiaozudf+$dangqian->qiandao+$dangqian->jianglidf;
  		if($count<=self::$Score->zongsx*self::$beishu){
        self::$full=true;
      }else{
        self::$full=false;
      }
  	}
  	//判断每日积分上限
  	public static function isSmallFull($field){
      $scoreField=$field.'sx';
      $myScoreField=$field.'df';
  		if(self::$UserScore->$myScoreField<(self::$Score->$scoreField*self::$beishu)){
  			self::$smallFull=true;
  		}else{
  			self::$smallFull=false;
  		}
  	}
  	//创建积分表
  	public static  function createScore(){
			$Score=new UserScore;
			$Score->mid=self::$Member->id;
      $Score->zhuce=self::$Score->zhuce*self::$beishu;
			$Score->save(false);
      self::$Member->score=self::$Score->zhuce*self::$beishu;
      self::$Member->save(false);
      return $Score;
  	}
    public static function resetScoreAction(){
      $UserScore=UserScore::model()->findAll();
      foreach ($UserScore as $key => $value) {
        	$value->fatiedf=0;
        	$value->huitiedf=0;
        	$value->xihuandf=0;
        	$value->jiajingdf=0;
        	$value->yaoqingdf=0;
        	$value->jiahaoyoudf=0;
        	$value->zhidingdf=0;
        	$value->xiaozudf=0;
        	$value->qiandao=0;
        	$value->jianglidf=0;
        	$value->save(false);
      }
    }
}
?>