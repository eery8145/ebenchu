<div class="top3">
      修改话题
</div>

<div class="con clear">
    <div class="leftx">
         <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'addtopic_group',
                    'enableAjaxValidation'=>false,
                     'htmlOptions'=>array('class'=>'left2a'),
            )); ?>
    
            <div class="left2c">
                <div class="left2c1">标题:</div>
                <div class="left2c21 bgcl2">
                    <?php echo $form->textField($model,'title',array('class'=>'inptopic')); ?>
                </div>
            </div>
            <div class="left2c">
                <div class="left2c1">内容:</div>
                <div class="left2c21 bgcl2">
                    <?php $this->widget('ext.kindeditor.KindEditorWidget',array(
                          'id'=>'Topic_content', //Textarea id
                          'ajax'=>true,  //ajax提交时设置内容同步
                          // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
                          'items' => array(
                              'width'=>'470px',
                              'height'=>'300px',
                              'themeType'=>'simple',
                              'allowImageUpload'=>true,
                              'allowFileManager'=>true,
                              
                              'items'=>array(
                                  'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
                                  'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
                                  'justifyright', 'insertorderedlist','insertunorderedlist', '|',
                                  'emoticons', 'image', 'link'
                              )
                             
                          ),

                    )); ?>
                   <?php echo $form->textArea($model,'content',array('class'=>'text1')); ?>

                </div>
            </div>
        
            <div class="left2c">
                <div class="left2c21 bgcl2" style="padding-left:75px;">
                    <a href="javascript:void(0)" id="sub"><img src="<?php echo  IMAGES_PATH; ?>shenqing.jpg" /></a>
                </div>
            </div>
        <?php $this->endWidget(); ?>
    </div>


    <div class="rightx">
<!--         <div class="right6">友情小组</div>
        <div class="xiaozu">
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
        </div> -->
 
        <div class="right6"> <a href="<?php echo Yii::app()->createUrl('group/topic',array('id'=>$model->id)); ?>">返回>> <?php echo $model->title;  ?></a></div>
 
          <!--   <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> </div> -->
        </div>
        <!-- <div class="xiaozu2"> > <a href="#">浏览所有非常牛逼娴熟的高端职业玩家 (43802)</a> <br />
            > <a href="#">邀请好友</a> <br />
        </div>
        <div class="right6">这个小组的非常牛逼娴熟的高端职业玩家也喜欢去</div>
        <div class="xiaozu">
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
            <div class="xiaozu1"> <a href="#"><img src="<?php echo  IMAGES_PATH; ?>tu6.jpg" /></a> <br />
                <a href="#">wow小白小组</a> (11263) </div>
        </div> -->
    </div>
    
</div>
<script>
 $('#addtopic_group').ajaxForm({
    dataType:'json',
    success:function processJson(data) {
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
        alert('修改成功');
         location.href = "<?php echo Yii::app()->createUrl('group/topic'); ?>/"+data.id; 
      }
    }
  });
$("#sub").click(
  function(){
    $('#addtopic_group').submit();
    return false;
  }
);
</script>

