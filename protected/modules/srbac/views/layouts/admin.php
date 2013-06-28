<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>客户信息管理系统</title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetUrl; ?>/css/common.css" />
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script src="<?php echo $this->module->assetUrl; ?>/css/common.js"></script>
<script src="/js/ymPrompt/ymPrompt.js"></script>
<link href="/js/ymPrompt/skin/qq/ymPrompt.css" rel="stylesheet" type="text/css" />
</head>
<?php
      $userid = Yii::app()->controller->module->getComponent('user')->id;
      $sql = 'SELECT * FROM `'.Yii::app()->params['tablePrefix'].'itemchildren` LEFT JOIN `'.Yii::app()->params['tablePrefix'].'items` ON child = NAME WHERE parent IN (SELECT itemname FROM `'.Yii::app()->params['tablePrefix'].'assignments` WHERE userid = '.$userid.') ORDER BY sort asc';

      $connection=Yii::app()->db; 
      $command=$connection->createCommand($sql);
      $menu=$command->queryAll();

      foreach ($menu as $key => $value) {
        $menu_res[unserialize($value['data'])][] = $value;
        if($value['child'] == Yii::app()->controller->id){
          $current = unserialize($value['data']);
        }
      }
      if(empty($current)) $current = '';
?>
<script>
	<?php $i = 0; ?>
	<?php foreach($menu_res as $key => $value){ ?>
		<?php if($key == $current){ $selectedSid = $i; echo 'var selectedSid = '.$i.';';}; ?>
		<?php if($i == 0){ $menuList = $value; }; ?>
		var menu<?php echo $i++; ?> = '<?php foreach($value as $k => $v){ ?><a class="<?php if($v['child'] == Yii::app()->controller->id){ ?>linkhover1<?php }else{ ?>link1<?php } ?>" href="<?php echo Yii::app()->createUrl('/srbac/'.$v['child'].'/admin'); ?>"><?php echo $v['description']; ?></a><?php } ?>';
	<?php } ?>
    <?php
        if(!isset($selectedSid)){
            echo 'var selectedSid = 0;';
        }
    ?>
	$(document).ready(function(){
		function selectNav(){
			$(".nav13 a[isSelected='1']").removeClass("hover2");
			$(".nav13 a[isSelected='1']").addClass("hover1");
			$(".nav13 a[isSelected='2']").removeClass("hover1");
			$(".nav13 a[isSelected='2']").addClass("hover2");
		}
		$(".nav13 a").hover(
			function(){
				$(this).removeClass("hover2");
				$(this).addClass("hover1");
			},
			function(){
				if($(this).attr('isSelected') == '2'){
					$(this).removeClass("hover1");
					$(this).addClass("hover2");
				}
			}
		);
		$(".nav13 a").click(
			function(){
				var sid = $(this).attr('sid');
				eval("var menu = menu"+sid);
				$(".left1").html(menu);
				
				$(".nav13 a").attr('isSelected','2');
				$(this).attr('isSelected','1');
				selectNav();
			}					
		);
		selectNav();
		$(".nav13 a[sid='"+selectedSid+"']").click();
	});
</script>
<body>
	<div class="left fl">
    	<div class="logo height1">
        	<a href="/"><img src="<?php echo $this->module->assetUrl; ?>/images/login/logo.jpg" /></a>
        </div>
        <div class="left1">
        <?php if(!empty($menuList)){ ?>
        	<?php foreach($menuList as $k => $v){ ?>
        	<a class="link1" href="<?php echo Yii::app()->createUrl('/srbac/'.$v['child'].'/admin'); ?>"><?php echo $v['description']; ?></a>
            <?php } ?>
        <?php } ?>
        </div>
    </div>
    <div class="right fl">
    	<div class="nav1 height1">
        	<div class="nav11">
            	<div class="nav13 fl">
                <?php $i = 0; ?>
                <?php foreach($menu_res as $key => $value){ ?>
                	<a <?php if($i == 0){ ?>isSelected="1"<?php }else{ ?>isSelected="2"<?php } ?> class="hover2" href="javascript:void(0)" sid="<?php echo $i++; ?>"><span class="bg1"></span><span><?php echo $key; ?></span><span class="bg2"></span></a>
                <?php } ?>
                </div>
                <div class="nav14 fr">您好，<b><?php echo Yii::app()->controller->module->getComponent('user')->name; ?></b> <a href="<?php echo $this->createUrl('/srbac/default/logout'); ?>">[退出]</a> <a href="/" target="_blank">站点首页</a></div>
            </div>
            <div class="widthie7">
                <div class="nav12">
                    <a href="#">全局</a> >> 站点信息 <a href="javascript:void(0)">[+]</a>
                </div>
            </div>
        </div>
        <div class="right1">
        	<div>
            	<?php echo $content; ?>
                <div class="caozuo">
                	<?php
					  if($this->id != 'authitem' && $this->id != 'default' && $this->id != 'sbase'){
						$this->beginWidget('zii.widgets.CPortlet', array(
						  'title'=>'操作管理',
						));
						$this->widget('zii.widgets.CMenu', array(
						  'items'=>$this->menu,
						  'htmlOptions'=>array('class'=>'operations'),
						));
						$this->endWidget();
					  }
					?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(".right1").find("h1").attr('style','overflow:hidden');
    $(".right1").find("h1").wrapInner('<div style="float:left; line-height:22px; margin-right:5px;"></div>');
    $(".caozuo").attr('style','float:left; font-size:12px; clear:none;');
    $(".right1").find("h1").append($(".caozuo"));
</script>