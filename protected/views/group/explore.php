    <div class="top3">
        <?php if(empty($_GET['gid'])){?>
          发现小组
        <?php }else{?>
        <?php  echo $tag->title.'相关的小组'; ?>
        <?php } ?>
    </div>
    <div class="con clear">
        <div class="left2">
        <?php if(count($list)>0){?>
            <?php foreach ($list as $key => $value) {?>
                <div class="left4">
                  
                  <div class="left42">
                      

                      <div style="overflow:hidden; clear:both;">
                        <div style="float:left;">
                          <a href="<?php echo $value->link; ?>"><img style="width:48px; height:48px;" src="<?php echo $value->imgLink; ?>"></a>
                        </div>
                        <div style="float:right; width:187px;">
                          <div class="left43"><a href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$value->id)); ?>"><?php echo  $value->name; ?></a></div>
                          <div class="left44"><?php echo  $value->pnum; ?> 个<b style="color:red;"><?php echo $value->alias?$value->alias:'成员'; ?></b> 在此聚集 </div>
                          <div class="left45"><?php echo  Helper::truncate_utf8_string($value->des,28); ?></div>
                          <div class="left46">
                              <?php if($value->mark==1){?>
                                   √已加入
                              <?php }else{?>
                                   <a href="javascript:void(0)" class="addGroup" id="<?php echo $value->id;  ?>">+加入小组</a>
                              <?php } ?>
                          </div>
                        </div>
                      </div>
                      
                  </div>
                </div>
            <?php } ?>

        <?php }else{?>
          暂时没有找到相关的小组
        <?php } ?>
      
        </div>
        <!-- 发现小组右侧 -->
        <?php $this->renderPartial('_explore_right'); ?>
        
    </div>

<?php if(Yii::app()->user->isGuest){?>
<script>
    $('.addGroup').click(function(){
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
                    node.parent().html(' √已加入');
                    return false;
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
</script>

<?php } ?>