<?php
/* @var $this GroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'小组',
);

$this->menu=array(
	array('label'=>'创建小组', 'url'=>array('create')),
	array('label'=>'管理小组', 'url'=>array('admin')),
);
?>

<h1>小组</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
