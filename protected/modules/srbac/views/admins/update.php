<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'后台用户'=>array('index'),
	$model->userid=>array('view','id'=>$model->userid),
	'Update',
);

$this->menu=array(
	array('label'=>'后台用户列表', 'url'=>array('index')),
	array('label'=>'创建后台用户', 'url'=>array('create')),
	array('label'=>'显示后台用户', 'url'=>array('view', 'id'=>$model->userid)),
	array('label'=>'管理后台用户', 'url'=>array('admin')),
);
?>

<h1>修改后台用户 <?php echo $model->userid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>