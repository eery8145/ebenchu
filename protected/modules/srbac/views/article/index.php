<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'文章',
);

$this->menu=array(
	array('label'=>'创建文章', 'url'=>array('create')),
	array('label'=>'管理文章', 'url'=>array('admin')),
);
?>

<h1>文章</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
