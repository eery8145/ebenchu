<?php

/**
 * This is the model class for table "cm_topic".
 *
 * The followings are the available columns in table 'cm_topic':
 * @property integer $id
 * @property integer $uid
 * @property integer $gid
 * @property string $title
 * @property string $content
 * @property integer $create_time
 * @property integer $status
 * @property integer $response_num
 * @property integer $update_time
 * @property integer $hot
 */
class Topic extends CActiveRecord
{
	public $_modelName = '话题';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Topic the static model class
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
		return Yii::app()->params['tablePrefix'].'topic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid','checkMember'),
			array('title', 'required','message'=>'标题不能为空!'),
			array('content', 'required','message'=>'内容不能为空!'),
			
			array('uid, gid, create_time, update_time', 'required'),
			array('uid, gid, status, response_num, hot', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, gid, title, content, create_time, status, response_num, update_time, hot, istop', 'safe'),
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
			'memberOne'=>array(self::BELONGS_TO, 'Member', 'uid'),//	
			'groupOne'=>array(self::BELONGS_TO, 'Group', 'gid'),//	
			'responseMany'=>array(self::HAS_MANY, 'Response', 'tid', 'condition'=>'status = 1'),
			'responseCount'=>array(self::STAT, 'Response', 'tid', 'condition'=>'status = 1'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => '用户',
			'gid' => '小组',
			'title' => '标题',
			'content' => '内容',
			'create_time' => '创建时间',
			'status' => '状态',
			'response_num' => '回复数',
			'update_time' => '修改时间',
			'hot' => '热度',
			'istop' => '是否置顶',
		);
	}

	// 获取状态列表
	public function getStatusList(){
		return array(
			1=>'审核通过',
			2=>'审核未通过',
			3=>'已解决',
			4=>'已完成',
			5=>'已采纳,正在实现···',
			6=>'已采纳,已经实现···',
		);
	}

	public function getStatusName(){
		return $this->statusList[$this->status];
	}

	// 获取置顶列表
	public function getIstopList(){
		return array(
			1=>'置顶',
			2=>'不置顶',
		);
	}

	public function getIstopName(){
		return $this->istopList[$this->istop];
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

		$criteria->compare('id',$this->id);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('gid',$this->gid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('response_num',$this->response_num);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('hot',$this->hot);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getLink(){
		return Yii::app()->controller->createUrl('/group/topic',array('id'=>$this->id));
	}

	// 获取发布话题时间
	public function getFabutime(){
		return Helper::format_date($this->create_time);
	}
	//检测小组成员
	public function checkMember(){
		if(Yii::app()->user->id!=$this->uid){
			$this->addError('uid','数据错误非法提交');
			return false;
		}
		$mmember=Mmember::model()->find('mid='.$this->uid.' and gid='.$this->gid);
		
		if(empty($mmember->mid)){
			$this->addError('uid','您尚未加入该小组，请先加入该组后发布话题');
			return false;
		}
	}
}