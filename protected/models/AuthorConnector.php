<?php

/**
 * This is the model class for table "dc_author_connector".
 *
 * The followings are the available columns in table 'dc_author_connector':
 * @property integer $oaId
 * @property string $openId
 * @property string $source
 * @property string $accessToken
 * @property integer $userId
 * @property string $createTime
 * @property integer $validate
 */
class AuthorConnector extends CActiveRecord
{
	public $_modelName = '第三方登录';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AuthorConnector the static model class
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
		return Yii::app()->params['tablePrefix'].'author_connector';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, validate', 'numerical', 'integerOnly'=>true),
			array('openId', 'length', 'max'=>200),
			array('source', 'length', 'max'=>20),
			array('accessToken', 'length', 'max'=>255),
			array('createTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('oaId, openId, source, accessToken, userId, createTime, validate', 'safe', 'on'=>'search'),
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
			'oaId' => 'Oa',
			'openId' => 'Open',
			'source' => 'Source',
			'accessToken' => 'Access Token',
			'userId' => 'User',
			'createTime' => 'Create Time',
			'validate' => 'Validate',
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

		$criteria->compare('oaId',$this->oaId);
		$criteria->compare('openId',$this->openId,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('accessToken',$this->accessToken,true);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('validate',$this->validate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}