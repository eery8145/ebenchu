<div class="top3">
    小组:<?php echo $group->name; ?>
</div>
<div class="con clear">
    <div class="left2">
      <div class="left2">
            <div class="left6">
                管理员
            </div>
            <div class="left7">
                <div class="left71" style="height:auto; overflow:hidden; width:64px;">
                    <a style="text-align:center;" href="<?php echo $group->memberOne->kongjian; ?>" class="left72"><img style="margin-left:8px;" src="<?php echo $group->memberOne->imgLink;  ?>" width="48" height="48" /></a>
                    <div style="clear:both;">
                    <a href="<?php echo $group->memberOne->kongjian; ?>"><?php echo $group->memberOne->nickname; ?></a>
                    </div>
                </div>
            </div>
        </div>
    <div class="left2">
        <div class="left6">
            成员
        </div>
        <div class="left7">
            <?php foreach ($members as $key => $value) {?>
                <div class="left71" style="height:auto; overflow:hidden; width:64px;">
                    <a style="text-align:center;" href="<?php echo $value->memberOne->kongjian; ?>" class="left72"><img style="margin-left:8px;" src="<?php echo $value->memberOne->imgLink;  ?>" width="48" height="48" /></a>
                    <div style="clear:both;">
                        <a href="<?php echo $value->memberOne->kongjian; ?>"><?php echo $value->memberOne->nickname; ?></a>
                    </div>
                </div>
            <?php }  ?>
        </div>
    </div>
</div>
    <!-- 我的小组右侧 -->
    <?php $this->renderPartial('_group_right'); ?>
</div>