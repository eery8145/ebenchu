<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->pageKeyword['title']  ?></title>
<meta name="keywords" content="<?php echo $this->pageKeyword['keywords']  ?>" >
<meta name="description" content="<?php echo $this->pageKeyword['description']  ?>" >
<link href="/favicon.ico" type="image/x-icon" rel=icon>
<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon">
<?php 
    if($this->id != 'tongcheng'){
        Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
    }
    Yii::app()->clientScript->registerScriptFile('/js/jquery-ui.js');

    Yii::app()->clientScript->registerCssFile('/js/artDialog/skins/idialog.css');
    Yii::app()->clientScript->registerScriptFile('/js/artDialog/artDialog.min.js');
    
    Yii::app()->clientScript->registerScriptFile('/js/common.js');
    Yii::app()->clientScript->registerCssFile(CSS_PATH.'/common.css');
    Yii::app()->clientScript->registerCssFile('/css/red.css');
?>

</head>

<body>
    <div class="httop1">
        <div class="httop11">
            <a href="/">首页</a>
                <a href="<?php echo Yii::app()->createUrl('/group'); ?>">小组</a>
                <a href="<?php echo Yii::app()->createUrl('/article'); ?>">阅读</a>
                <a href="<?php echo Yii::app()->createUrl('/tongcheng'); ?>">同城</a>
                <a href="<?php echo Yii::app()->createUrl('/tupian'); ?>">美图</a>
                <a href="<?php echo Yii::app()->createUrl('/taoke'); ?>">淘客</a>

        </div>
        <?php if(Yii::app()->user->isGuest){?>
        <div class="httop12">
            <a style="float:right;background:none; margin:0 0 0 5px;padding:0;" href="<?php
          $this->widget('ext.oauthlogin.OauthLogin',array(
            'itemView'=>'sinaurl', //效果样式
          ));
        ?>"><img style="margin-top:5px;" src="/images/connect_sina_weibo.png" /></a>
            <a style="float:right;background:none; margin:0 0 0 5px;padding:0;" href="<?php
          $this->widget('ext.oauthlogin.OauthLogin',array(
            'itemView'=>'qqurl', //效果样式
          ));
        ?>"><img style="margin-top:5px;" src="/images/connect_qq.png" /></a>
            <a style="float:right;" href="<?php echo Yii::app()->createUrl('public/login'); ?>">登陆</a>
            <a style="float:right;" href="<?php echo Yii::app()->createUrl('public/register'); ?>">注册</a>
        </div>
        <?php }else{?>
        <div class="httop12">
            <!-- <a href="javascript:void(0)">提醒
                <span class="num">
                <span>1</span>
                <i></i>
                </span>
            </a> -->
            <a href="<?php echo Yii::app()->createUrl('kongjian/index',array('uid'=>Yii::app()->user->id)); ?>">欢迎您：<?php echo Yii::app()->user->nickname;?></a>
            <a href="<?php echo Yii::app()->createUrl('kongjian/info'); ?>">设置</a>
            <a href="<?php echo Yii::app()->createUrl('public/logout'); ?>">退出</a>
        </div>
        <?php }?>

    </div>  
    <div class="httop4">
        <div class="httop21">
            <div class="logo3"> 
                <a href="<?php echo Yii::app()->createUrl('group'); ?>"><?php echo  Helper::siteConfig()->site_name; ?>商城</a>
            </div>
            <div class="link3"> 
               <a href="taoke">发现宝贝</a>
               <a href="taoke">发现宝贝</a>
               <a href="taoke">发现宝贝</a>
              
            </div>
            <script type="text/javascript">
                $("#search").click(
                    function(){
                        search = $("#search_inp").val();
                        if(search == '' || search == '小组、话题'){
                            alert('请输入要查询的关键词！');
                            return false;
                        }
                        window.location.href = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/search/'+encodeURI(search);
                    }
                );

                $("#search_inp").focus(
                    function(){
                        search = $("#search_inp").val();
                        if(search == '小组、话题'){
                            $(this).val('');
                        }
                    }
                );

                $("#search_inp").blur(
                    function(){
                        search = $("#search_inp").val();
                        if(search == ''){
                            $(this).val('小组、话题');
                        }
                    }
                );
            </script>
        </div>
    </div>   
    <?php echo $content ?>
    <div class="con clear">
    <div class="footer">
            <div class="footer1">
                  <?php echo  Helper::siteConfig()->site_copyright; ?>
            </div>
            <div class="footer2">
                <?php
                    $danye = Cate::model()->findAll(array('condition'=>'type = 2 and status = 1'));
                    foreach($danye as $v){
                ?>
                <a href="<?php echo $v->danyeurl; ?>"><?php echo $v->name; ?></a> · 
                <?php
                    }
                ?>
                <div style="display:none;">
                <?php echo  Helper::siteConfig()->site_code; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=0&amp;pos=right&amp;uid=0" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<!-- Baidu Button END -->
<div class="toptype"><a title="回到顶部" href="javascript:void(0);" onClick="window.scrollTo(0,0);" class="gotop_btn" id="goTopButton" style="display:none;">&nbsp;</a></div>
<script type="text/javascript">
(function($){
  $(window).scroll(function(event){
    if($(this).scrollTop() > 0){
      if($.browser.ie6){
        $('#goTopButton').css('top', $(this).scrollTop() + $(this).height() - 170);
      }
      if($('#goTopButton').css('display') == 'none'){
        $('#goTopButton').fadeIn();
      }
    }else{
      $('#goTopButton').fadeOut();
    }
  });
})(jQuery);
</script>