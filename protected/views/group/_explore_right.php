<div class="right5">
    <div class="right6">按分类浏览</div>
    <div class="right7">
        <div class="right71">
            <?php $tagList = Tag::model()->findAll(array('condition'=>'pid = 0','order'=>'sort desc')); ?>
            <?php foreach($tagList as $v){ ?>
                <div class="right72"><b>•</b> <?php echo $v->title; ?></div>
                <div class="right73">
                    <?php foreach($v->TagZilei as $vz){ ?>
                        <a href="<?php echo $this->createUrl('/group/explore',array('gid'=>$vz->id)); ?>"><?php echo $vz->title; ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div class="right2">
        </div>
    </div>
</div>