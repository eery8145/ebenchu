<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'网站设置'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'网站设置列表', 'url'=>array('index')),
	array('label'=>'创建网站设置', 'url'=>array('create')),
	array('label'=>'修改网站设置', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除网站设置', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理网站设置', 'url'=>array('admin')),
);
?>

<h1>显示网站设置 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'site_name',
		'site_url',
		'seo_description',
		'seo_keywords',
		'site_logo',
	),
)); ?>
