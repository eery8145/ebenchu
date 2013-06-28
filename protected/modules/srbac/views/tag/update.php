<?php
/* @var $this TagController */
/* @var $model Tag */

$this->breadcrumbs=array(
	'标签'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'标签列表', 'url'=>array('index')),
	array('label'=>'创建标签', 'url'=>array('create')),
	array('label'=>'显示标签', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理标签', 'url'=>array('admin')),
);
?>

<h1>修改标签 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>