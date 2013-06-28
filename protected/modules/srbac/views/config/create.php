<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'网站设置'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'网站设置列表', 'url'=>array('index')),
	array('label'=>'管理网站设置', 'url'=>array('admin')),
);
?>

<h1>创建网站设置</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>