<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'友情链接'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'友情链接列表', 'url'=>array('index')),
	array('label'=>'创建友情链接', 'url'=>array('create')),
	array('label'=>'显示友情链接', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理友情链接', 'url'=>array('admin')),
);
?>

<h1>修改友情链接 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>