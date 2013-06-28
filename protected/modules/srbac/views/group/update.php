<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'小组'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'小组列表', 'url'=>array('index')),
	array('label'=>'创建小组', 'url'=>array('create')),
	array('label'=>'显示小组', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理小组', 'url'=>array('admin')),
);
?>

<h1>修改小组 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>