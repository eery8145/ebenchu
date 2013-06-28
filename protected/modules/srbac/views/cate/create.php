<?php
/* @var $this CateController */
/* @var $model Cate */

$this->breadcrumbs=array(
	'文章分类'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'文章分类列表', 'url'=>array('index')),
	array('label'=>'管理文章分类', 'url'=>array('admin')),
);
?>

<h1>创建文章分类</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>