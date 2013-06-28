    <div class="top3">
        我<?php if($model->groupCount>0){?>管理/<?php }?>加入的小组
    </div>
    <div class="con clear">
        <div class="left2">
        <?php if($model->groupCount>0){?>
          <div class="left2">
                <div class="left6">
                    我管理的<?php echo $model->groupCount;  ?>个小组
                </div>
                <div class="left7">
                    <?php foreach ($model->groupMany as $key => $value) {?>
                        <div class="left71">
                            <a href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$value->id)); ?>" class="left72"><img src="<?php echo $value->imgLink;  ?>" width="48" height="48" /></a>
                            <div class="left73">
                                <div class="left731"><a href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$value->id)); ?>"><?php echo $value->name;  ?></a></div>
                                <div class="left732">(<?php echo $value->pnum;  ?>)</div>
                            </div>
                        </div>   
                    <?php }  ?>  
                </div>
            </div>
        <?php }  ?>

        <div class="left2">
            <div class="left6">
                我加入的<?php echo $model->mGroupCount(array('condition'=>'uid !='.$model->id));  ?>个小组
            </div>
            <div class="left7">
                <?php foreach ($model->mGroup(array('condition'=>'mGroup.uid !='.$model->id)) as $key => $value) {?>
                    <div class="left71">
                        <a href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$value->id)); ?>" class="left72"><img src="<?php echo $value->imgLink;  ?>" width="48" height="48" /></a>
                        <div class="left73">
                            <div class="left731"><a href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$value->id)); ?>"><?php echo $value->name;  ?></a></div>
                            <div class="left732">(<?php echo $value->pnum;  ?>)</div>
                        </div>
                    </div>   
                <?php }  ?>
                
               
            </div>
        </div>
    </div>
        <!-- 我的小组右侧 -->
        <?php $this->renderPartial('_group_right'); ?>

    </div>