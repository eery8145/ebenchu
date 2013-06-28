<?php
/* @var $this TopicController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'话题',
);

$this->menu=array(
	array('label'=>'创建话题', 'url'=>array('create')),
	array('label'=>'管理话题', 'url'=>array('admin')),
);
?>

<h1>话题</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
