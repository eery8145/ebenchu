<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>客户信息管理系统</title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetUrl; ?>/css/common.css" />
<script src="/js/jquery.js"></script>
</head>

<body class="loginbody">
	<div class="login">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
				  'validateOnSubmit'=>true,
				),
				'htmlOptions'=>array('class'=>'login1'),
				
            )); ?>
            <div>用户名</div>
            <div>
            	<?php echo $form->textField($model,'username',array('class','in1')); ?>
            </div>
            <div>密&nbsp;&nbsp码</div>
            <div>
                <?php echo $form->passwordField($model,'password',array('class','in1')); ?>
            </div>
            <div>
                <span class="fl">
					<?php echo $form->error($model,'username'); ?>
                    <?php echo $form->error($model,'password'); ?>
                </span>
                <span class="fl"></span>
            </div>
        <?php $this->endWidget(); ?>
        <a class="fl dlan" href="javascript:void(0)">
            <img src="<?php echo $this->module->assetUrl; ?>/images/login/dlan.png" />
        </a>
    </div>
</body>
</html>
<script>
	$(".dlan").click(
		function(){
			$(".login1").submit();
		}
	);
</script>