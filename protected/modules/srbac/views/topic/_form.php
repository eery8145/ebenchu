<?php
/* @var $this TopicController */
/* @var $model Topic */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'topic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>

		<?php echo $form->dropDownList($model,'uid',CHtml::listData(Member::model()->findAll(''), 'id', 'username')); ?>

		<?php echo $form->error($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gid'); ?>
		<?php echo $form->dropDownList($model,'gid',CHtml::listData(Group::model()->findAll('status = 1'), 'id', 'name')); ?>
		<?php echo $form->error($model,'gid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>

		<div style="padding-left:5px;">
		<?php $this->widget('ext.kindeditor.KindEditorWidget',array(
		      'id'=>'Topic_content',   //Textarea id
		      // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
		      'items' => array(
		          'width'=>'700px',
		          'height'=>'300px',
		          'themeType'=>'simple',
		          'allowImageUpload'=>true,
		          'allowFileManager'=>true,
				  
		          'items'=>array(
		              'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
		              'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
		              'justifyright', 'insertorderedlist','insertunorderedlist', '|',
		              'emoticons', 'image', 'link')
		      ),
		)); ?>
		<?php echo $form->textArea($model,'content'); ?>
		</div>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<!-- <div class="row">
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
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',$model->statusList); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'response_num'); ?>
		<?php echo $form->textField($model,'response_num'); ?>
		<?php echo $form->error($model,'response_num'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model,
		    'attribute'=>'update_time',
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
		<?php echo $form->error($model,'update_time'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'hot'); ?>
		<?php echo $form->textField($model,'hot'); ?>
		<?php echo $form->error($model,'hot'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->