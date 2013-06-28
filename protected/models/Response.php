<?php

/**
 * This is the model class for table "cm_response".
 *
 * The followings are the available columns in table 'cm_response':
 * @property integer $id
 * @property integer $uid
 * @property integer $tid
 * @property string $content
 * @property integer $create_time
 * @property integer $status
 */
class Response extends CActiveRecord
{
	public $fcontent;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Response the static model class
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
		return Yii::app()->params['tablePrefix'].'response';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid,tid', 'required','message'=>'不能为空'),
			array('content', 'required','message'=>'内容不能为空'),
			array('create_time, pid,status', 'required'),
			array('create_time, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, tid, content, create_time, status', 'safe', 'on'=>'search'),
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
			'topicOne'=>array(self::BELONGS_TO, 'Topic', 'tid'),//
			'huifuOne'=>array(self::BELONGS_TO, 'Response', 'pid'),//

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => 'Uid',
			'tid' => 'Tid',
			'content' => 'Content',
			'create_time' => 'Create Time',
			'status' => 'Status',
			'pid' => 'pid',
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
		$criteria->compare('uid',$this->uid);
		$criteria->compare('tid',$this->tid);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('pid',$this->pid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}