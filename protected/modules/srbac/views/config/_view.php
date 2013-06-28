<?php
/* @var $this ConfigController */
/* @var $data Config */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_name')); ?>:</b>
	<?php echo CHtml::encode($data->site_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_url')); ?>:</b>
	<?php echo CHtml::encode($data->site_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seo_description')); ?>:</b>
	<?php echo CHtml::encode($data->seo_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seo_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->seo_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_logo')); ?>:</b>
	<?php echo CHtml::encode($data->site_logo); ?>
	<br />


</div>