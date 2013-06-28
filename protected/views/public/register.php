<div class="con">
        <div class="con1">
        	<div class="dl">用户注册</div>
        	<div class="left1 nobor">
                 <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'dengluform',
                    'enableAjaxValidation'=>false,
                  )); ?>
              
                	<div class="denglu">
                    	<div class="denglu1">帐号</div>
                        <div class="denglu2">
                            <?php echo $form->textField($memberModel,'username',array('class'=>'inp7')); ?>
                        </div>
                        <div class="denglu2 clearError">
                           
                        </div>
                    </div>
                    <div class="denglu">
                    	<div class="denglu1">密码</div>
                        <div class="denglu2"> <?php echo $form->passwordField($memberModel,'password',array('class'=>'inp7')); ?>
                        </div>
                        <div class="denglu2 clearError">
                           
                        </div>
                    </div>
                     <div class="denglu">
                        <div class="denglu1">重复密码</div>
                        <div class="denglu2"> <?php echo $form->passwordField($memberModel,'passwordrepeat',array('class'=>'inp7')); ?>
                        </div>
                        <div class="denglu2 clearError">
                            
                        </div>
                    </div>
                    <div class="denglu">
                    	<div class="denglu1">昵称</div>
                        <div class="denglu2"> <?php echo $form->textField($memberModel,'nickname',array('class'=>'inp7')); ?>
                        </div>
                        <div class="denglu2 clearError">
                           
                        </div>
                    </div>
                    <div class="denglu">

                    	<div class="denglu1">验证码</div>
                        <div class="denglu2"><?php echo $form->textField($memberModel,'verifyCode',array('class'=>'inp6')); ?><?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击图片刷新','title'=>'点击图片刷新','width'=>'60px','height'=>'20px','class'=>'ip9'))); ?></div>
                        <div class="denglu2 clearError">
                           
                        </div>
                    </div>
                    <div class="denglu">
                    	<div class="denglu1"></div>
                        <div class="denglu2"><input type="checkbox" checked="checked" /> <span>我已经认真阅读并同意<?php echo  Helper::siteConfig()->site_name; ?>的</span><a href="#">《使用协议》</a>
                        </div>
                    </div>
                    <div class="denglu">
                    	<div class="denglu1"></div>
                        <div class="denglu2"><a href="javascript:void(0)" id="sub"><img src="<?php echo  IMAGES_PATH; ?>zc.jpg" /></a>
                        </div>
                    </div>
               <?php $this->endWidget(); ?> 
            </div>
            <div class="right1">
            	<div class="dright">
                	> 已经拥有帐号? <a href="<?php echo Yii::app()->createUrl('public/login'); ?>">直接登录</a>
                </div>
            </div>
        </div>
    </div>


<script>
//验证提示
$('#dengluform').ajaxForm({
    dataType:'json',
    success:function(data) {
      var items = [];
      $.each(data,function(key, val){var tem=[key,val];items.push(tem)});
      var length = items.length;
      if(data.status != 1){
        //items[i][0]错误节点名称
        //items[i][1]对应错误提示
        for(var i=0;i<length;i++){  
            $('#'+items[i][0]).parent().next().html('&nbsp;'+items[i][1]);
        }
      }else{
        alert('注册成功');
        window.location.href="<?php echo Yii::app()->createUrl('/'); ?>";
      }
    }
  });

//提交验证
$('#sub').click( 
    function(){
        $('.clearError').html('');
        $('#dengluform').submit();
        return false;
  }
);
</script>