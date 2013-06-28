<?php
      $userid = Yii::app()->controller->module->getComponent('user')->id;
      $sql = 'SELECT * FROM `rbac_itemchildren` LEFT JOIN `rbac_items` ON child = NAME WHERE parent IN (SELECT itemname FROM `rbac_assignments` WHERE userid = '.$userid.') ORDER BY DATA';

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
<ul id="main-nav">
  <?php foreach($menu_res as $key => $value){ ?>
  <li> <a href="javascript:void(0)" class="nav-top-item<?php if($key == $current){ echo ' current';} ?>">
    <?php echo $key; ?> </a> 
    <ul>
      <?php foreach($value as $k => $v){ ?>
      <li><a <?php if($v['child'] == Yii::app()->controller->id){ ?>class="current"<?php } ?> href="<?php echo Yii::app()->createUrl('/srbac/'.$v['child'].'/admin'); ?>"><?php echo $v['description']; ?></a></li>
      <?php } ?>
    </ul>
  </li>
  <?php } ?>
</ul>