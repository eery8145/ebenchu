<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带*号的为必填项</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cateId'); ?>
		<?php echo $form->dropDownList($model,'cateId',CHtml::listData(Cate::model()->findAll('type = 1'), 'id', 'name')); ?>
		<?php echo $form->error($model,'cateId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des'); ?>
		<?php echo $form->textArea($model,'des',array('style'=>'width:200px; height:100px;')); ?>
		<?php echo $form->error($model,'des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<div style="padding-left:5px;">
			<?php $this->widget('ext.kindeditor.KindEditorWidget',array(
			      'id'=>'Article_content',   //Textarea id
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
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		</div>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
			<div style="padding-left:5px;">
			<?php if($model->isNewRecord){ ?>
				<img id="articletu" src="/assets/default/images/addpic.jpg" />
			<?php }else{ ?>
				<img id="articletu" src="/upload/article/<?php echo $model->img; ?>" />
			<?php } ?>
			
			<?php
          list($s1, $s2) = explode(' ', microtime());     
          $fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
          $fileName.=rand(0,9999);
          
          $filePath = 4; //文章图片路径编号
          
          $this->widget('application.extensions.swfupload.SWFUpload',array(
            'callbackJS'=>'swfupload_callback_article',
            'fileTypes'=> '*.jpg;*.jpeg;*.gif;',
            'filePath'=> $filePath, //指定数组键名
            //'fileName'=>  $fileName, //指定上传后的文件名称 不指定则上传多张图片
            //'after' => 'article', //指定上传完成后的操作
            'button_image_url' => '/assets/default/images/shangchuan.png',
            'button_width' => 74,
            'button_height' => 22,
            'file_upload_limit' => 4,
            'debug' => false
          ));
	      ?>
	      <script>
			function swfupload_callback_article(name,path,oldname,type,size,width,height){
				$("#articletu").attr('src','/upload/article/<?php echo date('Y-m-d'); ?>/'+name);
				$("#Article_img").val('<?php echo date('Y-m-d'); ?>/'+name);
			}
		</script>
		</div>
		<?php echo $form->hiddenField($model,'img',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'click'); ?>
		<?php echo $form->textField($model,'click'); ?>
		<?php echo $form->error($model,'click'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',$model->statusList); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textField($model,'source',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'top'); ?>
		<?php echo $form->textField($model,'top'); ?>
		<?php echo $form->error($model,'top'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '修改'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->