<div class="top3">
        发现话题
    </div>
    <div class="con clear">
        <div class="left2">
            <?php if(!empty($_GET['tag'])){?>
                <div class="left8">
                    <a href="#" class="a4">本周热门</a>
                    <a href="#">今日热门</a>
                    <a href="#">最新话题</a>
                </div>
            <?php } ?>

            <?php foreach ($model as $key => $value) {?>
                <div class="left8a">
                <div class="left8a1"><a href="<?php echo Yii::app()->createUrl('group/topic',array('id'=>$value->id)); ?>"><?php echo $value->title ?></a></div>
                <div class="left8a2">
                    <?php echo strip_tags($value->content); ?>
                </div>
                <div class="left8a3">
                    <div class="fl">
                        来自： <a href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$value->gid)); ?>"><?php echo $value->groupOne->name ?></a> 小组
                    </div>
                    <div class="fr">
                       <?php echo $value->response_num ?> 回应
                    </div>
                </div>
                </div>
            <?php }  ?>
            <div id="pager">
            <?php    
                $this->widget('CLinkPager',array(    
                        'header'=>'',    
                        'firstPageLabel' => '首页',    
                        'lastPageLabel' => '末页',    
                        'prevPageLabel' => '上一页',    
                        'nextPageLabel' => '下一页',    
                        'pages' => $pager,
                        'cssFile'=>CSS_PATH.'pager_res.css',
                        'maxButtonCount'=>5    
                    )
                );  
            ?>    
            </div> 
        </div>
       <!-- 发现小组右侧 -->
        <?php $this->renderPartial('_explore_right'); ?>
        
    </div>