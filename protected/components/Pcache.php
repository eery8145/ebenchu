<?php

class Pcache extends CController
{
	//获取行业名称
    static public  function getIndustry ($id){

      if(!empty($id)){

        $IndustryCacheQian = Yii::app()->params['CachePrefixes']['Industry'].$id;
        $Industry = Yii::app()->cache->get($IndustryCacheQian);
          if(empty($Industry)){
            $Industry=SupplyCashColumn::model()->find(array("condition"=>"column_id = ".$id." and validate = 0"));
              Yii::app()->cache->set($IndustryCacheQian, $Industry);
          }
        return $Industry->title;   
      }else{
        return false;
      }


    }
    //获取区域名称
    static public function getArea ($id){
       if(!empty($id)){

        $AreaCacheQian = Yii::app()->params['CachePrefixes']['Area'].$id;
        $Area = Yii::app()->cache->get($AreaCacheQian);
          if(empty($Area)){
            $Area=District::model()->find(array("condition"=>"district_id = ".$id." and validate = 0"));
              Yii::app()->cache->set($AreaCacheQian, $Area);
          }
        return $Area->district_name;   
      }else{
        return false;
      }

    }

    //获取地区名称
    static public function getCity ($id){
       if(!empty($id)){

        $CityCacheQian = Yii::app()->params['CachePrefixes']['City'].$id;
        $City = Yii::app()->cache->get($CityCacheQian);
          if(empty($City)){
            $City=City::model()->find(array("condition"=>"id = ".$id." and validate = 0"));
              Yii::app()->cache->set($CityCacheQian, $City);
          }
        return $City->city_name;   
      }else{
        return false;
      }

    }
  
}

?>