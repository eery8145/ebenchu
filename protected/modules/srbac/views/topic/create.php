<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'话题'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'话题列表', 'url'=>array('index')),
	array('label'=>'管理话题', 'url'=>array('admin')),
);
?>

<h1>创建话题</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>