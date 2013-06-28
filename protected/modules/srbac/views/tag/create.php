<?php
/* @var $this TagController */
/* @var $model Tag */

$this->breadcrumbs=array(
	'标签'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'标签列表', 'url'=>array('index')),
	array('label'=>'管理标签', 'url'=>array('admin')),
);
?>

<h1>创建标签</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>