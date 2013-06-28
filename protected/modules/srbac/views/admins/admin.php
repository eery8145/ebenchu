<?php
/* @var $this AdminsController */
/* @var $model Admins */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'后台用户列表', 'url'=>array('index')),
	array('label'=>'创建后台用户', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#admins-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理后台用户</h1>



<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admins-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'userid',
		'username',
		// 'password',
		'ip',

        array(
            'name'=>'validate',
            'value'=>'$data->statusName',
            'filter'=>Cate::model()->statusList,
        ),

		'createtime',
		array(
      'class'=>'CButtonColumn',
      'template'=>'{xianshi} {bianji} {shanchu}',
      'htmlOptions' => array(
        'style'=>'width:100px; text-align:center;'
      ),
      'buttons'=>array
        (
          'xianshi' => array
            (
                'label'=>'显示',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/view", array("id"=>$data->userid))',
            ),
            'bianji' => array
            (
                'label'=>'编辑',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/update", array("id"=>$data->userid))',
            ),
            'shanchu' => array
            (
                'label'=>'删除',
                'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/delete", array("id"=>$data->userid))',
            ),
        ),
      ),
	),
)); ?>
<script type="text/javascript">
    /*<![CDATA[*/
    var deleteAll = function (){
        var data=new Array();
        $("input:checkbox[name='selectdel[]']").each(function (){
			if($(this).attr("checked")=="checked"){
                data.push($(this).val());
            }
        });
        if(data.length > 0){
            $.post('http://www.ebc.com/srbac/admins/delall',{'selectdel[]':data}, function (data) {
            	var json = eval('(' + data + ')'); 
        	    if(json.statu == 0){
        	    	var length = $("input:checked").length;
        	    	for(var i=0;i<=length;i++){
        	    		$("input:checked").eq(i).parent().parent().hide();
        	    	}
					ymPrompt.succeedInfo("删除成功");
				}else{
					ymPrompt.succeedInfo("删除失败");
				}
            });
        }else{
        	ymPrompt.errorInfo('请选择要删除的关键字');
        }
    }
    /*]]>*/
</script>