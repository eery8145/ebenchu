<?php
/* @var $this HdcateController */
/* @var $model Hdcate */

$this->breadcrumbs=array(
	'活动分类'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'活动分类列表', 'url'=>array('index')),
	array('label'=>'创建活动分类', 'url'=>array('create')),
	array('label'=>'修改活动分类', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除活动分类', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理活动分类', 'url'=>array('admin')),
);
?>

<h1>显示活动分类 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pid',
		'name',
		'create_time',
	),
)); ?>
