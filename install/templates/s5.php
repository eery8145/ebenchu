<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title><?php echo $Title; ?> - <?php echo $Powered; ?></title>
<link rel="stylesheet" href="./css/install.css?v=9.0" />
</head>
<body>
<div class="wrap">
  <?php require './templates/header.php';?>
  <section class="section">
    <div class="">
      <div class="success_tip cc"> <a href="http://<?php echo $domain ?>/srbac/default/login" class="f16 b">安装完成，进入后台管理</a>
       
		
		<p>为了您站点的安全，安装完成后即可将网站根目录下的“Install”文件夹删除。<p>
      </div>
      <div class=""> </div>
    </div>
  </section>
</div>
<?php require './templates/footer.php';?>
</body>
</html>