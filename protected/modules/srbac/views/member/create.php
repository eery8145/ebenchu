<?php
/* @var $this MemberController */
/* @var $model Member */

$this->breadcrumbs=array(
	'会员'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'会员列表', 'url'=>array('index')),
	array('label'=>'管理会员', 'url'=>array('admin')),
);
?>

<h1>创建会员</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>