<?php
/* @var $this MemberController */
/* @var $model Member */

$this->breadcrumbs=array(
	'会员'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'会员列表', 'url'=>array('index')),
	array('label'=>'创建会员', 'url'=>array('create')),
	array('label'=>'显示会员', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理会员', 'url'=>array('admin')),
);
?>

<h1>修改会员 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>