<?php

/**
 * This is the model class for table "rbac_admins".
 *
 * The followings are the available columns in table 'rbac_admins':
 * @property string $userid
 * @property string $username
 * @property string $password
 * @property integer $validate
 * @property string $createtime
 */
class Admins extends CActiveRecord
{
	public $_modelName = '后台用户';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Admins the static model class
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
		return Yii::app()->params['tablePrefix'].'admins';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('validate', 'numerical', 'integerOnly'=>true),
			array('username,password', 'required'),
			array('createtime,ip', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userid, username, password, validate, createtime', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'Userid',
			'username' => '用户名',
			'password' => '密码',
			'validate' => '状态',
			'ip' => '登录IP',
			'createtime' => '创建时间',
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

		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('validate',$this->validate);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	// 获取状态列表
	public function getStatusList(){
		return array(
			1=>'审核通过',
			2=>'审核未通过',
			);
	}

	public function getStatusName(){
		return $this->statusList[$this->validate];
	}
}