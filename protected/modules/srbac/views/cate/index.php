<?php
/* @var $this CateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'文章分类',
);

$this->menu=array(
	array('label'=>'创建文章分类', 'url'=>array('create')),
	array('label'=>'管理文章分类', 'url'=>array('admin')),
);
?>

<h1>文章分类</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
