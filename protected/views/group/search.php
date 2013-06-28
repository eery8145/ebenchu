<div class="top3"><?php if($type == 1){ echo '小组'; }else{ echo '话题'; } ?>搜索:<?php echo $keyword; ?></div>
<div class="con clear">
    <?php if($type == 1){ ?>
    <div class="leftx">
        <div class="search1"> <a href="/search/<?php echo $keyword; ?>">小组</a> <a href="/search/<?php echo $keyword; ?>?type=2" class="nobg">话题</a> </div>
        <?php foreach($datas as $v){ ?>
            <div class="search2">
                <div class="search3"> <a href="<?php echo $v->link; ?>"><img style="width:48px; height:48px;" src="<?php echo $v->imgLink; ?>" /></a> </div>
                <div class="search4"> <a href="<?php echo $v->link; ?>"><?php echo $v->name; ?></a><br />
                    <?php echo $v->mmemberCount; ?> 个<?php echo $v->aliasname; ?> 在此聚集<br />
                    <?php echo strip_tags($v->des); ?><br />
                </div>
            </div>
        <?php } ?>
    </div>
    <?php }else{ ?>
    <!--话题列表-->
    <div class="leftx">
        <div class="search1"> <a class="nobg" href="/search/<?php echo $keyword; ?>">小组</a> <a href="/search/<?php echo $keyword; ?>?type=2">话题</a> </div>
        <?php foreach($datas as $v){ ?>
        <div class="left31">
            <div class="left32s"><a href="<?php echo $v->link; ?>"><?php echo $v->title; ?></a></div>
            <div class="left33"><?php echo $v->responseCount; ?>回应</div>
            <div class="left34"><?php echo $v->fabutime; ?></div>
            <div class="left35"><a href="<?php echo $v->memberOne->kongjian; ?>"><?php echo $v->memberOne->nickname; ?></a></div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <div class="rightx"> </div>
    
</div>