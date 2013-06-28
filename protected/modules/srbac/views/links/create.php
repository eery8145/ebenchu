<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'友情链接'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'友情链接列表', 'url'=>array('index')),
	array('label'=>'管理友情链接', 'url'=>array('admin')),
);
?>

<h1>创建友情链接</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>