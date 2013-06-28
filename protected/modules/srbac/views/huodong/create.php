<?php
/* @var $this HuodongController */
/* @var $model Huodong */

$this->breadcrumbs=array(
	'活动'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'活动列表', 'url'=>array('index')),
	array('label'=>'管理活动', 'url'=>array('admin')),
);
?>

<h1>创建活动</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>