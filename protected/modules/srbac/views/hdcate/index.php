<?php
/* @var $this HdcateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'活动分类',
);

$this->menu=array(
	array('label'=>'创建活动分类', 'url'=>array('create')),
	array('label'=>'管理活动分类', 'url'=>array('admin')),
);
?>

<h1>活动分类</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
