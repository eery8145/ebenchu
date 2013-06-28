<?php
/* @var $this HuodongController */
/* @var $model Huodong */

$this->breadcrumbs=array(
	'活动'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'活动列表', 'url'=>array('index')),
	array('label'=>'创建活动', 'url'=>array('create')),
	array('label'=>'修改活动', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除活动', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理活动', 'url'=>array('admin')),
);
?>

<h1>显示活动 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid',
		'cid',
		'title',
		'time',
		'address',
		'feiyong',
		'zhuban',
		'info',
		'logo',
		'create_time',
	),
)); ?>
