<?php
/* @var $this AdController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'广告'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'广告列表', 'url'=>array('index')),
	array('label'=>'创建广告', 'url'=>array('create')),
	array('label'=>'修改广告', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除广告', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理广告', 'url'=>array('admin')),
);
?>

<h1>显示广告 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'url',
		'status',
		'create_time',
		'sort',
		'img',
		'type',
	),
)); ?>
