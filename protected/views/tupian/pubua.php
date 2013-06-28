<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery瀑布流实例最流行瀑布流图片展示</title>
<meta name="description" content="jquery masonry与infinitescroll两款瀑布流插件制作当下最流行的瀑布流图片展示实例，通过鼠标滚动图片无限加载的类似瀑布的效果的图片展示。用户可以无限浏览图片或内容无限加载瀑布流效果。" />
<script type="text/javascript" src="/js/pubua/jquery.js"></script>
<script type="text/javascript" src="/js/pubua/jquery.masonry.js"></script>
<script type="text/javascript" src="/js/pubua/jquery.infinitescroll.js"></script>
<style type="text/css">
* {
	margin:0;
	padding:0;
	list-style-type:none;
}
a, img {
	border:0;
}
em {
	font-style:normal;
}
a {
	text-decoration:none;
	cursor:pointer;
	color:#666666;
}
a:hover {
	color:#FF6699;
}
body {
	background:url("/images/pubua/bodybg.jpg") repeat #f5f6f7;
	color:#666666;
	font-family:Arial;
	font-size:12px;
}
.fl {
	float:left;
}
.fr {
	float:right;
}
.clearfix:after {
	content:".";
	display:block;
	height:0;
	clear:both;
	visibility:hidden;
}
.clearfix {
	display:inline-table;
}
*html .clearfix {
	height:1%;
}
.clearfix {
	display:block;
}
*+html .clearfix {
	min-height:1%;
}
.demo {
	width:950px;
	margin:0 auto;
}
/* item_list */
.item_list {
	position:relative;
	padding:0 0 50px;
}
.item {
	width:226px;
	background:#fff;
	overflow:hidden;
	margin:15px 0 0 0;
	border-radius:4px 4px 4px 4px;
	box-shadow:0 1px 3px rgba(34, 25, 25, 0.2);
}
.item_t {
	padding:10px 8px 0;
}
.item_t .img {
	background-color:#FFFFFF;
	margin:0 auto;
	position:relative;
	width:210px;
	min-height:210px;
}
.item_t .img a {
	display:block;
}
.item_t .img a:hover {
	background:#000;
}
.item_t .img a:hover img {
	filter:alpha(opacity=80);
	-khtml-opacity:0.8;
	opacity:0.8;
	-webkit-transition:all 0.3s ease-out;
	-khtml-transition:all 0.3s ease-out;
}
.item_t .price {
	position:absolute;
	bottom:10px;
	right:0px;
	background-color:rgba(0, 0, 0, 0.2);
	color:#FFF;
 filter:progid:DXImageTransform.Microsoft.gradient(startcolorstr=#33000000, endcolorstr=#33000000);
}
.item .btns {
	display:none;
}
.img_album_btn {
	top:0px;
	right:0px;
	position:absolute;
	background:#ff6fa6;
	color:#ffffff;
	height:20px;
	line-height:20px;
	width:56px;
	border-radius:3px;
}
.img_album_btn:hover {
	color:#fff;
}
.item_t .title {
	padding:8px 0;
	line-height:18px;
}
.item_b {
	padding:10px 8px;
}
.item_b .items_likes .like_btn {
	background:url("/images/pubua/fav_icon_word_new_1220.png") no-repeat;
	display:block;
	float:left;
	height:23px;
	width:59px;
	margin-right:5px;
}
.item_b .items_likes em {
	line-height:23px;
	display:block;
	float:left;
	padding:0px 6px;
	color:#FF6699;
	font-weight:800;
	border:1px solid #ff6fa6;
	border-radius:3px;
}
/* more */
#more {
	display:block;
	margin:10px auto 20px;
}
/* infscr-loading */
#infscr-loading {
	bottom:-10px;
	left:45%;
	position:absolute;
	text-align:center;
	height:20px;
	line-height:20px;
	z-index:100;
	width:120px;
}
/* page */
.page {
	display:none;
	font-size:18px;
	height:60px;
	text-align:center;
	margin:20px 0 0 0;
}
.page_num a, .page_num span {
	margin:0 2px;
	background:url("/images/pubua/page.png") no-repeat;
	display:inline-block;
	width:30px;
	height:28px;
	line-height:26px;
	overflow:hidden;
}
.page_num a {
	background-position:-65px 0;
	color:#FF3333;
	overflow:hidden;
}
.page_num .prev {
	background-position:1px -33px;
}
.page_num .unprev {
	background-position:1px 0;
	cursor:default;
}
.page_num .next {
	background-position:-32px 0;
}
.page_num .unnext {
	background-position:-32px -33px;
	cursor:default;
}
.page_num .current {
	background-position:-99px 0;
	color:#FFFFFF;
}
.page_num .etc {
	background-position:-172px 8px;
}
/* to_top */
.to_top a, .to_top a:hover {
	background:url("/images/pubua/gotop.png") no-repeat
}
.to_top a {
	background-position:0 0;
	float:left;
	height:50px;
	overflow:hidden;
	width:50px;
	position:fixed;
	bottom:35px;
	cursor:pointer;
	right:20px;
	_position:absolute;
	_right:auto;
 _left:expression(eval(document.documentElement.scrollLeft+document.documentElement.clientWidth-this.offsetWidth)-(parseInt(this.currentStyle.marginLeft, 10)||0)-(parseInt(this.currentStyle.marginRight, 10)||20));
 _top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop, 10)||20)-(parseInt(this.currentStyle.marginBottom, 10)||20)));
}
.to_top a:hover {
	background-position:-51px 0px;
}
</style>
<script type="text/javascript">
var isWidescreen=screen.width>=1280; 
if(isWidescreen){document.write("<style type='text/css'>.demo{width:1194px;}</style>");}
</script>
<script type="text/javascript">
function item_masonry(){ 
	$('.item img').load(function(){ 
		$('.infinite_scroll').masonry({ 
			itemSelector: '.masonry_brick',
			columnWidth:226,
			gutterWidth:15								
		});		
	});
		
	$('.infinite_scroll').masonry({ 
		itemSelector: '.masonry_brick',
		columnWidth:226,
		gutterWidth:15								
	});	
}

