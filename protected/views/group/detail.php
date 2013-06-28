<div class="top3a"> <a class="fl" href="<?php echo $this->createUrl('/group/detail',array('id'=>$model->id)); ?>"><img src="<?php echo $model->imgLink; ?>"  width="48" height="48"/></a>
    <h1 class="fl"><?php echo $model->name; ?></h1>
    <span class="fl">
        <?php if($model->mark==1){?>
            我是这个小组的成员 > <a href="javascript:void(0)" id="<?php echo $model->id;?>" class="delGroup">退出小组</a> 
        <?php }elseif($model->mark==2){?>
            我是小组组长
        <?php }else{?>
             <a href="javascript:void(0)" id="<?php echo $model->id;?>" class="addGroup">加入小组</a> 
        <?php } ?>
    </span> </div>
<div class="con clear">
    <div class="leftx">
        <div class="leftxa">
            <div class="lxat">创建于<?php echo date('Y-m-d',$model->create_time) ?>    组长： <a href="<?php echo $this->createUrl('/kongjian/index',array('uid'=>$model->memberOne->id)); ?>"><?php echo $model->memberOne->nickname; ?></a> </div>
            <div class="lxatcon"> 
                <?php echo $model->des; ?>
            </div>
            <!-- <div> <a href="#">推荐</a> </div> -->
        </div>
        <div class="huati">
            <div class="huati1"><a <?php if(empty($_GET['order'])){?>class='htjd' <?php }?> href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$model->id)); ?>">最近话题</a> / <a <?php if(!empty($_GET['order'])){?>class='htjd' <?php }?>  href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$model->id,'order'=>'hot')); ?>">最热话题</a></div>
            <div class="huati2"> <a href="javascript:void(0)" id="fayan"> + 发言</a> </div>
        </div>
        <div class="huatilist">
            <div class="huatilist1">
                <div class="huatilist2">话题</div>
                <div class="huatilist3">作者</div>
                <div class="huatilist4">回应</div>
                <div class="huatilist5">最后回应</div>
            </div>
            <?php foreach ($topic as $key => $value) {?>
                <div class="huatilist1">
                    <div class="huatilist2"><a href="<?php echo Yii::app()->createUrl('group/topic',array('id'=>$value->id)); ?>"><?php  echo $value->title ?><?php if($value->status > 2){ echo "<b style='color:red;'>($value->statusName)</b>"; }; ?></a></div>
                    <div class="huatilist3"><a href="<?php echo Yii::app()->createUrl('/kongjian/index',array('uid'=>$value->uid)); ?>"><?php  echo $value->memberOne->nickname ?></a></div>
                    <div class="huatilist4"><?php  echo $value->response_num ?></div>
                    <div class="huatilist5"><?php  echo date('Y-m-d',$value->update_time) ?></div>
                </div>
           <?php  }  ?>

           <div id="pager">    
                <?php    
                    $this->widget('CLinkPager',array(    
                        'header'=>'',    
                        'firstPageLabel' => '首页',    
                        'lastPageLabel' => '末页',    
                        'prevPageLabel' => '上一页',    
                        'nextPageLabel' => '下一页',    
                        'pages' => $pages, 
                        'cssFile'=>CSS_PATH.'pager.css',
                        'maxButtonCount'=>5    
                    )    
                    );    
                ?>    
            </div> 
           
        </div>
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
        <div class="right6">最近加入</div>
        <div class="xiaozu">
            <?php foreach ($newMember as $key => $value) {?>
            <div class="xiaozu1"> <a href="<?php echo Yii::app()->createUrl('kongjian/index',array('uid'=>$value->memberOne->id)); ?>"><img src="<?php echo  IMAGES_USER_PHOTO.$value->memberOne->photo; ?>" width="48" height="48" /></a> <br />
                <a href="<?php echo Yii::app()->createUrl('kongjian/index',array('uid'=>$value->memberOne->id)); ?>"><?php echo Helper::truncate_utf8_string($value->memberOne->nickname,5)  ?></a> </div>
            <?php }  ?>

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
        <?php if($model->mark==2){?>
            <div class="xiaozu2"> > <a href="<?php echo $this->createUrl('/group/chengyuan',array('gid'=>$model->id)); ?>">成员管理 (<?php echo $model->mmemberCount  ?>)</a> <br />> <a href="<?php echo $this->createUrl('/group/update',array('id'=>$model->id)); ?>">小组管理</a> <br />
        </div> 
        <?php  } ?>

    
       <!--  <div class="xiaozu2"> > <a href="#">浏览所有非常牛逼娴熟的高端职业玩家 (43802)</a> <br />
            > <a href="#">邀请好友</a> <br />
        </div> -->
      <!--   <div class="right6">这个小组的非常牛逼娴熟的高端职业玩家也喜欢去</div>
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


<?php if(Yii::app()->user->isGuest){?>
<script>
    $('.addGroup').click(function(){

        art.dialog({
            content: '您尚未登陆，是否登陆？',
            lock: true,
            button: [
                {
                    value: '确定',
                    callback: function () {
                        location.href = "<?php echo Yii::app()->createUrl('public/login'); ?>"; 
                        return true;
                    }
                },
                {
                    value: '取消',
                    callback: function () {
                        return true;
                    }
                },
            ]
        });

        return false;
    });
    $('#fayan').click(function(){
        art.dialog({
            content: '您尚未登陆，是否登陆？',
            lock: true,
            button: [
                {
                    value: '确定',
                    callback: function () {
                        location.href = "<?php echo Yii::app()->createUrl('public/login'); ?>"; 
                        return true;
                    }
                },
                {
                    value: '取消',
                    callback: function () {
                        return true;
                    }
                },
            ]
        });

        return false;
    });
</script>

<?php }else{?>
<script>
    $('.addGroup').click(function(){
       var gid  = $.trim($(this).attr('id'));
       var mid  = <?php echo Yii::app()->user->id; ?>;
       var node =$(this);
           if(gid!='' && mid!=''){
                $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('/group/add'); ?>",
                dataType:'json',
                data: "gid="+gid+"&mid="+mid,
                success: function(data){
                  if(data.status==1){
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
    });
    $('.delGroup').click(function(){
        var r=confirm("确定要退出该小组吗？");
        if (r!=true)
        {
             return false;
        }
       var gid  = $.trim($(this).attr('id'));
       var mid  = <?php echo Yii::app()->user->id; ?>;
           if(gid!='' && mid!=''){
                $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('/group/del'); ?>",
                dataType:'json',
                data: "gid="+gid+"&mid="+mid,
                success: function(data){
                  if(data.status==1){
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
    });


    var action=<?php echo !empty($model->mark)?$model->mark:'0';  ?>;
    $('#fayan').click(function(){
        if(action){
             location.href = "<?php echo Yii::app()->createUrl('group/addtopic',array('id'=>$model->id)); ?>"; 
        }else{
            alert('您还没有加入该小组，加入该小组后才能发言！');
        }
    });

</script>



<?php } ?>