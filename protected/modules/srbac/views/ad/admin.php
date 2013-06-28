<?php
/* @var $this AdController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'Ads'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'广告列表', 'url'=>array('index')),
	array('label'=>'创建广告', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ad-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理广告</h1>



<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
array(
			'id'=>'id', 
            'selectableRows' => 2,
            'footer' => '<button type="button" onclick="deleteAll();" style="width:50px">删除</button>',
            'class' => 'CCheckBoxColumn',
            'headerHtmlOptions' => array('width'=>'33px'),
            'checkBoxHtmlOptions' => array('name' => 'selectdel[]'),
            'htmlOptions'=>array('style'=>'text-align:center; width:50px;')
        ),
		'title',
		'url',
		array(
            'name'=>'status',
            'value'=>'$data->statusName',
            'filter'=>Article::model()->statusList,
        ),
		'sort',
		array(
            'name'=>'img',
            'type'=>'raw',
            'value'=>'CHtml::image($data->imgLink,$data->title,array("width"=>100,"height"=>100))',
        ),
        array(
            'name'=>'create_time',
            'value'=>'$data->timestr',
        ),
		/*
		'type',
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
            $.post('/srbac/ad/delall',{'selectdel[]':data}, function (data) {
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