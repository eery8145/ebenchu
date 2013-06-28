<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nickname'); ?>
		<?php echo $form->textField($model,'nickname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nickname'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32,'value'=>'')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'bind_account'); ?>
		<?php echo $form->textField($model,'bind_account',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'bind_account'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'last_login_time'); ?>
		<?php echo $form->textField($model,'last_login_time',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'last_login_time'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'last_login_ip'); ?>
		<?php echo $form->textField($model,'last_login_ip',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'last_login_ip'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'verify'); ?>
		<?php echo $form->textField($model,'verify',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'verify'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textField($model,'remark',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'remark'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',$model->statusList); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php echo $form->textField($model,'role_id'); ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt'); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'photo'); ?>
		<?php echo $form->hiddenField($model,'photo',array('size'=>50,'maxlength'=>50)); ?>

		<div style="padding-left:5px;">
		<?php if($model->isNewRecord){ ?>
			<img id="user_phototu" src="/assets/default/images/addpic.jpg" />
		<?php }else{ ?>
			<img width="48" height="48" id="user_phototu" src="/upload/user_photo/<?php echo $model->photo; ?>" />
		<?php } ?>
		<br/>
		<?php
            list($s1, $s2) = explode(' ', microtime());     
            $fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
            $fileName.=rand(0,9999);
            
            $filePath = 1; //套系图片路径编号
            
            $this->widget('application.extensions.swfupload.SWFUpload',array(
              'callbackJS'=>'swfupload_callback_user_photo',
              'fileTypes'=> '*.jpg;*.jpeg;*.gif;',
              'filePath'=> $filePath, //指定数组键名
              //'fileName'=>  $fileName, //指定上传后的文件名称 不指定则上传多张图片
              //'after' => 'user_photo', //指定上传完成后的操作
              'button_image_url' => '/assets/default/images/shangchuan.png',
              'button_width' => 74,
              'button_height' => 22,
              'file_upload_limit' => 4,
              'debug' => false
            ));
        ?>
        <script>
			function swfupload_callback_user_photo(name,path,oldname,type,size,width,height){
				$("#user_phototu").attr('src','/upload/user_photo/<?php echo date('Y-m-d'); ?>/'+name);
				$("#Member_photo").val('<?php echo date('Y-m-d'); ?>/'+name);
			}
		</script>
		</div>

		<?php echo $form->error($model,'photo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->