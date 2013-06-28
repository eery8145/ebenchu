<?php
/* @var $this HuodongController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'活动',
);

$this->menu=array(
	array('label'=>'创建活动', 'url'=>array('create')),
	array('label'=>'管理活动', 'url'=>array('admin')),
);
?>

<h1>活动</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
