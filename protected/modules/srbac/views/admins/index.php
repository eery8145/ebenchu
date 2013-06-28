<?php
/* @var $this AdminsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'后台用户',
);

$this->menu=array(
	array('label'=>'创建后台用户', 'url'=>array('create')),
	array('label'=>'管理后台用户', 'url'=>array('admin')),
);
?>

<h1>后台用户</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
