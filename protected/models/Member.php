<?php

/**
 * This is the model class for table "rbac_member".
 *
 * The followings are the available columns in table 'rbac_member':
 * @property string $id
 * @property string $username
 * @property string $nickname
 * @property string $password
 * @property string $bind_account
 * @property string $last_login_time
 * @property string $last_login_ip
 * @property string $verify
 * @property string $email
 * @property string $remark
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 * @property integer $role_id
 * @property string $info
 * @property integer $salt
 * @property string $photo
 */
class Member extends CActiveRecord
{
	public $_modelName = '会员';
	public $passwordrepeat;//重复密码
	public $verifyCode;//验证码


	public $oldpass; //旧密码
	public $newpass; //新密码
	public $queren;  //确认密码

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Member the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->params['tablePrefix'].'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, nickname, password,passwordrepeat,oldpass,newpass,queren', 'required','message'=>'值不能为空！'),
			array('oldpass','yzoldpass'),
			array('newpass','checknewpassword'),
			array('username', 'unique','message'=>'用户名已存在'),
			array('password','checkPassword'),//验证密码
			array('passwordrepeat','checknewpass'),//重复密码验证
			array('verifyCode','captcha'),
			array('bind_account, email, remark, create_time, update_time, info, salt, photo', 'required'),
			array('status, role_id, salt,score', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>64),
			array('nickname, bind_account, email, photo', 'length', 'max'=>50),
			array('password, verify', 'length', 'max'=>32),
			array('last_login_time, create_time, update_time', 'length', 'max'=>11),
			array('last_login_ip', 'length', 'max'=>40),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, nickname, password, bind_account, last_login_time, last_login_ip, verify, email, remark, create_time, update_time, status, role_id, info, salt, photo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		
		return array(
			//我加入的小组
			'mGroup'=>array(self::MANY_MANY, 'Group','cm_mmember(mid, gid)','condition'=>'status = 1'),
			'mGroupCount'=>array(self::STAT, 'Group','cm_mmember(mid, gid)','condition'=>'status = 1'),
			//我的小组
			'groupMany'=>array(self::HAS_MANY, 'Group', 'uid', 'condition'=>'status = 1'),
			'groupCount'=>array(self::STAT, 'Group', 'uid', 'condition'=>'status = 1'),
			
			//我的话题
			'topicMany'=>array(self::HAS_MANY, 'Topic', 'uid', 'condition'=>'status = 1'),
			'topicCount'=>array(self::STAT, 'Topic', 'uid', 'condition'=>'status = 1'),
			//我的积分状态
			'myUserScoreOne'=>array(self::HAS_ONE, 'UserScore', 'mid'),
			//用户对用角色
			'roleOne'=>array(self::BELONGS_TO, 'Role', 'role_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => '用户名',
			'nickname' => '昵称',
			'password' => '密码',
			'bind_account' => '绑定账号',
			'last_login_time' => '最后登录时间',
			'last_login_ip' => '最后登录IP',
			'verify' => 'Verify',
			'email' => '邮箱',
			'remark' => '标签',
			'create_time' => '创建时间',
			'update_time' => '修改时间',
			'status' => '状态',
			'role_id' => '角色',
			'info' => '简介',
			'salt' => 'Salt',
			'photo' => '头像',
			'oldpass' => '旧密码',
			'newpass' => '新密码',
			'queren' => '确认密码',
			'score' => '积分',
		);
	}

	public function checknewpassword($attribute,$params){
		if($this->newpass !== $this->queren){
			$this->addError('Member_newpass','两次输入的密码不一致');
		}
	}

	public function yzoldpass($attribute,$params){
		if(md5($this->oldpass.$this->salt)!=$this->password){
			$this->addError('Member_oldpass','旧密码不正确');
		}
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('bind_account',$this->bind_account,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('last_login_ip',$this->last_login_ip,true);
		$criteria->compare('verify',$this->verify,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('salt',$this->salt);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('score',$this->score,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function hashPassword(){
		return md5($this->password.$this->salt);
	}

    public function checkPassword(){
    	if(!empty($this->password)){
    		if(strlen($this->password)<6 or strlen($this->password)>16){
    			$this->addError('password','请使用6-16位字符作为密码！');
    		}
    	}
    }
	public function checknewpass(){
		if(!empty($this->passwordrepeat)){
			if($this->password !== $this->passwordrepeat){
				$this->addError('passwordrepeat','两次输入的密码不一致');
			}
		}
		
	}

	// 获取状态列表
	public function getStatusList(){
		return array(
			1=>'审核通过',
			2=>'审核未通过',
			);
	}

	public function getStatusName(){
		return $this->statusList[$this->status];
	}

	// 获取图片链接
	public function getImgLink(){
		$imgLink = "/upload/user_photo/".$this->photo;
		if($this->photo == 'cm.jpg'){
			$imgLink = '/upload/group_photo/cm.jpg';
		}
		return $imgLink;
	}

	// 获取我回复的帖子
	public function getMyreplys(){
		$res = Response::model()->findAll(array("condition"=>'uid = '.$this->id,'select'=>'tid','group'=>'tid'));
		$tids = array();
		foreach ($res as $key => $value) {
			$tids[] = $value->tid;
		}
		$tidsStr = implode(',', $tids);
		if(!empty($tidsStr)){
			$topics = Topic::model()->findAll(array('condition'=>"id in ($tidsStr)"));
			return $topics;
		}else{
			return array();
		}
	}

	public function getKongjian(){
		return Yii::app()->controller->createUrl('/kongjian/index',array('uid'=>$this->id));
	}
	//创建用户积分
	public function createrScore(){
		$myUserScroe=new UserScore;
		$myUserScroe->mid=$this->id;
		$myUserScroe->zhuce=$this->score;
		$myUserScroe->save(false);
	}
	
}