<?php
/* @var $this AdController */
/* @var $model Ad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',$model->typeList); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<div style="padding-left:5px;">
		宽500高180
		<br/>
		<?php echo $form->hiddenField($model,'img',array('size'=>60,'maxlength'=>100)); ?>
		<?php if($model->isNewRecord){ ?>
			<img id="adtu" src="/assets/default/images/addpic.jpg" />
		<?php }else{ ?>
			<img id="adtu" style="width:500px; height:180px;" src="/upload/ad/<?php echo $model->img; ?>" />
		<?php } ?>
		
		<?php
            list($s1, $s2) = explode(' ', microtime());     
            $fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
            $fileName.=rand(0,9999);
            
            $filePath = 1; //广告图片路径编号
            
            $this->widget('application.extensions.swfupload.SWFUpload',array(
              'callbackJS'=>'swfupload_callback_ad',
              'fileTypes'=> '*.jpg;*.jpeg;*.gif;',
              'filePath'=> $filePath, //指定数组键名
              //'fileName'=>  $fileName, //指定上传后的文件名称 不指定则上传多张图片
              //'after' => 'ad', //指定上传完成后的操作
              'button_image_url' => '/assets/default/images/shangchuan.png',
              'button_width' => 74,
              'button_height' => 22,
              'file_upload_limit' => 4,
              'debug' => false
            ));
        ?>
        <script>
			function swfupload_callback_ad(name,path,oldname,type,size,width,height){
				$("#adtu").attr('src','/upload/ad/<?php echo date('Y-m-d'); ?>/'+name);
				$("#Ad_img").val('<?php echo date('Y-m-d'); ?>/'+name);
			}
		</script>
		</div>

		<?php echo $form->error($model,'img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',$model->statusList); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->