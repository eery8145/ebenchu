<?php
/* @var $this MemberController */
/* @var $model Member */

$this->breadcrumbs=array(
	'会员'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'会员列表', 'url'=>array('index')),
	array('label'=>'创建会员', 'url'=>array('create')),
	array('label'=>'修改会员', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除会员', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理会员', 'url'=>array('admin')),
);
?>

<h1>显示会员 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'nickname',
		'password',
		'bind_account',
		'last_login_time',
		'last_login_ip',
		'verify',
		'email',
		'remark',
		'create_time',
		'update_time',
		'status',
		'role_id',
		'info',
		'salt',
		'photo',
	),
)); ?>
