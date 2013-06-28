<div class="xiangq">
    <div class="xqneir">

        <div class="xqneir_l">
            <h1><?php echo $article->title; ?></h1>
            <div class="div_a">来源：
                <?php echo $article->source?$article->source:'互联网' ?>&nbsp;&nbsp;
               发布时间： <?php echo date('Y-m-d',$article->create_time); ?>&nbsp;&nbsp;
               <!--  <a href="" title="0条回复" target="_blank">0条回复</a> -->
                浏览<?php echo $article->click; ?>次
             <!--    <a href="" title="我要回复">我要回复</a> -->
            </div>
            <div class="div_b">
            	
                	<?php echo $article->content; ?>
              
             <!--    <span>本文由
                <a href="#" title="辰木" target="_self">辰木</a>
                授权（辰木）发表，文章著作权为原作者所有</span> -->
                <div class="botom">
                	<div class="prev" >上一篇:<a href="<?php echo $prev->id?$this->createUrl('/article/show', array('id'=>$prev->id)):'javascript:void(0)'; ?>" title="" target="_self"><?php echo $prev->title?$prev->title:'没有了'; ?></a></div>
                    <div  class="next" >下一篇:<a href="<?php echo $next->id?$this->createUrl('/article/show', array('id'=>$next->id)):'javascript:void(0)'; ?>" title="" target="_self"><?php echo $next->title?$next->title:'没有了'; ?></a></div>
                </div>
            </div>
            <div class="gdtitle">更多相关阅读</div>
                <ul class="gdlist">
                <?php
                    foreach($xiangguan as $v){
                ?>
                <li><a href="<?php echo $v->link; ?>"><?php echo Helper::truncate_utf8_string($v->title,30); ?></a><span  style="color:#CCC"><?php echo date('Y-m-d',$v->create_time)  ?></span></li>
                <?php
                    }
                ?>
                </ul>

        </div>
        <div class="xqneir_r">
            <div class="ming">
                <!-- <dl>
                    <a href="" title=""><img alt="" src="/upload/user_photo/38.jpg" /></a>
                    <dt>
                        <a href="" title="辰木" target="_self">辰木</a>
                    </dt>
                    <dd>马连道</dd>
                </dl> -->
                <div class="wztitle">
                    最新文章
                </div>
                <ul class="wzlist">
                    <?php
                        foreach($xin as $v){
                    ?>
                    <li><a href="<?php echo $v->link; ?>"><?php echo Helper::truncate_utf8_string($v->title,20); ?></a></li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="wztitle">
                    最热文章
                </div>
                <ul class="wzlist">
                    <?php
                        foreach($re as $v){
                    ?>
                    <li><a href="<?php echo $v->link; ?>"><?php echo Helper::truncate_utf8_string($v->title,20); ?></a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
