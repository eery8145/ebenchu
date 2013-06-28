<?php

class GroupController extends Controller
{
	public $layout='common';

	public $filePath;

	public function actions()
	{
		list($s1, $s2) = explode(' ', microtime());   
		$fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
		$fileName.=rand(0,9999);
		if(!empty($_GET['fileName'])){
		  $fileName = $_GET['fileName'];
		}
		$path = $this->filePath[$_GET['filePath']];
		$after = $_GET['after'];
		$res = array(
		  //上传图片
		  'upload'=>array(
		    'class'=>'application.extensions.swfupload.SWFUploadAction',
		    'filepath'=>Yii::app()->basePath.'/../upload/'.$path.$fileName.'.EXT',
		    //注意这里是绝对路径,.EXT是文件后缀名替代符号
		    //'onAfterUpload'=>array($this,'saveFile'),
		  )
		);
		if(!empty($after)){
		  $res['upload']['onAfterUpload'] = array($this,$after);
		}
		return $res;
	}

	public static $member;//用户信息

	public static function  oftenGo(){
		if(!Yii::app()->user->isGuest){
			self::$member=Member::model()->find('id='.Yii::app()->user->id);
		}else{
			self::$member='';
		}
		return self::$member->mGroup;
	}

	public function init(){
		$this->filePath=array(
	      1=>'group_logo/'.date('Y-m-d').'/',//套系(从upload目录开始)
		);
		Yii::app()->clientScript->registerCssFile(CSS_PATH.'common.css');
	}
	
	//拉取个人信息
	public function isLogin(){
		if(!Yii::app()->user->isGuest){
			self::$member=Member::model()->find('id='.Yii::app()->user->id);
		}else{
			self::$member='';
		}
		return self::$member;
	}

