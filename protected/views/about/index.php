<div class="con clear" style="margin-top:55px;">
	<div class="guanyu1">
        <?php foreach($danye as $v){ ?>
    	   <a href="<?php echo $v->danyeurl; ?>"><?php echo $v->title; ?></a><br />
        <?php } ?>
    </div>
    <div class="guanyu2">
    	<h1><?php echo $data->title; ?></h1>
        <div style="overflow:hidden; clear:both;">
            <?php echo $data->con; ?>
        </div>
    </div>
    
</div>