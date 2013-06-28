<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'小组'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'小组列表', 'url'=>array('index')),
	array('label'=>'管理小组', 'url'=>array('admin')),
);
?>

<h1>创建小组</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>