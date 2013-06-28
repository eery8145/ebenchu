<?php
/* @var $this GroupController */
/* @var $model Group */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tid'); ?>

		<?php echo $form->dropDownList($model,'tid',CHtml::listData(Tag::model()->findAll('pid != 0'), 'id', 'title')); ?>

		<?php echo $form->error($model,'tid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>

		<div style="padding-left:5px;">
			<?php if($model->isNewRecord){ ?>
				<img id="logotu" src="/assets/default/images/addpic.jpg" />
			<?php }else{ ?>
				<img id="logotu" src="/upload/group_logo/<?php echo $model->logo; ?>" />
			<?php } ?>
			<br/>
			<?php
          list($s1, $s2) = explode(' ', microtime());     
          $fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
          $fileName.=rand(0,9999);
          
          $filePath = 1; //小组头像路径编号
          
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
	      <script>
			function swfupload_callback_logo(name,path,oldname,type,size,width,height){
				$("#logotu").attr('src','/upload/group_logo/<?php echo date('Y-m-d'); ?>/'+name);
				$("#Group_logo").val('<?php echo date('Y-m-d'); ?>/'+name);
			}
			</script>
			<br/>
			尺寸 48*48
		</div>

		<?php echo $form->hiddenField($model,'logo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des'); ?>
		<?php echo $form->textArea($model,'des',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pnum'); ?>
		<?php echo $form->textField($model,'pnum'); ?>
		<?php echo $form->error($model,'pnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>

		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model,
		    'attribute'=>'create_time',
		    'language'=>'中文',
		    // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showAnim'=>'fold',
		    ),
		    'htmlOptions'=>array(
		        'style'=>'height:20px;'
		    ),
			));
		?>

		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',$model->statusList); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php echo $form->dropDownList($model,'uid',CHtml::listData(Member::model()->findAll('status = 1'), 'id', 'username')); ?>
		<?php echo $form->error($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag'); ?>
		<?php echo $form->textField($model,'tag',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->