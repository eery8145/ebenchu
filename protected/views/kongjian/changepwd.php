    <div class="top3">
        修改密码
    </div>
    <div class="mynav">
        <a <?php if($this->action->id == 'info'){ ?>class="bai"<?php } ?> href="<?php echo $this->createUrl('/kongjian/info'); ?>">基本设置</a>
        <a <?php if($this->action->id == 'changepwd'){ ?>class="bai"<?php } ?> href="<?php echo $this->createUrl('/kongjian/changepwd'); ?>">修改密码</a>
		<a <?php if($this->action->id == 'myscore'){ ?>class="bai"<?php } ?> href="<?php echo $this->createUrl('/kongjian/myscore'); ?>">我的积分</a>
	</div>
    <div class="con clear">

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'member-form',
                'enableAjaxValidation'=>false,
                'htmlOptions'=>array('class'=>'left2a'),
            )); ?>

            <div class="left2c">
                <div class="left2c1"><?php echo $form->labelEx($model,'oldpass'); ?>:</div>
                <div class="left2c21 bgcl2">
                    <?php echo $form->passwordField($model,'oldpass',array('class'=>'inp6','value'=>'')); ?>
                </div>
            </div>
            <div class="left2c">
                <div class="left2c1"><?php echo $form->labelEx($model,'newpass'); ?>:</div>
                <div class="left2c21 bgcl2">
                    <?php echo $form->passwordField($model,'newpass',array('class'=>'inp6')); ?>
                </div>
            </div>
            <div class="left2c">
                <div class="left2c1"><?php echo $form->labelEx($model,'queren'); ?>:</div>
                <div class="left2c21 bgcl2">
                    <?php echo $form->passwordField($model,'queren',array('class'=>'inp6')); ?>
                </div>
            </div>

            <div class="left2c">
                <div class="left2c21 bgcl2" style="padding-left:75px;">
                    <a href="javascript:void(0)" id="sub"><img src="<?php echo  IMAGES_PATH; ?>shenqing.jpg" /></a>
                </div>
            </div>
        <?php $this->endWidget(); ?>
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