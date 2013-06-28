    <div class="top3">
        修改密码
    </div>
    <div class="mynav">
        <a <?php if($this->action->id == 'info'){ ?>class="bai"<?php } ?> href="<?php echo $this->createUrl('/kongjian/info'); ?>">基本设置</a>
        <a <?php if($this->action->id == 'changepwd'){ ?>class="bai"<?php } ?> href="<?php echo $this->createUrl('/kongjian/changepwd'); ?>">修改密码</a>
		<a <?php if($this->action->id == 'myscore'){ ?>class="bai"<?php } ?> href="<?php echo $this->createUrl('/kongjian/myscore'); ?>">我的积分</a>
	</div>
    <div class="con clear">
<h1 style="font-size:14px; font-weight:bold">积分说明:积分可以参与本网举行的各种活动，本网会根据积分多少进行择优选择</h1>
<table width="100%" border="1">
  <tr style=" background:#CCC">
    <td width="77">动作</td>
    <td width="80">基数积分</td>
    <td width="108">积分上限</td>
   
    <td width="115">描述</td>
    <td width="144">开通状态</td>
     <td width="139">已获取积分</td>
  </tr>
  <tr>
    <td>登陆</td>
    <td><?php echo $score->denglu  ?></td>
    <td><?php echo $score->denglu  ?></td>
  
    <td>每天</td>
    <td>已开通</td>
    <td><?php echo $myscore->denglu  ?></td>
  </tr>
  <tr>
    <td>签到</td>
    <td><?php echo $score->qiandao  ?></td>
    <td><?php echo $score->qiandao  ?></td>

    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->qiandao  ?></td>
  </tr>
  <tr>
    <td>发帖</td>
    <td><?php echo $score->fatie  ?></td>
    <td><?php echo $score->fatiesx  ?></td>
  
    <td>每天</td>
    <td>已开通</td>
    <td><?php echo $myscore->fatiedf  ?></td>
  </tr>
  <tr>
    <td>回帖</td>
    <td><?php echo $score->huitie  ?></td>
    <td><?php echo $score->huitiesx  ?></td>
   
    <td>每天</td>
    <td>已开通</td>
    <td><?php echo $myscore->huitiedf  ?></td>
  </tr>
  <tr>
    <td>喜欢</td>
    <td><?php echo $score->xihuan  ?></td>
    <td><?php echo $score->xihuansx  ?></td>
   
    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->xihuandf  ?></td>
  </tr>
  <tr>
    <td>加入小组</td>
    <td><?php echo $score->jiazu  ?></td>
    <td><?php echo $score->jiazusx  ?></td>
   
    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->jiazudf  ?></td>
  </tr>
  <tr>
    <td>话题加精</td>
    <td><?php echo $score->jiajing  ?></td>
    <td><?php echo $score->jiajingsx  ?></td>
    
    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->jiajingdf  ?></td>
  </tr>
  <tr>
    <td>话题置顶</td>
    <td><?php echo $score->zhiding  ?></td>
    <td><?php echo $score->zhidingsx  ?></td>
   
    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->zhidingdf  ?></td>
  </tr>
  <tr>
    <td>话题加精</td>
    <td><?php echo $score->jiajing  ?></td>
    <td><?php echo $score->jiajingsx  ?></td>
    
    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->jiajingdf  ?></td>
  </tr>
  <tr>
    <td>邀请注册</td>
    <td><?php echo $score->yaoqing  ?></td>
    <td><?php echo $score->yaoqingsx  ?></td>
    
    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->yaoqingdf  ?></td>
  </tr>
  <tr>
    <td>加好友</td>
    <td><?php echo $score->jiahaoyou  ?></td>
    <td><?php echo $score->jiahaoyousx  ?></td>
    
    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->jiahaoyoudf  ?></td>
  </tr>
  <tr>
    <td>创建小组</td>
    <td><?php echo $score->xiaozu  ?></td>
    <td><?php echo $score->xiaozusx  ?></td>
    
    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->xiaozudf  ?></td>
  </tr>
  <tr>
    <td>获取奖励</td>
    <td><?php echo $score->jiangli  ?></td>
    <td><?php echo $score->jianglisx  ?></td>
    
    <td>每天</td>
    <td>未开通</td>
    <td><?php echo $myscore->jianglidf  ?></td>
  </tr>
  <tr>
    <td>手机验证</td>
    <td><?php echo $score->shoujiyz  ?></td>
    <td><?php echo $score->shoujiyz  ?></td>
    
    <td>一次</td>
    <td>未开通</td>
    <td><?php echo $myscore->shoujiyz  ?></td>
  </tr>
  <tr>
    <td>注册</td>
    <td><?php echo $score->zhuce  ?></td>
    <td><?php echo $score->zhuce  ?></td>
    
    <td>一次</td>
    <td>已开通</td>
    <td><?php echo $myscore->zhuce  ?></td>
  </tr>
  <tr>
    <td>邮箱验证</td>
    <td><?php echo $score->emailyz  ?></td>
    <td><?php echo $score->emailyz  ?></td>
    
    <td>一次</td>
    <td>未开通</td>
    <td><?php echo $myscore->emailyz  ?></td>
  </tr>
  <tr>
    <td>头像上传</td>
    <td><?php echo $score->touxiang  ?></td>
    <td><?php echo $score->touxiang  ?></td>
    
    <td>一次</td>
    <td>已开通</td>
    <td><?php echo $myscore->touxiang  ?></td>
  <tr>
    <td>删帖扣分</td>
    <td><?php echo $score->shantie  ?></td>
    <td>不限</td>
    
    <td>不限</td>
    <td>未开通</td>
    <td><?php echo $myscore->shantie  ?></td>
  </tr>
  <tr>
    <td>违规扣分</td>
    <td><?php echo $score->chengfa  ?></td>
    <td>不限</td>
   
    <td>不限</td>
    <td>未开通</td>
    <td><?php echo $myscore->chengfa  ?></td>
  </tr>
  <tr style="background:#CCC">
    <td>每日积分上限</td>
    <td colspan="5"><?php echo $score->zongsx  ?></td>
  </tr>
  <tr style="background:#0CF">
    <td>我的总积分</td>
    <td colspan="5"><?php echo $model->score  ?></td>
  </tr>
