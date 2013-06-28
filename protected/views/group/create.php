    <div class="top3">
        创建小组
    </div>
    <div class="con clear">
            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'create_group',
                    'enableAjaxValidation'=>false,
                     'htmlOptions'=>array('class'=>'left2a'),
            )); ?>
            <!-- <div class="left2c">
                <div class="left2c1">小组类型:</div>
                <div class="left2c2">
                    <div class="left2c3">
                        <?php echo $form->radioButton($model,'type',array('class'=>'inp5','value'=>'1','checked'=>'checked','uncheckValue'=>null)); ?>
                        <div class="left2c31">
                            <div>公开小组</div>
                            <div>
                                辰木的任何成员都可见。<br />
    可以设置成员的加入方式。<br />
    以后可以变为私密小组。
                            </div>

                        </div>
                    </div>
                </div>
                <div class="left2c2 bgcl2">
                    <div class="left2c3">
                       <?php echo $form->radioButton($model,'type',array('class'=>'inp5','value'=>'2','uncheckValue'=>null)); ?>
                        <div class="left2c31">
                            <div>私密小组</div>
                            <div>
                                只有接受组员邀请才能加入小组。<br />
                                <span class="color1">以后永远不能变为公开的小组。</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div> -->
            <div class="left2c">
                <div class="left2c1">小组名称:</div>
                <div class="left2c21 bgcl2">
                    <?php echo $form->textField($model,'name',array('class'=>'inp6','value'=>'')); ?>
                </div>
            </div>
            <div class="left2c">
                <div class="left2c1">小组介绍:</div>
                <div class="left2c21 bgcl2">
                   <?php echo $form->textArea($model,'des',array('class'=>'text1')); ?>
                </div>
            </div>
            <div class="left2c">
                <div class="left2c1">小组标签:</div>
                <div class="left2c21 bgcl2">
                    <?php echo $form->textField($model,'tag',array('class'=>'inp6','value'=>'')); ?>
                    <div class="tag1">
                        标签作为关键词可以被用户搜索到，多个标签之间用空格分隔开。
                    </div>
                </div>
            </div>
            <div class="left2c">
                <div class="left2c1">小组图标:</div>

                <div style="padding-left:5px; float:left;">
                    <?php if($model->isNewRecord){ ?>
                        <img style="width:48px; height:48px;margin-bottom:5px;" id="group_logotu" src="/assets/default/images/addpic.jpg" />
                    <?php }else{ ?>
                        <img style="width:48px; height:48px;margin-bottom:5px;"  id="group_logotu" src="/upload/group_logo/<?php echo $model->logo; ?>" />
                    <?php } ?>

                    <?php echo $form->hiddenField($model,'logo'); ?>

                    <?php
                        list($s1, $s2) = explode(' ', microtime());     
                        $fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
                        $fileName.=rand(0,9999);
                        
                        $filePath = 1; //小组头像图片路径编号
                        
                        $this->widget('application.extensions.swfupload.SWFUpload',array(
                          'callbackJS'=>'swfupload_callback_group_logo',
                          'fileTypes'=> '*.jpg;*.jpeg;*.gif;',
                          'filePath'=> $filePath, //指定数组键名
                          //'fileName'=>  $fileName, //指定上传后的文件名称 不指定则上传多张图片
                          //'after' => 'group_logo', //指定上传完成后的操作
                          'button_image_url' => '/assets/default/images/shangchuan.png',
                          'button_width' => 74,
                          'button_height' => 22,
                          'file_upload_limit' => 4,
                          'debug' => false
                        ));
                    ?>
                    <script>
                        function swfupload_callback_group_logo(name,path,oldname,type,size,width,height){
                            $("#group_logotu").attr('src','/upload/group_logo/<?php echo date('Y-m-d'); ?>/'+name);
                            $("#Group_logo").val('<?php echo date('Y-m-d'); ?>/'+name);
                        }
                    </script>
                </div>
            </div>
            <div class="left2c">
                <div class="left2c21 bgcl2" style="padding-left:75px;">
                    <a href="javascript:void(0)" id="sub"><img src="<?php echo  IMAGES_PATH; ?>shenqing.jpg" /></a>
                </div>
            </div>
        <?php $this->endWidget(); ?>
        <div class="right5a">
            <div class="right5a1">小组创建  · · · · · ·</div>
            <div class="right5a2">小组需要审核通过后才能完成创建,管理员会在3日内审核 申请, 审核结果会用邮通知你,请耐心等待。</div>
            <div class="right5a1">小组标签  · · · · · ·</div>
            <div class="right5a2">小组可以有不超过5个的标签，用来描述小组的目的。标签作为关键词可以被用户搜索到。 多个标签之间用空格分隔开。 </div>
            <div class="right5a2">比如，"Philip K. Dick小组"可以用 "作者 作家 科幻 科学幻想 迪克"， "关中辰木" 可以用 "本地 同城 西北 陕西 西安"。小组名称本身可以被搜索，就不用再加在标签里了。 小组的名称、介绍、标签在创立后都可以随时更改。 </div>
        </div>
        
    </div>

    <script>
//验证提示
$('#create_group').ajaxForm({
    dataType:'json',
    success:function(data) {
      var items = [];
      $.each(data,function(key, val){var tem=[key,val];items.push(tem)});
      var length = items.length;
      if(data.status != 1){
        //items[i][0]错误节点名称
        //items[i][1]对应错误提示
        for(var i=0;i<length;i++){  
            alert(items[i][1]);
            return false;
        }
      }else{
        alert('创建小组成功');
        window.location.href="<?php echo Yii::app()->createUrl('group/mine'); ?>";
      }
    }
  });

//提交验证
$('#sub').click( 
    function(){
        $('#create_group').submit();
        return false;
  }
);
</script>