<?php
/* @var $this HuodongController */
/* @var $model Huodong */

$this->breadcrumbs=array(
	'活动'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'活动列表', 'url'=>array('index')),
	array('label'=>'创建活动', 'url'=>array('create')),
	array('label'=>'显示活动', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理活动', 'url'=>array('admin')),
);
?>

<h1>修改活动 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>