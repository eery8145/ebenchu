<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'Topics'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'话题列表', 'url'=>array('index')),
	array('label'=>'创建话题', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#topic-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理话题</h1>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'topic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
  array(
			'id'=>'id', 
            'selectableRows' => 2,
            'footer' => '<button type="button" onclick="deleteAll();" style="width:auto">删除</button>',
            'class' => 'CCheckBoxColumn',
            'headerHtmlOptions' => array('width'=>'33px'),
            'checkBoxHtmlOptions' => array('name' => 'selectdel[]'),
            'htmlOptions'=>array('style'=>'text-align:center; width:50px;')
        ),
		// 'uid',
		array(
			'name'=>'memberOne.nickname',
			'value'=>'$data->memberOne->nickname',
			// 'filter'=>CHtml::listData(Cate::model()->findAll('pid = 0'), 'id', 'name'),
		),
		// 'gid',
		array(
			'name'=>'gid',
			'value'=>'$data->groupOne->name',
			'filter'=>CHtml::listData(Group::model()->findAll('status = 1'), 'id', 'name'),
		),
		'title',
		// 'content',
		'create_time',
		array (
        'class' => 'phaSelectColumn',
        // 'header' => 'Time Zone',
        'name' => 'status',
        'data' => Topic::model()->statusList,
        'actionUrl' => array('setStatus?filed=status'),
        'filter'=>Topic::model()->statusList,
      ),

    array (
        'class' => 'phaSelectColumn',
        // 'header' => 'Time Zone',
        'name' => 'istop',
        'data' => Topic::model()->istopList,
        'actionUrl' => array('setStatus?filed=istop'),
        'filter'=>Topic::model()->istopList,
      ),

		/*
		'response_num',
		'update_time',
		'hot',
		*/
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
		            'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/view", array("id"=>$data->id))',
		        ),
		        'bianji' => array
		        (
		            'label'=>'编辑',
		            'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/update", array("id"=>$data->id))',
		        ),
		        'shanchu' => array
		        (
		            'label'=>'删除',
		            'url'=>'Yii::app()->createUrl("/".Yii::app()->controller->module->name."/".Yii::app()->controller->id."/delete", array("id"=>$data->id))',
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
            $.post('/srbac/topic/delall',{'selectdel[]':data}, function (data) {
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