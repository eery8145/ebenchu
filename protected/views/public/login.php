<div class="con">
        <div class="con1">
            <div class="dl">用户登录</div>
            <div class="left1 nobor">
                <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableAjaxValidation'=>false,
                'action'=>'/public/login',
                )); ?>
                    <div class="denglu">
                        <div class="denglu1">帐号</div>

                        <div class="denglu2">
                    <?php echo $form->textField($model,'username',array('class'=>'inp7','value'=>'')); ?>
                        </div>
                         <div class="denglu2 clearError">
                           
                        </div>
                    </div>
                    <div class="denglu">
                        <div class="denglu1">密码</div>
                        <div class="denglu2"><?php echo $form->passwordField($model,'password',array('class'=>'inp7')); ?></div>
                         <div class="denglu2 clearError">
                           
                        </div>
                    </div> 
                    <div class="denglu">
                        <div class="denglu1"></div>
                        <div class="denglu2">
                          <?php echo $form->  
        checkBox($model,'rememberMe',array()); ?>
                         <span>下次自动登录</span><!--  | <a href="#">忘记密码了</a> --></div>
                    </div>
                    <div class="denglu">
                        <div class="denglu1"></div>
                        <div class="denglu2"><a href="javascript:void(0)" class="green_btn" ><img src="<?php echo  IMAGES_PATH; ?>dl.jpg" /></a></div>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
            <div class="right1">
                <div class="dright">
                    > 还没有帐号？<a href="<?php echo Yii::app()->createUrl('public/register'); ?>" >立即注册</a>
                </div>
            </div>
        </div> 
    </div>

<script type="text/javascript">
  $('#login-form').ajaxForm({
    dataType:'json',
    success:function processJson(data) {
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
        alert('登陆成功');
        window.location.href ="<?php echo Yii::app()->createUrl('/'); ?>";
      }
    }
  });
  $(".green_btn").click(
      function(){
        $("input").parent().next().html('');
        $('#login-form').submit();
      }
  )
</script>