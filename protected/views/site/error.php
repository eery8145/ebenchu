<style>
/*小的链接信息*/
#foot .message{width:488px; margin:25px auto 10px auto;}
#foot .message ul li{font-size:12px;float:left;line-height:14px; background:url(/static/images/foot_bor.gif) right top no-repeat;}
#foot .message ul li.foot_nobor{background:none;}
#foot .message ul li a{color:#666; text-decoration:none; display:block; padding:0px 10px;}
#foot .message ul li a:hover{color:#ff3388;}
#foot .message_small{font-size:12px; display:block; height:25px; line-height:25px;clear:both; width:560px; margin:0px auto;}
#foot .message_small li{display:block; float:left;}
#foot .message_small li a{color:#666; text-decoration:none;}
#foot .message_small li a:hover{color:#ff3388;}
#foot .foot_line{height:25px; display:block; width:100%; clear:both;}.error{width: 950px;margin-top: 0px;margin-right: auto;margin-bottom: 0px;margin-left: auto;height: 300px;background-image: url(/static/images/404.png);}
.error ul{font-size: 14px;line-height: 28px;float: right;color: #333333;margin-right: 200px;margin-top: 70px;font-family: "微软雅黑";}
*html .error ul{margin-right: 100px;}
.error ul li a{color: #ff3488;text-decoration: none;}
.error ul li a:hover{text-decoration: underline;}

</style>
<div class="error">
<?php  if($code=='404'){?>
<img src="/assets/default/images/404.gif" />
<?php }?>

    <ul>
    	
        <li style="font-size:24px;"><?php echo $message; ?></li>
        <li>将在<span id="t" style="color:#6cdce5">10</span>秒后自动转入
            <a href="<?php echo $this->createUrl('/'); ?>">首页</a>
            频道</li>
      
       
    </ul>
</div>
<script>
	function daoji(){
		var t = $("#t").html();
		t = parseInt(t);
		t = t - 1;
		$("#t").html(t);
		if(t == 0){
			window.location.href = '<?php echo $this->createUrl('index'); ?>';
		}
	}
	setInterval("daoji();",1000);
</script>