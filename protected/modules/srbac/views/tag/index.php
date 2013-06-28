<?php
/* @var $this TagController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'标签',
);

$this->menu=array(
	array('label'=>'创建标签', 'url'=>array('create')),
	array('label'=>'管理标签', 'url'=>array('admin')),
);
?>

<h1>标签</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
