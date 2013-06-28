<?php
/* @var $this ConfigController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'网站设置',
);

$this->menu=array(
	array('label'=>'创建网站设置', 'url'=>array('create')),
	array('label'=>'管理网站设置', 'url'=>array('admin')),
);
?>

<h1>网站设置</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
