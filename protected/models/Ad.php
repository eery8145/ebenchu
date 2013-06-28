<?php

/**
 * This is the model class for table "cm_ad".
 *
 * The followings are the available columns in table 'cm_ad':
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $status
 * @property integer $create_time
 * @property integer $sort
 * @property string $img
 */
class Ad extends CActiveRecord
{

	public $_modelName = '广告';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ad the static model class
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
		return Yii::app()->params['tablePrefix'].'ad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, url, status, create_time, sort, img', 'required'),
			array('status, create_time, sort, type', 'numerical', 'integerOnly'=>true),
			array('title, url, img', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, url, status, create_time, sort, img', 'safe', 'on'=>'search'),
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
			'title' => '广告标题',
			'url' => '广告地址',
			'status' => '状态',
			'create_time' => '创建时间',
			'sort' => '排序',
			'img' => '广告图片',
			'type' => '广告类型',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('img',$this->img,true);

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
		return $this->statusList[$this->status];
	}

	// 获取类型列表
	public function getTypeList(){
		return array(
			1=>'首页幻灯广告',
			2=>'小组幻灯广告',
			);
	}

	public function getTypeName(){
		return $this->typeList[$this->type];
	}

	// 获取图片链接
	public function getImgLink(){
		$imgLink = "/upload/ad/".$this->img;
		if($this->img == 'ad.jpg'){
			$imgLink = '/upload/ad/ad.jpg';
		}
		return $imgLink;
	}

	public function getTimestr(){
		return date('Y-m-d H:i:s',$this->create_time);
	}
}