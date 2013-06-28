<div class="man">
	<div class="lieb">
    	<div class="lieb_l">
             <p><a href="<?php echo $this->createUrl('/article/index'); ?>">全部分类</a></p>
             <ul>
             <?php foreach($cateList as $v){ ?>
             	<li><h2><a href="<?php echo $this->createUrl('/article/index', array('cateId'=>$v->id)); ?>" title="<?php echo $v->name; ?>"><?php echo $v->name; ?></a></h2></li>
			 <?php } ?>
             </ul>
             <!--<div class="lieb_e">
             	<h3>作品投稿</h3>
                <span>个人作者可以在爱客上直接发布作品。 内容领域不限，唯一要求是保证质量优秀。 发表后，作者可直接从中获得分成。</span>
                <span><a class="toug" href="#" title="去投稿" target="_blank">去投稿<i class="xing"></i></a></span>
             </div>-->
        </div>
        <div class="lieb_r">
            <div class="lieb_ra">
                 <p><?php echo $cateName; ?></p>
            </div>
        	<div class="lieb_rb">
                 <ul>
                 	<?php foreach($articleList as $v){ ?>
                    <li>
                    	<h3><a href="<?php echo $this->createUrl('/article/show', array('id'=>$v->id)); ?>" title="<?php echo $v->title; ?>" target="_self"><?php echo $v->title; ?></a></h3>
                       <?php if(!empty($v->img)){?>
                            <a href="<?php echo $this->createUrl('/article/show', array('id'=>$v->id)); ?>" title="<?php echo $v->title; ?>" target="_self"><img alt="<?php echo $v->title; ?>" src="<?php echo $v->imgLink; ?>" /></a>
                       <?php }  ?>
                        <font>
                        	<?php echo $v->des; ?>
                        	<a href="<?php echo $this->createUrl('/article/show', array('id'=>$v->id)); ?>" title="<?php echo $v->title; ?>" target="_self">>>查看详细</a>
                        </font>
                        <p>发表于 <?php echo date('Y-m-d',($v->create_time)); ?> 浏览<?php echo $v->click; ?></p>
                    </li>
                    <?php } ?>
                 </ul>
            </div>
            <div class="page01">
              <?php $this->widget('CLinkPager',array('pages'=>$pages,'cssFile'=>false,'header'=>'','htmlOptions'=>array('class'=>'mypage'))); ?> 
           </div>
        </div>
    </div>
</div>