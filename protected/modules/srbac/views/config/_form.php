<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'site_name'); ?>
		<?php echo $form->textField($model,'site_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_url'); ?>
		<?php echo $form->textField($model,'site_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seo_title'); ?>
		<?php echo $form->textField($model,'seo_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'seo_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seo_description'); ?>
		<?php echo $form->textField($model,'seo_description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'seo_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seo_keywords'); ?>
		<?php echo $form->textField($model,'seo_keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'seo_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_slogan'); ?>
		<?php echo $form->textField($model,'site_slogan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site_slogan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_copyright'); ?>
		<?php echo $form->textArea($model,'site_copyright',array('style'=>'width:327px; height:200px;')); ?>
		<?php echo $form->error($model,'site_copyright'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_logo'); ?>

		<?php if(empty($model->site_logo)){ ?>
			<img style="margin-left:5px;" id="logotu" src="/assets/default/images/addpic.jpg" />
		<?php }else{ ?>
			<img style="margin-left:5px;" id="logotu" src="/upload/sitelogo/<?php echo $model->site_logo; ?>" />
		<?php } ?>

		<br />
		<div style="padding-left:5px;">
			<?php
	            list($s1, $s2) = explode(' ', microtime());     
	            $fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
	            $fileName.=rand(0,9999);
	            
	            $filePath = 1; //网站logo路径编号
	            
	            $this->widget('application.extensions.swfupload.SWFUpload',array(
	              'callbackJS'=>'swfupload_callback_logo',
	              'fileTypes'=> '*.jpg;*.jpeg;*.gif;',
	              'filePath'=> $filePath, //指定数组键名
	              //'fileName'=>  $fileName, //指定上传后的文件名称 不指定则上传多张图片
	              //'after' => 'logo', //指定上传完成后的操作
	              'button_image_url' => '/assets/default/images/shangchuan.png',
	              'button_width' => 74,
	              'button_height' => 22,
	              'file_upload_limit' => 4,
	              'debug' => false
	            ));
	        ?>
    	</div>
        <script>
			function swfupload_callback_logo(name,path,oldname,type,size,width,height){
				$("#logotu").attr('src','/upload/sitelogo/<?php echo date('Y-m-d'); ?>/'+name);
				$("#Config_site_logo").val('<?php echo date('Y-m-d'); ?>/'+name);
			}
		</script>

		<?php echo $form->hiddenField($model,'site_logo',array('size'=>30,'maxlength'=>30)); ?>

		<?php echo $form->error($model,'site_logo'); ?>
	</div>

	<div class="row" style="border-bottom:1px solid #cccccc;">
		<label>第三方登录设置</label>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qq_key'); ?>
		<?php echo $form->textField($model,'qq_key',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'qq_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qq_secret'); ?>
		<?php echo $form->textField($model,'qq_secret',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'qq_secret'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sina_key'); ?>
		<?php echo $form->textField($model,'sina_key',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sina_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sina_secret'); ?>
		<?php echo $form->textField($model,'sina_secret',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sina_secret'); ?>
	</div>

	<div class="row" style="border-bottom:1px solid #cccccc;">
		<label>邮件设置</label>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'host'); ?>
		<?php echo $form->textField($model,'host',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'host'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'port'); ?>
		<?php echo $form->textField($model,'port',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'port'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from'); ?>
		<?php echo $form->textField($model,'from',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'from'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->