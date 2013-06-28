<link rel="stylesheet" type="text/css" href="/js/applelike/styles.css" />
<div class="top3"><?php echo $model->title; ?></div>
<div class="con clear">
    <div class="leftx">
        <div class="leftxb">
            <div class="leftxb1">
                <a href="<?php echo  $model->memberOne->kongjian; ?>"><img style="width:48px; height:48px;" src="<?php echo  $model->memberOne->imgLink; ?>"  /></a>
            </div>
            <div class="leftxb2">
                <div class="leftxb21">来自: <a href="<?php echo  $model->memberOne->kongjian; ?>"><?php echo  $model->memberOne->nickname; ?></a> <?php echo date('Y-m-d H:i:s',$model->create_time) ?>

                    <?php if($model->memberOne->id==Yii::app()->user->id){?>
                     <span class="bianji"><a  href="<?php echo Yii::app()->createUrl('group/edittopic',array('tid'=>$model->id)); ?>">编辑</a></span>
                    <?php }  ?>
                   


                </div>
                <div class="leftxb22">

                    <?php
                        $content = $model->content;
                        $content = preg_replace('@(<img src="/attached/image.*".*/>)@Usi', "<div class='webpage'>$1<div class='retina'></div></div>", $content);
                    ?>

                    <?php echo $content; ?>
                </div>
                <div class="leftxb23">
                   <!--  <a href="#" class="leftxb231"><img src="<?php echo IMAGES_PATH ?>tj.jpg" /></a>
                    <a href="#" class="leftxb232"><img src="<?php echo IMAGES_PATH ?>xh.jpg" /></a> -->
                </div>
            </div>
        </div>
        <div class="leftxc">
            <div class="leftxc1">
               <!-- <a href="#">回应</a>
                 <a href="#">推荐</a>
                <a href="#">喜欢</a> -->
            </div>
            <?php if(!empty($_GET['uid'])){?>
  <div class="leftxc2">
                <a href="<?php echo Yii::app()->createUrl('group/topic',array('id'=>$model->id)); ?>">查看所有</a>
            </div>
           <?php  }else{?>
  <div class="leftxc2">
                <a href="<?php echo Yii::app()->createUrl('group/topic',array('id'=>$model->id,'uid'=>$model->memberOne->id)); ?>">只看楼主</a>
            </div>
           <?php } ?>
          
        </div>
<style type="text/css">
    .recomment {
    background: none repeat scroll 0 0 #F8F8F8;
    border-color: #DDDDDD;
    border-style: dashed;
    border-width: 1px;
    color: #666666;
    font-size: 12px;
    padding: 10px;
}
</style>



        <?php foreach($responseList as  $key => $value){?>
            <div class="leftxb">
                <div class="leftxb1">
                    <a href="<?php echo Yii::app()->createUrl('kongjian/index',array('uid'=>$value->memberOne->id)); ?>"><img src="<?php echo IMAGES_USER_PHOTO.$value->memberOne->photo ?> " width="48" height="48" /></a>
                </div>
           
                <div class="leftxb22">
                    <div class="leftxb211"><a href="<?php echo Yii::app()->createUrl('kongjian/index',array('uid'=>$value->memberOne->id)); ?>"><?php echo $value->memberOne->nickname  ?> </a><?php echo date('Y-m-d H:i:s',$value->create_time); ?></div>
                      <?php if(!empty($value->pid)){?>
                        <DIV class=recomment><A 
                        href=""><IMG 
                        align=absMiddle src="<?php echo IMAGES_USER_PHOTO.$value->huifuOne->memberOne->photo ?>" width="24" heigth="24"></A> <STRONG><A 
                        href="<?php echo Yii::app()->createUrl('kongjian/index',array('uid'=>$value->huifuOne->memberOne->id)); ?>"><?php echo $value->huifuOne->memberOne->nickname ?></A></STRONG>：
                        <?php if($value->huifuOne->status==0){?>
                                <span style="color:red">原文已被作者删除</span>
                        <?php }else{?>

                            <?php $this->beginWidget('CHtmlPurifier'); ?>
                                  <?php echo  $value->huifuOne->content  ?>
                            <?php $this->endWidget(); ?>

                        <?php } ?>
 
                      </DIV> 

                       <?php } ?>
                    <div class="leftxb213">
                        <?php $this->beginWidget('CHtmlPurifier'); ?>
                            <?php echo $value->content;  ?>
                        <?php $this->endWidget(); ?>
                    </div>

<?php   if(!Yii::app()->user->isGuest){  ?>

                <?php if($value->uid==Yii::app()->user->id){?>
                    <div class="leftxbhy">
                    <a href="javascript:void(0)" pid="<?php echo $value->id  ?>" class="del">删除</a>
                    </div>
                <?php }else{?>
                      
                    <div class="leftxbhy">
                    <a href="javascript:void(0)" pid="<?php echo $value->id  ?>" class="gohy">回应</a>
                    </div>
                <?php }?>
 
             <?php }?>




                </div>
                
            </div>
        <?php }  ?>



            <script>
            $('.leftxb22').hover(function(){
                $(this).find('.leftxbhy').show();
            },function(){
                $(this).find('.leftxbhy').hide();
            });

            $('.gohy').click(function(){
                
                var content=$(this).parent().prev().html();
                var name=$(this).parent().parent().find('.leftxb211').html();
                $('#Response_pid').val($(this).attr('pid'));
                $('.leftxb221').show().html(content+'&nbsp'+name);
                $('.leftxb222').show();
                $("html,body").animate({scrollTop:$("#huiying").offset().top},1000);
            });

            $("#quxiao").live("click",function(){
                $('.leftxb221').html('').hide();
                $('.leftxb222').hide();
                $('#Response_pid').val('0');
            });


        

            </script>

           <div id="pager">    
                <?php    
                    $this->widget('CLinkPager',array(    
                        'header'=>'',    
                        'firstPageLabel' => '首页',    
                        'lastPageLabel' => '末页',    
                        'prevPageLabel' => '上一页',    
                        'nextPageLabel' => '下一页',    
                        'pages' => $pages, 
                        'cssFile'=>CSS_PATH.'pager_res.css',
                        'maxButtonCount'=>5    
                    )    
                    );    
                ?>    
            </div> 
             <div class="leftxb212" id="huiying">

                你的回应
                <div class="leftxb221"> 
                </div>
                <div class="leftxb222"><a href="javascript:void(0)" id="quxiao">× </a></div>

             </div>

            <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'response_topic',
                        'enableAjaxValidation'=>false,
                         'htmlOptions'=>array('class'=>'left2a'),
            )); ?>
           
            <div class="left2c21 bgcl2">
               <?php echo $form->textArea($response,'content',array('class'=>'texttopic')); ?>
            
            </div>
            <div class="left2c21 bgcl2">
               <?php echo $form->hiddenField($response,'fcontent'); ?>
            
            </div>
            <div class="left2c21 bgcl2">
               <?php echo $form->hiddenField($response,'pid',array('value'=>'0')); ?>
            
            </div>
            <div class="left2c">
                <div class="left2c21 bgcl2" style=" margin-top:20px;">
                    <a href="javascript:void(0)" id="sub"><img src="<?php echo  IMAGES_PATH; ?>shenqing.jpg" /></a>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        
    </div>
    <div class="rightx">
