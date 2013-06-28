<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'话题'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'话题列表', 'url'=>array('index')),
	array('label'=>'创建话题', 'url'=>array('create')),
	array('label'=>'显示话题', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理话题', 'url'=>array('admin')),
);
?>

<h1>修改话题 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>