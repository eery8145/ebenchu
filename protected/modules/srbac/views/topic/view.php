<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'话题'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'话题列表', 'url'=>array('index')),
	array('label'=>'创建话题', 'url'=>array('create')),
	array('label'=>'修改话题', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除话题', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理话题', 'url'=>array('admin')),
);
?>

<h1>显示话题 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid',
		'gid',
		'title',
		'content',
		'create_time',
		'status',
		'response_num',
		'update_time',
		'hot',
	),
)); ?>
