<?php
/* @var $this HdcateController */
/* @var $model Hdcate */

$this->breadcrumbs=array(
	'活动分类'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'活动分类列表', 'url'=>array('index')),
	array('label'=>'创建活动分类', 'url'=>array('create')),
	array('label'=>'显示活动分类', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理活动分类', 'url'=>array('admin')),
);
?>

<h1>修改活动分类 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>