</table>

        <div class="right5a">
            <!-- <div class="right5a1">小组创建  · · · · · ·</div>
            <div class="right5a2">小组需要审核通过后才能完成创建,管理员会在3日内审核 申请, 审核结果会用豆邮通知你,请耐心等待。</div>
            <div class="right5a1">小组标签  · · · · · ·</div>
            <div class="right5a2">小组可以有不超过5个的标签，用来描述小组的目的。标签作为关键词可以被用户搜索到。 多个标签之间用空格分隔开。 </div>
            <div class="right5a2">比如，"Philip K. Dick小组"可以用 "作者 作家 科幻 科学幻想 迪克"， "关中辰木" 可以用 "本地 同城 西北 陕西 西安"。小组名称本身可以被搜索，就不用再加在标签里了。 小组的名称、介绍、标签在创立后都可以随时更改。 </div> -->
        </div>
        
    </div>

    <script>
//验证提示
$('#member-form').ajaxForm({
    dataType:'json',
    success:function(data) {
      var items = [];
      $.each(data,function(key, val){var tem=[key,val];items.push(tem)});
      var length = items.length;
      if(data.status != 1){
        //items[i][0]错误节点名称
        //items[i][1]对应错误提示
        for(var i=0;i<length;i++){  
            alert(items[i][1]);
            return false;
        }
      }else{
        alert('修改基本信息成功');
      }
    }
  });

//提交验证
$('#sub').click( 
    function(){
        $('#member-form').submit();
        return false;
  }
);
</script>