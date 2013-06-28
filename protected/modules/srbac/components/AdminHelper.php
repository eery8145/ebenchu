<?php

class AdminHelper {

//计算商家合作天数
	public static function getDaysValue($strattime,$stoptime) {
	    
	    $startdate=strtotime(date('Y-m-d',strtotime($strattime)));
		$enddate=strtotime(date('Y-m-d',strtotime($stoptime))); 
		$days= round(($enddate-$startdate)/3600/24) ;
	    return $days;
    }
//计算商家好评值
   public static function getWorthValue($recommend,$down,$money,$day) {
	    
		return (log($recommend+2)/log($down+2)*($money/$day));

    }

    //计算日期间隔
   public static function getDateInterval($interval) {
	
		// return date('Y-m-d H:i:s',strtotime("+20 minutes"));;
   	return date('Y-m-d H:i:s',strtotime("+".$interval));

    }

  //发送短信
    public static  function sendsms($mobile,$content,$nexttime)
  {
	  	$content=$content.'[新娘街]';
	    $content = iconv('UTF-8','GB2312//IGNORE',$content);
	 
	    $flag = 0; 
	    //要post的数据 
	    $argv = array( 
	      'sn'=>'SDK-BBX-010-08543', 
	      'pwd'=>'130459', 
	      'mobile'=>$mobile, 
	      'content'=>$content,
		  'stime'=>$nexttime,
	    );     
	    //构造要post的字符串 
	    $params='';
	    foreach ($argv as $key=>$value) { 
	      if ($flag!=0) { 
	         $params .= "&"; 
	         $flag = 1; 
	      } 
	      $params.= $key."="; $params.= urlencode($value); 
	      $flag = 1; 
	    } 
	    $length = strlen($params); 
	    //创建socket连接 
	    $fp = fsockopen("sdk2.entinfo.cn",80,$errno,$errstr,10) or exit($errstr."--->".$errno); 
	    //构造post请求的头 
	    $header = "POST /z_send.aspx HTTP/1.1\r\n"; 
	    $header .= "Host:sdk2.entinfo.cn\r\n"; 
	    $header .= "Referer:/mobile/sendpost.php\r\n"; 
	    $header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
	    $header .= "Content-Length: ".$length."\r\n"; 
	    $header .= "Connection: Close\r\n\r\n"; 
	    //添加post的字符串 
	    $header .= $params."\r\n"; 
	    //发送post的数据 
	    fputs($fp,$header); 
	    $inheader = 1;
	    while (!feof($fp)) 
	    { 
	      $line = fgets($fp,1024); //去除请求包的头只显示页面的返回数据 
	      if ($inheader && ($line == "\n" || $line == "\r\n")) { 
	        $inheader = 0; 
	      } 
	      if($inheader == 0) { 
	        // echo $line; 
	      }
	    } 
	    fclose($fp); 
	    if($line==1)
	    {
	    //echo '短信发送成功 请查收 返回值'.$line ;  
	    return true;
	    }else
	    {
	     //echo '短信发送失败,请根据返回值查看相关错误问题 返回值'.$line ;
	     return false;
	    } 
  }
  
