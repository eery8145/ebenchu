    <div class="top3">
    	我的小组话题
    </div>
	<div class="con clear">
    	<div class="left2">
        	<div class="ad1">
            	<a href="http://www.ebenchu.com"><img src="<?php echo  IMAGES_PATH; ?>ad1.jpg" /></a>
            </div>
            <div class="left3">
                <?php foreach ($topic as $key => $value) {?>
                <div class="left31">
                    <div class="left32"><a href="<?php echo Yii::app()->createUrl('group/topic',array('id'=>$value->id)); ?>"><?php echo $value->title ?></a></div>
                    <div class="left33"><?php echo $value->response_num  ?>回应</div>
                    <div class="left34"><?php echo Helper::getTime($value->create_time)  ?></div>
                    <div class="left35"><a href="<?php echo Yii::app()->createUrl('group/detail',array('id'=>$value->gid)); ?>"><?php echo $value->groupOne->name ?></a></div>
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
                        'pages' => $pages, 
                        'cssFile'=>CSS_PATH.'pager_res.css',
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