$(function(){

	function item_callback(){ 
		
		$('.item').mouseover(function(){
			$(this).css('box-shadow', '0 1px 5px rgba(35,25,25,0.5)');
			$('.btns',this).show();
		}).mouseout(function(){
			$(this).css('box-shadow', '0 1px 3px rgba(34,25,25,0.2)');
			$('.btns',this).hide();		 	
		});
		
		item_masonry();	

	}

	item_callback();  

	$('.item').fadeIn();

	var sp = 1
	
	$(".infinite_scroll").infinitescroll({
		navSelector  	: "#more",
		nextSelector 	: "#more a",
		itemSelector 	: ".item",
		
		loading:{
			img: "/images/pubua/masonry_loading_1.gif",
			msgText: ' ',
			finishedMsg: '木有了',
			finished: function(){
				sp++;
				if(sp>=10){ //到第10页结束事件
					$("#more").remove();
					$("#infscr-loading").hide();
					$("#page").show();
					$(window).unbind('.infscr');
				}
			}	
		},errorCallback:function(){ 
			$("#page").show();
		}
		
	},function(newElements){
		var $newElems = $(newElements);
		$('.infinite_scroll').masonry('appended', $newElems, false);
		$newElems.fadeIn();
		item_callback();
		return;
	});

});
</script>
</head>
<body>
<div class="demo clearfix">
    <div class="item_list infinite_scroll">
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/js//images/pubua/more/2012-05-15/608.html"><img width="210" height="285" alt="js lazyload实现网页图片延迟加载特效" src="/images/pubua/pic/01.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/js//images/pubua/more/2012-05-15/608.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>js lazyload实现网页图片延迟加载特效</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/js//images/pubua/cj/2012-03-14/420.html"><img width="210" height="164" alt="js图片特效制作js焦点图上下滚动slider切换效果" src="/images/pubua/pic/02.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/js//images/pubua/cj/2012-03-14/420.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>js图片特效制作js焦点图上下滚动slider切换效果</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/js/menu/sx/2012-03-25/502.html"><img width="210" height="287" alt="js树形导航菜单制作垂直js导航条特效" src="/images/pubua/pic/03.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/js/menu/sx/2012-03-25/502.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>js树形导航菜单制作垂直js导航条特效</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/flash//images/pubua/2012-09-06/753.html"><img width="210" height="285" alt="flash图片导航条自动切换轮播焦点图" src="/images/pubua/pic/04.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/flash//images/pubua/2012-09-06/753.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>flash图片导航条自动切换轮播焦点图</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/flash//images/pubua/2012-06-04/640.html"><img width="210" height="323" alt="flash图片特效左右按钮控制图片折叠切换效果" src="/images/pubua/pic/05.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/flash//images/pubua/2012-06-04/640.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>flash图片特效左右按钮控制图片折叠切换效果</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/flash//images/pubua/2012-05-08/596.html"><img width="210" height="315" alt="flash焦点图片带内容与按钮的3D动画图片特效" src="/images/pubua/pic/06.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/flash//images/pubua/2012-05-08/596.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>flash焦点图片带内容与按钮的3D动画图片特效</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/flash//images/pubua/2012-03-11/388.html"><img width="210" height="282" alt="flash特效制作flash图片滚动带按钮控制左右图片滚动" src="/images/pubua/pic/07.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/flash//images/pubua/2012-03-11/388.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>flash特效制作flash图片滚动带按钮控制左右图片滚动</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/flash//images/pubua/2012-03-03/378.html"><img width="210" height="266" alt="flash焦点图切换特效制作各大网站的焦点图片轮播" src="/images/pubua/pic/08.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/flash//images/pubua/2012-03-03/378.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>flash焦点图切换特效制作各大网站的焦点图片轮播</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/flash//images/pubua/2012-03-03/374.html"><img width="210" height="254" alt="flash焦点图切换动画图片和标题文字配合显示含flash源码下载" src="/images/pubua/pic/09.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/flash//images/pubua/2012-03-03/374.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>flash焦点图切换动画图片和标题文字配合显示含flash源码下载</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/flash//images/pubua/2012-03-03/370.html"><img width="210" height="276" alt="flash图片切换左右滚动带序列索引按钮控制flash动画图片特效" src="/images/pubua/pic/10.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/flash//images/pubua/2012-03-03/370.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>flash图片切换左右滚动带序列索引按钮控制flash动画图片特效</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/flash/letter/2012-03-04/386.html"><img width="210" height="131" alt="flash文字特效制作数字类似文字打印效果,属于flash动画文字特效一种" src="/images/pubua/pic/11.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/flash/letter/2012-03-04/386.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>flash文字特效制作数字类似文字打印效果,属于flash动画文字特效一种</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/css3/layout/2011-10-13/215.html"><img width="210" height="131" alt="div+css制作在IE6 上用absolute模拟fixed IE6浏览器定位层框不闪动" src="/images/pubua/pic/12.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/css3/layout/2011-10-13/215.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>div+css制作在IE6 上用absolute模拟fixed IE6浏览器定位层框不闪动</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/css3/layout/2011-02-21/36.html"><img width="210" height="287" alt="CSS如何定位工程" src="/images/pubua/pic/13.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/css3/layout/2011-02-21/36.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>CSS如何定位工程</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/css3/menu/2011-09-21/197.html"><img width="210" height="323" alt="用div+css3美化制作动画导航特效鼠标滑过动画显示" src="/images/pubua/pic/14.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/css3/menu/2011-09-21/197.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>用div+css3美化制作动画导航特效鼠标滑过动画显示</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/css3/menu/2011-02-20/22.html"><img width="210" height="304" alt="用div+css制作一个CSS3的简约图标导航菜单" src="/images/pubua/pic/15.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/css3/menu/2011-02-20/22.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>用div+css制作一个CSS3的简约图标导航菜单</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/html5/tx/2011-08-13/120.html"><img width="210" height="315" alt="jquery 图片特效用CSS3和HTML5制作仿动画头条报纸缩小到放大翻转图片展示" src="/images/pubua/pic/16.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/html5/tx/2011-08-13/120.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>jquery 图片特效用CSS3和HTML5制作仿动画头条报纸缩小到放大翻转图片展示</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
        <div class="item masonry_brick">
            <div class="item_t">
                <div class="img">
                    <a href="http://www.jsfoot.com/html5/tx/2011-02-21/42.html"><img width="210" height="314" alt="jquery 幻灯片切换应用一个HTML5的幻灯片" src="/images/pubua/pic/17.jpg" /></a>
                    <span class="price">￥195.00</span>
                    <div class="btns">
                        <a href="http://www.jsfoot.com/html5/tx/2011-02-21/42.html" class="img_album_btn">加入专辑</a>
                    </div>
                </div>
                <div class="title"><span>jquery 幻灯片切换应用一个HTML5的幻灯片</span></div>
            </div>
            <div class="item_b clearfix">
                <div class="items_likes fl">
                    <a href="http://www.jsfoot.com" class="like_btn"></a>
                    <em class="bold">916</em>
                </div>
                <div class="items_comment fr">
                    <a href="http://www.jsfoot.com">评论</a>
                    <em class="bold">(0)</em></div>
            </div>
        </div>
        <!--item end-->
    </div>
    <div id="more">
        <a href="page/2.html"></a>
    </div>
    <div id="page" class="page" style="display:none;">
        <div class="page_num">
            <span class="unprev"></span>
            <span class="current">1</span>
            <a href="http://www.jsfoot.com">&nbsp;2&nbsp;</a>
            <a href="http://www.jsfoot.com">&nbsp;3&nbsp;</a>
            <a href="http://www.jsfoot.com">&nbsp;4&nbsp;</a>
            <a href="http://www.jsfoot.com">&nbsp;5&nbsp;</a>
            <span class="etc"></span>
            <a href="http://www.jsfoot.com">12</a>
            <a href="http://www.jsfoot.com" class="next"></a>
        </div>
    </div>
</div>
<div style="display:none;" id="gotopbtn" class="to_top">
    <a title="返回顶部" href="javascript:void(0);"></a>
</div>
<script type="text/javascript">
/*$(function(){

	$(window).scroll(function(){
		$(window).scrollTop()>1000 ? $("#gotopbtn").css('display','').click(function(){
			$(window).scrollTop(0);
		}):$("#gotopbtn").css('display','none');	
	});
	
});*/
</script>
</body>
</html>
