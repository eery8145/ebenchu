<?php
/* @var $this AdController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'广告'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'广告列表', 'url'=>array('index')),
	array('label'=>'管理广告', 'url'=>array('admin')),
);
?>

<h1>创建广告</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>