  public static function getSendCouponInfo($objShop,$objUser,$status='1'){
		is_object($objShop)?'':exit;
		is_object($objUser)?'':exit;
		$userCcontent="";
        $shopCcontent="";
		$times=date('Y-m-d H:i:s',time());
		$arr	=	json_decode($objShop->address);
		$addressList =$arr[0];
		if($status==1){
			
			//无认证+普通商家(approve==1 and  grade==2)
			if($objShop->BlogOne->approve==1 and $objShop->BlogOne->grade==2){
				if(!empty($addressList)){
					$userCcontent='您已预约了'.$objShop->username.',地址:'.$addressList.'电话'.$objShop->bind_mobile.',新娘街不予返现,消费有5000元保障[新娘街]';
				}
				$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与新娘街联系。客服电话:4006786160[新娘街]';
				
			//无认证+合作商家(approve==1 and  grade!=2 and grade!=0)
			}elseif ($objShop->BlogOne->approve==1 and $objShop->BlogOne->grade!=2 and $objShop->BlogOne->grade!=0) {

				if(!empty($addressList)){
					$userCcontent='您已预约了'.$objShop->username.',地址:'.$addressList.'电话'.$objShop->bind_mobile.',晒单可得新娘街100元返现，消费有5000元保障[新娘街]';
				}
				if(empty($objUser->mobile)){
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与顾客联系.[新娘街]';
				}else{
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,手机号为：'.$objUser->mobile.',请及时与新娘街联系.[新娘街]';
				}
				
			//有认证+普通商家(approve=0 and  grade=2)
			}elseif ($objShop->BlogOne->approve==0 and $objShop->BlogOne->grade==2) {
				if(!empty($addressList)){
					$userCcontent='您已预约了'.$objShop->username.',地址:'.$addressList.'电话'.$objShop->bind_mobile.',新娘街不予返现,消费有5000元保障[新娘街]';
				}
				if(!empty($objShop->bind_mobile)){
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与新娘街联系。客服电话:4006786160[新娘街]';
				}

			//有认证+合作商家(approve=0 and  grade!=2 and grade!=0)
			}elseif ($objShop->BlogOne->approve==0 and $objShop->BlogOne->grade!=2 and $objShop->BlogOne->grade!=0) {
				if(!empty($addressList)){
					$userCcontent='您已预约了'.$objShop->username.',地址:'.$addressList.'电话'.$objShop->bind_mobile.',晒单可得新娘街100元返现，消费有5000元保障[新娘街]';
				}
				if(empty($objUser->mobile)){
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与顾客联系.[新娘街]';
				}else{
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,手机号为：'.$objUser->mobile.',请及时与新娘街联系.[新娘街]';
				}
			}
			
            if(!empty($objUser->mobile)and !empty($userCcontent))
            {
            					$nexttime = date('Y-m-d H:i:s',time());
	                        	self::sendsms($objUser->mobile,$userCcontent,$nexttime);
	                        	echo '给会员手机号'.$objUser->mobile.'发短信：'.$userCcontent.'<br>';
	                        	var_dump($nexttime);
	        }
	        if(!empty($objShop->bind_mobile) and !empty($shopCcontent)){
	        					$nexttime = AdminHelper::getDateInterval("20 minutes");
	                        	self::sendsms($objShop->bind_mobile,$shopCcontent,$nexttime);
	                        	echo '给商家手机号'.$objShop->bind_mobile.'发短信：'.$shopCcontent.'<br>';
	                        	var_dump($nexttime);
	        }

		//提示商家优惠劵不足
		}elseif ($status==2) {
			if(!empty($addressList)){
					$userCcontent='您已预约了'.$objShop->username.',地址:'.$addressList.'电话'.$objShop->bind_mobile.',晒单可得新娘街100元返现，消费有5000元保障[新娘街]';
			}
			$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与新娘街联系。客服电话:4006786160[新娘街]';
            if(!empty($objUser->mobile) and !empty($userCcontent))
            {
            					$nexttime = date('Y-m-d H:i:s',time());
	                        	self::sendsms($objUser->mobile,$userCcontent,$nexttime);
	                        	echo '给会员手机号'.$objUser->mobile.'发短信：'.$userCcontent.'<br>';
	                        	var_dump($nexttime);
	        }
	        if(!empty($objShop->bind_mobile) and !empty($shopCcontent)){
	        					$nexttime = AdminHelper::getDateInterval("20 minutes");
	                        	self::sendsms($objShop->bind_mobile,$shopCcontent,$nexttime);
	                        	echo '给商家手机号'.$objShop->bind_mobile.'发短信：'.$shopCcontent.'<br>';
	                        	var_dump($nexttime);
	        }
		
		}
	}
   //代会员预约并发送促销短信
	public static  function getSendActivityCouponInfo($objShop,$objUser,$status){
		is_object($objShop)?'':exit;
		is_object($objUser)?'':exit;
		$userCcontent="";
        $shopCcontent="";
		$times=date('Y-m-d H:i:s',time());
		$FactivityContent	=	$objShop->FrdactivitiesOne->content;
		if($status==1){
			
			//无认证+普通商家(approve==1 and  grade==2)
			if($objShop->BlogOne->approve==1 and $objShop->BlogOne->grade==2){
				if(!empty($FactivityContent)){
					$userCcontent=$FactivityContent;
				}
				$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与新娘街联系。客服电话:4006786160[新娘街]';
				
			//无认证+合作商家(approve==1 and  grade!=2 and grade!=0)
			}elseif ($objShop->BlogOne->approve==1 and $objShop->BlogOne->grade!=2 and $objShop->BlogOne->grade!=0) {

				if(!empty($FactivityContent)){
					$userCcontent=$FactivityContent;
				}
				if(empty($objUser->mobile)){
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与顾客联系.[新娘街]';
				}else{
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,手机号为：'.$objUser->mobile.',请及时与新娘街联系.[新娘街]';
				}
				
			//有认证+普通商家(approve=0 and  grade=2)
			}elseif ($objShop->BlogOne->approve==0 and $objShop->BlogOne->grade==2) {
				if(!empty($FactivityContent)){
					$userCcontent=$FactivityContent;
				}
				if(!empty($objShop->bind_mobile)){
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与新娘街联系。客服电话:4006786160[新娘街]';
				}
			//有认证+合作商家(approve=0 and  grade!=2 and grade!=0)
			}elseif ($objShop->BlogOne->approve==0 and $objShop->BlogOne->grade!=2 and $objShop->BlogOne->grade!=0) {
				if(!empty($FactivityContent)){
					$userCcontent=$FactivityContent;
				}
				if(empty($objUser->mobile)){
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与顾客联系.[新娘街]';
				}else{
					$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,手机号为：'.$objUser->mobile.',请及时与新娘街联系.[新娘街]';
				}
			}
            if(!empty($objUser->mobile) and !empty($userCcontent))
            {
            					$nexttime = date('Y-m-d H:i:s',time());
	                        	self::sendsms($objUser->mobile,$userCcontent,$nexttime);
	                        	echo '给会员手机号'.$objUser->mobile.'发短信：'.$userCcontent.'<br>';
	                        	var_dump($nexttime);
	        }
	        if(!empty($objShop->bind_mobile) and !empty($shopCcontent)){
	        					$nexttime = AdminHelper::getDateInterval("20 minutes");
	                        	self::sendsms($objShop->bind_mobile,$shopCcontent,$nexttime);
	                        	echo '给商家手机号'.$objShop->bind_mobile.'发短信：'.$shopCcontent.'<br>';
	                        	var_dump($nexttime);
	        }

		//提示商家优惠劵不足
		}elseif ($status==2) {
			if(!empty($FactivityContent)){
					$userCcontent=$FactivityContent;
				}
			$shopCcontent='新娘街会员'.$objUser->username.'在'.$times.'时间预约了您家,请及时与新娘街联系。客服电话:4006786160[新娘街]';
			
            if(!empty($objUser->mobile) and !empty($objUser->mobile))
            {
	                        	$nexttime = date('Y-m-d H:i:s',time());
	                        	self::sendsms($objUser->mobile,$userCcontent,$nexttime);
	                        	echo '给会员手机号'.$objUser->mobile.'发短信：'.$userCcontent.'<br>';
	                        	var_dump($nexttime);
	        }
	        if(!empty($objShop->bind_mobile) and !empty($shopCcontent)){
	        					$nexttime = AdminHelper::getDateInterval("20 minutes");
	                        	self::sendsms($objShop->bind_mobile,$shopCcontent,$nexttime);
	                        	echo '给商家手机号'.$objShop->bind_mobile.'发短信：'.$shopCcontent.'<br>';
	                        	var_dump($nexttime);
	        }
		
		}
	}

