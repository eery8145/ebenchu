<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'文章'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'文章列表', 'url'=>array('index')),
	array('label'=>'管理文章', 'url'=>array('admin')),
);
?>

<h1>创建文章</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>