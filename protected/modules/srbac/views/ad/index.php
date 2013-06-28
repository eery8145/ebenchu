<?php
/* @var $this AdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'广告',
);

$this->menu=array(
	array('label'=>'创建广告', 'url'=>array('create')),
	array('label'=>'管理广告', 'url'=>array('admin')),
);
?>

<h1>广告</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
