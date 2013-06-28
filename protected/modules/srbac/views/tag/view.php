<?php
/* @var $this TagController */
/* @var $model Tag */

$this->breadcrumbs=array(
	'标签'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'标签列表', 'url'=>array('index')),
	array('label'=>'创建标签', 'url'=>array('create')),
	array('label'=>'修改标签', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除标签', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理标签', 'url'=>array('admin')),
);
?>

<h1>显示标签 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pid',
		'title',
		'sort',
		'createtime',
	),
)); ?>