	//我的小组话题
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest){
			$this->redirect('group/explore');//未登录跳转页面
		}else{
			//我的小组话题
			$model=$this->isLogin()->mGroup;
		
			$arr=array();
			foreach ($model as $key => $value) {
				$arr[$key]=(int) $value->id;
			}
			
			$criteria = new CDbCriteria(); 
			$criteria->addInCondition('gid', $arr);
        	$criteria->order ='create_time desc'; 
        	$count=Topic::model()->count($criteria);

        	$pager = new CPagination($count);
        	$pager->pageSize = 20;             
        	$pager->applyLimit($criteria); 

			$topic=Topic::model()->findAll($criteria);
		}


		$this->pageKeyword=array(
			'title'=>'我的小组话题-'.Helper::siteConfig()->site_name,
			'keywords'=>'我的小组话题',
			'description'=>'我的小组话题',
		);

		$this->render('index',array('topic'=>$topic,'pages'=>$pager));
	}
	//我发起的话题
	public function actionMyTopic()
	{
		if(Yii::app()->user->isGuest){
			$this->redirect('group/explore');//未登录跳转页面
		}else{

			//我发起的话题
			$criteria = new CDbCriteria(); 
			$criteria->addCondition("uid = :uid and status=:status"); 
			$criteria->params[':uid']=$this->isLogin()->id;//公开
			$criteria->params[':status']=1;//公开
        	$criteria->order ='create_time desc'; 
        	$count=Topic::model()->count($criteria);

        	$pager = new CPagination($count);    
        	$pager->pageSize = 20;             
        	$pager->applyLimit($criteria); 

			$topic=Topic::model()->findAll($criteria);
		}
		$this->pageKeyword=array(
			'title'=>'我发起的话题-'.Helper::siteConfig()->site_name,
			'keywords'=>'我发起的话题',
			'description'=>'我发起的话题',
		);
		$this->render('my_topic',array('model'=>$topic));
	}
	//我回应的话题
	public function actionRepliedTopics()
	{
		if(Yii::app()->user->isGuest){
			$this->redirect('group/explore');//未登录跳转页面
		}else{
			//我回应的话题
			$model=$this->islogin();
	
			$criteria = new CDbCriteria(); 
			$criteria->addCondition("uid = :uid"); 
   			$criteria->params[':uid']= $model->id;
      		$criteria->group ='tid';
      		
        	$count=Response::model()->count($criteria);
      
        	$pager = new CPagination($count);    
        	$pager->pageSize = 20;             
        	$pager->applyLimit($criteria); 

			$repliedtopics=$$count=Response::model()->findAll($criteria);

		}
		$this->pageKeyword=array(
			'title'=>'我回应的话题-'.Helper::siteConfig()->site_name,
			'keywords'=>'我回应的话题',
			'description'=>'我回应的话题',
		);
		$this->render('replied_topics',array('model'=>$repliedtopics,'pages'=>$pager));
	}

	//发现小组
	public function actionExplore(){
		
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');

		$gid = Yii::app()->request->getParam('gid');
		$tag=array();
		if(empty($gid)){

			$criteria = new CDbCriteria();
			$criteria->addCondition("status = :status"); 
			// $criteria->addCondition("type = :type"); 
	   		$criteria->params[':status']=1;//启用
	   		// $criteria->params[':type']=1;//公开
	        $criteria->order = 'pnum desc,create_time desc';    
	        $count = Group::model()->count($criteria);
	        
	        $pager = new CPagination($count);
	        $pager->pageSize = 20;         
	        $pager->applyLimit($criteria);

	        $artList = Group::model()->findAll($criteria);
		}else{
			$tag=Tag::model()->find('id = :id', array(':id'=>$gid));
			
			$criteria = new CDbCriteria();
			$criteria->addSearchCondition('tag',$tag->title);
			$criteria->addCondition("status = :status"); 
			// $criteria->addCondition("type = :type"); 
	   		$criteria->params[':status']=1;//启用
	   		// $criteria->params[':type']=1;//公开
	        $criteria->order = 'pnum desc,create_time desc';
	     
	        $count = Group::model()->count($criteria);
	        
	        $pager = new CPagination($count);
	        $pager->pageSize = 20;         
	        $pager->applyLimit($criteria);

	        $artList = Group::model()->findAll($criteria);
		}

        if(!Yii::app()->user->isGuest){
        	$model=Member::model()->find('id='.Yii::app()->user->id);
        	foreach ($artList as $key => $value) {
        		foreach ($model->mGroup as $k => $v) {
        			if($value->id==$v->id){
        				$artList[$key]->mark=1;
        			}
        		}
        	}
        }
        //seo设置
		$this->pageKeyword=array(
			'title'=>'发现小组'.'-'.Helper::siteConfig()->site_name,
			'keywords'=>'发现小组',
			'description'=>'发现小组',
		);
        
		$this->render('explore',array('list'=>$artList,'tag'=>$tag));
	}
	//小组详细
	public function actionDetail(){
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
		
		$id		=Yii::app()->request->getParam('id');//组id
		$model 	=Group::model()->find('id = :id and status = 1', array(':id'=>$id));

		if(!$model){
			throw new CHttpException(404,'您访问的小组不存在');
		}else{
			//读取登陆用户状态
			$m=$this->islogin();
			if(!empty($m)){
				$mmember=Mmember::model()->find('mid = :mid and gid = :gid', array(':mid'=>$m->id,':gid'=>$model->id));
				if($mmember){
					$Group=Group::model()->find('id = :id and uid = :uid', array(':id'=>$mmember->gid,':uid'=>$m->id));
					if($Group){
						$model->mark=2;
					}else{
						$model->mark=1;
					}
				}
			}
			//读取小组话题
			$_order=Yii::app()->request->getParam('order');
			if(!empty($_order) and $_order='hot'){
				$_order='hot desc,create_time desc';
			}else{
				$_order='create_time desc';
			}
			
			$criteria = new CDbCriteria(); 
        	$criteria->order = $_order; 
        	$count=$model->topicCount($criteria);

        	$pager = new CPagination($count);    
        	$pager->pageSize = 20;             
        	$pager->applyLimit($criteria); 

			$topic=$model->topicMany($criteria);	

			//读取最新加入小组成员
			$newMembe= Mmember::model()->findAll(
			      array(
			        "condition" => "gid = ".$model->id,
			        "limit"=>10,
					"order"=>'create_time desc',
					"group"=>'mid',
			      )
			 	);
			
		}
        //seo设置
		$this->pageKeyword=array(
			'title'=>$model->name.'-'.Helper::siteConfig()->site_name,
			'keywords'=>$model->name,
			'description'=>$model->name.'的详细信息',
		);
		$this->render('detail',array('model'=>$model,'topic'=>$topic,'pages'=>$pager,'newMember'=>$newMembe));
	}
	//申请加入小组
	public function actionAdd(){
		if(Yii::app()->user->isGuest){
			$this->redirect('group/explore');//未登录跳转页面
		}else{
			$gid=Yii::app()->request->getParam('gid');//组id
			$mid=Yii::app()->request->getParam('mid');//用户id
			if(!empty($gid) and !empty($mid) and Yii::app()->user->id==$mid){
				$model=Mmember::model()->find('gid = :gid and mid = :mid', array(':gid'=>$gid,':mid'=>$mid));
				if($model){
					$status['status']='3';
					$status['info']='您已经加入该组！';
				}else{
					$group=Group::model()->find('id = :id and status = 1', array(':id'=>$gid));
					if(empty($group)){
						$status['status']='9';
						$status['info']='非法操作！';
					}else{
						$Mmember=new Mmember;
						$Mmember->gid=$gid;
						$Mmember->mid=$mid;
						$Mmember->create_time=time();
						if($Mmember->save()){
							$group->pnum=$group->pnum+1;
							$group->save(false);
							$status['status']='1';
							$status['info']='加入成功！';
						}else{
							$status['status']='2';
							$status['info']='加入失败！';	
						}
					}
				}
			}else{
				$status['status']='9';
				$status['info']='非法操作！';
			}
		}
		die(CJSON::encode($status));
	}

	//退出小组
	public function actionDel(){
		if(Yii::app()->user->isGuest){
			$this->redirect('group/explore');//未登录跳转页面
		}else{
			$gid=Yii::app()->request->getParam('gid');//组id
			$mid=Yii::app()->request->getParam('mid');//用户id
			if(!empty($gid) and !empty($mid) and Yii::app()->user->id==$mid){
				$model=Mmember::model()->find('gid = :gid and mid = :mid', array(':gid'=>$gid,':mid'=>$mid));
				if(empty($model)){
					$status['status']='3';
					$status['info']='您尚未加入该组！';
				}else{
					if($model->delete()){
						$group=Group::model()->find('id = :id and status = 1', array(':id'=>$gid));
						$group->pnum=$group->pnum-1;
						$group->save(false);
						$status['status']='1';
						$status['info']='退出成功！';
					}else{
						$status['status']='2';
						$status['info']='退出失败！';	
					}
				}
			}else{
				$status['status']='9';
				$status['info']='非法操作！';
			}
		}
		die(CJSON::encode($status));
	}
	//我加入的小组
	public function actionMine(){
		if(Yii::app()->user->isGuest){
			$this->redirect('group/explore');//未登录跳转页面
		}else{
			$model=$this->isLogin();	
		}
		$this->pageKeyword=array(
			'title'=>'我加入的小组'.'-'.Helper::siteConfig()->site_name,
			'keywords'=>'我加入的小组',
			'description'=>'我加入的小组',
		);
		$this->render('mine',array('model'=>$model));
	}

	//申请小组
	public function actionApply(){
		if(Yii::app()->user->isGuest){
			throw new CHttpException ('404', '您访问的页面不存在');  
		}else{
			$this->pageKeyword=array(
				'title'=>'申请创建小组'.'-'.Helper::siteConfig()->site_name,
				'keywords'=>'申请创建小组',
				'description'=>'申请创建小组',
			);
			$this->render('apply'); 
		}
	}

	//创建小组
	public function actionCreate(){
		if(Yii::app()->user->isGuest){
			 throw new CHttpException ('404', '您访问的页面不存在'); 
		}
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery.form.js');

		$model=new Group;
		if(!empty($_POST['Group'])){
			//赋值给模型      
	      	$memberModel->attributes=$_POST['Group'];
	      	$memberModel->create_time = date('Y-m-d H:i:s',time());
	      	//验证
	      	$ajaxRes 	= 	CActiveForm::validate($model, array('newpass','oldpass','queren'));
	      	$ajaxResArr = 	CJSON::decode($ajaxRes);
	      	//验证结果
	      	if(empty($ajaxResArr)){
	      		$model->uid=Yii::app()->user->id;
	      	 	$model->create_time=time();//创建时间
	      	 	$model->tid=0;//默认无tag分类
	      	 	$model->status=2;//默认审核不通过
	      	 	$model->pnum=1;
	      
	      	 	if($model->save(false)){
	      	 		$mmember=new Mmember;
	      	 		$mmember->mid=Yii::app()->user->id;
	      	 		$mmember->gid=$model->id;
	      	 		$mmember->create_time=time();//创建时间
	      	 		$mmember->save();
	      	 		die(CJSON::encode(array('status'=>1)));
	      	 	}else{
	      	 		die(CJSON::encode(array('status'=>0)));
	      	 	}
	      	 	
	      	 }else{
	      	 	die($ajaxRes);
	      	 }

		}
		$this->pageKeyword=array(
			'title'=>'创建小组'.'-'.Helper::siteConfig()->site_name,
			'keywords'=>'创建小组',
			'description'=>'创建小组',
		);
		$this->render('create',array('model'=>$model));
	}

	//创建小组
	public function actionUpdate(){
		if(Yii::app()->user->isGuest){
			 throw new CHttpException ('404', '您访问的页面不存在'); 
		}
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery.form.js');

		$id = Yii::app()->request->getParam('id');//小组id

		$model=Group::model()->find('id = :id and uid = :uid', array('id'=>$id, 'uid'=>Yii::app()->user->id));

		if(!empty($_POST['Group'])){
			//赋值给模型      
    	$memberModel->attributes=$_POST['Group'];
    	//验证
    	$ajaxRes 	= 	CActiveForm::validate($model, array('name','des','type','tag'));
    	$ajaxResArr = 	CJSON::decode($ajaxRes);
    	//验证结果
    	if(empty($ajaxResArr)){
    		$model->uid=Yii::app()->user->id;
    	 	// $model->create_time=time();//创建时间
    	 	// $model->tid=0;//默认无tag分类
    	 	// $model->logo='cm.jpg';
    	 	// $model->pnum=1;
    
    	 	if($model->save(false)){
    	 		// $mmember=new Mmember;
    	 		// $mmember->mid=Yii::app()->user->id;
    	 		// $mmember->gid=$model->id;
    	 		// $mmember->create_time=time();//创建时间
    	 		// $mmember->save();
    	 		die(CJSON::encode(array('status'=>1)));
    	 	}else{
    	 		die(CJSON::encode(array('status'=>0)));
    	 	}
    	 }else{
    	 	die($ajaxRes);
    	 }
		}
		$this->pageKeyword=array(
			'title'=>'修改小组'.'-'.Helper::siteConfig()->site_name,
			'keywords'=>'修改小组',
			'description'=>'修改小组',
		);
		$this->render('update',array('model'=>$model));
	}

	//发现话题
	public function actionExploreTopic(){
		
		$criteria = new CDbCriteria(); 
    	$criteria->order ='create_time desc'; 
    	$criteria->addCondition("status != :status"); 
    	$criteria->params[':status']=2;//启用
    	$count=Topic::model()->count($criteria);

    	$pager = new CPagination($count); 
    	$pager->pageSize = 20;             
    	$pager->applyLimit($criteria); 

		$model=Topic::model()->findAll($criteria);
		$this->pageKeyword=array(
			'title'=>'发现话题'.'-'.Helper::siteConfig()->site_name,
			'keywords'=>'发现话题',
			'description'=>'发现话题',
		);
		$this->render('explore_topic',array('model'=>$model,'pager'=>$pager));
	}

	//增加话题
	public function actionAddTopic(){

		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery.form.js');
		
		$gid=Yii::app()->request->getParam('id');//组id
		$group=Group::model()->find('id = :id and status =1', array(':id'=>$gid));
		if(Yii::app()->user->isGuest or empty($group)){
			 throw new CHttpException ('404', '您访问的页面不存在');  
		}

		$model=new Topic;
		
		if(!empty($_POST['Topic'])){

			//赋值给模型      
	      	$model->attributes=$_POST['Topic'];
	      	$model->uid=Yii::app()->user->id;
			$model->gid=$gid;
	      	//验证
	      	$ajaxRes 	= 	CActiveForm::validate($model, array('title','content','uid','gid'));
	      	$ajaxResArr = 	CJSON::decode($ajaxRes);
	      	//验证结果
	      	if(empty($ajaxResArr)){
	      	 	$model->create_time=time();//创建时间
	      	 	$model->update_time=time();//更新时间
	      	 	$model->status=1;//状态
	      	 	$model->hot=0;//状态
	      	 	
	      	 	if($model->save(false)){
	      	 		scoreAction::setScore(Yii::app()->user->id,'fatie','add');
	      	 		die(CJSON::encode(array('status'=>1,'id'=>$gid)));
	      	 	}else{
	      	 		die(CJSON::encode(array('status'=>0)));
	      	 	}	
	      	 }else{
	      	 	die($ajaxRes);
	      	 }
		}


		$newMember= Mmember::model()->findAll(
			      array(
			        "condition" => "gid = ".$group->id,
			        "limit"=>10,
					"order"=>'create_time desc',
			      )
			 	);
		$this->pageKeyword=array(
			'title'=>'增加话题'.'-'.Helper::siteConfig()->site_name,
			'keywords'=>'增加话题',
			'description'=>'增加话题',
		);
		$this->render('add_topic',array('model'=>$model,'group'=>$group,'newMember'=>$newMember));
	}
	//编辑话题
	public function actionEditTopic(){

		if(Yii::app()->user->isGuest){
			$this->redirect('public/login');//未登录跳转页面
		}
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery.form.js');
		
		$id=Yii::app()->request->getParam('tid');//话题id
		$model=Topic::model()->find('id = :id and uid= :uid and  status =1', array(':id'=>$id,':uid'=>Yii::app()->user->id));

		if(empty($model)){
 			throw new CHttpException ('200', '操作失败!');  
		}


		if(!empty($_POST['Topic'])){
			
			//赋值给模型      
	      	$model->attributes=$_POST['Topic'];
	      	//验证
	      	$ajaxRes 	= 	CActiveForm::validate($model, array('title','content','uid','gid'));
	      	$ajaxResArr = 	CJSON::decode($ajaxRes);
	      	//验证结果
	      	if(empty($ajaxResArr)){
	      	 	$model->create_time=time();//创建时间
	      	 	$model->update_time=time();//更新时间
	      	 	$model->status=1;//状态
	      	 	$model->hot=0;//状态
	      	 	
	      	 	if($model->save(false)){
	      	 		die(CJSON::encode(array('status'=>1,'id'=>$model->id)));
	      	 	}else{
	      	 		die(CJSON::encode(array('status'=>0)));
	      	 	}	
	      	 }else{
	      	 	die($ajaxRes);
	      	 }
		}
		$this->pageKeyword=array(
			'title'=>'编辑话题'.'-'.Helper::siteConfig()->site_name,
			'keywords'=>'编辑话题',
			'description'=>'编辑话题',
		);
		$this->render('edit_topic',array('model'=>$model));
	}
	//话题详细
	public function actionTopic(){
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery-1.7.1.min.js');
		Yii::app()->clientScript->registerScriptFile(JS_PATH.'jquery.form.js');
		Yii::app()->clientScript->registerScriptFile('/js/applelike/js/script.js');

		
		
		$id=Yii::app()->request->getParam('id');//话题id
		$uid=Yii::app()->request->getParam('uid');//话题id
	
		$topic=Topic::model()->find(array('condition'=>'id = :id', 'params'=>array(':id'=>$id)));
		
		if(empty($topic)){
			 throw new CHttpException ('404', '您访问的页面不存在');  
		}
		$topic->hot = $topic->hot+1;
		$topic->save(false);
		//回应列表
		$criteria = new CDbCriteria(); 
			if(!empty($uid)){
			$criteria->addCondition("uid = :uid"); 
	   		$criteria->params[':uid']=$uid;//启用
		}
		
    	$criteria->order = 'create_time desc'; 
    	$count=$topic->responseCount($criteria);
    	$pager = new CPagination($count);    
    	$pager->pageSize = 20;             
    	$pager->applyLimit($criteria); 
		$response=$topic->responseMany($criteria);

		$model=new Response;
		//话题回应
		if(!Yii::app()->user->isGuest and !empty($topic)){
			if(!empty($_POST['Response'])){
				$model->uid=Yii::app()->user->id;
				$model->tid=$topic->id;
				//赋值给模型      
		      	$model->attributes=$_POST['Response'];
		      	$model->fcontent=$_POST['Response']['fcontent'];
		      
		      	//验证
		      	$ajaxRes 	= 	CActiveForm::validate($model, array('content','uid','tid'));
		      	$ajaxResArr = 	CJSON::decode($ajaxRes);
		      	//验证结果
		      	if(empty($ajaxResArr)){
		      		$model->content=trim($model->fcontent).$model->content;
		      	 	$model->create_time=time();//创建时间
		      	 	$model->status=1;//状态
		      	 	if($model->save(false)){
		      	 		scoreAction::setScore(Yii::app()->user->id,'huitie','add');
		      	 		$topic->create_time=time();//创建时间
		      	 		$topic->response_num+=1;
		      	 		$topic->save(false);
		      	 		die(CJSON::encode(array('status'=>1,'id'=>$gid)));
		      	 	}else{
		      	 		die(CJSON::encode(array('status'=>0)));
		      	 	}
		      	 }else{
		      	 	die($ajaxRes);
		      	 }
			}
		}

		//最新话题
		$hotTopic=Topic::model()->findAll(
	      array(
	        "condition" => "status!=2",
	        "limit"=>10,
			"order"=>'create_time desc',
	      )
	 	);

		//最热话题
		$newTopic=Topic::model()->findAll(
	      array(
	        "condition" => "status!=2",
	        "limit"=>10,
			"order"=>'hot desc',
	      )
	 	);
		$this->pageKeyword=array(
			'title'=>$topic->title.'-'.Helper::siteConfig()->site_name,
			'keywords'=>$topic->title,
			'description'=>$topic->title,
		);
		$this->render('topic',array('model'=>$topic,'response'=>$model,'responseList'=>$response,'pages'=>$pager,'hotTopic'=>$hotTopic,'newTopic'=>$newTopic));
	}
	//话题删除
	public function actionHuatidel(){
		if(!Yii::app()->user->isGuest){
			$id=Yii::app()->request->getParam('id');//帖子id
			if(!empty($id)){
				$model=Response::model()->find('id=:id',array(':id'=>$id));
				if($model->uid==Yii::app()->user->id){
					$model->status=0;
					if($model->save(false)){
	      	 			$stauts['status']='1';
						$stauts['info']='删除成功';
					}else{
	      	 			$stauts['status']='2';
						$stauts['info']='删除失败';
					}
				}else{
      	 			$stauts['status']='3';
					$stauts['info']='删除失败';
				}
			}else{
  	 			$stauts['status']='4';
				$stauts['info']='错误操作';
			}
			die(CJSON::encode($stauts));
		}else{
			throw new CHttpException(404,'内容不存在');
		}
	}

	//搜索话题/小组
	public function actionSearch(){
		$model='';

		$type = Yii::app()->request->getParam('type');
		$keyword = Yii::app()->request->getParam('keyword');

		$type = $type?$type:1;

		if($type == 2){
			$datas = Topic::model()->findAll(array('condition'=>"title like '%$keyword%'"));
		}else{
			$datas = Group::model()->findAll(array('condition'=>"name like '%$keyword%'"));
		}

		$this->pageKeyword=array(
			'title'=>'搜索-'.Helper::siteConfig()->site_name,
			'keywords'=>'搜索小组,搜索话题',
			'description'=>'搜索小组,搜索话题',
		);		

		$this->render('search',compact('model','datas','keyword','type'));
	}

	// 成员管理
	public function actionChengyuan(){

		$gid = Yii::app()->request->getParam('gid');
		$group = Group::model()->find('id = :id', array(':id'=>$gid));

		$members = $group->mmemberMany;
		$this->pageKeyword=array(
			'title'=>'成员管理-'.Helper::siteConfig()->site_name,
			'keywords'=>'成员管理',
			'description'=>'成员管理',
		);	
		$this->render('chengyuan',compact('group','members'));
	}
	// 小组管理
	public function actionXiaozu(){
		$this->render('xiaozu');
	}

}