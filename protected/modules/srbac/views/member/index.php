<?php
/* @var $this MemberController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'会员',
);

$this->menu=array(
	array('label'=>'创建会员', 'url'=>array('create')),
	array('label'=>'管理会员', 'url'=>array('admin')),
);
?>

<h1>会员</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