	 //对象转为数组
  public static function objToArr($models){
    $res = array();
    foreach ($models as $key => $value) {
      $res[] = $value->attributes;
    }
    return $res;
  }

  //json存储中文
  //暂时只处理一维数组为json数据
  public static function jsonHelper($arr){
     if(is_array($arr)){  
        foreach ( $arr as $key => $value ) {   
            $arr[$key] = urlencode ( $value );   
        }
        return urldecode ( CJSON::encode ( $arr ) );  
     }else{
      return false;
     }
  }
  //商城关键词广告解绑套系
  public static function ProductJiebang($id){
	    $model=ProductKeyword::model()->find('keywordId = :keywordId and validate = 0', array(':keywordId'=>$id));;
        $model->bind = 1;
        if($model->save(false)){
        	$productrelatekeywordmodelMany = ProductRelateKeyword::model()->count('productId = '.$model->productId.' and validate = 0 and state="start"');
			if($productrelatekeywordmodelMany==1){
					$productrelatekeywordmodel = ProductRelateKeyword::model()->find('productId = '.$model->productId.' and validate = 0 and state="start"');
					$productrelatekeywordmodel->productId='';
					$productrelatekeywordmodel->save(false);
					$product = Product::model()->find('productId = :productId and validate = 0', array(':productId'=>$model->productId));
					$product->isTop=1;
					$product->save(false);
			}
			$ProductAttributeStoreAdMany = ProductAttributeStoreAd::model()->findAll('keywordId = :keywordId and validate = 0', array(':keywordId'=>$id));
			if(isset($ProductAttributeStoreAdMany)){
				foreach($ProductAttributeStoreAdMany as $k=>$value){
					$value->validate=1;
					$value->save(false);
				}
			}
			return true;
        }else{
        	return false;
        }
  }

