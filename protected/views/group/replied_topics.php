    <div class="top3">
    	我回应的话题
    </div>
	<div class="con clear">
    	<div class="left2">
        	<div class="ad1">
            	<a href="http://www.ebenchu.com"><img src="<?php echo  IMAGES_PATH; ?>ad1.jpg" /></a>
            </div>
            <div class="left3">
               <?php foreach ($model as $key => $value) {?>
                    <?php
                        if(empty($value->topicOne->title)){
                            continue;
                        }
                    ?>
                    <div class="left31">
                        <div class="left32"><a href="<?php echo Yii::app()->createUrl('group/topic',array('id'=>$value->tid)); ?>"><?php  echo $value->topicOne->title ?></a></div>
                        <div class="left33"><?php echo $value->topicOne->response_num;  ?>回应</div>
                        <div class="left34"><?php echo Helper::getTime($value->topicOne->create_time)  ?></div>
                        <div class="left35"><a href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$value->topicOne->groupOne->id)); ?>"><?php echo $value->topicOne->groupOne->name ?></a></div>
                    </div>
               <?php } ?> 
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
        <!-- 我的小组右侧 -->
        <?php $this->renderPartial('_group_right'); ?>
    </div>