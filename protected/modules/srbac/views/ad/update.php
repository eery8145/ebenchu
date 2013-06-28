<?php
/* @var $this AdController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'广告'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'广告列表', 'url'=>array('index')),
	array('label'=>'创建广告', 'url'=>array('create')),
	array('label'=>'显示广告', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理广告', 'url'=>array('admin')),
);
?>

<h1>修改广告 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>