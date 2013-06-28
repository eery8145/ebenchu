<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'后台用户列表', 'url'=>array('index')),
	array('label'=>'管理后台用户', 'url'=>array('admin')),
);
?>

<h1>创建后台用户</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>