<!--         <div class="rightx1">
            <div class="rightx11"><a href="#"><img src="images/tu8.jpg" /></a></div>
            <div class="rightx12">
                <div class="rightx121"><a href="#">成都辰木</a></div>
                <div class="rightx122">辰木新增功能：成都小站上线 http://site.douban.com/106925/ 成都辰木YY频道：★40364510【新】 成都辰木QQ群：49911873【满】 成都辰木80后群：48903391【满】 成都辰木90后群：★64117162 【新】 成都辰木FB群：★77976556【新】（聚会交友、技能交换） ★★成都辰木靠谱恋爱群：136792819【新】（婚恋交友、杜...</div>
            </div>
            <div class="rightx13">
                56309 人聚集在这个小组，<br />
                你是否愿意成为其中的一员？<br />
                <a href="#"><img src="images/jiaru.jpg" /></a>
            </div>
        </div> -->
        <div class="rightx2">
            <div class="rightx21">最新话题(<a href="#">更多</a>)</div>
            <?php foreach ($newTopic as $key => $value) {?>
                <div class="rightx22" style="overflow:hidden; clear:both;">
                    <a style="float:left;" href="<?php echo  $value->link; ?>"><?php echo Helper::truncate_utf8_string($value->title,15);  ?></a>   
                    <span style="float:right;">(<a href="<?php echo $value->memberOne->kongjian;  ?>"><?php echo $value->memberOne->nickname  ?></a>)<?php echo $value->response_num ?>回应</span>
                </div>
            <?php }?>
           
      
        </div>
        <div class="rightx2">
            <div class="rightx21">全站热点话题</div>
          
            <?php foreach ($hotTopic as $key => $value) {?>
                <div class="rightx22" style="overflow:hidden; clear:both;">
                    <a style="float:left;" href="<?php echo  $value->link; ?>"><?php echo Helper::truncate_utf8_string($value->title,15);  ?></a>   
                    <span style="float:right;">(<a href="<?php echo $value->memberOne->kongjian;  ?>"><?php echo $value->memberOne->nickname  ?></a>)<?php echo $value->response_num ?>回应</span>
                </div>
            <?php }?>
        </div>
    </div>
    
</div>
<?php   if(Yii::app()->user->isGuest){  ?>
<script>
 $('#sub').click(function(){
        var r=confirm("您尚未登陆，是否登陆？");
        if(r){
            location.href = "<?php echo Yii::app()->createUrl('public/login'); ?>"; 
        }else{
            return false;
        }
        return false;
    });
</script>
<?php }else{?>
<script>
 $('#response_topic').ajaxForm({
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
        alert('提交成功');
        document.location.reload();
      }
    }
  });
$("#sub").click(
  function(){
  
   
    $('#response_topic').submit();
    return false;
  }
);

$('.del').click(function(){
           var id       =$(this).attr('pid');
           if(id!=''){
            var r=confirm("内容将永久删除,您确定要删除吗？");

            if(r){
              $.ajax({
                    type: "POST",
                    url: "<?php echo Yii::app()->createUrl('group/Huatidel'); ?>",
                    dataType:'json',
                    data: "id="+id,
                    success: function(data){
                      if(data.status==1){
                        alert(data.info);
                        document.location.reload(); 
                      }else{
                        alert(data.info);
                        return false;
                      }
                    }
              });
            }else{
              return false;
            }
           }

        });

</script>
<?php }?>

