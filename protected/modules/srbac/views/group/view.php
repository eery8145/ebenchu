<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'小组'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'小组列表', 'url'=>array('index')),
	array('label'=>'创建小组', 'url'=>array('create')),
	array('label'=>'修改小组', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除小组', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理小组', 'url'=>array('admin')),
);
?>

<h1>显示小组 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tid',
		'name',
		'logo',
		'des',
		'sort',
		'pnum',
		'create_time',
		'status',
		'type',
		'uid',
		'tag',
	),
)); ?>
