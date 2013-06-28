<?php

/**
 * This is the model class for table "cm_links".
 *
 * The followings are the available columns in table 'cm_links':
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $img
 * @property integer $sort
 * @property integer $create_time
 * @property integer $status
 */
class Links extends CActiveRecord
{

	public $_modelName = '友情链接';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Links the static model class
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
		return Yii::app()->params['tablePrefix'].'links';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, url, img, sort, create_time, status', 'required'),
			array('sort, create_time, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>150),
			array('url', 'length', 'max'=>255),
			array('img', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, url, img, sort, create_time, status', 'safe', 'on'=>'search'),
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
			'name' => '名称',
			'url' => '地址',
			'img' => '图片',
			'sort' => '排序',
			'create_time' => '创建时间',
			'status' => '状态',
		);
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
		$imgLink = "/upload/links/".$this->img;
		return $imgLink;
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}