<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	$model->userid,
);

$this->menu=array(
	array('label'=>'后台用户列表', 'url'=>array('index')),
	array('label'=>'创建后台用户', 'url'=>array('create')),
	array('label'=>'修改后台用户', 'url'=>array('update', 'id'=>$model->userid)),
	array('label'=>'删除后台用户', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->userid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理后台用户', 'url'=>array('admin')),
);
?>

<h1>显示后台用户 #<?php echo $model->userid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'userid',
		'username',
		'password',
		'ip',
		'validate',
		'createtime',
	),
)); ?>
