<?php
/* @var $this HdcateController */
/* @var $model Hdcate */

$this->breadcrumbs=array(
	'活动分类'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'活动分类列表', 'url'=>array('index')),
	array('label'=>'管理活动分类', 'url'=>array('admin')),
);
?>

<h1>创建活动分类</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>