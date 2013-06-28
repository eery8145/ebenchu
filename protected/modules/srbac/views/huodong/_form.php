<?php
/* @var $this HuodongController */
/* @var $model Huodong */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'huodong-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php echo $form->dropDownList($model,'uid',CHtml::listData(Member::model()->findAll('status = 1'), 'id', 'nickname')); ?>
		<?php echo $form->error($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cid'); ?>
		<?php echo $form->dropDownList($model,'cid',CHtml::listData(Hdcate::model()->findAll('pid != 0'), 'id', 'name')); ?>
		<?php echo $form->error($model,'cid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feiyong'); ?>
		<?php echo $form->textField($model,'feiyong',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'feiyong'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zhuban'); ?>
		<?php echo $form->textField($model,'zhuban',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'zhuban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
		<div style="padding-left:5px;">
			<?php $this->widget('ext.kindeditor.KindEditorWidget',array(
			      'id'=>'Huodong_info',   //Textarea id
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
		<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
		</div>
		<?php echo $form->error($model,'info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>
		<?php echo $form->hiddenField($model,'logo',array('size'=>60,'maxlength'=>100)); ?>
		<div style="padding-left:5px;">
		<?php if($model->isNewRecord){ ?>
			<img id="huodongtu" src="/assets/default/images/addpic.jpg" />
		<?php }else{ ?>
			<img id="huodongtu" src="/upload/huodong/<?php echo $model->logo; ?>" />
		<?php } ?>
		
		<?php
            list($s1, $s2) = explode(' ', microtime());     
            $fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
            $fileName.=rand(0,9999);
            
            $filePath = 1; //套系图片路径编号
            
            $this->widget('application.extensions.swfupload.SWFUpload',array(
              'callbackJS'=>'swfupload_callback_huodong',
              'fileTypes'=> '*.jpg;*.jpeg;*.gif;',
              'filePath'=> $filePath, //指定数组键名
              //'fileName'=>  $fileName, //指定上传后的文件名称 不指定则上传多张图片
              //'after' => 'huodong', //指定上传完成后的操作
              'button_image_url' => '/assets/default/images/shangchuan.png',
              'button_width' => 74,
              'button_height' => 22,
              'file_upload_limit' => 4,
              'debug' => false
            ));
        ?>
        <script>
			function swfupload_callback_huodong(name,path,oldname,type,size,width,height){
				$("#huodongtu").attr('src','/upload/huodong/<?php echo date('Y-m-d'); ?>/'+name);
				$("#Huodong_logo").val('<?php echo date('Y-m-d'); ?>/'+name);
			}
		</script>
		</div>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->