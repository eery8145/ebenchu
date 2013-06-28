<?php

/**
 * This is the model class for table "cm_role".
 *
 * The followings are the available columns in table 'cm_role':
 * @property integer $id
 * @property string $name
 * @property integer $sort
 * @property integer $create_time
 * @property integer $status
 * @property integer $multiple
 * @property integer $upnum
 */
class Role extends CActiveRecord
{

	public $_modelName = '用户角色';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Role the static model class
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
		return 'cm_role';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, sort, create_time', 'required'),
			array('sort, create_time, status, multiple, upnum', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, sort, create_time, status, multiple, upnum', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'sort' => 'Sort',
			'create_time' => 'Create Time',
			'status' => 'Status',
			'multiple' => 'Multiple',
			'upnum' => 'Upnum',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('multiple',$this->multiple);
		$criteria->compare('upnum',$this->upnum);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}