    //商城关键词广告绑定套系
    public static function ProductBangding($keywordid,$productid){
     
	    $model=ProductKeyword::model()->find('keywordId = :keywordId and validate = 0', array(':keywordId'=>$keywordid));;
        $keywordOption=json_decode($model->keywordOption,true);  

		if(isset($productid))
		{
            $model->bind=0;
            $productrelatekeywordmodel = ProductRelateKeyword::model()->find('keywordId = :keywordId and validate = 0 and state="start"', array(':keywordId'=>$keywordid));
			$product = Product::model()->find('productId = :productId and validate = 0', array(':productId'=>$productid));
			$ShopModel = Author::model()->find('id = :id and validate = 0', array(':id'=>$model->shopId));
			if(!isset($product)){
				echo '此产品不存在，请换一下';exit;
			}else{
				$product->isTop=0;//商城关键词所需套系被绑定
				$product->save(false);
				if($model->save(false)){
					if(!isset($productrelatekeywordmodel)){
						$RelateKeywordNewModel=new ProductRelateKeyword;
						if($model->save(false)){
							$RelateKeywordNewModel->keywordId = $model->keywordId;
							$RelateKeywordNewModel->keywordname = $model->keywordName;
							$RelateKeywordNewModel->keyword_category = $model->categoryId;
							$RelateKeywordNewModel->keyword_position = $model->position;
							$RelateKeywordNewModel->ad_category = $model->keywordType;//关键词所属类型
							$RelateKeywordNewModel->starttime = date('Y-m-d H:i:s',time());
							$RelateKeywordNewModel->stoptime = $model->adTime;
							$RelateKeywordNewModel->state = 'start';
							$RelateKeywordNewModel->createtime = date('Y-m-d H:i:s',time());
							$RelateKeywordNewModel->userid = $model->shopId;
							$RelateKeywordNewModel->username = $ShopModel->username;
							$RelateKeywordNewModel->validate = 0;
							$productrelatekeywordmodel->productId=$model->productId;
							$RelateKeywordNewModel->cityId = $model->cityId;
							$RelateKeywordNewModel->save(false);
						}	
					}else{
						    $model->save(false);
							$productrelatekeywordmodel->productId=$model->productId;
							$productrelatekeywordmodel->save(false);
					} 
			        foreach ($keywordOption as $key => $value)
			        {
			        	$ProductAttributeStoreAdModel=new ProductAttributeStoreAd;
			        	$ProductAttributeStoreAdModel->createTime = date('Y-m-d H:i:s',time());
			        	$ProductAttributeStoreAdModel->validate=0;
			        	$ProductAttributeStoreAdModel->cityId=$model->cityId;  
			        	$ProductAttributeStoreAdModel->productId=$model->productId;
			        	$ProductAttributeStoreAdModel->keywordId=$model->keywordId;
			        	$ProductAttributeStoreAdModel->recommend=$model->keywordType;//关键词所属类型
			        	$ProductAttributeStoreAdModel->attributeId=$value['attributeId'];
			        	$ProductAttributeStoreAdModel->element=$value['attributeName'];
						
		                if($model->keywordType==1){//栏目首页关键词广告

	                	$ProductAttributeStoreAdModel->categoryId=$model->categoryId;
			        	$ProductAttributeStoreAdModel->childCategoryId=$model->categoryId;   	
						$ProductAttributeStoreAdModel->orderList=100;
			        	$ProductAttributeStoreAdModel->cateOrder=$model->position;

		                }else if($model->keywordType==2){//类别首页关键词广告
		                	$productcatemodel = ProductCategory::model()->find('categoryId = :categoryId and validate = 0', array(':categoryId'=>$model->categoryId));
		                	$ProductAttributeStoreAdModel->categoryId=$productcatemodel->parentId;
				        	$ProductAttributeStoreAdModel->childCategoryId=$model->categoryId;   	
							$ProductAttributeStoreAdModel->orderList=$model->position;
				        	$ProductAttributeStoreAdModel->cateOrder=100;
		                }else if($model->keywordType==3){//单一关键词广告
		                	$productcatemodel = ProductCategory::model()->find('categoryId = :categoryId and validate = 0', array(':categoryId'=>$model->categoryId));
		                	$ProductAttributeStoreAdModel->categoryId=$productcatemodel->parentId;
				        	$ProductAttributeStoreAdModel->childCategoryId=$model->categoryId; 
							$ProductAttributeStoreAdModel->orderList=$model->position;
				        	$ProductAttributeStoreAdModel->cateOrder=100;
		                }else if($model->keywordType==5){//类别+1个关键词
		                	$productcatemodel = ProductCategory::model()->find('categoryId = :categoryId and validate = 0', array(':categoryId'=>$model->categoryId));
		                	$ProductAttributeStoreAdModel->categoryId=$productcatemodel->parentId;
				        	$ProductAttributeStoreAdModel->childCategoryId=$model->categoryId;  	
							$ProductAttributeStoreAdModel->orderList=$model->position;
				        	$ProductAttributeStoreAdModel->cateOrder=100;
		                }else if($model->keywordType==6){//类别+2个关键词
		                	$productcatemodel = ProductCategory::model()->find('categoryId = :categoryId and validate = 0', array(':categoryId'=>$model->categoryId));
		                	$ProductAttributeStoreAdModel->categoryId=$productcatemodel->parentId;
				        	$ProductAttributeStoreAdModel->childCategoryId=$model->categoryId; 	
							$ProductAttributeStoreAdModel->orderList=$model->position;
				        	$ProductAttributeStoreAdModel->cateOrder=100;
		                }else if($model->keywordType==7){//类别+3个关键词
		                	$productcatemodel = ProductCategory::model()->find('categoryId = :categoryId and validate = 0', array(':categoryId'=>$model->categoryId));
		                	$ProductAttributeStoreAdModel->categoryId=$productcatemodel->parentId;
				        	$ProductAttributeStoreAdModel->childCategoryId=$model->categoryId; 	
							$ProductAttributeStoreAdModel->orderList=$model->position;
				        	$ProductAttributeStoreAdModel->cateOrder=100;
		                }else if($model->keywordType==8){//2个关键词
		                	$productcatemodel = ProductCategory::model()->find('categoryId = :categoryId and validate = 0', array(':categoryId'=>$model->categoryId));
		                	$ProductAttributeStoreAdModel->categoryId=$productcatemodel->parentId;
				        	$ProductAttributeStoreAdModel->childCategoryId=$model->categoryId;   	
							$ProductAttributeStoreAdModel->orderList=$model->position;
				        	$ProductAttributeStoreAdModel->cateOrder=100;
		                }else if($model->keywordType==9){//3个关键词
		                	$productcatemodel = ProductCategory::model()->find('categoryId = :categoryId and validate = 0', array(':categoryId'=>$model->categoryId));
		                	$ProductAttributeStoreAdModel->categoryId=$productcatemodel->parentId;
				        	$ProductAttributeStoreAdModel->childCategoryId=$model->categoryId;   	
							$ProductAttributeStoreAdModel->orderList=$model->position;
				        	$ProductAttributeStoreAdModel->cateOrder=100;
		                }else if($model->keywordType==4){//组合关键词广告
		                	$productcatemodel = ProductCategory::model()->find('categoryId = :categoryId and validate = 0', array(':categoryId'=>$model->categoryId));
		                	$ProductAttributeStoreAdModel->categoryId=$productcatemodel->parentId;
				        	$ProductAttributeStoreAdModel->childCategoryId=$model->categoryId;   	
							$ProductAttributeStoreAdModel->orderList=$model->position;
				        	$ProductAttributeStoreAdModel->cateOrder=100;
		                }
		                $ProductAttributeStoreAdModel->save(false);
	        		}
                    return true;
				}else{
					return flase;
				}
				return flase;
			}
			return flase;
		}
		return flase;
    }

}

?>