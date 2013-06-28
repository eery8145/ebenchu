<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'友情链接'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'友情链接列表', 'url'=>array('index')),
	array('label'=>'创建友情链接', 'url'=>array('create')),
	array('label'=>'修改友情链接', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除友情链接', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理友情链接', 'url'=>array('admin')),
);
?>

<h1>显示友情链接 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'url',
		'img',
		'sort',
		'create_time',
		'status',
	),
)); ?>
