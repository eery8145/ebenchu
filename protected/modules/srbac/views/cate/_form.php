<?php
/* @var $this CateController */
/* @var $model Cate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cate-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->dropDownList($model,'pid',$model->fuleiList); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',$model->typeList); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
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
		<?php echo $form->hiddenField($model,'img',array('size'=>60,'maxlength'=>100)); ?>
		<div style="padding-left:5px;">
		<?php if($model->isNewRecord){ ?>
			<img id="fenleitu" src="/assets/default/images/addpic.jpg" />
		<?php }else{ ?>
			<img id="fenleitu" src="/upload/fenlei/<?php echo $model->img; ?>" />
		<?php } ?>
		
		<?php
            list($s1, $s2) = explode(' ', microtime());     
            $fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
            $fileName.=rand(0,9999);
            
            $filePath = 1; //套系图片路径编号
            
            $this->widget('application.extensions.swfupload.SWFUpload',array(
              'callbackJS'=>'swfupload_callback_fenlei',
              'fileTypes'=> '*.jpg;*.jpeg;*.gif;',
              'filePath'=> $filePath, //指定数组键名
              //'fileName'=>  $fileName, //指定上传后的文件名称 不指定则上传多张图片
              //'after' => 'fenlei', //指定上传完成后的操作
              'button_image_url' => '/assets/default/images/shangchuan.png',
              'button_width' => 74,
              'button_height' => 22,
              'file_upload_limit' => 4,
              'debug' => false
            ));
        ?>
        <script>
			function swfupload_callback_fenlei(name,path,oldname,type,size,width,height){
				$("#fenleitu").attr('src','/upload/fenlei/<?php echo date('Y-m-d'); ?>/'+name);
				$("#Cate_img").val('<?php echo date('Y-m-d'); ?>/'+name);
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

	<div>
		<b>(以下选项仅在分类类型为单页时填写有效)</b>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des'); ?>
		<?php echo $form->textArea($model,'des',array('style'=>'width:300px; height:200px;')); ?>
		<?php echo $form->error($model,'des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'con'); ?>
		<div style="padding-left:5px;">
		<?php $this->widget('ext.kindeditor.KindEditorWidget',array(
		      'id'=>'Cate_con',   //Textarea id
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
		<?php echo $form->textArea($model,'con'); ?>
		</div>
		<?php echo $form->error($model,'con'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->