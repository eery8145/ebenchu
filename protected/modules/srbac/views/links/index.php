<?php
/* @var $this LinksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'友情链接',
);

$this->menu=array(
	array('label'=>'创建友情链接', 'url'=>array('create')),
	array('label'=>'管理友情链接', 'url'=>array('admin')),
);
?>

<h1>友情链接</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
