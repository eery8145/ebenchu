<?php

/**
 * This is the model class for table "cm_group".
 *
 * The followings are the available columns in table 'cm_group':
 * @property integer $id
 * @property integer $tid
 * @property string $name
 * @property string $logo
 * @property string $des
 * @property integer $sort
 * @property integer $pnum
 * @property integer $create_time
 * @property integer $status
 * @property integer $type
 */
class Group extends CActiveRecord
{
	public $_modelName = '小组';
	public $tag;
	public $mark;//标识
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Group the static model class
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
		return Yii::app()->params['tablePrefix'].'group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required','message'=>'小组名称不能为空！'),
			array('des', 'required','message'=>'小组介绍不能为空！'),
			array('type', 'required','message'=>'小组类型不能为空！'),
			array('tag', 'required','message'=>'标签不能为空！'),
			array('logo,alias, sort, pnum, create_time, status,uid', 'required'),
			array('tid, sort, pnum, status, type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('logo', 'length', 'max'=>50),
			array('des', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tid, name, logo, des, sort, pnum, create_time, status, type', 'safe', 'on'=>'search'),
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
			'mmemberMany'=>array(self::HAS_MANY, 'Mmember', 'gid'),
			'mmemberCount'=>array(self::STAT, 'Mmember', 'gid'),
			//用户
			'memberOne'=>array(self::BELONGS_TO, 'Member', 'uid'),
			//话题
			'topicMany'=>array(self::HAS_MANY, 'Topic', 'gid', 'condition'=>'status != 2'),
			'topicCount'=>array(self::STAT, 'Topic', 'gid', 'condition'=>'status != 2'),

			//标签
			'tagOne'=>array(self::BELONGS_TO, 'Tag', 'tid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tid' => '标签分类',
			'name' => '名称',
			'logo' => '头像',
			'des' => '描述',
			'sort' => '排序',
			'pnum' => '点击次数',
			'create_time' => '创建时间',
			'status' => '状态',
			'type' => '类型',
			'uid' => '组长',
			'tag' => '标签',
			'alias' => '小组成员别名',
		);
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
		$criteria->compare('tid',$this->tid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('des',$this->des,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('pnum',$this->pnum);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type);
		$criteria->compare('uid',$this->uid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	// 获取图片链接
	public function getImgLink(){
		$imgLink = "/upload/group_logo/".$this->logo;
		if($this->logo == 'cm.jpg'){
			$imgLink = '/upload/group_photo/cm.jpg';
		}
		return $imgLink;
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

	public function getLink(){
		return Yii::app()->controller->createUrl('/group/detail',array('id'=>$this->id));
	}

	public function getAliasname(){
		return $this->alias?$this->alias:'小组成员';
	}
}